
<h2> Cancel your subscription <h2>
<p> Are you sure? </p>

@extends ('layout')

@section ('content')

<a href="/settings">back to settings</a>

<h2> Are you sure you want to cancel your subscription? <h2>
  <p> (Don't worry, you keep all your posts)</p>

<form action="/cancelsubscription" method="POST">
  {{ csrf_field() }}



    <button class="btn btn-primary" type="submit">Cancel my subscription!</button></br>

</form>

  
@endsection
