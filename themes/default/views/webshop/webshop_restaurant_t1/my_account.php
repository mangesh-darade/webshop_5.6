<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Enjoy Food at Meenatshi Chettinadu Restaurant Today!</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Enjoy the rich, spicy taste of South Indian cuisine at Meenatshi Chettinadu Restaurant. Dine in or order online for a true South Indian food experience.">
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
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="manifest" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="google-site-verification" content="vaKLz762nEBRW-9yZ1dHDuoBm2UAQNH15mSfjY6C9r0" />


    <!--==============================
        All CSS File
    ============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/bootstrap.min.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/flaticon.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/fontawesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/jquery.datetimepicker.min.css">
    <!-- Layer Slider -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/nice-select.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/style.css">
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/theme-color1.css">
    <link rel="stylesheet" id="themeColor" href="#">

    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/index.css" />
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/my_account.css">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/tracking_order.css">
    <!-- my_account.css -->

</head>

<body>

    <?php include_once('header.php'); ?>

    <div id="my_account">
        <div id="my-account-tabs">
            <p class="account-tab" id="profile-tab-account">
                <img src="<?= $assets . 'restaurant/img/my_profile_icon.svg' ?>" />
                My Profile
            </p>
            <p class="account-tab" id="orders-tab-account">
                <img src="<?= $assets . 'restaurant/img/my_orders_icon.svg' ?>" />
                My Orders
            </p>
            <!-- <p class="account-tab" id="wishlist-tab-account">
                <img src="<?= $assets . 'restaurant/img/my_wishlist_icon.svg' ?>" />    
                My Wishlist
            </p>
            <p class="account-tab" id="savedPayment-tab-account">
                <img src="<?= $assets . 'restaurant/img/my_saved_payments_icon.svg' ?>" />
                My Saved Payments
            </p> -->
        </div>
        <!-- <div id="account-tabs-line">
            <div></div>
        </div> -->
        <hr />

        <?php include_once('my_profile.php'); ?>

        <?php include_once('address_modal.php'); ?>

        <?php include_once('my_orders.php'); ?>

        <?php include_once('my_order_details.php'); ?>

        <!-- <?php include_once('my_wishlist.php'); ?>

        <?php include_once('my_saved_payments.php'); ?> -->



    </div>

    <!-- <img href="<?= $assets ?>restaurant/img/user.svg" class="account-icon"/>
            <img href="<?= $assets ?>restaurant/img/my-orders.svg" class="account-icon"/>
            <img href="<?= $assets ?>restaurant/img/wishlist.svg" class="account-icon"/>
            <img href="<?= $assets ?>restaurant/img/saved-payments.svg" class="account-icon"/> -->

    <!--==============================
            Footer Area
    ==============================-->
    <?php
    include_once('footer.php');
    ?>

    <!-- header cart -->
    <?php include_once('header_cart.php')  ?>
    <!--  -->

    <!-- Scroll Top Top Button -->
    <!-- <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a> -->


    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script defer src="<?= $assets ?>restaurant/js/vendor/jquery.min.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script defer src="<?= $assets ?>restaurant/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script defer src="<?= $assets ?>restaurant/js/bootstrap.min.js"></script>
    <!-- Layer Slider -->
    <script defer src="<?= $assets ?>restaurant/js/greensock.min.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/layerslider.transitions.js"></script>
    <!-- Counter js -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.counterup.min.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/waypoints.min.js"></script>
    <!-- Date Picker -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.nice-select.min.js"></script>
    <!-- Custom Carousel -->
    <script defer src="<?= $assets ?>restaurant/js/vscustom-carousel.min.js"></script>
    <!-- Mobile Menu -->
    <script defer src="<?= $assets ?>restaurant/js/vsmenu.min.js"></script>
    <!-- Form Js -->
    <script defer src="<?= $assets ?>restaurant/js/ajax-mail.js"></script>
    <!-- Google Map js -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <!-- Image Loaded -->
    <script defer src="<?= $assets ?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script defer src="<?= $assets ?>restaurant/js/main.js"></script>

    <!-- <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/index.js"></script> -->
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/my_account.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/my_profile.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/my_orders.js"></script>
    <script>
        let baseUrl = "<?= base_url('webshop') ?>";
        let assets = "<?= $assets ?>";
        // let currencySymbol = <?= isset($settings->symbol) ? json_encode($settings->symbol) : '"د.إ"'; ?>;      
        let currencySymbol = "<?php echo $this->data['Settings']->symbol; ?>";
        const uploads = "<?= $uploads ?>";
    </script>

</body>

</html>