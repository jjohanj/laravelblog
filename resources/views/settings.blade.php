@extends ('layout')

@section ('content')

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
  <li>Change header image</li>
  <li>Change blog name</li>
  <li role="presentation"><a href="/changepassword"> Change Password</a></li>
</ul>
<h2> Theme</h2>
<h2>Email options</h2>
<ul>


  <li>current email adress: {{$user->email}} (change)</li>
    @if($settings->enable_newcomment = "yes")

      <li>disable comment mail</li>
    @else
      <li>enable comment mail</li>
    @endif

  @if($settings->enable_newcomment = "yes")
    <li>disable follower mail</li>
  @else
    <li>enable follower mail</li>
  @endif

  @if($settings->enable_newcomment = "yes")
    <li>disable new post mail</li>
  @else
    <li>enable new post mail</li>
  @endif

</ul>

@endsection
