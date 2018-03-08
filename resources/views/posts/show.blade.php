@extends ('layouts.viewposts')

@section ('content')


<div class="card" style="width:100%; border:none">
  <div class="card-header">
  <h1 class="card-title" style="text-align:center;float:left">{{$post->title}}</h1>
  <div style="float:right">
  @if($average_score == 0)

      <button type="button" class="btn btn-primary" >
    <strong>NA&nbsp;</strong><span class="badge badge-light">{{$total_votes}}</span>
    </button>
        @elseif($average_score < 4)

      <button type="button" class="btn btn-danger" >
    <strong>{{$average_score}}&nbsp;</strong><span class="badge badge-light">{{$total_votes}}</span>
    </button>
          @elseif($average_score >6 )

          <button type="button" class="btn btn-success">
        <strong>{{$average_score}}&nbsp;</strong><span class="badge badge-light">{{$total_votes}}</span>
        </button>


      @else
      <button type="button" class="btn btn-warning" >
    <strong>{{$average_score}}&nbsp;</strong><span class="badge badge-light">{{$total_votes}}</span>
    </button>
  @endif
</div>
</div>
  <div class="card-body">


    <h5 class="card-subtitle mb-2 text-muted"><a href="/user/{{ $post->user->name}}" class="btn btn-secondary btn-sm">{{$post->user->name}}</a> <small>{{$post->created_at->diffForHumans()}}</small></h5>
    @foreach ($post->categories->pluck('name') as $value) <span class="badge badge-success">{{$value}}</span> @endforeach
    <hr>
    <div class="card-text">{!!$post->body!!} </div>

    <hr>
    @if(Auth::check())
<div class="container-fluid"style="text-align:center;">
    <h3 class="card-title" style="text-align:center;">Ratings</h3>
@if ($vote == NULL)
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups"style="margin:auto">
<div class="btn-group mr-2" role="group" aria-label="First group" style="margin-left:auto">
  <form action="/show/vote" method="post">
      {!! csrf_field() !!}
<input type='hidden' value='{{$post->id}}' name='post_id'>
<input type='hidden' value='1' name='score'>
<button type="submit" class="btn btn-danger">1</button>
</form>
  <form action="/show/vote" method="post">
    {!! csrf_field() !!}
    <input type='hidden' value='{{$post->id}}' name='post_id'>
    <input type='hidden' value='2' name='score'>
<button type="submit" class="btn btn-danger">2</button>
</form>
  <form action="/show/vote" method="post">
    {!! csrf_field() !!}
    <input type='hidden' value='{{$post->id}}' name='post_id'>
    <input type='hidden' value='3' name='score'>
<button type="submit" class="btn btn-danger">3</button>
</form>
</div>
<div class="btn-group mr-2" role="group" aria-label="Second group" >
    <form action="/show/vote" method="post">
      {!! csrf_field() !!}
      <input type='hidden' value='{{$post->id}}' name='post_id'>
      <input type='hidden' value='4' name='score'>
<button type="submit" class="btn btn-warning">4</button>
</form>
  <form action="/show/vote" method="post">
    {!! csrf_field() !!}
    <input type='hidden' value='{{$post->id}}' name='post_id'>
    <input type='hidden' value='5' name='score'>
<button type="submit" class="btn btn-warning">5</button>
</form>
  <form action="/show/vote" method="post">
    {!! csrf_field() !!}
    <input type='hidden' value='{{$post->id}}' name='post_id'>
    <input type='hidden' value='6' name='score'>
<button type="submit" class="btn btn-warning">6</button>
</form>
</div>
<div class="btn-group" role="group" aria-label="Third group" style="margin-right:auto">
  <form action="/show/vote" method="post">
      {!! csrf_field() !!}
      <input type='hidden' value='{{$post->id}}' name='post_id'>
      <input type='hidden' value='7' name='score'>
<button type="submit" class="btn btn-success">7</button>
</form>
  <form action="/show/vote" method="post">
    {!! csrf_field() !!}
    <input type='hidden' value='{{$post->id}}' name='post_id'>
    <input type='hidden' value='8' name='score'>
<button type="submit" class="btn btn-success">8</button>
</form>
  <form action="/show/vote" method="post">
    {!! csrf_field() !!}
    <input type='hidden' value='{{$post->id}}' name='post_id'>
    <input type='hidden' value='9' name='score'>
<button type="submit" class="btn btn-success">9</button>
</form>
  <form action="/show/vote" method="post">
    {!! csrf_field() !!}
    <input type='hidden' value='{{$post->id}}' name='post_id'>
    <input type='hidden' value='10' name='score'>
<button type="submit" class="btn btn-success">10</button>
</form>
</div>
</div>
@else
    <div class="card-text">Your score:

          @if($vote->vote < 4)

        <button type="button" class="btn btn-danger">
      {{$vote->vote}}
      </button>
            @elseif($vote->vote >6 )

            <button type="button" class="btn btn-success">
          {{$vote->vote}}
          </button>


        @else
        <button type="button" class="btn btn-warning">
      {{$vote->vote}}
      </button>
    @endif </div>
    @endif
</div>
@endif
      @if(Auth::check())
    @if (Auth::user()->id == $post->user_id)
    <br>
        <div style='float:right;'>
    <form action="/edit/post/{{ $post->id }}" method="get">

        {!! csrf_field() !!}
        <button class="btn btn-info">Edit/Delete</button>
    </form>
    </div>
    @endif
    @endif
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
