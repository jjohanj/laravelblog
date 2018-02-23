@extends ('layout')

@section ('content')

@if (Auth::check())
<a href="posts/create">NEW BLOG POST</a><br />
@endif
@if(Auth::check())
<a href="/{{ Auth::user()->id}}/show"><strong>following </strong></a> 
@endif
@include ('layouts.sidebar')

<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
