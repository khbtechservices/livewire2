<?php

use Illuminate\Support\Facades\Route;

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
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {
    Route::livewire('/dashboard', 'dashboard');
    Route::livewire('/profile', 'profile');
});

Route::middleware('guest')->group(function () {
    Route::livewire('/register', 'auth.register')->name('auth.register');;
    Route::livewire('/login', 'auth.login')->layout('layouts.auth')->name('auth.login');
});
