
@extends ('layout')

@section ('content')
  <a href="/">BACK TO HOME PAGE</a><br />
  <a href="/posts/create">Submit a post</a><br />
<div id="form">
  <ul>
@foreach ($categories as $category)
     <li> {{$category->name}}</li>
@endforeach
<ul>

<form action="/posts/create/category" method="POST">
  {{ csrf_field() }}

  <div id="inputfield"></div>
    <input placeholder="category" name="name" type="name" id="title" required></br>

    <button type="submit">Add category!</button></br>
  </div>
</form>

</div>
@endsection
