<?php

use App\Models\User;
use PharIo\Manifest\Email;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
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


// Route group middleware auth
Route::group(['middleware' => 'auth'], function () {

    // Route dashboard pelanggan
    Route::get('/dashboard', DashboardController::class)->name('dashboard.pelanggan');

    // Routing untuk paparkan borang  email
    Route::get('hantar-email', [EmailController::class, 'paparBorangEmail'])
    ->name('borang.email');

    // Routing untuk terima data email dan hantar email
    Route::post('hantar-email', [EmailController::class, 'hantarEmail'])
    ->name('hantar.email');

    // Route logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
