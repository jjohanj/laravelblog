@extends ('layout')

@section ('content')





@if (Auth::check())

@if ( Auth::user()->id  !=  $user->id)

@if ($isfollowing == TRUE )

<form action="{{ route('user.unfollow', $user->id) }}" method="post">
       {!! csrf_field() !!}
    <button class="btn btn-primary">unfollow {{$user->name}}</button>
</form><br />

@endif
		@if ($isfollowing == FALSE )

		<form action="{{ route('user.follow', $user->id) }}" method="post">
		      {!! csrf_field() !!}
		    <button class="btn btn-primary">Follow {{$user->name}}</button>
		</form><br />

		@endif
	@endif
@else
<div id="infobar">
<div class="alert alert-info">
<p> <a href="/login">
    Log in
  </a> or <a href="/register">
    register
  </a> to follow  {{$user->name}} </p>
</div>
</div>
@endif
@include ('layouts.sidebar')
<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>





@endsection
