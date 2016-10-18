<?php 

Route::group(['prefix' => 'preinformes'], function(){

	Route::get('/',[
		'as' => 'preinformes.index',
		'uses' => 'PreinformeController@index'
	 ]);

	Route::get('seleccion',[
		'as' => 'preinformes.seleccion',
		'uses' => 'PreinformeController@seleccion'
	 ]);

	Route::get('nuevo/{id}',[
		'as'	=>	'preinformes.add',
		'uses'	=>	'PreinformeController@add'
	]);

	Route::get('nuevaPersona',[
		'as'	=>	'preinformes.addPersona',
		'uses'	=>	'PreinformeController@addNuevaPersona'
	]);

	Route::post('postNuevo',[
		'as'	=>	'preinformes.postAdd',
		'uses'	=>	'PreinformeController@postAdd'
	]);

	Route::post('postNuevaPersona',[
		'as'	=>	'preinformes.postAddPersona',
		'uses'	=>	'PreinformeController@postAddPersona'
	]);

	Route::get('editar/{id}',[
		'as'	=> 'preinformes.edit',
		'uses'	=>	'PreinformeController@edit'
	]);

	Route::post('postEditar',[
		'as'	=> 'preinformes.postEdit',
		'uses'	=>	'PreinformeController@postEdit'
	]);
});
