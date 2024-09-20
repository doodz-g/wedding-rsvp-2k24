<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('public/assets/img/favicon.ico'); ?>" sizes="192x192">
    <title>Guest Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.css">
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <?php echo view('admin/partials/nav'); ?>
    <div class="container-fluid">
        <div class="row" style="padding-top:20px;">
            <div class="col-md-7 offset-md-5" style="t">
                <h2 style="color: #000000;">Guest <b>Management</b></h2>
            </div>
        </div>
        <div class="container">
            <div class="row charts-container text-center">
                <div class="col-md-4 chart-wrapper">
                    <div id="chart"></div>
                    <div class="chart-label">
                        <span><?php echo $data->totalGNow . ' of ' . $data->maxCap; ?> guests</span>
                    </div>
                </div>
                <div class="col-md-4 chart-wrapper text-center">
                    <div id="chart2"></div>
                    <div class="chart-label">
                        <span><?php echo $data->totalGuestWillAttend . ' of ' . $data->maxCap; ?> will attend</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-md-5" style="padding-right:0;">
                            <ul class="horizontal-list">
                                <li><input type="text" class="form-control" id="search" onkeyup="refreshTable();"
                                        placeholder="Search here.."></li>
                            </ul>
                        </div>
                        <div class="col-md-7" style="padding-right:0;">
                            <ul class="horizontal-list">
                                <li><a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                        <span>Export to
                                            Excel</span></a></li>
                                <li><a href="#" class="btn btn-secondary" id="btn-add-guest" data-toggle="modal"
                                        data-target="#"><i class="material-icons">&#xE147;</i> <span>Add New
                                            User</span></a></li>
                                <li><a href="#" onClick="refreshTable();" class="btn btn-secondary" data-target="#"><i
                                            class="fa fa-refresh"></i>
                                        <span>Refresh</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-container" style="position:relative;">
                    <div class="overlay-spinner d-none">
                        <i class="fa fa-spinner fa-spin table-spinner" style="font-size:50px;"></i>
                    </div>
                    <table class="table table-striped table-hover fold-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Invite ID</th>
                                <th>Name</th>
                                <th>Date Created</th>
                                <th>RSVP</th>
                                <th>Table #</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="users-tbody">
                            <?php
                            if (!empty($data->users)) {
                                foreach ($data->users as $key => $c) {
                                    ?>
                                    <tr class="view <?php echo $c->qr_code_status == 1 ? 'bg-success' : '' ?>"
                                        data-id="<?php echo $c->id; ?>">
                                        <td><?php echo $c->id ?> </td>
                                        <td><?php echo $c->invite_id ?></td>
                                        <td><?php echo $c->name ?></td>
                                        <td><?php echo $c->date ?></td>
                                        <td><?php echo ($c->will_attend === NULL) ? 'Invitation not yet sent ' : (($c->will_attend == 'Yes') ? 'Will attend' : 'Will not attend') ?>
                                        <td><?php echo ($c->table_number != NULL ? $c->table_number : 'N/A') ?></td>
                                        </td>
                                        <td style="width:158px;">
                                            <a href="#" type="button" data-id="<?php echo $c->id; ?>"
                                                data-name="<?php echo $c->name; ?>" class="settings btn-edit-guest-modal"
                                                title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>
                                            <a href="#" type="button" data-id="<?php echo $c->id; ?>"
                                                class="delete btn-delete-guest-modal" title="Delete" data-toggle="tooltip"><i
                                                    class="fa fa-trash"></i></a>
                                            <a href="#" type="button" data-id="<?php echo $c->id; ?>"
                                                data-name="<?php echo $c->name; ?>" data-table="<?php echo $c->table_number; ?>"
                                                class="settings btn-assign-guest-modal" title="Assign table slot"
                                                data-toggle="tooltip"><i class="fa fa-table"></i></a>
                                            <?php echo $c->will_attend === NULL ? '<a class="invite-link settings" title="Copy Invite link" data-toggle="tooltip" type="button" href="' . base_url('rsvp/' . $c->invite_id . '') . '"><i class="fa fa-link"></i></a>' : '<a class="settings" disabled title="Link already sent." data-toggle="tooltip" type="button" href="#"><i class="fa fa-link" style="color:gray !important;"></i></a>' ?>
                                        </td>
                                    </tr>
                                    <tr class="fold d-none">
                                        <td colspan="7">
                                            <div class="overlay_<?php echo $c->id ?>">
                                                <div class="cv-spinner"><span class="spinner"></span></div>
                                            </div>
                                            <b>Companions:</b>
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
                </div>
                <input type="hidden" name="" id="current_p" value="<?php echo $data->pager->currentPage; ?>">
                <div class="hint-text">Showing <b><?php echo $data->pager->currentPageUsers; ?></b> out of
                    <b><?php echo $data->pager->totalUsers ?></b> entries
                </div>
                <div class="pagination">
                    <ul class="pagination">
                        <?php if ($data->pager->currentPage > 1): ?>
                            <li class="page-item">
                                <a class="page-link" style="z-index:0 !important;"
                                    href="?page=<?= $data->pager->currentPage - 1 ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $data->pager->totalPages; $i++): ?>
                            <li class="page-item <?= $i == $data->pager->currentPage ? 'active' : '' ?>">
                                <a class="page-link" style="z-index:0 !important;" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($data->pager->currentPage < $data->pager->totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" style="z-index:0 !important;"
                                    href="?page=<?= $data->pager->currentPage + 1 ?>">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="overlay">
                    <div class="cv-spinner"><span class="spinner"></span></div>
                </div> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Guest</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="guest-form-add">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <label for="name">Companions:</label>
                        <ul id="companion-container" style="line-height:3.5;list-style:none;">

                        </ul>
                        <button type="button" class="add_companion"><i class="fa fa-plus"></i> Add
                            companion</button>
                        <div class="modal-footer">
                            <button type="button" value="submit" class="btn btn-primary submitButton">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="overlay">
                    <div class="cv-spinner"><span class="spinner"></span></div>
                </div> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Guest</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="guest-form-update">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="update_name" name="name">
                        <input type="hidden" class="form-control" id="update_user_id" name="user_id">
                        <label for="name">Companions:</label>
                        <ul id="update_companion_container" style="line-height:3.5;list-style:none;">

                        </ul>
                        <button type="button" class="update_companion"><i class="fa fa-plus"></i> Add
                            companion</button>
                        <div class="modal-footer">
                            <button type="button" value="submit" class="btn btn-primary updateButton">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal fade" id="delete-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="overlay">
                    <div class="cv-spinner"><span class="spinner"></span></div>
                </div> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Remove Guest</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Would you like to remove this guest?</p>
                    <div class="modal-footer">
                        <input type="hidden" id="d_user_id">
                        <button type="button" class="btn btn-primary" id="btn-delete-guest">Confirm</button>
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Assign Modal -->
    <div class="modal fade" id="assign-user-modal" tabindex="-1" role="dialog" aria-labelledby="#" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- <div class="overlay">
                    <div class="cv-spinner"><span class="spinner"></span></div>
                </div> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Assign this guest to a table:</p>
                    <div class="row form-check">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll">Select All</label>
                    </div>
                    <form class="guest-table-update">
                        <div class="container" style="padding-bottom:10px;">
                            <div class="form-check" id="ga-table-container">

                            </div>
                        </div>
                        <select class="form-control" id="table_number" name="table_number">
                            <option value="0" disabled selected>Select Table #</option>
                            <?php for ($x = 1; $x <= 10; $x++) { ?>
                                <option value="<?php echo $x; ?>" <?php echo $data->{"total_for_" . $x} == 0 ? 'disabled' : ''; ?>>
                                    <?php echo $x; ?> (Slots:
                                    <?php echo $data->{"total_for_" . $x} == 0 ? 'Full' : $data->{"total_for_" . $x}; ?>)
                                </option>
                            <?php } ?>
                        </select>
                        <div class="modal-footer">
                            <input type="hidden" id="a_user_id" name="user_id">
                            <button type="button" class="btn btn-primary" id="btn-assign-guest">Assign</button>
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('public/assets/js/admin.js'); ?>"></script>

    <script>
        $(document).ready(function () {
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
                            if(response.status == "success"){
                                toastr.success(response.message);
                                setTimeout(function () {
                                $(".overlay").fadeOut(300);
                                }, 500);
                                setTimeout(function () {
                                    $("#assign-user-modal").modal('hide');
                                }, 900);
                                $("#btn-assign-guest").html("Assign");
                                refreshTable();
                            }else if(response.status == "error"){
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
                                companionContainer.append('<div class="row form-check"><input type="checkbox" class="form-check-input c-box" value="' + (item.id ? item.id : '') + '" name="guest_id"><label class="form-check-label" for="guest">' + item.name + '</label>' +
                                    '<span style="float:right;font-weight:600;">(Main Guest)(Table # : '+item.table_number+')</span></div>');
                                ctr++;
                            });
                            $.each(response.companions, function (index, item) {
                                companionContainer.append('<div class="row form-check"><input type="checkbox" class="form-check-input c-box" value="' + (item.name ? item.name : '') + '" name="companion_name[' + ctr + '][name]"><label class="form-check-label" for="guest">' + item.name + '</label>' +
                                    '<input type="hidden" value="' + (item.id ? item.id : '') + '" name="companion_name[' + ctr + '][id]" style="width: 90%; height: 38px; border: 2px solid #ced4da;"><span style="float:right;font-weight:600;">(Table # : '+item.table_number+')</span></div>');
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
                                companionContainer.append('<li> <input type="text" id="companion_name" value="' + (item.name ? item.name : '') + '" name="companion_name[' + ctr + '][name]" style="width: 90%; height: 38px; border: 2px solid #ced4da;">' +
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


        $(document).on('click', '.fold-table td', function () {
            var user_id = $(this).parent().data('id');
            $("#companions_" + user_id).html('');
            $(".overlay_" + user_id).fadeIn(200);
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
                        $(".overlay_" + user_id).fadeOut(200);
                    } else if (typeof response === 'object' && Object.keys(response).length === 0) {
                        // Check if the response is an object and if it's empty
                        console.log('Response is an empty object.');

                        $("#companions_" + user_id).html('<p>No companions found.</p>');
                    } else {
                        // Handle non-empty response
                        console.log('Response:', response);
                        var html = "";
                        html = '<ul>';
                        $.each(response.companions, function (index, item) {
                            html += '<li>Name: ' + item.name + '</li>';
                        });
                        html += '</ul>';

                        setTimeout(function () {
                            $(".overlay_" + user_id).fadeOut(200);
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
                        html += '<tr class="view ' + (item.qr_code_status == 1 ? 'bg-success' : '') + '" data-id="' + item.id + '">' +
                            '<td>' + item.id + '</td>' +
                            '<td>' + item.invite_id + '</td>' +
                            '<td>' + item.name + '</td>' +
                            '<td>' + item.date + '</td>' +
                            '<td>' + (item.will_attend === null ? 'Invitation not yet sent' : (item.will_attend === 'Yes' ? 'Will attend' : 'Will not attend')) + '</td>' +
                            '<td>' + (item.table_number !== null ? item.table_number : 'N/A') + '</td>' +
                            '<td style="width:158px;">' +
                            '<a href="#" type="button" data-id="' + item.id + '" class="settings btn-edit-guest-modal" data-id= "' + item.id + '" data-name="' + item.name + '" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>' +
                            '<a href="#" type="button" data-id="' + item.id + '" class="delete btn-delete-guest-modal" data-name="' + item.name + '" title="Delete" data-toggle="tooltip"><i class="fa fa-trash"></i></a>' +
                            '<a href="#" type="button" data-id="' + item.id + '" data-name="' + item.name + '" class="settings btn-assign-guest-modal" data-table="' + item.table_number + '"title="Assign table slot" data-toggle="tooltip"><i class="fa fa-table"></i></a>' +
                            (item.will_attend === null ? '<a class="invite-link settings" title="Copy Invite link" data-toggle="tooltip" type="button" href="' + rsvpURL + '/' + item.invite_id + '"><i class="fa fa-link"></i></a>' : '<a class="settings" disabled title="Copy Invite link" data-toggle="tooltip" type="button" href="#"><i class="fa fa-link" style="color:gray !important;"></i></a>') +
                            '</td>' +
                            '</tr>' +
                            '<tr class="fold d-none">' +
                            '<td colspan="7">' +
                            '<div class="overlay_' + item.id + '">' +
                            '<div class="cv-spinner"><span class="spinner"></span></div>' +
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
                    stats += '<b>' + response2.pager.currentPageUsers + '</b> out of <b>' + response2.pager.totalUsers + '</b> entries';

                    var tableNum = '';
                    tableNum = '<option value="0" disabled="" selected="">Select Table #</option>';
                    for (var ctr = 1; ctr <= 10; ctr++) {
                        var remS = parseInt(response2['total_for_' + ctr], 10);
                        tableNum += '<option value="' + ctr + '" ' + (remS == 0 ? 'disabled' : '') + 'style="'+(remS == 0  ? 'color:red !important;' : '')+'">' + ctr + '(Slots: ' + (remS == 0 ? 'Full' : remS) + ')</option>';

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
    <?php echo view('admin/partials/footer'); ?>
</body>

</html>