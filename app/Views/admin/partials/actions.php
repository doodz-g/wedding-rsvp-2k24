<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        let rsvpURL = '<?php echo base_url('rsvp') ?>';
        $(document).on('click', '.submitButton', function () {
            var formData = $(".guest-form-add").serialize(); // Get serialized data
            $(".submitButton").html("<i class='fa fa-spinner fa-spin'></i>");
            if ($("#name").val().length > 0) {
                console.log(formData);
                // Check the checkbox state
                // if (!$('.check_kid').is(':checked')) {
                //     formData += '&is_kid[]=No'; // Append unchecked state as a query string
                // }
                // Send AJAX POST request
                $.ajax({
                    url: '<?php echo site_url('admin/submit') ?>', // URL to the controller method
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        // Handle success
                        toastr.success(response.message);
                        setTimeout(function () {
                            $(".overlay").fadeOut(300);
                        }, 500);
                        setTimeout(function () {
                            $("#add-user-modal").modal('hide');
                        }, 900);
                        refreshTable();
                        $(".submitButton").text("Save");
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        toastr.warning('An error occurred: ' + error);
                    }
                });
            } else {
                $(".submitButton").text("Save");
                toastr.warning('You need to fill up the fields.');
            }

        });
        $(document).on('click', '.updateButton', function () {
            $(this).html("<i class='fa fa-spinner fa-spin'></i>");
            var formData = $(".guest-form-update").serialize();
            if ($("#update_name").val().length > 0) {
                console.log(formData);
                // Send AJAX POST request
                $.ajax({
                    url: '<?php echo site_url('admin/update') ?>', // URL to the controller method
                    type: 'POST',
                    cache: false,
                    data: formData,
                    success: function (response) {
                        // Handle success
                        if (response.status == 'success') {

                            toastr.success(response.message);

                            setTimeout(function () {
                                $(".overlay").fadeOut(300);
                            }, 500);
                            setTimeout(function () {
                                $(".updateButton").text("Save");
                                $("#edit-user-modal").modal('hide');
                            }, 900);

                            refreshTable();
                        } else {
                            toastr.error(response.message);
                            $(".updateButton").text("Save");
                            $("#edit-user-modal").modal('show');
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.warning('An error occurred: ' + error);
                    }
                });
            } else {
                toastr.warning('You need to fill up the fields.');
            }
        });
        $(document).on("click", ".delete_companion", function () {
            var id = $(this).data('id');
            console.log(id);
            // Send AJAX POST request
            $.ajax({
                url: '<?php echo site_url('admin/delete/companion') ?>', // URL to the controller method
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function (response) {
                    // Handle success
                    toastr.success(response.message);
                    refreshTable();
                },
                error: function (xhr, status, error) {
                    // Handle error
                    toastr.warning('An error occurred: ' + error);
                }
            });
            $(this).closest("li").remove();
        });

        $(document).on("change", ".is_kid_dropdown", function () {
            var id = $(this).data('id');
            var is_kid = $(this).val();
            // Send AJAX POST request\
            $.ajax({
                url: '<?php echo site_url('admin/update-kid-status') ?>', // URL to the controller method
                type: 'POST',
                data: { id: id , is_kid: is_kid},
                dataType: 'json',
                success: function (response) {
                    // Handle success
                    if(response.status == "error"){
                        $(".updateButton").attr('disabled',true);
                        toastr.error(response.message);
                      
                    }
                    if(response.status == "success"){
                        $(".updateButton").attr('disabled',false);
                        toastr.success(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error
                    toastr.warning('An error occurred: ' + error);
                }
            });
        });

        $(document).on('click', '#btn-delete-guest', function () {
            $(this).html("<i class='fa fa-spinner fa-spin'></i>");
            var user_id = $("#d_user_id").val();
            console.log(user_id);
            // Send AJAX POST request
            $.ajax({
                url: '<?php echo site_url('admin/delete') ?>', // URL to the controller method
                type: 'POST',
                data: { user_id: user_id },
                dataType: 'json',
                success: function (response) {
                    // Handle success
                    toastr.success(response.message);
                    setTimeout(function () {
                        $(".overlay").fadeOut(300);
                    }, 500);
                    setTimeout(function () {
                        $("#delete-user-modal").modal('hide');
                    }, 900);
                    $("#btn-delete-guest").html("Confirm");
                    refreshTable();
                },
                error: function (xhr, status, error) {
                    // Handle error
                    toastr.warning('An error occurred: ' + error);
                }
            });
        });
        $(document).on('click', '#btn-assign-guest', function () {
            var user_id = $("#a_user_id").val();
            var table_number = $("#table_number").val();
            var formData = $(".guest-table-update").serialize();
            if (table_number != null) {
                $(this).html("<i class='fa fa-spinner fa-spin'></i>");
                console.log(user_id);
                // Send AJAX POST request
                $.ajax({
                    url: '<?php echo site_url('admin/table-assignment') ?>', // URL to the controller method
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        // Handle success
                        if (response.status == "success") {
                            toastr.success(response.message);
                            setTimeout(function () {
                                $(".overlay").fadeOut(300);
                            }, 500);
                            setTimeout(function () {
                                $("#assign-user-modal").modal('hide');
                            }, 900);
                            $("#btn-assign-guest").html("Assign");
                            refreshTable();
                        } else if (response.status == "error") {
                            toastr.error(response.message);
                            setTimeout(function () {
                                $(".overlay").fadeOut(300);
                            }, 500);
                            $("#btn-assign-guest").text("Assign");
                        }

                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        toastr.warning('An error occurred: ' + error);
                    }
                });
            } else {
                toastr.error('Please select a table number!');
            }

        });
        $(document).on('click', '.btn-assign-guest-modal', function () {
            var user_id = $(this).data('id');
            var assign_table = $(this).data('table');
            var name = $(this).data('name');
            $("#selectAll").prop('checked', false);
            $("#table_number").val(assign_table);
            $("#a_user_id").val(user_id);
            $(".overlay").fadeOut(300);
            $("#assign-user-modal").find(".modal-title").text('Guest[' + name + ']');
            $.ajax({
                url: '<?php echo site_url('admin/companions'); ?>',
                type: 'POST',
                data: { user_id: user_id },
                dataType: 'json',
                success: function (response) {
                    // Check if the response is an array and if it's empty
                    if (Array.isArray(response) && response.length === 0) {
                        console.log('Response is an empty array.');
                    } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                        // Check if the response is an object and if it's empty
                        console.log('Response is an empty object.');
                        $("#companions_" + user_id).html('<p>No companions found.</p>');
                    } else {
                        // Handle non-empty response
                        console.log('Response:', response);
                        var companionContainer = $("#ga-table-container");
                        companionContainer.html('');
                        var ctr = 0;
                        $.each(response.user, function (index, item) {
                            var tb_num = (item.table_number !== null ? item.table_number == 11 ? 'Kids Table' : item.table_number == 12 ? 'Sponsors A Table' : item.table_number == 13 ? 'Sponsors B Table' : 'Table #' + item.table_number : 'No table yet');
                            companionContainer.append('<div class="row form-check"><input type="checkbox" class="form-check-input c-box" value="' + (item.id ? item.id : '') + '" name="guest_id"><label class="form-check-label" for="guest">' + item.name + '<span style="float:right;font-weight:600;">(Main Guest)</span></label>' +
                                '<span style="float:right;font-weight:600;">' + tb_num + '</span></div>');
                            ctr++;
                        });
                        $.each(response.companions, function (index, item) {
                            var tb_num = (item.table_number !== null ? item.table_number == 11 ? 'Kids Table' : item.table_number == 12 ? 'Sponsors A Table' : item.table_number == 13 ? 'Sponsors B Table' : 'Table #' + item.table_number : 'No table yet');
                            companionContainer.append('<div class="row form-check"><input type="checkbox" class="form-check-input c-box" value="' + (item.name ? item.name : '') + '" name="companion_name[' + ctr + '][name]"><label class="form-check-label" for="guest">' + item.name + '</label>' +
                                '<input type="hidden" value="' + (item.id ? item.id : '') + '" name="companion_name[' + ctr + '][id]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span style="float:right;font-weight:600;">' + tb_num + '</span></div>');
                            ctr++;
                        });
                    }
                },
                error: function (xhr, status, error) {
                    toastr.warning('An error occurred: ' + error);
                }
            });
            $("#assign-user-modal").modal("show");
        });
        $(document).on('click', '.btn-edit-guest-modal', function () {
            var user_id = $(this).data('id');
            var name = $(this).data('name');
            var guest_status = $(this).data('status');
            $(this).html("<i class='fa fa-spinner fa-spin'></i>");
            $(".modal-title").text('Edit Guest[' + name + ']');
            $("#update_name").val(name);
            $("#update_user_id").val(user_id);
            $(".comp_label").removeClass("d-none");
            $.ajax({
                url: '<?php echo site_url('admin/companions'); ?>',
                type: 'POST',
                data: { user_id: user_id },
                dataType: 'json',
                success: function (response) {
                    // Check if the response is an array and if it's empty
                    if (Array.isArray(response) && response.length === 0) {
                        console.log('Response is an empty array.');
                    } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                        // Check if the response is an object and if it's empty
                        console.log('Response is an empty object.');

                        $("#companions_" + user_id).html('<p>No companions found.</p>');
                    } else {
                        // Handle non-empty response
                        console.log('Response:', response);
                        var companionContainer = $("#update_companion_container");
                        companionContainer.html('');
                        var ctr = 0;
                        $.each(response.companions, function (index, item) {
                            companionContainer.append('<li><input type="text" oninput="checkDuplicateCompanionNames()" id="companion_name" value="' + (item.name ? item.name : '') + '" name="companion_name[' + ctr + '][name]" style="width: 70%; height: 38px; border: 2px solid #ced4da;">' +
                                '<input type="hidden" value="' + (item.id ? item.id : '') + '" name="companion_name[' + ctr + '][id]" style="width: 70%; height: 38px; border: 2px solid #ced4da;">' +
                                '<label for="exampleDropdown" style="padding-left: 10px;padding-right:10px;">KID?</label><select id="exampleDropdown" data-id = "'+item.id+'" class="is_kid_dropdown" name="companion_name['+ ctr +'][kid]" style="height: 38px; border: 2px solid #ced4da;"><option '+(item.is_kid == 'No' ? 'selected':'')+' value="No">No</option><option '+(item.is_kid == 'Yes' ? 'selected':'')+' value="Yes">Yes</option></select>'+
                                '<span type="button" class="delete_companion ' + (guest_status == 'Yes' || guest_status == 'No' ? 'd-none' : '') + '" data-id="' + (item.id ? item.id : '') + '" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
                            ctr++;
                        });
                        if (guest_status == "Yes" || guest_status == 'No') {
                            $(".update_companion").addClass('d-none');
                        } else {
                            $(".update_companion").removeClass('d-none');
                        }

                    }
                },
                error: function (xhr, status, error) {
                    toastr.warning('An error occurred: ' + error);
                }
            });
            $(".btn-edit-guest-modal").html("<i class='fa fa-pencil'></i>");
            $("#edit-user-modal").modal("show");

        });
    });
  
    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    // Function to handle the AJAX request
    function handleTyping() {
        var user_id = $("#update_user_id").val();
        var companion_name = $('.com_field').val();
        $.ajax({
            url: '<?php echo base_url('admin/check-companions') ?>', // URL to the controller method
            type: 'POST',
            cache: false,
            data: { user_id: user_id, companion_name: companion_name },
            success: function (response) {
                if (response.status == 'error') {
                    toastr.error(response.message);
                    $('.updateButton').prop('disabled', true);
                    $("#edit-user-modal").modal('show');
                } else {
                    $('.updateButton').prop('disabled', false);
                }
            },
            error: function (xhr, status, error) {
                toastr.warning('An error occurred: ' + error);
            }
        });
    }

    // Attach the debounced function to the keyup event
    $(document).on('keyup', '.com_field', debounce(handleTyping, 500)); // 1000ms = 1 second

    $('#toggle-event').change(function (event) {
        var status = $(this).prop('checked') == true ? 1 : 0;
        $("#qr_setting").val(status);
        $("#email").val('');
        $("#qr-settings-modal").modal('show');
    })

    $(document).on("click", ".btn-send-email", function () {
        var email = $("#email").val() + '@celebratewithus.site';
        var qr_setting = $("#qr_setting").val();
        console.log('QR setting' + qr_setting);
        $(".btn-send-email").html("<i class='fa fa-spinner fa-spin'></i>");
        // Send AJAX POST request
        $.ajax({
            url: '<?php echo site_url('admin/send-otp') ?>', // URL to the controller method
            type: 'POST',
            data: { email: email, qr_setting: qr_setting },
            dataType: 'json',
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success(response.message);
                    $("#qr-settings-modal").modal('hide');
                    $("#otp").val('');
                    $("#otp-modal").modal('show');
                }
                if (response.status == 'error') {
                    toastr.error(response.message);
                    $("#qr-settings-modal").modal('show');
                }
            },
            error: function (xhr, status, error) {
                // Handle error
                toastr.warning('An error occurred: ' + error);
            }
        });
        $(".btn-send-email").html("Send");

    });
    $(document).on("click", ".btn-validate-otp", function () {
        var otp = $("#otp").val();
        $(".btn-validate-otp").html("<i class='fa fa-spinner fa-spin'></i>");
        // Send AJAX POST request
        $.ajax({
            url: '<?php echo site_url('admin/validate-otp') ?>', // URL to the controller method
            type: 'POST',
            data: { otp: otp },
            dataType: 'json',
            success: function (response) {
                if (response.status == 'success') {
                    toastr.success(response.message);
                    $("#otp-modal").modal('hide');
                }
                if (response.status == 'error') {
                    toastr.error(response.message);
                    $("#otp").val('');
                    $("#otp-modal").modal('show');

                }
            },
            error: function (xhr, status, error) {
                // Handle error
                toastr.warning('An error occurred: ' + error);
            }

        });
        $(".btn-validate-otp").html("Validate");

    });
    $(document).on("click", "#btn-sync", function () {
        $("#btn-sync").html("<i class='fa fa-sync fa-spin'></i> Sync data to Export Table");
        $.ajax({
            url: '<?php echo site_url('admin/sync') ?>',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    toastr.success(response.message);
                    setTimeout(function () { $("#export-container").html("<a class='btn btn-secondary' id='btn-export' href='<?php echo base_url('admin/export'); ?>'><i class='fa fa-download'></i><span>Export as XLS</span></a>"); }, 2000);
                } else {
                    toastr.error(response.message);
                    $("#btn-sync").html("<i class='fa fa-sync'></i> Sync data to Export Table");
                }
            },
            error: function (xhr, status, error) {
                console.log('Error:', xhr.responseText);
                toastr.warning('An error occurred: ' + xhr.status + ' ' + xhr.statusText);
            }
        });
    });
    $(document).on("click", "#btn-export", function () {
        $("#export-container").html("<a id='btn-sync' class='btn btn-secondary'><i class='fa fa-sync'></i><span>Sync data to Export Table</span></a>");
    });
    $(document).on('click', '.btn-expand', function () {
        var user_id = $(this).parent().parent().data('id');
        $(this).html("<i class='fa fa-spinner fa-spin'></i>");
        $("#companions_" + user_id).html('');
        $.ajax({
            url: '<?php echo site_url('admin/companions'); ?>',
            type: 'POST',
            data: { user_id: user_id },
            dataType: 'json',
            success: function (response) {
                // Check if the response is an array and if it's empty
                if (Array.isArray(response) && response.length === 0) {
                    console.log('Response is an empty array.');
                    $("#companions_" + user_id).html('');
                    $("#companions_" + user_id).html('<p>No companions found.</p>');
                } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                    // Check if the response is an object and if it's empty
                    console.log('Response is an empty object.');

                    $("#companions_" + user_id).html('<p>No companions found.</p>');
                } else {
                    // Handle non-empty response
                    console.log('Response:', response);
                    var html = "";
                    html += '<table class="table table-striped table-hover">';
                    html += '<th style="background-color: lightgray;border-color:lightgray;" class="text-center">Companion Name</th>';
                    html += '<th style="background-color: lightgray;border-color:lightgray;" class="text-center">Table #</th>';
                    if (response.companions.length > 0) {
                        $.each(response.companions, function (index, item) {
                            html += '<tr style="background-color: lightgray;">' +
                                '<td class="text-center" style="border-color:lightgray;">' + item.name + '</td>' +
                                '<td style="text-align:center;border-color:lightgray;">' + (item.table_number !== null ? item.table_number == 11 ? 'Kids' : item.table_number : 'N/A') + '</td>' +
                                '</tr>';

                        });
                    } else {
                        html += '<tr style="background-color: lightgray;">' +
                            '<td colspan="4" class="text-center" style="border-color:lightgray;">No Companions found.</td>' +
                            '</tr>';
                    }
                    html += '</table>';
                }
                $("#companions_" + user_id).html(html);
                $(".btn-expand").html("<i class='fa fa-expand'></i>");
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    });

    $(document).on('click', '.page-link', function () {
        var rsvpURL = '<?php echo site_url('rsvp') ?>';
        var page = $(this).data('id');
        var sort = $("#sort").val() ?? 'id';
        var order = $("#order").val() ?? 'DESC';
        var search = $("#search").val();
        $("#current_p").val(page)
        $(".overlay-spinner").removeClass('d-none');
        $.ajax({
            url: '<?php echo site_url('admin/refresh') ?>',
            type: 'POST',
            data: { page: page, search: search, sort: sort, order: order },
            success: function (response2) {
                console.log(response2);
                var html = '';
                $.each(response2.users, function (index, item) {
                    var tb_num = (item.table_number !== null ? item.table_number == 11 ? 'Kids' : (item.table_number == 12 ? 'Sponsors A' : (item.table_number == 13 ? 'Sponsors B' : item.table_number)) : 'N/A');
                    html += '<tr class="' + (item.qr_code_status == 1 ? 'bg-success' : '') + (item.will_attend == 'No' ? 'bg-warn' : '') + '" data-id="' + item.id + '">' +
                        '<td><button class="fc-red btn-expand btn btn-xs"><i class="fa fa-expand"></button></td>' +
                        '<td>' + item.invite_id + '</td>' +
                        '<td>' + item.name + '</td>' +
                        '<td>' + (item.will_attend === null ? 'No Response yet' : (item.will_attend === 'Yes' ? 'Confirmed Attendance' : 'Not Attending')) + '</td>' +
                        '<td>' + tb_num + '</td>' +
                        '<td>' + item.date + '</td>' +
                        '<td style="width:158px;" class="<?php echo session()->get('usertype') == 'admin' ? 'd-none' : '' ?>">' +
                        '<a href="#" type="button" data-status="' + item.will_attend + '" data-id="' + item.id + '" class="settings btn-edit-guest-modal" data-id= "' + item.id + '" data-name="' + item.name + '" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>' +
                        (item.will_attend === 'Yes' ? '<a href="#" type="button" data-id="' + item.id + '" data-name="' + item.name + '" class="settings btn-assign-guest-modal" data-table="' + item.table_number + '"title="Assign table slot" data-toggle="tooltip"><i class="fa fa-table"></i></a>' : '<a href="#" type="button" class="settings" title="Cannot Assign" data-toggle="tooltip"><i style="color:gray !important;" class="fa fa-table"></i></a>') +
                        (item.will_attend === null ? '<a class="invite-link settings" title="Copy Invite link" data-toggle="tooltip" type="button" href="' + rsvpURL + '/' + item.invite_id + '"><i class="fa fa-link"></i></a>' : '<a class="settings" disabled title="Copy Invite link" data-toggle="tooltip" type="button" href="#"><i class="fa fa-link" style="color:gray !important;"></i></a>') +
                        '<a href="#" type="button" data-id="' + item.id + '" class="delete btn-delete-guest-modal" data-name="' + item.name + '" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>' +
                        '</td>' +
                        '</tr>' +
                        '<tr class="fold d-none">' +
                        '<td colspan="7">' +
                        '<div class="overlay_' + item.id + '">' +
                        '</div>' +
                        '<div class="fold-content" id="companions_' + item.id + '">' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                });
                $("#users-tbody").html(html);
                // Ensure pagination variable is initialized
                var pagination = '';

                // Log currentPage to check its value and type
                console.log('Current Page:', response2.pager.currentPage);

                // Ensure currentPage is a number
                var currentPage = parseInt(response2.pager.currentPage, 10);

                // Check if previous page link should be displayed
                if (currentPage > 1) {
                    var previous = currentPage - 1;
                    pagination += '<li class="page-item"><a class="page-link" data-id="' + previous + '">Previous</a></li>';
                }

                // Generate pagination links for each page
                for (var p = 1; p <= response2.pager.totalPages; p++) {
                    var isActive = (p === currentPage) ? 'active' : '';
                    pagination += '<li class="page-item ' + isActive + '"><a class="page-link" data-id="' + p + '">' + p + '</a></li>';
                }

                // Check if next page link should be displayed
                if (currentPage < response2.pager.totalPages) {
                    var next = currentPage + 1;
                    pagination += '<li class="page-item"><a class="page-link" data-id="' + next + '">Next</a></li>';
                }
                var stats = '';
                stats += 'Showing <b>' + response2.pager.currentPageUsers + '</b> out of <b>' + response2.pager.totalUsers + '</b> entries';

                var tableNum = '';
                tableNum = '<option value="0" disabled="" selected="">Select Table #</option>';
                for (var ctr = 1; ctr <= 13; ctr++) {
                    var remS = parseInt(response2['total_for_' + ctr], 10);
                    tableNum += '<option value="' + ctr + '" ' + (remS == 0 ? 'disabled' : '') + ' style="' + (remS == 0 ? 'color:red !important;' : '') + '">' + (ctr == 11 ? 'Kids' : (ctr == 12 ? 'Sponsors A' : (ctr == 13 ? 'Sponsors B' : ctr))) + '(Slots: ' + (remS == 0 ? 'Full' : remS) + ')</option>';
                }
                $("#table_number").html(tableNum);
                $('.hint-text').html(stats);
                $(".pagination").html(pagination);
                setTimeout(function () {
                    $(".overlay-spinner").addClass('d-none');
                }, 1000);

            },
            error: function (xhr, status, error) {
                console.error('Error in second request:', error);
            }
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
        toastr.success(data.message);
        updateGraphStats();
        refreshTable();
        refreshNotification();
    });
    function refreshNotification() {
        $("#btn-view-more").attr('data-limit', 10);
        var limit =  $("#btn-view-more").data('limit');
        $.ajax({
            url: '<?php echo site_url('admin/get-notifications'); ?>',
            type: 'POST',
            data: { limit: limit },
            dataType: 'json',
            success: function (response) {
                // Check if the response is an array and if it's empty
                if (Array.isArray(response) && response.length === 0) {
                    console.log('Response is an empty array.');
                } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                    // Check if the response is an object and if it's empty
                    console.log('Response is an empty object.');
                } else {
                    // Handle non-empty response
                    console.log('Response:', response);
                    $("#notification-count").text(response.notificationsCount);
                    var notificationContainer = $("#notificationContainer");
                    var html = '';
                    $.each(response.notifications, function (index, item) {
                        html += '<div class="'+ (item.is_read == 0 ? 'bg-success' : '') +'" style="height:50px;border-bottom: 1px solid gray; justify-content: space-between; align-items: center;"><sup style="font-size: 9px;width: auto;width: 56px;padding-left:30em;" class="text-success">' + timeAgo(item.created_at) + '</sup><a class="dropdown-item notif" href="#" data-id="' + item.id + '"><p style="font-size: 0.7em;">' + item.message + '</p></a></div>';
                    });
                    console.log(html);
                    notificationContainer.html(html);
                }
            },
            error: function (xhr, status, error) {
                toastr.warning('An error occurred: ' + error);
            }
        });
    }
    function refreshTable() {
        var rsvpURL = '<?php echo site_url('rsvp') ?>';
        var page = $("#current_p").val();
        var sort = $("#sort").val() ?? 'id';
        var order = $("#order").val() ?? 'DESC';
        var search = $("#search").val();
        $(".overlay-spinner").removeClass('d-none');
        $.ajax({
            url: '<?php echo site_url('admin/refresh') ?>',
            type: 'POST',
            data: { page: page, search: search, sort: sort, order: order },
            success: function (response2) {
                console.log(response2);
                var html = '';
                $.each(response2.users, function (index, item) {
                    var tb_num = (item.table_number !== null ? item.table_number == 11 ? 'Kids' : (item.table_number == 12 ? 'Sponsors A' : (item.table_number == 13 ? 'Sponsors B' : item.table_number)) : 'N/A');
                    html += '<tr class="' + (item.qr_code_status == 1 ? 'bg-success' : '') + (item.will_attend == 'No' ? 'bg-warn' : '') + '" data-id="' + item.id + '">' +
                        '<td><button class="fc-red btn-expand btn btn-xs"><i class="fa fa-expand"></button></td>' +
                        '<td>' + item.invite_id + '</td>' +
                        '<td>' + item.name + '</td>' +
                        '<td>' + (item.will_attend === null ? 'No Response yet' : (item.will_attend === 'Yes' ? 'Confirmed Attendance' : 'Not Attending')) + '</td>' +
                        '<td>' + tb_num + '</td>' +
                        '<td>' + item.date + '</td>' +
                        '<td style="width:158px;" class="<?php echo session()->get('usertype') == 'admin' ? 'd-none' : '' ?>">' +
                        '<a href="#" type="button" data-status="' + item.will_attend + '" data-id="' + item.id + '" class="settings btn-edit-guest-modal" data-id= "' + item.id + '" data-name="' + item.name + '" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>' +
                        (item.will_attend === 'Yes' ? '<a href="#" type="button" data-id="' + item.id + '" data-name="' + item.name + '" class="settings btn-assign-guest-modal" data-table="' + item.table_number + '"title="Assign table slot" data-toggle="tooltip"><i class="fa fa-table"></i></a>' : '<a href="#" type="button" class="settings" title="Cannot Assign" data-toggle="tooltip"><i style="color:gray !important;" class="fa fa-table"></i></a>') +
                        (item.will_attend === null ? '<a class="invite-link settings" title="Copy Invite link" data-toggle="tooltip" type="button" href="' + rsvpURL + '/' + item.invite_id + '"><i class="fa fa-link"></i></a>' : '<a class="settings" disabled title="Copy Invite link" data-toggle="tooltip" type="button" href="#"><i class="fa fa-link" style="color:gray !important;"></i></a>') +
                        '<a href="#" type="button" data-id="' + item.id + '" class="delete btn-delete-guest-modal" data-name="' + item.name + '" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>' +
                        '</td>' +
                        '</tr>' +
                        '<tr class="fold d-none">' +
                        '<td colspan="7">' +
                        '<div class="overlay_' + item.id + '">' +
                        '</div>' +
                        '<div class="fold-content" id="companions_' + item.id + '">' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                });
                $("#users-tbody").html(html);
                // Ensure pagination variable is initialized
                var pagination = '';

                // Log currentPage to check its value and type
                console.log('Current Page:', response2.pager.currentPage);

                // Ensure currentPage is a number
                var currentPage = parseInt(response2.pager.currentPage, 10);

                // Check if previous page link should be displayed
                if (currentPage > 1) {
                    var previous = currentPage - 1;
                    pagination += '<li class="page-item"><a class="page-link" data-id="' + previous + '">Previous</a></li>';
                }

                // Generate pagination links for each page
                for (var p = 1; p <= response2.pager.totalPages; p++) {
                    var isActive = (p === currentPage) ? 'active' : '';
                    pagination += '<li class="page-item ' + isActive + '"><a class="page-link" data-id="' + p + '">' + p + '</a></li>';
                }

                // Check if next page link should be displayed
                if (currentPage < response2.pager.totalPages) {
                    var next = currentPage + 1;
                    pagination += '<li class="page-item"><a class="page-link" data-id="' + next + '">Next</a></li>';
                }
                var stats = '';
                stats += 'Showing <b>' + response2.pager.currentPageUsers + '</b> out of <b>' + response2.pager.totalUsers + '</b> entries';

                var tableNum = '';
                tableNum = '<option value="0" disabled="" selected="">Select Table #</option>';
                for (var ctr = 1; ctr <= 13; ctr++) {
                    var remS = parseInt(response2['total_for_' + ctr], 10);
                    tableNum += '<option value="' + ctr + '" ' + (remS == 0 ? 'disabled' : '') + ' style="' + (remS == 0 ? 'color:red !important;' : '') + '">' + (ctr == 11 ? 'Kids' : (ctr == 12 ? 'Sponsors A' : (ctr == 13 ? 'Sponsors B' : ctr))) + '(Slots: ' + (remS == 0 ? 'Full' : remS) + ')</option>';
                }
                $("#table_number").html(tableNum);
                $('.hint-text').html(stats);
                $(".pagination").html(pagination);
                setTimeout(function () {
                    $(".overlay-spinner").addClass('d-none');
                }, 1000);

            },
            error: function (xhr, status, error) {
                console.error('Error in second request:', error);
            }
        });

    }
    function checkDuplicateCompanionNames() {
        const companionInputs = document.querySelectorAll('input[name="companion_name[]"]');
        const names = [];
        let hasDuplicate = false;

        companionInputs.forEach(input => {
            const name = input.value.trim();
            if (name && names.includes(name)) {
                hasDuplicate = true;
            } else {
                names.push(name);
            }
        });


        if (hasDuplicate) {
            toastr.error("Duplicate companion name detected!");
            $(".submitButton").prop('disabled', true);
        } else {
            $(".submitButton").prop('disabled', false);
        }
    }
    var options1 = {
        chart: {
            height: 280,
            type: "radialBar",
        },
        series: [<?php echo $data->guest_percentage; ?>],
        colors: ["#20E647"],
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                track: {
                    background: '#333',
                    startAngle: -135,
                    endAngle: 135,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: "30px",
                        show: true
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                gradientToColors: ["#e62034"],
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: "butt"
        },
        labels: ["Total"]
    };

    const ch1 = new ApexCharts(document.querySelector("#chart"), options1);
    ch1.render();

    var options2 = {
        chart: {
            height: 280,
            type: "radialBar",
        },
        series: [<?php echo $data->totalGuestWillAttend; ?>],
        colors: ["#20E647"],
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                track: {
                    background: '#333',
                    startAngle: -135,
                    endAngle: 135,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: "30px",
                        show: true
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                gradientToColors: ["#87D4F9"],
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: "butt"
        },
        labels: ["Total"]
    };

    const ch2 = new ApexCharts(document.querySelector("#chart2"), options2);
    ch2.render();

    var options3 = {
        chart: {
            height: 280,
            type: "radialBar",
        },
        series: [<?php echo $data->kids_percentage; ?>],
        colors: ["#20E647"],
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                track: {
                    background: '#333',
                    startAngle: -135,
                    endAngle: 135,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: "30px",
                        show: true
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                gradientToColors: ["#87D4F9"],
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: "butt"
        },
        labels: ["Total"]
    };

    const ch3 = new ApexCharts(document.querySelector("#chart3"), options3);
    ch3.render();


    var options4 = {
        chart: {
            height: 280,
            type: "radialBar",
        },
        series: [<?php echo $data->scanned_percentage; ?>],
        colors: ["#20E647"],
        plotOptions: {
            radialBar: {
                startAngle: -135,
                endAngle: 135,
                track: {
                    background: '#333',
                    startAngle: -135,
                    endAngle: 135,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        fontSize: "30px",
                        show: true
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                gradientToColors: ["#87D4F9"],
                stops: [0, 100]
            }
        },
        stroke: {
            lineCap: "butt"
        },
        labels: ["Total"]
    };

    const ch4 = new ApexCharts(document.querySelector("#chart4"), options4);
    ch4.render();
    // Initialize Pusher
    var pusher = new Pusher('8d7fa0a5863f106e689f', {
        cluster: 'ap3',
        forceTLS: true
    });

    // Subscribe to a channel
    var channel = pusher.subscribe('graph-channel');

    // Bind to an event
    channel.bind('graph-updated', function (data) {

        updateGraphStats();
    });

    function updateGraphStats() {
        $.ajax({
            url: '<?php echo base_url('admin/update-graph'); ?>', // Replace with your API endpoint
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response);

                const totalGuestPercentage = response.totalGuestPercentage; // This is a single number
                const totalGuestWillAttend = response.totalGuestWillAttend; // This is also a single number
                const totalKids = response.kids_percentage; // This is also a single numbe
                const totalScannedPercentage = response.scanned_percentage; // This is also a single number
                // console.log(response);
                // Update the chart with new data
                ch1.updateOptions({
                    series: [totalGuestPercentage] // Update with new data

                });
                ch2.updateOptions({
                    series: [totalGuestWillAttend] // Update with new data
                });
                ch3.updateOptions({
                    series: [totalKids] // Update with new data
                });
                ch4.updateOptions({
                    series: [totalScannedPercentage] // Update with new data
                });
                var totalGuest = response.totalGuest + ' of ' + response.totalCap + ' </br>Max Capacity';
                var totalGuestThatWillAttend = response.totalGuestConfirm + ' of ' + response.totalCap + ' </br>RSVP Confirmation Rate';
                var kidsCount = response.totalKids + ' of ' + response.kidsCap + ' </br>Kids Count';
                var totalScannedGuest = response.totalScannedGuest + ' of ' + response.totalCap + ' </br>QR Guest Scanned';
                $("#total_guest_container").html(totalGuest);
                $("#total_guest_will_attend_container").html(totalGuestThatWillAttend);
                $("#total_kids_container").html(kidsCount);
                $("#total_scanned_guest").html(totalScannedGuest);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
            }
        });
    }
</script>
