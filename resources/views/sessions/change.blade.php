@extends ('layout')

@section ('content')

<div class="col-sm-8">

    <a href="/"><h4>Return</h4></a><br>

    @if(Auth::check())

    <h2> @lang('messages.changepwd') </h2>

    @include ('layouts.errors')

    <form method="POST" action="/changepassword">
    {{csrf_field()}}

    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
      <label for="new-password">Current Password</label>
      <input id="current-password" type="password" class="form-control"
          name="current-password" required>
          <br><br>
    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
      <label for="new-password">New Password</label>
      <input id="new-password" type="password" class="form-control"
          name="new-password" required>
          <br>
    <div class="form-group{{ $errors->has('new-password-confirm') ? ' has-error' : '' }}">
      <label for="new-password-confirm">Confirm new Password</label>
      <input id="new-password-confirm" type="password" class="form-control"
          name="new-password_confirmation" required>
          <br>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">@lang('messages.changepwd')</button>
          </div>
        </div>
  <div>

  @else
  <div id="infobar">
  <div class="alert alert-warning">
  <p> Your are not logged in.<br>
    Click here to
    <a href="/login">
      Log in
    </a> or <a href="/register">
      register
    </a></p>
  </div>
  </div>

@endif

@endsection
