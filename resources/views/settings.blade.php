<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@extends ('layouts.info')

@section ('content')
<br/>

<div class="settings">
<div class="card w-100" style='margin-bottom:5px;'>
  <div class="card-header">
  <h3 class="mb-0">{{$user->name}} Account @lang('messages.settings')</h3>
  <p class="card-text"> You are a  {{$role->display_name}}</p>
</div>
  <div class="card-body">
    <ul>
      @if ($role->name == 'free_user')
      <li><a href="/upgradesubscription">upgrade account</a></li>
      @else
      <li><a href="/cancelsubscription">@lang('messages.cancelsub')</a></li>
      @endif

      <li id="setimage" onclick="sort()"><a>@lang('messages.headerimg')</a></li>

      <li role="presentation"><a href="/changepassword"> @lang('messages.changepwd')</a></li>

    </ul>
  </div>
</div>


<div class="card w-100" style='margin-bottom:5px;'>
    <div class="card-header">
  <h3 class="mb-0">Email options</h3>
  <p class="card-text">current email adress: {{$user->email}}</p>
</div>
  <div class="card-body">
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
  <br/>
<button class="btn btn-success" type="submit">@lang('messages.update')</button></br>
</form>
  </div>
</div>



  <div class="card w-100" style='margin-bottom:5px;'>
      <div class="card-header">
    <h6 class="mb-0"><strong>Administrator options:</strong></h6>
</div>
    <div class="card-body">
      <button type="button" class="btn btn-info"><a href="/profile/excel" style="color:inherit;text-decoration:inherit;"> Generate Excel</a></button>
      <button type="button" class="btn btn-danger"><a href="/dump" style="color:inherit;text-decoration:inherit;"> Database Dump</a></button>


    </div>
  </div>
</div>

<script>
function sort(){
$.ajax({
		url: '/profile/image',
		type: "GET", // not POST, laravel won't allow it
		success: function(data){
			$data = $(data); // the HTML content your controller has produced
			$('.settings').fadeOut().html($data).fadeIn();
			}
	});
};
</script>
@endsection
