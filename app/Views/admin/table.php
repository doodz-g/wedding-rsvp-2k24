<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
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
    </style>
</head>

<body>
    <?php echo view('admin/partials/nav'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">Kids</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 11) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 11) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">1</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 1) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 1) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">2</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 2) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 2) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">3</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 3) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 3) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">4</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 4) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 4) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">5</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 5) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 5) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">6</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 6) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 6) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">7</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 7) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 7) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span style="color:red;">8
                </h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 8) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 8) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">9</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 9) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 9) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 border-custom padding-custom margin-custom" style="padding:0;">
                <h3 style="background-color: black;color:white;" class="text-center">Table <span
                        style="color:red;">10</span></h3>
                <ul class="list-group" style="word-break: break-all;">
                    <?php
                    if (!empty($data->users)) {
                        foreach ($data->users as $c) {
                            if (isset($c->table_number) && $c->table_number == 10) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                    <?php
                    if (!empty($data->companions)) {
                        foreach ($data->companions as $c) {
                            if (isset($c->table_number) && $c->table_number == 10) {
                                echo '<li class="list-group-item">' . $c->name . '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('public/assets/js/admin.js'); ?>"></script>

    <?php echo view('admin/partials/footer'); ?>
</body>

</html>