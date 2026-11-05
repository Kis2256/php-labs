<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PrintOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $order)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [new Address($this->order['email'], $this->order['name'])],
            subject: 'Нова заявка з сайту potuzhnoprint.ua: ' . $this->order['topic'],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.print-order');
    }
}