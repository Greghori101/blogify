<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('posts')->controller(PublicPostController::class)->group(function () {
    Route::get('/', 'index')->name('posts.public.index');
    Route::get('/{post}', 'show')->name('posts.public.show');
});

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login',  'showLogin')->name('login');
    Route::post('/login',  'login');
    Route::get('/register',  'showRegister')->name('register');
    Route::post('/register',  'register');
    Route::post('/logout',  'logout')->middleware('auth')->name('logout');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    Route::post('posts/{id}/toggle', [PostController::class, 'toggle'])->name('posts.toggle');
    Route::post('import/{source}', [ImportController::class, 'import'])->name('import.source');
});
