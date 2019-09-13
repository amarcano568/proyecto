<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'inicioController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get( '/inicio' , 'inicioController@getInicio' );

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 

Route::get('pacientes', 'pacientesController@listarPacientes'); 

Route::get('filtro-estadosProvincias', 'pacientesController@filtroEstadosProvincia'); 

Route::get('buscar-paciente', 'pacientesController@buscarPaciente'); 

Route::post( 'registrar-paciente', 'pacientesController@registrarPaciente');

Route::get('consulta-medica', 'consultaMedicaController@consultaMedica');

Route::get('buscar-paciente-ficha', 'consultaMedicaController@buscarPacienteFicha');

Route::get('carga-consultas', 'consultaMedicaController@cargaConsultas');
Route::get('carga-recipes', 'consultaMedicaController@cargaRecipes');

Route::get('ver-recipe-paciente', 'consultaMedicaController@verRecipePaciente');

Route::get('buscar-medicamentos', 'consultaMedicaController@buscarMedicamentos');

Route::get('agregar-recipe-paciente', 'consultaMedicaController@agregarRecipePaciente');

Route::get('config-empresa', 'configuracionController@configEmpresa');

Route::get('administrador-usuarios', 'administradorController@administradorUsuarios');

Route::get('motivos-consultas', 'administradorController@motivosConsultas');

Route::get('carga-motivos', 'administradorController@cargaMotivos');

Route::post('registrar-motivo', 'administradorController@registrarMotivo');


// Route::get('listar-pacientes', function () {
//     $BD = Auth::user()->Empresa;
//     return \App\Pacientes::on($BD)->get();
// });
// 

