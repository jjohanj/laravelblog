
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@section('scripts')
  @include ('layouts.texteditexpand')


@endsection

@extends ('layouts.create')

@section ('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Add a blog post  @if ($user_role == 'free')
        <small class="card-subtitle mb-2 text-muted" style='float:right;margin:0'> You have {{$postsLeft}} posts left (<a href="/info" style="color:#28a745">what is this?</a>) </small>
      @endif</h3>

  </div>
  <div class="card-body">

      @if ($postsLeft > 0 || $user_role != 'free')
<p class="card-text"><a href=" /posts/create/category" class="btn btn-success">Add a category</a></p>

<form action="/posts" method="POST">
  {{ csrf_field() }}
  @include ('layouts.errors')
  <div class="form-group">
      <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title') }}">
  </div>

  <div class="form-group">
    <label for="categories">Select category/categories</label> <br>
    <div style="padding-left:1rem;padding-bottom:1rem;">
    @foreach ($categories as $category)
        <input type='checkbox' class="form-check-input" id="check{{$category->id}}" value='{{$category->id}}' name='category[]'>
        <label class="form-check-label" for="check{{$category->id}}">{{$category->name}} </label><br>
    @endforeach
  </div>
      <div class="form-group">
    <label class="form-check-label" for="posttext">Content</label><br>
    <small id="expanderHelp" class="form-text text-muted">Tip: type '@' to use the text expander.</small>
 <textarea id="posttext" class="form-control" rows="20" name="body" type="text">{{ old('body') }}</textarea></br>
 </div>
<div class="form-group">
 <input type='hidden' value='no' name='disable_comments'>
   <input type='checkbox' id="disablecomments" value='yes' name='disable_comments'>
<label class="form-check-label" for="disablecomments"> Disable comments</label>
</div>
  <button type="submit" class="btn btn-success">Post article!</button>
</form>
@else
<div>
  <p class="card-text">Uh Oh, it looks like you've used all your free posts! </p>
  <p class="card-text">Upgrade your account via the <a href="/settings"style="color:#28a745">settings</a> menu, for unlimited posts! </p>
  <p class="card-text">Haven't posted 5 times yet? Please contact us!</p>
</div>

  @endif

  </div>
</div>


</div>



@endsection
