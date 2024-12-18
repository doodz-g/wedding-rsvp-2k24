(function ($) {
    "use strict";

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-full-width", // Apply custom class here
        "preventDuplicates": true,
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
    //copy invitation link
    $(document).on('click', '.invite-link', function (event) {
        event.preventDefault();
        navigator.clipboard.writeText($(this).attr("href")).then(() => {
            toastr.success('Invitation link copied');
        });
    });
    //table collapse

    $(document).on('click', '.fold-table .btn-expand', function () {
        $(this).parent().parent('tr').toggleClass("open").next(".fold").toggleClass("open d-none");
    });

    //add companions
    var companionContainer = $("#companion-container");
    companionContainer.html('<li> <input type="text" id="companion_name" required name="companion_name[]" oninput="checkDuplicateCompanionNames()" style="width: 70%; height: 38px; border: 2px solid #ced4da;"><label for="exampleDropdown" style="padding-left: 10px;padding-right:10px;">KID?</label><select id="exampleDropdown" name="is_kid[]" style="height: 38px; border: 2px solid #ced4da;"><option value="No">No</option><option value="Yes">Yes</option></select><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');

    function addCompanion() {
        companionContainer.append('<li> <input type="text" id="companion_name" required name="companion_name[]" oninput="checkDuplicateCompanionNames()" style="width: 70%; height: 38px; border: 2px solid #ced4da;"><label for="exampleDropdown" style="padding-left: 10px;padding-right:10px;">KID?</label><select disabled id="exampleDropdown" class="is_kid_dropdown" data-id="" name="is_kid[]" style="height: 38px; border: 2px solid #ced4da;"><option value="No">No</option><option value="Yes">Yes</option></select><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
    }
    
    var update_companion_container = $("#update_companion_container");
    update_companion_container.html('<li> <input type="text" id="companion_name" class="com_field" name="companion_name[][name]" style="width: 70%; height: 38px; border: 2px solid #ced4da;"><label for="exampleDropdown" style="padding-left: 10px;padding-right:10px;">KID?</label><select id="exampleDropdown" name="companion_name[][kid]" style="height: 38px; border: 2px solid #ced4da;"><option value="No" selected>No</option><option value="Yes">Yes</option></select><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');

    function updateCompanion() {
        var li_length = $("#update_companion_container").find('li').length-1;
        update_companion_container.append('<li><input type="text" oninput="checkDuplicateCompanionNames()" id="companion_name" name="companion_name[' +(li_length+1)+ '][name]" style="width: 70%; height: 38px; border: 2px solid #ced4da;">' +
                                '<input type="hidden" name="companion_name['+(li_length+1)+ '][id]" style="width: 70%; height: 38px; border: 2px solid #ced4da;">' +
                                '<label for="exampleDropdown" style="padding-left: 10px;padding-right:10px;">KID?</label><select id="exampleDropdown" class="is_kid_dropdown" data-id="" name="companion_name['+(li_length+1)+'][kid]" style="height: 38px; border: 2px solid #ced4da;"><option value="No">No</option><option value="Yes">Yes</option></select>'+
                                '<span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
    }
    // modals and action buttons
    $(document).on('click', '.add_companion', function () {
        $(".comp_label").removeClass('d-none');
        addCompanion();
    });
    $(document).on('click', '.update_companion', function () {
        $(".comp_label").removeClass('d-none');
        updateCompanion();
    });
    $(document).on('click', '#btn-add-guest', function () {
        $("#name").val('');
        $(".comp_label").addClass("d-none");
        $(".overlay").fadeOut(300);
        companionContainer.html('');
        $("#add-user-modal").find(".modal-title").text("Add Guest");
        $("#add-user-modal").modal("show");
    });
    $(document).on('click', '.btn-delete-guest-modal', function () {
        var delete_user_id = $(this).data('id');
        var name = $(this).data('name');
        $("#d_user_id").val(delete_user_id);
        $(".overlay").fadeOut(300);
        $("#delete-user-modal").find(".modal-title").text('Delete Guest[' + name + ']');
        $("#delete-user-modal").modal("show");
    });
    $(document).on('click', '#selectAll', function () {
        $('#ga-table-container').find('.c-box').prop('checked', this.checked);
        cboxEnabler();
    });
    $(document).on('click', '.c-box', function () {
        cboxEnabler();
    });
    $("#phone_number").inputmask("+63 999 999 9999");
    function cboxEnabler() {
        var cboxChecker = $('#ga-table-container').find('.c-box').is(":checked");
        console.log(cboxChecker);
        if (cboxChecker == true) {
            $("#btn-assign-guest").prop('disabled', false);
        } else {
            $("#btn-assign-guest").prop('disabled', true);
        }
    }
    function showPrompt() {
        var userInput = prompt("Please enter your name:", "");
        if (userInput != null) {
            document.getElementById("output").innerHTML = "Hello, " + userInput + "!";
        }
    }
})(jQuery);

