<?php

Route::group(['prefix' => 'filial'], function(){

	// Inicio Rol Filial
	Route::get('inicio',[
		'as' => 'filial.inicio',
		'uses' => 'FilialesController@index'
	 ]);
	// Rutas Operaciones ---------- Personas

	// Rutas Operaciones ---------- Preinformes
	Route::get('preinformes',[
		'as' => 'filial.preinformes',
		'uses' => 'PreinformeController@lista'
	 ]);

	Route::get('preinformes_seleccion',[
		'as' => 'filial.preinformes_seleccion',
		'uses' => 'PreinformeController@seleccion'
	 ]);

	Route::get('preinformes_nuevo/{id}',[
		'as'	=>	'filial.preinformes_nuevo',
		'uses'	=>	'PreinformeController@nuevo'
	]);

	Route::get('preinformes_nuevaPersona',[
		'as'	=>	'filial.preinformes_nuevaPersona',
		'uses'	=>	'PreinformeController@nuevaPersona'
	]);

	Route::post('preinformes_nuevo_post',[
		'as'	=>	'filial.preinformes_nuevo_post',
		'uses'	=>	'PreinformeController@nuevo_post'
	]);

	Route::post('preinformes_nuevaPersona_post',[
		'as'	=>	'filial.preinformes_nuevaPersona_post',
		'uses'	=>	'PreinformeController@nuevaPersona_post'
	]);

	Route::get('preinformes_editar/{id}',[
		'as'	=> 'filial.preinformes_editar',
		'uses'	=>	'PreinformeController@editar'
	]);

	Route::post('preinformes_editar_post',[
		'as'	=> 'filial.preinformes_editar_post',
		'uses'	=>	'PreinformeController@editar_post'
	]);

	// Rutas Operaciones ---------- Matrículas
	Route::get('matriculas',[
		'as'   => 'filial.matriculas',
		'uses' => 'MatriculaController@lista'
	 ]);

	Route::get('matriculas_seleccion',[
		'as'   => 'filial.matriculas_seleccion',
		'uses' => 'MatriculaController@seleccion'
	 ]);

	Route::get('matriculas_nuevo/{id}',[
		'as'	=>	'filial.matriculas_nuevo',
		'uses'	=>	'MatriculaController@nuevo'
	]);

	Route::get('matriculas_nuevaPersona',[
		'as'	=>	'filial.matriculas_nuevaPersona',
		'uses'	=>	'MatriculaController@nuevaPersona'
	]);

	Route::post('matriculas_nuevo_post',[
		'as'	=>	'filial.matriculas_nuevo_post',
		'uses'	=>	'MatriculaController@nuevo_post'
	]);

	Route::post('matriculas_nuevaPersona_post',[
		'as'	=>	'filial.matriculas_nuevaPersona_post',
		'uses'	=>	'MatriculaController@nuevaPersona_post'
	]);

	Route::get('matriculas_editar/{id}',[
		'as'	=> 'filial.matriculas_editar',
		'uses'	=>	'MatriculaController@editar'
	]);

	Route::post('matriculas_editar_post',[
		'as'	=> 'filial.matriculas_editar_post',
		'uses'	=>	'MatriculaController@editar_post'
	]);

	Route::get('matriculas_borrar/{id}',[
		'as'	=> 'filial.matriculas_borrar',
		'uses'	=>	'MatriculaController@borrar'
	]);

	// Rutas Operaciones ---------- Recibos

	// Rutas Operaciones ---------- Cursos
	Route::get('cursos',[
		'as' 	=> 'filial.cursos',
		'uses' 	=> 'CursoController@lista'
	 ]);

	Route::get('cursos_nuevo', [
		'as' 	=> 'filial.cursos_nuevo',
		'uses' 	=> 'CursoController@nuevo'
	]);

	Route::post('cursos_nuevo_post', [
		'as' => 'filial.cursos_nuevo_post',
		'uses' => 'CursoController@nuevo_post'
	]);

	Route::get('cursos_editar/{id}',[
	'as'	=> 'filial.cursos_editar',
	'uses'	=>	'CursoController@editar'
	]);

	Route::post('cursos_editar_post',[
	'as'	=> 'filial.cursos_editar_post',
	'uses'	=>	'CursoController@editar_post'
	]);

	Route::get('cursos_borrar/{id}',[
	'as'	=> 'filial.cursos_borrar',
	'uses'	=>	'CursoController@borrar'
	]);

	// Rutas Operaciones ---------- Carreras
	Route::get('carreras',[
		'as' 	=> 'filial.carreras',
		'uses' 	=> 'CarreraController@lista'
	]);

	Route::get('carreras_nuevo', [
		'as' 	=> 'filial.carreras_nuevo',
		'uses' 	=> 'CarreraController@nuevo'
	]);

	Route::post('carreras_nuevo_post', [
		'as' 	=> 'filial.carreras_nuevo_post',
		'uses' 	=> 'CarreraController@nuevo_post'
	]);

	Route::get('carreras_editar/{id}',[
		'as'	=> 'filial.carreras_editar',
		'uses'	=>	'CarreraController@editar'
	]);

	Route::post('carreras_editar_post',[
		'as'	=> 'filial.carreras_editar_post',
		'uses'	=>	'CarreraController@editar_post'
	]);

	Route::get('carreras_borrar/{id}',[
		'as'	=> 'filial.carreras_borrar',
		'uses'	=>	'CarreraController@borrar'
	]);

	// Rutas Operaciones ---------- Materias
	Route::get('materias',[
		'as' 	=> 'filial.materias',
		'uses' 	=> 'MateriaController@lista'
	 ]);

	Route::get('materias_nuevo', [
		'as' 	=> 'filial.materias_nuevo',
		'uses' 	=> 'MateriaController@nuevo'
	]);

	Route::post('materias_nuevo_post', [
		'as' 	=> 'filial.materias_nuevo_post',
		'uses' 	=> 'MateriaController@nuevo_post'
	]);

	Route::get('materias_editar/{id}',[
		'as'	=> 'filial.materias_editar',
		'uses'	=>	'MateriaController@editar'
	]);

	Route::post('materias_editar_post',[
		'as'	=> 'filial.materias_editar_post',
		'uses'	=>	'MateriaController@editar_post'
	]);

	Route::get('materias_borrar/{id}',[
		'as'	=> 'filial.materias_borrar',
		'uses'	=>	'MateriaController@borrar'
	]);

	// Rutas Operaciones ---------- Grupos

	// Rutas Operaciones ---------- Exámenes

	// Rutas Operaciones ---------- Asesores

	// Rutas Operaciones ---------- Docentes
	Route::get('docentes', [
		'as'	=>	'filial.docentes',
		'uses'	=>	'DocenteController@lista'
	]);

	Route::get('docentes_nuevo',[
		'as'	=>	'filial.docentes_nuevo',
		'uses'	=>	'DocenteController@nuevo'
	]);

	Route::post('docentes_nuevo_post',[
		'as'	=>	'filial.docentes_nuevo_post',
		'uses'	=>	'DocenteController@nuevo_post'
	]);

	Route::get('docentes_borrar/{id}',[
		'as'	=> 'filial.docentes_borrar',
		'uses'	=>	'DocenteController@borrar'
	]);

	Route::get('docentes_editar/{id}',[
		'as'	=> 'filial.docentes_editar',
		'uses'	=>	'DocenteController@editar'
	]);

	Route::post('docentes_editar_post',[
		'as'	=> 'filial.docentes_editar_post',
		'uses'	=>	'DocenteController@editar_post'
	]);
	
	// Rutas Operaciones ---------- Estadísticas
});
