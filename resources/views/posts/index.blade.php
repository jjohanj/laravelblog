@extends ('layout')

@section ('content')
<a href="posts/create">NEW BLOG POST</a><br />
<a href="/{{ Auth::user()->id}}/show"><strong>following </strong></a> 

@include ('layouts.sidebar')

<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
