<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class='menu'>


	<a href="/">Home</a><br />
	  @if(Auth::check())


	<a href="/user/{{Auth::user()->name}}"><strong>@lang('messages.greeting') {{Auth::user()->name}}</strong></a><br />
	<a href="/posts/create"><em>@lang('messages.write')</em></a><br />
	<a href="/all">@lang('messages.showall')</a><br>
	@else
	<a href="/register">@lang('messages.register')</a><br />
	@endif
	 <br />
		 <form action="/?search={{ isset($search) ? $search : '' }}" method="GET">

            <div class="input-group">
                <input type="text" class="form-control" style="width: 100%" name="search" placeholder="Search for..." value="{{ isset($search) ? $search : '' }}">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">@lang('messages.search')</button>
                </span>
            </div>
        </form><br>
<h2> top users </h2>
<ul>
	@foreach($topusers as $topuser)
	<li><a href="/user/{{$topuser->name}} "><strong>{{$topuser->name}}</strong></a></li>

	@endforeach

</ul>


	<h2> @lang('messages.categories') </h2>
	@foreach ($categories as $category)
  <button class="btn btn-primary" id="catfilter" onclick="sort('{{ $category }}')">
    {{ $category }}
  </button><br />

@endforeach

<h2> @lang('messages.archive') </h2>

@foreach($archives as $year => $months)
    <h6 class="mb-0">
      <a href="?month={{$year}}">
        {{ $year }}
      </a><br>
    </h6>
@endforeach


</div>

<script>
function sort(name){
$.ajax({
		url: '/categories/'+name,
		type: "GET", // not POST, laravel won't allow it
		success: function(data){
			$data = $(data); // the HTML content your controller has produced
			$('.main').fadeOut().html($data).fadeIn();
			}
	});
};
</script>
