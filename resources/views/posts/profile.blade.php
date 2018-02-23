@extends ('layout')

@section ('content')
<a href="/">BACK TO MAIN MENU</a><br />

@include ('layouts.sidebar')

@if ( Auth::user()->id  !=  $user->id)

@if ($isfollowing == FALSE )

<form action="{{ route('user.follow', $user->id) }}" method="post">
      {!! csrf_field() !!}
    <button class="btn btn-primary">Follow {{$user->name}}</button>
</form><br />

@endif

@if ($isfollowing == TRUE )

<form action="{{ route('user.unfollow', $user->id) }}" method="post">
       {!! csrf_field() !!}
    <button class="btn btn-primary">unfollow {{$user->name}}</button>
</form><br />

@endif
@endif

<div class='main'>

@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>





@endsection
