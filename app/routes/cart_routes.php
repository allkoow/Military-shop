<?php

Route::group(['prefix' => 'cart'], function() {
	Route::get('',[
			   'as' => 'cart',
			   'uses' => 'CartController@index'
	]);

	Route::post('add/{id}',[
			    'as' => 'cart.add',
			    'uses' => 'CartController@add'
	]);

	Route::post('discard/{id}',[
			    'as' => 'cart.discard',
			    'uses' => 'CartController@discard'
	]);

	Route::post('set-quantity/{id}',[
			    'as' => 'cart.setquantity',
			    'uses' => 'CartController@setQuantity'
	]);

	Route::get('pull', [
			   'as' => 'cart.pull',
			   'uses' => 'CartController@pull'
	]);
});