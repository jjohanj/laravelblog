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
    	
 	$comment = Comment::find($id);
    $commentStatus = $comment->delete();
    // if delete failed 
    if (!$commentStatus)
    {
       return back(); // return a view with a failed flash message
    }
    // if the article was deleted successfully
    return back(); // return a view with a success flash message

    	

    }
}
