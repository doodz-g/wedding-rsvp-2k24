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
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/accordion@3.0.2/src/accordion.min.js"></script>
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/admin.css'); ?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container-fluid">
            <div class="container py-5">
                <div class="section-title position-relative text-center">
                    <h1 class="font-secondary display-3">Log In</h1>
                    <i class="fa fa-heart"></i>
                </div>
                <div class="row justify-content-center">
                    <div
                        class="h-100 d-flex flex-column justify-content-center bg-secondary p-4 ml-md-3 notification-container">
                        <div class="form-row text-center">
                            <form action="<?= base_url('login/authenticate') ?>" method="post">
                                <div class="form-row col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group col-lg-12"><label for="username">Username:</label></div>
                                        <div class="form-group col-lg-12"><input type="text" class="form-control"
                                                name="username" id="username" required></div>
                                    </div>
                                </div>
                                <div class="form-row col-lg-12">
                                    <div class="form-group">
                                        <div class="form-group col-lg-12"><label for="password">Password:</label></div>
                                        <div class="form-group col-lg-12"><input type="password" class="form-control"
                                                name="password" id="password" required></div>
                                    </div>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
    <footer class="sticky-footer" style="background-color:transparent; ">
        <div class="footer-content">
        <div class="container-fluid">
         <div class="row">
            <div class="col-md-4">
                December 10, 2024
            </div>
            <div class="col-md-4">
                &copy; 2024 Doodz & Akiss Wedding
            </div>
            <div class="col-md-4">
                All rights reserved.
            </div>
            </div>
        </div>     
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('public/assets/js/admin.js'); ?>"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        <?php if (session()->getFlashdata('error')): ?>
            toastr.error('<?= session()->getFlashdata('error') ?>');
        <?php endif; ?>
    </script>

</body>

</html>