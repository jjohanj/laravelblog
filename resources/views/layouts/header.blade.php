
<div class="header clearfix">
<nav>
 <div class="nav nav-pills pull-left">
  @if (@isset ($user))
<h2>{{$user->blog_name}}</h2>
@else
<h2>Julia en Arend's Blog</h2>
@endif
  </div>
  <ul class="nav nav-pills pull-right">
    <li role="presentation"><a href="/info"> About Blogs </a></li>
    @if(Auth::check())
      <li role="presentation"><a href="/settings"> Settings </a></li>
	   <li role="presentation"><a href="/logout"> Logout </a></li>
	  @else

	 <li role="presentation"><a href="/login"> Login </a></li>
	 <li role="presentation"><a href="/register"> Register </a></li>
   @endif
 </ul>
</nav>
</div>
