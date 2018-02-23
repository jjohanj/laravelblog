
<div class='menu'>


	<a href="/">Home</a><br />
	  @if(Auth::check())
	<a href="#"><strong>Hello {{Auth::user()->name}}</strong></a><br>
	<a href="posts/create"><em>Write a new Blogpost</em></a><br />
	<a href="/all">Show All</a><br>
	@else
	<a href="/register">Register</a><br />
	@endif
	 <br />
		 <form action="/?search={{ isset($search) ? $search : '' }}" method="GET">

            <div class="input-group">
                <input type="text" class="form-control" style="width: 100%" name="search" placeholder="Search for..." value="{{ isset($search) ? $search : '' }}">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form><br>


	<h2> Categories </h2>

	@foreach ($categories as $category)
  <a href="/categories/{{ $category }}">
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
