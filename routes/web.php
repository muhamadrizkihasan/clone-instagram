<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register-process');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login-process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ig
Route::prefix('/instagram')->name('instagram.')->controller(ProfileController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/bio/{username}', 'show')->name('show');
    Route::get('/edit/{username}', 'profile')->name('profile');
    Route::patch('/{id}', 'update')->name('update');
});

// posts
Route::prefix('/posts')->name('posts.')->controller(PostController::class)->group(function() {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});