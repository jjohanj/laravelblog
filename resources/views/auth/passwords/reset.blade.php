@extends ('layout')

@section ('content')

<div class="col-sm-8">

    <a href="/"><h4>Return</h4></a><br>

    <h2>Send password reset link by E-mail</h2>

    @include ('layouts.errors')

    <form method="POST" action="{{ route('password.request') }}">
    {{csrf_field()}}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
      <label for="email">E-mail address</label>
        <input id="email" type="email"
          class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
          name="email" value="{{ $email or old('email') }}" required autofocus>
          <br>
    <div class="form-group">
      <label for="password">New Password</label>
      <input id="password" type="password"
        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
        name="password" required>
          <br>
    <div class="form-group">
      <label for="password-confirm">Confirm new Password</label>
      <input id="password-confirm" type="password" class="form-control"
          name="password_confirmation" required>
          <br>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
        </div>

@endsection
