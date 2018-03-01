@extends ('layout')

@section ('content')

@include ('layouts.sidebar')

<div class='main'>

@include ('layouts.success')

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
