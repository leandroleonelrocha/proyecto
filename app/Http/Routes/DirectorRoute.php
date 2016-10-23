<?php

Route::group(['prefix' => 'director'], function(){

	Route::get('/',[
		'as' => 'director.index',
		'uses' => 'DirectorController@index'
	 ]);

});