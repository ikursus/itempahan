<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\PendaftaranPengguna;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function paparBorangDaftar()
    {
        return view('auth.template-daftar');
    }

    public function store(Request $request)
    {
        // Validasi data pendaftaran
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        // Daftarkan user baru
        $user = User::create($data);

        // Panggil event PendaftaranPengguna
        event(new PendaftaranPengguna($user));

        // Redirect ke halaman login
        return redirect()->route('login');


    }
}
