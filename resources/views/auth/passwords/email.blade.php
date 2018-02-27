@extends ('layout')

@section ('content')

<div class="col-sm-8">

    <a href="/"><h4>Return</h4></a><br>

    <h2>Send password reset link by E-mail</h2>

    @include ('layouts.errors')

    <form method="POST" action="{{ route('password.email') }}">
    {{csrf_field()}}

    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
      <label for="email">Your E-mail address</label>
      <input id="email" type="email"
        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
        name="email" value="{{ old('email') }}" required>
          <br>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
          </div>
        </div>
  <div>

@endsection
