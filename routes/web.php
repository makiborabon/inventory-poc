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

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::resource('inventory', 'InventoryController');

=======
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

	Route::prefix('admin')->group(function() {
		Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
		Route::get('/', 'AdminController@index')->name('admin.dashboard');
	});
>>>>>>> 52907bea17f47b2da6be460516e16dad61dd531b
