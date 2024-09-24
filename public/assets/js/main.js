!function ($) {
    "use strict";

    let e = document.getElementById("bgmusic");

    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-bottom-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    $('.parallax-window').parallax({
        imageSrc: baseURL+'/public/assets/img/entourage.png'
    });

    $('.parallax-window-even').parallax({
        imageSrc: baseURL+'/public/assets/img/even.png'
    });

    $('#rsvp_confirm_yes').click(function () {
        var rsvp_id = $("#invite_id").val().trim()
        $.ajax({
            url: baseURL+'/confirm',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            data: { rsvp_id: rsvp_id, confirm: '1' },
            type: 'POST',
            success: function (data) {
                if (data.confirm == 1) {
                    $("#rsvp-nav").removeClass('d-none');
                    setTimeout(function () {
                        toastr.success('Thank you for your confirmation!');
                    }, 1000);
                    var html = '';
                    html += '<p>We look forward to your presence, <b>' + data.main_invitee_name + ',</b></p>';
                    if (data.companions.length > 0) {
                        html += '<p>along with your accompanying family members:</p>';
                        $.each(data.companions, function (index, companion) {
                            console.log(companion.name);
                            html += '<p><b>' + companion.name + '</b></p>';
                        });
                    }
                    html += '<h3>Thank you!</h3><br>';
                    html += "<button type='button' class='btn btn-primary font-weight-bold py-3 px-5' id='btn-show-qr'>Get your QR Pass</button>";

                    $("#invitee-body").html(html);
                }
                $("#rsvp-container").html('');
                $("#rsvp-container").html('<a href="#rsvp-confirm" id="rsvp-confirm-nav" class="nav-item nav-link">RSVP</a>'); // button
                $("#rsvp-confirm").show(); // panel
                $("#rsvp").hide();  // panel  
            }
        }).done(function (data) {
            setTimeout(function () {
                $("#overlay").fadeOut(300);
            }, 500);
            setTimeout(function () {
                $("#confirmationModal").modal("hide");
            }, 900);
            $('#qr-code-image').attr('src', data.qrCodeUri);
            setTimeout(function () {
                $("#qrModal").modal("show");
            }, 1200);


        });
    });

    $('#rsvp_confirm_no').click(function () {
        var rsvp_id = $("#invite_id").val().trim()
        $.ajax({
            url: baseURL+'/confirm',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            data: { rsvp_id: rsvp_id, confirm: '0' },
            type: 'POST',

            success: function (data) {
                if (data.confirm == 0) {
                    setTimeout(function () {
                        toastr.success('Thank you for your confirmation!');
                    }, 1000);
                    $("#rsvp-container").html('');
                    $("#rsvp").hide();
                    $("#rsvp-confirm").hide();
                }
            }
        }).done(function () {
            setTimeout(function () {
                $("#overlay").fadeOut(300);
            }, 500);

            setTimeout(function () {
                $("#confirmationModal").modal("hide");
            }, 900);

        });
    });

    $('.bc').on('click', function () {
        // Get the color from the swatch's data attribute
        var selectedColor = $(this).data('color');
        // Change the background color of the color box
        $('#color-box').css('background-color', selectedColor);
        // Optionally, change the text color of the color box for better visibility
        if (selectedColor === '#d9ba9e') {
            $('#boy-attire').attr('src', baseURL+'/public/assets/img/boy_attire_nude.png');
        } else if (selectedColor === '#90a680') {
            $('#boy-attire').attr('src', baseURL+'/public/assets/img/boy_attire_green.png');
        } else {
            $('#boy-attire').attr('src', baseURL+'/public/assets/img/boy_attire_black.png');

        }
    });
    $('.gc').on('click', function () {
        // Get the color from the swatch's data attribute
        var selectedColor = $(this).data('color');
        // Change the background color of the color box
        $('#color-box').css('background-color', selectedColor);
        // Optionally, change the text color of the color box for better visibility
        if (selectedColor === '#d9ba9e') {
            $('#girl-attire').attr('src', baseURL+'/public/assets/img/girl_attire_nude.png');
        } else if (selectedColor === '#90a680') {
            $('#girl-attire').attr('src', baseURL+'/public/assets/img/girl_attire_green.png');
        } else {
            $('#girl-attire').attr('src', baseURL+'/public/assets/img/girl_attire_nude.png');

        }
    });

    $("#fullOverlay").addClass("active");
    $("body").addClass("no-scroll");

    $("#openBtn").click(function () {
        setTimeout(function () {
            $("#fullOverlay").removeClass("active");
        }, 3000);

        $("#fullOverlay").addClass("animate__animated animate__fadeOutUpBig");
        $("body").removeClass("no-scroll");
        $(".custom-container").addClass("loaded");
    });

    $("#carousel-container").find(".btn-play-music").click(function () {
        if ($(this).hasClass("btn-play")) {
            e.play();
            $(".btn-play").addClass("d-none");
            $(".btn-pause").removeClass("d-none");
        } else {
            e.pause();
            $(".btn-play").removeClass("d-none");
            $(".btn-pause").addClass("d-none");
        }
    });

    $("#entourage-link").on("click", function () {
        $('h2').each(function () {
            $(this).addClass('animate__fadeInDown animate__animated').css('--animate-duration', '1s');
        });

        // Apply slide-in animation to the content sections
        $('.col-6').each(function (index) {
            const animation = (index % 2 === 0) ? 'animate__slideInLeft' : 'animate__slideInRight';
            $(this).addClass('animate__animated ' + animation).css('--animate-duration', '1s');
        });
    });

    e.addEventListener("ended", function () {
        console.log("The song has finished playing");
        $(".btn-play").removeClass("d-none");
        $(".btn-pause").addClass("d-none");
    });

    $(document).ajaxSend(function () {
        $("#overlay").fadeIn(300);
    });

    $("#btnConfirmAttendance").click(function () {
        $("#confirmationModal").modal("show");
    });

    $(document).on("click", "#btn-show-qr", function () {
        $("#qrModal").modal("show");
    });

    $(document).ready(function () {
        $("#btn-save-qr").click(function () {
            var e = $("#qr-code-image").attr("src"),
                a = document.createElement("a");
            a.href = e;
            a.download = "qrcode.png";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        });
    });
    $(document).on("click", '.navbar-nav a, .navbar-collapse a', function (e) {
        if (this.hash !== "") {
            e.preventDefault();

            if ($(this.hash).length) {
                $("html, body").animate({
                    scrollTop: $(this.hash).offset().top - 45
                }, 1500, "easeInOutExpo");
            } else {
                console.warn("Element not found for hash: " + this.hash);
            }

            if ($(this).parents(".navbar-nav").length) {
                $(".navbar-nav .active").removeClass("active");
                $(this).addClass("active");
            }
        }
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $(".navbar").fadeIn("slow").removeClass('d-none');
            $(".navbar").fadeIn("slow").css("display", "flex");
        } else {
            $(".navbar").fadeOut("slow").addClass("d-none");
        }
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".scroll-to-bottom").fadeOut("slow");
        } else {
            $(".scroll-to-bottom").fadeIn("slow");
        }
    });

    var a = $(".portfolio-container").isotope({
        itemSelector: ".portfolio-item",
        layoutMode: "fitRows"
    });

    $("#portfolio-flters li").on("click", function () {
        $("#portfolio-flters li").removeClass("active");
        $(this).addClass("active");
        a.isotope({
            filter: $(this).data("filter")
        });
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });

    $(".back-to-top").click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1500, "easeInOutExpo");
        return false;
    });

    $(".gallery-carousel").owlCarousel({
        autoplay: false,
        smartSpeed: 1500,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: { items: 1 },
            576: { items: 2 },
            768: { items: 3 },
            992: { items: 4 },
            1200: { items: 5 }
        }
    });

}(jQuery);
