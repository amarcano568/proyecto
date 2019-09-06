<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pacientes;
use Paises;
use Estados_Provincias;
use \Auth;
use Carbon\Carbon;
Use \App;
use \Log;
use Validator;

class pacientesController extends Controller
{
    public function listarPacientes()
    {
    	$BD = Auth::user()->Empresa;
    	$pacientes = \App\Pacientes::on($BD)->get();
        $paises = \App\Paises::all();
        $estados = \App\Estados_Provincias::all();
    	$i=0;

	   	$pacientes->map(function($pac){
	   		$edad = Carbon::parse($pac->fecNac)->age;
		    $pac->edad = $edad;
		});

    	$data = array(  'Pacientes' => $pacientes,
                        'Paises' => $paises,
                        'Estados_Provincias' => $estados
                     );
        return view('pacientes.listarPacientes',$data);
    }

    public function filtroEstadosProvincia(Request $request)
    {
        return \App\Estados_Provincias::where('idPais',$request->idPais)->get();
    }

    public function buscarPaciente(Request $request)
    {
        $BD = Auth::user()->Empresa;
        return \App\Pacientes::on($BD)->find($request->idPaciente);
    }

    public function registrarPaciente(Request $request)
    {
        
        $BD = Auth::user()->Empresa;
        if ( is_null($request->idPaciente) ){  

            $rules = [
                        'mailPac' => ['required', 'email', 'unique:'.$BD.'.pacientes,email' ]
                    ];

            $customMessages = [
                'unique' => 'Correo ya existe.'
            ];                                 

            $v =  $this->validate($request, $rules, $customMessages);

        }
        
        $save = \App\Pacientes::Guardar($request);
        if(!$save){
            App::abort(500, 'Error');
        }
    }

    

}
