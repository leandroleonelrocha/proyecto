<?php

Route::group(['prefix' => 'filiales'], function(){

	Route::get('/',[
		'as' => 'filiales.index',
		'uses' => 'FilialesController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'filiales.nuevo',
		'uses' => 'FilialesController@nuevo'
	]);

	Route::post('postAdd', [

		'as' => 'filiales.postAdd',
		'uses' => 'FilialesController@postAdd'
	]);

	Route::get('getDelete/{id}',[
	'as'	=> 'filiales.getDelete',
	'uses'	=>	'FilialesController@getDelete'
	]);

	
	Route::post('postEditar',[
	'as'	=> 'filiales.postEdit',
	'uses'	=>	'filialesController@postEdit'
	]);

	Route::get('editar/{id}',[
	'as'	=> 'filiales.edit',
	'uses'	=>	'FilialesController@edit'
	]);
});
