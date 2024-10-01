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
            body {
                background-image: url('<?php echo base_url('public/assets/img/even.png'); ?>');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                margin: 0;
            }
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
            #countdown {
                font-family: 'Arial', sans-serif;
                color: #333;
                font-size: 16em;
                text-align: center;
                padding: 20px;
                border-radius: 10px;
                width: 200px;
                margin: 50px auto;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-lg-12 text-center" style="padding:10px;background-color:black;">
                    <h1 class="font-secondary mb-n2 text-white" style="font-size:63px;">Doodz <span
                            class="text-primary">&</span> Akiss</h1>
                </div>
            </div>
            <div class="row pt-6">
                <div class="col-md-12 col-lg-12 col-md-12 col-xs-12 pt-6" style="min-height:25vh;">
                    <h1>Oops.. don't be too excited. HAHAHA!!!!</h1>
                    <div id="countdown">5</div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <div class="clearfix"></div>
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
        </footer>
        <!-- Footer End -->
    </body>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        var countdownDuration = 5;
        var countdownFunction = setInterval(function () {
            document.getElementById("countdown").innerHTML = countdownDuration;
            countdownDuration--;
            if (countdownDuration < 0) {
                clearInterval(countdownFunction);
                window.location.href = "<?php echo base_url(); ?>";
            }
        }, 1000);
    </script>

    </html>