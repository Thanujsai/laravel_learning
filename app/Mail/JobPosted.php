<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Job;

class JobPosted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Job $job)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope //this method is the subject of the email
    {
        return new Envelope(
            subject: 'Job Posted',
            from: 'admin@laracasts.com'//to override the default from mail present in env
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.job-posted',//this refers to the view present in the directory resources/views/mail/job-posted.blade.php
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
