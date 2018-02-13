<!doctype html>
<html>
    <head>

        <title></title>

    </head>
    <body>
      <ul>
       <?php foreach ($tasks as $task) : ?>
        <li>{{ $task->body}}</li>
      <?php endforeach; ?>
    </ul>
    </body>
</html>
