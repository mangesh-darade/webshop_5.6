<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>Login & Registration</title>

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
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/colors/<?= $webshop_settings->theme_color ?>.css"
        media="all" />



    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $uploads ?>logos/favicon-16x16.png">
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/custom.css" media="all" />




</head>

<body class="page home page-template-default">
    <div id="page" class="hfeed site">


        <?php
           
                include_once('header.php'); 
           
            ?>

        <div id="content" class="site-content">
            <div class="col-full">
                <div class="row">
                    <nav class="woocommerce-breadcrumb">
                        <a href="<?= base_url("webshop") ?>">Home</a>
                        <span class="delimiter">
                            <i class="tm tm-breadcrumbs-arrow-right"></i>
                        </span>My Account
                    </nav>
                    <!-- .woocommerce-breadcrumb -->
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <div class="type-page hentry">
                                <div class="entry-content">
                                    <div class="woocommerce">
                                        <div class="customer-login-form">
                                            <span class="or-text">or</span>
                                            <div id="customer_login" class="u-columns col2-set">
                                                <div class="u-column1 col-1">
                                                    <h2>Login</h2>
                                                    <?php
                                                        $hidden = ['return_page' => ($return_page?$return_page:'webshop/index')];
                                                        $attributes = array('name' => 'loginform', 'method' => 'post', 'class' => 'woocomerce-form woocommerce-form-login login');
                                                        echo form_open('webshop/login', $attributes, $hidden);
                                                        ?>
                                                    <p class="before-login-text"></p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="username">Username
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" class="input-text" name="webshop_username"
                                                            id="webshop_username" required="required"
                                                            placeholder="Enter Registered Mobile Or Email Address" />
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="password">Password
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input class="input-text" type="password"
                                                            name="webshop_password" id="webshop_password"
                                                            required="required" />
                                                    </p>
                                                    <p class="form-row">
                                                        <input class="woocommerce-Button button" type="submit"
                                                            value="Login" name="submit_login">
                                                        <label for="rememberme"
                                                            class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                                                            <input
                                                                class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                                name="rememberme" type="checkbox" id="rememberme"
                                                                value="forever" /> Remember me
                                                        </label>
                                                    </p>
                                                    <p class="woocommerce-LostPassword lost_password">
                                                        <a href="<?=base_url("webshop/forgot_password")?>">Lost your
                                                            password?</a>
                                                    </p>
                                                    <?php echo form_close(); ?>
                                                    <!-- .woocommerce-form-login -->
                                                </div>
                                                <!-- .col-1 -->
                                                <div class="u-column2 col-2">
                                                    <h2>Register</h2>
                                                    <?php
                                                        $attributes = array('name' => 'register', 'method' => 'post', 'class' => 'register');
                                                        echo form_open('webshop/register', $attributes, '');
                                                        ?>
                                                    <p class="before-register-text">
                                                        Create new account today to reap the benefits of a personalized
                                                        shopping experience.
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_email">Name
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="text" id="name" name="name" placeholder="Your Name"
                                                            required="required"
                                                            class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_email">Email address
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="email" id="email" name="email"
                                                            placeholder="Email Address" required="required"
                                                            class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_email">Mobile Number
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="tel" id="phone" name="phone"
                                                            placeholder="Mobile Number" required="required"
                                                            class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <label for="reg_password">Password
                                                            <span class="required">*</span>
                                                        </label>
                                                        <input type="password" id="reg_passwd" name="passwd"
                                                            required="required"
                                                            class="woocommerce-Input woocommerce-Input--text input-text">
                                                    </p>
                                                    <p class="form-row">
                                                        <input type="submit" class="woocommerce-Button button"
                                                            name="submit_register" value="Register" />
                                                    </p>
                                                    <div class="register-benefits">
                                                        <h3>Sign up today and you will be able to :</h3>
                                                        <ul>
                                                            <li>Speed your way through checkout</li>
                                                            <li>Track your orders easily</li>
                                                            <li>Keep a record of all your purchases</li>
                                                        </ul>
                                                    </div>
                                                    </form>
                                                    <!-- .register -->
                                                </div>
                                                <!-- .col-2 -->
                                            </div>
                                            <!-- .col2-set -->
                                        </div>
                                        <!-- .customer-login-form -->
                                    </div>
                                    <!-- .woocommerce -->
                                </div>
                                <!-- .entry-content -->
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
        <!-- .site-footer -->
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