@extends ('layouts.info')

@section ('content')

<div class="col" style="text-align:center;margin-top:1rem">

  <div class="card" style="width:50%; margin:auto">
    <div class="card-header">
            <h3 class="card-title"> @lang('messages.login')</h3>
    </div>
    @include ('layouts.errors')
    <div class="card-body">
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

      <div class="form-group">

              <button type="submit" class="btn btn-success">@lang('messages.login')</button>

          </div>

    <div class="form-group">

          <a href='/password/reset'style="color:#28a745">
            <p>@lang('messages.forgotpwd')</a></p>

        </div>
      </form>

    </div>
  </div>
</div>

@endsection
