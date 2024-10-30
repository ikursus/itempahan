<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', HomeController::class);

// Route authentication
// Paparkan borang login
// Format routing Route::method('uri', action);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::get('/login', LoginController::class);
// Ambil data daripada borang login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

// Paparkan borang pendaftaran akaun pelanggan
Route::get('/register', [RegisterController::class, 'paparBorangDaftar']);
// Ambil data daripada borang pendaftaran
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


// Route group middleware auth
Route::group(['middleware' => 'auth'], function () {

    // Route untuk tandakan notification telah di baca (mark as read)
    Route::get('/notifications/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

    // Route dashboard pelanggan
    Route::get('/dashboard', DashboardController::class)->name('dashboard.pelanggan');

    // Routing untuk paparkan borang  email
    Route::get('/hantar-email', [EmailController::class, 'paparBorangEmail'])->name('borang.email');

    // Routing untuk terima data email dan hantar email
    Route::post('/hantar-email', [EmailController::class, 'hantarEmail'])->name('hantar.email');

    // Route untuk resource CRUD kategori
    Route::resource('/kategori', KategoriController::class);

    // Route untuk resource CRUD fail
    Route::resource('/file-manager', FileManagerController::class);

    Route::get('/calendar', [EventController::class, 'index'])->name('calendar.index');
    Route::get('/events', [EventController::class, 'getEvents'])->name('events.get');
    Route::post('/events', [EventController::class, 'store']);
    Route::put('/events/{event}', [EventController::class, 'update']);
    Route::delete('/events/{event}', [EventController::class, 'destroy']);

    // Route logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
