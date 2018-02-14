
@extends ('layout')

@section ('content')

<div id="form">
<form action="/posts" method="POST">
  {{ csrf_field() }}

  <div id="inputfield"></div>
    <input placeholder="Title" name="title" type="text" id="title" required></br>
    <input type="radio" name="category" value="games" checked> Verslag<br>
    <input type="radio" name="category" value="study"> Uitslag<br>
    <textarea rows="20" placeholder="Blog tekst" name="body" type="text" id="body" required></textarea></br>
    <button type="submit">Plaats blog op de website!</button></br>
  </div>
</form>

</div>
@endsection
