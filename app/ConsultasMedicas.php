<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultasMedicas extends Model
{
    protected $table = 'consultas';
    #protected $primaryKey = 'id';
    #

	public function tratamientos()
	{
	    return $this->belongsToMany(Tratamientos::class,'id');
	}
}
