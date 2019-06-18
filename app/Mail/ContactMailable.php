<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMailable extends Mailable
{
    use Queueable, SerializesModels;

     public $name;
     public $email;
     public $msg;
     public $object;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $msg, $object)
    {
        $this->name = $name;
        $this->email = $email;
        $this->msg = $msg;
        $this->object = $object;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailFrom= config('plccnzone.admin_support_email');

        //$obj = $this->object;
        return  $this->markdown('emails.contact')
                        ->from($mailFrom,'plccnzone')
                        ->subject( $this->object);
    }
}
