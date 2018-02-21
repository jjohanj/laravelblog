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
<<<<<<< HEAD
  
  
=======
    public function index()
    {
      $posts = Post::latest()->get();
      return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
      $posts = Post::where('id', $id)->get();
>>>>>>> MultipleCats


  public function index()
  {
<<<<<<< HEAD
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
=======
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
>>>>>>> MultipleCats

  public function show($id)
  {
    $posts = Post::where('id', $id)->get();

<<<<<<< HEAD
    return view('posts.show', compact('posts'));
  }

<<<<<<< HEAD
  public function create ()
  {
    $categories = Category::get();
=======
        // 'category' => request('category'),

=======
>>>>>>> MultipleCats
        'disable_comments' => $disable_comments

      ]);
>>>>>>> MultipleCats

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

<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function sort($category)
    {
      $posts = Post::latest()->where('category', $category)->get();
      $categories = Post::select('category')->distinct()->get();
      return view('posts.category', compact('posts', 'categories'));
    }
=======
>>>>>>> MultipleCats

>>>>>>> MultipleCats
}
