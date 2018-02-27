<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class RoleController extends Controller
{

  public function __construct(){
    $this->middleware('auth');
  }
  public function showUpgrade(){
    return view ('upgrade');
  }
  public function showDowngrade(){
    return view ('downgrade');
  }

    public function upgrade(){
      $user =  Auth::user();
      $premium_user = Role::find(2);
      $user->roles()->sync($premium_user);

      $role = $user->roles->first();
      return redirect()->action('ProfileController@settings');

    }
    public function downgrade(){
        $user =  Auth::user();
      $free_user = Role::find(1);
      $user->roles()->sync($free_user);
      $role = $user->roles->first();
      return redirect()->action('ProfileController@settings');

    }


}
