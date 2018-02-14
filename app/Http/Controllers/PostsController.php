<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
      return view('posts.index');
    }


    public function create ()
  {
      return view ('posts.create');

  }

    public function store ()
    {
    //  dd(request()->all());

      $post = new Post;

      $post->title = request('title');
      $post->body = request ('body');
      $post->category = request ('category');

      //create new post using the request databases

      $post->save();
      //save it to the databases
      return redirect ('/');
      //redirect to homepage

    }

}
