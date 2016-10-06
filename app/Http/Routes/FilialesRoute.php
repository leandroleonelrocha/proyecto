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

		Route::post('postEdit', [

		'as' => 'filiales.postEdit',
		'uses' => 'FilialesController@postEdit'
	]);

});
