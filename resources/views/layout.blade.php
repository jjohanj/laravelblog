<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <title>The Title</title>

    </head>
    <body style="background-color:#b2b4b7;">
      <nav class="navbar navbar-inverse">

  <a href="/" class="navbar-brand">Home</a>
  <a href="/settings" class="navbar-brand">back to settings</a>

</nav>

      <div id='container'>


        @yield('content')

        @yield('scripts')

      </div>

    </body>
</html>
