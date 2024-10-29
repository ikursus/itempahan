<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function paparBorangDaftar()
    {
        return view('auth.template-daftar');
    }

    public function store(Request $request)
    {
        // Validasi data pendaftaran
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);
    }
}
