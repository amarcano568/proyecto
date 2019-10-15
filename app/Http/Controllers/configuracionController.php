<?php

namespace App\Http\Controllers;
use \Auth;
use Empresa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Sucursales;
use \DB;

class configuracionController extends Controller
{
    public function configEmpresa()
    {
    	$BD = Auth::user()->Empresa;
    	$sucursales = \App\Sucursales::on($BD)->orderBy('id', 'asc')->get();
     	$sucursales->map(function($sucursal){
	   		$sucursal->nombre = $sucursal->id == 1 ? trim($sucursal->nombreEmpresa).' (Sucursal Principal)' : $sucursal->nombre;
		});
    	$data = array(  
                        'Sucursales' => $sucursales
                     );
    
        return view('configuracion.configEmpresa',$data);
    }

    public function buscarSucursal(Request $request)
    {
        
        try {

            $BD = Auth::user()->Empresa;
            return \App\Sucursales::on($BD)->find($request->idSucursal);
 

        } catch (Exception $e) {
            return $this->internalException($e, __FUNCTION__);
        }
    }

    /**
     * [registrarMotivo description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function registrarEmpresa(Request $request)
    {

        try {
            DB::beginTransaction();   
            $BD = Auth::user()->Empresa;  
        //     if ( is_null($request->idUsuario) ){  

        //     $rules = [
        //                 'email_usuario' => ['required', 'email', 'unique:users,email' ],
        //                 'Username' => ['required', 'unique:users,userName' ],
        //             ];

        //     $customMessages =   [
        //                             'email_usuario.unique' => '<i class="fas fa-exclamation-triangle"></i> Existe otro Usuario con ese <strong>Correo</strong>',
        //                             'Username.unique'  => '<i class="fas fa-exclamation-triangle"></i> Existe otro Usuario con ese <strong>UserName</strong>',
        //                         ];                                

        //     $v =  $this->validate($request, $rules, $customMessages);

        // }    
            $save = \App\Sucursales::Guardar($request,$BD);
            DB::commit();
            if(!$save){
                App::abort(500, 'Error');
            }

            $sucursales = \App\Sucursales::on($BD)->orderBy('id', 'asc')->get();
            $sucursales->map(function($sucursal){
                $sucursal->nombre = $sucursal->id == 1 ? trim($sucursal->nombreEmpresa).' (Sucursal Principal)' : $sucursal->nombre;
            });

            return $sucursales;

        } catch (Exception $e) {
            DB::rollback();
            return $this->internalException($e, __FUNCTION__);
        }
    }


    public function subirLogo(Request $request){

        $BD       = Auth::user()->Empresa;
        $ruta     = '/Empresas/'.$BD.'/fotos/';
        $path     = public_path().$ruta;
        $files    = $request->file('file');
        $ext      = explode('/',$request->file('file')->getMimeType());
        $fileName = $files->getClientOriginalName();
        $files->move($path, $fileName);

        rename($path.$fileName, $path.'logo-'.$request->idSucursal.'.'.$ext[1]);
        

        DB::beginTransaction();   
        $sucursal = \App\Sucursales::on($BD)->find($request->idSucursal);
        $sucursal->logo = "Empresas\\".$BD."\\fotos\\".'logo-'.$request->idSucursal.'.'.$ext[1];
        $sucursal->save();
        DB::commit();
        //Storage::move($path.$fileName, $path.'usuario-'.$request->idSucursal);
        return "Empresas\\".$BD."\\fotos\\".'logo-'.$request->idSucursal.'.'.$ext[1];
        
    }

    public function configAgenda()
    {
        $BD = Auth::user()->Empresa;
            
        return view('configuracion.configAgenda');
    }

}



