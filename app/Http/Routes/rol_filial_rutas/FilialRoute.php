<?php

Route::group(['prefix' => 'filial'], function(){

	// Inicio Rol Filial
	Route::get('inicio',[
		'as' => 'filial.inicio',
		'uses' => 'FilialesController@index'
	 ]);

	// Rutas Operaciones -------- Personas
	// require_once('PersonasRoute.php');
	
	// Rutas Operaciones ---------- Preinformes
	require_once('PreinformesRoute.php');

	// Rutas Operaciones ---------- Matrículas
	require_once('MatriculasRoute.php');

	// Rutas Operaciones ---------- Recibos
	// require_once('Route.php');

	// Rutas Operaciones ---------- Cursos
	require_once('CursosRoute.php');

	// Rutas Operaciones ---------- Carreras
	require_once('CarrerasRoute.php');

	// Rutas Operaciones ---------- Materias
	require_once('MateriasRoute.php');

	// Rutas Operaciones ---------- Grupos
	require_once('GrupoRoute.php');

	// require_once('GruposRoute.php');

	// Rutas Operaciones ---------- Exámenes
	// require_once('ExamenesRoute.php');

	// Rutas Operaciones ---------- Asesores
	// require_once('AsesoresRoute.php');

	// Rutas Operaciones ---------- Docentes
	require_once('DocentesRoute.php');
	
	// Rutas Operaciones ---------- Estadísticas
	// require_once('Route.php');
});
