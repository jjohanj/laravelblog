<!DOCTYPE html>
<html>
    <head>
        <title>Secure Beyond - {{$user->blog_name}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}'} </script>
    </head>
    <body>


      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
          <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href="/">Home</a>
                  </li>
                  @if(Auth::check())
                  <li class="nav-item">
                      <a class="nav-link" href="/posts/create">@lang('messages.write')</a>
                  </li>
                  @endif


              </ul>
          </div>
          <div class="mx-auto order-0">
              <a class="navbar-brand mx-auto" href="/info">Secure Beyond</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                  <span class="navbar-toggler-icon"></span>
              </button>
          </div>
          <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/de">Deutsch</a>
                </li>
                <li class="nav-item" style="margin-right:25px">
                  <a class="nav-link" href="/en">English</a>
                </li>
                  @if(Auth::check())
                  <li class="nav-item">
                      <a class="nav-link" href="/settings">@lang('messages.settings')</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/logout">@lang('messages.logout')</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="nav-link" href="/login">@lang('messages.login')</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/register">@lang('messages.register')</a>
                  </li>
                  @endif
              </ul>
          </div>
      </nav>




    <div class="card bg-dark text-dark" width="100%" style=' border: none;'>
      <img class="card-img" src="https://www.warrenphotographic.co.uk/photography/bigs/04338-Ginger-cat-running-white-background.jpg" alt="Card image cap"  height="200">
      <div class="card-img-overlay">
        <h1 class="display-2" style='text-align:center'>{{$user->blog_name}}</h1>

      </div>
    </div>







<div class='container-fluid' width='100%'>
   <div class="row">
  <div class="col">
        @yield('content')
      </div>


      </div>
</div>

    </body>
</html>
