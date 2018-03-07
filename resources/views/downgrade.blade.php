


@extends ('layouts.info')

@section ('content')
<div class="container" style="text-align:center">
<div class="card" style="margin-top:1rem">
  <div class="card-header">
    <h3 class="card-title">Are you sure you want to cancel your subscription?</h3>

  </div>
  <div class="card-body">
    <h6 class="card-subtitle mb-2 text-muted">(Don't worry, you keep all your posts)</h6>
    <form action="/cancelsubscription" method="POST">
      {{ csrf_field() }}



        <button class="btn btn-success" type="submit">Cancel my subscription!</button></br>

    </form>

  </div>
</div>
</div>




@endsection
