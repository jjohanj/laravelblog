
@extends ('layout')

@section ('content')
  <a href="/">BACK TO HOME PAGE</a><br>

<a href=" /posts/create/category">ADD A CATEGORY</a><br><br>

<strong>Enter Blog post here</strong>

<div id="form">
<form action="/posts" method="POST">
  {{ csrf_field() }}

  <div id="inputfield"></div>
    <input placeholder="Title" name="title" type="text" id="title" required></br>

    @foreach ($categories as $category)
     <input type="radio" name="category" value="{{$category->name}}" checked>{{$category->name}}<br>
     @endforeach

    <textarea rows="20" placeholder="Blog tekst" name="body" type="text" id='textarea' required></textarea></br>

     
  <input type='checkbox' value='yes' name='disable_comments'> Disable comments <br/>
    <button type="submit">Plaats blog op de website!</button></br>

</form>
</div>

<div id='textexpander'>
  Textexpander shortcuts: <br><hr>
  mc = Maine Coon <br>
  trn = toernooi <br>
  tlg = the Last Guardian <br>
  tgs = tegenstander
<div>

<script>

shortcuts = {
    "mc" : "Maine Coon",
    "trn" : "toernooi",
    "tlg" : "the Last Guardian",
    "tgs" : "tegenstander"
}

window.onload = function() {
    var ta = document.getElementById("textarea");
    var timer = 0;
    var re = new RegExp("\\b(" + Object.keys(shortcuts).join("|") + ")\\b", "g");

    update = function() {
        ta.value = ta.value.replace(re, function($0, $1) {
            return shortcuts[$1.toLowerCase()];
        });
    }

    ta.onkeydown = function() {
        clearTimeout(timer);
        timer = setTimeout(update, 200);
    }
}
</script>

</div>
@endsection
