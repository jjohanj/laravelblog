<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store($id)
    {

    	Comment::create([
    		'body' => request('body'),
    		'post_id' => $id
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
