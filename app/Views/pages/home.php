<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Doodz & Akiss Wedding</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/lib/owlcarousel/assets/owl.carousel.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/lib/lightbox/css/lightbox.min.css'); ?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
        <a href="#home" class="navbar-brand d-block d-lg-none">
            <h1 class="font-secondary text-white mb-n2">Doodz <span class="text-primary emerald-green">&</span> Akiss</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <!-- <a href="#about" class="nav-item nav-link">About</a> -->
                <a href="#story" class="nav-item nav-link">Story</a>
                <a href="#entourage" id="entourage-link" class="nav-item nav-link">Entourage</a>
              
            </div>
            <a href="#home" class="navbar-brand mx-5 d-none d-lg-block">
                <h1 class="font-secondary text-white mb-n2">Doodz <span class="text-primary">&</span> Akiss</h1>
            </a>
            <div class="navbar-nav mr-auto py-0">
                <a href="#gallery" class="nav-item nav-link">Gallery</a>
                <!-- <a href="#family" class="nav-item nav-link">Family</a> -->
                <a href="#event" class="nav-item nav-link">Event</a>
                <a href="#rsvp" class="nav-item nav-link">RSVP</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <audio id="bgmusic" controls loop>
        <source src=" <?php echo base_url('assets/audio/music.mp4'); ?>" type="audio/mp4">
      Your browser does not support the audio element.
    </audio>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-153" src="<?php echo base_url('assets/img/carousel-2.JPG'); ?>" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="animate__animated animate__wobble display-1 font-secondary text-white mt-n3 mb-md-4">Doodz & Akiss</h1>
                            <div class="animate__animated animate__bounceInLeft d-inline-block border-top border-bottom border-light py-3 px-4">
                                <h3 class="text-uppercase font-weight-normal text-white m-0" style="letter-spacing: 2px;">December 10 2024</h3>
                            </div>
                            <div class="animate__animated animate__slideInUp">
                                <button type="button" class="btn-play mx-auto emerald-border-left" onclick="playmusic()" alt="Turn on the music">
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-153" src="<?php echo base_url('assets/img/carousel-1.JPG'); ?>" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="animate__animated animate__bounceIn animate__delay-1s display-1 font-secondary text-white mt-n3 mb-md-4">Doodz & Akiss</h1>
                            <div class="animate__animated animate__bounceIn animate__delay-1s border-top border-bottom border-light py-3 px-4">
                                <h3 class="text-uppercase animate__animated animate__bounceIn animate__delay-1s font-weight-normal text-white m-0" style="letter-spacing: 2px;">December 10 2024</h3>
                            </div>
                            <div class="animate__animated animate__bounceIn animate__delay-1s">
                                <button type="button" class="btn-play mx-auto emerald-border-left" onclick="playmusic()" alt="Turn on the music">
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-153" src="<?php echo base_url('assets/img/carousel-3.JPG'); ?>" style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 font-secondary text-white mt-n3 mb-md-4">Doodz & Akiss</h1>
                            <div class="d-inline-block border-top border-bottom border-light py-3 px-4">
                                <h3 class="text-uppercase font-weight-normal text-white m-0" style="letter-spacing: 2px;">We're getting married</h3>
                            </div>
                            <button type="button" class="btn-play mx-auto emerald-border-left" onclick="playmusic()" alt="Turn on the music">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev justify-content-start" style="visibility: hidden;" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary bg-emerald-green border-color-emerald-green px-0" style="width: 68px; height: 68px;">
                    <span class="carousel-control-prev-icon mt-3"></span>
                </div>
            </a>
            <a class="carousel-control-next justify-content-end" style="visibility: hidden;" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary bg-emerald-green border-color-emerald-green px-0" style="width: 68px; height: 68px;">
                    <span class="carousel-control-next-icon mt-3"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
   
    <!-- About Start -->
    <!-- <div class="container-fluid py-5" id="about">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">About</h6>
                <h1 class="font-secondary display-4">Groom & Bride</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0">
                <div class="col-md-6 p-0 text-center text-md-right">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-5">
                        <h3 class="mb-3">The Groom</h3>
                        <p>Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                        <h3 class="font-secondary font-weight-normal text-muted mb-3"><i class="fa fa-male text-primary pr-3"></i>Jack</h3>
                        <div class="position-relative">
                            <a class="btn btn-outline-primary btn-square mr-1" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square mr-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square mr-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="img/about-1.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="row m-0">
                <div class="col-md-6 p-0" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="img/about-2.jpg" style="object-fit: cover;">
                </div>
                <div class="col-md-6 p-0 text-center text-md-left">
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-5">
                        <h3 class="mb-3">The Bride</h3>
                        <p>Lorem elitr magna stet rebum dolores sed. Est stet labore est lorem lorem at amet sea, eos tempor rebum, labore amet ipsum sea lorem, stet rebum eirmod amet. Kasd clita kasd stet amet est dolor elitr.</p>
                        <h3 class="font-secondary font-weight-normal text-muted mb-3"><i class="fa fa-female text-primary pr-3"></i>Rose</h3>
                        <div class="position-relative">
                            <a class="btn btn-outline-primary btn-square mr-1" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square mr-1" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square mr-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- About End -->

    <!-- Story Start -->
    <div class="container-fluid py-5" id="story">
        <div class="container pt-5 pb-3">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Story</h6>
                <h1 class="font-secondary display-4">Our Love Story</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-md-12 col-xs-12 text-muted">
                        <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4 ml-md-3">
                            <p class="m-0">Three years ago, amidst the vast expanse of the internet, a chance encounter brought a boy and a girl together. What began as a simple exchange of words in a chatroom or perhaps through a shared interest on social media, quickly grew into a meaningful connection. They discovered common interests, shared dreams, and a mutual sense of humor that bridged the miles between them.



                                <br><br>In the beginning, their conversations were filled with the excitement of getting to know each other. They would spend hours chatting, sharing stories about their lives, their aspirations, and their favorite memories. As the days turned into weeks and the weeks into months, their bond deepened. They laughed together at silly jokes, supported each other through tough times, and celebrated each other's successes. Despite the physical distance, they felt an emotional closeness that was undeniable.
                                
                                
                                
                                <br><br>As their relationship evolved, they made efforts to bridge the gap between them. They started video calling, allowing them to see each other's faces and hear each other's voices. These calls became the highlights of their days, filled with laughter, heartfelt conversations, and moments of silence that spoke volumes about their comfort with each other. They exchanged gifts and letters, small tokens of their affection that made the distance seem a little less daunting.
                                
                                
                                
                                <br><br>Their first in-person meeting was a momentous occasion. Nervous excitement buzzed in the air as they finally embraced, feeling the warmth and reality of each other's presence. That meeting was the first of many, and with each visit, their love grew stronger. They explored new places, created new memories, and found joy in simply being together. Their relationship, once confined to the virtual realm, had now blossomed into a beautiful, tangible reality.
                                
                                
                                
                                <br><br> Over the years, they navigated the challenges that came their way with grace and resilience. They learned to communicate openly and honestly, to trust each other implicitly, and to cherish the unique connection they shared. They realized that their love was built on a solid foundation of friendship, respect, and mutual admiration. Each day they spent together, whether physically or virtually, was a testament to their commitment to one another.
                                
                                
                                
                                <br><br>Now, as they approach their third anniversary, they are ready to embark on a new chapter in their lives. On December 10, 2024, they will stand before their family and friends to exchange vows and declare their love and commitment. Their wedding day will be a celebration of their journey, a testament to the love that has grown and flourished over the years. It will be a day filled with joy, laughter, and the promise of a beautiful future together.
                                
                                Their story is a beautiful reminder that love knows no boundaries. It can be found in the most unexpected places and can thrive despite the challenges that come its way. Their journey from online strangers to soulmates is a testament to the power of love, perseverance, and the belief that true love will always find a way.
                                
                                
                                
                                <br><br>As they look forward to their wedding day and the life that lies ahead, they do so with hearts full of gratitude and excitement. They are ready to face the future hand in hand, knowing that together, they can overcome anything. Their love story is just beginning, and they are eager to see what the future holds for them as they embark on this new adventure as husband and wife.</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Story End -->

    <!-- Entourage Start -->
    <div class="container-fluid bg-entourage py-5" id="entourage">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Entourage</h6>
                <h1 class="font-secondary display-4">Our Gorgeous Entourage</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary"><h3>Principal Sponsors</h3></div>
                <div class="col-md-6 col-sm-6 col-xs-6 p-0 text-md-right p-4" id="m-prin">
                    <p>Edmond Cabading</p>
                    <p>Lino Dela Cruz</p>
                    <p>Arman Almirez</p>
                    <p>Eduardo Leonor</p>
                    <p>Rene</p>
                    <p>Dhon Conwi</p>
                    <p>Allan Dela Rosa</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 p-0 text-md-left p-4" id="f-prin">
                    <p>Marilou Kanda</p>
                    <p>Tita Vernz</p>
                    <p>Caroline Ofilanda</p>
                    <p>Erlyn Conwi</p>
                    <p>Lyn A. Nishiya</p>
                    <p>Lucette Dela Rosa</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary pb-3"><h3>Secondary Sponsors</h3></div>
                <div class="col-md-12 text-center font-secondary"><h4>Candles</h4></div>
                <div class="col-md-6 p-0 text-center text-md-right p-4">
                    <p>Carlo Bondoc</p>
                </div>
                <div class="col-md-6 p-0 text-center text-md-left p-4">
                    <p>Joy Bondoc</p>
                </div>
                <div class="col-md-12 text-center font-secondary"><h4>Veil</h4></div>
                <div class="col-md-6 p-0 text-center text-md-right p-4">
                    <p>Frederick De Guzman</p>
                </div>
                <div class="col-md-6 p-0 text-center text-md-left p-4">
                    <p>Beverly de Guzman</p>
                </div>
                <div class="col-md-12 text-center font-secondary"><h4>Cord</h4></div>
                <div class="col-md-6 p-0 text-center text-md-right p-4">
                    <p>Frank Oliver Monteverde</p>
                </div>
                <div class="col-md-6 p-0 text-center text-md-left p-4">
                    <p>Richelle Monteverde</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary"><h3>Groomsmen  &  Bridesmaid</h3></div>
                <div class="col-md-6 p-0 text-center text-md-right p-4">
                    <p>Rachelle-Ann Ducay</p>
                    <p>Royward Castillo</p>
                    <p>Jayson Batac</p>
                    <p>Jerico Russell Mungcal</p>
                </div>
                <div class="col-md-6 p-0 text-center text-md-left p-4">
                    <p>Mary Jane Cambaya</p>
                    <p>Daphne Ochoa</p>
                    <p>Cherry Mae Cabrera</p>
                    <p>Dolly Jill Carmona</p>
                    <p>Richelda Belza</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Entourage End -->


    <!-- Gallery Start -->
    <div class="container-fluid" id="gallery" style="padding: 120px 0; margin: 90px 0;padding-bottom: 0; margin-bottom: 0;">
        <div class="section-title position-relative text-center" style="margin-bottom: 120px;">
            <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Gallery</h6>
            <h1 class="font-secondary display-4">Our Photo Gallery</h1>
            <i class="far fa-heart"></i>
        </div>
        <div class="owl-carousel gallery-carousel">
            <div class="gallery-item">
                <img class="img-fluid w-100" src="<?php echo base_url('assets/img/gallery-new-1.JPG'); ?>" alt="">
                <a href="<?php echo base_url('assets/img/gallery-new-1.JPG'); ?>" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="<?php echo base_url('assets/img/gallery-new-2.JPG'); ?>" alt="">
                <a href="<?php echo base_url('assets/img/gallery-new-2.JPG'); ?>" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="<?php echo base_url('assets/img/gallery-new-3.JPG'); ?>" alt="">
                <a href="i<?php echo base_url('assets/img/gallery-new-3.JPG'); ?>" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="<?php echo base_url('assets/img/gallery-new-4.JPG'); ?>" alt="">
                <a href="<?php echo base_url('assets/img/gallery-new-4.JPG'); ?>" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="<?php echo base_url('assets/img/gallery-new-5.JPG'); ?>" alt="">
                <a href="<?php echo base_url('assets/img/gallery-new-5.JPG'); ?>" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100" src="<?php echo base_url('assets/img/gallery-new-5.JPG'); ?>" alt="">
                <a href="<?php echo base_url('assets/img/gallery-new-5.JPG'); ?>" data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Gallery End -->
   

    <!-- Event Start -->
    <div class="container-fluid bg-entourage py-5" id="event">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Event</h6>
                <h1 class="font-secondary display-4">Our Wedding Event</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h5 class="font-weight-normal text-muted mb-3 pb-3">In a world full of fleeting moments, today we celebrate a love that will last a lifetime. Here's to the beginning of forever, where every day will be filled with love, laughter, and endless joy.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 border-right border-primary">
                    <div class="text-center text-md-right mr-md-3 mb-4 mb-md-0">
                        <iframe width="100%" height="100%" style="border:0" loading="lazy" allowfullscreen src="<?php echo $data->google_map_key?>"git ></iframe>
                        <h4 class="mb-3">The Wedding Venue</h4>
                        <p class="mb-2">St Joseph The Worker Parish</p>
                        <p class="mb-0">4:00 PM - 5:00PM</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-left ml-md-3">
                        <iframe width="100%" height="100%" style="border:0" loading="lazy" allowfullscreen src="<?php echo $data->google_map_key?>"></iframe>
                        <h4 class="mb-3">The Reception</h4>
                        <p class="mb-2">El Circulo Events Place</p>
                        <p class="mb-0">6:00 PM - 10:00 PM</p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event End -->


    <!-- Friends & Family Start -->
    <!-- <div class="container-fluid py-5" id="family">
        <div class="container pt-5 pb-3">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Friends & Family</h6>
                <h1 class="font-secondary display-4">Groomsmen & Bridesmaid</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-outline-primary font-weight-bold m-1 py-2 px-4" data-filter=".first">Groomsmen</li>
                        <li class="btn btn-outline-primary font-weight-bold m-1 py-2 px-4" data-filter=".second">Bridesmaid</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative mb-2">
                        <img class="img-fluid w-100" src="img/groomsmen-1.jpg" alt="">
                        <div class="bg-secondary text-center p-4">
                            <h4 class="mb-3">Full Name</h4>
                            <p class="text-uppercase">Best Friend</p>
                            <div class="d-inline-block">
                                <a class="mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative mb-2">
                        <img class="img-fluid w-100" src="img/bridesmaid-1.jpg" alt="">
                        <div class="bg-secondary text-center p-4">
                            <h4 class="mb-3">Full Name</h4>
                            <p class="text-uppercase">Best Friend</p>
                            <div class="d-inline-block">
                                <a class="mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative mb-2">
                        <img class="img-fluid w-100" src="img/groomsmen-2.jpg" alt="">
                        <div class="bg-secondary text-center p-4">
                            <h4 class="mb-3">Full Name</h4>
                            <p class="text-uppercase">Best Friend</p>
                            <div class="d-inline-block">
                                <a class="mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative mb-2">
                        <img class="img-fluid w-100" src="img/bridesmaid-2.jpg" alt="">
                        <div class="bg-secondary text-center p-4">
                            <h4 class="mb-3">Full Name</h4>
                            <p class="text-uppercase">Best Friend</p>
                            <div class="d-inline-block">
                                <a class="mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative mb-2">
                        <img class="img-fluid w-100" src="img/groomsmen-3.jpg" alt="">
                        <div class="bg-secondary text-center p-4">
                            <h4 class="mb-3">Full Name</h4>
                            <p class="text-uppercase">Best Friend</p>
                            <div class="d-inline-block">
                                <a class="mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative mb-2">
                        <img class="img-fluid w-100" src="img/bridesmaid-3.jpg" alt="">
                        <div class="bg-secondary text-center p-4">
                            <h4 class="mb-3">Full Name</h4>
                            <p class="text-uppercase">Best Friend</p>
                            <div class="d-inline-block">
                                <a class="mx-2" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="mx-2" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Friends & Family End -->


    <!-- RSVP Start -->
    <div class="container-fluid py-5" id="rsvp" style="<?php  echo empty($data->main_invitee)  ? 'display:none;':'display:block;' ?>" >
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">RSVP</h6>
                <h1 class="font-secondary display-4">Join Our Wedding</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center">
                            <div class="text-center">
                                <?php 
                               // Check if each $companion is an object or associative array
                                if(!empty($data->main_invitee)){
                                    echo "<p>Dear <b>" . htmlspecialchars($data->main_invitee). ",</b></p></br>"; 
                                    echo $data->companions_count >= 0 && !empty($data->companions_count)? '<p>Please confirm your attendance and list the accompanying family members:' : 'Please confirm your attendance'.'</p>';
                                }
                                // Check if companions is not empty and is an array
                                if (!empty($data->companions) && is_array($data->companions)) {
                                    // Iterate over the companions array
                                    foreach ($data->companions as $companion) {
                                      echo '<p><b>'.htmlspecialchars($companion->name)."</b></p>";
                                    }
                                    echo "</br>";
                                    echo "</br>";
                                    echo "<h3>Thank you!</h3>";
                                } else {
                                    echo "<p>No companions found.</p>";
                                }
                                ?>
                            </div>
                            <div style="margin-top:100px;">
                                <button class="btn btn-primary font-weight-bold py-3 px-5" id="btnConfirmAttendance" type="button">Confirm Attendance</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- RSVP End -->

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">   
            <div id="overlay">
                <div class="cv-spinner"><span class="spinner"></span></div>
            </div>    
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">RSVP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <input type="hidden" value="
                <?php 
                    if(!empty($data->invite_id)) {
                        echo $data->invite_id;
                    } 
                    ?>" name="invite_id" id="invite_id">
                <?php 
            // Check if each $companion is an object or associative array
            if(!empty($data->main_invitee)){
                echo "Dear <b>" . htmlspecialchars($data->main_invitee). "</b>,<br><br>"; 
                echo $data->companions_count >= 0 && !empty($data->companions_count)? 'Please confirm your attendance and list the accompanying family members:<br><br>' : 'Please confirm your attendance<br><br>';
            }
            // Check if companions is not empty and is an array
            if (!empty($data->companions) && is_array($data->companions)) {
                // Iterate over the companions array
                foreach ($data->companions as $companion) {
                    // Check if each $companion is an object or associative array
                    if (is_object($companion)) {
                        echo '<b>'.htmlspecialchars($companion->name)."</b></br>";
                    } elseif (is_array($companion)) {
                        echo "Name: " . htmlspecialchars($companion['name']) . "<br>";
                    } else {
                        // For simple values
                        echo "Name: " . htmlspecialchars($companion) . "<br>";
                    }
                }
                echo "</br> Thank you!";
            } else {
                echo "No companions found.";
            }
            ?>

            </div>
            <div class="modal-footer">
                <?php if(!empty($data->companions_count) || !empty($data->invite_id)){?> 
                <button type="button" class="btn btn-primary" id="rsvp_confirm_yes">Ofcourse, <?php 
                    echo $data->companions_count >= 0 && !empty($data->companions_count)? 'We':'I'; ?> will attend</button>
                <button type="button" class="btn btn-primary btn-danger" id="rsvp_confirm_no">Sorry, <?php 
                    echo $data->companions_count >= 0 && !empty($data->companions_count)? 'We':'I'; ?> will not be able to attend</button>
                <?php }?> 
            </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5" id="contact" style="margin-top: 90px;">
        <div class="container text-center py-5">
            <div class="section-title position-relative text-center">
                <h1 class="font-secondary display-3 text-white">Thank You</h1>
                <i class="far fa-heart text-white"></i>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="d-flex justify-content-center py-2">
                <p class="text-white" href="#">atanacio@gmail.com</p>
                <span class="px-3">|</span>
                <p class="text-white" href="#">911</p>
            </div>
            <p class="m-0">&copy; <a class="text-primary" href="#">Google.com</a>. Powered by <a class="text-primary" href="#">Alaxan</a>
            </p>
        </div>
    </div>
    
    <!-- Footer End -->
   
    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-outline-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url('assets/lib/easing/easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/lib/isotope/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/lib/lightbox/js/lightbox.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('assets/lib/lightbox/js/lightbox.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</body>

</html>