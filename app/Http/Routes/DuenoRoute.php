<?php

// Route::group(['prefix' => 'dueño'], function(){

	//Inicio Rol Dueño
	Route::get('inicio',[
		'as' => 'dueño.inicio',
		'uses' => 'DuenoController@index'
	 ]);

	// Rutas Operaciones ---------- Filiales
	Route::get('filiales',[
		'as' 	=> 'dueño.filiales',
		'uses' 	=> 'FilialesController@lista'
	 ]);

	Route::get('filiales_nuevo', [
		'as' 	=> 'dueño.filiales_nuevo',
		'uses' 	=> 'FilialesController@nuevo'
	]);

	Route::post('filiales_nuevo_post', [
		'as' 	=> 'dueño.filiales_nuevo_post',
		'uses' 	=> 'FilialesController@nuevo_post'
	]);

	Route::get('filiales_borrar/{id}',[
		'as'	=> 'dueño.filiales_borrar',
		'uses'	=>	'FilialesController@borrar'
	]);

	Route::get('filiales_editar/{id}',[
		'as'	=> 'dueño.filiales_editar',
		'uses'	=>	'FilialesController@editar'
	]);
	
	Route::post('filiales_editar_post',[
		'as'	=> 'dueño.filiales_editar_post',
		'uses'	=>	'filialesController@editar_post'
	]);

	// Rutas Operaciones ---------- Directores
	Route::get('directores',[
		'as' 	=> 'dueño.directores',
		'uses' 	=> 'DirectoresController@lista'
	 ]);

	Route::get('directores_nuevo', [
		'as' 	=> 'dueño.directores_nuevo',
		'uses' 	=> 'DirectoresController@nuevo'
	]);

	Route::post('directores_nuevo_post', [
		'as' 	=> 'dueño.directores_nuevo_post',
		'uses' 	=> 'DirectoresController@nuevo_post'
	]);

	Route::get('directores_borrar/{id}',[
		'as'	=> 'dueño.directores_borrar',
		'uses'	=>	'DirectoresController@borrar'
	]);

	Route::get('directores_editar/{id}',[
		'as'	=> 'dueño.directores_editar',
		'uses'	=>	'DirectoresController@editar'
	]);

	Route::post('directores_editar_post',[
		'as'	=> 'dueño.directores_editar_post',
		'uses'	=>	'DirectoresController@editar_post'
	]);

	// Rutas Operaciones ---------- Estadísticas
// });
