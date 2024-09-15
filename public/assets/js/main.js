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

    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $(".navbar").fadeIn("slow").removeClass('d-none');
            $(".navbar").fadeIn("slow").css("display", "flex");
        } else {
            $(".navbar").fadeOut("slow").addClass("d-none");
        }
    });

    $(".navbar-nav a").on("click", function (e) {
        if (this.hash !== "") {
            e.preventDefault();
            $("html, body").animate({
                scrollTop: $(this.hash).offset().top - 45
            }, 1500, "easeInOutExpo");

            if ($(this).parents(".navbar-nav").length) {
                $(".navbar-nav .active").removeClass("active");
                $(this).closest("a").addClass("active");
            }
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
