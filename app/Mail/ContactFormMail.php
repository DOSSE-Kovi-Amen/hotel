<?php

// app/Mail/ContactFormMail.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo($this->data['email'], $this->data['name']) // Réponse vers le visiteur
            ->subject('Nouveau message de contact')
            ->view('emails.contact')
            ->with(['data' => $this->data]);
    }
}
