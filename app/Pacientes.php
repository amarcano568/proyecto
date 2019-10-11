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

        
        $paciente->Nombres           = $request->nombre;
        $paciente->Apellidos         = $request->apellido;
        $paciente->nroDoc            = $request->nroDocumento;
        $paciente->email             = $request->email;
        $paciente->medicoProfesional = $request->medicoProfesional;
        $paciente->nombre_contacto   = $request->nombre_contacto; 
        $paciente->fono_contacto     = $request->fono_contacto;
        $paciente->relacion_contacto = $request->relacion;
        $paciente->sexo              = $request->genero;
        $paciente->Pais              = $request->nacionalidad;
        $paciente->idioma            = $request->idioma;
        $paciente->telFijo           = $request->fonofijo;
        $paciente->telMovil          = $request->fonoMovil;
        $paciente->direccion         = $request->direccion;
        $paciente->ocupacion         = $request->ocupacion;
        $paciente->convenio          = $request->convenio;
        $paciente->porc_convenio     = $request->porcConvenio; 
        $paciente->notas_convenio    = $request->convenio_notas;
        $paciente->responsable_pago  = $request->nombre_resp;
        $paciente->fecNac            = $request->fec_nacimiento;
        $paciente->tipoSangre        = '';

        return $paciente->save();
    }

    public function consultaMedica()
    {
        //return $this->hasOne('App\ConsultasMedicas');
        return $this->belongsTo(ConsultasMedicas::class,'idpacientes');
    }

}
