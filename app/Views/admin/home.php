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
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Guest <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#add-user-modal"><i
                                    class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                            <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to
                                    Excel</span></a>
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
                                <tr class="view" data-id="<?php echo $c->id; ?>">
                                    <td><?php echo $c->id ?> </td>
                                    <td><?php echo $c->invite_id ?></td>
                                    <td><?php echo $c->name ?></td>
                                    <td><?php echo $c->date ?></td>
                                    <td><?php echo ($c->will_attend === NULL) ? 'Invitation not yet sent ' : (($c->will_attend == 'Yes') ? 'Will attend' : 'Will not attend') ?>
                                    </td>
                                    <td><?php echo $c->will_attend === NULL ? '<a class="invite-link" href="' . base_url('rsvp/' . $c->invite_id . '') . '">Click to Copy link</a>' : 'N/A' ?>
                                    </td>
                                    <td>
                                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                </tr>
                                <tr class="fold">
                                    <td colspan="6">
                                        <div id="overlay_<?php echo $c->id ?>" style="display:contents;">
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
    <div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="add-user-modal"
        aria-hidden="true">
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
                    <form id="myForm">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name">
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
        <!-- Template Javascript -->
        <script src="<?php echo base_url('public/assets/js/admin.js'); ?>"></script>

        <script>
            $('.fold-table').on('click', 'td', function () {
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
            $('#submitButton').click(function () {
                // Prepare data to be sent
                var formData = {
                    name: $('#name').val()
                };
                // Send AJAX POST request
                $.ajax({
                    url: '<?php echo base_url('admin/submit') ?>', // URL to the controller method
                    type: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        // Handle success
                        toastr.success(response.message);
                        setTimeout(function () {
                            $("#overlay").fadeOut(300);
                        }, 500);
                        setTimeout(function () {
                            $("#add-user-modal").modal('hide');
                        }, 900);

                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        toastr.warning('An error occurred: ' + error);
                    }
                });
            });

        </script>
</body>

</html>