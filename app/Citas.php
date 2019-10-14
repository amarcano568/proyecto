<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $table = 'citas';

    protected function Guardar($request,$BD)
    {

  
        $cita = new Citas;
        $cita->setConnection($BD);
        
		$cita->idPaciente = $request->chosenPacientes;
		$cita->start_date = $request->fechaCita;
		$cita->end_date = $request->fechaCita;
		$cita->idMedico = $request->chosenMedico;
		$cita->notas = $request->notas;
	
        if ( $cita->save() ){
        	return array(	'success' => true,
        					'id' => $cita->id);
        }else{
        	return array(	'success' => false,
        					'id' => 0);
        }

    }
}
