<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\Auth\LogoutController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FavoriteController;
use \App\Http\Controllers\Auth\SocialController;

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

Route::get('/', [HomeController::class, 'index']);

// auth routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',  [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register',  [RegisterController::class, 'store']);
Route::get('/auth/{provider}', [SocialController::class, 'redirect'])->name('social.auth.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback'])->name('social.auth.callback');


Route::resource('posts', PostController::class);
Route::resource('posts.comments', CommentController::class)->except(['index', 'show']);

Route::group(['middleware' => 'auth'], function () {
    // Post Favorites
    Route::post('/posts/{post}/favorites',  [FavoriteController::class, 'store'])->name('posts.favorites.store');
    Route::delete('/posts/{post}/favorites', [FavoriteController::class, 'destroy'])->name('posts.favorites.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout',  LogoutController::class)->name('logout');

});

// Admin Routes
Route::group(['prefix' => 'admin',  'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});


















