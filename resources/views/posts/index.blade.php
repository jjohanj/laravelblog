@extends ('layout')

@section ('content')

@if(Auth::check())

<!-- <a href="/{{ Auth::user()->id}}/show">following</a> -->

@endif

@include ('layouts.sidebar')

@include ('layouts.success')

<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
