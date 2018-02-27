@extends ('layout')

@section ('content')

<div class="col-sm-8">

    <a href="/"><h4>Return</h4></a><br>

    <h2> Register </h2>

    @include ('layouts.errors')

    <form method="POST" action="/register">
    {{csrf_field()}}

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class ="form-control" id="name" name="name"
        value="{{ old('name') }}" autofocus>
    </div>

    <div class="form-group">
      <label for="blogname">Blog Name:</label>
    <input id="blog_name" type="text"
      class="form-control{{ $errors->has('blog_name') ? ' is-invalid' : '' }}"
      name="blog_name" value="{{ old('blog_name') }}"  autofocus>
    </div>

    <div class="form-group">
      <label for="email">E-mail:</label>
      <input id="email" type="email"
        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
        name="email" value="{{ old('email') }}" >
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input id="password" type="password"
        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
        name="password" >
    </div>

    <div class="form-group">
      <label for="password-confirm">Confirm Password:</label>
      <input id="password-conform" type="password"
        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
        name="password_confirmation">
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </div>
  <div>

@endsection
