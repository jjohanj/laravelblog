@extends ('layout')

@section ('content')

@include ('layouts.sidebar')

@include ('layouts.success')

<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
