<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;

class PostsController extends Controller
{

  public function __construct()
  {


    $this->middleware('auth')->except(['index', 'show', 'sort']);
  }
    public function index()
    {
      $posts = Post::latest()->get();
      return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
      $posts = Post::where('id', $id)->get();

      return view('posts.show', compact('posts'));
    }

    public function create ()
  {
    $categories = Category::get();

      return view ('posts.create', compact('categories'));
  }

     public function store ()
    {
      $user= Auth::user()->id;
      $disable_comments = request('disable_comments');

      $this->validate(request(), [
       'title' => 'required|max:255',
       'body' => 'required',
      ]);

      Post::create([
        'user_id' => $user,

        'title' => request('title'),

        'body' => request('body'),

        'disable_comments' => $disable_comments

      ]);

      return redirect ('/');
    }


public function createcategory ()
  {
    $categories = Category::get();

      return view ('posts.createcategory', compact('categories'));
  }

  public function storecategory ()
  {
    Category::create(request(['name']));

     return redirect ('/posts/create');
  }


}
