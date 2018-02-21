<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@extends ('layout')

@section ('content')
  <a href="/">BACK TO HOME PAGE</a><br>

<a href=" /posts/create/category">ADD A CATEGORY</a><br><br>

<strong>Enter Blog post here</strong>

<div id="form">
<form action="/posts" method="POST">
  {{ csrf_field() }}

  <div id="inputfield"></div>
    <input placeholder="Title" name="title" type="text" id="title" ></br>
    <br>
    @foreach ($categories as $category)
     <input type="radio" name="category" value="{{$category->name}}" checked>{{$category->name}}<br>
     @endforeach
     <div id='textexpander'>
       Tip: typ '@' in het tekstveld om de text expander te gebruiken
     </div>
     <br><br>
    <textarea rows="20" placeholder="Blog tekst" name="body" type="text"></textarea></br>

<input type='hidden' value='no' name='disable_comments'><br/>
  <input type='checkbox' value='yes' name='disable_comments'> Disable comments <br/>

    <button type="submit">Plaats blog op de website!</button></br>

</form>
</div>

@endsection

@section('scripts')
  @include ('layouts.texteditexpand')
@endsection
