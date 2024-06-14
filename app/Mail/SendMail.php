<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $attachment;

    public function __construct($subject, $body, $attachment)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->attachment = $attachment;
    }

    public function build()
    {
        $message = $this->view('mail.send-email')
            ->subject($this->subject)
            ->with([
                'body' => $this->body,
            ]);

        if ($this->attachment) {
            $filename = pathinfo($this->attachment, PATHINFO_BASENAME);
            $extension = pathinfo($this->attachment, PATHINFO_EXTENSION);

            $message->attach($this->attachment, [
                'as' => $filename,
                'mime' => 'application/' . $extension,
            ]);
        }
        return $message;
    }
}
