<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Subcategories;

Auth::routes();

Route::get('logout', function() {
	Auth::logout();

	return redirect()->action('HomeController@index');
});

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::group([
	'middleware' => 'roles',
	'roles' => 'użytkownik'
	], function() {
		Route::get('userpanel', 'UserpanelController@index');
		Route::get('userpanel/addresses', 'UserpanelController@addresses');
		Route::get('userpanel/orders','UserpanelController@orders');
		Route::get('userpanel/settings','UserpanelController@settings');

		Route::post('userpanel/edit', 'UserpanelController@edit');
		Route::post('userpanel/changePassword', 'UserpanelController@changePassword');

		Route::get('userpanel/addaddress', 'UserpanelController@addAddress');
		Route::post('userpanel/storeaddress', 'UserpanelController@storeAddress');
		Route::get('userpanel/editaddress/{id}', 'UserpanelController@editAddress');
		Route::post('userpanel/editaddress/updateaddress', 'UserpanelController@updateAddress');
		Route::get('userpanel/deleteaddress/{id}', 'UserpanelController@deleteAddress');
		Route::get('userpanel/setdefaultaddress/{id}', 'UserpanelController@setDefaultAddress');
});

Route::group([
	'middleware' => 'roles',
	'roles' => 'administrator'
	], function() {
		Route::get('adminpanel','AdminController@index');
		Route::resource('adminpanel/products','AdminProductsController', ['except' =>
						['show']
						]);
		Route::resource('adminpanel/orders', 'AdminOrdersController', ['except' => 
						[ 'destroy','create','store']
						]);

		// Route for adminpanel.categories
		Route::get('adminpanel/categories', [
				   'as' => 'categories.index',
				   'uses' => 'AdminCategoriesController@index'
		]);

		Route::post('adminpanel/categories/storecategory', [
				   'as' => 'categories.storecategory',
				   'uses' => 'AdminCategoriesController@storeCategory'
		]);

		Route::post('adminpanel/categories/checkaction/{category}', [
				   'as' => 'categories.checkaction',
				   'uses' => 'AdminCategoriesController@checkAction'
		]);

		// Route for adminpanel.deliveries
		Route::get('adminpanel/deliveries', [
					'as' => 'deliveries.index',
					'uses' => 'AdminDeliveriesController@index'
		]);

		Route::put('adminpanel/deliveries/update', [
				   'as' => 'deliveries.update',
				   'uses' => 'AdminDeliveriesController@update'
		]);

		Route::post('adminpanel/deliveries/store', [
				   'as' => 'deliveries.store',
				   'uses' => 'AdminDeliveriesController@store'
		]);

		// Route for adminpanel.brands
		Route::get('adminpanel/brands', [
					'as' => 'brands.index',
					'uses' => 'AdminBrandsController@index'
		]);

		Route::put('adminpanel/brands/update', [
					'as' => 'brands.update',
					'uses' => 'AdminBrandsController@update'
		]);

		Route::post('adminpanel/brands/store', [
					'as' => 'brands.store',
					'uses' => 'AdminBrandsController@store'
		]);

		// Route for adminpanel.users
		Route::get('adminpanel/users', [
				   'as' => 'users.index',
				   'uses' => 'AdminUsersController@index'
		]);

});

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


