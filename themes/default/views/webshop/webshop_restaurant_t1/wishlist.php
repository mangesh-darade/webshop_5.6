<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - Wishlist</title>
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
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="manifest" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
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

    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/index.css" />    
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">

</head>

<body>

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
                <h1 class="breadcumb-title sec-title1 text-white my-0">Wishlist</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>" class="color"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Wishlist</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
      Wishlist Area
    ==============================-->
    <!-- <h1>Hiiiii</h1> -->
    <div class="container-fluid">
    <?php 
    // print_r(($wishlist['items'][0]));
    $sectionKey = md5('wishlist');
                                                 
        if(is_array($wishlist['items'])){ ?> 
            <div class="food-box-layout3" >        
                <div class="row justify-content-center align-items-center">  <?php
                foreach ($wishlist['items'] as $product) { ?> 
                    <div class="col-sm-6 col-md-2 wishlist-products">
                        <div>
                            <span class="addToCartBtn" id=<?= $product['id'] ?> tax_rate="<?= $product['tax_rate'] ? $product['tax_rate'] : 0 ?> " tax_method="<?= $product['tax_method'] ? $product['tax_method'] : 0 ?>" price="<?= $product['price'] ? $product['price'] : 0 ?>" promotion_price="<?= $product['promo_price'] ? $product['promo_price'] : 0  ?>" product_price="<?= $product['price'] ? $product['price'] : 0 ?>" quantity="1" >Add to Cart</span> 
                        </div>                                                                  
                        <div class="vs-food-box selectProduct">                                    
                            <div class="food-image image-scale-hover">                                        
                                <a href="<?= base_url("webshop/product_details/" . md5($product['id'])) ?>" productid="<?= $product['id'] ?>">
                                    <img src='<?= $thumbs . $product['image'] ?>' alt=<?= $product['name']. "Image" ?> productid=<?= $product['id'] ?> class="product-images"/>
                                </a>
                            </div>
                            <div class="food-content">
                                <span class="food-price"><?= $product['price'] ?  $this->sma->formatMoney($product['price'], 2) : $this->sma->formatMoney(0, 2) ?></span>
                                <h3 class="food-title h4 mb-0 ">
                                    <a href="<?= base_url("webshop/product_details/" . md5($product['id'])) ?>" productid="<?= $product['id'] ?>" class="product_name"><?= $product['name'] ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
                </div>
            </div><?php 
        } else{ ?>
        <h2>Wishlist is empty</h2>
            <?php }?>
    </div>
    <!--==============================
            Footer Area
    ==============================-->
    <?php
    include_once('footer.php');
    ?>
    
    <!-- header cart -->
    <?php  include_once('header_cart.php')  ?>
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

    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/wishlist.js"></script>

    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
    </script>

</body>

</html>