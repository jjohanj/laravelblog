
@foreach ($posts as $post)
<h3>{{$post->title}}</h3>

<div class='articles'>{!!$post->body!!} </div>

<div class='category'>
  {{ $post->categories->pluck('name') }}
</div>

<div class='postdate'><strong>{{$post->user->name}} </strong>Posted on {{$post->created_at}} </div>
<br>
<hr id="theline">
@endforeach
