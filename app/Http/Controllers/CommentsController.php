<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

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
    $user= Auth::user()->id;
    
    Comment::create([
    	'body' => request('body'),
    	'post_id' => $id,
      'user_id' => $user
    ]);

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