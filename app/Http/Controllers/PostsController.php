<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use Carbon\Carbon;

class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show', 'sort']);
  }
  
  


  public function index()
  {
    $posts = Post::latest()
    ->filter(request()->only(['month', 'year','category']))
    ->get();

    $categories = Post::select('category')->distinct()->get();
    $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderByRaw('min(created_at)')
      ->get()
      ->toArray();
    
    return view('posts.index', compact('posts', 'categories', 'archives'));
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
    $this->validate(request(), [
      'title' => 'required|max:255',
      'body' => 'required',
      'category' => 'required'
    ]);

    auth()->user()->publish(new Post(request(['title', 'body', 'category', 'disable_comments','disable_comments'])));
      
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
