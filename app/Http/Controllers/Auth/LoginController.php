<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Method untuk paparkan borang login
    public function showLoginForm()
    {
        return view('auth.template-login');
    }

    // Method untuk terima data borang login dan proses login
    public function authenticate(Request $request)
    {
        // dd( $request->all() );
        return redirect()->route('dashboard.pelanggan');
    }
}
