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

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Profile;


Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {
    // Route::livewire('/dashboard', 'dashboard');
    Route::get('/dashboard', Dashboard::class);
    // Route::livewire('/profile', 'profile');
    Route::get('/profile', Profile::class);
});

Route::middleware('guest')->group(function () {
    // Route::livewire('/register', 'auth.register')->name('auth.register');;
    Route::get('/register', Register::class)->name('auth.register');;
    // Route::livewire('/login', 'auth.login')->layout('layouts.auth')->name('auth.login');
    Route::get('/login', Login::class)->name('auth.login');
});
