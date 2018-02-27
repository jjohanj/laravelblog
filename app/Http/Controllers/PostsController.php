<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use Auth;
use Carbon\Carbon;
use App\Mail\NewPost;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

  public function __construct(){
    $this->middleware('auth')->except(['index', 'show', 'sort','search', 'showAll', 'fromUser']);
  }

  public function search($searchTerm){
    $posts = Post::search($searchTerm)->get();
  }

  public function index(){


    if(Auth::check()){
      $userid = Auth::user()->id;
      $user = User::find($userid);
      $followers = $user->followers;
      $followings = $user->followings()->get();

      $posts = array();

      foreach ($followings as $following){
        $tempPosts = $following->posts()->get();

        foreach ($tempPosts as $tempPost){
          $posts[]=$tempPost;
        }

      }
    $posts = array_reverse(array_sort($posts, function ($value) {
      return $value['created_at'];
    }));


    $categories = Category::get();
    $archives = $this->archives();
    return view('posts.index', compact('posts', 'categories', 'archives','user'));
    }

    $posts = Post::latest()
    ->filter(request()->only(['month', 'year', 'user','search']))
    ->latest()
    ->get();

    $categories = Category::get();
    $archives = $this->archives();
    return view('posts.index', compact('posts', 'categories', 'archives'));
  }

  public function showAll(){
    $posts = Post::latest()
    ->filter(request()->only(['month', 'year', 'user','search']))
    ->get();

    $categories = Category::get();
    $archives = $this->archives();
    return view('posts.index', compact('posts', 'categories', 'archives'));
  }

  public function show($id){
    $posts = Post::where('id', $id)->get();
    return view ('posts.show', compact('posts'));
  }

  public function create (){

      $postTotal = Post::where('user_id', auth()->user()->id)->count();

      $postsLeft = 5 - $postTotal ;

    $categories = Category::get();
    return view ('posts.create', compact('categories','postsLeft'));
  }

  public function store (Request $request){
    $postTotal = Post::where('user_id', auth()->user()->id)->count();
    //$userRole = Auth::user()->role;
    if ($postTotal <5){ //Or $userRole = "pay"
    $this->validate(request(), [
      'title' => 'required|max:255',
      'body' => 'required',
      'category' => 'required'
    ]);

    $user = Auth::user();
    $user_id = Auth::user()->id;
    $title=request('title');


    $categories = $request->category;
    $post = Post::create([
        'title' => request('title'),
        'body' => request('body'),
        'disable_comments' => request('disable_comments'),
        'user_id' => auth()->id()
      ])->categories()->attach($categories);;


      $followers = $user ->followers()->get();
      foreach ($followers as $follower){
          \Mail::to($follower)->send(new NewPost($follower, $user));

      }


    return redirect('/')
      ->with('success','Blogpost posted successfully');;
    }else {
      redirect('/')
        ->with('success','error, max posts reached');;
    }
  }

  public function createcategory (){
    $categories = Category::get();
    return view ('posts.createcategory', compact('categories'));
  }

  public function edit($id){
    $post = Post::where('user_id', auth()->user()->id)
            ->where('id', $id)
            ->first();

    return view('posts.edit', compact('post', 'id'));
  }

  public function update(Request $request, $id){
    request()->validate([
      'title' => 'required|max:255',
      'body' => 'required',
    ]);

    Post::find($id)->update($request->all());
    return redirect('/')
           ->with('success','Blogpost updated successfully');
  }

  public function destroy($id){
    Post::find($id)->delete();
    return redirect('/')
          ->with('success','Blogpost deleted successfully');
  }

  private function archives(){
    return Post::orderBy('created_at', 'desc')
          ->whereNotNull('created_at')
          ->get()
          ->groupBy(function(Post $post) {
            return $post->created_at->format('F');
          })
          ->map(function ($item) {
            return $item
                  ->sortByDesc('created_at')
                  ->groupBy( function ( $item ) {
                    return $item->created_at->format('Y');
                  });

            });
  }


}
