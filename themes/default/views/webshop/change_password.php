<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Change Password</title>

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
                            <a href="<?= base_url('webshop/your_account') ?>">Account</a>
                            
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            Change Password
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="col-md-6 offset-md-3 p-3">
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
                                    <!-- form card change password -->
                                    <div class="card card-outline-secondary">
                                        <div class="card-header p-3">
                                            <h3 class="mb-0">Change Password</h3>
                                        </div>
                                        <div class="card-body p-3">                                            
                                                <?php echo form_open('webshop/change_password', ' id="myform" role="form" autocomplete="off" '); ?>
                                                <div class="form-group mb-2">
                                                    <label for="inputPasswordOld" class="mb-2">Current Password</label>
                                                    <?=form_error('current_password')?>
                                                    <input type="password" name="current_password" maxlength="22" class="form-control" id="inputPasswordOld" >
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="inputPasswordNew" class="mb-2">New Password</label>
                                                    <?=form_error('newpassword')?>
                                                    <input type="password" name="newpassword" maxlength="22" class="form-control" id="inputPasswordNew" >
                                                    <span class="form-text small text-muted">
                                                        The password must be 8-22 characters, and must <em>not</em> contain spaces.
                                                    </span>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="inputPasswordNewVerify" class="mb-2">Confirm Password</label>
                                                    <?=form_error('confirm')?>
                                                    <input type="password" name="confirm" maxlength="22" class="form-control" id="inputPasswordNewVerify" >
                                                    <span class="form-text small text-muted mb-5">
                                                        To confirm, type the new password again.
                                                    </span>
                                                </div>
                                                <div class="form-group mb-2 text-end">
                                                    <button type="submit" name="changePassword" class="woocommerce-Button button btn-sm float-right">Change Password</button>
                                                </div>
                                            <?php echo form_close()?>
                                        </div>
                                    </div>
                                    <!-- /form card change password -->

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