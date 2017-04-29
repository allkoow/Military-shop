<?php

Route::group(['prefix' => 'adminpanel',
			  'middleware' => 'roles',
			  'roles' => 'administrator'], function() 
{
	Route::get('','Admin\AdminController@index');
	
	// Route for adminpanel.products
	Route::resource('products','Admin\AdminProductsController', 
					['except' => 'show']);
	
	Route::get('get-sizes-list/{id}','Admin\AdminProductsController@getSizesList');

	// Routes for adminpanel.orders
	Route::resource('orders', 'Admin\AdminOrdersController', 
					['except' => [ 'destroy','create','store']]);

	// Route for adminpanel.categories
	Route::get('categories', [
			   'as' => 'categories.index',
			   'uses' => 'Admin\AdminCategoriesController@index'
	]);

	Route::get('categories/create', [
				'as' => 'categories.create',
				'uses' => 'Admin\AdminCategoriesController@create'
	]);

	Route::post('categories/storecategory', [
			   'as' => 'categories.storecategory',
			   'uses' => 'Admin\AdminCategoriesController@storeCategory'
	]);

	Route::get('categories/{id}/edit', [
			   'as' => 'categories.edit',
			   'uses' => 'Admin\AdminCategoriesController@edit'
	]);

	Route::delete('categories/{id}', [
				'as' => 'categories.destroy',
				'uses' => 'Admin\AdminCategoriesController@destroy'
	]);

	Route::group(['prefix' => 'deliveries'], function() {
			Route::get('', [
				'as' => 'deliveries.index',
				'uses' => 'Admin\AdminDeliveriesController@index'
			]);

			Route::put('update', [
				'as' => 'deliveries.update',
				'uses' => 'Admin\AdminDeliveriesController@update'
			]);

			Route::post('store', [
				'as' => 'deliveries.store',
				'uses' => 'Admin\AdminDeliveriesController@store'
			]);
	});

	Route::group(['prefix' => 'payments'], function() {
			Route::get('', [
				'as' => 'payments.index',
				'uses' => 'Admin\AdminPaymentsController@index'
			]);

			Route::put('update', [
				'as' => 'payments.update',
				'uses' => 'Admin\AdminPaymentsController@update'
			]);

			Route::post('store', [
				'as' => 'payments.store',
				'uses' => 'Admin\AdminPaymentsController@store'
			]);
	});

	Route::group(['prefix' => 'brands'], function() {
			Route::get('', [
				'as' => 'brands.index',
				'uses' => 'Admin\AdminBrandsController@index'
			]);

			Route::put('update', [
				'as' => 'brands.update',
				'uses' => 'Admin\AdminBrandsController@update'
			]);

			Route::post('store', [
				'as' => 'brands.store',
				'uses' => 'Admin\AdminBrandsController@store'
			]);
	});
	
	// Route for adminpanel.users
	Route::get('users', [
			   'as' => 'users.index',
			   'uses' => 'Admin\AdminUsersController@index'
	]);
});