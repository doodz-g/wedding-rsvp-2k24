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
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
</head>

<body>
    <?php echo view('admin/partials/nav'); ?>
    <div class="container-fluid">
        <div class="row <?php echo session()->get('usertype') === 'admin' ? 'd-none' : '' ?>"
            style="float: right;padding: 25px;">
            <input class="form-control" id="toggle-event" type="checkbox" <?php echo $data->qrSetting == 1 || session()->get('qrSetting') == 1 ? 'checked' : '' ?> data-toggle="toggle" data-off="QR" data-on="QR"
                data-onstyle="success" data-size="sm" data-offstyle="danger">
        </div>
        <div class="container">
            <div class="row charts-container">
                <div class="col-md-2 chart-wrapper">
                    <div id="chart"></div>
                    <div class="chart-label text-center">
                        <span id="total_guest_container" style="font-weight: 600;font-size: 12px;"><?php echo $data->totalGNow . ' of ' . $data->maxCap; ?>
                        <br>Max Capacity</span>
                    </div>
                </div>
                <div class="col-md-2 chart-wrapper">
                    <div id="chart2"></div>
                    <div class="chart-label text-center">
                        <span id="total_guest_will_attend_container" style="font-weight: 600;font-size: 12px;"><?php echo $data->totalGuestThatConfirm . ' of ' . $data->maxCap; ?>
                        <br>RSVP Confirmation Rate</span>
                    </div>
                </div>
                <div class="col-md-2 chart-wrapper">
                    <div id="chart3"></div>
                    <div class="chart-label text-center">
                        <span id="total_kids_container" style="font-weight: 600;font-size: 12px;"><?php echo $data->totalKids . ' of ' . $data->kidsCap; ?>
                        <br>Kids Count</span>
                    </div>
                </div>
                <div class="col-md-2 chart-wrapper">
                    <div id="chart4"></div>
                    <div class="chart-label text-center">
                        <span id="total_scanned_guest" style="font-weight: 600;font-size: 12px;"><?php echo $data->totalScannedGuest . ' of ' . $data->maxCap; ?>
                        <br>QR Guest Scanned</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <div class="table-wrapper" style="padding-bottom:70px;">
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
                                <li id="export-container"><a id="btn-sync" class="btn btn-secondary"><i class="fa fa-sync"></i>
                                        <span>Sync data to Export Table</span></a></li>
                                <li class="<?php echo session()->get('usertype') === 'admin' || $data->totalGNow  == 120 ? 'd-none' : '' ?>"><a
                                        href="#" class="btn btn-secondary" id="btn-add-guest" data-toggle="modal"
                                        data-target="#"><i class="material-icons">&#xE147;</i> <span>Add New
                                            User</span></a></li>
                                <li><a href="#" onClick="refreshTable();" class="btn btn-secondary" data-target="#"><i
                                            class="fa fa-spinner"></i>
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
                                <th>RSVP</th>
                                <th>Table #</th>
                                <th>Date Created</th>
                                <th class="<?php echo session()->get('usertype') == 'admin' ? 'd-none' : '' ?>">Action
                                </th>
                            </tr>
                        </thead>
                        <tbody id="users-tbody">
                            <?php
                            if (!empty($data->users)) {
                                foreach ($data->users as $key => $c) {
                                    ?>
                                    <tr class="<?php echo $c->qr_code_status == 1 ? 'bg-success' : '' ?> <?php echo $c->will_attend == 'No' ? 'bg-warn' : '' ?>"
                                        data-id="<?php echo $c->id; ?>">
                                        <td><button class="settings btn-expand btn btn-xs fc-red"><i
                                                    class="fa fa-expand"></button></td>
                                        <td><?php echo $c->invite_id ?></td>
                                        <td><?php echo $c->name ?></td>
                                        <td><?php echo ($c->will_attend === NULL) ? 'No Response yet' : (($c->will_attend == 'Yes') ? 'Confirmed Attendance' : 'Not Attending') ?>
                                        <td><?php echo ($c->table_number != NULL ? $c->table_number == 11 ? 'Kids' : ($c->table_number == 12 ? 'Sponsors A' : ($c->table_number == 13 ? 'Sponsors B': $c->table_number)) : 'N/A') ?>
                                        </td>
                                        <td><?php echo $c->date ?></td>
                                        </td>
                                        <td style="width:158px;"
                                            class="<?php echo session()->get('usertype') == 'admin' ? 'd-none' : '' ?>">
                                            <a href="#" type="button" data-status="<?php echo $c->will_attend;?>" data-id="<?php echo $c->id; ?>"
                                                data-name="<?php echo $c->name; ?>" class="settings btn-edit-guest-modal"
                                                title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>
                                            <?php echo $c->will_attend == 'Yes' ? '<a href="#" type="button" data-id="' . $c->id . '" data-name="' . $c->name . '" data-table="' . $c->table_number . '"
                                                class="settings btn-assign-guest-modal" title="Assign table slot"
                                                data-toggle="tooltip"><i class="fa fa-table"></i></a>': '<a href="#" type="button" class="settings" title="Cannot Assign" data-toggle="tooltip"><i style="color:gray !important;" class="fa fa-table"></i></a>'; ?>
                                            <?php echo $c->will_attend === NULL ? '<a class="invite-link settings" title="Copy Invite link" data-toggle="tooltip" type="button" href="' . base_url('rsvp/' . $c->invite_id . '') . '"><i class="fa fa-link"></i></a>' : '<a class="settings" disabled title="Link already sent." data-toggle="tooltip" type="button" href="#"><i class="fa fa-link" style="color:gray !important;"></i></a>' ?>

                                            <a href="#" type="button" data-name ="<?php echo $c->name;?>" data-id="<?php echo $c->id; ?>"
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
                    <div class="sort-text">
                        <label>Sort by </label>
                        <select id="sort" onchange="refreshTable()">
                            <option value="id">ID</option>
                            <option value="name">Name</option>
                            <option value="date">Date Created</option>
                            <option value="will_attend">RSVP</option>
                            <option value="table_number">Table Number</option>
                        </select>
                        <label>on</label>
                        <select id="order" onchange="refreshTable()">
                            <option value="DESC">Descending</option>
                            <option value="ASC">Ascending</option>
                        </select>
                        <label>order</label>
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
                                        data-id="<?= $data->pager->currentPage - 1 ?>">Previous</a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $data->pager->totalPages; $i++): ?>
                                <li class="page-item <?= $i == $data->pager->currentPage ? 'active' : '' ?>">
                                    <a class="page-link" data-id="<?= $i ?>" style="z-index:0 !important;"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($data->pager->currentPage < $data->pager->totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" style="z-index:0 !important;"
                                        data-id="<?= $data->pager->currentPage + 1 ?>">Next</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/accordion@3.0.2/src/accordion.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('public/assets/js/admin.js'); ?>"></script>
    <?php if (session()->getFlashdata('error')): ?>
            toastr.error('<?= session()->getFlashdata('error') ?>');
    <?php endif; ?>
    <?php echo view('admin/partials/actions'); ?>
    <?php echo view('admin/partials/footer'); ?>
</body>

</html>