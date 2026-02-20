<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Webshop Checkout</title>
        <!-- <link rel="stylesheet" type="text/css" href="<?= $assets ?>css/bootstrap.min.css" media="all" /> -->
    
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
    <body class="woocommerce-active page-template-default woocommerce-checkout woocommerce-page can-uppercase">
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
                            Checkout
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div class="content-area" id="primary">
                            <main class="site-main" id="main">
                                <div class="type-page hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <?php
                                            if (!isset($this->session->webshop) || !$this->session->webshop->is_login) {

                                                $hidden = array('return_page' => 'webshop/checkout');
                                                $attributes = array('name' => 'loginform', 'method' => 'post', 'class' => 'woocomerce-form woocommerce-form-login login');
                                                echo form_open('webshop/login', $attributes, $hidden);
                                                ?>
                                                <div class="col-sm-12">
                                                    <div class="woocommerce-info">Returning customer? <a data-toggle="collapse" href="#login-form" aria-expanded="false" aria-controls="login-form" class="showlogin">Click here to login</a>
                                                    </div>
                                                </div>
                                                <div class="collapse" id="login-form">

                                                    <p>If you have shopped with us before, please enter your details in the boxes below.</p>

                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <p class="form-row">
                                                                <label for="username">Mobile or Email Address
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="text" id="webshop_username" name="webshop_username" class="input-text">
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p class="form-row">
                                                                <label for="password">Password
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <input type="password" id="webshop_password" name="webshop_password" class="input-text">
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p class="form-row" style="padding-top: 35px;">  

                                                                <input type="submit" value="Login" name="submit_login" class="button">
                                                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline" style="margin-left: 50px;">
                                                                    <a href="<?= base_url("webshop/forgot_password") ?>">Lost your password?</a> 
                                                                </label>
                                                            </p>

                                                        </div>
                                                    </div>

                                                    <div class="clear"></div>
                                                </div>
                                                <!-- .collapse -->
                                                <?php echo form_close(); ?>
                                                <?php
                                            }//end if.       
                                            
                                            ?>
                                        
                                            <form action="<?= base_url('webshop/submit_order') ?>" class="checkout woocommerce-checkout" method="post" name="checkout" enctype="multipart/form-data">
                                                <div id="customer_details" class="col2-set">
                                                <?php
                                                    if (!isset($this->session->webshop) || empty($addresses) ) {
                                                ?>
                                                    <p>If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                                    <div class="col-1">
                                                        <div class="woocommerce-billing-fields">
                                                            <h3>Billing Details</h3>
                                                            <div class="woocommerce-billing-fields__field-wrapper-outer">
                                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                                    <p id="billing_first_name_field" class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                                        <label class="" for="billing_first_name">First Name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="<?= isset($postdata['billing_first_name']) ? $postdata['billing_first_name'] : '' ?>" placeholder="Billing First Name" id="billing_first_name" name="billing_first_name" required="required" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="billing_last_name">Last Name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="<?= isset($postdata['billing_last_name']) ? $postdata['billing_last_name'] : '' ?>" placeholder="Billing Last Name" id="billing_last_name" name="billing_last_name" required="required" class="input-text ">
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                    <p id="billing_company_field" class="form-row form-row-wide">
                                                                        <label class="" for="billing_company">Company Name (Optional)</label>
                                                                        <input type="text" value="<?= isset($postdata['billing_company']) ? $postdata['billing_company'] : '' ?>" placeholder="Billing Company Name" id="billing_company" name="billing_company" class="input-text ">
                                                                    </p>

                                                                    <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_address_1">Street address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="<?= isset($postdata['billing_address_1']) ? $postdata['billing_address_1'] : '' ?>" placeholder="Street address" id="billing_address_1" name="billing_address_1" required="required" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_address_2_field" class="form-row form-row-wide address-field">
                                                                        <input type="text" value="<?= isset($postdata['billing_address_2']) ? $postdata['billing_address_2'] : '' ?>" placeholder="Apartment, suite, unit etc. (optional)" id="billing_address_2" name="billing_address_2" class="input-text ">
                                                                    </p>
                                                                    <div class="clear"></div>

                                                                    <p id="billing_country_field" class="form-row form-row-last validate-required validate-email">
                                                                        <label class="" for="billing_country">Country
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input list="country" class="input-text" value="India" required="required" id="billing_country" name="billing_country" onchange="setState(this.value)" >
                                                                        <datalist id="country">
                                                                            <option value="India" selected="selected">
                                                                        </datalist>
                                                                    </p> 
                                                                    <p id="billing_state_field" class="form-row form-row-first validate-required validate-email">
                                                                        <label class="" for="billing_state">State
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <select data-placeholder="" autocomplete="address-level1" class="state_select select2-hidden-accessible" id="billing_state" name="billing_state" required="required" tabindex="-1" aria-hidden="true">
                                                                            <option value="">Select an option...</option>
                                                                            <?php
                                                                            if (is_array($state_list)) {
                                                                                foreach ($state_list as $state) {

                                                                                    $selected = isset($postdata['billing_city']) && $postdata['billing_city'] == ($state['name'] . '~' . $state['code']) ? ' selected="selected "' : '';

                                                                                    echo '<option value="' . $state['name'] . '~' . $state['code'] . '" ' . $selected . '>' . $state['name'] . '</option>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <input type="text" id="billing_state_name" name="billing_state_name" disabled="disabled" class="input-text" style="display: none;"  />
                                                                    </p>
                                                                    <p id="billing_city_field" class="form-row form-row-last address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="billing_city">Town / City
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input  required="required" class="input-text ">
                                                                    </p>

                                                                    <p id="billing_postcode_field" class="form-row form-row-first address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode">
                                                                        <label class="" for="billing_postcode">Postcode / ZIP
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" value="<?= isset($postdata['billing_postcode']) ? $postdata['billing_postcode'] : '' ?>" placeholder="Billing Pincode" id="billing_postcode" name="billing_postcode" required="required" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                                        <label class="" for="billing_phone">Phone
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="tel" value="<?= isset($postdata['billing_phone']) ? $postdata['billing_phone'] : '' ?>" placeholder="Billing Phone" id="billing_phone" name="billing_phone" required="required" class="input-text ">
                                                                    </p>
                                                                    <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                                        <label class="" for="billing_email">Email Address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="email" value="<?= isset($postdata['billing_email']) ? $postdata['billing_email'] : '' ?>" placeholder="Billing Email" id="billing_email" name="billing_email" required="required" class="input-text ">
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!-- .woocommerce-billing-fields__field-wrapper-outer -->
                                                        </div>
                                                        <!-- .woocommerce-billing-fields -->
                                                        <?php
                                                        if (!isset($this->session->webshop) || !$this->session->webshop->is_login) {
                                                            ?>
                                                            <div class="woocommerce-account-fields">
                                                                <p class="form-row form-row-wide woocommerce-validated">
                                                                    <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#createLogin" aria-controls="createLogin">
                                                                        <input type="checkbox" value="1" name="createaccount" id="createaccount" <?= isset($postdata['createaccount']) && $postdata['createaccount'] == 1 ? ' checked="checked" ' : '' ?> class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                                        <b>Create an account?</b>
                                                                    </label>
                                                                </p>
                                                                <div class="create-account collapse <?= isset($postdata['createaccount']) && $postdata['createaccount'] == 1 ? ' show ' : '' ?>" id="createLogin">
                                                                    <p data-priority="" id="account_password_field" class="form-row validate-required woocommerce-invalid woocommerce-invalid-required-field">
                                                                        <label class="" for="account_password">Account password
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="password" value="<?= isset($postdata['account_password']) ? $postdata['account_password'] : '' ?>" placeholder="Password" id="account_password" name="account_password" required="required" disabled="disabled" class="input-text ">
                                                                    </p>
                                                                    <div class="clear"></div>
                                                                </div>
                                                            </div>
                                                            <!-- .woocommerce-account-fields -->
                                                        <?php }//end if.  ?>
                                                    </div>
                                                    <!-- .col-1 -->
                                                    <?php
                                                    $shipping_check = '';
                                                    $billing_and_shipping_address_is_same = 1;
                                                    $shipping_show = '';

                                                    if (isset($postdata['ship_to_different_address']) && $postdata['ship_to_different_address'] == 1) {
                                                        $shipping_check = 'checked="checked"';
                                                        $billing_and_shipping_address_is_same = 0;
                                                        $shipping_show = 'show';
                                                    }
                                                    ?>
                                                    <div class="col-2">
                                                        <div class="woocommerce-shipping-fields">
                                                            <h3 id="ship-to-different-address">
                                                                <label class="collapsed woocommerce-form__label woocommerce-form__label-for-checkbox checkbox" data-toggle="collapse" data-target="#shipping-address" aria-controls="shipping-address">
                                                                    <input id="ship_to_different_address" <?= $shipping_check ?> class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" type="checkbox" value="1" name="ship_to_different_address">
                                                                    <span>Ship to a different address?</span>
                                                                </label>
                                                                <input type="hidden" name="billing_and_shipping_address_is_same" id="billing_and_shipping_address_is_same" value="<?= $billing_and_shipping_address_is_same ?>" />
                                                            </h3>
                                                            <div class="shipping_address collapse <?= $shipping_show ?>" id="shipping-address">
                                                                <div class="woocommerce-shipping-fields__field-wrapper">
                                                                    <p id="shipping_first_name_field" class="form-row form-row-first validate-required">
                                                                        <label class="" for="shipping_first_name">First name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autofocus="autofocus" autocomplete="given-name" value="<?= isset($postdata['shipping_first_name']) ? $postdata['shipping_first_name'] : '' ?>" placeholder="Shipping First Name" disabled="disabled" id="shipping_first_name" name="shipping_first_name" class="input-text shipping-fields set_required">
                                                                    </p>
                                                                    <p id="shipping_last_name_field" class="form-row form-row-last validate-required">
                                                                        <label class="" for="shipping_last_name">Last name
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autocomplete="family-name" value="<?= isset($postdata['shipping_last_name']) ? $postdata['shipping_last_name'] : '' ?>" placeholder="Shipping Last Name" disabled="disabled" id="shipping_last_name" name="shipping_last_name" class="input-text shipping-fields set_required">
                                                                    </p>
                                                                    <p id="shipping_company_field" class="form-row form-row-wide">
                                                                        <label class="" for="shipping_company">Company name (Optional)</label>
                                                                        <input type="text" autocomplete="organization" disabled="disabled" value="<?= isset($postdata['shipping_company']) ? $postdata['shipping_company'] : '' ?>" placeholder="Shipping Company" id="shipping_company" name="shipping_company" class="input-text shipping-fields">
                                                                    </p>                                                                    
                                                                    <p id="shipping_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="shipping_address_1">Street address
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autocomplete="address-line1" value="<?= isset($postdata['shipping_address_1']) ? $postdata['shipping_address_1'] : '' ?>" placeholder="House number and street name" disabled="disabled" id="shipping_address_1" name="shipping_address_1" class="input-text shipping-fields set_required">
                                                                    </p>
                                                                    <p id="shipping_address_2_field" class="form-row form-row-wide address-field">
                                                                        <input type="text" autocomplete="address-line2" disabled="disabled" value="<?= isset($postdata['shipping_address_2']) ? $postdata['shipping_address_2'] : '' ?>" placeholder="Apartment, suite, unit etc. (optional)" id="shipping_address_2" name="shipping_address_2" class="input-text shipping-fields">
                                                                    </p>
                                                                    <p id="shipping_country_field" class="form-row form-row-last address-field update_totals_on_change validate-required woocommerce-validated">
                                                                        <label class="" for="shipping_country">Country
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>                                                                        
                                                                        <input list="shipcountry" class="input-text" value="India" required="required" id="shipping_country" name="shipping_country" onchange="setShipState(this.value)" >
                                                                        <datalist id="shipcountry">
                                                                            <option value="India" selected="selected">
                                                                        </datalist>
                                                                    </p>
                                                                    <p id="shipping_state_field" class="form-row form-row-first address-field validate-state woocommerce-invalid woocommerce-invalid-required-field validate-required" data-o_class="form-row form-row-wide address-field validate-required validate-state woocommerce-invalid woocommerce-invalid-required-field">
                                                                        <label class="" for="shipping_state">State / County
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <select data-placeholder="" autocomplete="address-level1" class="state_select select2-hidden-accessible shipping-fields set_required" disabled="disabled" id="shipping_state" name="shipping_state" tabindex="-1" aria-hidden="true">
                                                                            <option value="">Select an option…</option>
                                                                            <?php
                                                                            if (is_array($state_list)) {
                                                                                foreach ($state_list as $state) {

                                                                                    $selected = isset($postdata['shipping_state']) && $postdata['shipping_state'] == ($state['name'] . '~' . $state['code']) ? 'selected="selected"' : '';

                                                                                    echo '<option ' . $selected . ' value="' . $state['name'] . '~' . $state['code'] . '">' . $state['name'] . '</option>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <input type="text" id="shipping_state_name" name="shipping_state_name" disabled="disabled" class="input-text shipping-fields set_required" style="display: none;"  />
                                                                    </p>


                                                                    <p id="shipping_city_field" class="form-row form-row-last address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                                        <label class="" for="shipping_city">Town / City
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autocomplete="address-level2" value="<?= isset($postdata['shipping_city']) ? $postdata['shipping_city'] : '' ?>" placeholder="Shipping City"  disabled="disabled" id="shipping_city" name="shipping_city" class="input-text shipping-fields set_required">
                                                                    </p>                                                                    
                                                                    <p data-priority="90" id="shipping_postcode_field" class="form-row form-row-first address-field validate-postcode validate-required" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                                                                        <label class="" for="shipping_postcode">Postcode / ZIP
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="text" autocomplete="postal-code" value="<?= isset($postdata['shipping_postcode']) ? $postdata['shipping_postcode'] : '' ?>" placeholder="Shipping Pincode" disabled="disabled" id="shipping_postcode" name="shipping_postcode" class="input-text shipping-fields set_required">
                                                                    </p>
                                                                    <p id="shipping_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                                        <label class="" for="shipping_phone">Phone
                                                                            <abbr title="required" class="required">*</abbr>
                                                                        </label>
                                                                        <input type="tel" value="<?= isset($postdata['shipping_phone']) ? $postdata['shipping_phone'] : '' ?>" placeholder="Shipping Phone" id="shipping_phone" disabled="disabled" name="shipping_phone" class="input-text shipping-fields set_required">
                                                                    </p>
                                                                    <p id="shipping_email_field" class="form-row form-row-first validate-required validate-email">
                                                                        <label class="" for="shipping_email">Email Address</label>
                                                                        <input type="email" value="<?= isset($postdata['shipping_email']) ? $postdata['shipping_email'] : '' ?>" placeholder="Shipping Email" id="shipping_email" disabled="disabled" name="shipping_email" class="input-text shipping-fields">
                                                                    </p>
                                                                </div>
                                                                <!-- .woocommerce-shipping-fields__field-wrapper -->
                                                            </div>
                                                            <!-- .shipping_address -->
                                                        </div>
                                                        <!-- .woocommerce-shipping-fields -->
                                                        <div class="woocommerce-additional-fields">
                                                            <div class="woocommerce-additional-fields__field-wrapper">
                                                                <p id="order_comments_field" class="form-row notes">
                                                                    <label class="" for="order_comments">Order notes</label>
                                                                    <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="order_comments"><?= isset($postdata['order_comments']) ? $postdata['order_comments'] : '' ?></textarea>
                                                                </p>
                                                            </div>
                                                            <!-- .woocommerce-additional-fields__field-wrapper-->
                                                        </div>
                                                        <!-- .woocommerce-additional-fields -->
                                                    </div>
                                                    <!-- .col-2 -->
                                                <?php 
                                                    }//End if
                                                    else {
                                                        
                                                      if (isset($addresses) && !empty($addresses)) {  
                                                ?>
                                                    <p class="">If you are a existing customer, please choose your shipping address.</p>
                                                        
                                                    <?php
                                                        $addressData = '<div class="containt">';
                                                            foreach ($addresses as $key => $addresse) {
                                                                
                                                    ?>
                                                        <div class="col-md-12 col-sm-12" style="height:200px; border: thin solid #dddddd; padding: 25px; <?php if($addresse['is_default']) { ?> background-color: lightgoldenrodyellow; <?php } ?> ">
                                                            <h4><?=$addresse['address_name']?> <small><?=$addresse['company_name']?></small></h4>
                                                            <p>
                                                                <?=$addresse['line1']?> <?=$addresse['line2']?><br/> 
                                                                <b>City: </b><?=$addresse['city']?>, <?=$addresse['state']?> ( <?=$addresse['country']?> ) 
                                                                <b>Pincode:</b> <?=$addresse['postal_code']?><br/>
                                                                <b>Email:</b> <?=$addresse['email_id']?> , <b>Phone:</b> <?=$addresse['phone']?>
                                                            </p>
                                                            <p> 
                                                                <?php if($addresse['is_default']) { ?>
                                                                <input type="hidden" name="default_shipping_address" id="default_shipping_address" value="<?=$key?>" />
                                                                <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i> Default Sipping Address</a>  
                                                                <?php } else { ?>
                                                                <a  class="btn btn-default btn-sm  text-primary" href="<?=base_url("webshop/checkout_set_shipping_address/".$addresse['company_id'].'/'.$addresse['id'])?>"> Use As Shipping Address </a> 
                                                                <?php } ?>
                                                                <a class="btn btn-default btn-sm text-info" href="<?=base_url("webshop/your_address")?>" >Edit</a>  
                                                            </p>
                                                        </div>
                                                    
                                                    <?php
                                                            }//end foreach.
                                                    
                                                            echo $addressData .= '</div>';
                                                            
                                                        }//end if   
                                                    }//end else
                                                ?>
                                                </div>
                                                <!-- .col2-set -->
                                                <h3 id="order_review_heading">Your order</h3>
                                                <div class="woocommerce-checkout-review-order" id="order_review">
                                                    <div class="order-review-wrapper">
                                                        <h3 class="order_review_heading">Your Order</h3>
                                                        <?php
                                                        $subtotal = 0;
                                                        if (isset($cart_items) && is_array($cart_items) && count($cart_items)) {
                                                            ?>
                                                            <table class="shop_table woocommerce-checkout-review-order-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="product-name">Product</th>
                                                                        <th class="product-total">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($cart_items as $itemKey => $item) {

                                                                        /* if (!empty($cart_data['variant_images'][$itemKey])) {
                                                                          $item_image = $cart_data['variant_images'][$itemKey];
                                                                          } else {
                                                                          $item_image = $cart_data['products'][$item['product_id']]['image'];
                                                                          } */

                                                                        $product_name = $cart_data['products'][$item['product_id']]['name'];

                                                                        $variant_name = ($item['variant_id']) ? ' (' . $cart_data['variants'][$item['variant_id']]['name'] . ')' : '';
                                                                        ?>
                                                                        <tr class="cart_item">
                                                                            <td class="product-name">
                                                                                <strong class="product-quantity"><?= $product_name . $variant_name ?></strong><br/>
                                                                                Qty. <?= $item['quantity'] ?> × Rs.<?= number_format($item['product_price'], 2) ?>
                                                                            </td>
                                                                            <td class="product-total"><br/>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">Rs. </span><?= number_format((float) $item['quantity'] * (float) $item['product_price'], 2) ?></span>
                                                                                <input type="hidden" name="item_id[<?= $itemKey ?>]" value="<?= $item['product_id'] ?>" />    
                                                                                <input type="hidden" name="option_id[<?= $itemKey ?>]" value="<?= $item['variant_id'] ?>" />    
                                                                                <input type="hidden" name="option_price[<?= $itemKey ?>]" value="<?= $item['variant_price'] ?>" />    
                                                                                <input type="hidden" name="item_unit_quantity[<?= $itemKey ?>]" value="<?= $item['unit_quantity'] ?>" />    
                                                                                <input type="hidden" name="item_quantity[<?= $itemKey ?>]" value="<?= $item['quantity'] ?>" />    
                                                                                <input type="hidden" name="item_unit_price[<?= $itemKey ?>]" value="<?= $item['product_price'] ?>" />    
                                                                                <input type="hidden" name="item_tax_rate[<?= $itemKey ?>]" value="<?= $item['tax_rate'] ?>" />    
                                                                                <input type="hidden" name="item_tax_method[<?= $itemKey ?>]" value="<?= $item['tax_method'] ?>" />    
                                                                                <input type="hidden" name="item_promotion_price[<?= $itemKey ?>]" value="<?= $item['promotion_price'] ?>" />    
                                                                                <input type="hidden" name="item_product_price[<?= $itemKey ?>]" value="<?= $item['price'] ?>" />    
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                        $subtotal += ((float) $item['quantity'] * (float) $item['product_price']);
                                                                        $discount = 0;
                                                                        $total = $subtotal - $discount;
                                                                    }//end foreach.
                                                                    ?>                
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Subtotal</th>
                                                                        <td>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">Rs.</span> <?= $subtotal ?></span>
                                                                                <input type="hidden" id="cart_subtotal_amt" name="cart_subtotal_amt" value="<?= $subtotal ?>"/>
                                                                                <input type="hidden" id="coupon_code_id" name="coupon_code_id" value=""/>
                                                                                <input type="hidden" id="coupon_code_value" name="coupon_code_value" value=""/>
                                                                                <input type="hidden" id="coupon_discount_rate" name="coupon_discount_rate" value=""/>
                                                                                <input type="hidden" id="coupon_discount_amount" name="coupon_discount_amount" value=""/>
                                                                                <input type="hidden" id="cart_total" name="cart_total" value="<?= $total ?>"/>
                                                                                <input type="hidden" id="shipping_chaeges" name="shipping_chages" value="0"/>
                                                                        </td>
                                                                    </tr>
                                                                     <tr class="cart-shipping">
                                                                        <th>Shipping Charges</th>
                                                                        <td i> 
                                                                             <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol"> 
                                                                                Rs. </span><span id="shipping_charges_label">0.00</span></span>
                                                                         </td>
                                                                    </tr>   
                                                                            

                                                                    <tr class="tr-coupon-discount" style="display:none;">
                                                                        <th>Coupon Discount</th>
                                                                        <td>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <span class="woocommerce-Price-currencySymbol">Rs. -</span><span id="coupon_discount_amount_show">123.00</span></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="order-total">
                                                                        <th>Total</th>
                                                                        <td>
                                                                            <strong>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <span class="woocommerce-Price-currencySymbol">Rs.</span><span id="cart_total_amount_show"><?= $total ?></span></span>
                                                                            </strong>
                                                                        </td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                            <!-- /.woocommerce-checkout-review-order-table -->
                                                            <div id="coupon_contains">
                                                                <div class="woocommerce-info" id="coupon_code_response">Have a coupon? <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">Click here</a></div>
                                                                <div class="collapse" id="checkoutCouponForm">                                                                 
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td><input type="text" value="" id="coupon_code" placeholder="Coupon code" class="input-text" name="coupon_code" /></td>
                                                                            <td><input type="button" id="apply_coupon" name="apply_coupon" class="button" value="Apply coupon" /></td>
                                                                        </tr>
                                                                    </table>                                                                 
                                                                </div>
                                                            <div>
                                                            <!-- .collapse -->
                                                            <div class="woocommerce-checkout-payment" id="payment">
                                                                <ul class="wc_payment_methods payment_methods methods">
                                                                    <?php if ($webshop_settings->online_payment) { ?>
                                                                        <li class="wc_payment_method payment_method_cheque">
                                                                            <input type="radio" data-order_button_text="" value="online_payment" name="payment_method" required="required" class="input-radio" id="payment_method_online">
                                                                            <label for="payment_method_online">Use Online Payment Method</label>                                                                    
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php if ($webshop_settings->cod) { ?>
                                                                        <li class="wc_payment_method payment_method_cod">
                                                                            <input type="radio" checked="checked" data-order_button_text="" value="cod" name="payment_method" required="required" class="input-radio" id="payment_method_cod">
                                                                            <label for="payment_method_cod">Cash on delivery </label>                                                                    
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>                                                                
                                                                <div class="form-row place-order">
                                                                    <p class="form-row terms wc-terms-and-conditions woocommerce-validated">
                                                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                                                            <input type="hidden" name="customer_id" value="<?=isset($customer_id)?$customer_id:''?>" />
                                                                            <input type="checkbox" id="terms" name="terms" required="required"  value="1" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox">
                                                                            <span>I've read and accept the <a class="woocommerce-terms-and-conditions-link" href="terms-and-conditions.html">terms &amp; conditions</a></span>
                                                                            <span class="required">*</span>
                                                                        </label>                                                                    
                                                                    </p>
                                                                    <button type="submit" class="button wc-forward text-center" value="<?= md5(date('Y-m-d H')) ?>" name="submit_order">Submit Order</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.woocommerce-checkout-payment -->
                                                        <?php } ?>
                                                    </div>
                                                    <!-- /.order-review-wrapper -->
                                                </div>
                                                            <!-- .woocommerce-checkout-review-order -->
                                                        <!-- .woocommerce-checkout -->
                                                    </div>
                                                    <!-- .woocommerce -->
                                                </div>
                                            </form>
                                            <!-- .entry-content -->
                                        
                                </div>
                                <!-- #post-## -->
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script><script type="text/javascript" src="<?= $assets ?>js/jquery.min.js"></script>
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
        <script type="text/javascript" src="<?= $assets ?>custom_js/common.js"></script>
        <script>
        function setShipState(country) {
            if (country == 'India') {
                $('#shipping_state').show();
                $('#shipping_state').removeAttr('disabled');

                $('#shipping_state_name').hide();
                $('#shipping_state_name').attr('disabled', 'disabled');
                $('#shipping_state_name').removeAttr('required');
            } else {
                $('#shipping_state').hide();
                $('#shipping_state').attr('disabled', 'disabled');

                $('#shipping_state_name').show();
                $('#shipping_state_name').removeAttr('disabled');
                $('#shipping_state_name').attr('required', 'required');
            }
        }

        function setState(country) {
            if (country == 'India') {
                $('#billing_state').show();
                $('#billing_state').removeAttr('disabled');

                $('#billing_state_name').hide();
                $('#billing_state_name').attr('disabled', 'disabled');
                $('#billing_state_name').removeAttr('required');
            } else {
                $('#billing_state').hide();
                $('#billing_state').attr('disabled', 'disabled');

                $('#billing_state_name').show();
                $('#billing_state_name').removeAttr('disabled');
                $('#billing_state_name').attr('required', 'required');
            }
        }
        
        

        $(document).ready(function () {


            $('#createaccount').click(function () {

                if ($('#createaccount').is(':checked')) {
                    $('#account_password').removeAttr('disabled');
                } else {
                    $('#account_password').attr('disabled', 'disabled');
                }
            });

            $('#ship_to_different_address').click(function () {

                if ($('#ship_to_different_address').is(':checked')) {
                    $('.shipping-fields').removeAttr('disabled');
                    $('.set_required').attr('required', 'required');
                    $('#billing_and_shipping_address_is_same').val(0);
                } else {
                    $('.shipping-fields').attr('disabled', 'disabled');
                    $('.set_required').removeAttr('required');
                    $('#billing_and_shipping_address_is_same').val(1);
                }
            });

            if ($('#ship_to_different_address').is(':checked')) {
                $('.shipping-fields').removeAttr('disabled');
                $('.set_required').attr('required', 'required');
                $('#billing_and_shipping_address_is_same').val(0);
            }
            if ($('#createaccount').is(':checked')) {
                $('#account_password').removeAttr('disabled');
            }
            
            
            $('#apply_coupon').on('click', function(){
                 
                var coupon_code = $('#coupon_code').val();
//                coupon_code = coupon_code.trim();
//                if(coupon_code == ''){
//                    return false;
//                }
                
                var cart_amount = $('#cart_subtotal_amt').val();    
    
                apply_coupon(coupon_code , cart_amount);
                
            });

        });

        $('#billing_postcode').change(function(){
            var pincode = $(this).val();
            $.ajax({
               type:'ajax',
               dataType:'json',
               method:'get',
               url:'<?= base_url("webshop/getpincodecharges")?>',
               data:{'pincode': pincode},
               async:false,
               success:function(result){
                  
                       $('#shipping_chaeges').val(result.charges);
                      $('#shipping_charges_label').html(result.charges);
                     calculateAmount();
                  
                   
               }, error:function(){
                   console.log('errro');
               }
            });
           
        });

        function calculateAmount(){
            var sub_total = $('#cart_subtotal_amt').val();
            var shipping_Charges = $('#shipping_chaeges').val();
            console.log(shipping_Charges );
            $('#shipping_charges').html(shipping_Charges);
            var total = parseFloat(sub_total) + parseFloat(shipping_Charges);
            alert(total );
            $('#cart_total').val(total);
            $('#cart_total_amount_show').html(total);
        }

        </script>
    </body>
</html>