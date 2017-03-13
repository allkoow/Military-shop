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
		
		// Route for userpanel.addresses
		Route::resource('userpanel/addresses', 'UserAddressesController', [
						'except' => 'show']);
		
		Route::get('userpanel/addresses/{id}/setdefault', [
				   'as' => 'addresses.setdefault',
				   'uses' => 'UserAddressesController@setDefaultAddress'
		]);

		// Route for userpanel.orders
		Route::get('userpanel/orders', [
				   'as' => 'userpanel.orders',
				   'uses' => 'UserOrdersController@index'
		]);

		// Route for userpanel.settings
		Route::get('userpanel/settings', [
				   'as' => 'userpanel.settings',
				   'uses' => 'UserSettingsController@index'
		]);

		Route::put('userpanel/settings/editInformation', [
				   'as' => 'userpanel.information.edit',
				   'uses' => 'UserSettingsController@editInformation'
		]);

		Route::put('userpanel/settings/editPassword', [
				   'as' => 'userpanel.password.edit',
				   'uses' => 'UserSettingsController@editPassword'
		]);
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

// Route for cart
Route::get('cart',[
		   'as' => 'cart',
		   'uses' => 'CartController@index'
]);

Route::post('cart/add/{id}',[
		    'as' => 'cart.add',
		    'uses' => 'CartController@add'
]);

Route::post('cart/discard/{id}',[
		    'as' => 'cart.discard',
		    'uses' => 'CartController@discard'
]);

Route::post('cart/set-quantity/{id}',[
		    'as' => 'cart.setquantity',
		    'uses' => 'CartController@setQuantity'
]);

Route::get('cart/pull', [
		   'as' => 'cart.pull',
		   'uses' => 'CartController@pull'
]);


