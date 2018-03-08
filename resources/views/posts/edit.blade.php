

@section('scripts')
  @include ('layouts.texteditexpand')
@endsection

@extends ('layouts.create')

@section ('content')


@include ('layouts.errors')

<div class="container-fluid"style="margin-top:1rem">
  <div class="card">
  <div class="card-header">
    <h3 class="card-title">Edit or delete your blog post</h3>

  </div>
  <div class="card-body">

  <form method="post" action="{{action('PostsController@update', $id)}}" >
  {{ csrf_field() }}
      <input name="_method" type="hidden" value="PATCH">

  <div class="form-group">
    <input type="hidden" value="{{csrf_token()}}" name="_token">

    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" value='{{$post->title}}'>
  </div>


      <div class="form-group">

    <label for="description">Content</label>
      <textarea cols="5" rows="5" class="form-control" name="body">{{$post->body}}</textarea>
 </div>
<div class="form-group">

        <input type='hidden' value='no' name='disable_comments'><br/>
        <input type='checkbox' value='yes' name='disable_comments'> Disable comments <br/>

</div>
<button class="btn btn-success" type="submit">Update</button></br>
</form>
<div class="container-fluid">
<form method="post" action="{{action('PostsController@destroy', $id)}}" style="float:right">
  {{csrf_field()}}

  <input name="_method" type="hidden" value="DELETE">

  <button class='btn btn-danger' type="submit" >Delete</button>
</form>
</div>
  </div>
</div>
</div>


@endsection
