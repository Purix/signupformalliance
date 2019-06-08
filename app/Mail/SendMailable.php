<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $firstName;
    public $lastName;
    public $email;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName,$lastName,$email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->view('name');

    }
}