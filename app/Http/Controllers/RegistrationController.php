<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

      $user = User::create(request(['name', 'blog_name', 'email', 'password']));

      auth()->login($user);

      return redirect('/')
        ->with('success','Registered successfully');

    }
}
