<?php

namespace App\Mail;
use App\User;
use App\Post;
use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewComment extends Mailable
{
    use Queueable, SerializesModels;
public $poster;
public $post;
public $commenter;
public $content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($poster, $post,  $commenter, $content)
    {
        $this->poster = $poster;
        $this->post = $post;
          $this->content = $content;
        $this->commenter = $commenter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newcomment');
    }
}
