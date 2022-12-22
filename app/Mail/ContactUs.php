<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     * from email: circlewood@realstate.com and it sends the content of the View in ContactUsEmail
     * @return $this
     */
    public function build()
    {
        return $this->from("circlewood@realstate.com")->markdown('ContactUsEmail');
    }
}
