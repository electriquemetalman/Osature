<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class mailContact extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details=$details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
<<<<<<< HEAD
        return $this->subject($this->details['subject'])
=======
        return $this->subject('Mail from osature.com')
>>>>>>> b3e74eabb44907e378d216aa365fdd5c833c5bb8
                    ->from($this->details['email'])
                    ->view('emails.contactMail');
    }
}
