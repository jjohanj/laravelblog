<?php

namespace App\Mail;
use App\User;
use App\Role;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class payment extends Mailable
{
    use Queueable, SerializesModels;
    public $premium_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($premium_user)
    {

        $this->premium_user = $premium_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.payment');
    }
}
