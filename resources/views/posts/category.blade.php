
@foreach ($posts as $post)
<div class="card" style="width:100%; border:none">
  <div class="card-body">
    <h4 class="card-title"><a href="/posts/show/{{$post->id}}">{{$post->title}}</a> </h4>
    <h5 class="card-subtitle mb-2 text-muted"><a href="/user/{{ $post->user->name}}"><strong>{{$post->user->name}} </strong></a> Posted on {{$post->created_at}}</h5>
    @foreach ($post->categories->pluck('name') as $value) <span class="badge badge-success">{{$value}}</span> @endforeach




  </div>
</div>
<hr id="theline">

@endforeach
