<?php

Route::group(['prefix' => 'asesor'], function(){

	Route::get('/',[
		'as' => 'asesor.index',
		'uses' => 'AsesorController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'asesor.nuevo',
		'uses' => 'AsesorController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'asesor.postAdd',
		'uses' => 'AsesorController@postAdd'
	]);

	Route::get('editar/{id}',[
	'as'	=> 'asesor.edit',
	'uses'	=>	'AsesorController@edit'
	]);

	Route::post('postEditar',[
	'as'	=> 'asesor.postEdit',
	'uses'	=>	'AsesorController@postEdit'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'asesor.getDelete',
	'uses'	=>	'AsesorController@getDelete'
	]);
});