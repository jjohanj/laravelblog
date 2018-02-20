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
      $categories = Post::select('category')->distinct()->get();
      return view('posts.index', compact('posts', 'categories'));
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
     
    
      Post::create([
        'user_id' => $user,

        'title' => request('title'),

        'body' => request('body'),

        'category' => request('category'),

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

    public function sort($category)
    {
      $posts = Post::latest()->where('category', $category)->get();
      $categories = Post::select('category')->distinct()->get();
      return view('posts.category', compact('posts', 'categories'));
    }


}
