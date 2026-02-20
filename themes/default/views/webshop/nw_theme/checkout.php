<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>Checkout - Herbinn Micro Medicines</title>
    <meta name="description" content="Established in the year 1994 we Herbinn Micro Medicines">
    <link href="//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:600" rel="stylesheet" type="text/css">
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=20090901" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/shop-tweaks.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css" media="screen" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/common.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">


    <style>
        .top-nav-product-finder {
            display: none;
        }
    </style>



    <style>
        .notify {
            color: #EE6600;
            padding-top: 3px;
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
                <div class="main-content shop-bill-ship">


                    <div class="checkout-steps">
                        <ol>
                            <li class="current"><span>Billing/Shipping</span></li>

                        </ol>
                    </div>

                    <h1>Billing / Shipping Info</h1>

                    <?php

                    $session_customer = $this->session->webshop;
                    $nameArr = explode(" ", trim($session_customer->name));
                    $billing_first_name =  $nameArr[0];
                    $billing_last_name = $nameArr[1];
                    $billing_email = $session_customer->email;
                    $billing_phone = $session_customer->phone;


                    $subtotal = 0;
                    ?>

                    <form name="checkout" id="custinfoform" class="form form-horizontal" method="post" action="<?= base_url('webshop/submit_order') ?>" novalidate>
                        <?php if (is_array($cart_items) && count($cart_items)) {
                            foreach ($cart_items as $itemKey => $item) {
                                $subtotal += ((float) $item['quantity'] * (float) $item['product_price']); ?>
                                <input type="hidden" name="item_id[<?= $itemKey ?>]"
                                    value="<?= $item['product_id'] ?>" />
                                <input type="hidden" name="option_id[<?= $itemKey ?>]"
                                    value="<?= $item['variant_id'] ?>" />
                                <input type="hidden" name="option_price[<?= $itemKey ?>]"
                                    value="<?= $item['variant_price'] ?>" />
                                <input type="hidden" name="item_unit_quantity[<?= $itemKey ?>]"
                                    value="<?= $item['unit_quantity'] ?>" />
                                <input type="hidden" name="item_quantity[<?= $itemKey ?>]"
                                    value="<?= $item['quantity'] ?>" />
                                <input type="hidden" name="item_unit_price[<?= $itemKey ?>]"
                                    value="<?= $item['product_price'] ?>" />
                                <input type="hidden" name="item_tax_rate[<?= $itemKey ?>]"
                                    value="<?= $item['tax_rate'] ?>" />
                                <input type="hidden" name="item_tax_method[<?= $itemKey ?>]"
                                    value="<?= $item['tax_method'] ?>" />
                                <input type="hidden" name="item_promotion_price[<?= $itemKey ?>]"
                                    value="<?= $item['promotion_price'] ?>" />
                                <input type="hidden" name="item_product_price[<?= $itemKey ?>]"
                                    value="<?= $item['price'] ?>" />
                            <?php } ?>
                        <?php }
                        ?>
                        <input type="hidden" id="cart_subtotal_amt" name="cart_subtotal_amt"
                            value="<?= ($subtotal) ?>" />
                        <input type="hidden" id="cart_total" name="cart_total"
                            value="<?= $subtotal ?>" />
                        <input type="hidden" id="" name="submit_order"
                            value="<?= md5(date('Y-m-d H')) ?>" />
                        <input type="hidden" id="coupon_code_id" name="coupon_code_id" value="" />
                        <input type="hidden" id="coupon_code_value" name="coupon_code_value"
                            value="" />
                        <input type="hidden" id="coupon_code" name="coupon_code"
                            value="" />
                        <input type="hidden" id="coupon_discount_rate" name="coupon_discount_rate"
                            value="" />
                        <input type="hidden" id="coupon_discount_amount"
                            name="coupon_discount_amount" value="" />
                        <input type="hidden" id="shipping_charges" name="shipping_charges"
                            value="0" />
                        <!-- <input type="hidden" name="billing_and_shipping_address_is_same"
                            id="billing_and_shipping_address_is_same"
                            value="<?= $billing_and_shipping_address_is_same ?>"> -->

                        <fieldset id="userbilling">
                            <legend>Billing Address</legend>
                            <!-- <p class="required-notice" style="display: flex;justify-content: center;align-items: center;">* = required to complete your order</p> -->

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtfirstname">First name*</label>
                                <div class="col-lg-5">
                                    <input name="billing_first_name" type="text" class="form-control" id="txtfirstname" value="<?= $billing_first_name ?>" required>
                                    <small id="fNameError" class="text-danger error-text">Please enter only alphabets</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtlastname">Last name*</label>
                                <div class="col-lg-5">
                                    <input name="billing_last_name" type="text" class="form-control" id="txtlastname" value="<?= $billing_last_name ?>" required>
                                    <small id="lNameError" class="text-danger error-text">Please enter only alphabets</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtaddress1">Address*</label>
                                <div class="col-lg-5">
                                    <input name="billing_address_1" type="text" class="form-control" id="txtaddress1" value="<?= isset($postdata['billing_address_1']) ? $postdata['billing_address_1'] : '' ?>" required>
                                    <small id="add1Error" class="text-danger error-text">Please enter valid address</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtaddress2">Apt/Suite *</label>
                                <div class="col-lg-5">
                                    <input name="billing_address_2" type="text" class="form-control" id="txtaddress2" value="<?= isset($postdata['billing_address_2']) ? $postdata['billing_address_2'] : '' ?>" required>
                                    <small id="add2Error" class="text-danger error-text">Please enter valid address</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtcity">City*</label>
                                <div class="col-lg-5">
                                    <input name="billing_city" type="text" class="form-control" id="txtcity" value="<?= isset($postdata['billing_city']) ? $postdata['billing_city'] : '' ?>" required>
                                    <small id="cityError" class="text-danger error-text">Please enter city</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtstate">State/Province*</label>
                                <div class="col-lg-5">
                                    <select name="billing_state" class="form-control" id="txtstate" required>
                                        <?php
                                        if (is_array($state_list)) {
                                            foreach ($state_list as $state) {
                                                var_dump($state);
                                                $selected = isset($postdata['shipping_state']) && $postdata['shipping_state'] == ($state['name'] . '~' . $state['code']) ? 'selected' : '';
                                                echo '<option value="' . $state['name'] . '~' . $state['code'] . '" ' . $selected . '  data-country-id="' . ($state['country_id']) . '">' . $state['name'] . '</option>';
                                                // echo '<option value="' . htmlspecialchars($state['name'] . '~' . $state['code']) . '" ' . $selected . ' data-country-id="' . htmlspecialchars($state['country_id']) . '">' . htmlspecialchars($state['name']) . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <small id="stateError" class="text-danger error-text">Please select a value</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="billtocountry">Country*</label>
                                <div class="col-lg-5">
                                    <select name="billing_country" class="form-control" id="billtocountry" required>
                                        <?php
                                        if (is_array($country)) {
                                            foreach ($country as $countrycode) {
                                                $phoneDigits = $countrycode->phone_digits;
                                                $value = $countrycode->code. '~' . $countrycode->name;
                                                $id = $countrycode->id;
                                                $selected = '';
                                                if (isset($postdata['billing_country']) && $postdata['billing_country'] == $value) {
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="' . $value . '" ' . $selected . ' data-country-id="' . ($id) . '" phonedigits="' . ($phoneDigits) . '">' . $countrycode->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <small id="countryError" class="text-danger error-text">Please select a value</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtphone">Phone*</label>
                                <div class="col-lg-5">
                                    <input name="billing_phone" type="text" class="form-control" id="txtphone" value="<?= $billing_phone ?>" required>
                                    <small id="phoneError" class="text-danger error-text">Please enter a valid phone number</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtemail">Email*</label>
                                <div class="col-lg-5">
                                    <input name="billing_email" type="email" class="form-control" id="txtemail" value="<?= $billing_email ?>" required>
                                    <small id="emailError" class="text-danger error-text">Please enter a valid email</small>
                                </div>
                            </div>
                        </fieldset>

                        <div class="alert alert-info bill-ship-same">
                            <label for="billtocopy">
                                <input type="checkbox" name="billing_and_shipping" id="billtocopy" value="1" checked="">
                                Shipping address same as Billing Address (Uncheck if different).
                            </label>
                            <input type="hidden" name="billing_and_shipping_address_is_same"
                                id="billing_and_shipping_address_is_same"
                                value="<?= $billing_and_shipping_address_is_same ?>">
                            <!-- <a href="#" class="alert-link" style="text-decoration:underline;">Select From Address Book</a> -->
                        </div>

                        <fieldset id="usershipping" style="display: none;">
                            <legend>Shipping Address</legend>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtsfirstname">First name*</label>
                                <div class="col-lg-5">
                                    <input name="shipping_first_name" type="text" class="form-control" id="txtsfirstname" value="<?= isset($postdata['shipping_first_name']) ? $postdata['shipping_first_name'] : '' ?>" maxlength="15" required>
                                    <small id="fNameErrorS" class="text-danger error-text">Please enter only alphabets</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtslastname">Last name*</label>
                                <div class="col-lg-5">
                                    <input name="shipping_last_name" type="text" class="form-control" id="txtslastname" value="<?= isset($postdata['shipping_last_name']) ? $postdata['shipping_last_name'] : '' ?>" maxlength="20" required>
                                    <small id="lNameErrorS" class="text-danger error-text">Please enter only alphabets</small>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtsaddress1">Address*</label>
                                <div class="col-lg-5">
                                    <input name="shipping_address_1" type="text" class="form-control" id="txtsaddress1" value="<?= isset($postdata['shipping_address_1']) ? $postdata['shipping_address_1'] : '' ?>" required>
                                    <small id="add1ErrorS" class="text-danger error-text">Please enter valid address</small>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtsaddress2">Apt/Suite *</label>
                                <div class="col-lg-5">
                                    <input name="shipping_address_2" type="text" class="form-control" id="txtsaddress2" value="<?= isset($postdata['shipping_address_2']) ? $postdata['shipping_address_2'] : '' ?>" required>
                                    <small id="add2ErrorS" class="text-danger error-text">Please enter valid address</small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtscity">City*</label>
                                <div class="col-lg-5">
                                    <input name="shipping_city" type="text" class="form-control" id="txtscity" value="<?= isset($postdata['shipping_city']) ? $postdata['shipping_city'] : '' ?>" required>
                                    <small id="cityErrorS" class="text-danger error-text">Please enter a valid city</small>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtsstate">State*</label>
                                <div class="col-lg-5">
                                    <select name="shipping_state" class="form-control" id="txtsstate" required>
                                        <?php
                                        if (is_array($state_list)) {
                                            foreach ($state_list as $state) {
                                                $countryId = $state['country_id'];
                                                $selected = isset($postdata['shipping_state']) && $postdata['shipping_state'] == ($state['name'] . '~' . $state['code']) ? 'selected' : '';
                                                echo '<option value="' . $state['name'] . '~' . $state['code'] . '" ' . $selected . ' data-country-id="' . $countryId . '">' . $state['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <small id="stateErrorS" class="text-danger error-text">Please select a value</small>


                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-lg-3" for="shiptocountry">Country*</label>
                                <div class="col-lg-5">

                                    <select name="shipping_country" class="form-control" id="shiptocountry" required>
                                        <?php
                                        if (is_array($country)) {
                                            foreach ($country as $countrycode) {
                                                $value = $countrycode->name;
                                                $id = $countrycode->id;
                                                $digits = $countrycode->phone_digits;
                                                $selected = '';
                                                if (isset($postdata['billing_country']) && $postdata['billing_country'] == $value) {
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="' . $value . '" ' . $selected . ' data-country-id="' . $id . '" phonedigits="' . $digits . '" >' . $countrycode->name . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <small id="countryErrorS" class="text-danger error-text">Please select a value</small>

                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtsphone">Phone*</label>
                                <div class="col-lg-5">

                                    <input name="shipping_phone" type="text" class="form-control" id="txtsphone" value="<?= isset($postdata['shipping_phone']) ? $postdata['shipping_phone'] : '' ?>" required>

                                    <small id="phoneErrorS" class="text-danger error-text">Please enter a valid phone number</small>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3" for="txtsemail">Email*</label>
                                <div class="col-lg-5">

                                    <input name="shipping_email" type="email" class="form-control" id="txtsemail" value="<?= isset($postdata['shipping_email']) ? $postdata['shipping_email'] : '' ?>" required>
                                    <small id="emailErrorS" class="text-danger error-text">Please enter valid address</small>
                                </div>
                            </div>


                        </fieldset>





                        <input type="radio" name="payment_method" value="ccavenue" id="ccavenue" required="" checked="">
                        <label for="ccavenue">Online Payment</label>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <button type="submit" class="btn-checkout" id="btn-continue">Continue</button>
                            </div>
                        </div>

                        <div class="seals">
                            <!-- <img src="<?= $assets ?>nw_theme/images/secure-credit-card-payment.jpg" alt="Secure credit card payment" title="Secure credit card payment" class="img-responsive secure-cc"> -->

                        </div><!--/seals-->



                    </form>


                </div>
                <div class="main-sidebar">

                    <h3>Testimonial</h3>
                    <div class="review">
                        <p>I was a previous customer and I made a mistake typing in my shipping address. Someone from Herbinn Micro Medicines noticed the difference and reached out to verify what I typed was correct to make sure I received my order. A+ service</p>
                        <span class="reviewer">-Joyce W.</span>
                    </div>
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
    <script type="text/javascript">
        var form_custinfo = document.getElementById("custinfoform");
        form_custinfo.onkeyup = function(e) {

        }
    </script>

    <script src="<?= $assets ?>custom_js/common.js"></script>
    <script src="<?= $assets ?>nw_theme/js/checkout.js"></script>
    <script type="module" src="<?= $assets ?>nw_theme/js/common.js"></script>
</body>

</html>