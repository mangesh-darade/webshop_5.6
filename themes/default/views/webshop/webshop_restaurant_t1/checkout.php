<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - Checkout</title>
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
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $assets ?>restaurant/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $assets ?>restaurant/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $assets ?>restaurant/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $assets ?>restaurant/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $assets ?>restaurant/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $assets ?>restaurant/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $assets ?>restaurant/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $assets ?>restaurant/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $assets ?>restaurant/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?= $assets ?>restaurant/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $assets ?>restaurant/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $assets ?>restaurant/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $assets ?>restaurant/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="google-site-verification" content="vaKLz762nEBRW-9yZ1dHDuoBm2UAQNH15mSfjY6C9r0" />

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
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/checkout.css" />
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/custom.css" />
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">
    <script type="text/javascript" src="<?= $assets ?>custom_js/common.js"></script>


</head>
<style>
    input#shipping_phone{
        margin-left: 35px!important;
    }
    .coupon-btn {
        border-radius: 0px !important;
        padding: 10px 37px !important;
    }
</style>

<body>

    <!--==============================
            Header Area
    ==============================-->
    <?php
    include_once('header.php');
    ?>

    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 background-image link-inherit mb-30"
        data-vs-img="<?= !empty($setting_map['banner_image']) ? $uploads . $setting_map['banner_image'] : $uploads . 'webshop/default_banner.png' ?>"
        data-overlay="black" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content text-center pt-65 pt-lg-140 pb-95 pb-lg-175">
                <h1 class="breadcumb-title sec-title1 text-white my-0">Checkout</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
    Checkout Area
    ==============================-->
    <div class="vs-checkout-area pt-20 pb-lg-120 pb-30">
        <div class="container">
            <form action="<?= base_url('webshop/submit_order') ?>" method="post" name="checkout"
                enctype="multipart/form-data" class="vs-billing-information" id="billingInfo">
                <div class="row justify-content-center text-center mb-5">
                        <div class="col-xl-4">
                                <label for="coupon_code">Have a coupon code?</label>
                                <input class="form-control mb-4" type="text" id="coupon_code" name ="coupon_code" placeholder="Enter coupon code" value=""  onkeydown="return event.key !== ' ';" oninput="this.value = this.value.replace(/\s/g, '')">
                                <button type="submit" class="vs-btn mask-style2 coupon-btn" id="apply_coupon" name= "apply_coupon">Submit</button>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-xl-6">
                        <?php if (is_array($cart_items) && count($cart_items)) { ?>
                        <div class="vs-orderinfo-wrap mb-30 mt-5 mt-xl-0 px-15 px-md-30 py-15 py-md-30 bg-light-theme">
                            <div class="table-responsive">
                                <table class="table table-borderless checkout-ordertable" form="billingInfo"
                                    name="submit_order">
                                    <thead>
                                        <tr>
                                            <th>Product(s)</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orderItems">

                                        <?php
                                            foreach ($cart_items as $itemKey => $item) {

                                                $product_name = $cart_data['products'][$item['product_id']]['name'];
                                                $variant_name = ($item['variant_id']) ? ' (' . $cart_data['variants'][$item['variant_id']]['name'] . ')' : '';
                                                ?>
                                        <tr>
                                            <td><?= $product_name ?></td>
                                            <td>
                                                <p style="display:inline;">
                                                    <?= (float) $item['quantity'] ?> x
                                                    <?= $this->sma->formatMoney((float) $item['product_price'], 2) ?>
                                                </p>
                                                <p style="display:inline;"> = </sppan>
                                                <p style="display:inline; font-weight: bold;">
                                                    <?= $this->sma->formatMoney(((float) $item['quantity'] * (float) $item['product_price']), 2) ?>
                                                </p>
                                            </td>
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
                                        </tr>
                                        <?php
                                                $subtotal += ((float) $item['quantity'] * (float) $item['product_price']);
                                                $tax = 0;
                                                $shippingCharge = 0;
                                                $total = $subtotal + $tax + $shippingCharge;
                                                $symbol = $Settings->symbol;
                                            }
                                            ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="checkout-subtotal">
                                            <td>Cart Subtotal</td>
                                            <td id="cartSubtotal"> <?= $this->sma->formatMoney($subtotal) ?></td>
                                            <span id="cart_subtotal_amt_display" style="display: none;" ><?= $currency_symbol . ' ' . $subtotal ?></span>
                                            <input type="hidden" id="cart_subtotal_amt" name="cart_subtotal_amt"
                                                value="<?= ($subtotal) ?>" />
                                            <input type="hidden" id="coupon_code_id" name="coupon_code_id" value="" />
                                            <input type="hidden" id="coupon_code_value" name="coupon_code_value"
                                                value="" />
                                            <input type="hidden" id="coupon_discount_rate" name="coupon_discount_rate"
                                                value="" />
                                            <input type="hidden" id="coupon_discount_amount"
                                                name="coupon_discount_amount" value="" />
                                            <input type="hidden" id="cart_total" name="cart_total"
                                                value="<?= $total ?>" />
                                            <input type="hidden" id="shipping_charges" name="shipping_charges"
                                                value="0" />
                                            <!-- <input type="hidden" id="billing_country" name="billing_country"
                                                value="UAE" /> -->
                                            <input type="hidden" id="billing_state" name="billing_state"
                                                value="" />
                                            <input type="hidden" id="shipping_country" name="shipping_country"
                                                value="UAE" />
                                        </tr>
                                        <tr class="checkout-tax">
                                            <td>(+) Tax Charge</td>
                                            <td> <?= $this->sma->formatMoney($tax) ?></td>
                                        </tr>
                                        <tr class="checkout-shipping">
                                            <td>(+) Delivery Charge</td>
                                            <td id="shippingCharge"> <?= $this->sma->formatMoney($shippingCharge) ?>
                                            </td>
                                        </tr>
                                        <tr class="checkout-discount tr-coupon-discount">
                                            <td>(-) Discount</td>
                                            <td id="couponDiscountAmountShow"><?= $this->sma->formatMoney() ?></td>
                                        </tr>
                                        <tr class="checkout-total">
                                            <td>Total</td>
                                            <td id="orderTotal"> <?= $this->sma->formatMoney($total) ?></td>
                                        </tr>
                                        <input type="hidden" id="cart_subtotal_original_amt" value="<?= ($subtotal) ?>" />
                                    </tfoot>
                                </table>
                            </div>
                            <div class="vs-checkout-payment pt-2 pb-2" id="payment-method">
                                <h4 class="title">Select Payment Method</h4>
                                <div class="form-group mb-0" style="display: none;">
                                    <input type="radio" name="payment_method" value="cod" id="cashPayment">
                                    <label for="cashPayment">Payment on pick up</label>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="radio" name="payment_method" value="ccavenue" id="ccavenue" required checked>
                                    <label for="ccavenue">Online Payment</label>
                                </div>
                            </div>
                            <div class="vs-checkout-submit">
                                <p class="text mb-10 fs-small">Your personal data will be used to process your order, support
                                    your
                                    experience throughout this website, and for other purposes described in our
                                    privacy policy.</p>
                                <div class="mb-4 d-flex form-group">
                                    <input type="checkbox" id="checkoutTerms" required form="billingInfo"
                                        class="form-control" style="display: inline-block; visibility: visible;" />
                                    <label for="checkoutTerms" class="pl-10 fs-small"
                                        style="text-decoration: underline; text-decoration-color: orange;">
                                        I have read and agreed to the website terms and conditions*
                                    </label>
                                    <div id="checkout-error" style="color: red; display: none;">Please select terms and condition </div>   

                                </div>
                            </div>
                            <button type="submit" class="vs-btn1 mask-style2 bg-white desktop-btn placeOrder" id="placeOrder"
                                style="color:white; background:#fa8507!important;border: none; padding: 12px;"
                                value="<?= md5(date('Y-m-d H')) ?>" name="submit_order">
                                Place Order
                            </button>
                        </div>
                        <?php } else {

                            redirect("./webshop") ?>

                        <?php } ?>
                    </div>
                    <div class="col-xl-6">
                        <h2 class="form-title h3 text-bold">Billing Information</h2>
                        <!-- <?php
                            $freeDelivery = is_array($pos_settings)
                                ? $pos_settings['eshop_free_delivery_on_order']
                                : (is_object($pos_settings) ? $pos_settings->eshop_free_delivery_on_order : null);

                            if (!empty($freeDelivery) && $total < $freeDelivery) : ?>
                        <div class="alert alert-warning"
                            style="margin-top: 10px; background-color: rgba(250, 133, 7, 0.05); border: none;">
                            <strong>Note:</strong> Free delivery is available only on orders above
                            <?= number_format($freeDelivery) ?> AED. Delivery charges may apply.
                        </div>
                        <?php endif; ?> -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-0 ">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="delivery_mode"
                                            value="Door Delivery" id="Delivery" required checked>
                                        <label class="form-check-label text-bold" for="Delivery">Door Delivery</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="delivery_mode" value="Pickup"
                                            id="Pickup" required>
                                        <label class="form-check-label text-bold" for="Pickup">Pickup</label>
                                    </div>
                                    
                                    <div id="delivery-error" style="color: red; display: none;">Please select delivery mode </div>   

                                    <div id="pickupMessage" style="display: none; margin-top: 10px;">
                                        <p class="mb-0 fs-small">We'll intimate you when the order is ready.</p>
                                        <strong class="fs-small"> Please Pick Up From:</strong><br>
                                        <span class="fs-small"> Meenatshi chettinadu restaurant </span><br>
                                        <span class="fs-small"> 22nd street, opp.choithrams warehouse. AI quoz industrial
                                            area4-dubai</span><br>
                                        <a href="https://maps.app.goo.gl/AE9h2Gd8u1ZLiQmn7" class="fs-small" style="text-decoration: underline;" target="_blank">
                                            <i class="fas fa-location-dot fs-small" style="margin-right: 5px;"></i>Locate Us
                                        </a>

                                    </div>
                                        <div class="col-12" id="pickup-area" style="padding-top: 5px; margin-left: -30px;">
                                            <div class="col-12" id="delivery-area"
                                                style="display: none; padding-left: 15px; padding-top: 10px;">
                                                    <!-- This will be shown only if minimum order is not met -->
                                                <div id="bydefault" class="fs-small">
                                                    <img src="<?= $uploads ?>logos/InfoIcon.svg" alt="info" class="img-fluid "
                                                        style="width: 20px; height: 20px;">
                                                    We currently deliver to the following areas only. Minimum order amounts vary by location.
                                                </div>

                                                <div id="afterclick" style="display: none; align-items: center; gap: 8px;" class="d-flex">
                                                    <!-- <img src="<?= $uploads ?>logos/InfoIcon.svg" alt="info" class="img-fluid"
                                                        style="width: 20px; height: 20px;"> -->
                                                    <span id="minimumOrderMessage" style="color:red;"></span>
                                                </div>
                                                <div class="col-12 input-group-prepend p-0 pb-4">
                                                    <span class="pt-2">Select Area : </span>
                                                    <select class="form-control areadropdown ml-1" id="areachargess"
                                                        name="areacharges">
                                                        <option value="" selected disabled>-- Select Area --</option>
                                                        <?php
                                                        if (is_array($areacharges)) {
                                                            foreach ($areacharges as $area) {
                                                                $value = $area->code . '~' . $area->id;
                                                                $selected = (isset($postdata['areacharges']) && $postdata['areacharges'] == $value) ? 'selected' : '';
                                                            echo '<option value="' . $value . '" 
                                                                data-charges="' . $area->charges . '" 
                                                                data-minimum-order="' . $area->minimum_order . '" 
                                                                ' . $selected . '>' 
                                                                . $area->area . ' (' . number_format($area->charges) . ')</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                </div> <!-- close delivery-area -->
                                        </div> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                // $session_customer = $this->session->userdata('customer_register');
                                $session_customer = $this->session->webshop;
                                                        // var_dump(explode(" ", trim($session_customer->name)));
                                $nameArr = explode(" ", trim($session_customer->name));
                                $billing_first_name =  $nameArr[0];
                                $billing_last_name = $nameArr[1];
                                $billing_email = $session_customer->email;
                                $billing_phone = $session_customer->phone;
                                $billing_phone_length = strlen(str_replace(' ', '', $billing_phone));
                                // $billing_first_name = isset($postdata['billing_first_name']) ? $postdata['billing_first_name'] : (isset($session_customer['first']) ? $session_customer['first'] : '');
                                // $billing_last_name = isset($postdata['billing_last_name']) ? $postdata['billing_last_name'] : (isset($session_customer['last']) ? $session_customer['last'] : '');
                                // $billing_email = isset($postdata['billing_email']) ? $postdata['billing_email'] : (isset($session_customer['email']) ? $session_customer['email'] : '');                                
                                // $billing_phone = isset($postdata['billing_phone']) ? $postdata['billing_phone'] : (isset($session_customer['phone']) ? $session_customer['phone'] : '');
                                //                         var_dump($this->session);
                            ?>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="billing_first_name"
                                            name="billing_first_name"
                                            value="<?= $billing_first_name ?>"
                                            placeholder="Billing First Name*" required pattern="[A-Za-z\s]+"
                                            title="Please enter only letters.">
                                            <div id="firstName-error" style="color: red; display: none;">Please enter First Name </div>   
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="billing_last_name"
                                            name="billing_last_name"
                                            value="<?= $billing_last_name ?>"
                                            placeholder="Billing Last Name*" required pattern="[A-Za-z\s]+"
                                            title="Please enter only letters.">
                                        <div id="lastName-error" style="color: red; display: none;">Please enter Last Name </div>   

                                    </div>
                                    <!-- <div class="col-12 mb-3">
                                            <input type="text" class="form-control" id="billing_company" name="billing_company"
                                                value="<?= isset($postdata['billing_company']) ? $postdata['billing_company'] : '' ?>"
                                                placeholder="Billing Company*">
                                        </div> -->
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="billing_email" name="billing_email"
                                            value="<?= $billing_email ?>"
                                            placeholder="Billing Email" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="input-group">
                                            <div class="col-3 input-group-prepend"
                                                style="padding-left: 0px !important;">
                                                <select class="country_code" id="country_code" name="country_code"
                                                    style="border: 1px solid rgba(0, 0, 0, 0.1); font-size:small;width: 100%; text-align:center;">
                                                    <?php
                                                    if (is_array($country)) {
                                                        foreach ($country as $countrycode) {
                                                            $value = $countrycode->code . '~' . $countrycode->id;
                                                            $selected = '';
                                                            if ((isset($postdata['country']) && $postdata['country'] == $value) ||
                                                                // (!isset($postdata['country']) && $countrycode->code == '+971') || 
                                                                (!isset($postdata['country']) && $countrycode->phone_digits == $billing_phone_length))
                                                                {
                                                                $selected = 'selected';                                                                
                                                            }
                                                            // if($countrycode->code == '+91'){
                                                            //         continue;
                                                            // }
                                                            echo '<option value="' . $value . '" ' . $selected . ' data-fulltext="' . $countrycode->name . ' (' . $countrycode->code . ')">' . $countrycode->name . ' (' . $countrycode->code . ')</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="tel" class="form-control custome-margin" id="billing_phone"
                                                style="margin-left: 1px;" name="billing_phone"
                                                value="<?= $billing_phone ?>"
                                                placeholder="Billing Phone*" required pattern="\d+"
                                                title="Please enter only numbers.">
                                            
                                        </div>
                                            <!-- <div id="phone-error" style="color: red; display: none;">Please enter your contact number </div>    -->

                                        <small id="billing_phone_error" style="color: red; display: none;"></small>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="billing_address_1"
                                            name="billing_address_1"
                                            value="<?= isset($postdata['billing_address_1']) ? $postdata['billing_address_1'] : '' ?>"
                                            placeholder="Billing Address*" required>
                                    <div id="billing_address_1-error" style="color:red; display:none;"></div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="billing_address_2"
                                            name="billing_address_2"
                                            value="<?= isset($postdata['billing_address_2']) ? $postdata['billing_address_2'] : '' ?>"
                                            placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <input type="text" class="form-control" id="billing_city" name="billing_city"
                                            value="<?= isset($postdata['billing_city']) ? $postdata['billing_city'] : '' ?>"
                                            placeholder="Billing City*" required pattern="[A-Za-z\s]+"
                                            title="Please enter only letters.">
                                        <div id="billing_city-error" style="color:red; display:none;"></div>
                                    </div>
                                    <!-- <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="billing_country"
                                            name="billing_country" value="<?= isset($postdata['billing_country']) ? $postdata['billing_country'] : 'UAE' ?>"
                                            placeholder="Billing Address*" required>
                                    </div> -->
                                    <div class="col-md-12 mb-4 input-group">
                                        <select class="form-control" id="billing_country" name="billing_country"
                                            style="border: 1px solid rgba(0, 0, 0, 0.1) !important;" autocomplete="none">
                                            <?php
                                            if (is_array($country)) {
                                                foreach ($country as $countrycode) {
                                                    // $value = $countrycode->id; // use id instead of name
                                                    $value = $countrycode->id . '~' . $countrycode->name;
                                                    $selected = '';
                                                    if ((isset($postdata['billing_country']) && $postdata['billing_country'] == $value) ||
                                                        // (!isset($postdata['billing_country']) && $countrycode->name == 'United Arab Emirates') || 
                                                        (!isset($postdata['billing_country']) && $countrycode->phone_digits == $billing_phone_length) ) 
                                                        {
                                                        $selected = 'selected';
                                                    }
                                                    // if($countrycode->name == 'India'){
                                                    //     continue;
                                                    // }
                                                    echo '<option value="' . $value . '" ' . $selected . '>' . $countrycode->name . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="col-12 mb-3">
                                        <select class="form-control billing-state-dp" id="billing_state" name="billing_state" autocomplete="none">
                                            <option value="" data-country-id="none">Select State</option>
                                            <?php
                                            if (is_array($state_list)) {
                                                foreach ($state_list as $state) {
                                                    $selected = isset($postdata['billing_state']) && $postdata['billing_state'] == ($state['name'] . '~' . $state['code']) ? 'selected' : '';
                                                    echo '<option value="' . $state['name'] . '~' . $state['code'] . '" data-country-id="' . $state['country_id'] . '" ' . $selected . '>' . $state['name'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12" style="padding-left: 15px;">
                                        <!-- <div style="display: flex; align-items: center;">
                                            <img src="<?= $uploads ?>logos/InfoIcon.svg" alt="info" class="img-fluid"
                                                style="width: 20px; height: 20px; margin-right: 8px;"
                                                data-toggle="tooltip"
                                                title="order confirmation, receipt, and delivery updates will be sent via preferred method"
                                                id="info-icon">
                                            <p style="margin: 0;">Would you like to receive your order updates?</p>
                                        </div>-->
                                        <div>
                                            <div class="alert alert-warning fs-small"
                                                style="margin-top: 10px; background-color: rgba(250, 133, 7, 0.05); border: none;">
                                                <strong>Note: </strong>We'll send you the order details & updates on WhatsApp.
                                            </div>
                                            <div class="form-group mb-0 d-flex flex-column"
                                                style="padding-left: 15px; padding-bottom: 10px;">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="order_updates[]" id="whatsapp" value="WhatsApp" checked>
                                                    <label class="form-check-label" for="whatsapp"
                                                        style="font-weight: 300;">WhatsApp</label>
                                                </div>
                                                <div id="whatsapp-error" style="color: red; display: none;">If you want to continue then plese select the checkbox </div>   
                                                <div class="form-check form-check-inline" style="display:none;">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="order_updates[]" id="sms" value="SMS">
                                                    <label class="form-check-label" for="sms"
                                                        style="font-weight: 300;">SMS</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="display:none;">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="order_updates[]" id="email" value="Email">
                                                    <label class="form-check-label" for="email"
                                                        style="font-weight: 300;">Email</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <button type="submit" class="vs-btn mask-style2 bg-white mobile-btn placeOrder" id="placeOrder"
                                            style="color:white; background:#fa8507;border: none; padding: 12px;"
                                            value="<?= md5(date('Y-m-d H')) ?>" name="submit_order">
                                            Place Order
                                        </button> -->
                                    </div>
                                    <!-- <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="billing_postcode"
                                            name="billing_postcode"
                                            value="<?= isset($postdata['billing_postcode']) ? $postdata['billing_postcode'] : '' ?>"
                                            placeholder="Billing Pincode*" required pattern="\d+"
                                            title="Please enter only numbers.">
                                    </div> -->
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <?php
                                        $shipping_check = '';
                                        $billing_and_shipping_address_is_same = 1;
                                        $shipping_show = 'd-none';

                                        if (isset($postdata['ship_to_different_address']) && $postdata['ship_to_different_address'] == 1) {
                                            $shipping_check = 'checked';
                                            $billing_and_shipping_address_is_same = 0;
                                            $shipping_show = '';
                                        }
                                    ?>

                                <div class="form-check mb-3" style = "padding-left: 15px !important;">
                                    <input type="checkbox" class=" form-check-input" id="ship_to_different_address"
                                        name="ship_to_different_address" value="1" <?= $shipping_check ?>>
                                    <label class="form-check-label" for="ship_to_different_address">
                                        Deliver to a different address?
                                    </label>
                                    <input type="hidden" name="billing_and_shipping_address_is_same"
                                        id="billing_and_shipping_address_is_same"
                                        value="<?= $billing_and_shipping_address_is_same ?>">
                                </div>
                                <div id="shipping_fields" class="<?= $shipping_show ?>">
                                    <h4 class="mb-3">Delivery Information</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control shipping-fields"
                                                id="shipping_first_name" name="shipping_first_name"
                                                value="<?= isset($postdata['shipping_first_name']) ? $postdata['shipping_first_name'] : '' ?>"
                                                placeholder="First Name*" >
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control shipping-fields"
                                                id="shipping_last_name" name="shipping_last_name"
                                                value="<?= isset($postdata['shipping_last_name']) ? $postdata['shipping_last_name'] : '' ?>"
                                                placeholder="Last Name*" >
                                        </div>

                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control shipping-fields"
                                                id="shipping_address_1" name="shipping_address_1"
                                                value="<?= isset($postdata['shipping_address_1']) ? $postdata['shipping_address_1'] : '' ?>"
                                                placeholder="Address*" >
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="text" class="form-control shipping-fields"
                                                id="shipping_address_2" name="shipping_address_2"
                                                value="<?= isset($postdata['shipping_address_2']) ? $postdata['shipping_address_2'] : '' ?>"
                                                placeholder="Apartment, suite, unit etc. (optional)">
                                        </div>
                                        <!-- <div class="col-12 mb-3">
                                                <input type="text" class="form-control shipping-fields" id="shipping_country" name="shipping_country"
                                                    value="India" placeholder="Country*" list="shipcountry">
                                                <datalist id="shipcountry">
                                                    <option value="India">
                                                </datalist>
                                            </div> -->
                                        <!-- <div class="col-md-6 mb-3">
                                                <select class="form-select shipping-fields" id="shipping_state" name="shipping_state">
                                                    <option value="">Select State</option>
                                                    <?php
                                                    if (is_array($state_list)) {
                                                        foreach ($state_list as $state) {
                                                            $selected = isset($postdata['shipping_state']) && $postdata['shipping_state'] == ($state['name'] . '~' . $state['code']) ? 'selected' : '';
                                                            echo '<option value="' . $state['name'] . '~' . $state['code'] . '" ' . $selected . '>' . $state['name'] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div> -->
                                        <div class="col-12 mb-3">
                                            <!-- <input type="tel" class="form-control shipping-fields" id="shipping_phone"
                                                name="shipping_phone"
                                                value="<?= isset($postdata['shipping_phone']) ? $postdata['shipping_phone'] : '' ?>"
                                                placeholder="Phone*" > -->


                                                <div class="input-group">
                                            <div class="col-2 input-group-prepend custome_margine"
                                                style="padding-left: 0px !important;">
                                                <select class="country_code" id="country_code1" name="country_code"
                                                    style="border: 1px solid rgba(0, 0, 0, 0.1);width: 100%;" >
                                                    <?php
                                                    if (is_array($country)) {
                                                        foreach ($country as $countrycode) {
                                                            $value = $countrycode->code . '~' . $countrycode->id;
                                                            $selected = '';
                                                            if ((isset($postdata['country']) && $postdata['country'] == $value) ||
                                                                // (!isset($postdata['country']) && $countrycode->code == '+971')
                                                                (!isset($postdata['country']) && $countrycode->phone_digits == $billing_phone_length) ) {
                                                                $selected = 'selected';
                                                            }
                                                       echo '<option value="' . $value . '" ' . $selected . ' data-fulltext="' . $countrycode->name . ' (' . $countrycode->code . ')" data-digits="' . $countrycode->phone_digits . '">' . $countrycode->name . ' (' . $countrycode->code . ')</option>';                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="tel" class="form-control shipping-fields" id="shipping_phone"
                                                name="shipping_phone"
                                                value="<?= isset($postdata['shipping_phone']) ? $postdata['shipping_phone'] : '' ?>"
                                                placeholder="Phone*" pattern="\d+"
                                                title="Please enter only numbers.">
                                            
                                        </div>
                                            <!-- <div id="phone-error" style="color: red; display: none;">Please enter your contact number </div>    -->

                                        <small id="shipping_phone_error" style="color: red; display: none;"></small>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="email" class="form-control shipping-fields" id="shipping_email"
                                                name="shipping_email"
                                                value="<?= isset($postdata['shipping_email']) ? $postdata['shipping_email'] : '' ?>"
                                                placeholder="Email">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control shipping-fields" id="shipping_city"
                                                name="shipping_city"
                                                value="<?= isset($postdata['shipping_city']) ? $postdata['shipping_city'] : '' ?>"
                                                placeholder="City*" >
                                        </div>
                                        <!-- <div class="col-md-6 mb-3">
                                            <input type="text" class="form-control shipping-fields"
                                                id="shipping_postcode" name="shipping_postcode"
                                                value="<?= isset($postdata['shipping_postcode']) ? $postdata['shipping_postcode'] : '' ?>"
                                                placeholder="Pincode*" >
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <div>
                                    <textarea class="form-control pr-0" id="order_comments" name="order_comments"
                                        rows="3"
                                        placeholder="Note About Your Order..."><?= isset($postdata['order_comments']) ? $postdata['order_comments'] : '' ?></textarea>
                                </div> -->

                                <button type="submit" class="vs-btn mask-style2 bg-white mobile-btn placeOrder" id="placeOrder"
                                            style="color:white; background:#fa8507;border: none; padding: 12px;"
                                            value="<?= md5(date('Y-m-d H')) ?>" name="submit_order">
                                            Place Order
                                </button>
                            </div>
                        </div>
                    </div>



                </div>
            </form>
        </div>
    </div>

    <!--==============================
            Footer Area
    ==============================-->
    <?php
    include_once('footer.php');
    ?>

    <!--********************************
                    Code End  Here 
    ******************************** -->
    <!--==============================
    Sidemenu
    ============================== -->
    <!-- header cart -->
    <?php  include_once('header_cart.php')  ?>
    <!--  -->
    <!-- Scroll Top Top Button -->
    <!-- <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a> -->

    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="<?= $assets ?>restaurant/js/vendor/jquery.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script src="<?= $assets ?>restaurant/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $assets ?>restaurant/js/bootstrap.min.js"></script>
    <!-- Layer Slider -->
    <script src="<?= $assets ?>restaurant/js/greensock.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.transitions.js"></script>
    <!-- Counter js -->
    <script src="<?= $assets ?>restaurant/js/jquery.counterup.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/waypoints.min.js"></script>
    <!-- Date Picker -->
    <script src="<?= $assets ?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?= $assets ?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <!-- <script src="<?= $assets ?>restaurant/js/jquery.nice-select.min.js"></script> -->
    <!-- Custom Carousel -->
    <script src="<?= $assets ?>restaurant/js/vscustom-carousel.min.js"></script>
    <!-- Mobile Menu -->
    <script src="<?= $assets ?>restaurant/js/vsmenu.min.js"></script>
    <!-- Form Js -->
    <script src="<?= $assets ?>restaurant/js/ajax-mail.js"></script>
    <!-- Google Map js -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script> -->
    <!-- Image Loaded -->
    <script src="<?= $assets ?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="<?= $assets ?>restaurant/js/main.js"></script>
    <script type="text/javascript" src="<?= $assets ?>restaurant/js/checkout.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    var baseUrl = "<?= base_url('webshop/') ?>";
    const title = '<?= !empty($setting_map['title']) ? $setting_map['title'] : "Default Website Title" ?>';
        document.querySelector("title").textContent =`Checkout - ${title}`;
    </script>
    <script>
    document.getElementById("apply_coupon").addEventListener("click", function(event) {
        var coupon_code = $('#coupon_code').val();
                var cart_amount = $('#cart_subtotal_original_amt').val();    
                apply_coupon(coupon_code , cart_amount);
    });
    document.addEventListener("DOMContentLoaded", function() {
        const checkbox = document.getElementById('ship_to_different_address');
        const shippingFields = document.getElementById('shipping_fields');
        const sameAddressInput = document.getElementById('billing_and_shipping_address_is_same');
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                shippingFields.classList.remove('d-none');
                sameAddressInput.value = 0;
            } else {
                shippingFields.classList.add('d-none');
                sameAddressInput.value = 1;
            }
        });
    });
    </script>
    <script>
    var baseTotal = <?php echo json_encode($total); ?>;
    </script>

    <script>
    $(document).ready(function() {
        $('input[name="delivery_mode"]').on('change', function() {
            if ($('#Delivery').is(':checked')) {
                $('#delivery-area').slideDown();
            } else {
                $('#delivery-area').slideUp();
            }
        });
        // $('#areachargess').on('change', function() {
        //     var currencySymbol = <?= isset($settings->symbol) ? json_encode($settings->symbol) : '"د.إ"'; ?>;
        //     var selected = $(this).find(':selected');
        //     var extraCharges = parseFloat(selected.data('charges')) || 0;
        //     var newTotal = baseTotal + extraCharges;
        //     $('#shippingCharge').text(currencySymbol + ' ' + Math.round(extraCharges));
        //     $('#shipping_charges').val(extraCharges.toFixed(2));
        //     $('#orderTotal').text(currencySymbol + ' ' + Math.round(newTotal));
        // });
        $('#areachargess').on('change', function() {
            $('#pickupMessage').hide();
            var baseTotal = <?php echo json_encode($total); ?>;
            const freeDeliveryThreshold = <?= (float) $freeDelivery ?>;
            var currencySymbol =
                <?= isset($settings->symbol) ? json_encode($settings->symbol) : '"د.إ"'; ?>;
            var selected = $(this).find(':selected');
            var extraCharges = parseFloat(selected.data('charges')) || 0;
            var minimumOrder = parseFloat(selected.data('minimum-order')) || 0;
            var shippingToApply = extraCharges;
            var couponDiscount = parseFloat($("#coupon_discount_amount").val()) || 0;
            var totalAfterDiscount = baseTotal - couponDiscount;
            if (baseTotal < minimumOrder) {
                $('#minimumOrderMessage')
                    .html('We currently deliver to the following areas only.<br>The minimum order amount for the selected location is ' + currencySymbol + ' ' + minimumOrder)
                    .show();
                // $('#placeOrder')
                //     .prop('disabled', true)
                //     .addClass('disabled');
                var totalWithShipping = totalAfterDiscount + extraCharges;
                $('#shippingCharge').text(currencySymbol + ' ' + Math.round(shippingToApply));
                $('#shipping_charges').val(shippingToApply.toFixed(2));
                $('#orderTotal').text(currencySymbol + " " + totalWithShipping.toFixed(2));
                // $('#orderTotal').text(currencySymbol + ' ' + Math.round(totalWithShipping));
                $('#cart_subtotal_amt_display').text(currencySymbol + ' ' + Math.round(totalWithShipping));
                $('#cart_subtotal_amt').val(totalWithShipping.toFixed(2));
                // $('#cart_subtotal_amt').val(Math.round(totalWithShipping));
                $('#afterclick').show();
                $('#bydefault').hide();
            } else {
                $('#minimumOrderMessage').hide();
                $('#afterclick').hide();
                // $('#placeOrder')
                //     .prop('disabled', false)
                //     .removeClass('disabled');
                if (baseTotal >= freeDeliveryThreshold) {
                    shippingToApply = 0;
                    $('#shippingCharge').text(currencySymbol + ' ' + Math.round(shippingToApply));
                    $('#shipping_charges').val(shippingToApply.toFixed(2));
                    // $('#orderTotal').text(currencySymbol + ' ' + Math.round(baseTotal));
                    $('#orderTotal').text(currencySymbol + " " + totalAfterDiscount.toFixed(2));
                    // $('#orderTotal').text(currencySymbol + ' ' + Math.round(totalAfterDiscount));
                    $('#cart_subtotal_amt_display').text(currencySymbol + ' ' + Math.round(totalAfterDiscount));
                    $('#cart_subtotal_amt').val(totalAfterDiscount.toFixed(2));
                    // $('#cart_subtotal_amt').val(Math.round(totalAfterDiscount));
                } else {
                    var totalWithShipping = totalAfterDiscount + extraCharges;
                    $('#shippingCharge').text(currencySymbol + ' ' + Math.round(shippingToApply));
                    $('#shipping_charges').val(shippingToApply.toFixed(2));
                    $('#orderTotal').text(currencySymbol + " " + totalWithShipping.toFixed(2));
                    // $('#orderTotal').text(currencySymbol + ' ' + Math.round(totalWithShipping));
                    $('#cart_subtotal_amt_display').text(currencySymbol + ' ' + Math.round(totalWithShipping));
                    // $('#cart_subtotal_amt').val(Math.round(totalWithShipping));
                    $('#cart_subtotal_amt').val(totalWithShipping.toFixed(2));

                }
                $('#bydefault').show();
            }
            // Default: shipping is actual area charge
            // Check if total (base + charges) is eligible for free delivery
            
        });


    });
    $(document).ready(function() {
        const pickupMessage = $('#pickupMessage');
        $('input[name="delivery_mode"]').on('change', function() {
            const selectedValue = $(this).val();
            const areaDropdown = $('#areachargess');
            if (selectedValue === 'Pickup') {
                $('#minimumOrderMessage').hide();
                pickupMessage.show();
                $('#delivery-area').slideUp(5);
                areaDropdown.val('');
                $('#placeOrder')
                    .prop('disabled', false)
                    .removeClass('disabled');
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?= base_url("webshop/getCartTotal") ?>',
                    success: function(result) {
                        if (result.total) {
                            $('#orderTotal').html(result.total);
                            $('#shippingCharge').text(result.charges);
                            $('#shipping_charges').text(result.charges);
                        }
                    },
                    error: function() {
                        console.log('Error fetching cart total');
                    }
                });
            } else if (selectedValue === 'Door Delivery') {
                pickupMessage.hide();
                $('#delivery-area').slideDown(100);
            }
        });
    });
    // document.getElementById('billing_phone').addEventListener('input', function() {
    //     const phone = this.value.trim();
    //     const errorMsg = document.getElementById('billing_phone_error');
    //     const isValid = /^[1-9][0-9]*$/.test(phone);

    //     if (phone === '' || isValid) {
    //         errorMsg.style.display = 'none';
    //     } else {
    //         errorMsg.textContent = 'Phone number must only contain digits and should not start with 0.';
    //         errorMsg.style.display = 'block';
    //     }
    // });
    // const phoneInput = document.getElementById('billing_phone');
    // phoneInput.addEventListener('keypress', function (e) {
    //     if (!/\d/.test(e.key)) {
    //         e.preventDefault();
    //         return;
    //     }
    //     const cleaned = this.value.replace(/\D/g, '').replace(/^0+/, '');
    //     if (cleaned.length >= 10) {
    //         e.preventDefault();
    //     }
    // });

    // document.getElementById('shipping_phone').addEventListener('input', function() {
    //     const phone = this.value.trim();
    //     const errorMsg = document.getElementById('shipping_phone_error');
    //     const isValid = /^[1-9][0-9]*$/.test(phone);

    //     if (phone === '' || isValid) {
    //         errorMsg.style.display = 'none';
    //     } else {
    //         errorMsg.textContent = 'Phone number must only contain digits and should not start with 0.';
    //         errorMsg.style.display = 'block';
    //     }
    // });

    // document.getElementById('shipping_phone').addEventListener('keypress', function (e) {
    //     if (!/\d/.test(e.key)) {
    //         e.preventDefault();
    //         return;
    //     }
    //     const cleaned = this.value.replace(/\D/g, '').replace(/^0+/, '');
    //     if (cleaned.length >= 10) {
    //         e.preventDefault();
    //     }
    // });
    </script>
    <script>
         ////////////////////First and Last Name Validation ///////////////
        const firstNameInput = document.querySelector('input[name="billing_first_name"]');
        const lastNameInput = document.querySelector('input[name="billing_last_name"]');
        const firstNameError = document.getElementById('firstName-error');
        const lastNameError = document.getElementById('lastName-error');

        function applyNameValidation(input, errorEl) {
            input.addEventListener('input', function () {
                const original = this.value;
                const filtered = original.replace(/[^a-zA-Z\s]/g, '');
                this.value = filtered;

                if (original !== filtered && original !== '') {
                    this.classList.add('is-invalid');
                    errorEl.style.display = 'block';
                } else {
                    this.classList.remove('is-invalid');
                    errorEl.style.display = 'none';
                }
            });
        }

        applyNameValidation(firstNameInput, firstNameError);
        applyNameValidation(lastNameInput, lastNameError);
    </script>
    <script>
        ////////////////////Shipping Phone no Validation ///////////////
        const phoneInput = document.getElementById('shipping_phone');
        const errorMsg = document.getElementById('shipping_phone_error');
        const countrySelect = document.getElementById('country_code1');

        function validatePhone() {
            const phone = phoneInput.value.trim();
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const requiredDigits = parseInt(selectedOption.getAttribute('data-digits'), 10);
            // Allow only digits (no leading 0)
            const isValidFormat = /^[1-9][0-9]*$/.test(phone);
            if (phone === '') {
                errorMsg.style.display = 'none';
                return;
            }
            if (!isValidFormat) {
                errorMsg.textContent = 'Phone number must only contain digits and should not start with 0.';
                errorMsg.style.display = 'block';
                return;
            }
            if (phone.length !== requiredDigits) {
                errorMsg.textContent = `Phone number must be exactly ${requiredDigits} digits.`;
                errorMsg.style.display = 'block';
                return;
            }
            // Passed validation
            errorMsg.style.display = 'none';
        }
        // Validate on input
        phoneInput.addEventListener('input', validatePhone);
        // Restrict typing (only digits, no leading 0, max length)
        phoneInput.addEventListener('keypress', function (e) {
            if (!/\d/.test(e.key)) {
                e.preventDefault();
                return;
            }
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const requiredDigits = parseInt(selectedOption.getAttribute('data-digits'), 10);
            const cleaned = this.value.replace(/\D/g, '').replace(/^0+/, '');

            if (cleaned.length >= requiredDigits) {
                e.preventDefault();
            }
        });

        // Revalidate when country changes
        countrySelect.addEventListener('change', validatePhone);
    </script>
    <script>
        ////////////////////Billing Phone no Validation ///////////////
        function bindPhoneValidation(inputId, errorId, countryCodeId, countryData) {
            const phoneInput = document.getElementById(inputId);
            const errorMsg = document.getElementById(errorId);
            const countrySelect = document.getElementById(countryCodeId);

            // Remove old listeners to avoid duplicates
            phoneInput.replaceWith(phoneInput.cloneNode(true));
            const newPhoneInput = document.getElementById(inputId);

            function getRequiredLength(code) {
                const country = countryData.find(c => c.code === code);
                return country ? parseInt(country.phone_digits) : 10; // fallback 10
            }

            function validatePhone() {
                const phone = newPhoneInput.value.trim();
                const code = countrySelect.value.split("~")[0];
                const requiredLength = getRequiredLength(code);
                const isValidDigits = /^[1-9][0-9]*$/.test(phone);

                if (phone === '') {
                    errorMsg.style.display = 'none';
                    return;
                }

                if (!isValidDigits) {
                    errorMsg.textContent = 'Phone number must only contain digits and should not start with 0.';
                    errorMsg.style.display = 'block';
                } else if (phone.length !== requiredLength) {
                    errorMsg.textContent = `Phone number must be ${requiredLength} digits.`;
                    errorMsg.style.display = 'block';
                } else {
                    errorMsg.style.display = 'none';
                }
            }

            validatePhone();

            newPhoneInput.addEventListener('input', validatePhone);

            newPhoneInput.addEventListener('keypress', function (e) {
                if (!/\d/.test(e.key)) e.preventDefault();
                const code = countrySelect.value.split("~")[0];
                const requiredLength = getRequiredLength(code);
                if (newPhoneInput.value.replace(/\D/g, '').length >= requiredLength) e.preventDefault();
            });
        }

        // Prepare country data for JS
        const countryData = <?php
            echo json_encode(array_map(function($c) {
                return ['code' => $c->code, 'phone_digits' => $c->phone_digits];
            }, $country));
        ?>;

        // Initial bind
        bindPhoneValidation('billing_phone', 'billing_phone_error', 'country_code', countryData);

        // Re-bind on country change
        document.getElementById('country_code').addEventListener('change', function () {
            document.getElementById('billing_phone').value = '';
            document.getElementById('billing_phone_error').style.display = 'none';
            bindPhoneValidation('billing_phone', 'billing_phone_error', 'country_code', countryData);

            let selectedCountryCodeName = $('#country_code option:selected').data("fulltext").split(' ')[0];
            $('#billing_country option').each(function() { 
                console.log($(this).val());
                let ctryName = $(this).val().split('~')[1];
                if (ctryName == selectedCountryCodeName){
                    $(this).prop('selected', true);
                }else{
                    $(this).prop('selected', false);
                }
            })

            var countryValue = $('#billing_country').val();
            var countryId = countryValue.split('~')[0];
            $('#billing_state option').each(function() {
                var stateCountryId = $(this).data('country-id');
                if (stateCountryId != undefined && stateCountryId.toString() === countryId.toString()) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            // Reset selection
            $('.billing-state-dp').val('');
        });
    </script>
    <script>
        $(document).ready(function() {
            function filterStates() {
                var countryValue = $('#billing_country').val();
                var countryId = countryValue.split('~')[0];
                $('#billing_state option').each(function() {
                    var stateCountryId = $(this).data('country-id');
                    if (stateCountryId != undefined && stateCountryId.toString() === countryId.toString()) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                // Reset selection
                $('#billing_state').val('');
                return countryValue.split('~')[1];
            }
            // On page load
            filterStates();
            // On country change
            $('#billing_country').on('change', function() {
                let countryName = filterStates();

                $('#billing_state option').each(function() {
                    var stateCountryId = $(this).data('country-id');
                    if (stateCountryId != undefined && stateCountryId.toString() === "none") {
                        $(this).prop('selected', true);
                    } 
                });

                $('#country_code option').each(function() {
                    let currCty = $(this).data('fulltext');
                    let currCtyName = currCty.split(' ')[0];
                    if (currCtyName == countryName) {
                        $(this).prop("selected", true);
                        initCountryCodeBehavior(true);
                        bindPhoneValidation('billing_phone', 'billing_phone_error', 'country_code', countryData);
                    }else {
                        $(this).prop("selected", false);
                    }
                 })

                document.getElementById('billing_phone').value = '';
            });
        });
    </script>
   <script>
    // document.getElementById('placeOrder').addEventListener('click', function (e) {
    //     const checkbox = document.getElementById('whatsapp');
    //     const address = document.getElementById('billing_address_1');
    //     const city = document.getElementById('billing_city');
    //     const firstName = document.getElementById('billing_first_name');
    //     const lastName = document.getElementById('billing_last_name');
    //     // const phoneNo = document.getElementById('billing_phone');
    //     // Create or select error message containers
    //     let errorMsgCheckbox = document.getElementById('whatsapp-error');
    //     let errorMsgAddress = document.getElementById('billing_address_1-error');
    //     let errorMsgCity = document.getElementById('billing_city-error');
    //     const errorMsgFirstName = document.getElementById('firstName-error');
    //     const errorMsgLastName = document.getElementById('lastName-error');
    //     // const errorPhone = document.getElementById('phone-error');
    //     // If error elements don't exist, create them below respective inputs
    //     if (!errorMsgCheckbox) {
    //         errorMsgCheckbox = document.createElement('div');
    //         errorMsgCheckbox.id = 'whatsapp-error';
    //         errorMsgCheckbox.style.color = 'red';
    //         errorMsgCheckbox.style.display = 'none';
    //         checkbox.parentNode.appendChild(errorMsgCheckbox);
    //     }
    //     if (!errorMsgAddress) {
    //         errorMsgAddress = document.createElement('div');
    //         errorMsgAddress.id = 'billing_address_1-error';
    //         errorMsgAddress.style.color = 'red';
    //         errorMsgAddress.style.display = 'none';
    //         address.parentNode.appendChild(errorMsgAddress);
    //     }
    //     if (!errorMsgCity) {
    //         errorMsgCity = document.createElement('div');
    //         errorMsgCity.id = 'billing_city-error';
    //         errorMsgCity.style.color = 'red';
    //         errorMsgCity.style.display = 'none';
    //         city.parentNode.appendChild(errorMsgCity);
    //     }
    //     let hasError = false;
    //     // Validate checkbox
    //     if (!checkbox.checked) {
    //         errorMsgCheckbox.textContent = 'If you want to continue then please select the checkbox';
    //         errorMsgCheckbox.style.display = 'block';
    //         hasError = true;
    //     } else {
    //         errorMsgCheckbox.style.display = 'none';
    //     }
    //     // Validate billing address (not empty)
    //     if (!address.value.trim()) {
    //         errorMsgAddress.textContent = 'Please enter your billing address';
    //         errorMsgAddress.style.display = 'block';
    //         hasError = true;
    //     } else {
    //         errorMsgAddress.style.display = 'none';
    //     }
    //     // Validate billing city (not empty and letters only)
    //     const cityPattern = /^[A-Za-z\s]+$/;
    //     if (!city.value.trim()) {
    //         errorMsgCity.textContent = 'Please enter your billing city';
    //         errorMsgCity.style.display = 'block';
    //         hasError = true;
    //     } else if (!cityPattern.test(city.value.trim())) {
    //         errorMsgCity.textContent = 'Please enter only letters for billing city';
    //         errorMsgCity.style.display = 'block';
    //         hasError = true;
    //     } else {
    //         errorMsgCity.style.display = 'none';
    //     }

    //     if(firstName.value === ""){
    //         errorMsgFirstName.style.display = "block";
    //         hasError = true;
    //     } else{
    //         errorMsgFirstName.style.display = "none";
    //     }

    //     if(lastName.value === ""){
    //         errorMsgLastName.style.display = "block";
    //         hasError = true;
    //     }else{
    //         errorMsgLastName.style.display = "none";
    //     }

    //     const paymentSelected = document.querySelector('input[name="payment_method"]:checked');
    //     if (!paymentSelected) {
    //         alert("Please select a payment method before placing the order.");
    //         event.preventDefault();
    //         return;
    //     }

    //     const checkoutTerms = document.querySelector('input[id="checkoutTerms"]:checked');
    //      if (!checkoutTerms) {
    //         document.getElementById('checkout-error').style.display = "block";
    //         hasError = true;
    //     }else{
    //         document.getElementById('checkout-error').style.display = "none";
    //     }

    //     const delievryMode = document.querySelector('input[name="delivery_mode"]:checked');
    //     if(!delievryMode){
    //         document.getElementById('delivery-error').style.display = 'block';
    //         hasError = true;
    //     }else{
    //         document.getElementById('delivery-error').style.display = 'none';
    //     }
        
    //     if (hasError) {
    //         e.preventDefault();
    //     }
    // });
</script>
<script>
    function initCountryCodeBehavior(skipDataFullText=false) {
        const selects = document.querySelectorAll('.country_code');

        selects.forEach(select => {
            if (!select) {
                console.warn("Select element not found.");
                return;
            }

            // Store the full country text as a data attribute
            if (!skipDataFullText) {
                for (let i = 0; i < select.options.length; i++) {
                    const option = select.options[i];
                    option.setAttribute('data-fulltext', option.text);
                }
            }            

            function updateSelectedDisplay() {
                const selectedOption = select.options[select.selectedIndex];
                const countryCode = selectedOption.value.split('~')[0];
                selectedOption.textContent = countryCode;

                for (let i = 0; i < select.options.length; i++) {
                    const option = select.options[i];
                    if (option !== selectedOption) {
                        option.textContent = option.getAttribute('data-fulltext');
                    }
                }
            }

            updateSelectedDisplay();
            select.addEventListener('change', updateSelectedDisplay);
        });
    }

    document.addEventListener('DOMContentLoaded', () => initCountryCodeBehavior(false));

    function formatMoney(amount) {
  return "$" + parseFloat(amount).toFixed(2);
}
$("#couponDiscountAmountShow").html(formatMoney(objData.coupon_data.aplied_discount_amount));

 document.getElementById('coupon_code').addEventListener('keydown', function(event) {
    if (event.key === ' ') {
      event.preventDefault(); 
     }
    });
</script>


</body>

</html>