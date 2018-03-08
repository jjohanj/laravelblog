



<div class="card" style="width:100%; border:none;margin-bottom:1rem;">
  <div class="card-body">
    <h2 class="card-title" ><a href="/posts/show/{{$post->id}}" style="color:#28a745">{{$post->title}}</a> </h2>
    <h5 class="card-subtitle mb-2 text-muted"><a href="/user/{{ $post->user->name}}" class="btn btn-secondary btn-sm"><strong>{{$post->user->name}} </strong></a> <small>{{$post->created_at->diffForHumans()}}</small></h5>
    @foreach ($post->categories->pluck('name') as $value) <span class="badge badge-success">{{$value}}</span> @endforeach
  </div>
</div>
