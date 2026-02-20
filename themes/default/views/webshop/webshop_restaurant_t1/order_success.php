<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - Checkout</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Meenatshi Chettinadu Restaurant">
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
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $assets ?>restaurant/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $assets ?>restaurant/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $assets ?>restaurant/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $assets ?>restaurant/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $assets ?>restaurant/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $assets ?>restaurant/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $assets ?>restaurant/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $assets ?>restaurant/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $assets ?>restaurant/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?= $assets ?>restaurant/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $assets ?>restaurant/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $assets ?>restaurant/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $assets ?>restaurant/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

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
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">
</head>

<body>

    <!--==============================
            Header Area
    ==============================-->
    <?php
    include_once('header.php');
    ?>

    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 background-image link-inherit mb-30"
        data-vs-img="<?= $uploads ?>webshop/banner.jpg" data-overlay="black" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content text-center pt-65 pt-lg-140 pb-95 pb-lg-175">
                <h1 class="breadcumb-title sec-title1 text-white my-0">Checkout</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
    Checkout Area
    ==============================-->
   <h1>Success</h1>

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
    <div class="sidemenu-wrapper d-none d-lg-block  ">
        <div class="sidemenu-content">
            <button class="closeButton border-theme text-theme bg-theme-hover sideMenuCls"><i
                    class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?= $assets ?>restaurant/img/cart/cart-img-1-1.jpg"
                                    alt="Cart Image">Hot
                                Burger</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>40.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?= $assets ?>restaurant/img/cart/cart-img-1-2.jpg"
                                    alt="Cart Image">Vegetable</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>99.00</span>
                            </span>
                        </li>

                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?= $assets ?>restaurant/img/cart/cart-img-1-3.jpg"
                                    alt="Cart Image">Pop
                                Pizza</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>56.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?= $assets ?>restaurant/img/cart/cart-img-1-4.jpg"
                                    alt="Cart Image">Onion & Tomato</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>23.00</span>
                            </span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item">
                            <a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a>
                            <a href="#"><img src="<?= $assets ?>restaurant/img/cart/cart-img-1-5.jpg"
                                    alt="Cart Image">Cool Drinks</a>
                            <span class="quantity">1 ×
                                <span class="woocommerce-Price-amount amount">
                                    <span class="woocommerce-Price-currencySymbol">$</span>100.00</span>
                            </span>
                        </li>
                    </ul>
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Subtotal:</strong>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">$</span>318.00</span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="cart.html" class="vs-btn style1 wc-forward">View cart</a>
                        <a href="checkout.html" class="vs-btn style1 checkout wc-forward">Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll Top Top Button -->
    <!-- <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a> -->


    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="<?= $assets ?>restaurant/js/vendor/jquery.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script src="<?= $assets ?>restaurant/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $assets ?>restaurant/js/bootstrap.min.js"></script>
    <!-- Layer Slider -->
    <script src="<?= $assets ?>restaurant/js/greensock.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.transitions.js"></script>
    <!-- Counter js -->
    <script src="<?= $assets ?>restaurant/js/jquery.counterup.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/waypoints.min.js"></script>
    <!-- Date Picker -->
    <script src="<?= $assets ?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?= $assets ?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="<?= $assets ?>restaurant/js/jquery.nice-select.min.js"></script>
    <!-- Custom Carousel -->
    <script src="<?= $assets ?>restaurant/js/vscustom-carousel.min.js"></script>
    <!-- Mobile Menu -->
    <script src="<?= $assets ?>restaurant/js/vsmenu.min.js"></script>
    <!-- Form Js -->
    <script src="<?= $assets ?>restaurant/js/ajax-mail.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <!-- Image Loaded -->
    <script src="<?= $assets ?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="<?= $assets ?>restaurant/js/main.js"></script>
    <script type="text/javascript" src="<?= $assets ?>restaurant/js/checkout.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
    </script>

</body>

</html>