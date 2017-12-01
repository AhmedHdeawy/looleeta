<script type="text/javascript">
  $(document).ready(function(){

    $(".str-cut").each(function (i) {
        var len = $(this).text().length;
        if (len > 80) {
            $(this).text($(this).text().substr(0, 200) + '......');
        }
    });

  // // Show SubMenu during hover
  // $('.subMenu').hover(function() {
  //   /* Stuff to do when the mouse enters the element */
  //   $(this).css('border-bottom', '2px solid #FFF');
  //   $(this).find('.sub-menu').css('visibility', 'visible');
  // }, function() {
  //   /* Stuff to do when the mouse leaves the element */
  //   $(this).css('border-bottom', '0');
  //   $(this).find('.sub-menu').css('visibility', 'hidden');
  // });

  // // show submenu in mobile
  // if($(window).width() <= 576)
  // {
  //     $('.subMenu').click(function(event) {
  //       /* Act on the event */
  //         if(  $(this).find('.sub-menu').css('visibility') == 'visible')
  //         {
  //           $(this).find('.sub-menu').css('visibility', 'hidden');
  //         } else {
  //           $(this).find('.sub-menu').css('visibility', 'visible');
  //         }
  //     });
  // }

    // First check if user open the page and scroll doesn't zero, then add nav-blue-color Class
    var scrollTop = $(window).scrollTop();
    if(scrollTop > 200) {
      $('nav').removeClass('nav-white-color').addClass('nav-blue-color nav-scroll');
    }
    $(window).scroll(function(event) {
      /* Act on the event */
      var scroll = $(window).scrollTop();
      if(scroll > 200)
      {
        // alert("dksfjs");
        $('nav').addClass('nav-scroll');
      }
      else {
        $('nav').removeClass('nav-blue-color nav-scroll');
      }
    });





    // Switch between Login and Register
    $('.login-page h1 span').click(function () {
         //alert("clicked");
        $(this).addClass('active').siblings().removeClass('active');

        $('.login-page form').hide();
        $('.'+$(this).data('class')).fadeIn();
    });


    // Function To Remove Placeholder when Focus on Input
    $('[placeholder]').focus(function () {
        // Store Value of Placeholder in [ data-text ]
        $(this).attr("data-text", $(this).attr('placeholder'));

        // Then Remove Placeholder
        $(this).attr('placeholder', '');

    }).blur(function () {
        // Return Value to Placeholder when Blur on Input
        $(this).attr('placeholder', $(this).attr('data-text'));
    });


    // Add Astrisc to Inputs
    $('input').each(function () {

        if($(this).attr('required') === 'required'){
            $(this).after('<span class="astrisc">*</span>');
        }
    });



    // navbar dropdown
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {

        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
        });


        return false;
    });


    // Tabs
    $('#myTab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });


  // Focus on comment box when click on comment button
  $('.comment-btn').click(function(event) {
    /* Act on the event */
    $('#commentTextarea').focus();
  });

});

</script>

{{-- Login with Ajax --}}

<script type="text/javascript">
  

  $('#userLogin').on('submit', function(e){

    e.preventDefault();

    var form = $(this),
        link = form.attr('action'),
        data = form.serialize();

        $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: 'POST',
          dataType: 'JSON',
          url: link,
          data: data,
          beforeSend: function(){
            form.find('.spinner-form').css('display', 'inline-block');
          },
          success: function(result){

            if(result.error)
            {
              $('.welocme-msg').css('display', 'none');
              $('.error-msg').css('display', 'block').text('Not Auth');
              form.find('.spinner-form').css('display', 'none');
            }
            if(result.success)
            {
              form.find('.spinner-form').css('display', 'none');
              $('.error-msg').css('display', 'none');
              $('.welocme-msg').css('display', 'block').text('Welocme');
              location.reload();  
            }

            
          }

        });


  });

</script>

{{-- Register with Ajax --}}

<script type="text/javascript">
  

  $('#userRegister').on('submit', function(e){

    e.preventDefault();

    var form = $(this),
        link = form.attr('action'),
        data = new FormData($(this)[0]);

        $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: 'POST',
          dataType: 'JSON',
          url: link,
          data: data,
          processData: false,
          contentType: false,
          async: true,
          beforeSend: function(){
            form.find('.spinner-form').css('display', 'inline-block');
          },
          success: function(result){

            if(result.errors)
            {
              // Hidden "Welocome-Message" and "Spinner"
              $('.welocme-msg').css('display', 'none');
              form.find('.spinner-form').css('display', 'none');
              
              // Show Errors Messages
              $('.error-msg').css('display', 'block');
              $('.error-msg').text('');
              Object.keys(result.errors).forEach(function(key) {
                  $('.error-msg').append("<li>" + result.errors[key] + "</li>");
              })


            }
            if(result.success)
            {
              form.find('.spinner-form').css('display', 'none');
              $('.error-msg').css('display', 'none');
              $('.welocme-msg').css('display', 'block').text('Welocme');
              location.reload();  
            }

            
          }

        });


  });

</script>

<script>

{{--  Like with Ajax  --}}
$(document).on('click', '.like-btn', function(){

  var articleID = $(this).data('article'),
      link = "{{ route('like') }}";

  $.ajax({

      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: 'GET',
      dataType: 'JSON',
      url: link,
      data: {articleID: articleID},
      context: $(this),
      success: function(result){

        if(result.auth) {
          
          $('#modelUserLogin').modal('show');
        }
        if(result.like) {
          
         $(this).addClass('liked');
        }
        if(result.dislike) {
          $(this).removeClass('liked');
        }
        
      }

    });


});



{{--  add comment  --}}
$(document).on('submit', '.comment-form', function(e){

  e.preventDefault();
  var form = $(this),
      articleID   = form.find('input[name="articles_id"]').val(),
      commentDesc = form.find('textarea').val(),
      link = "{{ route('addComment') }}";
      
  $.ajax({

      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: 'POST',
      dataType: 'JSON',
      url: link,
      data: {articleID, commentDesc},
      context: $(this),
      success: function(result){

        if(result.success) {
          
          var dateTime = result.dataTime,
              userName = result.userName,
              userImage = result.userImage,
              commentText = result.commentText,
              commentID = result.commentID;
          
          $('.article-card-body').prepend(commentBox(userName, userImage, dateTime, commentText, commentID));
        }
        
      }

    });

});

{{--  open Modal for Edit comment  --}}
$(document).on('click', '.edit-comment', function(e){

    // Get value of comment
    var commentText = $(this).parents('.comment-block').find('.card .card-block .card-text').text();

    $('#editModal').find('textarea').val($.trim(commentText));
    $('#editModal').find('input[type="hidden"]').val( $(this).data('comment') );

    $('#editModal').modal('show');


});

{{--  edit comment  --}}
$(document).on('submit', '.form-edit-comment', function(e){

  e.preventDefault();
  var form = $(this),
      commentID   = form.find('input[name="comments_id"]').val(),
      commentDesc = form.find('textarea').val(),
      link = "{{ route('editComment') }}";
      
  $.ajax({

      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: 'POST',
      dataType: 'JSON',
      url: link,
      data: {commentID, commentDesc},
      context: $(this),
      success: function(result){

        if(result.success) {
          $('#editModal').modal('hide');
          var dateTime = result.dataTime,
              commentText = result.commentText,
              commentBlock =  $('.article-card-body').find("[data-commentID='"+commentID+"']");

              commentBlock.find('.card-block .card-text').text(commentText);
              commentBlock.find('.card-header .comment-author small').text(dateTime);
        }
        
      }

    });

});



{{--  delete comment  --}}
$(document).on('click', '.delete-comment', function(){

  var decision = confirm('Are you sure ?');
  if(decision) {
    
    var btn = $(this),
        commentID   = btn.data('comment'),
        link = "{{ route('deleteComment') }}";
        
    $.ajax({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        dataType: 'JSON',
        url: link,
        data: {commentID},
        context: $(this),
        success: function(result){

          if(result.success) {
            $(this).parents('.comment-block').fadeOut(300);
          }
          
        }

      });
  }
  

});


// function to append comment box
function commentBox(userName, userImage, datetime, commentDesc, commentID){

  $content = '<div class="row comment-block" data-commentID="'+commentID+'"><div class="col-sm-2"><div class="comment-thumbnail">                  <img class="img-responsive user-photo" src="'+userImage+'"></div></div><div class="col-sm-10">                  <div class="card"><div class="card-header"><span class="pull-left comment-author">'+userName+'<small>'+datetime+'</small></span><span class="pull-right"><button data-comment="'+commentID+'" class="edit-comment btn-cursor btn-empty"><i class="fa fa-edit"></i></button></span><span class="pull-right mx-2"><button data-comment="'+commentID+'" class="delete-comment btn-cursor btn-empty"><i class="fa fa-trash"></i></button></span></div><div class="card-block"><div class="card-text">'+commentDesc+'</div></div></div></div></div>';

  return $content;

}






// input focus after open modal
$('#editModal').on('shown.bs.modal', function () {
    $('#editModal').find('textarea').focus();
})
  
</script>

<script>
      
    // File Input
    $("#artImg").fileinput({
            'showUpload':true, 
            'previewFileType':'any',
            'theme' :   'fa',
            'showUpload' : false,
            'uploadAsync': false,
            'overwriteInitial': true,
            'initialPreview' : [
              "{{ isset($article->articles_img) ? asset('images/articles/'.$article->articles_img) : "" }}"
            ],
            'initialPreviewAsData': true,
            'initialPreviewFileType': 'image',
    });


     var editor_config = {
        path_absolute : "/",
        selector: ".text-tinymce",
        height: 300,
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