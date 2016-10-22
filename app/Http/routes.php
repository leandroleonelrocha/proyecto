<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
require_once(__DIR__ . '/Routes/LoginRoute.php');
require_once(__DIR__ . '/Routes/UsuarioRoute.php');
require_once(__DIR__ . '/Routes/AlumnoRoute.php');
require_once(__DIR__ . '/Routes/DocenteRoute.php');
require_once(__DIR__ . '/Routes/FilialesRoute.php');
require_once(__DIR__ . '/Routes/LenguajeRoute.php');
require_once(__DIR__ . '/Routes/PreinformesRoute.php');
require_once(__DIR__ . '/Routes/DirectorRoute.php');
require_once(__DIR__ . '/Routes/CursoRoute.php');
require_once(__DIR__ . '/Routes/CarreraRoute.php');
require_once(__DIR__ . '/Routes/MateriaRoute.php');
require_once(__DIR__ . '/Routes/AsesorRoute.php');
require_once(__DIR__ . '/Routes/PersonaRoute.php');

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => ['auth']], function() {


	

	Route::get('prueba', [
		'uses' => 'PruebaController@test'
	]);



	Route::get('template', function(){
		return view('template');
	});        

});
