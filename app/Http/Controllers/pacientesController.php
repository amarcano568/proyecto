<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pacientes;
use Paises;
use Estados_Provincias;
use \Auth;
use Carbon\Carbon;
Use \App;
use \Log;
use Validator;

class pacientesController extends Controller
{
    public function listarPacientes()
    {
    	
        return view('pacientes.listarPacientes');
    }

    public function muestraListadoPacientes(){
        $BD = Auth::user()->Empresa;
        $pacientes = \App\Pacientes::on($BD)->get();
        $paises = \App\Paises::all();
        $estados = \App\Estados_Provincias::all();
        $i=0;

        $pacientes->map(function($pac){
            $edad = Carbon::parse($pac->fecNac)->age;
            $pac->edad = $edad;
        });

        $dataSet = array (
            "sEcho"                 =>  0,
            "iTotalRecords"         =>  1,
            "iTotalDisplayRecords"  =>  1,
            "aaData"                =>  array () 
        );

        foreach($pacientes as $paciente)
        {
            $sexo = $paciente->sexo == 'M' ? 'Masculino':'Femenino';
            $dataSet['aaData'][] = array(  $paciente['idpacientes'],
                                           $paciente['Nombres'],
                                           $paciente['Apellidos'],
                                           $paciente['nroDoc'],
                                           $sexo,
                                           $paciente['edad'],
                                           '',
                                           '<div class="icono-action">
                                                <a idPaciente="'.$paciente["idpacientes"].'" data-accion="editar-paciente" data-trigger="hover" data-toggle="popover" title="Editar Paciente." data-content="Esta opción permite editar los datos basicos del Paciente." href="#" class="btn btn-outline-primary btn-icon mg-r-5"><div><i class="fas fa-user-edit"></i></div></a>
                                                    <a data-trigger="hover" data-toggle="popover" title="Saldo." data-content="Esta opción permite ver el estado de cuenta del Paciente." href="#" class="btn btn-outline-info btn-icon mg-r-5"><div><i class="far fa-money-bill-alt"></i></div></a>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;

    }

    public function filtroEstadosProvincia(Request $request)
    {
        return \App\Estados_Provincias::where('idPais',$request->idPais)->get();
    }

    public function buscarPaciente(Request $request)
    {
        
        $BD = Auth::user()->Empresa;
        return \App\Pacientes::on($BD)->find($request->idPaciente);
    }

    public function registrarPaciente(Request $request)
    {

        $BD = Auth::user()->Empresa;
        if ( is_null($request->idPaciente) ){  

            $rules = [
                        'email' => ['required', 'email', 'unique:'.$BD.'.pacientes,email' ]
                    ];

            $customMessages = [
                'unique' => 'Correo ya existe.'
            ];                                 

            $v =  $this->validate($request, $rules, $customMessages);

        }
        
        $save = \App\Pacientes::Guardar($request);
        if(!$save){
            App::abort(500, 'Error');
        }
    }

    

}
