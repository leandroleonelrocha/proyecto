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
require_once(__DIR__ . '/Routes/rol_dueno_rutas/DuenoRoute.php');
require_once(__DIR__ . '/Routes/rol_filial_rutas/FilialRoute.php');
require_once(__DIR__ . '/Routes/rol_director_rutas/DirectorRoute.php');
require_once(__DIR__ . '/Routes/LenguajeRoute.php');

require_once(__DIR__ . '/Routes/UsuarioRoute.php'); // Esto?

Route::get('/', function () {
    return view('login');
});
