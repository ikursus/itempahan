<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\EmailUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
            'attachments.*' => 'nullable|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,jpeg,jpg,png,gif|max:2048',
        ]);

        // Dapatkan data yang diperlukan oleh EmailUmum
        $tajukEmail = $request->input('tajuk_email');
        $kandunganEmail = $request->input('kandungan_email');

        // Get all attachments
        $attachmentPaths = [];

        
        if ($request->hasFile('attachments'))
        {
            foreach ($request->file('attachments') as $file)
            {
                $path = $file->store('email-attachments');
                $attachmentPaths[] = $path;
            }
        }

        // Dapatkan senarai users yang akan menerima emails
        $users = User::all();

        // Mula kira masa untuk proses semua email
        $startTime = microtime(true);

        // Menghantar email ke semua users yang dipilih
        foreach ($users as $user)
        {
            // Hantar email
            Mail::to($user->email)
            ->send(new EmailUmum($tajukEmail, $kandunganEmail, $attachmentPaths));

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
