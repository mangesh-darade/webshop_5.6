<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>New Customer Registration - Herbinn Micro Medicines</title>
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

<body class="" style="top: 100px;">
    <?php include_once('header.php'); ?>
    <div class="main shop">

        <div class="container">
            <div class="main-row">
                <div class="main-content shop-new-customer">

                    <h1>New Customer Registration</h1>

                    <p>Creating an online shopping account is fast and easy.</p>
                    <p>By registering, your billing and shipping addresses will be saved for future orders. Also, after placing an order you can access your account here to track your packages.</p>

                    <!-- <form name="registerform" class="form form-horizontal" id="registerform" method="post" action="FirstTimeRegistration.asp?dest=" novalidate="novalidate"> -->
                    <form name="register" class="form form-horizontal" id="registerform" method="post" action="<?= baseUrl('webshop/register') ?>" validate="novalidate">
                        <input type="hidden" name="submit_register" value="Register">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <div class="form-group">
                            <label class="control-label col-lg-3" for="txtfirstname">First name*</label>
                            <div class="col-lg-5">
                                <input name="first" type="text" class="form-control" id="txtfirstname" value="" maxlength="15">
                            </div>
                            <small id="firstNameError" class="text-danger error-text">Only alphabets are allowed.</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="txtlastname">Last name*</label>
                            <div class="col-lg-5">
                                <input name="last" type="text" class="form-control" id="txtlastname" value="" maxlength="20">
                            </div>
                            <small id="lastNameError" class="text-danger error-text">Only alphabets are allowed.</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="billtocountry">Country*</label>
                            <div class="col-lg-5">
                                <select name="country_code" class="form-control" id="billtocountry">
                                    <!-- <option value="002">Afghanistan</option>
                                    </option> -->
                                    <?php
                                    if (is_array($country)) {
                                        foreach ($country as $countrycode) {
                                            echo ($country);
                                            $value = $countrycode->code . '~' . $countrycode->name;
                                            $selected = '';
                                            if ((isset($postdata['country']) && $postdata['country'] == $value)
                                                // ||  (!isset($postdata['country']) && $countrycode->code == '+971')
                                            ) {
                                                $selected = 'selected';
                                            } else {
                                                if ($countrycode->code == "+91" && $countrycode->name == "India") {
                                                    $selected = 'selected';
                                                }
                                            }
                                            echo '<option value="' . $value . '" ' . $selected . ' data-fulltext="' . $countrycode->name . ' (' . $countrycode->code . ')" phonedigits="' . $countrycode->phone_digits . '">' . $countrycode->name . ' (' . $countrycode->code . ')</option>';
                                            // echo '<option value="' . $value . '" ' . $selected . ' data-fulltext="' . $countrycode->name . ' (' . $countrycode->code . ')" phonedigits="' .$countrycode->phone_digits'">' . $countrycode->name . ' (' . $countrycode->code . ')</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="txtphone">Mobile Number *</label>
                            <div class="col-lg-5">
                                <input name="phone" type="" class="form-control" id="phone" value="" maxlength="10">
                            </div>
                            <small id="phoneError" class="text-danger error-text">Enter correct number of digits and not starting with a "0".</small>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="txtemail">Email </label>
                            <div class="col-lg-5">
                                <input name="email" type="email" class="form-control" id="txtemail" value="">
                            </div>
                            <small id="emailError" class="text-danger error-text">Please enter correct email format (eg. name@domain.com)</small>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3" for="txtregpassword">Password *</label>
                            <div class="col-lg-5">
                                <input name="passwd" autocomplete="off" type="password" class="form-control" id="txtregpassword" value="">
                                <!-- <span class="help-block"><strong>Password requirements:</strong><br>At least 8 characters (no spaces)<br>No more than 10 characters<br>Uppercase and lowercase letters<br>At least 1 number</span> -->
                                <button type="button" id="togglePasswordRegister" class="passToggler"
                                    style="position:absolute; right:5%; top:60%; transform:translateY(-50%); border:none; background:none;">
                                    <img src="<?= $assets ?>nw_theme/images/eye-hide.png" alt="Hide" width="20" height="20">
                                </button>
                            </div>
                            <small id="passError" class="text-danger error-text">Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.</small>
                        </div>

                        <!-- <div class="form-group">
                            <label class="control-label col-lg-3" for="txtregpassword2">Re-enter Password</label>
                            <div class="col-lg-5">
                                <input name="txtregpassword2" autocomplete="off" type="password" class="form-control" id="txtregpassword2" value="" maxlength="10">
                            </div>
                        </div> -->

                        <?php if ($this->session->flashdata('toast_error')) { ?>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-3">
                                    <p type="submit" class="" style="color:red"><?= $this->session->flashdata('toast_error') ?></p>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-3">
                                <button type="submit" class="btn btn-primary btn-morris btn-lg">Register</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6" style="display:flex">
                                <p>Already have an account ?</p>
                                <a style="padding: 0% 0% 0% 2%" type="button" href="<?= baseUrl('webshop/login') ?>" class="btn btn-morris btn-lg">Go to login</a>
                            </div>
                        </div>
                    </form>

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
    <script type="text/javascript" src="<?= $assets ?>nw_theme/js/jquery.validate.min.js"></script>

    <script>
        // function initCountryCodeBehavior() {
        //     const selects = document.querySelectorAll('.country_code');

        //     selects.forEach(select => {
        //         if (!select) {
        //             console.warn("Select element not found.");
        //             return;
        //         }

        //         // Store the full country text as a data attribute
        //         for (let i = 0; i < select.options.length; i++) {
        //             const option = select.options[i];
        //             option.setAttribute('data-fulltext', option.text);
        //         }

        //         function updateSelectedDisplay() {
        //             const selectedOption = select.options[select.selectedIndex];
        //             const countryCode = selectedOption.value.split('~')[0];
        //             selectedOption.textContent = countryCode;

        //             for (let i = 0; i < select.options.length; i++) {
        //                 const option = select.options[i];
        //                 if (option !== selectedOption) {
        //                     option.textContent = option.getAttribute('data-fulltext');
        //                 }
        //             }
        //         }

        //         updateSelectedDisplay();
        //         select.addEventListener('change', updateSelectedDisplay);
        //     });
        // }

        // document.addEventListener('DOMContentLoaded', initCountryCodeBehavior);
    </script>
    <script src="<?= $assets ?>nw_theme/js/register.js" defer></script>
    <script type="module" src="<?= $assets ?>nw_theme/js/common.js" defer></script>
    <script>
        const assets = "<?= $assets ?>";
    </script>
</body>

</html>