<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailUmum extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tajukEmail;
    public $kandunganEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($tajukEmail, $kandunganEmail)
    {
        $this->tajukEmail = $tajukEmail;
        $this->kandunganEmail = $kandunganEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->tajukEmail,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.template-kandungan-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
