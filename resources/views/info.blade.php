@extends ('layouts.info')

@section ('content')
<div class="col" style="text-align:center;margin-top:1rem">
  <div class="card" style="width:75%; margin:auto">
  <div class="card-header">
      <h3 class="card-title">@lang('messages.info') </h3>
  </div>
  <div class="card-body">

    <p class="card-text">Secure Beyond is a platform where bloggers can share their articles with visitors and other users. As a Secure Beyond blogger you can post your views, opinions and findings in your own blog posts, read your favorite users posts, or comment with your thought on other articles. </p>
    <p class="card-text">Want to try it out first? <a href="/register"style="color:#28a745">Create a free account</a> to comment on articles, and post a couple of articles of your own.</p>
  </div>
  <div class="card-header">
      <h3 class="card-title">Account options</h3>
  </div>
  <div class="card-body">

    <p class="card-text"><strong> Free accounts:</strong> With our free account you can follow other users, and comment on their articles.<br/> Free users can also post 5 free articles on their own page.</p>

    <p class="card-text"><strong> Premium accounts: </strong> For just $4,99/month you can post unlimited articles, and you won't see ads anywhere on the platform.</p>
  </div>
</div>
</div>



@endsection
