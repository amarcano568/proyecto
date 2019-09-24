<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Auth;

class Convenios extends Model
{
    protected $table = 'convenios';

    protected function Guardar($request)
    {

    	$BD = Auth::user()->Empresa;
        if ( is_null($request->idConvenio) ){      
            $convenio = new Convenios;
            $convenio->setConnection($BD);
        }else{
            $convenio = \App\convenios::on($BD)->find($request->idConvenio);    
        }

		$convenio->nombreConvenio = $request->nomConvenio;
		$convenio->encargado      = $request->responsable;
		$convenio->porceDscto     = $request->porcDscto;
		$convenio->nota           = $request->notas;
		$convenio->status         = $request->status == 'on' ? 1 : 0;
		
        return $convenio->save();
    }
}
