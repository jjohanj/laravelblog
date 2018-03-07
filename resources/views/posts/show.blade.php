@extends ('layouts.viewposts')

@section ('content')


<div class="card" style="width:100%; border:none">
  <div class="card-body">
    <h1 class="card-title" style="text-align:center;">{{$post->title}}</h1>
    <hr>

    <h5 class="card-subtitle mb-2 text-muted"><a href="/user/{{ $post->user->name}}" class="btn btn-secondary btn-sm">{{$post->user->name}}</a> <small>{{$post->created_at->diffForHumans()}}</small></h5>
    @foreach ($post->categories->pluck('name') as $value) <span class="badge badge-success">{{$value}}</span> @endforeach
    <hr>
    <div class="card-text">{!!$post->body!!} </div>
    <div style='float:right;'> @if(Auth::check())
    @if (Auth::user()->id == $post->user_id)
    <form action="/edit/post/{{ $post->id }}" method="get">

        {!! csrf_field() !!}
        <button class="btn btn-info">Edit/Delete</button>
    </form>
    @endif
    @endif </div>
  </div>
</div>


<hr>




@if ($post->disable_comments == 'no')

<div class="container-fluid" style="max-height:500px;overflow:hidden">
<div class="container" style='width:100%;height:100%;overflow-y:auto;padding-right:17px;'>

	@foreach ($post->comments as $comment)

  <div class="card w-100" style='margin-bottom:5px;'>
    <div class="card-body">
      <div>
      <h6 class="card-title"><strong>{{$comment->created_at->diffForHumans()}}, {{$comment->user->name}} said:</strong></h6>
      <p class="card-text">{{$comment->body}}</p>
    </div>

      @if(Auth::check())
      @if (Auth::user()->id == $post->user_id)
      <div style="float:right">
      <form action="{{ route('delete_comment_path', $comment->id) }}" method="post">
          <input type="hidden" name="_method" value="delete" />
          {!! csrf_field() !!}
          <button class="btn btn-danger">Delete</button>
      </form>
      </div>
      @endif
      @endif
    </div>
  </div>
	@endforeach

</div>
</div>
@if(Auth::check())

<div class="card" style="border:none;">
  <div class="card-header">
      <h3 class="card-title" style="text-align:center;">Join the discussion!</h3>
</div>
	<div class="card-body">
		<form method="POST" action="/posts/show/{{$post->id}}/comments">
			{{ csrf_field() }}
			<div class="form-group">
				<textarea name='body' placeholder="Add your comment here" class="form-control"  required></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Add comment</button>
			</div>

		</form>

	</div>



</div>
@endif


@endif

</div>


@endsection
