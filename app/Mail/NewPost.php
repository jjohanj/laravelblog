<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPost extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $follower;
    public $post_title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($follower, $user)
    {
        $this->user = $user;
        $this->follower = $follower;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newpost');
    }
}
