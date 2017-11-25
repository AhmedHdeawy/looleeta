<script type="text/javascript">
  $(document).ready(function(){

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
        console.log(data);

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