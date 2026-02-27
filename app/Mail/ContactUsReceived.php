<?php

namespace App\Mail;

use App\Models\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public readonly ContactUs $contact) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'We received your message — DevDimensions',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact.received',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
