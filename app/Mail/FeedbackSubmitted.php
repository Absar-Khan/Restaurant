<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class FeedbackSubmitted extends Mailable
{
    use Queueable, SerializesModels;
    public $feed;
    /**
     * Create a new message instance.
     */
    public function __construct($feed)
    {
        $this->feed=$feed;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Feedback Submitted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Layouts.user',
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
    public function toMail($notifiable)
    {
        return (New MailMessage)
        ->line('New Feedback has been Submitted')
        ->line('Name:'.$this->feed->name)
        ->line('Rating:'.$this->feed->rating)
        ->line('Date:'.$this->feed->date)
        ->line('Time:'.$this->feed->time)
        ->line('Message:'.$this->feed->message);
    }

}
