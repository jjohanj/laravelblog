<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class RoleController extends Controller
{
    public function upgrade($id){
      $user = User::find($id);
      $Premium_user = Role::find(2);
      $user->roles()->sync($premium_user);

    }
    public function downgrade($id){
      $user = User::find($id);
      $Premium_user = Role::find(1);
      $user->roles()->sync($premium_user);
      
    }
}
