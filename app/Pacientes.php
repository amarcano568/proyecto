<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Auth;
use \baseController;

class Pacientes extends Model
{
    protected $table = 'pacientes';
    protected $primaryKey = 'idpacientes';

    protected function Guardar($request)
    {
    	$BD = Auth::user()->Empresa;
        if ( is_null($request->idPaciente) ){      
            $paciente = new Pacientes;
            $paciente->setConnection($BD);
        }else{
            $paciente = \App\Pacientes::on($BD)->find($request->idPaciente);    
        }
        
        $paciente->Nombres       = $request->nomPaciente ;
        $paciente->Apellidos     = $request->apePaciente ;
        $paciente->tipoDoc       = $request->tipoDoc;
        $paciente->nroDoc        = $request->nroDocumento ;
        $paciente->fecNac        = $request->fecNac ;
        $paciente->sexo          = $request->sexo ;
        $paciente->email         = $request->mailPac ;
        $paciente->Pais          = $request->pais ;
        $paciente->ciudad        = $request->estadoProvincia;
        $paciente->direccion     = $request->direccion ;
        $paciente->telFijo       = $request->telFijo ;
        $paciente->telMovil      = $request->telMovil ;
        $paciente->tipoSangre    = $request->tipoSangre;
        $paciente->telEmergencia = $request->telEmergencia ;        
        return $paciente->save();
    }

    public function consultaMedica()
    {
        //return $this->hasOne('App\ConsultasMedicas');
        return $this->belongsTo(ConsultasMedicas::class,'idpacientes');
    }

}
