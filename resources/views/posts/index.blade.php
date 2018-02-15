@extends ('layout')

@section ('content')
<a href="posts/create">NEW BLOG POST</a><br /> 
@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach

@foreach ($categories as $category)
  <a href="posts/{{$category->category}}">{{$category->category}}</a><br />  
@endforeach

@endsection
