<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Auth;
use Carbon\Carbon;

class Recipes extends Model
{
    protected $table = 'recipes';


    public function medicamentos()
    {
        return $this->belongsTo(Medicamentos::class);
    }

    protected function Guardar($idPaciente,$idMedicina,$indicaciones,$idRecipe)
    {
    	$BD = Auth::user()->Empresa;

        $recipe = new Recipes;
        $recipe->setConnection($BD);
        
		$recipe->id              = $idRecipe;
		$recipe->idPacientes     = $idPaciente ;
		$recipe->fecha           = Carbon::now();
		$recipe->medicamentos_id = $idMedicina;
		$recipe->idMedico        =  Auth::user()->id;
		$recipe->indicaciones    =  $indicaciones;
        
        return $recipe->save();
    }
}
