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

		Route::post('postEdit', [

		'as' => 'director.postEdit',
		'uses' => 'DirectorController@postEdit'
	]);

});