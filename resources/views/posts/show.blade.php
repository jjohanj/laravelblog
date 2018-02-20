@extends ('layout')

@section ('content')
<a href="/">BACK TO MAIN MENU</a><br />

<div class='main'>
@foreach ($posts as $post)
 <h3> {{$post->title}}</h3>

<div class='articles'>{{$post->body}} </div>

<div class='category'>category: {{$post->category}} </div>

@endforeach

<hr>
@if ($post->disable_comments == 'no')
 <div class="comments">
	<ul class="list-group">
	@foreach ($post->comments as $comment)
	<li class="list-group-item">

		{{$comment->created_at->diffForHumans()}}:&nbsp
		<strong>{{$comment->body}} &nbsp</strong>
<form action="{{ route('delete_comment_path', $comment->id) }}" method="post">
    <input type="hidden" name="_method" value="delete" />
    {!! csrf_field() !!}
    <button class="commentsdel">Delete</button>
</form><br />



	</li>
	@endforeach
</ul>
</div>
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

</div>


@endsection