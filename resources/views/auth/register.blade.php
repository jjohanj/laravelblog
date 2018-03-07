@extends ('layouts.info')

@section ('content')

<div class="col" style="text-align:center;margin-top:1rem">

  <div class="card" style="width:50%; margin:auto">
  <div class="card-header">
<h5 class="card-title">@lang('messages.register')</h5>
  </div>
  <div class="card-body">

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

    <div class="form-group">

            <button type="submit" class="btn btn-success">@lang('messages.register')</button>
          </div>


      </form>

  </div>
</div>

</div>

    @include ('layouts.errors')




@endsection
