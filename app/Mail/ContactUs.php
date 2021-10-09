<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $name, $phone, $email, $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email, $message)
    {
        $this->$name;
        $this->$phone;
        $this->$email;
        $this->$message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('sdgsdg@gmail.com')->subject("Heyyyyy!")->view('emails.contact');
    }
}
