<?php

namespace App\Http\Controllers;

use \Pacientes;
use \Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use ConsultasMedicas;
use \DB;
use Recipes;
use Empresa;
use PDF;
use Medicamentos;

class consultaMedicaController extends Controller
{
    public function consultaMedica()
    {
    	$BD = Auth::user()->Empresa;
        $pacientes = \App\Pacientes::on($BD)->get();
        $data = array(  'Pacientes' => $pacientes
                     );
    	return view('consultaMedica.tableroPaciente',$data);
    }

    public function buscarPacienteFicha(Request $request)
    {
        $BD = Auth::user()->Empresa;
        $paciente = \App\Pacientes::on($BD)->find($request->idPaciente);

        $edad = Carbon::parse($paciente->fecNac)->age;
        $paciente->edad = $edad;

        return $paciente;
    }

    public function cargaConsultas(Request $request)
    {
        $BD = Auth::user()->Empresa;
        $consultas = \App\ConsultasMedicas::on($BD)->join('Tratamientos', 'tratamientos.id', '=', 'consultas.tratamientos_id')->where('consultas.id',$request->idPaciente)->get();
        $dataSet = array (
            "sEcho"                 =>  0,
            "iTotalRecords"         =>  1,
            "iTotalDisplayRecords"  =>  1,
            "aaData"                =>  array () 
        );

        foreach($consultas as $consulta)
        {
            $dataSet['aaData'][] = array(  $consulta['id'],
                                           $consulta['fechaConsulta'],
                                           $consulta['tratamientos'],
                                           'Dr X',
                                           '<div class="icono-action">
                                                <a href="">
                                                    <i data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Ver información de la consulta." class="far fa-eye"></i>
                                                </a>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;
    }

    public function cargaRecipes(Request $request)
    {
        $idPaciente = $request->idPaciente;
        $BD = Auth::user()->Empresa;
        $conectar = DB::connection($BD);
        $recipes = $conectar->select("call listarRecipes($idPaciente)");

        $dataSet = array (
            "sEcho"                 =>  0,
            "iTotalRecords"         =>  1,
            "iTotalDisplayRecords"  =>  1,
            "aaData"                =>  array () 
        );

        foreach($recipes as $recipe)
        {
            $fecha =  \Carbon\Carbon::parse($recipe->fecha)->format('d/m/Y');
            $dataSet['aaData'][] = array(  $recipe->CantMedicinas,
                                            $fecha,
                                            $recipe->nombre,
                                            $this->buscarMedicinas($recipe->id),
                                            '<div class="icono-action">
                                                <a href="" data-accion="verRecipePdf" idRecipe="'.$recipe->id.'">
                                                    <i data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Imprimir este recipe." class="fas fa-print"></i>
                                                </a>
                                                <a href="" data-accion="enviarRecipeEmail" idRecipe="'.$recipe->id.'">
                                                    <i data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Enviar este recipe por Email." class="far fa-envelope"></i>
                                                </a>
                                                 <i id="'.$recipe->id.'" class="fas fa-spinner fa-spin" style="display: none;"></i>
                                            </div>');
        }

        $salidaDeDataSet = json_encode ($dataSet, JSON_HEX_QUOT);
    
        /* SE DEVUELVE LA SALIDA */
        echo $salidaDeDataSet;
    }

    public function buscarMedicinas($idRecipe)
    {
        $BD = Auth::user()->Empresa;
        $medicinas = \App\Recipes::on($BD)->with('medicamentos')->where('id',$idRecipe)->get();
        $salida = '';
        foreach($medicinas as $medicinas)
        {
            $salida .= '<tr>
                            <td>
                            '.$medicinas->medicamentos->nombre.' '.$medicinas->medicamentos->concentrado.'
                            </td>
                            <td>
                            '.$medicinas->medicamentos->tipo1.'
                            </td>
                            <td>
                            '.$medicinas->indicaciones.'
                            </td>
                        </tr>';
            
        }

        return '<table id="datatable-recipes" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">Medicamento</th>
                  <th class="wd-20p">Tipo</th>
                  <th class="wd-20p">Indicaciones</th>
                </tr>
              </thead>
              <tbody id="body-recipes">
                '.$salida.'
              </tbody>
            </table>';
        
    }

    public function verRecipePaciente(Request $request )
    {
        $BD = Auth::user()->Empresa;
        $empresa = \App\Empresa::on($BD)->first();
        $medicinas = \App\Recipes::on($BD)->with('medicamentos')->where('id',$request->idRecipe)->get();

        $archivoPdf = $this->generaRecipePdf($BD,$empresa,$medicinas,$request->idRecipe);

        return response()->json( array('success' => true, 'recipePdf'=>$archivoPdf) );

        //$returnHTML = view('pdf.recipeMedico',$data)->render();
        //return response()->json( array('success' => true, 'html'=>$returnHTML) );
    }

    public function generaRecipePdf($BD,$empresa,$medicinas,$idRecipe){
        $data = array(  'empresa' => $empresa,
                        'carpeta' => $BD,
                        'fecha' => Carbon::now(),
                        'medicinas' => $medicinas
                     );

        $pdf = PDF::loadView('pdf.recipeMedico',$data);  
        $pdf->setPaper('A4', 'landscape');
        $file_to_save = base_path()."\public\Empresas\\".$BD."\\recipesPdf\Recipe".$idRecipe.'.pdf';
        //save the pdf file on the server
        file_put_contents($file_to_save, $pdf->stream('invoice'));

        return "Empresas/".$BD."/recipesPdf/Recipe".$idRecipe.'.pdf';
        
    }

    public function buscarMedicamentos(Request $request )
    {
        
        try {
            $BD = Auth::user()->Empresa;

            $Medicinas = \App\Medicamentos::on($BD)->where('nombre', 'LIKE', '%' . $request->findMedicamento . '%')->get();

            $result = array();
            foreach($Medicinas as $medicinas)
            {
                $result[] = array(  "id" =>  $medicinas->id,
                                    "label" => $medicinas->nombre.' '.$medicinas->concentrado.' '.$medicinas->tipo2
                                );
         

            }
            return json_encode($result, JSON_UNESCAPED_UNICODE);

        } catch (Exception $e) {
            return $this->internalException($e, __FUNCTION__);
        }
    }

    public function agregarRecipePaciente(Request $request )
    {
        
        try {
            DB::beginTransaction();
            $BD = Auth::user()->Empresa;
            $empresa = \App\Empresa::on($BD)->first();
            $data = $request->data;
            $medicamentos = json_decode($data);
            $idRecipe = \App\Recipes::on($BD)->max('id');
            $idRecipe++;
            foreach($medicamentos as $medicina)
            {
                
                $save = \App\Recipes::Guardar($medicina->idPaciente,$medicina->idMedicina,$medicina->indicaciones,$idRecipe);
                if(!$save){
                    App::abort(500, 'Error');
                }

            }

            if($save){ 
                $medicinas = \App\Recipes::on($BD)->with('medicamentos')->where('id', $idRecipe)->get();
                $archivoPdf = $this->generaRecipePdf($BD,$empresa,$medicinas,$idRecipe);
                return response()->json( array('success' => true, 'recipePdf'=>$archivoPdf) );
            }


        } catch (Exception $e) {
            DB::rollback();
            return $this->internalException($e, __FUNCTION__);
        }
    }

    
}
