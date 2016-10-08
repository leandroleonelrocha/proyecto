<?php 

Route::get('docentes', [
	'as'	=>	'docentes.index',
	'uses'	=>	'DocenteController@index'
]);

Route::get('nuevo',[
	'as'	=>	'nuevo.add',
	'uses'	=>	'DocenteController@add'
]);

Route::post('postNuevo',[
	'as'	=>	'nuevo.postAdd',
	'uses'	=>	'DocenteController@postAdd'
]);

Route::get('delete/{id}',[
	'as'	=> 'delete',
	'uses'	=>	'DocenteController@delete'
]);

Route::get('editar/{id}',[
	'as'	=> 'editar.edit',
	'uses'	=>	'DocenteController@edit'
]);

Route::post('postEditar',[
	'as'	=> 'editar.postEdit',
	'uses'	=>	'DocenteController@postEdit'
]);