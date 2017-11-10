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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//PERSONAS
Route::get('/tabla', 'PersonaController@index');
Route::get('/listar', 'PersonaController@GetDatos');

//CREAR
Route::get('/crear', 'PersonaController@VistaCrear');
Route::post('/tabla', 'PersonaController@Registrar');

//EDITAR
Route::get('/editar/{id}', 'PersonaController@Mostrar');
Route::put('/editar/{id}', 'PersonaController@Editar');

//ELIMINAR
Route::get('/eliminar/{id}', 'PersonaController@Eliminar');

//DOMPDF
Route::get('/pdf', function(){
	$personas = DB::select("SELECT pers_fnac,
		CASE
	        WHEN pers_sexo='1' THEN 'Masculino'
	        WHEN pers_sexo='0' THEN 'Femenino'
    	END as sexualidad,
    	pers_nro_doc,pers_tip_doc,pers_raz_soc,
		(pers_nombres || ', ' || pers_ape_pat || ' ' || pers_ape_mat) as nombre,
		contribuyente 
		FROM adm_tri.vw_personas 
		ORDER BY id_pers 
		DESC LIMIT 30");


	$pdf = PDF::loadView('persona.vistapdf', ['personas' => $personas])->setPaper('a4', 'landscape')->setWarnings(false)->setOptions(['defaultFont' => 'comic-sans']);;
	return $pdf->download('archivo.pdf');
});


