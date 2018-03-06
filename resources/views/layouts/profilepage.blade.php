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


<div class="card" width="100%">
  <img class="card-img-top" src="https://www.warrenphotographic.co.uk/photography/bigs/04338-Ginger-cat-running-white-background.jpg" alt="Card image cap"  height="200">
  <div class="card-body">
    <h1 class="card-title" style=' text-align: center'>{{$user->blog_name}}</h1>
  
  </div>
</div>


<div class='container-fluid' width='100%'>
   <div class="row">
  <div class="col">
        @yield('content')
      </div>


        <div class='col-4'>

           <div class="card">
             @if (!empty ($user->blogimage))
             <img class="card-img-top" src="{{$user->blogimage}}" alt="Header Image" width="75">
             @else
              <img class="card-img-top" src="http://www.pixempire.com/images/preview/new-user-icon.jpg" alt="Header Image" >

             @endif
             <div class="card-body">
               <h5 class="card-title">{{$user->name}}</h5>
               @if (Auth::check())

                @if ( Auth::user()->id  !=  $user->id)

                  @if ($isfollowing == TRUE )

                   <form action="{{ route('user.unfollow', $user->id) }}" method="post">
                          {!! csrf_field() !!}
                       <button class="btn btn-primary">unfollow {{$user->name}}</button>
                   </form><br />

                   @endif
               		  @if ($isfollowing == FALSE )

               		<form action="{{ route('user.follow', $user->id) }}" method="post">
               		      {!! csrf_field() !!}
               		    <button class="btn btn-primary">Follow {{$user->name}}</button>
               		</form><br />

               		@endif
               	@endif
               @else

               <div id="infobar">
               <div class="alert alert-info">
               <p> <a href="/login">
                   Log in
                 </a> or <a href="/register">
                   register
                 </a> to follow  {{$user->name}} </p>
               </div>
               </div>
               @endif

             </div>
           </div>




           <div id="accordion">
                          <div class="card">
               <div class="card-header" id="headingTwo">
                 <h5 class="mb-0">
                   <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     Followers <small>{{count($sidebar_followers)}}</small>
                   </button>
                 </h5>
               </div>
               <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                 <div class="card-body" style="max-height: 100px; overflow: scroll;">
                   @foreach ($sidebar_followers as $sidebar_follower)
                     <a href="/user/{{ $sidebar_follower->name}}">{{$sidebar_follower->name}} </a> <br />
                   @endforeach
                 </div>
               </div>
             </div>

             <div class="card">
               <div class="card-header" id="headingTwo">
                 <h5 class="mb-0">
                   <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     Following <small>{{count($sidebar_followings)}}</small>
                   </button>
                 </h5>
               </div>
               <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                 <div class="card-body" style="max-height: 100px; overflow: scroll;">
                   @foreach ($sidebar_followings as $sidebar_following)
                     <a href="/user/{{ $sidebar_following}}">{{$sidebar_following}} </a> <br />
                   @endforeach
                 </div>
               </div>
             </div>

           </div>




        </div>
      </div>
</div>

    </body>
</html>
