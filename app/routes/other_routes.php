<?php

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('logout', function() {
	Auth::logout();

	return redirect()->action('HomeController@index');
});

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');