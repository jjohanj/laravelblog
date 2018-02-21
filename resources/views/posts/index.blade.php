@extends ('layout')

@section ('content')
<a href="posts/create">NEW BLOG POST</a><br />




<div class='menu'>
<<<<<<< HEAD
	<h2> Categories </h2>
@foreach ($categories as $category)
  <a href="/?category={{$category->category}}">{{$category->category}}</a><br />
=======
@foreach ($posts as $post)
  <a href="posts/{{$post->categories->pluck('id')}}">{{$post->categories->pluck('name')}}</a><br />
>>>>>>> MultipleCats
@endforeach

<h2> Archives </h2>

@foreach ($archives as $archive)
  <a href="/?month={{ $archive['month'] }}&year={{ $archive['year'] }}">

  {{$archive['month'] . ' ' . $archive['year']}}

</a><br />
@endforeach

</div>
<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection
