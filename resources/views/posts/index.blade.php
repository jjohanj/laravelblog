@extends ('layout')

@section ('content')
<a href="posts/create">NEW BLOG POST</a><br />

include ('layouts.sidebar')

<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
