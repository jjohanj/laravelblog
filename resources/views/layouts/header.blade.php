
<div class="header clearfix">
<nav>
 <div class="nav nav-pills pull-left">

<h2>Secure Beyond</h2>

  </div>
  <ul class="nav nav-pills pull-right">
    <li role="presentation"><a href="/de"> Deutsch </a></li>
    <li role="presentation"><a href="/en"> English </a></li>
    <li role="presentation"><a href="/info"> @lang('messages.info') </a></li>
    @if(Auth::check())
      <li role="presentation"><a href="/settings"> @lang('messages.settings') </a></li>
	   <li role="presentation"><a href="/logout"> @lang('messages.logout') </a></li>
	  @else

	 <li role="presentation"><a href="/login"> @lang('messages.login') </a></li>
	 <li role="presentation"><a href="/register"> @lang('messages.register') </a></li>
   @endif
 </ul>
</nav>
</div>
