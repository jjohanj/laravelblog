<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css">
        <title>The Title</title>

    </head>
    <body>
      <div id='container'>
      @include ('layouts.header')

  @if(Auth::check())

<a href="/logout">logout</a><br />
<a href="#">Hello {{Auth::user()->name}}</a><br />
@else
<a href="/login"> login</a><br />
@endif

        @yield('content')

        @yield('scripts')

      </div>

    </body>
</html>
