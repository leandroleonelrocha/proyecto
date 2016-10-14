<?php

Route::group(['prefix' => 'materia'], function(){

	Route::get('/',[
		'as' => 'materia.index',
		'uses' => 'MateriaController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'materia.nuevo',
		'uses' => 'MateriaController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'materia.postAdd',
		'uses' => 'MateriaController@postAdd'
	]);

	Route::post('postEditar',[
	'as'	=> 'materia.postEdit',
	'uses'	=>	'MateriaController@postEdit'
	]);
	Route::get('editar/{id}',[
	'as'	=> 'materia.edit',
	'uses'	=>	'MateriaController@edit'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'materia.getDelete',
	'uses'	=>	'MateriaController@getDelete'
	]);
});