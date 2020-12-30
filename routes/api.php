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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
