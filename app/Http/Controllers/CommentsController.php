<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Setting;
use Auth;
use App\Mail\NewComment;
class CommentsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store($id)
  {
    $this->validate(request(), [
      'body' => 'required'
    ]);
    $commenter= Auth::user();
    $commenter_id= Auth::user()->id;
    $post=Post::find($id);
    $poster_id= Post::find($id)->user_id;
    $poster= User::find($poster_id);

    $comment = Comment::create([
    	'body' => request('body'),
    	'post_id' => $id,
      'user_id' => $commenter_id
    ]);

$content = $comment->body;


$settings = Setting::where('user_id', $poster_id)->get();
$notification = "";
foreach ($settings as $setting){
$notification = $setting;
}

if ($notification->enable_newcomment == 'yes'){
\Mail::to($poster)->send(new NewComment($poster, $post, $comment, $content));
    };




    return back();
  }

  public function delete($id)
  {
   $post_id = Comment::find($id)->post_id;
   $user_id = Post::find($post_id)->user_id;

   if (Auth::user()->id == $user_id)
    {
      $comment = Comment::find($id);
      $commentStatus = $comment->delete();

      if (!$commentStatus)
      {
        return back();
      }
        return back();
    }
    return back();
  }
}
