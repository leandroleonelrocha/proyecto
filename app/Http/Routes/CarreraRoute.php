<?php

Route::group(['prefix' => 'carrera'], function(){

	Route::get('/',[
		'as' => 'carrera.index',
		'uses' => 'CarreraController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'carrera.nuevo',
		'uses' => 'CarreraController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'carrera.postAdd',
		'uses' => 'CarreraController@postAdd'
	]);


	Route::post('postEditar',[
	'as'	=> 'carrera.postEdit',
	'uses'	=>	'CarreraController@postEdit'
	]);
	Route::get('editar/{id}',[
	'as'	=> 'carrera.edit',
	'uses'	=>	'CarreraController@edit'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'carrera.getDelete',
	'uses'	=>	'CarreraController@getDelete'
	]);
});