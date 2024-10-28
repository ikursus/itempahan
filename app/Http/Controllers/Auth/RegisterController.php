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

    public function register(Request $request)
    {

    }
}
