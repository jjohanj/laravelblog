
<div class='menu'>

	<a href="/">Home</a><br />
	  @if(Auth::check())
	<a href="/user/{{Auth::user()->name}}"><strong>Hello {{Auth::user()->name}}</strong></a><br />
	<a href="/posts/create"><em>Write a new Blogpost</em></a><br />
	<a href="/all">Show All</a><br>
	@else
	<a href="/register">Register</a><br />
	@endif
	 <br />
		 <form action="?search={{ isset($search) ? $search : '' }}" method="GET">

            <div class="input-group">
                <input type="text" class="form-control" style="width: 100%" name="search" placeholder="Search for..." value="{{ isset($search) ? $search : '' }}">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </form><br>


<h2> Followers: <small> {{count($sidebar_followers)}} </small></h2>

<div>
@foreach ($sidebar_followers as $sidebar_follower)
  <a href="/user/{{ $sidebar_follower->name}}">{{$sidebar_follower->name}} </a> <br />
@endforeach
</div style="max-height: 100px; overflow: scroll;">
<div>
<h2> Following: <small>{{count($sidebar_followings)}}</small></h2>

@foreach ($sidebar_followings as $sidebar_following)
  <a href="/user/{{ $sidebar_following}}">{{$sidebar_following}} </a> <br />
@endforeach
</div style="max-height: 100px; overflow: scroll;">
<h2> Archives </h2>

@foreach($archives as $year => $months)
    <h6 class="mb-0">
      <a href="?month={{$year}}">
        {{ $year }}
      </a><br>
    </h6>
@endforeach




</div>
