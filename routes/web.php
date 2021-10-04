<?php

use App\Http\Controllers\Admin\Tailwind;
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
Route::get('patterns/delegation',['uses' => 'Patterns\DelegationController@index', 'as' => 'patterns.delegation']);
Route::get('patterns/composite',['uses' => 'Patterns\CompositeController@index', 'as' => 'patterns.composite']);
Route::get('patterns/adapter',['uses' => 'Patterns\AdapterController@index', 'as' => 'patterns.adapter']);
Route::get('patterns/decorator',['uses' => 'Patterns\DecoratorController@index', 'as' => 'patterns.decorator']);
Route::get('patterns/strategy',['uses' => 'Patterns\StrategyController@index', 'as' => 'patterns.strategy']);
Route::get('patterns/abstract-factory/{type}',['uses' => 'Patterns\AbstractFactoryController@index', 'as' => 'patterns.abstract-factory']);
Route::get('patterns/factory-method',['uses' => 'Patterns\FactoryMethodController@index', 'as' => 'patterns.factory-method']);
Route::get('patterns/static-factory',['uses' => 'Patterns\StaticFactoryController@index', 'as' => 'patterns.static-factory']);
Route::get('patterns/dto',['uses' => 'Patterns\DtoController@index', 'as' => 'patterns.dto']);

Route::get('tailwinds',['uses' => 'Site\Tailwind\TailwindController@index', 'as' => 'site.tailwind.index']);
Route::get('tailwinds-components/{slug}',['uses' => 'Site\Tailwind\TailwindController@componentList', 'as' => 'site.tailwind.components.list']);


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

    Route::get('admin/tailwind-category', [Tailwind\CategoryController::class, 'index'])
        ->name('tailwind.category.index');
    Route::get('admin/tailwind-category/create', [Tailwind\CategoryController::class, 'create'])
        ->name('tailwind.category.create');
    Route::post('admin/tailwind-category/create', [Tailwind\CategoryController::class, 'store'])
        ->name('tailwind.category.store');

    Route::get('admin/tailwind-component', [Tailwind\ComponentController::class, 'index'])
        ->name('tailwind.component.index');
    Route::get('admin/tailwind/component/create', [Tailwind\ComponentController::class, 'create'])
        ->name('admin.component.create');
    Route::post('admin/tailwind/component/create', [Tailwind\ComponentController::class, 'store'])
        ->name('admin.component.store');


    Route::get('admin/tailwind/template', [Tailwind\TemplateController::class, 'index'])
        ->name('admin.template.index');
    Route::get('admin/tailwind/template/create', [Tailwind\TemplateController::class, 'create'])
        ->name('admin.template.create');
    Route::post('admin/tailwind/template/create', [Tailwind\TemplateController::class, 'store'])
        ->name('admin.template.store');
    Route::get('admin/tailwind/template/edit/{id}', [Tailwind\TemplateController::class, 'edit'])
        ->name('admin.template.edit');
    Route::post('admin/tailwind/template/edit/{id}', [Tailwind\TemplateController::class, 'update'])
        ->name('admin.template.update');
    Route::get('admin/tailwind/template/delete/{id}', [Tailwind\TemplateController::class, 'delete'])
        ->name('admin.template.delete');
});

