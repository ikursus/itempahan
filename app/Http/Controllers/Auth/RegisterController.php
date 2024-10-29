<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\PendaftaranPengguna;
use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranUserRequest;

class RegisterController extends Controller
{
    public function paparBorangDaftar()
    {
        return view('auth.template-daftar');
    }

    public function store(PendaftaranUserRequest $request)
    {
        // Validasi data pendaftaran
        $data = $request->validated();

        // Daftarkan user baru
        $user = User::create($data);

        // Panggil event PendaftaranPengguna
        event(new PendaftaranPengguna($user));

        // Redirect ke halaman login
        return redirect()->route('login');
    }
}
