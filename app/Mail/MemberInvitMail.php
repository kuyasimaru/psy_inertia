<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;


class MemberInvitMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public $invite;

    public function __construct($invite)
    {
        $this->invite = $invite;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '会社情報の入力',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $url = route('member.company.formcreate',['token'=>$this->invite->token]);

        return new Content(
            view: 'emails.invite',
            with: 
            [
                'url'=>$url,
                'invite'=> $this->invite,
            ],
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
