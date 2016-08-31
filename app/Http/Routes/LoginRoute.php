<?php 

Route::get('login', function(){

	return view('login');

});

Route::post('postLogin', [

	'as' => 'auth.postLogin',
	'uses' => 'LoginController@postLogin'

]);