<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Auth;

class Motivos extends Model
{
    protected $table = 'motivos';
   // protected $primaryKey = 'idMotivos';

    protected function Guardar($request)
    {
    	$BD = Auth::user()->Empresa;
        if ( is_null($request->idMotivo) ){      
            $motivo = new Motivos;
            $motivo->setConnection($BD);
        }else{
            $motivo = \App\Motivos::on($BD)->find($request->idMotivo);    
        }

		$motivo->nombre = $request->nomMotivo;
		$motivo->tiempo = $request->tiempo;
		$motivo->agenda = $request->agenda == 'on' ? 1 : 0;
		
        return $motivo->save();
    }
}
