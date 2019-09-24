<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Model
{
    protected $table = 'users';

    protected function Guardar($request,$empresa)
    {
    	
        if ( is_null($request->idUsuario) ){     
            $user  = new \App\Usuarios();
            $user->password           = Hash::make('12345678');
            $user->status             = 1;
			$user->changePassword     = 'S';
        }else{
            $user  = \App\Usuarios::find($request->idUsuario);    
        }

		$user->name               = $request->nombre_usuario;
		$user->lastName           = $request->apellido_usuario;
		$user->userName           = $request->Username;
		$user->email              = $request->email_usuario;		
		$user->Empresa            = $empresa;
		$user->sucursal           = $request->Sucursal;		
		$user->perfil             = $request->perfil_usuario;
		$user->sexo               = $request->Sexo;
		$user->especialidadMedica = $request->Especialidad;
		$user->idioma             = $request->idioma;
		$user->rut_dni            = $request->rut_usuario;
		$user->fecNacimiento      = $request->fec_nac_usuario;
		$user->telefonoFijo       = $request->fonofijo_usuario;
		$user->telefonoCelular    = $request->fonocell_usuario;
		$user->direccion          = $request->direccion_usuario;
		

        return $user->save();
    }
}


// return User::create([
   
// 		'name'               => $request->nombre_usuario,
// 		'lastName'           => $request->apellido_usuario,
// 		'userName'           => $request->Username,
// 		'email'              => $request->email_usuario,
// 		'password'           => Hash::make('12345678'),
// 		'Empresa'            => $empresa,
// 		'sucursal'           => $request->select_sucursal,
// 		'status'             => 1,
// 		'perfil'             => $request->perfil_usuario,
// 		'sexo'               => $request->Sexo,
// 		'especialidadMedica' => $request->especialidadMedica,
// 		'idioma'             => $request->idioma,
// 		'rut_dni'            => $request->rut_usuario,
// 		'fecNacimiento'      => $request->fec_nac_usuario,
// 		'telefonoFijo'       => $request->fonofijo_usuario,
// 		'telefonoCelular'    => $request->fonocell_usuario,
// 		'direccion'          => $request->direccion_usuario,
// 		'changePassword'     => 'S'
//              ]);
