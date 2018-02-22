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

public function show($userId)
{
    $user = User::find($userId);
    $followers = $user->followers;
    $followings = $user->followings()->get();

    $posts = array();

    foreach ($followings as $following){
    	$tempPosts = $following->posts()->latest()->get();;
    	
    	foreach ($tempPosts as $tempPost){
    		$posts[]=$tempPost;
    	}
    }

    $categories = Category::get();
    $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderByRaw('min(created_at)')
      ->get()
      ->toArray();

     

    return view('posts.profile', compact('posts', 'categories', 'archives','user'));

}
}

