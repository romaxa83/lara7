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
})->name('main');

Route::get('/signup', function(){
    return view('auth.signup');
})->name('signup');

Route::livewire('/login-admin', 'auth.login')
    ->layout('layouts.base-auth')
    ->name('auth.login.admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('patterns/composite',['uses' => 'Patterns\CompositeController@index', 'as' => 'patterns.composite']);
Route::get('patterns/adapter',['uses' => 'Patterns\AdapterController@index', 'as' => 'patterns.adapter']);
Route::get('patterns/decorator',['uses' => 'Patterns\DecoratorController@index', 'as' => 'patterns.decorator']);


Route::middleware('auth')->group(function () {

    Route::get('admin',['uses' => 'Admin\HomeController@index', 'as' => 'admin.home']);

    /* route for User */
    Route::get('admin/users',['uses' => 'Admin\User\UserController@index', 'as' => 'admin.users']);
//    Route::get('admin/user/create',['uses' => 'Admin\UserController@create', 'as' => 'admin.user.create']);

    Route::get('admin/customers',['uses' => 'Admin\CustomerController@index', 'as' => 'admin.customers']);
    Route::get('admin/stores',['uses' => 'Admin\StoreController@index', 'as' => 'admin.stores']);
    Route::get('admin/posts',['uses' => 'Admin\PostController@index', 'as' => 'admin.posts']);

    //Liveware - testing
    Route::get('admin/livewire/test-form',['uses' => 'Admin\LivewireController@testForm', 'as' => 'admin.livewire.test-form']);

});

