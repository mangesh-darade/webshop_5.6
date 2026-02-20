<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kokan Bag -Contact Us</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Kokan Bag">
    <meta name="keywords" content="Kokan Bag" />
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==============================
	   Google Web Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        header {
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .contact-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .contact-form button {
            background-color: #ff9900;
            color: white;
        }
        .map-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
        }
    </style>
</head>
<?php           
        include_once('header.php');       
    ?>
<body>
    <div class="container my-5">
        <div class="row g-4">
            <!-- Contact Form -->
            <div class="col-lg-6 col-md-12">
                <div class="contact-section">
                    <h3>Contact Form</h3>
                    <!-- Embedded Form Script -->
                    <iframe 
                        src="https://app.cheerio.in/form/67ee5cfc7eb90ec2d006c085" 
                        width="100%" 
                        height="500px" 
                        frameborder="0" 
                       
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- Info Section -->
            <div class="col-lg-6 col-md-12">
                <div class="contact-section">
                    <h3>Opening Hours</h3>
                    <table class="table">
                        <tr>
                            <td>Sunday</td>
                            <td class="text-end">9AM - 9PM</td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td class="text-end">9AM - 9PM</td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td class="text-end">9AM - 9PM</td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td class="text-end">9AM - 9PM</td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td class="text-end">9AM - 9PM</td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td class="text-end">9AM - 9PM</td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td class="text-end">9AM - 9PM</td>
                        </tr>
                    </table>

                    <h3>Address</h3>
                    <p>📍 67 22nd St - Al Quoz - Al Quoz Industrial Area 4 - Dubai - United Arab Emirates</p>

                    <h3>Customer Support</h3>
                    <p class="fs-5 fw-bold">+971 4 340 3346</p>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container mt-4">
            <h3>Our Location</h3>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.719151842666!2d55.230588!3d25.111366599999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69574437f367%3A0x33776a30d8a4e6b3!2sChoithrams%20Al%20Quoz!5e0!3m2!1sen!2sin!4v1743674136923!5m2!1sen!2sin" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    <?php           
        include_once('footer.php');       
    ?>

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
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
<!-- <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/about_us.js"></script>
<script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
<script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script> -->

</body>

</html>
