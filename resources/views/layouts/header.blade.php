
<div class="header clearfix">
<nav>
 <div class="nav nav-pills pull-left">
  @if (@isset ($user))
<h2>{{$user->blog_name}}</h2>

  @if (!empty ($user->blogimage))
  <img src="{{$user->blogimage}}" alt="Header Image" height="150" width="150">
  @else
  <img src="http://www.pixempire.com/images/preview/new-user-icon.jpg" alt="anon" width="150" height="151">
  @endif



@else
<h2>Julia en Arend's Blog</h2>
@endif
  </div>
  <ul class="nav nav-pills pull-right">
    <li role="presentation"><a href="/de"> Deutsch </a></li>
    <li role="presentation"><a href="/en"> English </a></li>
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
