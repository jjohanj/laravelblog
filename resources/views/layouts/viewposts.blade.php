<!DOCTYPE html>
<html>
    <head>
        <title>Secure Beyond - {{$user->blog_name}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    </head>
    <body>


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
  <a class="navbar-brand" href="/info">Secure Beyond</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      @if(auth::check())
      <li class="nav-item">
        <a class="nav-link" href="/settings">@lang('messages.settings')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/posts/create">@lang('messages.write')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">@lang('messages.logout')</a>
      </li>
@else
      <li class="nav-item">
        <a class="nav-link" href="/login">@lang('messages.login')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register"> @lang('messages.register')</a>
      </li>
@endif

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          languages
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" role="presentation" href="/de">Deutsch</a>
          <a class="dropdown-item" role="presentation" href="/en">English</a>


        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
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
