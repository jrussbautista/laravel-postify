<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\Auth\AuthController;
use \App\Http\Controllers\Api\PostController;
use \App\Http\Controllers\Api\CategoryController;

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


Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::apiResource('posts', PostController::class);
Route::apiResource('categories', CategoryController::class);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/auth/me',  [AuthController::class, 'me']);
    Route::post('/auth/logout',  [AuthController::class, 'logout']);
});




