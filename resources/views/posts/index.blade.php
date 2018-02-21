@extends ('layout')

@section ('content')
<a href="posts/create">NEW BLOG POST</a><br />
<a href="/login"> login</a><br />

@if(Auth::check())

<a href="/logout">logout</a><br />
<a href="#">Hello {{Auth::user()->name}}</a><br />
@endif


<div class='menu'>
@foreach ($posts as $post)
  <a href="posts/{{$post->categories->pluck('id')}}">{{$post->categories->pluck('name')}}</a><br />
@endforeach
</div>
<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
