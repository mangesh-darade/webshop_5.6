<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Your Account</title>

        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap.min.css" media="all" /> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/font-awesome.min.css" media="all" />
        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap-grid.min.css" media="all" /> -->
        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap-reboot.min.css" media="all" /> -->
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/colors/<?=$webshop_settings->theme_color?>.css" media="all" />
        
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=$uploads?>logos/favicon-16x16.png">
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/custom.css" media="all" />  
    </head>
    <body class="page-template-default page woocommerce-wishlist can-uppercase">
        <div id="page" class="hfeed site">            
            <?php 
            
                include_once('header.php'); 
                
            ?>            
            <div id="content" class="site-content">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="<?=base_url('webshop/index')?>">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                           
                            Your Account
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <header class="entry-header">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">Your Account</h1>
                                        </div>
                                    </header>
                                    <!-- .entry-header -->                                     
                                    
                                    
                                   <div class="homev3-slider-with-banners row">
                                     
                                    <div class="slider-with-6-banners column-2">
                                        <div class="banner text-in-left" >
                                            <a href="<?=base_url("webshop/your_address")?>">
                                                <div style="background-color: #f9f9f9;  height: 165px;" class="banner-bg ">
                                                    <div class="row">
                                                        <div class="col-sm-9">                                                        
                                                            <div class="caption">
                                                                <div class="banner-info">
                                                                    <h4 class="pretitle">Shipping Address </h4>
                                                                    <h3 class="title">                                                                
                                                                        <strong class="text-default-2">Your Address</strong>                                                                
                                                                        <br><br><small>Add , Edit & View Address</small>
                                                                    </h3>                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <i class="fa fa-address-card-o text-default" style="font-size:4em;"></i>
                                                        </div>   
                                                    </div>
                                                    <!-- .caption -->
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner text-in-left">
                                            <a href="<?=base_url("webshop/your_orders")?>">
                                                <div style="background-color: #f9f9f9; height: 165px;" class="banner-bg">
                                                    <div class="row"> 
                                                        <div class="col-sm-9"> 
                                                            <div class="caption">
                                                                <div class="banner-info">  
                                                                    <h4 class="pretitle">Shoppings</h4>
                                                                    <h3 class="title">
                                                                        <strong class=" text-default-2">Your Orders</strong>
                                                                        <br><br><small>Track, Return & Buy Again</small></h3>
                                                                </div>
                                                                <!-- .banner-info -->
                                                            </div>
                                                            <!-- .caption -->
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <i class="fa fa-shopping-basket text-default" style="font-size:4em;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner text-in-left">
                                            <a href="<?=base_url("webshop/your_profile")?>">
                                                 <div style="background-color: #f9f9f9; height: 165px;" class="banner-bg">
                                                    <div class="row"> 
                                                        <div class="col-sm-9">     
                                                            <div class="caption">
                                                                <div class="banner-info">
                                                                    <h4 class="pretitle">Account</h4>
                                                                    <h3 class="title"> 
                                                                        <strong class=" text-default-2">Your Profile</strong>
                                                                        <br><br><small>Edit Your Details, Upload Photo</small></h3>
                                                                </div>
                                                                <!-- .banner-info -->                                                         
                                                            </div>
                                                            <!-- .caption -->
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <i class="fa fa-user-circle-o text-default" style="font-size:4em;"></i>
                                                        </div>
                                                    </div>    
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner text-in-left">
                                            <a href="<?=base_url("webshop/wishlist")?>">
                                                 <div style="background-color: #f9f9f9; height: 165px;" class="banner-bg">
                                                    <div class="row"> 
                                                        <div class="col-sm-10">    
                                                            <div class="caption">
                                                                <div class="banner-info">
                                                                    <h4 class="pretitle">Your Liked</h4>
                                                                    <h3 class="title">
                                                                        <strong class=" text-default-2">Your Wishlist</strong>
                                                                        <br><br><small>View, Delete  & Buy Items</small></h3>
                                                                </div>
                                                                <!-- .banner-info -->
                                                            </div>
                                                            <!-- .caption -->
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <i class="fa fa-heart-o text-default" style="font-size:4em;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner text-in-left">
                                            <a href="<?=base_url("webshop/change_password")?>">
                                                 <div style="background-color: #f9f9f9; height: 165px;" class="banner-bg">
                                                    <div class="row"> 
                                                        <div class="col-sm-9">    
                                                            <div class="caption">
                                                                <div class="banner-info">
                                                                    <h4 class="pretitle">Forgot Password</h4>
                                                                    <h3 class="title">
                                                                        <strong class="text-default-2">Change Password</strong>
                                                                        <br><br><small>Change Your Account Password</small></h3>
                                                                </div>
                                                                <!-- .banner-info -->                                                        
                                                            </div>
                                                            <!-- .caption -->
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <i class="fa fa-key text-default" style="font-size:4em;"></i>                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                        <div class="banner small-banner text-in-left">
                                            <a href="#<?php //echo base_url("webshop/my_views_history")?>">
                                                 <div style="background-color: #f9f9f9; height: 165px;" class="banner-bg">
                                                    <div class="row"> 
                                                        <div class="col-sm-10">     
                                                            <div class="caption">
                                                                <div class="banner-info">
                                                                    <h4 class="pretitle">View History</h4>
                                                                    <h3 class="title">
                                                                        <strong class="text-default-2">Your Views</strong>
                                                                        <br><br><small>Past View Items History</small></h3>
                                                                </div>
                                                                <!-- .banner-info -->                                                         
                                                            </div>
                                                            <!-- .caption -->
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <i class="fa fa-list-alt text-default" style="font-size:4em;"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- .banner-bg -->
                                            </a>
                                        </div>
                                        <!-- .banner -->
                                    </div>
                                    <!-- .slider-with-6-banners -->
                                </div>
                                     
                                </div>
                                <!-- .hentry -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
            <!-- #content -->
           <?php include_once('footer.php'); ?>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/tether.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/scrollup.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/waypoints-sticky.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/pace.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/slick.min.js"></script>
        <script type="text/javascript" src="<?=$assets?>js/scripts.js"></script>
        
    </body>
</html>