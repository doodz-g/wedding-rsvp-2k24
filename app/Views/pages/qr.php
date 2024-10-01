<!DOCTYPE html>
<lang="en">
    <head>
        <meta charset="utf-8">
        <title>Doodz & Akiss Wedding</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Favicon -->
        <link rel="icon" href="<?php echo base_url('public/assets/img/favicon.ico'); ?>" sizes="192x192">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap"
            rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <!-- Customized Bootstrap Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>" />
        <style>
            .sticky-footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #000000;
                text-align: center;
                padding: 10px;
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
                justify-content: center;
                align-items: center;
            }
            body{
                background-image: url('<?php echo base_url('public/assets/img/even.png'); ?>'); /* Replace with your image path */
                background-size: cover;    /* Ensures the image covers the entire body */
                background-position: center; /* Centers the image */
                background-repeat: no-repeat; /* Prevents the image from */
                height: 100vh;
                margin: 0;
            }
                
            
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-lg-12 text-center" style="padding:10px;background-color:black;">
                    <h1 class="font-secondary mb-n2 text-white" style="font-size:63px;">Doodz <span
                            class="text-primary">&</span> Akiss</h1>
                </div>
            </div> -->
            <div class="container justify-content-center">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-md-12 col-xs-12" style="min-height:25vh;">
                        <div class="section-title position-relative text-center" style="padding-top: 34px;">
                            <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Reception</h6>
                            <h1 class="font-secondary display-4">Table Designation</h1>
                            <i class="far fa-heart text-dark"></i>
                        </div>
                        <div class="h-100 d-flex flex-column justify-content-center text-center font-secondary bg-secondary p-4 ml-md-3"
                            style="border-radius:31px;padding-left:0 !important; padding-right:0 !Important;">
                            <?php
                            // Check if each $companion is an object or associative array
                            if (!empty($data->main_invitee)) {
                                echo "<h2 style='line-height:2;'>" . htmlspecialchars($data->main_invitee) .'<span style="color:darkgreen;">'.($data->table_number != NULL ? $data->table_number == 11 ? '( Table: Kids)' : ($data->table_number == 12 ? '( Table: Sponsors)' : '(Table: '.$data->table_number ).')': '(N/A)')."</span></h2>";

                            }
                            // Check if companions is not empty and is an array
                            if (!empty($data->companions) && is_array($data->companions)) {
                                // Iterate over the companions array
                                foreach ($data->companions as $companion) {
                                    echo "<h2 style='line-height:2;'>" . htmlspecialchars($companion->name) .'<span style="color:darkgreen;">'.($companion->table_number != NULL ? $companion->table_number == 11 ? '(Table: Kids)' : ($companion->table_number == 12 ? '(Table: Sponsors)' : '(Table: '.$data->table_number ).')' : '(N/A)')."</span></h2>";
                                }
                            } else {
                                echo "<p>No companions found.</p>";
                            }
                            ?>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-12 text-center" style="padding:10px;background-color:black;">
                    <h1 class="font-secondary mb-n2 text-white" style="font-size:63px;">Doodz <span
                            class="text-primary">&</span> Akiss</h1>
                </div>
            </div> -->
        </div>
        <!-- Footer Start -->
        <!-- <div class="clearfix"></div>
        <footer class="sticky-footer text-white">
            <div class="footer-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            December 10, 2024
                        </div>
                        <div class="col-md-4">
                            &copy; 2024 Doodz <span class="text-primary">&</span> Akiss Wedding
                        </div>
                        <div class="col-md-4">
                            All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </footer> -->
        <!-- Footer End -->
    </body>
    </html>