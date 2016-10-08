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

Route::get('/', function () {
    return view('login');
});
