<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@extends ('layout')

@section ('content')

<div class="menu">

<a href="/">Home</a>
</div>

<<<<<<< HEAD
<div class="main">
<h1>Settings</h1>

<h2> Account Settings:</h2>
<h3> {{$user->name}}, you are a/an {{$role->display_name}} </h3>
=======
<h1> @lang('messages.settings') </h1>

<h2> {{$user->name}} Account @lang('messages.settings')</h2>
<h3> You are a {{$role->display_name}} </h3>
>>>>>>> [W7-008] localization
<ul>
  @if ($role->name == 'free_user')
  <li><a href="/upgradesubscription">upgrade account</a></li>
  @elseif ($role->name == 'premium_user')
  <li><a href="/cancelsubscription">cancel your subscription</a></li>
  @endif

<ul>

<ul>
  @if ($role->name == 'free_user')
  <li><a href="/upgradesubscription">upgrade account</a></li>
  @else
  <li><a href="/cancelsubscription">@lang('messages.cancelsub')</a></li>
  @endif
</ul>

<ul>
  <li role="presentation"><a href="/profile/excel"> Generate Excel</a></li>
  <li class='btn btn-danger' role="presentation"><a href="/dump"> Database Dump</a></li>
  <li>change billing information </li>


  <li><br />
  <li id="setimage" onclick="sort()"><a>@lang('messages.headerimg')</a>
  <li></li>
  <li role="presentation"><a href="/changepassword"> @lang('messages.changepwd')</a></li>
  <li><br />
  
</ul>
  @if ($role->name == 'admin')
<h2> Administrator options:</h2>
<ul>
<li role="presentation"><a href="/profile/excel"> Generate Excel</a></li>
<li class='btn btn-danger' role="presentation"><a href="/dump"> Database Dump</a></li>
</ul>
@endif

<h2>Email options:</h2>
  <p> current email adress: {{$user->email}}</p>
    <form action="/updateNotifications" method="POST">
      {{ csrf_field() }}
      @if($notification->enable_newcomment == "yes")
    <input type='hidden' value='yes' name='enable_commentsmail'><br/>
      <input type='checkbox' value='no' name='enable_commentsmail'> @lang('messages.disablecommentmail') <br/>
    @else
    <input type='hidden' value='no' name='enable_commentsmail'><br/>
      <input type='checkbox' value='yes' name='enable_commentsmail'> enable new posts mail <br/>
    @endif

  @if($notification->enable_newfollower == "yes")
  <input type='hidden' value='yes' name='enable_followersmail'><br/>
    <input type='checkbox' value='no' name='enable_followersmail'> @lang('messages.disablefollowermail') <br/>
  @else
  <input type='hidden' value='no' name='enable_followersmail'><br/>
    <input type='checkbox' value='yes' name='enable_followersmail'> enable new follower mail <br/>
  @endif

  @if($notification->enable_newpost == "yes")
  <input type='hidden' value='yes' name='enable_postsmail'><br/>
    <input type='checkbox' value='no' name='enable_postsmail'> @lang('messages.disablepostmail') <br/>
  @else
  <input type='hidden' value='no' name='enable_postsmail'><br/>
    <input type='checkbox' value='yes' name='enable_postsmail'> enable new follower mail <br/>
  @endif
<button class="btn btn-primary" type="submit">@lang('messages.update')</button></br>
</form>




</div>
@endsection

<script>
function sort(){
$.ajax({
		url: '/profile/image',
		type: "GET", // not POST, laravel won't allow it
		success: function(data){
			$data = $(data); // the HTML content your controller has produced
			$('.main').fadeOut().html($data).fadeIn();
			}
	});
};
</script>
