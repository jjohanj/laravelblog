<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Setting;
<<<<<<< HEAD
use App\Paymentdetails;

=======
>>>>>>> 143bc02fb95a32babc0b2829c9fe3f16af40b711
use App\Role;
use App\Category;
use Auth;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\NewFollower;
use Illuminate\Support\Facades\DB;
use PDF;

class ProfileController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->except(['info', 'show']);
  }

  public function info()
  {
      return view('info');
  }
  public function followUser($profileId){
    $user = User::find($profileId);
    $follower=  Auth::user();
    if(! $user) {
      return redirect()->back()->with('error', 'User does not exist.');
    }

    $user->followers()->attach(auth()->user()->id);
    $settings = Setting::where('user_id', $user->id)->get();
    $notification = "";
foreach ($settings as $setting){
  $notification = $setting;
}

if ($notification->enable_newfollower == 'yes'){
          \Mail::to($user)->send(new NewFollower($user , $follower));
        };
    return redirect()->back()->with('success', 'Successfully followed the user.');
  }

  public function unFollowUser($profileId){
    $user = User::find($profileId);
    if(! $user) {
      return redirect()->back()->with('error', 'User does not exist.');
    }
    $user->followers()->detach(auth()->user()->id);
    return redirect()->back()->with('success', 'Successfully unfollowed the user.');
  }

  public function show($username) {


    $authuser = Auth::user();
    $user = User::where('name' , '=', $username)->first();
    $sidebar_followings = $user ->followings()->pluck('name');
    $sidebar_followers = $user ->followers()->get();
    $userid = $user->id;

    $posts = User::find($userid)->posts()->latest()
              ->filter(request()->only(['month', 'year']))
      ->get();
      $archives = $this->archives();

if(Auth::check()){

  $followings = $authuser->followings()->pluck('leader_id');
  $followed=array();
  $isfollowing=FALSE;
    foreach ($followings as $following){
      $followed[]=$following;
    }
    if (in_array($userid, $followed)) {
      $isfollowing=TRUE;
    }

    $posts = User::find($userid)->posts()->get();
    $categories = Category::get();

    if ($authuser->id == $userid) {

      return view('posts.profile', compact('posts', 'categories', 'archives','user','sidebar_followings','sidebar_followers'));
     }

  return view('posts.profile', compact('posts', 'categories', 'archives','user', 'isfollowing', 'sidebar_followings','sidebar_followers'));

  }

    return view('posts.profile', compact('posts', 'categories', 'archives','user', 'sidebar_followings','sidebar_followers'));

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
  public function settings(){




    $user =  Auth::user();

    $settings = Setting::where('user_id', $user->id)->get();
    $notification = "";
    foreach ($settings as $setting){
      $notification = $setting;
    }



    $role = $user->roles->first();
    return view ('settings', compact ('user', 'role', 'notification'));

  }

  public function setImage()
  {
    return view('layouts.headerimage');
  }

  public function update()
  {
      request()->validate([
        'blogimage' => 'required',
      ]);


      $user = Auth::user();
      $user->blogimage = request('blogimage');
      $user->save();

      return redirect('/')
             ->with('success','Blog image set');
  }

  public function print()
    {
        $user = Auth::user();

        $posts = Post::where('user_id', $user->id)->get();

        $categories = Category::get();

        view()->share(['posts' => $posts, 'categories' => $categories]);

        $pdf = PDF::loadView('/posts/pdfview');

        return $pdf->download('myblogs.pdf');
        }

    }
