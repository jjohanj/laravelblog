
<div class='menu'>
	<h2> Categories </h2>

@foreach ($categories as $category)
  <a href="/posts/categories/{{ $category }}">
    {{ $category }}
  </a><br />
@endforeach

<h2> Archives </h2>

@foreach ($archives as $archive)
  <a href="/?month={{ $archive['month'] }}&year={{ $archive['year'] }}">

  {{$archive['month'] . ' ' . $archive['year']}}

</a><br />
@endforeach

</div>
