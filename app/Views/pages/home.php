<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Doodz & Akiss Wedding</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('public/assets/img/favicon.ico'); ?>" sizes="192x192"
        type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@400;600&display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet"
        href="<?php echo base_url('public/assets/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/assets/lib/lightbox/css/lightbox.min.css'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css'); ?>" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
        <a href="#home" class="navbar-brand d-block d-lg-none">
            <h1 class="font-secondary text-white mb-n2">Doodz <span class="text-primary emerald-green">&</span> Akiss
            </h1>
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
                <a href="#faqs" class="nav-item nav-link">Faqs</a>
                <?php if (isset($data->show_modal) && $data->show_modal == true) { ?>
                    <a href="#rsvp" id="rsvp-nav" class="nav-item nav-link <?php
                    echo empty($data->invite_id) ? 'd-none' : '' ?> ">RSVP</a>
                <?php } else { ?>
                    <a href="#rsvp-confirm" id="rsvp-nav" class="nav-item nav-link <?php
                    echo empty($data->invite_id) ? 'd-none' : '' ?> ">RSVP</a>

                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Carousel Start -->
    <div class="container-fluid p-0" id="home">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner" id="carousel-container">
                <div class="carousel-item position-relative active" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-153"
                        src="<?php echo strtolower(base_url('public/assets/img/carousel-2.JPG')); ?>" loading="lazy"
                        style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1
                                class="animate__animated animate__wobble display-1 font-secondary text-white mt-n3 mb-md-4">
                                Doodz & Akiss</h1>
                            <div
                                class="animate__animated animate__bounceInLeft d-inline-block border-top border-bottom border-light py-3 px-4">
                                <h3 class="text-uppercase font-weight-normal text-white m-0"
                                    style="letter-spacing: 2px;">December 10 2024</h3>
                            </div>
                            <div class="animate__animated animate__slideInUp">
                                <button type="button" class="btn-play mx-auto emerald-border-left btn-play-music"
                                    alt="Turn on the music">
                                    <span></span>
                                </button>
                                <button type="button"
                                    class="btn-pause mx-auto emerald-border-left btn-play-music d-none"
                                    alt="Turn on the music">
                                    <i class="fas fa-pause"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-153"
                        src="<?php echo strtolower(base_url('public/assets/img/carousel-1.JPG')); ?>" loading="lazy"
                        style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1
                                class="animate__animated animate__bounceIn animate__delay-1s display-1 font-secondary text-white mt-n3 mb-md-4">
                                Doodz & Akiss</h1>
                            <div
                                class="animate__animated animate__bounceIn animate__delay-1s border-top border-bottom border-light">
                                <div class="py-3 px-4 counter-container" id="counter"></div>
                            </div>
                            <div class="animate__animated animate__slideInUp">
                                <button type="button" class="btn-play mx-auto emerald-border-left btn-play-music"
                                    alt="Turn on the music">
                                    <span></span>
                                </button>
                                <button type="button"
                                    class="btn-pause mx-auto emerald-border-left btn-play-music d-none"
                                    alt="Turn on the music">
                                    <i class="fas fa-pause"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item position-relative" style="height: 100vh; min-height: 400px;">
                    <img class="position-absolute w-100 h-153"
                        src="<?php echo strtolower(base_url('public/assets/img/carousel-3.JPG')); ?>" loading="lazy"
                        style="object-fit: cover;">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 font-secondary text-white mt-n3 mb-md-4">Doodz & Akiss</h1>
                            <div class="d-inline-block border-top border-bottom border-light py-3 px-4">
                                <h3 class="text-uppercase font-weight-normal text-white m-0"
                                    style="letter-spacing: 2px;">We're getting married</h3>
                            </div>
                            <div class="animate__animated animate__slideInUp">
                                <button type="button" class="btn-play mx-auto emerald-border-left btn-play-music"
                                    alt="Turn on the music">
                                    <span></span>
                                </button>
                                <button type="button"
                                    class="btn-pause mx-auto emerald-border-left btn-play-music d-none"
                                    alt="Turn on the music">
                                    <i class="fas fa-pause"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev justify-content-start" style="visibility:hidden;" href="#header-carousel"
                data-slide="prev">
                <div class="btn btn-primary bg-emerald-green border-color-emerald-green px-0"
                    style="width: 68px; height: 68px;">
                    <span class="carousel-control-prev-icon mt-3"></span>
                </div>
            </a>
            <a class="carousel-control-next justify-content-end" style="visibility:hidden;" href="#header-carousel"
                data-slide="next">
                <div class="btn btn-primary bg-emerald-green border-color-emerald-green px-0"
                    style="width: 68px; height: 68px;">
                    <span class="carousel-control-next-icon mt-3"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
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
                    <div class="h-100 d-flex flex-column justify-content-center bg-secondary p-4 ml-md-3"
                        style="border-radius:31px;">
                        <p class="m-0">Three years ago, amidst the vast expanse of the internet, a chance encounter
                            brought a boy and a girl together. What began as a simple exchange of words in a chatroom or
                            perhaps through a shared interest on social media, quickly grew into a meaningful
                            connection. They discovered common interests, shared dreams, and a mutual sense of humor
                            that bridged the miles between them.



                            <br><br>In the beginning, their conversations were filled with the excitement of getting to
                            know each other. They would spend hours chatting, sharing stories about their lives, their
                            aspirations, and their favorite memories. As the days turned into weeks and the weeks into
                            months, their bond deepened. They laughed together at silly jokes, supported each other
                            through tough times, and celebrated each other's successes. Despite the physical distance,
                            they felt an emotional closeness that was undeniable.



                            <br><br>As their relationship evolved, they made efforts to bridge the gap between them.
                            They started video calling, allowing them to see each other's faces and hear each other's
                            voices. These calls became the highlights of their days, filled with laughter, heartfelt
                            conversations, and moments of silence that spoke volumes about their comfort with each
                            other. They exchanged gifts and letters, small tokens of their affection that made the
                            distance seem a little less daunting.



                            <br><br>Their first in-person meeting was a momentous occasion. Nervous excitement buzzed in
                            the air as they finally embraced, feeling the warmth and reality of each other's presence.
                            That meeting was the first of many, and with each visit, their love grew stronger. They
                            explored new places, created new memories, and found joy in simply being together. Their
                            relationship, once confined to the virtual realm, had now blossomed into a beautiful,
                            tangible reality.



                            <br><br> Over the years, they navigated the challenges that came their way with grace and
                            resilience. They learned to communicate openly and honestly, to trust each other implicitly,
                            and to cherish the unique connection they shared. They realized that their love was built on
                            a solid foundation of friendship, respect, and mutual admiration. Each day they spent
                            together, whether physically or virtually, was a testament to their commitment to one
                            another.



                            <br><br>Now, as they approach their third anniversary, they are ready to embark on a new
                            chapter in their lives. On December 10, 2024, they will stand before their family and
                            friends to exchange vows and declare their love and commitment. Their wedding day will be a
                            celebration of their journey, a testament to the love that has grown and flourished over the
                            years. It will be a day filled with joy, laughter, and the promise of a beautiful future
                            together.

                            Their story is a beautiful reminder that love knows no boundaries. It can be found in the
                            most unexpected places and can thrive despite the challenges that come its way. Their
                            journey from online strangers to soulmates is a testament to the power of love,
                            perseverance, and the belief that true love will always find a way.



                            <br><br>As they look forward to their wedding day and the life that lies ahead, they do so
                            with hearts full of gratitude and excitement. They are ready to face the future hand in
                            hand, knowing that together, they can overcome anything. Their love story is just beginning,
                            and they are eager to see what the future holds for them as they embark on this new
                            adventure as husband and wife.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Story End -->

    <!-- Entourage Start -->
    <div class="container-fluid bg-entourage py-5 parallax-window" data-parallax="scroll"
        data-image-src="<?php echo base_url('public/assets/img/entourage.jpg'); ?>" id="entourage">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Entourage</h6>
                <h1 class="font-secondary display-4">Our Gorgeous Entourage</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary">
                    <h2>Groom's Parents</h2>
                </div>
                <div class="col-6 p-0 text-md-right p-4" id="m-prin">
                    <p><i class="fas fa-cross"></i>Mr. Marceliano L. Garcia</p>
                    <p>Mr. Edmundo G. Garcia</p>
                </div>
                <div class="col-6 p-0 text-md-left p-4" id="f-prin">
                    <p><i class="fas fa-cross"></i>Mrs. Gloria G. Garcia</p>
                    <p>Mrs. Laila R. Garcia</p>
                </div>
                <div class="col-md-12 text-center font-secondary">
                    <h2>Bride's Parents</h2>
                </div>
                <div class="col-6 p-0 text-md-right p-4" id="m-prin">
                    <p>Mr. Teofilo Monteverde</p>
                </div>
                <div class="col-6 p-0 text-md-left p-4" id="f-prin">
                    <p>Mrs. Marivic Monteverde</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary">
                    <h2>Best Men </h2>
                </div>
                <div class="col-6 p-0 text-center text-md-right p-4">
                    <p>Mr. Erwin G. Garcia</p>
                </div>
                <div class="col-6 p-0 text-center text-md-left p-4">
                    <p>Mr. Carl Lucien L. Felicano</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary">
                    <h2>Best Woman </h2>
                </div>
                <div class="col-12 p-0 text-center p-4">
                    <p>Mrs. Emily G. Garcia</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary">
                    <h2>Maids and Men of Honor</h2>
                </div>
                <div class="col-6 p-0 text-md-right p-4" id="m-prin">
                    <p>Ms. Mary Anne Monteverde</p>
                    <p>Ms. Marie Bianca Monteverde</p>
                    <p>Mr. Andrew Jay B. Santos</p>
                </div>
                <div class="col-6 p-0 text-md-left p-4" id="f-prin">
                    <p>Ms. Marie Joyce Monteverde</p>
                    <p>Ms. Marie Katrina Monteverde</p>
                    <p>Mr. Dom Villegas</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary">
                    <h2>Principal Sponsors</h2>
                </div>
                <div class="col-6 p-0 text-md-right p-4" id="m-prin">
                    <p>Mr. Juan dela Cruz</p>
                    <p>Mr. Eduardo Leonor</p>
                    <p>Mr. Arman Almirez</p>
                    <p>Mr. Dhon Conwi</p>
                    <p>Mr. Allan Dela Rosa</p>
                    <p>Mr. Philippe Mateo</p>
                    <p>Mr. Rogelio Almirez</p>
                    <p>Mr. Rene Superio</p>
                    <p>Mr. Nanding Sadsad</p>
                </div>
                <div class="col-6 p-0 text-md-left p-4" id="f-prin">
                    <p>Mrs. Marilou A. Kanda</p>
                    <p>Mrs. Daisy Escudero</p>
                    <p>Ms. Bernadeth Beliganio</p>
                    <p>Mrs. Erlyn Conwi</p>
                    <p>Mrs. Lucette Dela Rosa</p>
                    <p>Mrs. Minerva Almirez</p>
                    <p>Mrs. Inday Felizarta</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary pb-3">
                    <h2>Secondary Sponsors</h2>
                </div>
                <div class="col-md-12 text-center font-secondary">
                    <h4>Candles</h4>
                </div>
                <div class="col-6 p-0 text-center text-md-right p-4">
                    <p>Mr Joseph Carlo R. Bondoc</p>
                </div>
                <div class="col-6 p-0 text-center text-md-left p-4">
                    <p>Mrs. Camella Joy P. Bondoc</p>
                </div>
                <div class="col-md-12 text-center font-secondary">
                    <h4>Veil</h4>
                </div>
                <div class="col-6 p-0 text-center text-md-right p-4">
                    <p>Mr. Frederick de Guzman</p>
                </div>
                <div class="col-6 p-0 text-center text-md-left p-4">
                    <p>Mrs. Beverly de Guzman</p>
                </div>
                <div class="col-md-12 text-center font-secondary">
                    <h4>Cord</h4>
                </div>
                <div class="col-6 p-0 text-center text-md-right p-4">
                    <p>Mr. Frank Oliver Monteverde</p>
                </div>
                <div class="col-6 p-0 text-center text-md-left p-4">
                    <p>Mrs. Richelle Monteverde</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary">
                    <h2>Groomsmen & Bridesmaid</h2>
                </div>
                <div class="col-6 p-0 text-center text-md-right p-4">
                    <p>Mr. Rachelle-Ann Ducay</p>
                    <p>Mr. Royward Castillo</p>
                    <p>Mr. Jayson Anthony Batac</p>
                    <p>Mr. Jerico Russell Mungcal</p>
                </div>
                <div class="col-6 p-0 text-center text-md-left p-4">
                    <p>Ms. Mary Jane Cambaya</p>
                    <p>Ms. Daphne Ochoa</p>
                    <p>Ms. Cherry Mae Cabrera</p>
                    <p>Ms. Dolly Jill Carmona</p>
                    <p>Ms. Richelda Belza</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary">
                    <h2>Flowergirls</h2>
                </div>
                <div class="col-6 p-0 text-center text-md-right p-4">
                    <p>Mrs. Lydia Monteverde</p>
                </div>
                <div class="col-6 p-0 text-center text-md-left p-4">
                    <p>Mrs. Victoria Almacen</p>
                </div>
            </div>
            <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                <div class="col-md-12 text-center font-secondary pb-3">
                    <h2>Bearers</h2>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 text-center font-secondary">
                        <h4>Bible</h4>
                    </div>
                    <div class="col-12 p-0 text-center p-4" style="padding-bottom:0 !Important">
                        <p>Jareal Corbin R. Garcia</p>
                    </div>
                    <div class="col-12 p-0 text-center p-4" style="padding-top:0 !Important">
                        <p>Sandro A. Garcia</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 text-center font-secondary">
                        <h4>Coin</h4>
                    </div>
                    <div class="col-12 p-0 text-center p-4">
                        <p>Javin Nash R. Garcia</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12 text-center font-secondary">
                        <h4>Ring</h4>
                    </div>
                    <div class="col-12 p-0 text-center p-4" style="padding-bottom:0 !Important">
                        <p>Adrien Xayne Santos</p>
                    </div>
                    <div class="col-12 p-0 text-center p-4" style="padding-top:0 !Important">
                        <p>Sherwin A. Garcia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Entourage End -->


    <!-- Gallery Start -->
    <div class="container-fluid" id="gallery" style="padding: 50px 0;padding-bottom: 0; margin-bottom: 0;">
        <div class="section-title position-relative text-center" style="margin-bottom: 120px;">
            <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Gallery</h6>
            <h1 class="font-secondary display-4">Our Photo Gallery</h1>
            <i class="far fa-heart"></i>
        </div>
        <div class="owl-carousel gallery-carousel">
            <div class="gallery-item">
                <img class="img-fluid w-100"
                    src="<?php echo strtolower(base_url('public/assets/img/gallery-new-1.JPG')); ?>" alt="">
                <a href="<?php echo strtolower(base_url('public/assets/img/gallery-new-1.JPG')); ?>"
                    data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100"
                    src="<?php echo strtolower(base_url('public/assets/img/gallery-new-2.JPG')); ?>" alt="">
                <a href="<?php echo strtolower(base_url('public/assets/img/gallery-new-2.JPG')); ?>"
                    data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100"
                    src="<?php echo strtolower(base_url('public/assets/img/gallery-new-3.JPG')); ?>" alt="">
                <a href="<?php echo strtolower(base_url('public/assets/img/gallery-new-3.JPG')); ?>"
                    data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100"
                    src="<?php echo strtolower(base_url('public/assets/img/gallery-new-4.JPG')); ?>" alt="">
                <a href="<?php echo strtolower(base_url('public/assets/img/gallery-new-4.JPG')); ?>"
                    data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100"
                    src="<?php echo strtolower(base_url('public/assets/img/gallery-new-5.JPG')); ?>" alt="">
                <a href="<?php echo strtolower(base_url('public/assets/img/gallery-new-5.JPG')); ?>"
                    data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
            <div class="gallery-item">
                <img class="img-fluid w-100"
                    src="<?php echo strtolower(base_url('public/assets/img/gallery-new-5.JPG')); ?>" alt="">
                <a href="<?php echo strtolower(base_url('public/assets/img/gallery-new-5.JPG')); ?>"
                    data-lightbox="gallery">
                    <i class="fa fa-2x fa-plus text-white"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Gallery End -->
    <!-- Event Start -->
    <div class="container-fluid noPaddingBottom pt-5 pb-4 parallax-window" data-parallax="scroll"
        data-image-src="<?php echo base_url('public/assets/img/entourage.jpg'); ?>" id="event">
        <div class="container py-5">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">Event</h6>
                <h1 class="font-secondary display-4">Our Wedding Event</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row justify-content-center pb-3">
                <div class="col-md-6 text-center">
                    <h5 class="font-weight-normal text-muted mb-3 pb-3">In a world full of fleeting moments, today
                        we
                        celebrate a love that will last a lifetime. Here's to the beginning of forever, where every
                        day
                        will be filled with love, laughter, and endless joy.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 border-right border-primary">
                    <div class="text-center text-md-right mr-md-3 mb-4 mb-md-0">
                        <iframe class="pb-3" width="100%" height="300px" style="border:0" loading="lazy" allowfullscreen
                            src="<?php echo $data->google_map_key2 ?>"></iframe>
                        <h4 class="mb-3">The Wedding Venue</h4>
                        <p class="mb-2">St Joseph The Worker Parish</p>
                        <p class="mb-0">4:00 PM - 5:00PM</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-left ml-md-3">
                        <iframe class="pb-3" width="100%" height="300px" style="border:0" loading="lazy" allowfullscreen
                            src="<?php echo $data->google_map_key1 ?>"></iframe>
                        <h4 class="mb-3">The Reception</h4>
                        <p class="mb-2">El Circulo Events Place</p>
                        <p class="mb-0">6:00 PM - 10:00 PM</p>
                    </div>
                </div>
            </div>
            <div class="section-title position-relative text-center pt-5">
                <h1 class="font-secondary display-4">Attire Guide</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h5 class="font-weight-normal text-muted mb-3 pb-3">Where Timeless Elegance Meets the Promise of
                        Forever, Every Stitch Tells a Story of Love.</h5>
                </div>
            </div>
            <div class="row justify-content-center">
                <img src="<?php echo base_url('public/assets/img/attire.png'); ?>" class="img-fluid"
                    alt="Responsive image">
            </div>
            <div class="section-title position-relative text-center">
                <h1 class="font-secondary display-4">Gift Guide</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row justify-content-center" style="padding-bottom:4rem;">
                <div class="col-md-6 text-center">
                    <h5 class="font-weight-normal text-muted mb-3 pb-3">With all that we have, we've been truly blessed.
                        Your presence and prayers are all that we request.
                        But if your desired to give nonetheless,
                        monetary gift is one we suggest.</h5>
                </div>
                <div class="col-md-12 text-center">
                    <img src="<?php echo base_url('public/assets/img/qrcode.png'); ?>" class="img-fluid"
                        alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
    <!-- Event End -->
    <!-- Faqs Start -->
    <div class="container-fluid pt-5 pb-5" id="faqs">
        <div class="container-fluid">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">FAQS</h6>
                <h1 class="font-secondary display-4">Everything You Need to Know</h1>
                <i class="far fa-heart text-dark"></i>
                <Ul>
            </div>
            <div class="container py-5 bg-secondary pl-4 pr-4" style="border-radius:31px;">
                <ul class="list-unstyled" style="line-height:36px;">
                    <li><b>What time do I need to be at the venue?</b></li>
                    <li class="mb-2">Help us get the party started as scheduled! We recommend that you arrive 30 minutes
                        before the
                        start of the ceremony to make sure everyone is seated on time.</li>

                    <li><b>Can I bring a plus one?</b></li>
                    <li class="mb-2">Unfortunately, we have a strict guest list to stay on budget. We are sadly unable
                        to accomodate
                        additional guests. We appreciate your understanding!</li>

                    <li><b>Can I sit anywhere at the reception?</b></li>
                    <li class="mb-2">No, please. It took us a lot of effort to finalize the seating arrangement which is
                        meant for
                        everyone’s convenience. Group familiarity and network preference were taken into consideration
                        to make sure you will be comfortable, so no need to worry.</li>

                    <li><b>If you reserved us two seats and only one can make it, can I bring someone else along with
                            me?</b></li>
                    <li class="mb-2">No, unless we have personally confirmed this. We wanted to be surrounded by our
                        families,
                        friends, and super familiar faces, meaning we can only take in those who are invited.</li>
                    <li><b>What happens between ceremony and reception?</b></li>

                    <li class="mb-2">After the ceremony, the wedding party will be taking pictures nearby for around an
                        hour or so.
                        Guests can head straight to the reception where we will be serving pastries and drinks during
                        cocktail hour.</li>

                    <li><b>RSVP Deadline:</b></li>
                    <li class="mb-2"></li>Please remember to RSVP by the specified deadline so we can finalize our guest
                    list and
                    arrangements</li>

                    <li><b>Arrival Time:</b></li>
                    <li class="mb-2">Aim to arrive a little early to avoid any last-minute rush and to ensure you don't
                        miss any part
                        of the ceremony.</li>

                    <li><b>Have Fun!:</b></li>
                    <li>Most importantly, relax, have fun, and celebrate with us! We can't wait to share this special
                        day with all of our loved ones.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Faqs End -->
    <?php if (isset($data->show_modal)) { ?>
        <!-- RSVP Start -->
        <div class="container-fluid py-5" id="rsvp"
            style="<?php echo $data->show_modal ? 'display:block;' : 'display:none;' ?>">
            <div class="container py-5 bg-secondary" style="border-radius:31px;">
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
                                if (!empty($data->main_invitee)) {
                                    echo "<p>Dear <b>" . htmlspecialchars($data->main_invitee) . ",</b></p></br>";
                                    echo $data->companions_count >= 0 && !empty($data->companions_count) ? '<p>Please confirm your attendance and list the accompanying family members:' : 'Please confirm your attendance' . '</p>';
                                }
                                // Check if companions is not empty and is an array
                                if (!empty($data->companions) && is_array($data->companions)) {
                                    // Iterate over the companions array
                                    foreach ($data->companions as $companion) {
                                        echo '<p><b>' . htmlspecialchars($companion->name) . "</b></p>";
                                    }
                                    echo "</br>";
                                    echo "<h3>Thank you!</h3>";
                                } else {
                                    echo "<p>No companions found.</p>";
                                }
                                ?>
                            </div>
                            <div style="margin-top:20px;">
                                <button class="btn btn-primary font-weight-bold py-3 px-5" id="btnConfirmAttendance"
                                    type="button">Affirm your presence</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- RSVP End -->
        <!-- RSVP Confirm Start -->
        <div class="container-fluid py-5" id="rsvp-confirm"
            style="<?php echo $data->show_modal ? 'display:none;' : 'display:block;' ?>">
            <div class="container py-5 bg-secondary" style="border-radius:31px;">
                <div class="section-title position-relative text-center">
                    <h6 class="text-uppercase text-primary mb-3" style="letter-spacing: 3px;">RSVP</h6>
                    <h1 class="font-secondary display-4">Your Presence is Highly Anticipated</h1>
                    <i class="far fa-heart text-dark"></i>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <div class="text-center" id="invitee-body">
                                <?php
                                // Check if each $companion is an object or associative array
                                if (!empty($data->main_invitee)) {
                                    echo "<p>We look forward to your presence, <b>" . htmlspecialchars($data->main_invitee) . ",</b></p>";
                                    echo $data->companions_count >= 0 && !empty($data->companions_count) ? '<p> along with your accompanying family members:' : '</p>';
                                }
                                // Check if companions is not empty and is an array
                                if (!empty($data->companions) && is_array($data->companions)) {
                                    // Iterate over the companions array
                                    foreach ($data->companions as $confirm_companions) {
                                        echo '<p><b>' . htmlspecialchars($confirm_companions->name) . "</b></p>";
                                    }
                                    echo "</br>";
                                    echo "<h3>Thank you!</h3>";

                                } else {
                                    echo "<p>No companions found.</p>";
                                }
                                echo "</br>";
                                echo "<button type='button' class='btn btn-primary font-weight-bold py-3 px-5' id='btn-show-qr'>Get your QR Pass</button>";
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- RSVP Confirm End -->
    <?php } ?>
    <audio id="bgmusic" controls>
        <source src=" <?php echo base_url('public/assets/audio/music.mp4'); ?>" type="audio/mp4">
        Your browser does not support the audio element.
    </audio>
    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                if (!empty($data->invite_id)) {
                    echo $data->invite_id;
                }
                ?>" name="invite_id" id="invite_id">
                    <?php
                    // Check if each $companion is an object or associative array
                    if (!empty($data->main_invitee)) {
                        echo "Dear <b>" . htmlspecialchars($data->main_invitee) . "</b>,<br><br>";
                        echo $data->companions_count >= 0 && !empty($data->companions_count) ? 'Please confirm your attendance and list the accompanying family members:<br><br>' : 'Please confirm your attendance<br><br>';
                    }
                    // Check if companions is not empty and is an array
                    if (!empty($data->companions) && is_array($data->companions)) {
                        // Iterate over the companions array
                        foreach ($data->companions as $companion) {
                            // Check if each $companion is an object or associative array
                            if (is_object($companion)) {
                                echo '<b>' . htmlspecialchars($companion->name) . "</b></br>";
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
                    <?php if (!empty($data->companions_count) || !empty($data->invite_id)) { ?>
                        <button type="button" class="btn btn-primary" id="rsvp_confirm_yes">Ofcourse, <?php
                        echo $data->companions_count >= 0 && !empty($data->companions_count) ? 'We' : 'I'; ?> will
                            attend</button>
                        <button type="button" class="btn btn-primary btn-danger" id="rsvp_confirm_no">Sorry, <?php
                        echo $data->companions_count >= 0 && !empty($data->companions_count) ? 'We' : 'I'; ?> will
                            not
                            be able
                            to attend</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Full-Screen Overlay -->
    <div class="overlay" id="fullOverlay">
        <div class="overlay-content">
            <h1 class="display-1 font-secondary text-white mt-n3 mb-md-4 animate__animated animate__backInDown">Doodz &
                Akiss</h1>
            <button class="btn btn-primary animate__animated animate__bounceIn" id="openBtn">Open Invitation</button>
        </div>
    </div>
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="overlay">
                    <div class="cv-spinner"><span class="spinner"></span></div>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">QR PASS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" value="
                <?php
                if (!empty($data->invite_id)) {
                    echo $data->invite_id;
                }
                ?>" name="invite_id" id="invite_id">

                    <div id="qr-container">
                        <p>Please save this QR code and present it to the guest liaison upon your arrival at the
                            entrance.</p>
                        <img src="<?php echo !empty($data->invitee_qr) ? $data->invitee_qr : '' ?>" id="qr-code-image"
                            class="img-thumbnail">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save-qr">Save QR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5" style="padding:0 !important;" id="contact">
        <div class="container text-center py-5">
            <div class="section-title position-relative text-center">
                <h1 class="font-secondary display-3 text-white">Thank You</h1>
                <i class="far fa-heart text-white"></i>
            </div>
            <div class="row justify-content-center pb-3">
                <div class="col-md-12 text-center">
                    <h5 class="font-weight-normal mb-3 pb-3 text-white">Help us capture the moments!
                        Share your photos with our wedding hashtag.</h5>
                    <h5 class="text-white"><strong>#EDUSealedItWithAkiss</strong></h5>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i
                        class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <footer class="text-center pt-5">
                <p class-="text-white">&copy; <a href="#"> 2024 Doodz & Akiss Wedding</a>.</p>
                <p>December 10, 2024</p>
                <p>All rights reserved.</p>
            </footer>
        </div>
    </div>

    <!-- Footer End -->

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-outline-primary btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.0/parallax.min.js"
        integrity="sha512-vS0dV6kxcESGshJ6anrXJFFNNtf9vXNZnsgnclUdV2tOzBZUsvGxnSj1NdKpgslLrsOe3ogFnQYHajyIH03Qcw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.0/parallax.js"
        integrity="sha512-TncoRIrwqrLDndeZkHHHygoPf8+fiLgwGbefrwGruOXXhjFBvJwlPo4+nstmNIJDwZRAfUQEEEQcNkWSBMLYRg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url('public/assets/lib/easing/easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/lib/isotope/isotope.pkgd.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/lib/lightbox/js/lightbox.min.js'); ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.js.map"></script>
    <!-- Template Javascript -->
    <script src="<?php echo base_url('public/assets/lib/lightbox/js/lightbox.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/counter.js'); ?>"></script>

    <script src="<?php echo base_url('public/assets/js/main.js'); ?>"></script>
    <script>
        $('.parallax-window').parallax({
            imageSrc: '<?php echo base_url('public/assets/img/entourage.jpg'); ?>'
        });

        $('#rsvp_confirm_yes').click(function () {
            var rsvp_id = $("#invite_id").val().trim()
            $.ajax({
                url: '<?php echo base_url('confirm'); ?>',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                data: { rsvp_id: rsvp_id, confirm: '1' },
                type: 'POST',

                success: function (data) {

                    if (data.confirm == 1) {
                        $("#rsvp-nav").removeClass('d-none');
                        setTimeout(function () {
                            toastr.success('Thank you for your confirmation!');
                        }, 1000);
                        var html = '';
                        html += '<p>We look forward to your presence, <b>' + data.main_invitee_name + ',</b></p>';
                        if (data.companions.length > 0) {
                            html += '<p>along with your accompanying family members:</p>';
                            $.each(data.companions, function (index, companion) {
                                console.log(companion.name);
                                html += '<p><b>' + companion.name + '</b></p>';
                            });
                        }
                        html += '<h3>Thank you!</h3><br>';
                        html += "<button type='button' class='btn btn-primary font-weight-bold py-3 px-5' id='btn-show-qr'>Get your QR Pass</button>";

                        $("#invitee-body").html(html);
                    }

                    $("#rsvp-confirm").show();
                    $("#rsvp").hide();
                }
            }).done(function (data) {
                setTimeout(function () {
                    $("#overlay").fadeOut(300);
                }, 500);
                setTimeout(function () {
                    $("#confirmationModal").modal("hide");
                }, 900);
                $('#qr-code-image').attr('src', data.qrCodeUri);
                setTimeout(function () {
                    $("#qrModal").modal("show");
                }, 1200);


            });
        });

        $('#rsvp_confirm_no').click(function () {
            var rsvp_id = $("#invite_id").val().trim()
            $.ajax({
                url: '<?php echo base_url('confirm'); ?>',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                data: { rsvp_id: rsvp_id, confirm: '0' },
                type: 'POST',

                success: function (data) {
                    if (data.confirm == 0) {
                        setTimeout(function () {
                            toastr.success('Thank you for your confirmation!');
                        }, 1000);

                        $("#rsvp").hide();
                        $("#rsvp-confirm").hide();
                        $("#rsvp-nav").hide();
                    }
                }
            }).done(function () {
                setTimeout(function () {
                    $("#overlay").fadeOut(300);
                }, 500);

                setTimeout(function () {
                    $("#confirmationModal").modal("hide");
                }, 900);

            });
        });
        <?php if (!empty($data->show_modal) && !is_null($data->show_modal) && $data->show_modal == true) { ?>
            $("#confirmationModal").modal('show');
        <?php } ?>

    </script>
</body>

</html>