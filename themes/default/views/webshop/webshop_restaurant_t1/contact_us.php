<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Chettinadu Restaurant in Al Quoz, Dubai</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Visit or contact Meenatshi Chettinadu Restaurant in Al Quoz, Dubai. Reach out for dine-in, delivery or catering we're happy to serve you!">
    <meta name="keywords" content="Meenatshi Chettinadu Restaurant" />
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==============================
	   Google Web Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cookie&family=Roboto:wght@300;400;500;700&family=Rufina:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$assets?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="manifest" href="<?=$assets?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=$assets?>restaurant/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/bootstrap.min.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/flaticon.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/fontawesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/jquery.datetimepicker.min.css">
    <!-- Layer Slider -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/nice-select.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/style.css">
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/theme-color1.css">
    <link rel="stylesheet" id="themeColor" href="#">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">

</head>

<body>

<style>
    :root {
    --body-color: black; 
}
</style>
    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   		Code Start From Here 
	******************************** -->
    <?php           
        include_once('header.php');       
    ?>
    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 background-image link-inherit  mb-30"
        data-vs-img="<?= $uploads ?>webshop/banner.jpg" data-overlay="black" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content text-center pt-65 pt-lg-140 pb-95 pb-lg-175">
                <h1 class="breadcumb-title sec-title1 text-white my-0">Contact Us</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
      About Area
    ==============================-->
    <section class="vs-about-wrapper vs-about-layout5">
        <div class="container">
            <div class="row flex-row-reverse py-20">                
                <div class="col-lg-12">
                    <div class="about-content py-50 px-50" style="width: 100%;">
                        <p class="about-text mb-xl-55"><?= isset($contact_us->page_text) ? $contact_us->page_text : '' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
        Appointment Form 
    ==============================-->
    <!-- <section
        class="appointment-form-wrapper appointment-form-layout1 background-image z-index-common bg-fixed pt-lg-140 pt-60 pb-lg-120 pb-30"
        data-vs-img="<?=$assets?>restaurant/img/appointment/appointment-bg-1-1.jpg" data-overlay="title" data-opacity="7" id="contact" style = " display :none;">
        <div class="container position-relative">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <div class="vs-appointment mb-40">
                        <h2 class="h1 text-white">Make An Appoinment</h2>
                        <p class="sec-text text-white">Proactively monetize economically sound sources before
                            enterprise-wide
                            web-readiness.</p>
                    </div>
                </div>
                <div class="col-xl-10">
                    <form action="#" class="appointment-form-style1">
                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <i class="fal fa-calendar-alt"></i>
                                <input type="text" id="aptDay" autocomplete="off" class="form-control date-pick"
                                    placeholder="Select Date">
                            </div>
                            <div class="col-lg-4 form-group">
                                <i class="fal fa-user"></i>
                                <input type="number" id="aptGuests" autocomplete="off" class="qty-input form-control"
                                    placeholder="Total Guests">
                            </div>
                            <div class="col-lg-4 form-group">
                                <button id="aptSubmit1" type="submit" class="vs-btn style1 rounded-0 w-100"
                                    data-toggle="modal" data-target="#appointmentPopup">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Popup Appointment -->
    <!-- <div class="modal fade" id="appointmentPopup" aria-hidden="true" style = " display :none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-theme"><i class="fal fa-times fa-1x"></i></span>
                    </button>
                    <form action="#" class="popup-appointment-form pt-lg-20 pb-lg-25 px-lg-20 ">
                        <h2 class="form-title mb-0">Reservation</h2>
                        <span class="h3 text-theme text-font3 d-block mb-30">Book a Table</span>
                        <div class="form-group mb-20">
                            <input type="number" placeholder="Guests" id="aptMainGuest" class="form-control bg-smoke">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="form-group mb-20">
                            <input type="text" autocomplete="off" placeholder="Date Select" id="aptMainDate"
                                class="form-control bg-smoke date-pick">
                            <i class="fal fa-calendar-alt"></i>
                        </div>
                        <div class="form-group mb-20">
                            <input type="text" autocomplete="off" placeholder="Time Select"
                                class="form-control bg-smoke time-pick">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="form-group mb-20">
                            <input type="text" placeholder="Booking Purpose" class="form-control bg-smoke">
                            <i class="fal fa-question-circle"></i>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="vs-btn mx-auto style1 rounded-0">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!--==============================
        Testimonial Area
    ==============================-->
    <!-- <section class="vs-testimonial-wrapper vs-testimonial-layout3 pt-lg-150 pt-60 pb-lg-120 pb-30" style = " display :none;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11 col-lg-9 col-xl-7">
                    <div class="section-title text-center ">
                        <span class="sec-subtitle text-theme h3">Our Customers</span>
                        <h2 class="sec-title1">Client’s Feedback</h2>
                        <p class="sec-text text-md">Assertively myocardinate robust e-tailers for extensible human
                            capital. dpropriately benchmark <a href="#" class="text-theme">turnkey</a> networks.</p>
                        <div class="sec-line">
                            <img src="<?=$assets?>restaurant/img/shape/sec-title-1.png" alt="Section Shape Icon">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row vs-carousel arrow-has-margin" data-slidetoshow="2" data-arrows="true" data-mdslidetoshow="1"
                data-smslidetoshow="1" data-xsslidetoshow="1">
                <div class="col-lg-6">
                    <div class="vs-testimonial text-center bg-smoke px-15 px-md-40 px-xl-60 py-15 py-md-35 py-xl-95">
                        <p class="testimonial-text text-md mb-lg-35">“ Progressively strategize compelling metrics
                            whereas impactful architectures. Rapidiously fabricate multifunctional customer ”</p>
                        <div class="author-image">
                            <img src="<?=$assets?>restaurant/img/testimonial/testimonial-author-2-1.jpg" alt="Testimonial Author Image">
                        </div>
                        <span class="testimonial-bg-icon"><i class="flaticon-left-quote icon-3x"
                                data-opacity="1"></i></span>
                        <h3 class="author-name mb-0">Algernon Freddy</h3>
                        <span>Managing Director</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="vs-testimonial text-center bg-smoke px-15 px-md-40 px-xl-60 py-15 py-md-35 py-xl-95">
                        <p class="testimonial-text text-md mb-lg-35">“ Progressively strategize compelling metrics
                            whereas impactful architectures. Rapidiously fabricate multifunctional customer ”</p>
                        <div class="author-image">
                            <img src="<?=$assets?>restaurant/img/testimonial/testimonial-author-2-1.jpg" alt="Testimonial Author Image">
                        </div>
                        <span class="testimonial-bg-icon"><i class="flaticon-left-quote icon-3x"
                                data-opacity="1"></i></span>
                        <h3 class="author-name mb-0">Algernon Freddy</h3>
                        <span>Managing Director</span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="vs-testimonial text-center bg-smoke px-15 px-md-40 px-xl-60 py-15 py-md-35 py-xl-95">
                        <p class="testimonial-text text-md mb-lg-35">“ Progressively strategize compelling metrics
                            whereas impactful architectures. Rapidiously fabricate multifunctional customer ”</p>
                        <div class="author-image">
                            <img src="<?=$assets?>restaurant/img/testimonial/testimonial-author-2-1.jpg" alt="Testimonial Author Image">
                        </div>
                        <span class="testimonial-bg-icon"><i class="flaticon-left-quote icon-3x"
                                data-opacity="1"></i></span>
                        <h3 class="author-name mb-0">Algernon Freddy</h3>
                        <span>Managing Director</span>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <!--==============================
			Footer Area
	==============================-->
    <?php           
        include_once('footer.php');       
    ?>
    <!--********************************
					Code End  Here 
	******************************** -->

    <!--==============================
    Sidemenu
============================== -->
    <!-- header cart -->
    <?php  include_once('header_cart.php')  ?>
    <!--  -->
    <!-- Scroll Top Top Button -->
    <!-- <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a> -->


    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="<?=$assets?>restaurant/js/vendor/jquery.min.js"></script>
    <script src="<?=$assets?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script src="<?=$assets?>restaurant/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=$assets?>restaurant/js/bootstrap.min.js"></script>
    <!-- Layer Slider -->
    <script src="<?=$assets?>restaurant/js/greensock.min.js"></script>
    <script src="<?=$assets?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="<?=$assets?>restaurant/js/layerslider.transitions.js"></script>
    <!-- Counter js -->
    <script src="<?=$assets?>restaurant/js/jquery.counterup.min.js"></script>
    <script src="<?=$assets?>restaurant/js/waypoints.min.js"></script>
    <!-- Date Picker -->
    <script src="<?=$assets?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?=$assets?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="<?=$assets?>restaurant/js/jquery.nice-select.min.js"></script>
    <!-- Custom Carousel -->
    <script src="<?=$assets?>restaurant/js/vscustom-carousel.min.js"></script>
    <!-- Mobile Menu -->
    <script src="<?=$assets?>restaurant/js/vsmenu.min.js"></script>
    <!-- Form Js -->
    <script src="<?=$assets?>restaurant/js/ajax-mail.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <!-- Image Loaded -->
    <script src="<?=$assets?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="<?=$assets?>restaurant/js/main.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/about_us.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
    </script>
</body>

</html>