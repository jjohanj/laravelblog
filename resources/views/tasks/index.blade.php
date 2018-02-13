<!doctype html>
<html>
    <head>

        <title></title>

    </head>
    <body>
      <ul>
       @foreach ($tasks as $task)
        <li>
          <a href="/tasks/{{ $task->id}}">
          {{ $task->body}}</li>
       @endforeach
    </ul>
    </body>
</html>
