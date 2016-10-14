<?php 

Route::group(['prefix' => 'docentes'], function(){
	Route::get('/', [
		'as'	=>	'docentes.index',
		'uses'	=>	'DocenteController@index'
	]);

	Route::get('nuevo',[
		'as'	=>	'docentes.add',
		'uses'	=>	'DocenteController@add'
	]);

	Route::post('postNuevo',[
		'as'	=>	'docentes.postAdd',
		'uses'	=>	'DocenteController@postAdd'
	]);

	Route::get('delete/{id}',[
		'as'	=> 'docentes.delete',
		'uses'	=>	'DocenteController@delete'
	]);

	Route::get('editar/{id}',[
		'as'	=> 'docentes.edit',
		'uses'	=>	'DocenteController@edit'
	]);

	Route::post('postEditar',[
		'as'	=> 'docentes.postEdit',
		'uses'	=>	'DocenteController@postEdit'
	]);
});