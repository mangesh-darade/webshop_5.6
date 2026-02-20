<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>Login - Herbinn Micro Medicines</title>
    <meta name="description" content="Established in the year 1994 we Herbinn Micro Medicines">
    <link href="//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:600" rel="stylesheet" type="text/css">
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=20090901" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/shop-tweaks.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
    <link href="<?= $assets ?>nw_theme/css/common.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">

    <style>
        .top-nav-product-finder {
            display: none;
        }
    </style>



    <style id="dark-reader-style" type="text/css">
        @media screen {
            html {
                -webkit-transition: -webkit-filter 300ms linear;
            }
        }
    </style>
</head>


<body>

    <?php include_once('header.php'); ?>

    <div class="main login">

        <div class="container">
            <div class="main-row">
                <div class="main-content ">

                    <h1>Login</h1>


                    <div class="row">
                        <div class="col-md-6 returning-customers" style="margin-bottom:30px;">
                            <h3 class="title">Returning Customers</h3>

                            <!-- <form name="registeredshopper" method="POST" action="<?= baseUrl('webshop/login') ?>" > -->
                            <form name="loginform" method="POST" action="<?= baseUrl('webshop/login') ?>" id="loginform">
                                <input type="hidden" name="return_page" value="<?= $return_page ? $return_page : 'webshop/index' ?>" />
                                <!-- <input type="hidden" name="return_page"  value="webshop/register"/> -->
                                <input type="hidden" name="submit_login" value="Login" />
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />


                                <div class="form-group">
                                    <label for="regtxtemail">Mobile Number</label>
                                    <!-- <input type="text" autocomplete="off" name="regtxtemail" id="regtxtemail" class="form-control" value=""> -->
                                    <input type="number" autocomplete="off" name="phone" id="webshop_phone" class="form-control" value="" pattern="\d+">
                                    <small id="phoneErrorLogin" class="text-danger error-text">Enter correct mobile number not starting with "0".</small>
                                </div>
                                <div class="form-group">
                                    <label for="txtregpassword">Password</label>
                                    <!-- <input type="password" autocomplete="off" name="txtregpassword" id="txtregpassword" class="form-control" value=""> -->
                                    <div style="display:flex">
                                        <input type="password" autocomplete="off" name="webshop_password" id="webshop_password" class="form-control" value="">
                                        <button type="button" id="togglePasswordLogin" class="passToggler"
                                            style="border:none; background:none;">
                                            <img src="<?= $assets ?>nw_theme/images/eye-hide.png" alt="Hide" width="20" height="20">

                                        </button>
                                    </div>
                                    <small id="passError" class="text-danger error-text" style="margin : 0.5% 0% 2% 0%">Please enter your password</small>

                                    <!-- <p><small><a href="<?= baseUrl("webshop/forgot_password") ?>"><i class="icon-question-mark"></i> Forgot password?</a></small></p> -->
                                    <p><small><a href="<?= baseUrl("webshop/forgot_password") ?>"><i class="icon-question-mark"></i> Forgot password?</a></small></p>
                                </div>
                                <!-- <p class="error-msg-login <?php if ($this->data['validated'] !== null) {
                                                                    if ($this->data['validated']) { ?>
                                                        error-hide  <?php
                                                                    } else { ?>
                                                        error-show <?php
                                                                    }
                                                                } else { ?>
                                                    error-hide  <?php } ?>">
                                    Invalid mobile number or password
                                </p> -->
                                <p class="error-msg-login 
    <?= ($this->data['validated'] === null || $this->data['validated'] === true)
        ? 'error-hide'
        : 'error-show'; ?>">
                                    Invalid mobile number or password
                                </p>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>

                        <div class="col-md-5 col-md-offset-1 new-customers">
                            <h3 class="title">New Customers</h3>
                            <p><a href="<?= baseUrl("webshop/register") ?>" class="btn btn-primary">Create an account</a></p>
                            <p style="margin-bottom:0.5em;">Creating an account lets you:</p>
                            <ul>
                                <li>Track your packages</li>
                                <li>Checkout faster by saving your billing and shipping addresses for future orders</li>
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="main-sidebar">
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php'); ?>
    <div class="search-overlay"></div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-free-shipping">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 120%">FREE standard shipping only available in the contiguous United States.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $assets ?>nw_theme/js/main.js"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>
    <script src="<?= $assets ?>nw_theme/js/login.js" defer></script>
    <script type="module" src="<?= $assets ?>nw_theme/js/common.js" defer></script>
    <script>
        const assets = "<?= $assets ?>";
    </script>
</body>

</html>