<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\Auth\LogoutController;

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



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',  [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register',  [RegisterController::class, 'store']);
Route::post('/logout',  LogoutController::class)->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/posts',  [PostController::class, 'index'])->name('posts.index');
Route::post('/posts',  [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}',  [PostController::class, 'show'])->name('posts.show');


