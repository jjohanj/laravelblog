<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
        <title>The Title</title>

    </head>
    <body>
      <div id='container'>
      @include ('layouts.header')



        @yield('content')

      </div>

    </body>
</html>
