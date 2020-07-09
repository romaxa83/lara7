<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {

    Route::get('admin',['uses' => 'Admin\HomeController@index', 'as' => 'admin.home']);

    /* route for User */
    Route::get('admin/users',['uses' => 'Admin\User\UserController@index', 'as' => 'admin.users']);
//    Route::get('admin/user/create',['uses' => 'Admin\UserController@create', 'as' => 'admin.user.create']);

    Route::get('admin/customers',['uses' => 'Admin\CustomerController@index', 'as' => 'admin.customers']);
    Route::get('admin/stores',['uses' => 'Admin\StoreController@index', 'as' => 'admin.stores']);

});

