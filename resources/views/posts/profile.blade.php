@extends('layouts.profilepage')

@section('content')




<div>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>


@endsection
