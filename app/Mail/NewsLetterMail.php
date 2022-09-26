<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $file;
    public $user;

    public function __construct($file,$user)
    {
        $this->file = $file;
        $this->user = $user;
    }

    public function build()
    {
        $file = $this->file;
        $user = $this->user;
        return $this->subject('Mail from Mychug')
                    ->view('email.newsletter',compact('user'))->attach($file);
    }
}
