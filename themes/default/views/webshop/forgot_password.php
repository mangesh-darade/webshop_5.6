<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Forgot Password</title>
        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap.min.css" media="all" /> -->
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/font-awesome.min.css" media="all" />
        <!-- <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/bootstrap-grid.min.css" media="all" /> -->
        <!-- <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/bootstrap-reboot.min.css" media="all" /> -->
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/font-techmarket.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/slick.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/techmarket-font-awesome.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/slick-style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/colors/<?= $webshop_settings->theme_color ?>.css" media="all" />

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $uploads ?>logos/favicon-16x16.png">
        <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/custom.css" media="all" />  
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
                            <a href="<?= base_url('webshop/index') ?>">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            <a href="<?= base_url('webshop/your_account') ?>">My Account</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Forgot Password
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="col-md-6 offset-md-3">
                                    <span class="anchor" id="formChangePassword"></span>
                                    <?php if($this->session->flashdata('message')){  
                                        echo '<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';  
                                     } else if($this->session->flashdata('error')){
                                         echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                                     }else if($this->session->flashdata('warning')){
                                         echo '<div class="alert alert-warning">'.$this->session->flashdata('warning').'</div>';
                                     }else if($this->session->flashdata('info')){
                                        echo '<div class="alert alert-info">'.$this->session->flashdata('info').'</div>';
                                     } 
                                   ?>
                                    <div class="container padding-bottom-3x mb-2 mt-5">
                                        <div class="row justify-content-center p-3">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="forgot">
                                                    <h2>Forgot your password?</h2>
                                                    <p>Change your password in three easy steps. This will help you to secure your password!</p>
                                                    <ol class="list-unstyled">
                                                        <li><span class="text-primary text-medium">1. </span>Enter your email id or mobile number below.</li>
                                                        <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary password code</li>
                                                        <li><span class="text-primary text-medium">3. </span>Use the code to reset your password</li>
                                                    </ol>
                                                </div>
                                                <form class="card mt-4">
                                                    <div class="card-body mb-2">
                                                        <div class="form-group "> <label class="mb-2" for="email-for-pass">Enter your email or mobile</label> 
                                                        <input class="form-control mb-2" type="text" id="email-for-pass" required="">
                                                        <small class="form-text text-muted">Enter the email address or mobile number you used during the registration.</small> </div>
                                                    </div>
                                                    <div class="card-footer d-flex justify-content-between align-items-center p-3"> 
                                                        <button name="reset_paword" class="woocommerce-Button button" type="submit">Reset Password</button> 
                                                        <span class="float-right"><a href="<?=base_url("webshop/login")?>" class="" >Back to Login</a></span> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    
        <script type="text/javascript" src="<?= $assets ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/tether.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/hidemaxlistitem.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/scrollup.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/waypoints-sticky.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/pace.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/slick.min.js"></script>
        <script type="text/javascript" src="<?= $assets ?>js/scripts.js"></script>

    </body>
</html>