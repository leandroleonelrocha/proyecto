<?php

Route::group(['prefix' => 'curso'], function(){

	Route::get('/',[
		'as' => 'curso.index',
		'uses' => 'CursoController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'curso.nuevo',
		'uses' => 'CursoController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'curso.postAdd',
		'uses' => 'CursoController@postAdd'
	]);

	Route::get('editar/{id}',[
	'as'	=> 'curso.edit',
	'uses'	=>	'CursoController@edit'
	]);

	Route::post('postEditar',[
	'as'	=> 'curso.postEdit',
	'uses'	=>	'CursoController@postEdit'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'curso.getDelete',
	'uses'	=>	'CursoController@getDelete'
	]);
});