<?php

namespace App\Mail\About;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $recipient)
    {
        $this->data = $data;
        $this->recipient = $recipient;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if ($this->recipient == 'User') {
            return new Envelope(
                subject: 'Greetings',
            );
        } else {
            return new Envelope(
                subject: 'Message from' . $this->data['email'],
            );
        }
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->recipient == 'User') {
            return new Content(
                view: 'mail.userResponse',
                with: [
                    'data' => $this->data
                ]
            );
        } else {
            return new Content(
                view: 'mail.adminResponse',
                with: [
                    'data' => $this->data
                ]
            );
        }
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
