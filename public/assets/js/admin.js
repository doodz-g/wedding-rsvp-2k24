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

    $(document).ajaxSend(function () {
        $("#overlay").fadeIn(300);

    });

    $("#users-tbody").find('.invite-link').click(function (event) {
        event.preventDefault();
        navigator.clipboard.writeText($(this).attr("href")).then(() => {
            toastr.success('Invitation link copied');
        });
    });

    $(function () {
        $(".fold-table tr.view").on("click", function () {
            $(this).toggleClass("open").next(".fold").toggleClass("open");
        });
    });
    // Initialize Pusher
    var pusher = new Pusher('b012177f6ee3695e54b9', {
        cluster: 'ap3',
        forceTLS: true
    });

    // Subscribe to a channel
    var channel = pusher.subscribe('rsvp-channel');

    // Bind to an event
    channel.bind('rsvp-updated', function (data) {
        console.log('Received data:', data);
        // You can update the UI or show a notification based on the data received
        toastr.info(data.will_attend, 'Notification', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 5000
        }); F

    });

})(jQuery);

