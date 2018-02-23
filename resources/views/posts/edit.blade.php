<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@section('scripts')
  @include ('layouts.texteditexpand')
@endsection

@extends ('layout')

@section ('content')
  <a href="/">BACK TO HOME PAGE</a><br>

@include ('layouts.errors')

<strong>Editing Blog post</strong>

<div id="form">
  <div id='form'>
    <form method="post" action="{{action('PostsController@update', $id)}}" >
      {{csrf_field()}}

      <input name="_method" type="hidden" value="PATCH">

      <div id="inputfield"></div>

        <input type="hidden" value="{{csrf_token()}}" name="_token" />

        <label for="title">Title:</label>
        <input type="text" class="form-control" name="title" value={{$post->title}} /></br>

      </div>

      <div class="form-group">

        <label for="description">Content:</label>
        <textarea cols="5" rows="5" class="form-control" name="body">{{$post->body}}</textarea>

      </div>

      <input type='hidden' value='no' name='disable_comments'><br/>
      <input type='checkbox' value='yes' name='disable_comments'> Disable comments <br/>

    <button class="btn btn-primary" type="submit">Update</button></br>

</form>
  <form method="post" action="{{action('PostsController@destroy', $id)}}">
    {{csrf_field()}}

    <input name="_method" type="hidden" value="DELETE">

    <button class='btn btn-danger' type="submit" >Delete</button>
  </form>

</div>


@endsection
