<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('public/assets/img/favicon.ico'); ?>" sizes="192x192">
    <title>Guest Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap"
        rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/admin.css'); ?>" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center bg-black" style="padding:10px;">
                <h1 class="font-secondary mb-n2 text-white" style="font-size:63px;">Doodz <span
                        class="text-primary">&</span> Akiss</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 hide-on-mobile align-items-center d-flex mt-3" style="min-height:80vh;">
                <div class="bg-login"
                    style="width:100%;height:100%;border-radius:54%;filter: saturate(118%); box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                </div>
            </div>
            <div class="col-lg-6 align-items-center d-flex justify-content-center" style="min-height:80vh;">
                <div class="form-row text-center"
                    style="background-color:white;padding:34px;border:1px solid; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                    <form action="<?= base_url('login/authenticate') ?>" method="post">
                        <div class="mb-3">
                            <h3 class="font-secondary mb-n2">Countdown to our special day!</h3>
                        </div>
                        <div class="mb-3">
                            <div class="py-3 px-4 counter-container" id="counter"></div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" style="border: 1px solid;height:50px;"
                                name="username" id="username" required placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" style="border: 1px solid;height:50px;"
                                name="password" id="password" required placeholder="Password">
                        </div>

                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="6LcujTAUAAAAABASBG6OWNeUu5_wCywsx2TMCjTp">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-lg btn-primary" style="width:100%;">Access Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php echo view('admin/partials/footer'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/accordion@3.0.2/src/accordion.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="<?php echo base_url('public/assets/js/admin-counter.js'); ?>"></script>
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