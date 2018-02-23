@extends ('layout')

@section ('content')
<a href="/">BACK TO MAIN MENU</a><br />


<div class='main'>
@foreach ($posts as $post)

 <h3> {{$post->title}}</h3>

<div class='articles'>{!!$post->body!!} </div>

<div class='category'>
  @foreach ($posts as $post)
  {{ $post->categories->pluck('name') }}
  @endforeach
</div>

@endforeach
<a href="/edit/post/{{ $post->id }}"> Edit or Delete this Post</a><br />
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
