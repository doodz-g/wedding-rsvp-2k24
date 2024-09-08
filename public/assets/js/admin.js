(function ($) {
    "use strict";

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-custom toast-top-full-width", // Apply custom class here
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
        $(".overlay").fadeIn(300);
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

    var companionContainer = $("#companion-container");
    companionContainer.html('<li> <input type="text" id="companion_name" required name="companion_name[]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
    
    function addCompanion() {
        companionContainer.append('<li> <input type="text" id="companion_name" required name="companion_name[]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
    }
    var update_companion_container = $("#update_companion_container");
    update_companion_container.html('<li> <input type="text" id="companion_name" required name="companion_name[]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
    
    function updateCompanion() {
        update_companion_container.append('<li> <input type="text" id="companion_name" required name="companion_name[]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
    }

    $(document).on('click', '.add_companion', function() {
        addCompanion();
    });
    $(document).on('click', '.update_companion', function() {
        updateCompanion();
    });
    $('#btn-add-guest').click(function () {
        $(".overlay").fadeOut(300);
        $("#add-user-modal").modal("show");
    });
    $('.btn-delete-guest-modal').click(function () {
        var delete_user_id = $(this).data('id');
        $("#d_user_id").val(delete_user_id);
        $(".overlay").fadeOut(300);
        $("#delete-user-modal").modal("show");
    });

})(jQuery);

