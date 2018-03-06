<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script> window.Laravel = { csrfToken: '{{ csrf_token() }}'} </script>
@section('scripts')
  @include ('layouts.texteditexpand')
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<script src="{{asset('js/app.js')}}"></script>
@endsection

@extends ('layout')

@section ('content')


  <a href="/">BACK TO HOME PAGE</a><br>

  @if ($postsLeft > 0)

@if ($user_role == 'free')
  <h4> You have {{$postsLeft}} posts left (<a href="/info">what is this?</a>) </h4>
@endif

<a href=" /posts/create/category">ADD A CATEGORY</a><br><br>

@include ('layouts.errors')

<strong>Enter Blog post here</strong>

<div id="form">
<form action="/posts" method="POST">
  {{ csrf_field() }}

  <div id="inputfield"></div>
    <input placeholder="Title" name="title" type="text" id="title" value="{{ old('title') }}"></br>
    <br>
    Category/categories <br/>
  @foreach ($categories as $category)

      <input type='checkbox' value='{{$category->id}}' name='category[]'> {{$category->name}} <br/>
@endforeach
     <div id='textexpander'>
       Tip: type '@' to use the text expander.
     </div>
     <br><br>
    <textarea rows="20" name="body" type="text">{{ old('body') }}</textarea></br>

<input type='hidden' value='no' name='disable_comments'><br/>
  <input type='checkbox' value='yes' name='disable_comments'> Disable comments <br/>

    <button class="btn btn-primary" type="submit">Plaats blog op de website!</button></br>

</form>
</div>

@else
<div>
  Uh Oh, it looks like you've used all your free posts! <br/>
  Upgrade your account via the <a href="/settings">settings</a> menu, for unlimited posts! <br/>
  Haven't posted 5 times yet? Please contact us!
</div>

  @endif

@endsection
