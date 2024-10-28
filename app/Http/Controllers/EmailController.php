<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\EmailUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function paparBorangEmail()
    {
        return view('email.template-borang');
    }

    public function hantarEmail(Request $request)
    {
        // Validasi data borang
        $request->validate([
            'tajuk_email' => 'required|min:3',
            'kandungan_email' => ['required', 'min:3'],
        ]);

        // Dapatkan data yang diperlukan oleh EmailUmum
        $tajukEmail = $request->input('tajuk_email');
        $kandunganEmail = $request->input('kandungan_email');

        // Dapatkan senarai users yang akan menerima emails
        $users = User::all();

        // Menghantar email ke semua users yang dipilih
        foreach ($users as $user)
        {
            Mail::to($user->email)->send(new EmailUmum($tajukEmail, $kandunganEmail));
        }

        // Return status
        return 'Email sukses dihantar';
    }
}
