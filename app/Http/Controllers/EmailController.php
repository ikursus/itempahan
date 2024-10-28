<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function paparBorangEmail()
    {
        return view('email.template-borang');
    }

    public function hantarEmail(Request $request)
    {

    }
}
