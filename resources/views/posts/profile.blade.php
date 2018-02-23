@extends ('layout')

@section ('content')



@include ('layouts.sidebar')

@if (Auth::check())

@if ( Auth::user()->id  !=  $user->id)

@if ($isfollowing == FALSE )

<form action="{{ route('user.follow', $user->id) }}" method="post">
      {!! csrf_field() !!}
    <button class="btn btn-primary">Follow {{$user->name}}</button>
</form><br />

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
<p> <a href="/login">
    Log in
  </a> or <a href="/register">
    register
  </a> to follow  {{$user->name}} </p>
@endif

<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>





@endsection
