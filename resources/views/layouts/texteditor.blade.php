<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script>
  $(document).ready(function() {
      $('#postcontent').summernote();
  });

  shortcuts = {
      "mc" : "Maine Coon",
      "trn" : "toernooi",
      "tlg" : "the Last Guardian",
      "tgs" : "tegenstander"
  }

  window.onload = function() {
      var ta = document.getElementById("postcontent");
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
