<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Doodz & Akiss Wedding</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('public/assets/img/favicon-32x32.png'); ?>?v=2" sizes="192x192"
        type="image/png">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
<div class="container-fluid py-5" id="story">
        <div class="container pt-5 pb-3">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Reception</h6>
                <h1 class="font-secondary display-4">Table Designation</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-md-12 col-xs-12 text-muted">
                    <div class="h-100 d-flex flex-column justify-content-center text-center bg-secondary p-4 ml-md-3"
                        style="border-radius:31px;">
                        <h1>Table #: 01</h1>
                        
                            <?php
                            // Check if each $companion is an object or associative array
                            if (!empty($data->main_invitee)) {
                                echo "<h3>" . htmlspecialchars($data->main_invitee) . "</h3>";
                    
                            }
                            // Check if companions is not empty and is an array
                            if (!empty($data->companions) && is_array($data->companions)) {
                                // Iterate over the companions array
                                foreach ($data->companions as $companion) {
                                    echo '<h3>' . htmlspecialchars($companion->name) . "</h3>";
                                }
                            } else {
                                echo "<p>No companions found.</p>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5" id="contact">
        <div class="container text-center py-5">
            <div class="section-title position-relative text-center">
                <h1 class="font-secondary display-3 text-white">Thank You</h1>
                <i class="far fa-heart text-white"></i>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                        class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- Footer End -->

</body>

</html>