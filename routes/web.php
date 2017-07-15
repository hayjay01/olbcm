<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
	'uses' => 'GuestController@index', 
	'as' => 'welcome'
]);

Route::post('guest/login', [
	'uses' => 'GuestAuthController@login',
	'as' => 'guest.login',
]);

Route::get('/home', [
	'uses' => 'CustomerAuthController@index',  
	'as' => 'home',
	]);

Route::get('/login', 'CustomerAuthController@generalLogin');

Route::get('/about', [
	'uses' => 'CustomerAuthController@about',
	'as' => 'about',
	]);

Route::get('/contact', [
	'uses' => 'CustomerAuthController@contact',
	'as' => 'contact',
	]);

Route::post('/customer/login', [
	'uses' => 'FrontEndController@login',
	'as' => 'customer.login',
	]);

Route::get('/error404', [
		'uses' => 'CustomerAuthController@error',
		'as' => 'error.404',
	]);

/*admin route*/
Route::group(['prefix' => 'admin'], function() {

	Route::get('/home', [
		'uses' => 'AdministratorsController@index',
		'as' => 'admin.home',
		]);

	Route::get('/login', [
	'uses' => 'AdminAuthController@getLogin',
	'as' => 'admin_login',
	]);

	Route::post('/login-process', [
	'uses' => 'AdminAuthController@login', 
	'as' => 'admin.login',
	]);

	Route::get('/customer/create', [
		'uses' => 'AdministratorsController@create',
		'as' => 'user.create',
		]);

	Route::post('/customer/store', [
		'uses' => 'AdministratorsController@store',
		'as' => 'user.store',
		]);

	Route::get('/customer/delete/{id}', [
		'uses' => 'AdministratorsController@destroy',
		'as' => 'customer.delete',
	]);

	Route::get('/logout', [
		'uses' => 'AdministratorsController@logout',
		'as' => 'admin.logout',
		]);

	Route::get('/customer/all', [
		'uses' => 'AdministratorsController@allUser',
		'as' => 'users'
		]);

	Route::get('/account-type/create', [
		'uses' => 'AccountController@create',
		'as' => 'account.create',
		]);

	Route::post('/account-type/store', [
		'uses' => 'AccountController@store',
		'as' => 'account.store',
	]);

	Route::get('/account-type/all', [
		'uses' => 'AccountController@index',
		'as' => 'account_type',
	]);

	Route::get('/account-type/edit/{id}', [
		'uses' => 'AccountController@edit',
		'as' => 'account_type.edit',
	]);
	
	Route::post('/account-type/update/{id}', [
		'uses' => 'AccountController@update',
		'as' => 'account_type.update',
	]);

	Route::get('/account-type/delete/{id}', [
		'uses' => 'AccountController@destroy',
		'as' => 'account_type.delete',
	]);

	Route::get('/customer/account/edit/{id}', [
		'uses' => 'CustomerAccountController@getCustomerAccount',
		'as' => 'customer_account.edit',
	]);

	Route::post('/customer/account/save/{id}', [
		'uses' => 'CustomerAccountController@update',
		'as' => 'customer_account.update',
	]);

	Route::get('/site-settings', [
		'uses' => 'SettingsController@index',
		'as' => 'settings',
	]);

	Route::post('/site-settings/update', [
		'uses' => 'SettingsController@update',
		'as' => 'settings.update',
	]);

	Route::get('/profile', [
		'uses' => 'AdminProfileController@index',
		'as' => 'profile',
	]);

	Route::post('/profile/update', [
		'uses' => 'AdminProfileController@update',
		'as' => 'profile.update',
	]);

	Route::get('/customer/transaction', [
		'uses' => 'AdminTransactionsController@index',
		'as' => 'transactions.search',
	]);

	Route::get('/customer/search/result', [
		'uses' => 'AdminTransactionsController@search',
		'as' => 'search.result',
	]);

	Route::get('/customer/transaction/create/{id}', [
		'uses' => 'AdminTransactionsController@create',
		'as' => 'transaction.create',
	]);

	Route::post('/customer/transaction/save/{id}', [
		'uses' => 'AdminTransactionsController@store',
		'as' => 'transaction.store',
	]);

	Route::get('/transaction/search/all', [
		'uses' => 'AdminTransactionsController@getSearchAll',
		'as' => 'transaction.all',
	]);

	Route::get('/customer/transaction/all', [
		'uses' => 'AdminTransactionsController@postSearch',
		'as' => 'all_transaction_search.result',
	]);

	Route::get('/customer/get/transaction/all/{id}', [
		'uses' => 'AdminTransactionsController@getAllTransaction',
		'as' => 'transaction_result.all',
	]);

	// Route::get('/customer/profile/all', [
	// 	'uses' => 'AdminProfileController@getCustomerProfile',
	// 	'as' => 'customer_profile_get.all'
	// ]);
	

});

/*user route*/
Route::group(['prefix' => 'customer'], function() {

	Route::get('/home', [
		'uses' => 'CustomersController@index',
		'as' => 'customer.home',
		]);

	Route::get('/profile/{id}', [
		'uses' => 'CustomerProfileController@index',
		'as' => 'customer.profile',
	]);

	Route::post('/profile/update/{id}', [
		'uses' => 'CustomerProfileController@update',
		'as' => 'customer_profile.update',
	]);

	Route::get('/logout', [
		'uses' => 'CustomerAuthController@logout',
		'as' => 'customer.logout',
	]);

	Route::get('/transaction-history/{id}', [
		'uses' => 'CustomerTransactionsController@index',
		'as' => 'customer_transaction.history',
	]);

});
