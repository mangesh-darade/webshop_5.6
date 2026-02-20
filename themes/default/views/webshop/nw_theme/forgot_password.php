<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>Forgot Password - Herbinn Micro Medicines</title>
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

    <!-- Google tag (gtag.js) -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-PB1C3K06KC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-PB1C3K06KC');
        gtag('config', 'AW-1072698999'); // Adwords
        gtag('config', 'G-JPFC9S1N5L'); //Keith
    </script>
    <style id="dark-reader-style" type="text/css">
        @media screen {
            html {
                -webkit-transition: -webkit-filter 300ms linear;
            }
        }
    </style>
</head>
<!-- tmpl-body-header.php -->

<body>

    <?php include_once('header.php') ?>

    <div class="main shop">

        <div class="container">
            <div class="main-row">
                <div class="main-content shop-request-password">
                    <h1>Reset Password</h1>
                    <!-- <p>Please fill out the following form in order to have your password emailed to you.</p> -->
                    <div id="otp-form" class="form-horizontal" role="form" novalidate>
                        <div class="form-group">
                            <label class="col-lg-offset-1 col-lg-1" for="MobileNo">Mobile No</label>
                            <div class="col-lg-5">
                                <input name="MobileNo" type="tel" class="form-control" id="MobileNo" inputmode="numeric" value="" required="" maxlength="10" minlength="10" pattern="[1-9]{1}[0-9]{9}">
                            </div>
                            <p id="mob-error" class="error-text error-msg">Please enter correct mobile number format</p>
                        </div>
                        <p id="ErrOTP" class="error-msg"></p>
                        <p id="registerWithUs">Looks like you are not registered. <a href="<?= baseUrl('webshop/register') ?>"><strong>Register</strong></a> with us ?</p>
                        <div class="form-group">
                            <div class="col-lg-offset-1 col-lg-3">
                                <button type="submit" id="send-otp-btn" class="btn btn-primary btn-morris">Send OTP</button>
                            </div>
                        </div>
                    </div>

                    <p id="SuccessOTP" class="success-msg"></p>
                    <div id="verify-otp" class="form-horizontal" role="form" novalidate style="display:none">
                        <div class="form-group">
                            <label class="control-label col-lg-offset-1 col-lg-2" for="otp-input">Enter your OTP</label>
                            <div class="col-lg-5">
                                <input name="otp-input" type="text" class="form-control" id="otp-input" value="" required="">
                            </div>
                            <p id="otp-check-prompt" class="error-msg error-text"></p>
                            <p id="otp-expire-prompt" class="error-msg"></p>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-5">
                                <button type="submit" id="verify-otp-btn" class="btn btn-primary btn-morris ">Verify OTP</button>
                                <span id="otp-timer"></span>
                            </div>
                        </div>
                    </div>

                    <form id="reset-pass-div" method="POST" action="<?= base_url('webshop/forgot_password') ?>" class="form-horizontal" role="form" novalidate style="display:none">
                        <div class="form-group">
                            <label class="control-label col-lg-3" for="new_password">Enter new password</label>
                            <div class="col-lg-5" style="display:flex">
                                <input name="new_password" type="password" class="form-control" id="new_password">
                                <button type="button" id="toggleNewPassword" class="passToggler"
                                    style="border:none; background:none;">
                                    <img src="<?= $assets ?>nw_theme/images/eye-show.png" alt="Hide" width="20" height="20">
                                </button>
                            </div>
                        </div>
                        <p id="new-pass-error" class="error-text error-msg col-lg-offset-3">Please enter correct password format</p>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="confirm_password">Confirm new password</label>
                            <div class="col-lg-5" style="display:flex">
                                <input name="confirm_password" type="password" class="form-control" id="confirm_password">
                                <button type="button" id="toggleConfirmNewPassword" class="passToggler"
                                    style="border:none; background:none;">
                                    <img src="<?= $assets ?>nw_theme/images/eye-show.png" alt="Hide" width="20" height="20">
                                </button>
                            </div>
                        </div>
                        <p id="confirm-new-pass-error" class="error-text error-msg col-lg-offset-3">Password and confirm password doesn't match</p>

                        <p id="diff-pass"></p>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-3">
                                <button type="submit" id="change-password-btn" class="btn btn-primary btn-morris">Change password</button>
                            </div>
                        </div>
                        <input type="hidden" name="reset_password" value="1" />
                        <!-- <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" /> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('footer.php') ?>


    <!-- <div class="search-overlay"></div> -->

    <script src="<?= $assets ?>nw_theme/js/main.js"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>

    <script>
        // $(document).ready(function() {
        //     $("#form-password").validate({
        //         rules: {
        //             emailtouse: {
        //                 required: true,
        //                 email: true
        //             }
        //         }
        //     });
        // });
    </script>



    <!-- <div role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></div>
    <div id="chat-widget-container" style="opacity: 1; visibility: visible; z-index: 2147483639; position: fixed; bottom: 0px; width: 84px; height: 84px; max-width: 100%; max-height: calc(100% + 0px); min-height: 0px; min-width: 0px; background-color: transparent; border: 0px; overflow: hidden; right: 0px; transition: none !important;"><iframe allow="clipboard-read; clipboard-write; autoplay; display-capture *;" src="https://secure.livechatinc.com/customer/action/open_chat?license_id=8217371&amp;group=1&amp;embedded=1&amp;widget_version=3&amp;unique_groups=0&amp;organization_id=57290da6-4259-4362-aa80-f8d28b0a0191&amp;use_parent_storage=1&amp;x-region=us-south1" id="chat-widget" name="chat-widget" title="LiveChat chat widget" scrolling="no" style="width: 100%; height: 100%; min-height: 0px; min-width: 0px; margin: 0px; padding: 0px; background-image: none; background-position: 0% 0%; background-size: initial; background-attachment: scroll; background-origin: initial; background-clip: initial; background-color: rgba(0, 0, 0, 0); border-width: 0px; float: none; color-scheme: normal; position: absolute; inset: 0px; transition: none !important; display: none; visibility: hidden;"></iframe><iframe id="chat-widget-minimized" name="chat-widget-minimized" title="LiveChat chat widget" scrolling="no" style="width: 100%; height: 100%; min-height: 0px; min-width: 0px; margin: 0px; padding: 0px; background-image: none; background-position: 0% 0%; background-size: initial; background-attachment: scroll; background-origin: initial; background-clip: initial; background-color: rgba(0, 0, 0, 0); border-width: 0px; float: none; color-scheme: normal; display: block;"></iframe>
        <div aria-live="polite" id="lc-aria-announcer-polite" tabindex="-1" style="height: 1px; width: 1px; margin: -1px; overflow: hidden; white-space: nowrap; border: 0px; padding: 0px; position: absolute;"></div>
        <div aria-live="assertive" id="lc-aria-announcer-assertive" tabindex="-1" style="height: 1px; width: 1px; margin: -1px; overflow: hidden; white-space: nowrap; border: 0px; padding: 0px; position: absolute;"></div>
    </div> -->
    <script>
        const baseUrl = "<?= base_url() ?>";
        const csrfName = "<?= $this->security->get_csrf_token_name(); ?>";
        const csrfHash = "<?= $this->security->get_csrf_hash(); ?>";
        // console.log("baseUrlbaseUrlbaseUrlbaseUrl",baseUrl);
    </script>
    <!-- <script src="<?= $assets ?>nw_theme/js/common.js" defer></script> -->
    <script type="module" src="<?= $assets ?>nw_theme/js/forgot_password.js" defer></script>
    <script>
        const assets = "<?= $assets ?>";
    </script>

</body>

</html>