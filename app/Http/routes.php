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
require_once(__DIR__ . '/Routes/DuenoRoute.php');
require_once(__DIR__ . '/Routes/FilialRoute.php');
require_once(__DIR__ . '/Routes/DirectorRoute.php');
require_once(__DIR__ . '/Routes/AsesorRoute.php');
require_once(__DIR__ . '/Routes/PersonaRoute.php');
/*
require_once(__DIR__ . '/Routes/CursoRoute.php');
require_once(__DIR__ . '/Routes/CarreraRoute.php');
require_once(__DIR__ . '/Routes/MateriaRoute.php');
require_once(__DIR__ . '/Routes/AsesorRoute.php');
require_once(__DIR__ . '/Routes/PersonaRoute.php');

require_once(__DIR__ . '/Routes/LenguajeRoute.php');

require_once(__DIR__ . '/Routes/UsuarioRoute.php'); // Esto? 
require_once(__DIR__ . '/Routes/AlumnoRoute.php'); 	// Esto?

*/
Route::get('/', function () {
    return view('login');
});
