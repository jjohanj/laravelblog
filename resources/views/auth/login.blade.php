@extends ('layout')

@section ('content')

<div class="col-sm-8">

    <a href="/"><h4>Return</h4></a><br>

    <h2> Login </h2>

    @include ('layouts.errors')

    <form method="POST" action="/login">
    {{csrf_field()}}

    <div class="form-group">
      <label for="email">E-mail:</label>
      <input id="email" type="email"
        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
        name="email" required>
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input id="password" type="password"
        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
        name="password" required>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </div>

  <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
        <a href='/password/reset'>
          <p>Forgot Your Password?
          </a></p>
        </div>
      </div>
  <div>

@endsection
