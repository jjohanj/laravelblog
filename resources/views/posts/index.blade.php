@extends ('layouts.home')

@section ('content')





@include ('layouts.success')

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach


@endsection
