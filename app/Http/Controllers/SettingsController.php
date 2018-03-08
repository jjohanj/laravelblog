<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Setting;
use App\Role;
Use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function updatemail(){
$user_id =  Auth::user()->id;

      $comment = Setting::where('user_id', $user_id)->update([
        'enable_newcomment' => request('enable_commentsmail'),
        'enable_newfollower' => request('enable_followersmail'),
        'enable_newpost' => request('enable_postsmail'),
      ]);
return redirect('/settings');
    }

}
