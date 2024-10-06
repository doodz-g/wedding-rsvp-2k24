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
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/style.css') . '?v=' . rand(); ?>" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Full-Screen Overlay Start -->
    <div class="overlay-cover" id="fullOverlay">
        <div class="overlay-content">
            <h1 class="display-1 font-secondary text-white mt-n3 mb-md-4 animate__animated animate__backInDown">Doodz &
                Akiss</h1>
            <button
                class="btn btn-primary animate__animated animate__bounceIn animate__pulse animate__infinite animate__slower"
                id="openBtn">Open Invitation</button>
        </div>
    </div>
    <!-- Full-Screen Overlay End-->
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5 d-none">
        <a href="#home" class="navbar-brand d-block d-lg-none">
            <h1 class="font-secondary text-white mb-n2">Doodz <span class="text-primary emerald-green">&</span>
                Akiss
            </h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#story" class="nav-item nav-link">Story</a>
                <a href="#entourage" id="entourage-link" class="nav-item nav-link">Entourage</a>

            </div>
            <a href="#home" class="navbar-brand mx-5 d-none d-lg-block">
                <h1 class="font-secondary text-white mb-n2">Doodz <span class="text-primary">&</span> Akiss</h1>
            </a>
            <div class="navbar-nav mr-auto py-0">
                <a href="#gallery" class="nav-item nav-link">Gallery</a>
                <a href="#event" class="nav-item nav-link">Event</a>
                <a href="#faqs" class="nav-item nav-link">Faqs</a>
                <div id="rsvp-container">
                    <?php if (isset($data->invite_id)) { ?>
                        <?php if (isset($data->show_modal) && $data->show_modal == 'true') { ?>
                            <a href="#rsvp" id="rsvp-nav" class="nav-item nav-link ">RSVP</a>
                        <?php } else { ?>
                            <a href="#rsvp-confirm" id="rsvp-confirm-nav" class="nav-item nav-link">RSVP</a>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="custom-container">
        <!-- Carousel Start -->
        <div class="container-fluid p-0" id="home">
            <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner" id="carousel-container">
                    <div class="carousel-item position-relative active carou">
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
                                    <h3 class="text-uppercase font-weight-normal text-white m-0 ls-2">December 10 2024
                                    </h3>
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
                    <div class="carousel-item position-relative carou">
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
                    <div class="carousel-item position-relative carou">
                        <img class="position-absolute w-100 h-153"
                            src="<?php echo strtolower(base_url('public/assets/img/carousel-3.JPG')); ?>" loading="lazy"
                            style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h1 class="display-1 font-secondary text-white mt-n3 mb-md-4">Doodz & Akiss</h1>
                                <div class="d-inline-block border-top border-bottom border-light py-3 px-4">
                                    <h3 class="text-uppercase font-weight-normal text-white m-0 ls-2">We're getting
                                        married</h3>
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
                <a class="carousel-control-prev justify-content-start d-none" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-primary bg-emerald-green border-color-emerald-green px-0"
                        style="width: 68px; height: 68px;">
                        <span class="carousel-control-prev-icon mt-3"></span>
                    </div>
                </a>
                <a class="carousel-control-next justify-content-end d-none" href="#header-carousel" data-slide="next">
                    <div class="btn btn-primary bg-emerald-green border-color-emerald-green px-0"
                        style="width: 68px; height: 68px;">
                        <span class="carousel-control-next-icon mt-3"></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- Carousel End -->
        <!-- Story Start -->
        <div class="container-fluid parallax-window-even" data-parallax="scroll"
            data-image-src="<?php echo base_url('public/assets/img/even.png'); ?>" id="story">
            <div class="container-fluid pt-6 c-pb-3 ">
                <div class="section-title position-relative text-center">
                    <h6 class="text-uppercase text-primary mb-3 ls-3">Story</h6>
                    <h1 class="font-secondary display-4 scroll-up-content">Our Love Story</h1>
                    <i class="far fa-heart text-dark"></i>
                    <Ul>
                </div>
                <div class="container py-5 bg-secondary pl-4 pr-4 scroll-up-content">
                    <p class="m-0 text-muted">Three years ago, amidst the vast expanse of the internet, a chance
                        encounter
                        brought a boy and a girl together. What began as a simple exchange of words in a
                        chatroom or
                        perhaps through a shared interest on social media, quickly grew into a meaningful
                        connection. They discovered common interests, shared dreams, and a mutual sense of humor
                        that bridged the miles between them.



                        <br><br>In the beginning, their conversations were filled with the excitement of getting
                        to
                        know each other. They would spend hours chatting, sharing stories about their lives,
                        their
                        aspirations, and their favorite memories. As the days turned into weeks and the weeks
                        into
                        months, their bond deepened. They laughed together at silly jokes, supported each other
                        through tough times, and celebrated each other's successes. Despite the physical
                        distance,
                        they felt an emotional closeness that was undeniable.



                        <br><br>As their relationship evolved, they made efforts to bridge the gap between them.
                        They started video calling, allowing them to see each other's faces and hear each
                        other's
                        voices. These calls became the highlights of their days, filled with laughter, heartfelt
                        conversations, and moments of silence that spoke volumes about their comfort with each
                        other. They exchanged gifts and letters, small tokens of their affection that made the
                        distance seem a little less daunting.



                        <br><br>Their first in-person meeting was a momentous occasion. Nervous excitement
                        buzzed in
                        the air as they finally embraced, feeling the warmth and reality of each other's
                        presence.
                        That meeting was the first of many, and with each visit, their love grew stronger. They
                        explored new places, created new memories, and found joy in simply being together. Their
                        relationship, once confined to the virtual realm, had now blossomed into a beautiful,
                        tangible reality.



                        <br><br> Over the years, they navigated the challenges that came their way with grace
                        and
                        resilience. They learned to communicate openly and honestly, to trust each other
                        implicitly,
                        and to cherish the unique connection they shared. They realized that their love was
                        built on
                        a solid foundation of friendship, respect, and mutual admiration. Each day they spent
                        together, whether physically or virtually, was a testament to their commitment to one
                        another.



                        <br><br>Now, as they approach their third anniversary, they are ready to embark on a new
                        chapter in their lives. On December 10, 2024, they will stand before their family and
                        friends to exchange vows and declare their love and commitment. Their wedding day will
                        be a
                        celebration of their journey, a testament to the love that has grown and flourished over
                        the
                        years. It will be a day filled with joy, laughter, and the promise of a beautiful future
                        together.

                        Their story is a beautiful reminder that love knows no boundaries. It can be found in
                        the
                        most unexpected places and can thrive despite the challenges that come its way. Their
                        journey from online strangers to soulmates is a testament to the power of love,
                        perseverance, and the belief that true love will always find a way.



                        <br><br>As they look forward to their wedding day and the life that lies ahead, they do
                        so
                        with hearts full of gratitude and excitement. They are ready to face the future hand in
                        hand, knowing that together, they can overcome anything. Their love story is just
                        beginning,
                        and they are eager to see what the future holds for them as they embark on this new
                        adventure as husband and wife.
                    </p>
                </div>
            </div>
        </div>
        <!-- Story End -->
        <!-- Entourage Start -->
        <div class="container-fluid bg-entourage parallax-window" data-parallax="scroll"
            data-image-src="<?php echo base_url('public/assets/img/entourage.png'); ?>" id="entourage">
            <div class="container pt-6">
                <div class="section-title position-relative text-center">
                    <h6 class="text-uppercase text-primary mb-3 ls-3">Entourage</h6>
                    <h1 class="font-secondary display-4">Our Gorgeous Entourage</h1>
                    <i class="far fa-heart text-dark"></i>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Groom's Parents</h2>
                    </div>
                    <div class="col-6 p-0 text-md-right p-4 ml-container mf-size">
                        <p>Mr. Edmundo G. Garcia</p>
                    </div>
                    <div class="col-6 p-0 text-md-left p-4 mr-container mf-size">
                        <p>Mrs. Laila R. Garcia</p>
                    </div>
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Bride's Parents</h2>
                    </div>
                    <div class="col-6 p-0 text-md-right p-4 ml-container mf-size">
                        <p>Mr. Teofilo Monteverde</p>
                    </div>
                    <div class="col-6 p-0 text-md-left p-4 mr-container mf-size">
                        <p>Mrs. Marivic Monteverde</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Our Best Men </h2>
                    </div>
                    <div class="col-6 p-0 text-center text-md-right p-4 ml-container mf-size">
                        <p>Mr. Erwin G. Garcia</p>
                    </div>
                    <div class="col-6 p-0 text-center text-md-left p-4 mr-container mf-size">
                        <p>Mr. Carl Lucien L. Felicano</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Our Best Woman </h2>
                    </div>
                    <div class="col-12 p-0 text-center p-4 mf-size">
                        <p>Ms. Emily G. Garcia</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Our Maids of Honor</h2>
                    </div>
                    <div class="col-6 p-0 text-md-right p-4 ml-container mf-size">
                        <p>Ms. Mary Anne Monteverde</p>
                        <p>Ms. Marie Bianca Monteverde</p>
                    </div>
                    <div class="col-6 p-0 text-md-left p-4 mr-container mf-size">
                        <p>Ms. Marie Joyce Monteverde</p>
                        <p>Ms. Marie Katrina Monteverde</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Our Principal Sponsors</h2>
                    </div>
                    <div class="col-6 p-0 text-md-right p-4 ml-container mf-size">
                        <p>Mr. Edmundo Cabading</p>
                        <p>Mr. Eduardo Leonor</p>
                        <p>Mr. Arman Almirez</p>
                        <p>Mr. Gregory Conwi</p>
                        <p>Mr. Allan Dela Rosa</p>
                        <p>Mr. Philippe Mateo</p>
                        <p>Mr. Rogelio Almirez</p>
                        <p>Mr. Rene Superio</p>
                        <p>Mr. Nanding Sadsad</p>
                    </div>
                    <div class="col-6 p-0 text-md-left p-4 mr-container mf-size">
                        <p>Mrs. Marilou A. Kanda</p>
                        <p>Mrs. Daisy Escudero</p>
                        <p>Ms. Bernadeth Beliganio</p>
                        <p>Mrs. Erlyn Conwi</p>
                        <p>Mrs. Lucette Dela Rosa</p>
                        <p>Mrs. Ivanne Colleen Parilla- Mateo</p>
                        <p>Mrs. Minerva Almirez</p>
                        <p>Mrs. Maria Lita Felizarta</p>
                        <p>Mrs. Elenita Wheeler</p>
                        <p>Ms. Caroline Ofilanda</p>
                        <p>Ms. Maria Lea Almirez</p>
                        <p>Mrs. Placida  Nishiya</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary pb-3 fw-light text-primary">
                        <h2>Our Secondary Sponsors</h2>
                    </div>
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h3>Candles</h3>
                    </div>
                    <div class="col-6 p-0 text-center text-md-right p-4 ml-container mf-size">
                        <p>Mr Joseph Carlo R. Bondoc</p>
                    </div>
                    <div class="col-6 p-0 text-center text-md-left p-4 mr-container mf-size">
                        <p>Mrs. Carmella Joy P. Bondoc</p>
                    </div>
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h3>Veil</h3>
                    </div>
                    <div class="col-6 p-0 text-center text-md-right p-4 ml-container mf-size">
                        <p>Mr. Frederick de Guzman</p>
                    </div>
                    <div class="col-6 p-0 text-center text-md-left p-4 mr-container mf-size">
                        <p>Mrs. Beverly de Guzman</p>
                    </div>
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h3>Cord</h3>
                    </div>
                    <div class="col-6 p-0 text-center text-md-right p-4 ml-container mf-size">
                        <p>Mr. Royward Castillo</p>
                    </div>
                    <div class="col-6 p-0 text-center text-md-left p-4 mr-container mf-size">
                        <p>Ms. Danica Barquilla</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Our Groomsmen & Bridesmaid</h2>
                    </div>
                    <div class="col-6 p-0 text-center text-md-right ml-container mf-size p-4">
                        <p>Mr. Frank Oliver Monteverde</p>
                        <p>Mr. Andrew Jay Santos</p>
                        <p>Mr. Dominic Lorenzo Villegas</p>
                        <p>Mr. Rachelle-Ann Ducay</p>
                        <p>Mr. Jayson Anthony Batac</p>
                        <p>Mr. Jerico Russell Mungcal</p>
                        <p>Mr. Royward Castillo</p>
                        <p>Mr. Kaisuke Azuma</p>
                        <p>Mr. Ahmed Moustafa Abouelela</p>
                        <p>Mr. Yuya Kanda </p>
                    </div>
                    <div class="col-6 p-0 text-center text-md-left mr-container mf-size p-4">
                        <p>Ms. Annie Vie Mañago</p>
                        <p>Ms. Daphne Ochoa</p>
                        <p>Ms. Lovely Ocampo</p>
                        <p>Ms. Mary Jane Cambaya</p>
                        <p>Ms. Richelda Belza</p>
                        <p>Ms. Dolly Jill Carmona</p>
                        <p>Ms. Danielle Ann Quitan</p>
                        <p>Ms. Anjanette Paalisbo</p>
                        <p>Mrs. Erika Azuma</p>
                        <p>Mrs. Marie Grace Domingo</p>
                        <p>Ms. Michelle Anclote</p>
                        <p>Ms. Kristine Marie Jamboy</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light text-primary">
                        <h2>Our Lovely Flower Girls</h2>
                    </div>
                    <div class="col-6 p-0 text-center text-md-right p-4 ml-container mf-size">
                        <p>Mrs. Lydia Monteverde</p>
                    </div>
                    <div class="col-6 p-0 text-center text-md-left p-4 mr-container mf-size">
                        <p>Mrs. Victoria Almacen</p>
                    </div>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary pb-3 fw-light text-primary">
                        <h2>Our Bearers</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 text-center font-secondary fw-light text-primary">
                            <h3>Bible</h3>
                        </div>
                        <div class="col-12 p-0 text-center mf-size pt-4">
                            <p>Jareal Corbin R. Garcia</p>
                        </div>
                        <div class="col-12 p-0 text-center mf-size">
                            <p>Sandro A. Garcia</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 text-center font-secondary fw-light text-primary">
                            <h3>Coin</h3>
                        </div>
                        <div class="col-12 p-0 text-center p-4 mf-size">
                            <p>Javin Nash R. Garcia</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 text-center font-secondary fw-light text-primary">
                            <h3>Ring</h3>
                        </div>
                        <div class="col-12 p-0 text-center mf-size pt-4">
                            <p>Adrien Xayne Santos</p>
                        </div>
                        <div class="col-12 p-0 text-center mf-size">
                            <p>Sherwin A. Garcia</p>
                        </div>
                    </div>
                </div>

                <div class="section-title position-relative text-center">
                    <h2 class="font-secondary text-primary c-ilm">In Loving Memory
                    </h2>
                    <i class="far fa-heart text-dark"></i>
                </div>
                <div class="row m-0 mb-4 mb-md-0 pb-2 pb-md-0 text-center">
                    <div class="col-md-12 text-center font-secondary fw-light">
                        <h3>On this special day, we honor those who are no longer with us but forever in our hearts:
                        </h3>
                    </div>
                    <div class="col-6 p-0 text-md-right p-4 ml-container mf-size">
                        <p>Mr. Marceliano L. Garcia</p>
                    </div>
                    <div class="col-6 p-0 text-md-left p-4 mr-container mf-size">
                        <p>Mrs. Gloria G. Garcia</p>
                    </div>
                    <div class="col-md-12 text-center font-secondary fw-light">
                        <h5>"In loving memory and with joy, we celebrate with those present and those we cherish in our
                            hearts."</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Entourage End -->
    <!-- Gallery Start -->
    <div class="container-fluid parallax-window-even pr-0 pl-0 pt-6" data-parallax="scroll"
        data-image-src="<?php echo base_url('public/assets/img/even.png'); ?>" id="gallery">
        <div class="section-title position-relative text-center mb-6">
            <h6 class="text-uppercase text-primary mb-3 ls-3">Gallery</h6>
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
    <div class="container-fluid parallax-window" data-parallax="scroll"
        data-image-src="<?php echo base_url('public/assets/img/entourage.png'); ?>" id="event">
        <div class="container pt-6">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3 ls-3">Event</h6>
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
        </div>
        <div class="container">
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
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                    <img src="<?php echo base_url('public/assets/img/boy_attire_green.png'); ?>" id="boy-attire"
                        class="img-fluid" style="max-width: 50%; max-height:80%;" alt="Responsive image">
                    <div class="color-swatch d-flex justify-content-center" style="margin-top: 10px;">
                        <div class="swatch bc" style="background-color: #d9ba9e;" data-color="#d9ba9e"></div>
                        <div class="swatch bc" style="background-color: #90a680;" data-color="#90a680"></div>
                        <div class="swatch bc" style="background-color: #000000;" data-color="#000000"></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                    <img src="<?php echo base_url('public/assets/img/girl_attire_nude.png'); ?>" id="girl-attire"
                        class="img-fluid" style="max-width: 50%; max-height:80%;" alt="Responsive image">
                    <div class="color-swatch d-flex justify-content-center" style="margin-top: 10px;">
                        <div class="swatch gc" style="background-color: #d9ba9e;" data-color="#d9ba9e"></div>
                        <div class="swatch gc" style="background-color: #90a680;" data-color="#90a680"></div>
                    </div>
                </div>
            </div>
            <div class="section-title position-relative text-center">
                <h1 class="font-secondary display-4">Gift Guide</h1>
                <i class="far fa-heart text-dark"></i>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h5 class="font-weight-normal text-muted mb-3 pb-3">With all that we have, we've been truly
                        blessed.
                        Your presence and prayers are all that we request.
                        But if your desired to give nonetheless,
                        monetary gift is one we suggest.</h5>
                    <img src="<?php echo base_url('public/assets/img/qrcode.png'); ?>" class="img-fluid"
                        alt="Responsive image">
                </div>
                <div class="col-md-12 text-center">
                    <h4>Dummy QR</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- Event End -->
    <!-- Faqs Start -->
    <div class="container-fluid parallax-window-even" data-parallax="scroll"
        data-image-src="<?php echo base_url('public/assets/img/even.png'); ?>" id="faqs">
        <div class="container-fluid c-pb-3 pt-6 scroll-up-content" data-aos="fade-up">
            <div class="section-title position-relative text-center">
                <h6 class="text-uppercase text-primary mb-3 ls-3">FAQS</h6>
                <h1 class="font-secondary display-4">Everything You Need to Know</h1>
                <i class="far fa-heart text-dark"></i>
                <Ul>
            </div>
            <div class="container py-5 bg-secondary pl-4 pr-4">
                <ul class="list-unstyled lh-36">
                    <li><b>What time do I need to be at the venue?</b></li>
                    <li class="mb-2">Help us get the party started as scheduled! We recommend that you arrive 30
                        minutes
                        before the
                        start of the ceremony to make sure everyone is seated on time.</li>

                    <li><b>Can I bring a plus one?</b></li>
                    <li class="mb-2">Unfortunately, we have a strict guest list to stay on budget. We are sadly
                        unable
                        to accomodate
                        additional guests. We appreciate your understanding!</li>

                    <li><b>Can I sit anywhere at the reception?</b></li>
                    <li class="mb-2">No, please. It took us a lot of effort to finalize the seating arrangement
                        which is
                        meant for
                        everyone’s convenience. Group familiarity and network preference were taken into
                        consideration
                        to make sure you will be comfortable, so no need to worry.</li>

                    <li><b>If you reserved us two seats and only one can make it, can I bring someone else along
                            with
                            me?</b></li>
                    <li class="mb-2">No, unless we have personally confirmed this. We wanted to be surrounded by our
                        families,
                        friends, and super familiar faces, meaning we can only take in those who are invited.</li>
                    <li><b>What happens between ceremony and reception?</b></li>

                    <li class="mb-2">After the ceremony, the wedding party will be taking pictures nearby for around
                        an
                        hour or so.
                        Guests can head straight to the reception where we will be serving pastries and drinks
                        during
                        cocktail hour.</li>

                    <li><b>RSVP Deadline:</b></li>
                    <li class="mb-2"></li>Please remember to RSVP by the specified deadline so we can finalize our
                    guest
                    list and
                    arrangements</li>

                    <li><b>Arrival Time:</b></li>
                    <li class="mb-2">Aim to arrive a little early to avoid any last-minute rush and to ensure you
                        don't
                        miss any part
                        of the ceremony.</li>

                    <li><b>Have Fun!:</b></li>
                    <li>Most importantly, relax, have fun, and celebrate with us! We can't wait to share this
                        special
                        day with all of our loved ones.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Faqs End -->
    <?php if (isset($data->show_modal)) { ?>
        <!-- RSVP Start -->
        <div class="container-fluid py-5 parallax-window" data-parallax="scroll"
            data-image-src="<?php echo base_url('public/assets/img/entourage.png'); ?>" id="rsvp"
            style="<?php echo $data->show_modal == 'true' ? 'display:block;' : 'display:none;' ?>">
            <div class="container py-5 bg-secondary">
                <div class="section-title position-relative text-center">
                    <h6 class="text-uppercase text-primary mb-3 ls-3">RSVP</h6>
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
        <div class="container-fluid py-5 parallax-window" data-parallax="scroll"
            data-image-src="<?php echo base_url('public/assets/img/entourage.png'); ?>" id="rsvp-confirm"
            style="<?php echo $data->show_modal == 'false' ? 'display:none;' : 'display:block;' ?>">
            <div class="container py-5 bg-secondary">
                <div class="section-title position-relative text-center">
                    <h6 class="text-uppercase text-primary mb-3 ls-3">RSVP</h6>
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
    <audio id="bgmusic" controls preload="none">
        <source src=" <?php echo base_url('public/assets/audio/music.mp3'); ?>" type="audio/mp3">
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
    <div class="container-fluid bg-dark text-white py-5 cp-0" id="contact">
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
    <script> var baseURL = "<?php echo base_url(); ?>"; </script>
    <script src="<?php echo base_url('public/assets/js/main.js') . '?v=' . rand(); ?>"></script>
    <script>
        $(document).ready(function () {
            <?php if (!empty($data->show_modal) && !is_null($data->show_modal) && $data->show_modal == true) { ?>
                $("#confirmationModal").modal('show');
            <?php } ?>
        });
    </script>
</body>

</html>