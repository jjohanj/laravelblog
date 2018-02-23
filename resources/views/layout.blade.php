<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <title>The Title</title>

    </head>
    <body>
      <div id='container'>
      @include ('layouts.header')

        @yield('content')

        @yield('scripts')

      </div>

    </body>
</html>
