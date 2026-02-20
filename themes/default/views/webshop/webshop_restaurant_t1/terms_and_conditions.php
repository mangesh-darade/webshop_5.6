<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - About Us Two</title>
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
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$assets?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="manifest" href="<?=$assets?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=$assets?>restaurant/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="google-site-verification" content="vaKLz762nEBRW-9yZ1dHDuoBm2UAQNH15mSfjY6C9r0" />

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
    data-vs-img="<?= !empty($setting_map['banner_image']) ? $uploads . $setting_map['banner_image'] : $uploads . 'webshop/default_banner.png' ?>"
        data-overlay="black" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content text-center pt-65 pt-lg-140 pb-95 pb-lg-175">
                <h1 class="breadcumb-title sec-title1 text-white my-0">Terms And Conditions</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Terms And Conditions</li>
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
                        <!-- <p class="h3 text-font10 text-theme" id="heading">Our Brave</p> -->
                        <!-- <h2 class="sec-title1 about-title mb-10 mb-md-20">About Us</h2> -->
                        <p class="about-text mb-xl-55"><?= isset($terms_and_conditions->page_text) ? $terms_and_conditions->page_text : '' ?></p>
                        <!-- <div id="content" class="pb-30" style="font-weight: bold  ;"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

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
        const title = '<?= !empty($setting_map['title']) ? $setting_map['title'] : "Default Website Title" ?>';
        document.querySelector("title").textContent = `Terms And Condition - ${title}`;
    </script>
</body>

</html>