@extends ('layout')

@section ('content')
<a href="posts/create">NEW BLOG POST</a><br />
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
