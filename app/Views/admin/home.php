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
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/admin.css'); ?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@latest/dist/apexcharts.css">
</head>

<body>
    <?php
    $sessionAdmin = \Config\Services::session();
    $config = new \Config\SessionTwo();
    $sessionSuperAdmin = \Config\Services::session($config);

    // Check if superadmin session data exists
    if ($sessionSuperAdmin->has('logged_in') && $sessionSuperAdmin->get('logged_in') === true) {
        $username = $sessionSuperAdmin->get('username');
        $usertype = $sessionSuperAdmin->get('usertype');
    } elseif ($sessionAdmin->has('logged_in') && $sessionAdmin->get('logged_in') === true) {
        // Check for admin session
        $username = $sessionAdmin->get('username');
        $usertype = $sessionAdmin->get('usertype');
    } else {
        $username = null;
        $usertype = null;
    }

    $sessions = [
        'username' => $username,
        'usertype' => $usertype
    ];
    ?>
  <?= view('admin/partials/nav', $sessions); ?>
    <div class="container-fluid">
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
                        <div class="col-md-7 <?php esc($usertype) === 'admin' ? 'd-none':'' ?>" style="padding-right:0;">
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
                        <i class="fa fa-spinner fa-spin table-spinner"
                            style="font-size:50px; color: red !important;"></i>
                    </div>
                    <table class="table table-striped table-hover fold-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Invite ID</th>
                                <th>Name</th>
                                <th>Date Created</th>
                                <th>RSVP</th>
                                <th>Table #</th>
                                <th class="<?php echo esc($usertype) == 'admin' ? 'd-none':''?>">Action</th>
                            </tr>
                        </thead>
                        <tbody id="users-tbody">
                            <?php
                            if (!empty($data->users)) {
                                foreach ($data->users as $key => $c) {
                                    ?>
                                    <tr class="<?php echo $c->qr_code_status == 1 ? 'bg-success' : '' ?>"
                                        data-id="<?php echo $c->id; ?>">
                                        <td><button class="settings btn-expand btn btn-xs fc-red"><i
                                                    class="fa fa-expand"></button></td>
                                        <td><?php echo $c->invite_id ?></td>
                                        <td><?php echo $c->name ?></td>
                                        <td><?php echo $c->date ?></td>
                                        <td><?php echo ($c->will_attend === NULL) ? 'Invitation not yet sent ' : (($c->will_attend == 'Yes') ? 'Will attend' : 'Will not attend') ?>
                                        <td><?php echo ($c->table_number != NULL ? $c->table_number == 11 ? 'Kids' : ($c->table_number == 12 ? 'Sponsors' : $c->table_number): 'N/A') ?>
                                        </td>
                                        </td>
                                        <td style="width:158px;" class="<?php echo esc($usertype) == 'admin' ? 'd-none':''?>">
                                            <a href="#" type="button" data-id="<?php echo $c->id; ?>"
                                                data-name="<?php echo $c->name; ?>" class="settings btn-edit-guest-modal"
                                                title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>
                                            <a href="#" type="button" data-id="<?php echo $c->id; ?>"
                                                data-name="<?php echo $c->name; ?>" data-table="<?php echo $c->table_number; ?>"
                                                class="settings btn-assign-guest-modal" title="Assign table slot"
                                                data-toggle="tooltip"><i class="fa fa-table"></i></a>
                                            <?php echo $c->will_attend === NULL ? '<a class="invite-link settings" title="Copy Invite link" data-toggle="tooltip" type="button" href="' . base_url('rsvp/' . $c->invite_id . '') . '"><i class="fa fa-link"></i></a>' : '<a class="settings" disabled title="Link already sent." data-toggle="tooltip" type="button" href="#"><i class="fa fa-link" style="color:gray !important;"></i></a>' ?>
                                            <a href="#" type="button" data-id="<?php echo $c->id; ?>"
                                                class="delete btn-delete-guest-modal" title="Delete" data-toggle="tooltip"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="fold d-none">
                                        <td colspan="7" style="background-color: lightgray;">
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
        <?php echo view('admin/partials/modals'); ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/accordion@3.0.2/src/accordion.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('public/assets/js/admin.js'); ?>"></script>

    <?php echo view('admin/partials/actions'); ?>
    <?php echo view('admin/partials/footer'); ?>
</body>

</html>