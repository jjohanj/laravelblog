<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
Use Auth;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {

      return view ("register.create");
    }

    public function store()
    {
      $this->validate(request(),
      [
        'name' => 'required|string|max:255|unique:users',
        'blog_name' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
      ]);

      $name = request('name');
      $blogname = request('blog_name');
      $email = request('email');
      $password = request('password');

      $user = User::create([
          'name' => $name,
          'blog_name' => $blogname,
          'email' => $email,
          'password' => Hash::make($password),
      ]);

      auth()->login($user);

      return redirect('/')
        ->with('success','Registered successfully');

    }

    public function edit()
    {
      if (!(Hash::check(request('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp(request('current-password'), request('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $this->validate(request(),
        [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt(request('new-password'));
        $user->save();

        return redirect('/')
          ->with('success','Password changed successfully');

    }

}
