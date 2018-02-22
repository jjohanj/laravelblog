


<h3> <a href="/posts/show/{{$post->id}}">{{$post->title}}</a>  </h3>

<div class='articles'>{!!$post->body!!} </div>

<div class='category'>
  {{ $post->categories->pluck('name') }}
</div>

<div class='postdate'> <a href="user/{{ $post->user->name}}"><strong>{{$post->user->name}} </strong></a> Posted on {{$post->created_at}} </div>
<br>
<hr>
