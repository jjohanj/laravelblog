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
   
public function followUser($profileId)
{ 
  $user = User::find($profileId);
  if(! $user) {
    
     return redirect()->back()->with('error', 'User does not exist.'); 
 }

$user->followers()->attach(auth()->user()->id);
return redirect()->back()->with('success', 'Successfully followed the user.');
}
public function unFollowUser($profileId)
{
  $user = User::find($profileId);
  if(! $user) {
    
     return redirect()->back()->with('error', 'User does not exist.'); 
 }
$user->followers()->detach(auth()->user()->id);
return redirect()->back()->with('success', 'Successfully unfollowed the user.');
}

public function show($username)
  {

 
$user = User::where('name' , '=', $username)->first();

    $userid = $user->id;
       $posts = User::find($userid)->posts()->latest()
    ->filter(request()->only(['month', 'year']))
    ->get();
     $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderByRaw('min(created_at)')
      ->get()
      ->toArray();
     if(Auth::check()){
 
    $follower=  Auth::user();
    $followings = $follower->followings()->pluck('leader_id');;
    $followed=array();
    $isfollowing=FALSE;
    foreach ($followings as $following){
        $followed[]=$following;
      }


    if (in_array($userid, $followed)) {
    $isfollowing=TRUE;
    }



    $posts = User::find($userid)->posts()->get();
     //Auth::user()->id == $userid;

    $categories = Category::get();
   


      if (Auth::user()->id == $userid) {
         //add delete and edit options
      return view('posts.profile', compact('posts', 'categories', 'archives','user'));

    }

    return view('posts.profile', compact('posts', 'categories', 'archives','user', 'isfollowing'));

     }return view('posts.profile', compact('posts', 'categories', 'archives','user'));
   
      }

}

