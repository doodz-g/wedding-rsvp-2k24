<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Guest Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/accordion@3.0.2/src/accordion.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/admin.css'); ?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Guest <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7" style="padding-right:0;">
                            <ul class="horizontal-list">
                                <li><input type="text" class="form-control" placeholder="Search here.."></li>
                                <li><a href="<?php echo base_url('logout'); ?>" class="btn btn-secondary"
                                        data-target="#"><i class="material-icons">&#xe9ba;</i> <span>Log out</span></a>
                                </li>
                                <li><a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                        <span>Export to
                                            Excel</span></a></li>
                                <li><a href="#" class="btn btn-secondary" id="btn-add-guest" data-toggle="modal"
                                        data-target="#"><i class="material-icons">&#xE147;</i> <span>Add New
                                            User</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover fold-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invite ID</th>
                            <th>Name</th>
                            <th>Date Created</th>
                            <th>RSVP</th>
                            <th>Invite link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="users-tbody">
                        <?php
                        if (!empty($data->all_users)) {
                            foreach ($data->all_users as $key => $c) {
                                ?>
                                <tr class="view <?php echo $c->qr_code_status == 1 ? 'bg-success':''?>" data-id="<?php echo $c->id; ?>">
                                    <td><?php echo $c->id ?> </td>
                                    <td><?php echo $c->invite_id ?></td>
                                    <td><?php echo $c->name ?></td>
                                    <td><?php echo $c->date ?></td>
                                    <td><?php echo ($c->will_attend === NULL) ? 'Invitation not yet sent ' : (($c->will_attend == 'Yes') ? 'Will attend' : 'Will not attend') ?>
                                    </td>
                                    <td><?php echo $c->will_attend === NULL ? '<a class="invite-link" href="' . base_url('rsvp/' . $c->invite_id . '') . '">Click to Copy link</a>' : 'N/A' ?>
                                    </td>
                                    <td>
                                        <a href="#" type="button" class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <a href="#" type="button" class="delete" title="Delete" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                </tr>
                                <tr class="fold">
                                    <td colspan="6">
                                        <div id="overlay_<?php echo $c->id ?>">
                                            <div class="cv-spinner"><span class="spinner"></span></div>
                                        </div>
                                        <div class="fold-content" id="companions_<?php echo $c->id ?>">
                                        </div>

                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div id="overlay">
                    <div class="cv-spinner"><span class="spinner"></span></div>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Guest</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="guest-form">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <label for="name">Companions:</label>
                        <ul id="companion-container" style="line-height:3.5;list-style:none;">

                        </ul>
                        <button type="button" id="add_companion"><i class="fa fa-plus"></i> Add companion</button>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="submitButton" value="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <!-- Template Javascript -->
        <script src="<?php echo base_url('public/assets/js/admin.js'); ?>"></script>

        <script>
            $(document).ready(function () {

                $('#submitButton').click(function () {
                    let baseURL = window.location.origin;
                    let rsvpURL = baseURL + '/wedding-rsvp-2k24/rsvp';
                    var formData = $("#guest-form").serialize();
                    console.log(formData);
                    // Send AJAX POST request
                    $.ajax({
                        url: '<?php echo base_url('admin/submit') ?>', // URL to the controller method
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            // Handle success
                            toastr.success(response.message);
                            setTimeout(function () {
                                $("#overlay").fadeOut(300);
                            }, 500);
                            setTimeout(function () {
                                $("#add-user-modal").modal('hide');
                            }, 900);

                            $.ajax({
                                url: '<?php echo base_url('admin/refresh') ?>',
                                type: 'POST',
                                success: function (response2) {
                                    console.log(response2);
                                    var html = $("#users-tbody").html('');
                                    $.each(response2, function (index, item) {
                                        html += '<tr class="view" data-id="' + item.id + '">' +
                                            '<td>' + item.id + '</td>' +
                                            '<td>' + item.invite_id + '</td>' +
                                            '<td>' + item.name + '</td>' +
                                            '<td>' + item.date + '</td>' +
                                            '<td>' + (item.will_attend === null ? 'Invitation not yet sent' : (item.will_attend === 'Yes' ? 'Will attend' : 'Will not attend')) + '</td>' +
                                            '<td>' + (item.will_attend === null ? '<a class="invite-link" href="' + rsvpURL + '/' + item.invite_id + '">Click to Copy link</a>' : 'N/A') + '</td>' +
                                            '<td>' +
                                            '<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>' +
                                            '<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr class="fold">' +
                                            '<td colspan="6">' +
                                            '<div id="overlay_' + item.id + '">' +
                                            '<div class="cv-spinner"><span class="spinner"></span></div>' +
                                            '</div>' +
                                            '<div class="fold-content" id="companions_' + item.id + '">' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>';
                                    });
                                    $("#users-tbody").html(html);
                                    $(".fold-table tr.view").on("click", function () {
                                        $(this).toggleClass("open").next(".fold").toggleClass("open");
                                    });
                                },
                                error: function (xhr, status, error) {
                                    console.error('Error in second request:', error);
                                }
                            });
                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            toastr.warning('An error occurred: ' + error);
                        }
                    });
                });
            });
            $(document).on('click', '.fold-table td', function () {
                var user_id = $(this).parent().data('id');
                $("#companions_" + user_id).html('');
                $("#overlay_" + user_id).fadeIn(200);
                $.ajax({
                    url: '<?php echo base_url('admin/companions'); ?>',
                    type: 'POST',
                    data: { user_id: user_id },
                    dataType: 'json',
                    success: function (response) {
                        // Check if the response is an array and if it's empty
                        if (Array.isArray(response) && response.length === 0) {
                            console.log('Response is an empty array.');
                            $("#companions_" + user_id).html('');
                            $("#companions_" + user_id).html('<p>No companions found.</p>');
                            $("#overlay_" + user_id).fadeOut(200);
                        } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                            // Check if the response is an object and if it's empty
                            console.log('Response is an empty object.');

                            $("#companions_" + user_id).html('<p>No companions found.</p>');
                        } else {
                            // Handle non-empty response
                            console.log('Response:', response);
                            var html = "";
                            html = '<ul>';
                            $.each(response, function (index, item) {
                                html += '<li>Name: ' + item.name + '</li>';
                            });
                            html += '</ul>';

                            setTimeout(function () {
                                $("#overlay_" + user_id).fadeOut(200);
                            }, 300);
                            setTimeout(function () {
                                $("#companions_" + user_id).html(html);
                            }, 600);

                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
            $('#btn-add-guest').click(function () {
                $("#overlay").fadeOut(300);
                $("#add-user-modal").modal("show");
            });

            var companionContainer = $("#companion-container");
            companionContainer.html('<li> <input type="text" id="companion_name" name="companion_name[]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
            function addCompanion() {
                companionContainer.append('<li> <input type="text" id="companion_name" name="companion_name[]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span type="button" class="delete_companion" style="padding-left: 11px;color: red;"><i class="fa fa-minus"></i></span></li>');
            }

            $('#add_companion').click(function () {
                addCompanion();
            });
            $(document).on("click", ".delete_companion", function () {
                $(this).closest("li").remove();
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
                var baseURL = window.location.origin;
                var rsvpURL = baseURL + '/wedding-rsvp-2k24/rsvp';

                console.log('Received data:', data);
                // You can update the UI or show a notification based on the data received
                toastr.info(data.will_attend, 'Notification', {
                    closeButton: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                    timeOut: 5000
                });
                $.ajax({
                    url: '<?php echo base_url('admin/refresh') ?>',
                    type: 'POST',
                    success: function (response2) {
                        console.log(response2);
                        var html = $("#users-tbody").html('');
                        $.each(response2, function (index, item) {
                            html += '<tr class="view ' + (item.qr_code_status == 1 ? 'bg-success' : '') + '" data-id="' + item.id + '">' +
                                '<td>' + item.id + '</td>' +
                                '<td>' + item.invite_id + '</td>' +
                                '<td>' + item.name + '</td>' +
                                '<td>' + item.date + '</td>' +
                                '<td>' + (item.will_attend === null ? 'Invitation not yet sent' : (item.will_attend === 'Yes' ? 'Will attend' : 'Will not attend')) + '</td>' +
                                '<td>' + (item.will_attend === null ? '<a class="invite-link" href="' + rsvpURL + '/' + item.invite_id + '">Click to Copy link</a>' : 'N/A') + '</td>' +
                                '<td>' +
                                '<a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>' +
                                '<a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>' +
                                '</td>' +
                                '</tr>' +
                                '<tr class="fold">' +
                                '<td colspan="6">' +
                                '<div id="overlay_' + item.id + '">' +
                                '<div class="cv-spinner"><span class="spinner"></span></div>' +
                                '</div>' +
                                '<div class="fold-content" id="companions_' + item.id + '">' +
                                '</div>' +
                                '</td>' +
                                '</tr>';
                        });
                        $("#users-tbody").html(html);
                        $(".fold-table tr.view").on("click", function () {
                            $(this).toggleClass("open").next(".fold").toggleClass("open");
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error in second request:', error);
                    }
                });
            });
        </script>
</body>

</html>