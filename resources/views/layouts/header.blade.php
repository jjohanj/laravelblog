
<div class="header clearfix">
<nav>
  <div class="nav nav-pills pull-left">
  <h2>Julia en Johan's <sub> en Arend's </sub> Blog</h2>
  </div>
  <ul class="nav nav-pills pull-right">
    @if(Auth::check())
	   <li role="presentation"><a href="/logout"> Logout </a></li>
	  @else
	 <li role="presentation"><a href="/login"> Login </a></li>
	 <li role="presentation"><a href="/register"> Register </a></li>
   @endif
 </ul>
</nav>
</div>
