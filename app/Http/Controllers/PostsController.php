<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Role;
use App\Vote;
use App\Rating;
use App\Setting;
use Auth;
use Carbon\Carbon;
use App\Mail\NewPost;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

  public function __construct(){
    $this->middleware('auth')->except(['index', 'show', 'sort','search', 'showAll', 'fromUser']);
  }

public function vote(Request $request){
  $post_id = $request->post_id;
  $score = $request->score;
  $user_id = Auth::user()->id;

$rating = Rating::where('post_id',$post_id)->first();
$rating->total_rating += $score;
$rating->total_votes += 1;
  $rating->save();

$vote = Vote::create([
  'user_id'=> $user_id,
  'post_id'=> $post_id,
  'vote' => $score,
]);

return back();


}

  public function search($searchTerm){
    $posts = Post::search($searchTerm)->get();
  }

  public function index(){
    $topusers = User::get()->sortByDesc(function(user $user){ return $user->followers->count();})->take(5);



  //$column = Input::get('orderBy', 'defaultColumn');
  //$comments = User::find(1)->comments()->orderBy($column)->get();


    if(Auth::check()){
      $userid = Auth::user()->id;
      $user = User::find($userid);
      $followers = $user->followers;
      $followings = $user->followings()->get();
      $posts = '';

      if($followings->count() == 0){
        $posts = $posts = Post::with('rating')->join('ratings', 'ratings.post_id','=','posts.id')->orderBy('total_votes','desc')
        ->filter(request()->only(['month', 'year', 'user','search']))
        ->get();
      }else{
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
};

    $categories = Category::get();
    $archives = $this->archives();
    return view('posts.index', compact('posts', 'categories', 'archives','user', 'topusers'));
    }

    $posts = Post::latest()
    ->filter(request()->only(['month', 'year', 'user','search']))
    ->latest()
    ->get();

    $categories = Category::get();
    $archives = $this->archives();
    return view('posts.index', compact('posts', 'categories', 'archives','topusers'));
  }

  public function showAll(){
    $topusers = User::get()->sortByDesc(function(user $user){ return $user->followers->count();})->take(5);

    $posts = Post::with('rating')->join('ratings', 'ratings.post_id','=','posts.id')->orderBy('total_votes','desc')
    ->filter(request()->only(['month', 'year', 'user','search']))
    ->get();

  //$top_posts = Post::->get();

    $categories = Category::get();
    $archives = $this->archives();
    return view('posts.index', compact('posts', 'categories', 'archives', 'topusers'));
  }

  public function show($id){
    $post = Post::where('id', $id)->first();

    $user_id = $post->user_id;
    $user = User::find($user_id);

    $total_rating = $post->rating()->first()->total_rating;
    $total_votes = $post->rating()->first()->total_votes;
    $average_score = '';
    if ($total_votes == 0){
      $average_score= 0;
    }else {
      $average_score = $total_rating / $total_votes;
    }
$average_score = round($average_score, 1);
      if(Auth::check()){
    $viewer = Auth::user();

    $vote = $viewer->vote()->where('post_id',$id)->first();

}else{$vote= NULL;}
    return view ('posts.show', compact('post', 'user','total_votes','average_score' ,'vote'));
  }

  public function create (){

      $postTotal = Post::where('user_id', auth()->user()->id)->count();
      $user = Auth::user();
        $user_role = 'free';
        if ($user->hasRole('premium_user')){
         $user_role = "premium";

       }

      $postsLeft = 5 - $postTotal ;

    $categories = Category::get();
    return view ('posts.create', compact('categories','postsLeft', 'user_role'));
  }

  public function store (Request $request){
    $postTotal = Post::where('user_id', auth()->user()->id)->count();

    $user = Auth::user();
    if ($postTotal <5 || $user->hasRole('premium_user') || $user->hasRole('admin')){
    $this->validate(request(), [
      'title' => 'required|max:255',
      'body' => 'required',
      'category' => 'required'
    ]);

    $user = Auth::user();
    $user_id = Auth::user()->id;
    $title=request('title');
    User::find($user_id)->increment('total_blogposts');

    $categories = $request->category;

    $post = Post::create([
        'title' => request('title'),
        'body' => request('body'),
        'disable_comments' => request('disable_comments'),
        'user_id' => auth()->id()
      ])->categories()->attach($categories);
      $post_title = request('title');
$post_id =Post::where('title',$post_title)->first()->id;
      $rating = Rating::create([
        'post_id' => $post_id,
        'total_rating' => 0,
        'total_votes'=>0,
      ]);

      $followers = $user ->followers()->get();
      foreach ($followers as $follower){

        $settings = Setting::where('user_id', $follower->id)->get();
        $notification = "";
          foreach ($settings as $setting){
            $notification = $setting;
        }

        if ($notification->enable_newpost =='yes'){
          \Mail::to($follower)->send(new NewPost($follower, $user));
        }
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
  private function topusers(){
    return User::get()
          ->sortByDesc(function(User $user) {
            return $user->followers>count();
          });


  }

  private function topposts(){
    return POST::get()
          ->sortByDesc(function(User $rating) {
            $totalscore = $post->rating()>first()->total_rating;
            $votes = $post->rating()->first()->total_votes;
            $score = '';
            if ($votes == 0){
              $score = 0;
            }else{
              $score = $total_score / $votes;
            }
            return $score;
          });


  }


}
