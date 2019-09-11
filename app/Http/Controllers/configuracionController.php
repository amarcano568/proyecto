<?php

namespace App\Http\Controllers;
use \Auth;
use Empresa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use \DB;
use PDF;

class configuracionController extends Controller
{
    public function configEmpresa()
    {
    	// $BD = Auth::user()->Empresa;
    	// $pacientes = \App\Pacientes::on($BD)->get();
     //    $paises = \App\Paises::all();
     //    $estados = \App\Estados_Provincias::all();
    	// $i=0;


        return view('configuracion.configEmpresa');
    }
}
