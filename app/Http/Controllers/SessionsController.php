<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __contruct()
    {
      $this->middleware('guest', ['exept' => 'destroy', 'changepassword']);
    }

    public function create()
    {
      return view('sessions.create');
    }

    public function store()
    {
      if (! auth()->attempt(request(['email', 'password']))) {
        return back()->withErrors([
          'message' => 'Please check your credentials and try again!'
        ]);
      }
        return redirect ('/');
    }

    public function destroy()
    {
      auth()->logout();
      return redirect ('/');
    }

    public function changepassword()
    {
      return view('sessions.change');
    }
}
