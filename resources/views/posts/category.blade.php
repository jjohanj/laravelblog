@extends ('layout')

@section ('content')

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach

@endsection
