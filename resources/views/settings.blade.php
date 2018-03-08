<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@extends ('layouts.info')

@section ('content')

@include ('layouts.success')

<div class="settings">

<div class="card w-100" style='margin-top:1rem;'>
  <div class="card-header">
  <h3 class="mb-0">{{$user->name}} Account @lang('messages.settings')</h3>
  <p class="card-text"> You are a  {{$role->display_name}}</p>
</div>
  <div class="card-body">

      @if ($role->name == 'free_user')

    <a href="/upgradesubscription"  style="color:#28a745">upgrade account</a>
      @else
      <a href="/cancelsubscription" style="color:#28a745">@lang('messages.cancelsub')</a>
      @endif
<hr>
      <a href="/changepassword" style="color:#28a745"> @lang('messages.changepwd')</a>

      </div>
      <div class="card-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-success" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Update profile/header images
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          @include ('layouts.errors')

          <form method="post" action="/profile/image" style="width:50%">
          {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
          <div class="form-group">
              <label for="profileImage">Set Your Profile Picture</label>
              <input id="ProfileImage" type="text" class="form-control" name="blogimage" placeholder="clipart-library.com/images/8cAbXKoXi.png" required>
              <small id="profileImage" class="form-text text-muted">it will be set to 150x150</small>
              <button type="submit" class="btn btn-success">Update Profile Picture</button>
            </div>
          </form>

          <form method="post" action="/profile/header" style="width:50%">
          {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
          <div class="form-group">
              <label for="headerImage">Set Your Header Image</label>
              <input id="headerImage" type="text" class="form-control" name="blogheader" placeholder="clipart-library.com/images/8cAbXKoXi.png" required>
              <small id="headerImage" class="form-text text-muted">Height will automatically be set to 200px</small>
              <button type="submit" class="btn btn-success">Update Header Image</button>
            </div>
          </form>
        </div>
      </div>



</div>






<div class="card w-100" style='margin-top:1rem;'>
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



    @if ($role->name == 'admin')
  <div class="card w-100" style='margin-top:1rem;'>
      <div class="card-header">
    <h3 class="mb-0"><strong>Administrator options</strong></h3>
</div>
    <div class="card-body">
     <a href="/profile/excel" class="btn btn-info"> Generate Excel</a> <a href="/dump" class="btn btn-danger"> Database Dump</a> <a href="/settings/stats" class="btn btn-warning"> Analytics</a>



    </div>
  </div>
  @endif
</div>



@endsection
