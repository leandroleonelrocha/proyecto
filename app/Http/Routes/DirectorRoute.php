<?php

Route::group(['prefix' => 'director'], function(){

	Route::get('/',[
		'as' => 'director.index',
		'uses' => 'DirectorController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'director.nuevo',
		'uses' => 'DirectorController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'director.postAdd',
		'uses' => 'DirectorController@postAdd'
	]);

	Route::get('editar/{id}',[
	'as'	=> 'director.edit',
	'uses'	=>	'DirectorController@edit'
	]);

	Route::post('postEditar',[
	'as'	=> 'director.postEdit',
	'uses'	=>	'DirectorController@postEdit'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'director.getDelete',
	'uses'	=>	'DirectorController@getDelete'
	]);


});