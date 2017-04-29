<?php

Route::group(['prefix' => 'userpanel',
			  'middleware' => 'roles',
	          'roles' => 'użytkownik'], function() 
{
	// Route for userpanel.addresses
	Route::resource('addresses', 'User\UserAddressesController', [
					'except' => 'show']);
	
	// Route for userpanel.orders
	Route::get('orders', [
			   'as' => 'userpanel.orders.index',
			   'uses' => 'User\UserOrdersController@index'
	]);

	Route::get('orders/{order}', [
			   'as' => 'userpanel.orders.show', 
			   'uses' => 'User\UserOrdersController@show'
	]);

	// Route for userpanel.settings
	Route::get('settings', [
			   'as' => 'userpanel.settings',
			   'uses' => 'User\UserSettingsController@index'
	]);

	Route::put('settings/editInformation', [
			   'as' => 'userpanel.information.edit',
			   'uses' => 'User\UserSettingsController@editInformation'
	]);

	Route::put('settings/editPassword', [
			   'as' => 'userpanel.password.edit',
			   'uses' => 'User\UserSettingsController@editPassword'
	]);
});