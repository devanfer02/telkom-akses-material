<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::get('/auth/login', 'viewLogin')->name('pages.login');
    Route::get('/auth/register', 'viewRegister')->name('pages.register');

    Route::post('/auth/login', 'login')->name('action.login');
    Route::post('/auth/register', 'register')->name('action.register');
});

Route::controller(MaterialController::class)->group(function() {
    Route::get('/material', 'index')->name('material.index');
    Route::get('/material/tambah', 'create')->name('material.tambah');

});

Route::controller(PageController::class)->group(function() {
    Route::get('/', 'home')->name('home');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/about-us', 'aboutUs')->name('aboutus');
    Route::get('/fitur1', 'fitur1')->name('fitur1');
    Route::get('/fitur2', 'fitur2')->name('fitur2');
    Route::get('/fitur3', 'fitur3')->name('fitur3');
    Route::get('/profile', 'profile')->name('profile');
});
