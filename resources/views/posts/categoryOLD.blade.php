
@extends ('layout')
@section ('content')
 <a href="/">BACK TO ALL POSTS</a><br />
 <!-- <div class='menu'>

 @foreach ($categories as $category)
   <a href="/posts/{{$category->category}}">{{$category->category}}</a><br />
 @endforeach
 </div> -->
 <div class='main'>
@foreach ($posts as $post)
  @include ('posts.articles')
@endforeach
</div>

@endsection