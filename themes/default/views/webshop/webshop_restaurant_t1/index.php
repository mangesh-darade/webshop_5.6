<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Experience authentic Chettinadu cuisine at Meenatshi Restaurant in Al Quoz, Dubai. Dine in or order online for the real taste of South Indian flavors.">
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
    <meta property="og:image" content="<?= $uploads ?>webshop/og_image.jpg" />
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>

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
<?php if($this->session->flashdata('message')): ?>
    <div id="logoutMessage" class="custom-toast show">
        <?= $this->session->flashdata('message') ?>
    </div>

    <style>
        .custom-toast {
            position: fixed !important;
            top: 20px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            background-color: #d1e7dd;
            color: #0f5132;
            padding: 15px 25px;
            border-radius: 8px;
            border: 1px solid #badbcc;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            font-size: 16px;
            opacity: 0;
            z-index: 9999;
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .custom-toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0) !important;
        }

        .custom-toast.hide {
            opacity: 0;
            transform: translateX(-50%) translateY(-20px) !important;
        }
    </style>

    <script>
        setTimeout(function () {
            var toast = document.getElementById('logoutMessage');
            if (toast) {
                toast.classList.remove('show');
                toast.classList.add('hide');
                setTimeout(function () {
                    toast.style.display = 'none';
                }, 400);
            }
        }, 3000);
    </script>
<?php endif; ?>




<body>
    

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
            <h1 class="breadcumb-title sec-title1 text-white my-0"><?= !empty($setting_map['index_heading']) ? $setting_map['index_heading'] : " " ?></h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>" class="color"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active"><a href="<?=$uploads?>webshop/pdf/Meenatshi_chettinadu_restaurant_menu.pdf" target="_blank" type="application/pdf">Menu</a></li>
                </ul>
            </div>
        </div>
    </div>

   <?php include("restaurant_non_working_banner.php")?>

    <!--==============================
      Food Box Area
    ==============================-->
    <section class="vs-food-box-wrapper food-box-layout3 position-relative link-inherit py-10 ">
        <div class="container-fluid">
            <div class="food-menu-wrapper food-menu-style1 list-style-none text-center pt-10 pb-lg-50 pb-20 px-100">
                <ul class="nav nav-tabs d-block border-0" role="tablist" id="categories">

                <?php
                    $preCat = $this->data["categories"];
                    $catgeories_ranking = $this->data['catgeories_ranking'];
                    if (is_array($preCat)) {
                        $categories = $preCat["main"];
                        $first = true;
                        foreach ($categories as $category) {  
                            
                            ?>
                            <li class="categoryList">                                
                                <a class="vs-btn mask-style3 categories <?= $first ? 'active' : '' ?>  <?= ($this->data['restaurant_is_active'][0] == 'false' || $category->categoryActive == 'false') ? 'greyOutCategory' : "" ?>"
                                id="<?= $category->id ?>" 
                                data-toggle="tab"
                                href="#foodTabContent" 
                                role="tab" 
                                aria-controls="party-food"
                                aria-selected="<?= $first ? 'true' : 'false' ?>">
                                    <?= $category->name ?>
                                </a>     
                                <div class="categoryInfoPill">
                                    <p>
                                        <?= (    
                                                !empty($category->categoryInfoText) 
                                                        ?    
                                                    ($category->categoryInfoText[0] == "All*" 
                                                            ? 
                                                    "All Days" . (($category->categoryInfoText[1]) ? "<br/>" . $category->categoryInfoText[1] : "") 
                                                            : 
                                                    $category->categoryInfoText[0] . (($category->categoryInfoText[1]) ? "<br/>" . $category->categoryInfoText[1] : ""))
                                                        :
                                                ""
                                            )
                                             
                                        ?>
                                    </p>
                                </div>                           
                            </li>
                        <?php
                        $first = false; 
                        }
                    }
                ?>
                </ul>
            </div>      
            
            <div id="category-available-banner">
                <!-- <p>Want it? Come back next time!</p>
                <p>Biryani available on Mondays, Thursdays, & Saturdays from 7:00 AM to 11:00 AM</p> -->
            </div>

            <div id="specialItems"></div>
            <div id="divi">
                <div id="division"></div>
            </div>
            <div class="tab-content" id="foodTabContent"> 
            </div>          
        </div>
    </section>

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

    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/index.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script>
        var baseUrl = "<?= base_url('webshop/') ?>"; 
        const title = '<?= !empty($setting_map['title']) ? $setting_map['title'] : "Default Website Title" ?>';
        document.querySelector("title").textContent = title;
    </script>

</body>

</html>