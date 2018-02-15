<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::latest()->get();
      $categories = Post::select('category')->distinct()->get();
      return view('posts.index', compact('posts', 'categories'));
    }

    public function create ()
  {
      return view ('posts.create');
  }

    public function store ()
    {
      Post::create(request(['title', 'body', 'category']));

      return redirect ('/');
    }

    public function sort($category)
    {
      $posts = Post::latest()->where('category', $category)->get();

      return view('posts.category', compact('posts'));
    }


}
