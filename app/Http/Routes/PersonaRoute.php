<?php

Route::group(['prefix' => 'persona'], function(){

	Route::get('/',[
		'as' => 'persona.index',
		'uses' => 'PersonaController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'persona.nuevo',
		'uses' => 'PersonaController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'persona.postAdd',
		'uses' => 'PersonaController@postAdd'
	]);

	Route::get('editar/{id}',[
	'as'	=> 'persona.edit',
	'uses'	=>	'PersonaController@edit'
	]);

	Route::post('postEditar',[
	'as'	=> 'persona.postEdit',
	'uses'	=>	'PersonaController@postEdit'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'persona.getDelete',
	'uses'	=>	'PersonaController@getDelete'
	]);
});