<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{

  public function followUser($profileId){
    $user = User::find($profileId);
    if(! $user) {
      return redirect()->back()->with('error', 'User does not exist.');
    }

    $user->followers()->attach(auth()->user()->id);
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
    $user = User::where('name' , '=', $username)->first();
    $sidebar_followings = $user ->followings()->pluck('name');
    $sidebar_followers = $user ->followers()->get();
    $userid = $user->id;
    
    $posts = User::find($userid)->posts()->latest()
              ->filter(request()->only(['month', 'year']))
      ->get();
      $archives = $this->archives();
     if(Auth::check()){

      $follower=  Auth::user();
      $followings = $follower->followings()->pluck('leader_id');
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

        if (Auth::user()->id == $userid) {
                
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

}
