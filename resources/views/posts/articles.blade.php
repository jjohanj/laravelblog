


<h3> <a href="/posts/show/{{$post->id}}">{{$post->title}}</a>  </h3>

<div class='articles'>{!!$post->body!!} </div>

<div class='category'>category: {{$post->category}} </div>

<div class='postdate'>Posted at: {{$post->created_at}} </div>
<br>
<hr>
