<?php

// Route for ORDER
Route::group(['prefix' => 'order',
	          'middleware' => 'order'
], function() 
{ 
	   Route::get('', [
	   			  'as' => 'order.index',
	   			  'uses' => 'OrderController@index'
	   ]);

	   Route::get('create', [
	   			  'as' => 'order.create', 
	   			  'uses' => 'OrderController@create'
	   ]);

	   Route::post('summary', [
	   			  'as' => 'order.summary',
	   			  'uses' => 'OrderController@summary'
	   ]);

	   Route::post('', [
	   			   'as' => 'order.store', 
	   			   'uses' => 'OrderController@store'
	   ]);

	   Route::get('confirmation', [
	   			  'as' => 'order.confirm',
	   			  'uses' => 'OrderController@confirm'
	   ]);

});