<?php

Route::group(['prefix' => 'alumnos'], function(){

	Route::get('/',[
		'as' => 'alumnos.index',
		'uses' => 'AlumnoController@index'
	 ]);

	Route::get('nuevo', [

		'as' => 'alumnos.nuevo',
		'uses' => 'AlumnoController@nuevo'
	]);

	Route::post('postNuevo', [

		'as' => 'alumnos.postNuevo',
		'uses' => 'AlumnoController@postNuevo'
	]);

});



