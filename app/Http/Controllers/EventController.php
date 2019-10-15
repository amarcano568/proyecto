<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use App\Citas;
use \Pacientes;
use \Auth;
use \DB;
use App\User;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;

class EventController extends Controller
{

    public function index()
    {
    	$BD = Auth::user()->Empresa;
        $pacientes = \App\Pacientes::on($BD)->get();
        $medicos = User::select('id','name','lastName')->where('Empresa',$BD)->get();
        
        $events = [];
        $data = Citas::on($BD)->join('pacientes', 'pacientes.idpacientes', '=', 'citas.idPaciente')->get();

        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    
                    trim($value->Nombres).' '.$value->Apellidos,
                    false,  
                    new \DateTime($value->start_date),
                	new \DateTime($value->end_date),                    
                    $value->id,
                    // Add color and link on event
	                [
	                    'color' => '#18A4B2',
	                    'url' => '#', //pass here url and any route
	                ]
                );
            }
        }

        $calendar = \Calendar::addEvents($events)
                  ->setOptions([ //set fullcalendar options
				'header' 			=> array('left' => 'prev,next today printButton', 'center' => 'title', 'right' =>  'month,agendaWeek,agendaDay,listWeek'),            
				'timeZone'         => 'UTC',
				'locale'           => 'es',
				'allDayDefault'    => true,
				'allDay'           => true,
				'axisFormat'       => 'h:mm T',
				'lang'             => 'es',
				'slotMinutes'      => 30,
				'editable'         => true,
				'navLinks'         => true,
				'displayEventTime' => true,
				'selectable'       => true,
				'defaultView'      => 'month',
				'selectHelper'     => true,
				'businessHours'    => array(
				'start'            => '08:00', // hora final
				'end'              => '20:00', // hora inicial
				'dow'				=> [ 1, 2, 3, 4, 5 ] // dias de semana, 0=Domingo
			)

    ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
    		'themeSystem' => '"bootstrap4"',
          	'eventClick' => 'function(event) { console.log(event); $("#modal-citaAdd").modal("show"); }',
          	'dayClick' => 'function(date, jsEvent, view) 	
          	{ 
          		$("#fechaCita").val(date.format())
          		$("#modal-citaAdd").modal("show"); 
       		}',
       		'eventRender' => 'function(event, element) {
                
            }',
            'select'=> 'function(start, end, allDay) {
                var check = start;
                var today = new Date();
                console.log(check)
                console.log(today)
                if(check < today)
                {
                    alert("Fecha anterior")
                    return false;
                }
                else
                {
                    // Its a right date
                    // Do something
                }
          }',

    ]);

    	$horasCitas = $this->intervaloHora( '08:00:00', '18:00:00' );

 		$data = array(  
						'Pacientes' => $pacientes,
						'calendar' => $calendar,
						'medicos' => $medicos,
						'HorasCitas'=> $horasCitas
                     ); 		

         return view('citas.citas',$data);
    }

    public function intervaloHora($hora_inicio, $hora_fin, $intervalo = 30) {

	    $hora_inicio = new \DateTime( $hora_inicio );
	    $hora_fin    = new \DateTime( $hora_fin );
	    $hora_fin->modify('+1 second'); // Añadimos 1 segundo para que nos muestre $hora_fin

	    // Si la hora de inicio es superior a la hora fin
	    // añadimos un día más a la hora fin
	    if ($hora_inicio > $hora_fin) {
	        $hora_fin->modify('+1 day');
	    }

	    // Establecemos el intervalo en minutos        
	    $intervalo = new DateInterval('PT'.$intervalo.'M');

	    // Sacamos los periodos entre las horas
	    $periodo   = new DatePeriod($hora_inicio, $intervalo, $hora_fin);        
	    $horas = array();
	    $i = 0;
	    foreach( $periodo as $hora ) {
	        // Guardamos las horas intervalos 
	        $horas[$i] =  array('hora' => $hora->format('H:i:s') );
	        $i++;
	    }

	    return $horas;
	}


    public function registrarCita(Request $request )
    {

        try {
 
            $BD = Auth::user()->Empresa;
            $empresa = \App\Empresa::on($BD)->first();

            $save = Citas::Guardar($request,$BD);
            if(!$save['success']){
                App::abort(500, 'Error');
            } 

            return response()->json($save);     

        } catch (Exception $e) {
            return $this->internalException($e, __FUNCTION__);
        }
    }
}