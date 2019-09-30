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

Route::group(['middleware' => 'auth'], function (){
	
    Route::get('/', 'inicioController@getInicio');

	Route::get('/home', 'inicioController@getInicio');

	Route::get( 'inicio' , 'inicioController@getInicio' );

	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 

	/**
	 * 				pacientesController
	 */
	Route::get('pacientes', 'pacientesController@listarPacientes'); 
	Route::get('filtro-estadosProvincias', 'pacientesController@filtroEstadosProvincia'); 
	Route::get('buscar-paciente', 'pacientesController@buscarPaciente'); 
	Route::post( 'registrar-paciente', 'pacientesController@registrarPaciente');

	/**
	 * 				consultaMedicaController
	 */
	Route::get('consulta-medica', 'consultaMedicaController@consultaMedica');
	Route::get('buscar-paciente-ficha', 'consultaMedicaController@buscarPacienteFicha');
	Route::get('carga-consultas', 'consultaMedicaController@cargaConsultas');
	Route::get('carga-recipes', 'consultaMedicaController@cargaRecipes');
	Route::get('ver-recipe-paciente', 'consultaMedicaController@verRecipePaciente');
	Route::get('buscar-medicamentos', 'consultaMedicaController@buscarMedicamentos');
	Route::get('agregar-recipe-paciente', 'consultaMedicaController@agregarRecipePaciente');
	Route::get('listar-imagenes', 'consultaMedicaController@listarImagenes');

	/**
	 * 				configuracionController
	 */
	Route::get('config-empresa', 'configuracionController@configEmpresa');
	Route::get('buscar_sucursal', 'configuracionController@buscarSucursal');
	Route::post('registrar-empresa', 'configuracionController@registrarEmpresa');
	Route::post('subir-logo', 'configuracionController@subirLogo');
	/**
	 * 				administradorController
	 */
	Route::get('administrador-usuarios', 'administradorController@administradorUsuarios');
	Route::get('motivos-consultas', 'administradorController@motivosConsultas');
	Route::get('carga-motivos', 'administradorController@cargaMotivos');
	Route::post('registrar-motivo', 'administradorController@registrarMotivo');
	Route::get('buscar_motivo', 'administradorController@buscarMotivo');
	Route::get('estados_citas', 'administradorController@estadosCitas');
	Route::get('carga-Estados', 'administradorController@cargaEstados');
	Route::post('registrar-estado', 'administradorController@registrarEstado');
	Route::get('buscar_Estado', 'administradorController@buscarEstado');
	Route::get('carga-Usuarios', 'administradorController@cargaUsuarios');
	Route::post('registrar-usuario', 'administradorController@registrarUsuario');
	Route::get('convenios', 'administradorController@Convenios');
	Route::get('carga-Convenios', 'administradorController@cargaConvenios');
	Route::post('registrar-Convenio', 'administradorController@registrarConvenio');
	Route::get('buscar_Convenio', 'administradorController@buscarConvenio');
	Route::get('buscar_usuario', 'administradorController@buscarUsuario');
	Route::get('listar_sucursales', 'administradorController@listarSucursales');
	Route::get('listar_especialidades', 'administradorController@listarEspecialidades');
	Route::post('subir-foto', 'administradorController@subirFoto');


});



// Route::get('listar-pacientes', function () {
//     $BD = Auth::user()->Empresa;
//     return \App\Pacientes::on($BD)->get();
// });
// 

