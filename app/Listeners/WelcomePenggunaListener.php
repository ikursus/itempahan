<?php

namespace App\Listeners;

use App\Mail\WelcomePenggunaEmail;
use App\Events\PendaftaranPengguna;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomePenggunaListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PendaftaranPengguna $event): void
    {
        Mail::to($event->user->email)->send(new WelcomePenggunaEmail($event->user));
    }
}
