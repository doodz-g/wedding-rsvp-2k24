<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('public/assets/img/favicon.ico'); ?>" sizes="192x192">
    <title>Table Management</title>
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
    <style>
        .border-custom {
            border: 1px solid black;
        }

        .padding-custom {
            padding: 5px;
        }

        .margin-custom {
            margin: 5px;
        }

        .list-custom {
            list-style: none;
            padding-left: 0;
        }
        summary::marker{
            color: white !important;
        }
    </style>
</head>

<body>
    <?php echo view('admin/partials/nav'); ?>
    <?php $table_1_slots = ($cap['maxCapAdult'] - count($data->table_1)); ?>
    <?php $table_2_slots = ($cap['maxCapAdult'] - count($data->table_2)); ?>
    <?php $table_3_slots = ($cap['maxCapAdult'] - count($data->table_3)); ?>
    <?php $table_4_slots = ($cap['maxCapAdult'] - count($data->table_4)); ?>
    <?php $table_5_slots = ($cap['maxCapAdult'] - count($data->table_5)); ?>
    <?php $table_6_slots = ($cap['maxCapAdult'] - count($data->table_6)); ?>
    <?php $table_7_slots = ($cap['maxCapAdult'] - count($data->table_7)); ?>
    <?php $table_8_slots = ($cap['maxCapAdult'] - count($data->table_8)); ?>
    <?php $table_9_slots = ($cap['maxCapAdult'] - count($data->table_9)); ?>
    <?php $table_10_slots = ($cap['maxCapAdult'] - count($data->table_10)); ?>
    <?php $table_11_slots = ($cap['maxCapKids'] - count($data->table_11)); ?>
    <?php $table_12_slots = ($cap['maxCapSponsorA'] - count($data->table_12)); ?>
    <?php $table_13_slots = ($cap['maxCapSponsorB'] - count($data->table_13)); ?>
    <div class="container" style="padding-bottom:5em;" id="table-container">
        <div class="container mt-4" >
            <div class="row">
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_1_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_1_slots == 0 ? '' : $table_1_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">1</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_1)) {
                                foreach ($data->table_1 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_2_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_2_slots == 0 ? '' : $table_2_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">2</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_2)) {
                                foreach ($data->table_2 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_3_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_3_slots == 0 ? '' : $table_3_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">3</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_3)) {
                                foreach ($data->table_3 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_4_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_4_slots == 0 ? '' : $table_4_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">4</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_4)) {
                                foreach ($data->table_4 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_5_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_5_slots == 0 ? '' : $table_5_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">5</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_5)) {
                                foreach ($data->table_5 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_6_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_6_slots == 0 ? '' : $table_6_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">6</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_6)) {
                                foreach ($data->table_6 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_7_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_7_slots == 0 ? '' : $table_7_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">7</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_7)) {
                                foreach ($data->table_7 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_8_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_8_slots == 0 ? '' : $table_8_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">8</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_8)) {
                                foreach ($data->table_8 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_9_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_9_slots == 0 ? '' : $table_9_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">9</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_9)) {
                                foreach ($data->table_9 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_10_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_10_slots == 0 ? '' : $table_10_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">10</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_10)) {
                                foreach ($data->table_10 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_11_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_11_slots == 0 ? '' : $table_11_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">Kids</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_11)) {
                                foreach ($data->table_11 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_12_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_12_slots == 0 ? '' : $table_12_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">Sponsors A</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_12)) {
                                foreach ($data->table_12 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
                <div class="col-lg-3">
                    <details>
                        <summary>
                            <?php echo $table_13_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>' . ($table_13_slots == 0 ? '' : $table_13_slots) . ' slots</strong></span>'; ?>
                            <h3 style="background-color: black;color:white;" class="text-center">Table <span
                                    style="color:red;">Sponsors B</span></h3>
                        </summary>
                        <ul class="list-group" style="word-break: break-all;">
                            <?php
                            if (!empty($data->table_13)) {
                                foreach ($data->table_13 as $c) {
                                    echo '<li class="list-group-item">' . $c->name . '</li>';
                                }
                            } else {
                                echo '<li class="list-group-item">Table Empty</li>';
                            }
                            ?>
                        </ul>
                    </details>
                </div>
            </div>
        </div>
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
        <script>
              function refreshTable(){
                    $.ajax({
                        url: '<?php echo site_url('admin/table-refresh') ?>',
                        type: 'GET',
                        success: function (response) {
                            console.log(response);
                            var html = '';
                            var table_1_slots = response.maxCapAdult - response.table_1.length; 
                            var table_2_slots = response.maxCapAdult - response.table_2.length; 
                            var table_3_slots = response.maxCapAdult - response.table_3.length; 
                            var table_4_slots = response.maxCapAdult - response.table_4.length; 
                            var table_5_slots = response.maxCapAdult - response.table_5.length; 
                            var table_6_slots = response.maxCapAdult - response.table_6.length; 
                            var table_7_slots = response.maxCapAdult - response.table_7.length; 
                            var table_8_slots = response.maxCapAdult - response.table_8.length; 
                            var table_9_slots = response.maxCapAdult - response.table_9.length; 
                            var table_10_slots = response.maxCapAdult - response.table_10.length; 
                            var table_11_slots = response.maxCapKids - response.table_11.length; 
                            var table_12_slots = response.maxCapSponsorA - response.table_12.length; 
                            var table_13_slots = response.maxCapSponsorB - response.table_13.length; 
                            
                            html += '<div class="container mt-4" >';
                                 html+='<div class="row">';
                                     html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_1_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_1_slots == 0 ? '' : table_1_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">1</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            if (response.table_1.length > 0) {
                                                $.each(response.table_1, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                     html +='</ul></details></div>';

                                     html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_2_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_2_slots == 0 ? '' : table_2_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">2</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_2.length);
                                            if (response.table_2.length > 0) {
                                                $.each(response.table_2, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';

                                    html +='<div class="col-lg-3"><details><summary>';
                                    html += (table_3_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_3_slots == 0 ? '' : table_3_slots)+' slots</strong></span>');
                                    html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">3</span></h3></summary>';
                                    html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_3.length);
                                            if (response.table_3.length > 0) {
                                                $.each(response.table_3, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';
                                    
                                    html +='<div class="col-lg-3"><details><summary>';
                                    html += (table_4_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_4_slots == 0 ? '' : table_4_slots)+' slots</strong></span>');
                                    html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">4</span></h3></summary>';
                                    html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_4.length);
                                            if (response.table_4.length > 0) {
                                                $.each(response.table_4, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';
                                    
                                    
                                    html+='</div>';
                                html+='<div class="row">';
                                    html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_5_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_5_slots == 0 ? '' : table_5_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">5</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            if (response.table_5.length > 0) {
                                                $.each(response.table_5, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                     html +='</ul></details></div>';

                                     html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_6_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_6_slots == 0 ? '' : table_6_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">6</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_6.length);
                                            if (response.table_6.length > 0) {
                                                $.each(response.table_6, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';

                                    html +='<div class="col-lg-3"><details><summary>';
                                    html += (table_7_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_7_slots == 0 ? '' : table_7_slots)+' slots</strong></span>');
                                    html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">7</span></h3></summary>';
                                    html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_7.length);
                                            if (response.table_7.length > 0) {
                                                $.each(response.table_7, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';
                                    
                                    html +='<div class="col-lg-3"><details><summary>';
                                    html += (table_8_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_8_slots == 0 ? '' : table_8_slots)+' slots</strong></span>');
                                    html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">8</span></h3></summary>';
                                    html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_8.length);
                                            if (response.table_8.length > 0) {
                                                $.each(response.table_8, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';
                                    html+='</div>';
                                    html+='<div class="row">';
                                    html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_9_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_9_slots == 0 ? '' : table_9_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">9</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            if (response.table_9.length > 0) {
                                                $.each(response.table_9, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                     html +='</ul></details></div>';

                                     html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_10_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_10_slots == 0 ? '' : table_10_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">10</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_10.length);
                                            if (response.table_10.length > 0) {
                                                $.each(response.table_10, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';

        
                                    html+='</div>';
                                    html+='<div class="row">';
                                    html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_11_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_11_slots == 0 ? '' : table_11_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">Kids</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            if (response.table_11.length > 0) {
                                                $.each(response.table_11, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                     html +='</ul></details></div>';

                                     html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_12_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_12_slots == 0 ? '' : table_12_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">Sponsors A</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_12.length);
                                            if (response.table_12.length > 0) {
                                                $.each(response.table_12, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';
                                    html +='<div class="col-lg-3"><details><summary>';
                                     html += (table_13_slots == 0 ? '<span class="badge badge-danger"><strong>Full</strong></span>' : '<span class="badge badge-success"><strong>'+(table_13_slots == 0 ? '' : table_13_slots)+' slots</strong></span>');
                                     html +='<h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">Sponsors B</span></h3></summary>';
                                     html += '<ul class="list-group" style="word-break: break-all;">';
                                            console.log('length'+response.table_13.length);
                                            if (response.table_13.length > 0) {
                                                $.each(response.table_13, function (index, item) {
                                                    html += '<li class="list-group-item">' + item.name + '</li>';
                                                });
                                            } else {
                                                html += '<li class="list-group-item">Table Empty</li>';
                                            }
                                    html +='</ul></details></div>';
                                    html+='</div>';
                                html+= '</div>';   



                            $("#table-container").html(html);
                        },
                        error: function (xhr, status, error) {
                            console.error('Error in second request:', error);
                        }
                    });
             }
       
         // Initialize Pusher
         var pusher = new Pusher('43c7f87c078e85dc3242', {
            cluster: 'ap3',
            forceTLS: true
        });

        // Subscribe to a channel
        var channel = pusher.subscribe('table-channel');

        // Bind to an event
        channel.bind('table-updated', function (data) {

            console.log('Received data:', data);
            // You can update the UI or show a notification based on the data received
            toastr.success(data.message);
            refreshTable();
        });

        </script>
        <?php echo view('admin/partials/footer'); ?>
</body>

</html>