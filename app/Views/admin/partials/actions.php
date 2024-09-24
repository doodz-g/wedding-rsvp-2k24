<script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            let rsvpURL = '<?php echo base_url('rsvp') ?>';
            $(document).on('click', '.submitButton', function () {
                var formData = $(".guest-form-add").serialize();
                $(".submitButton").html("<i class='fa fa-spinner fa-spin'></i>");
                if ($("#name").val().length > 0) {
                    console.log(formData);
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
                                var tb_num = (item.table_number !== null ? item.table_number == 11 ? 'Kids Table' : 'Table #' + item.table_number : '');
                                companionContainer.append('<div class="row form-check"><input type="checkbox" class="form-check-input c-box" value="' + (item.id ? item.id : '') + '" name="guest_id"><label class="form-check-label" for="guest">' + item.name + '<span style="float:right;font-weight:600;">(Main Guest)</span></label>' +
                                    '<span style="float:right;font-weight:600;">' + tb_num + '</span></div>');
                                ctr++;
                            });
                            $.each(response.companions, function (index, item) {
                                var tb_num = (item.table_number !== null ? item.table_number == 11 ? 'Kids Table' : 'Table #' + item.table_number : '');
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
                $(this).html("<i class='fa fa-spinner fa-spin'></i>");
                $(".modal-title").text('Edit Guest[' + name + ']');
                $("#update_name").val(name);
                $("#update_user_id").val(user_id);
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
                                companionContainer.append('<li> <input type="text" oninput="checkDuplicateCompanionNames()" id="companion_name" value="' + (item.name ? item.name : '') + '" name="companion_name[' + ctr + '][name]" style="width: 90%; height: 38px; border: 2px solid #ced4da;">' +
                                    '<input type="hidden" value="' + (item.id ? item.id : '') + '" name="companion_name[' + ctr + '][id]" style="width: 90%; height: 38px; border: 2px solid #ced4da;">' +
                                    '<span type="button" class="delete_companion" data-id="' + (item.id ? item.id : '') + '" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
                                ctr++;
                            });


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
                        $.each(response.companions, function (index, item) {
                            html += '<tr style="background-color: lightgray;">'+
                                    '<td class="text-center" style="border-color:lightgray;">' + item.name + '</td>'+
                                    '<td style="text-align:center;border-color:lightgray;">' + (item.table_number !== null ? item.table_number == 11 ? 'Kids' : item.table_number : 'N/A') + '</td>'+
                                    '</tr>';
                        });
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

        $(document).on('click', '#btn-modal-settings', function () {
            $.ajax({
                url: '<?php echo site_url('admin/settings'); ?>',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log(response)
                        var html = '';
                        $.each(response.settings, function (index, setting) {
                         html +='<label>'+setting.name+':</label>'+
                              '<input type="text" class="form-control" id="'+setting.name+'" name="setting['+setting.id+']" value="'+setting.quantity+'" required>';

                        });
                        $("#settings-container").html(html);
                    
                    $("#settings-modal").modal('show');
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        });

        $(document).on('click', '.updateSettings', function () {
            var formData = $(".settings-form-update").serialize();;
            $(this).html("<i class='fa fa-spinner fa-spin'></i>");
            $.ajax({
                url: '<?php echo site_url('admin/update-settings'); ?>',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    if (response.status == 'error') {
                        toastr.error(response.message);
                    } else {
                        toastr.success(response.message);
                        $("#settings-modal").modal('hide');
                        $(".updateSettings").text('Save');
                        refreshTable();
                    }
                  
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', status, error);
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
            toastr.info(data.will_attend, 'Notification', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
                timeOut: 5000
            });
            refreshTable();
        });

        function refreshTable() {
            var rsvpURL = '<?php echo site_url('rsvp') ?>';
            var page = $("#current_p").val();
            var search = $("#search").val();
            $(".overlay-spinner").removeClass('d-none');
            $.ajax({
                url: '<?php echo site_url('admin/refresh') ?>',
                type: 'POST',
                data: { page: page, search: search },
                success: function (response2) {
                    console.log(response2);
                    var html = '';
                    $.each(response2.users, function (index, item) {
                        var tb_num = (item.table_number !== null ? item.table_number == 11 ? 'Kids' : item.table_number : 'N/A');
                        html += '<tr class="' + (item.qr_code_status == 1 ? 'bg-success' : '') + '" data-id="' + item.id + '">' +
                            '<td><button class="fc-red btn-expand btn btn-xs"><i class="fa fa-expand"></button></td>' +
                            '<td>' + item.invite_id + '</td>' +
                            '<td>' + item.name + '</td>' +
                            '<td>' + item.date + '</td>' +
                            '<td>' + (item.will_attend === null ? 'Invitation not yet sent' : (item.will_attend === 'Yes' ? 'Will attend' : 'Will not attend')) + '</td>' +
                            '<td>' + tb_num + '</td>' +
                            '<td style="width:158px;" class="<?php echo session()->get('usertype') == 'admin' ? 'd-none':''?>">' +
                            '<a href="#" type="button" data-id="' + item.id + '" class="settings btn-edit-guest-modal" data-id= "' + item.id + '" data-name="' + item.name + '" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>' +
                            '<a href="#" type="button" data-id="' + item.id + '" data-name="' + item.name + '" class="settings btn-assign-guest-modal" data-table="' + item.table_number + '"title="Assign table slot" data-toggle="tooltip"><i class="fa fa-table"></i></a>' +
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
                        pagination += '<li class="page-item"><a class="page-link" href="?page=' + previous + '">Previous</a></li>';
                    }

                    // Generate pagination links for each page
                    for (var p = 1; p <= response2.pager.totalPages; p++) {
                        var isActive = (p === currentPage) ? 'active' : '';
                        pagination += '<li class="page-item ' + isActive + '"><a class="page-link" href="?page=' + p + '">' + p + '</a></li>';
                    }

                    // Check if next page link should be displayed
                    if (currentPage < response2.pager.totalPages) {
                        var next = currentPage + 1;
                        pagination += '<li class="page-item"><a class="page-link" href="?page=' + next + '">Next</a></li>';
                    }
                    var stats = '';
                    stats += 'Showing <b>' + response2.pager.currentPageUsers + '</b> out of <b>' + response2.pager.totalUsers + '</b> entries';

                    var tableNum = '';
                    tableNum = '<option value="0" disabled="" selected="">Select Table #</option>';
                    for (var ctr = 1; ctr <= 11; ctr++) {
                        var remS = parseInt(response2['total_for_' + ctr], 10);
                        tableNum += '<option value="' + ctr + '" ' + (remS == 0 ? 'disabled' : '') + ' style="' + (remS == 0 ? 'color:red !important;' : '') + '">' + (ctr == 11 ? 'Kids' : ctr) + '(Slots: ' + (remS == 0 ? 'Full' : remS) + ')</option>';
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
        function updateChart() {

        }
        var ch1 = new ApexCharts(document.querySelector("#chart"), options1).render();

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

        new ApexCharts(document.querySelector("#chart2"), options2).render();

    </script>
