<script type="text/javascript">
  $(document).ready(function(){

    // Reset form
    $('.resetForm').click(function(){
      
      $('input[type="text"]').val("");
      $('select').val("");

    });

    
    // Confirm Message
    $('.btn-delete').click(function(){

      return confirm('Are you sure ?');

    });

    // File Input
    $("#adsImg").fileinput({
            'showUpload':true, 
            'previewFileType':'any',
            'theme' :   'fa',
            'showUpload' : false,
            'uploadAsync': false,
            'overwriteInitial': true,
            'initialPreview' : [
              "{{ isset($ads->ads_img) ? asset('ads/'.$ads->ads_img) : '' }}"
            ],
            'initialPreviewAsData': true,
            'initialPreviewFileType': 'image',
    });





/*=================== Show image in Modal ======================*/

    var modal = $('#myModal');
    var modalImg = $('#img01');
    var captionText = $('#caption');

    $('.imgModal').click(function(){

        modal.css('display', 'block');
        modalImg.attr('src', this.src);
        captionText.html(this.alt);

    });
    

    
    modal.find('.close').click(function(){
      modal.css('display', 'none');
    });

    /*=================== Show image in Modal / End ======================*/



/*=================== jquery End ======================*/
});

   
   var editor_config = {
      path_absolute : "/",
      selector: ".text-tinymce",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback: function(field_name, url, type, win) {
          // trigger file upload form
          if (type == 'image') $('#formUpload input').click();
      }
      
    };

    tinymce.init(editor_config);

</script>
