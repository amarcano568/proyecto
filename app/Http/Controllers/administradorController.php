<?php

namespace App\Http\Controllers;
use \Auth;
use Empresa;
use Especialidades_medicas;
use Perfil_usuarios;
use Motivos;
use Estados;
use Usuarios;
use Convenios;
use Sucursales;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \DB;
use PDF;
use Illuminate\Support\Facades\Storage;

class administradorController extends Controller
{
    /****************************************************************************************************
     *                                      U S U A R I O S
     ***************************************************************************************************/
    public function administradorUsuarios()
    {
    	$BD = Auth::user()->Empresa;
    	$Espe_medicas = \App\Especialidades_medicas::on($BD)->get();
        $perfiles = \App\Perfil_usuarios::on($BD)->get();
        $sucursales = \App\Sucursales::on($BD)->get();
     
    	$data = array(  'Especialidades' => $Espe_medicas,
                        'Perfiles' => $perfiles,
                        'Sucursales' => $sucursales
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
                                           $this->sucursales($usuario->sucursal),
                                           $status,
                                           '<div class="icono-action">
                                                <a href="" data-accion="editarUsuario" idUsuario="'.$usuario->id.'" sucursales="'.$usuario->sucursal.'" EspMedica="'.$usuario->especialidadMedica.'">
                                                    <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Editar Usuario (<strong>'.$usuario->name.'</strong>)." class="icono-action text-primary far fa-edit">
                                                    </i>
                                                </a>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;
    }

    public function sucursales($sucursales){
        $sucursales = explode(',',$sucursales);
        $BD = Auth::user()->Empresa;
        $etiquetaSucursal = '';    
        foreach($sucursales as $sucursal)
        {
            $nomSucursal =  \App\Sucursales::on($BD)->select('sucursales.nombre')->find($sucursal);
            $etiquetaSucursal .= '<span class="badge badge-pill badge-primary"><i class="far fa-hospital"></i> '.$nomSucursal->nombre.'</span>';
        }

        return $etiquetaSucursal;

    }

    public function listarSucursales()
    {
        $BD = Auth::user()->Empresa;
        return \App\Sucursales::on($BD)->get();
    }

    public function listarEspecialidades()
    {
        $BD = Auth::user()->Empresa;
        return \App\Especialidades_medicas::on($BD)->get();
    }


    /**
     * [registrarMotivo description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function registrarUsuario(Request $request)
    {

        try {
            DB::beginTransaction();   
            $BD = Auth::user()->Empresa;  
            if ( is_null($request->idUsuario) ){  

            $rules = [
                        'email_usuario' => ['required', 'email', 'unique:users,email' ],
                        'Username' => ['required', 'unique:users,userName' ],
                    ];

            $customMessages =   [
                                    'email_usuario.unique' => '<i class="fas fa-exclamation-triangle"></i> Existe otro Usuario con ese <strong>Correo</strong>',
                                    'Username.unique'  => '<i class="fas fa-exclamation-triangle"></i> Existe otro Usuario con ese <strong>UserName</strong>',
                                ];                                

            $v =  $this->validate($request, $rules, $customMessages);

        }    
            $save = \App\Usuarios::Guardar($request,$BD);
            DB::commit();
            if(!$save){
                App::abort(500, 'Error');
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->internalException($e, __FUNCTION__);
        }
    }

    public function buscarUsuario(Request $request)
    {
        
        try {

            $BD = Auth::user()->Empresa;
            $usuarios = \App\Usuarios::find($request->idUsuario);
            $edad = Carbon::parse($usuarios->fecNacimiento)->age;
            $usuarios->edad = $edad;
            return $usuarios;

        } catch (Exception $e) {
            return $this->internalException($e, __FUNCTION__);
        }
    }

    public function subirFoto(Request $request){

        $BD       = Auth::user()->Empresa;
        $ruta     = '/Empresas/'.$BD.'/fotos/';
        $path     = public_path().$ruta;
        $files    = $request->file('file');
        $ext      = explode('/',$request->file('file')->getMimeType());
        $fileName = $files->getClientOriginalName();
        $files->move($path, $fileName);

        rename($path.$fileName, $path.'usuario-'.$request->idUsuario.'.'.$ext[1]);
        

        DB::beginTransaction();   
        $usuario = \App\Usuarios::find($request->idUsuario);
        $usuario->foto = "Empresas\\".$BD."\\fotos\\".'usuario-'.$request->idUsuario.'.'.$ext[1];
        $usuario->save();
        DB::commit();
        //Storage::move($path.$fileName, $path.'usuario-'.$request->idUsuario);
        return "Empresas\\".$BD."\\fotos\\".'usuario-'.$request->idUsuario.'.'.$ext[1];
        
    }

    /********************************************************************************************
     *                                  C O N V E N I O S
     *******************************************************************************************/
    public function Convenios()
    {
        $BD = Auth::user()->Empresa;
        $responsables = \App\Usuarios::where('Empresa','=',$BD)->get();
        $data = array(  'Responsables' => $responsables
                     );
        return view('administracion.convenios',$data);
    }

    /**
     * [cargaMotivos description]
     * @return [type] [description]
     */
    public function cargaConvenios()
    {
        $BD = Auth::user()->Empresa;
        $convenios = \App\Convenios::on($BD)->select('convenios.*', 'users.name','users.lastName')->join('odontosoft.users', 'encargado', '=', 'users.id')->get();
        $dataSet = array (
            "sEcho"                 =>  0,
            "iTotalRecords"         =>  1,
            "iTotalDisplayRecords"  =>  1,
            "aaData"                =>  array () 
        );

        foreach($convenios as $convenio)
        {
            if ( $convenio['status'] == 1){
                $status = '<span class="badge badge-pill badge-success">Activo</span>';
            }else{
                $status = '<span class="badge badge-pill badge-danger">Inactivo</span>';
            }


            $dataSet['aaData'][] = array(  $convenio['id'],
                                           $convenio['nombreConvenio'],
                                           $convenio['porceDscto'].'%',
                                           $convenio['name'].' '.$convenio['lastName'],
                                           $status,
                                           '<div class="icono-action">
                                                <a href="" data-accion="editarConvenio" idConvenio="'.$convenio['id'].'">
                                                    <i data-trigger="hover" data-html="true" data-toggle="popover" data-placement="top" data-content="Editar Convenio (<strong>'.$convenio['nombreConvenio'].'</strong>)." class="icono-action text-primary far fa-edit">
                                                    </i>
                                                </a>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;
    }

    public function registrarConvenio(Request $request)
    {

        try {
            DB::beginTransaction();
            $BD = Auth::user()->Empresa;            
            $save = \App\Convenios::Guardar($request);
            if(!$save){
                App::abort(500, 'Error');
            }

        } catch (Exception $e) {
            DB::rollback();
            return $this->internalException($e, __FUNCTION__);
        }
    }

    public function buscarConvenio(Request $request)
    {
        
        try {

            $BD = Auth::user()->Empresa;
            return \App\Convenios::on($BD)->find($request->idConvenio);

        } catch (Exception $e) {
            return $this->internalException($e, __FUNCTION__);
        }
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
