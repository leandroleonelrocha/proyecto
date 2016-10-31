<?php

Route::group(['prefix' => 'grupos'], function(){

	Route::get('/',[
		'as' => 'grupos.index',
		'uses' => 'GrupoController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'grupos.nuevo',
		'uses' => 'GrupoController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'grupos.postAdd',
		'uses' => 'GrupoController@postAdd'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'grupos.getDelete',
	'uses'	=>	'GrupoController@getDelete'
	]);

	
	Route::post('postEditar',[
	'as'	=> 'grupos.postEdit',
	'uses'	=>	'GrupoController@postEdit'
	]);

	Route::get('editar/{id}',[
	'as'	=> 'grupos.edit',
	'uses'	=>	'GrupoController@edit'
	]);


	Route::get('clases',[

		'as' => 'grupos.clases',
		'uses' => 'GrupoController@clases'
	]);

	Route::get('clases/matricula/{id}',[

		'as' => 'grupos.clase_matricula',
		'uses' => 'GrupoController@clase_matricula'
	]);

	Route::post('cargar_clase',[

		'as' => 'grupos.cargar_clase',
		'uses' => 'GrupoController@cargar_clase'
	]);



	Route::post('process', [

		'as' => 'grupos.process',
		'uses' => 'GrupoController@process'
	]);
});