<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@extends ('layout')

@section ('content')

<div class="menu">

<a href="/">Home</a>

<h1> settings </h1>

<h2> {{$user->name}} Account Settings</h2>
<h3> You are a {{$role->display_name}} </h3>
<ul>
  @if ($role->name == 'free_user')
  <li><a href="/upgradesubscription">upgrade account</a></li>
  @else
  <li><a href="/cancelsubscription">cancel your subscription</a></li>
  @endif
</ul>

<ul>

  <li>change billing information </li>
  <li id="setimage" onclick="sort()"><a>
  Set Your Blog's Header Image</a>
  <li><br />
  <li>Change header image</li>
  <li>Change blog name</li>
  <li role="presentation"><a href="/changepassword"> Change Password</a></li>
</ul>
<h2> Theme</h2>
<h2>Email options</h2>
<ul>
  <li>current email adress: {{$user->email}} (change)</li>
  <li>disable comment mail</li>
  <li>disable follower mail</li>
  <li>disable new post mail</li>
</ul>
</div>

<div class="main">

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
