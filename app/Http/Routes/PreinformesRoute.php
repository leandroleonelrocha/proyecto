<?php 

Route::group(['prefix' => 'preinformes'], function(){

	Route::get('/',[
		'as' => 'preinformes.index',
		'uses' => 'PreinformeController@index'
	 ]);

	Route::get('nuevo',[
		'as'	=>	'preinformes.add',
		'uses'	=>	'PreinformeController@add'
	]);

	Route::post('postNuevo',[
		'as'	=>	'preinformes.postAdd',
		'uses'	=>	'PreinformeController@postAdd'
	]);
});
