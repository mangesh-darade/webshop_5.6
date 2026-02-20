<?php
//  ini_set('display_errors', 1);
// error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Herbinn Micro Medicines</title>
    <meta name="description"
        content="Established in the year 1994 we Herbinn Micro Medicines">
    <link rel="canonical" href="https://herbinnmicromedicines.elintpos.in/webshop">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Oxygen:700" rel="stylesheet"
        type="text/css">
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=210616_01" rel="stylesheet" media="screen"
        charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/print.css" rel="stylesheet" type="text/css" media="print"
        charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css"
        media="screen" charset="utf-8">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/about-us.css">
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">



    <!-- --------------------------------------------------------------------------- -->

    <!--==============================
       Google Web Fonts
    ============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cookie&family=Roboto:wght@300;400;500;700&family=Rufina:wght@400;700&display=swap"
        rel="stylesheet">
    <!--==============================
        All CSS File
    ============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/bootstrap.min.css"> -->
    <!-- Flat Icon -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/flaticon.min.css"> -->
    <!-- Fontawesome Icon -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/fontawesome.min.css"> -->
    <!-- Date Picker -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/jquery.datetimepicker.min.css"> -->
    <!-- Layer Slider -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/layerslider.min.css"> -->
    <!-- Magnific Popup -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/magnific-popup.min.css"> -->
    <!-- Nice Select -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/nice-select.min.css"> -->
    <!-- Slick Slider -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/slick.min.css"> -->
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/style.css">
    <!-- Theme Color CSS -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/theme-color1.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/index.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/img/favicons/manifest.json"> -->
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css"> -->
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/my_account.css">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/tracking_order.css">
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

    <!-- ----------- -->

    <script src="<?= $assets ?>nw_theme/js/main.js?ver=200406"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.magnific-popup-new.min.js"></script>
    <script src="<?= $assets ?>nw_theme/js/welcome-message.js?ver=221017_01"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>

    <!-- ---------------- -->

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

    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/my_account.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/my_profile.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>nw_theme/js/my_orders.js"></script>
    <script>
        let baseUrl = "<?= base_url('webshop') ?>";
        let assets = "<?= $assets ?>";
        // let currencySymbol = <?= isset($settings->symbol) ? json_encode($settings->symbol) : '"د.إ"'; ?>;      
        let currencySymbol = "<?php echo $this->data['Settings']->symbol; ?>";
        const uploads = "<?= $uploads ?>";
        // const token = "<?= $this->security->get_csrf_hash(); ?>"
        // console.log("tokentken", token);
    </script>

</body>

</html>