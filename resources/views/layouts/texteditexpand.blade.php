

<script src="{{URL::to('js/tinymce/js/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{URL::to('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern codesample",
      "fullpage toc imagetools help",
      "mention"
    ],
    mentions: {
      source: [
        { name: 'Maine Coon' },
        { name: 'The Last Guardian' },
        { name: 'toernooi' },
        { name: 'Julia \"Jules\" van Drunen' },
        { name: 'Johan \"Jo-Jo\" Jorritsma' },
        { name: 'Arend-Jan \"A-J\" Breukink' },
        { name: 'JavaScript' },
        { name: 'Laravel' },
        { name: 'CodeGorilla' },
        { name: 'bootcamp' },
        { name: 'Groningen' },
        { name: 'Emmen' },
        { name: 'Amsterdam' },
        { name: 'Rotterdam' },

      ]
      },

    toolbar: "insertfile undo redo | styleselect | bold italic strikethrough | alignleft aligncenter alignright alignjustify | ltr rtl | bullist numlist outdent indent removeformat formatselect| link image media | emoticons charmap | code codesample | forecolor backcolor",
    browser_spellcheck: true,
    relative_urls: false,
    remove_script_host: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinymce.activeEditor.windowManager.open({
        file: '<?= route('elfinder.tinymce4') ?>',// use an absolute path!
        title: 'File manager',
        width: 900,
        height: 450,
        resizable: 'yes'
      }, {
        setUrl: function (url) {
          win.document.getElementById(field_name).value = url;
        }
      });
  }
};
  tinymce.init(editor_config);
</script>
<script>
  {!! \File::get(base_path('vendor/barryvdh/laravel-elfinder/resources/assets/js/standalonepopup.min.js')) !!}
</script>
