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

    	Comment::where('id', $id)->delete();;

    	return back();

    }
}
