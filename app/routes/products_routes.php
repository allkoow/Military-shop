<?php

// Route for products
Route::get('products', [
		   'as' => 'products.index',
		   'uses' => 'ProductsController@index'
]);

Route::get('products/{product}', [
		   'as' => 'products.show',
		   'uses' => 'ProductsController@show'
]);

Route::post('products/search', [
		    'as' => 'products.search',
		    'uses' => 'ProductsController@search'
]);