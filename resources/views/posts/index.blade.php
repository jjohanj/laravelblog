@extends ('layout')

@section ('content')
<a href="posts/create">NEW BLOG POST</a><br />




<div class='menu'>
	<h2> Categories </h2>
@foreach ($categories as $category)
  <a href="/?category={{$category->category}}">{{$category->category}}</a><br />
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
