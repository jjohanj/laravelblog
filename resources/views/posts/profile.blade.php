@extends ('layout')

@section ('content')
<a href="/">BACK TO MAIN MENU</a><br />



@if ($isfollowing == FALSE )
	
<form action="{{ route('user.follow', $user->id) }}" method="post">
      {!! csrf_field() !!}
    <button class="profilefollow">Follow {{$user->name}}</button>
</form><br />

@endif

@if ($isfollowing == TRUE )
	
<form action="{{ route('user.unfollow', $user->id) }}" method="post">
       {!! csrf_field() !!}
    <button class="profileunfollow">unfollow {{$user->name}}</button>
</form><br />	

@endif






<div class='main'>
@foreach ($posts as $post)
 <h3> {{$post->title}}</h3>
 <p> The edit and delete functions will be here soonTM</p>

<div class='articles'>{!!$post->body!!} </div>

<div class='category'>
  @foreach ($posts as $post)
  {{ $post->categories->pluck('name') }}
  @endforeach
</div>

@endforeach

<hr>
@if ($post->disable_comments == 'no')
 <div class="comments">
	<ul class="list-group">
	@foreach ($post->comments as $comment)
	<li class="list-group-item">

		<strong>{{$comment->created_at->diffForHumans()}}, {{$comment->user->name}} said:</strong>
		{{$comment->body}} &nbsp
@if(Auth::check())
@if (Auth::user()->id == $post->user_id)

<form action="{{ route('delete_comment_path', $comment->id) }}" method="post">
    <input type="hidden" name="_method" value="delete" />
    {!! csrf_field() !!}
    <button class="commentsdel">Delete</button>
</form><br />
@endif
@endif


	</li>
	@endforeach
</ul>


</div>

@if(Auth::check())

<div class="card">
	<div class="card-block">
		<form method="POST" action="/posts/show/{{$post->id}}/comments">
			{{ csrf_field() }}
			<div class="form-group">
				<textarea name='body' placeholder="Add your comment here" class="form-control"  required></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add comment</button>
			</div>

		</form>

	</div>



</div>
@endif


@endif

</div>


@endsection


 