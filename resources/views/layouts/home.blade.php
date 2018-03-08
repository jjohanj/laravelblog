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

    <meta charset="utf-8">

        <title>Secure Beyond</title>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}'} </script>


    <title>Secure Beyond</title>
  </head>
  <body style="background-color:#b2b4b7;">

    <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJGSK4K"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

    @include('layouts.navbar')


    <div class='container-fluid' width='100%'>
       <div class="row" >
          <div class='col-3' style="padding:0">
            <div class="card" style="margin-bottom:0.5rem;margin-top:1rem;">
                @if(Auth::check())
              <div class="card-header">
                <h5 class="mb-0"><a href="/user/{{Auth::user()->name}}" style="text-decoration:none;color:#28a745"> <strong>@lang('messages.greeting') {{Auth::user()->name}}</strong></a></h5>
              </div>
              @endif
              <div class="card-content">

              <a href="/all" class="list-group-item list-group-item-action" style="border-left:0;border-right:0"><strong>@lang('messages.showall')</strong></a>
              <div style="margin-top:5px;margin-bottom:5px">
              <form class="form-inline my-2 my-lg-0" action="/?search={{ isset($search) ? $search : '' }}" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Search for.." aria-label="Search" value="{{ isset($search) ? $search : '' }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">@lang('messages.search')</button>
              </form>
            </div>
            </div>
            </div>
            <div class="card"style="margin-bottom:0.5rem;">
                <div class="card-header">
                  <h5 class="mb-0">top users</h5>
                </div>

                          <div class="list-group" style="border:0">
                  	@foreach($topusers as $topuser)
                  	<a href="/user/{{$topuser->name}}" class="list-group-item list-group-item-action" style="border-left:0;border-right:0"><strong>{{$topuser->name}}</strong></a>
              	    @endforeach
                  </div>

              </div>
              <div class="card"style="margin-bottom:0.5rem;">
                <div class="card-header">
                  <h5 class="mb-0"> @lang('messages.categories') </h5>
                </div>
                <div class="card-body">
              	@foreach ($categories as $category)
                  <button class="btn btn-success btn-lg btn-block" id="catfilter" onclick="sort('{{ $category->name }}')">{{ $category->name}}</button><br/>
                @endforeach
              </div>
            </div>
            <div class="card">
              <div class="card-header">
               <h5 class="mb-0"> @lang('messages.archive')</h5>
             </div>
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



      <div class ="col" style="margin-top:1rem">
        @yield('content')
      </div>

      <script>
      function sort(name){
      $.ajax({
      		url: '/categories/'+name,
      		type: "GET", // not POST, laravel won't allow it
      		success: function(data){
      			$data = $(data); // the HTML content your controller has produced
      			$('.col').fadeOut().html($data).fadeIn();
      			}
      	});
      };
      </script>
  </body>
</html>
