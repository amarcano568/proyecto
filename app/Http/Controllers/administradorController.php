<?php

namespace App\Http\Controllers;
use \Auth;
use Empresa;
use Especialidades_medicas;
use Motivos;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \DB;
use PDF;

class administradorController extends Controller
{
    public function administradorUsuarios()
    {
    	$BD = Auth::user()->Empresa;
    	$Espe_medicas = \App\Especialidades_medicas::on($BD)->get();
     
    	$data = array(  'Especialidades' => $Espe_medicas
                     );

        return view('administracion.usuarios',$data);
    }

    /**
     *  	Motivos de las Consultas
     */
    public function motivosConsultas()
    {
    	$BD = Auth::user()->Empresa;
    	$Espe_medicas = \App\Especialidades_medicas::on($BD)->get();
     
    	$data = array(  'Especialidades' => $Espe_medicas
                     );

        return view('administracion.motivos',$data);
    }

    
    /**
     *  	Lista Motivos de las Consultas
     */
    public function cargaMotivos()
    {
    	$BD = Auth::user()->Empresa;
        $motivos = \App\Motivos::on($BD)->get();
        $dataSet = array (
            "sEcho"                 =>  0,
            "iTotalRecords"         =>  1,
            "iTotalDisplayRecords"  =>  1,
            "aaData"                =>  array () 
        );

        foreach($motivos as $motivo)
        {
        	if ( $motivo['agenda'] == 1){
        		$agenda = '<span class="badge badge-pill badge-success">Si</span>';
        	}else{
        		$agenda = '<span class="badge badge-pill badge-danger">No</span>';
        	}
            $dataSet['aaData'][] = array(  $motivo['idmotivos'],
                                           $motivo['nombre'],
                                           $motivo['tiempo'].' minutos',
                                           $agenda,
                                           '<div class="icono-action">
                                           		<a href="">
                                                <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Editar Motivo (<strong>'.$motivo['nombre'].'</strong>)." class="icono-action text-primary far fa-edit"></i>
                                                </a>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;
    }

    public function registrarMotivo(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $BD = Auth::user()->Empresa;            
            $save = \App\Motivos::Guardar($request);
            if(!$save){
                App::abort(500, 'Error');
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->internalException($e, __FUNCTION__);
        }
    }


}
