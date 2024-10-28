<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\EmailUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserEmailNotification;

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

        // Mula kira masa untuk proses semua email
        $startTime = microtime(true);

        // Menghantar email ke semua users yang dipilih
        foreach ($users as $user)
        {
            // Hantar email
            Mail::to($user->email)
            ->send(new EmailUmum($tajukEmail, $kandunganEmail));

            // Hantar notification
            $user->notify(new UserEmailNotification($tajukEmail, $kandunganEmail));
        }

        // Tamat kira masa untuk proses semua email
        $endTime = microtime(true);

        // Hitung masa proses semua email
        $elapsedTime = $endTime - $startTime;

        // Return status
        return 'Email sukses dihantar dengan tempoh (saat): ' . $elapsedTime;
    }
}
