<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>

  </title>
  </head>
  <body>
      <h1>Hello {{$poster->name}}, your post has a new comment!</h1>
      <p>{{$commenter->name}} has commented on <strong> {{$post->title}} </strong> :</p>
        <p>'"' {{$content}}'"'</p>
  </body>
</html>
