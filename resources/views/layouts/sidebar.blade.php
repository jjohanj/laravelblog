
<div class='menu'>
@if (Auth::check())
	 <a href="/all">
   Show All
  </a><br />
		 <form action="/?search={{ isset($search) ? $search : '' }}" method="GET">
            
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for..." value="{{ isset($search) ? $search : '' }}">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </span>
            </div>
        </form>
@endif
        
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
