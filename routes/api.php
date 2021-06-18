<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('pipeline', [\App\Http\Controllers\Api\PipelineController::class, 'pipeline'])->name('api.pipeline');
Route::post('hub', [\App\Http\Controllers\Api\PipelineController::class, 'hub'])->name('api.hub');
Route::post('export-csv', [\App\Http\Controllers\Api\UserController::class, 'export'])->name('api.user.export-csv');
Route::get('customers', [\App\Http\Controllers\Api\CustomerController::class, 'list'])->name('api.customers.list');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
