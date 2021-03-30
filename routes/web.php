<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\Auth\LogoutController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FavoriteController;

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


Route::middleware(['auth'])->group(function () {
    // Protected Posts Routes
    Route::post('/posts',  [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create',  [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit',  [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}',  [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}',  [PostController::class, 'destroy'])->name('posts.destroy');

    // Post Favorites
    Route::post('/posts/{post}/favorites',  [FavoriteController::class, 'store'])->name('posts.favorites.store');
    Route::delete('/posts/{post}/favorites', [FavoriteController::class, 'destroy'])->name('posts.favorites.destroy');

});

// Front end public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',  [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register',  [RegisterController::class, 'store']);
Route::post('/logout',  LogoutController::class)->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/posts',  [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}',  [PostController::class, 'show'])->name('posts.show');










