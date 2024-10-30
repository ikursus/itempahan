<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    return User::all();
})->middleware('auth:sanctum');
