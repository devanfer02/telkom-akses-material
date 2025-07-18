<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('home');
});

Route::controller(PageController::class)->group(function() {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/data-alat1', 'data_alat1')->name('data-alat1');
    Route::get('/data-alat2', 'data_alat2')->name('data-alat2');
    Route::get('/data-alat-fix', 'data_alat_fix')->name('data-alat-fix');
    Route::get('/data-alat-tu', 'data_alat_tu')->name('data-alat-tu');
    Route::get('/data-alat-admin', 'data_alat_admin')->name('data-alat-admin');
    Route::get('/fitur1', 'fitur1')->name('fitur1');
    Route::get('/fitur2', 'fitur2')->name('fitur2');
    Route::get('/fitur3', 'fitur3')->name('fitur3');
    Route::get('/login', 'login')->name('login');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/register', 'register')->name('register');
    Route::get('/tambah-alat1', 'tambah_alat1')->name('tambah-alat1');
    Route::get('/tambah-alat2', 'tambah_alat2')->name('tambah-alat2');
    Route::get('/timestamp', 'timestamp')->name('timestamp');
});