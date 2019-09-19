<?php

namespace App\Http\Controllers;
use \Auth;
use Empresa;
use Especialidades_medicas;
use Motivos;
use Estados;
use Usuarios;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \DB;
use PDF;

class administradorController extends Controller
{
    /****************************************************************************************************
     *                                      U S U A R I O S
     ***************************************************************************************************/
    public function administradorUsuarios()
    {
    	$BD = Auth::user()->Empresa;
    	$Espe_medicas = \App\Especialidades_medicas::on($BD)->get();
     
    	$data = array(  'Especialidades' => $Espe_medicas
                     );

        return view('administracion.usuarios',$data);
    }

    /**
     *      Lista Usuarios del Sistema.
     */
    public function cargaUsuarios()
    {
        $BD = Auth::user()->Empresa;
        $conectar = DB::connection($BD);
        $usuarios = DB::select("call listar_usuarios('$BD')");
        $dataSet = array (
            "sEcho"                 =>  0,
            "iTotalRecords"         =>  1,
            "iTotalDisplayRecords"  =>  1,
            "aaData"                =>  array () 
        );

        foreach($usuarios as $usuario)
        {
            if ( $usuario->status == 1){
                $status = '<span class="badge badge-pill badge-success"><i class="fas fa-check"></i> Activo</span>';
            }else{
                $status = '<span class="badge badge-pill badge-danger"><i class="fas fa-ban"></i> Inactivo</span>';
            }
            $dataSet['aaData'][] = array(  $usuario->id,
                                           $usuario->name.' '. $usuario->lastName,
                                           $usuario->email,
                                           $usuario->nombreSucursal,
                                           $status,
                                           '<div class="icono-action">
                                                <a href="" data-accion="editarUsuario" idUsuario="'.$usuario->id.'">
                                                    <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Editar Usuario (<strong>'.$usuario->name.'</strong>)." class="icono-action text-primary far fa-edit">
                                                    </i>
                                                </a>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;
    }


    /****************************************************************************************************
     *                                  M O T I V O S   C O N S U L T A S
     ***************************************************************************************************/
    public function motivosConsultas()
    {
    	$BD = Auth::user()->Empresa;
  
        return view('administracion.motivos');
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
            $dataSet['aaData'][] = array(  $motivo['id'],
                                           $motivo['nombre'],
                                           $motivo['tiempo'].' minutos',
                                           $agenda,
                                           '<div class="icono-action">
                                           		<a href="" data-accion="editarMotivo" idMotivo="'.$motivo['id'].'">
                                                    <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Editar Motivo (<strong>'.$motivo['nombre'].'</strong>)." class="icono-action text-primary far fa-edit">
                                                    </i>
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
    
    public function buscarMotivo(Request $request)
    {
        
        try {

            $BD = Auth::user()->Empresa;
            return \App\Motivos::on($BD)->find($request->idMotivo);

        } catch (Exception $e) {
            return $this->internalException($e, __FUNCTION__);
        }
    }


    /****************************************************************************************************
     *                                       C  I  T  A  S
     ***************************************************************************************************/
    public function estadosCitas()
    {
        $BD = Auth::user()->Empresa;
  
        return view('administracion.estados_citas');
    }

    /**
     *      Lista Estados de las Citas
     */
    public function cargaEstados()
    {
        $BD = Auth::user()->Empresa;
        $estados = \App\Estados::on($BD)->get();
        $dataSet = array (
            "sEcho"                 =>  0,
            "iTotalRecords"         =>  1,
            "iTotalDisplayRecords"  =>  1,
            "aaData"                =>  array () 
        );

        foreach($estados as $estado)
        {
            if ( $estado['email'] == 1){
                $email = '<span class="badge badge-pill badge-success">Si</span>';
            }else{
                $email = '<span class="badge badge-pill badge-danger">No</span>';
            }
            $dataSet['aaData'][] = array(  $estado['id'],
                                           $estado['icono'],
                                           $estado['nombre'],
                                           $email,
                                           '<div class="icono-action">
                                                <a href="" data-accion="editarEstado" idEstado="'.$estado['id'].'">
                                                    <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Editar Estado (<strong>'.$estado['nombre'].'</strong>)." class="icono-action text-primary far fa-edit">
                                                    </i>
                                                </a>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;
    }

    /**
     * Registrar estado de Citas
     */
     public function registrarEstado(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $BD = Auth::user()->Empresa;            
            $save = \App\Estados::Guardar($request);
            if(!$save){
                App::abort(500, 'Error');
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->internalException($e, __FUNCTION__);
        }
    }

    public function buscarEstado(Request $request)
    {
        
        try {

            $BD = Auth::user()->Empresa;
            return \App\Estados::on($BD)->find($request->idEstado);

        } catch (Exception $e) {
            return $this->internalException($e, __FUNCTION__);
        }
    }

}
