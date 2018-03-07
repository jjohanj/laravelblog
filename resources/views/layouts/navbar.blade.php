<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="/posts/create">@lang('messages.write')</a>
            </li>
            @endif


        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="/info">Secure Beyond</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/de">Deutsch</a>
          </li>
          <li class="nav-item" style="margin-right:25px">
            <a class="nav-link" href="/en">English</a>
          </li>
            @if(Auth::check())
            <li class="nav-item">
                <a class="nav-link" href="/settings">@lang('messages.settings')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">@lang('messages.logout')</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/login">@lang('messages.login')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">@lang('messages.register')</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
