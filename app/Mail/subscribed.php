<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class subscribed extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $paymentdetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($user , $paymentdetails)
     {
         $this->user = $user;
         $this->paymentdetails = $paymentdetails;


     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.subscribed');
    }
}
