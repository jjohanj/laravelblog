<!DOCTYPE html>
<html>
    <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115362818-1"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-115362818-1');
      </script>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-KJGSK4K');</script>
      <!-- End Google Tag Manager -->

        <title>Secure Beyond - {{$user->blog_name}}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}'} </script>


    </head>
      <body style="background-color:#b2b4b7;">
        <!-- Google Tag Manager (noscript) -->
          <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJGSK4K"
          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
          <!-- End Google Tag Manager (noscript) -->

      @include('layouts.navbar')
      <div class="card bg-dark text-dark" width="100%" style=' border: none;'>
        @if (!empty ($user->blogheader))
        <img class="card-img-top" src="{{$user->blogheader}}" alt="Header Image" style="height:200px;width=100%">
        @else
         <img class="card-img-top" src="https://i.imgur.com/mdD8zMX.jpg?2" alt="Header Image" style="height:200px;width=100%">
@endif
        <div class="card-img-overlay">
          <h1 class="display-2" style='text-align:center'>{{$user->blog_name}}</h1>

        </div>
      </div>


<div class='container-fluid' width='100%'>
   <div class="row">
  <div class="col" style="margin-top:1rem;">
        @yield('content')
      </div>


        <div class='col-3'style="padding:0">

           <div class="card" style="margin-top:1rem;">
             <h3 class="card-title" style="text-align:center; margin-top:10px; margin-bottom:0px;">{{$user->name}}</h3>
             <div class="card-body"style="padding-top:0px;">
               @if (!empty ($user->blogimage))
               <img class="card-img-top" src="{{$user->blogimage}}" alt="Header Image" width="75">
               @else
                <img class="card-img-top" src="http://www.pixempire.com/images/preview/new-user-icon.jpg" alt="Header Image" >

               @endif
               @if (Auth::check())

                @if ( Auth::user()->id  !=  $user->id)

                  @if ($isfollowing == TRUE )

                   <form action="{{ route('user.unfollow', $user->id) }}" method="post">
                          {!! csrf_field() !!}
                       <button class="btn btn-success">unfollow {{$user->name}}</button>
                   </form><br />

                   @endif
               		  @if ($isfollowing == FALSE )

               		<form action="{{ route('user.follow', $user->id) }}" method="post">
               		      {!! csrf_field() !!}
               		    <button class="btn btn-danger">Follow {{$user->name}}</button>
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
               <div class="card-header" id="headingOne">
                 <h5 class="mb-0">
                   <button class="btn btn-success" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                     Followers <span class="badge badge-light">{{count($sidebar_followers)}}</span>
                   </button>
                 </h5>
               </div>
               <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
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
                   <button class="btn btn-success" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     Following <span class="badge badge-light">{{count($sidebar_followings)}}</span>
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
<div class="card">
  <div class="card-header">
   <h5 class="mb-0">@lang('messages.archive') </h5>
<div class="card-body">
@foreach($archives as $year => $months)
    <h6 class="mb-0">
      <a href="?month={{$year}}" style="text-decoration:none;color:#28a745">
        <strong>{{ $year }}</strong>
      </a><br>
    </h6>
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
