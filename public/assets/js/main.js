(function ($) {
    "use strict";

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    
    var music = document.getElementById("bgmusic");
     function playmusic(){
      music.play();
      $(".btn-play").hide();
     }

     $( document ).ready(function() {
        
          var inviteID = $("#invite_id").val();
          if(inviteID.trim().length > 0){
              $("#confirmationModal").modal('show');
          }
          $( "#entourage-link" ).on( "click", function() {
              $("#m-prin").find("p").addClass("animate__animated animate__lightSpeedInLeft  animate__delay-2s");
              $("#f-prin").find("p").addClass("animate__animated animate__lightSpeedInRight  animate__delay-2s");
          } );
     });
   
     $(document).ajaxSend(function() {
        $("#overlay").fadeIn(300);　
     });

    $('#btnConfirmAttendance').click(function(){
        $("#confirmationModal").modal('show');
    });
        
      $('#rsvp_confirm_yes').click(function(){
        var rsvp_id = $("#invite_id").val().trim()
        $.ajax({
          url: 'http://localhost/rsvp-php/public/confirm',
          headers:{'X-Requested-With':'XMLHttpRequest'},
          data:{ rsvp_id: rsvp_id, confirm: '1' },
          type: 'POST',

          success: function(data){
            if(data.confirm ==1){
                setTimeout(function(){
                     toastr.success('Thank you for your confirmation!');
                },1000);
            }
            $("#rsvp").hide();
          }
        }).done(function() {
          setTimeout(function(){
            $("#overlay").fadeOut(300);
          },500);
          setTimeout(function(){
            $("#confirmationModal").modal("hide");
          },900);
         
        });
      });	

            
      $('#rsvp_confirm_no').click(function(){
        var rsvp_id = $("#invite_id").val().trim()
        $.ajax({
          url: 'http://localhost/codeigniter/project-root/public/confirm',
          headers:{'X-Requested-With':'XMLHttpRequest'},
          data:{ rsvp_id: rsvp_id, confirm: '0' },
          type: 'POST',

          success: function(data){
            if(data.confirm ==0 ){
                setTimeout(function(){
                    toastr.success('Thank you for your confirmation!');
               },1000);

               $("#rsvp").hide();
            }
          }
        }).done(function() {
          setTimeout(function(){
            $("#overlay").fadeOut(300);
          },500);
          setTimeout(function(){
            $("#confirmationModal").modal("hide");
          },900);
         
        });
      });	

    // Navbar on scrolling
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.navbar').fadeIn('slow').css('display', 'flex');
        } else {
            $('.navbar').fadeOut('slow').css('display', 'none');
        }
    });


    // Smooth scrolling on the navbar links
    $(".navbar-nav a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            
            $('html, body').animate({
                scrollTop: $(this.hash).offset().top - 45
            }, 1500, 'easeInOutExpo');
            
            if ($(this).parents('.navbar-nav').length) {
                $('.navbar-nav .active').removeClass('active');
                $(this).closest('a').addClass('active');
            }
        }
    });

    // Scroll to Bottom
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scroll-to-bottom').fadeOut('slow');
        } else {
            $('.scroll-to-bottom').fadeIn('slow');
        }
    });


    // Portfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });
    $('#portfolio-flters li').on('click', function () {
        $("#portfolio-flters li").removeClass('active');
        $(this).addClass('active');

        portfolioIsotope.isotope({filter: $(this).data('filter')});
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Gallery carousel
    $(".gallery-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1500,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:5
            }
        }
    });
    
})(jQuery);

