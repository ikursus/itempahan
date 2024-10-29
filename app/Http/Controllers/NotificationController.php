<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        // Cari notifikasi berdasarkan ID
        // kemudian tandakan sebagai di baca
        auth()->user()->notifications()->find($id)->markAsRead();

        // Kembali ke halaman sebelumnya
        return redirect()->back();
    }
}
