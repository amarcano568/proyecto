<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Auth;

class Estados extends Model
{
	protected $table = 'estados';

    protected function Guardar($request)
    {

    	$BD = Auth::user()->Empresa;
        if ( is_null($request->idEstado) ){      
            $estado = new Estados;
            $estado->setConnection($BD);
        }else{
            $estado = \App\Estados::on($BD)->find($request->idEstado);    
        }

		$estado->nombre = $request->nomEstado;
		$estado->email = $request->enviaEmail == 'on' ? 1 : 0;
		$estado->icono = $request->iconos;
		
        return $estado->save();
    }
}
