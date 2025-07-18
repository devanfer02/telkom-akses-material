<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('/auth/login', 'viewLogin')->name('login');
    Route::get('/auth/register', 'viewRegister')->name('register');

    Route::post('/auth/login', 'login')->name('action.login');
    Route::post('/auth/register', 'register')->name('action.register');
    Route::post('/auth/logout', 'logout')->name('action.logout');
});

Route::controller(MaterialController::class)->middleware('auth')->group(function() {
    Route::get('/material', 'index')->name('material.index')->withoutMiddleware('auth');
    Route::get('/material/tambah', 'create')->name('material.create');
    Route::post('/material', 'store')->name('material.store');
    Route::middleware('role:admin')->group(function () {
        Route::get('/material/{material}/edit', 'edit')->name('material.edit');
        Route::put('/material/{material}', 'update')->name('material.update');
        Route::delete('/material/{material}', 'destroy')->name('material.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/about-us', 'aboutUs')->name('aboutus');
    Route::get('/fitur1', 'fitur1')->name('fitur1');
    Route::get('/fitur2', 'fitur2')->name('fitur2');
    Route::get('/fitur3', 'fitur3')->name('fitur3');
});
