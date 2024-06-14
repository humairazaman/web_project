<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class form_mail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $to;
    public $subject;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @param string $to
     * @param string $subject
     * @param \Illuminate\Http\UploadedFile|array|null $attachment
     */
    public function __construct($to, $subject, $attachment)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getMimeType(),
            ]);
    }
}
