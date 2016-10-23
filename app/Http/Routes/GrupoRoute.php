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

});
