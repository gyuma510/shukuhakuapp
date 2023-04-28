<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this
            ->from('yumagoto287@gmail.com')
            ->view('contact.mail')
            ->with([
                'name' => $this->contact->name,
                'email' => $this->contact->email,
                'content' => $this->contact->content,
            ])
            ->subject('お問い合わせを受け付けました');
    }
}
