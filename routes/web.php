<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Route authentication
// Paparkan borang login
// Format routing Route::method('uri', action);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::get('/login', LoginController::class);
// Ambil data daripada borang login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Paparkan borang pendaftaran akaun pelanggan
Route::get('/register', [RegisterController::class, 'paparBorangDaftar']);
// Ambil data daripada borang login
Route::post('/register', );


// Route dashboard pelangga
Route::get('/dashboard', DashboardController::class)->name('dashboard.pelanggan');
