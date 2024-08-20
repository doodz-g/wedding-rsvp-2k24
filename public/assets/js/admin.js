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

})(jQuery);

