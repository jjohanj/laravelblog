<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth')->except(['index', 'show', 'sort']);
  }
public function search($searchTerm)
  {
    $posts = Post::search($searchTerm)->get();
  }




  public function index()
  {
    $posts = Post::latest()
    ->filter(request()->only(['month', 'year', 'user','search']))
    ->get();

    $categories = Category::get();
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
    return view ('posts.show', compact('posts'));

      }
  public function fromUser($username)
  {
    $user = User::where('name' , '=', $username)->first();
    $userid = $user->id;
    $posts = User::find($userid)->posts()->get();

    $categories = Category::get();
    $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderByRaw('min(created_at)')
      ->get()
      ->toArray();



    return view('posts.index', compact('posts', 'categories', 'archives'));







      }




  public function create ()
  {
    $categories = Category::get();
    return view ('posts.create', compact('categories'));
  }

  public function store (Request $request)
  {

    $this->validate(request(), [
      'title' => 'required|max:255',
      'body' => 'required',
      'category' => 'required'
    ]);
    $user_id = Auth::user()->id;
    $title=request('title');

    // $post = new Post;
    //
    // $post->title = request('title');
    // $post->body = request('body');
    // $post->user_id = Auth()->id();
    //
    // $post->save();

    $categories = $request->category;

    $post = Post::create([
        'title' => request('title'),
        'body' => request('body'),
        'disable_comments' => request('disable_comments'),
        'user_id' => $user_id
      ])->categories()->attach($categories);;

    return redirect('/');

  }

  public function createcategory ()
  {
    $categories = Category::get();

    return view ('posts.createcategory', compact('categories'));
  }

  public function edit($id)
    {

    $post = Post::where('user_id', auth()->user()->id)
                    ->where('id', $id)
                    ->first();

    return view('posts.edit', compact('post', 'id'));

    }

}
