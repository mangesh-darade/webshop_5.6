<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Payment</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap.min.css" media="all" /> -->
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
    <style>
          .body {
        display: none;
    }
    </style>
    <body class="page-template-default body woocommerce-checkout woocommerce-page woocommerce-order-received can-uppercase woocommerce-active">
        <div id="page" class="hfeed site">
            
            <?php
           
                include_once('header.php'); 
           
            ?>
            
            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="<?=base_url('webshop/index')?>">Home</a>
                            <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>
                            <a href="#">Checkout</a>
                            <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>Payments
                        </nav>
                        <!-- .woocommerce-breadcrumb -->

                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="page hentry">   
                                <?php
                                $hidden = array('order_id' => $order['id'], 'customer_id' => $customer_id);
                                $attributes = array('class' => 'email', 'id' => 'myform', 'method'=>'post');
                                echo form_open('webshop/payments?order='.$order['id'].'&customer='.$customer_id, $attributes, $hidden);
                                ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">                                                
                                                <div class="box-body">
                                                    <div class="box-header"><h5>Order Details</h5></div>
                                                    <div class="box-content">
                                                        <table>
                                                            <tr>
                                                                <th>Order No.</th>
                                                                <td><?=$order['reference_no']?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Date</th>
                                                                <td><?=$order['date']?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Items</th>
                                                                <td><?=$order['total_items']?> Items</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Payment</th>
                                                                <td><i class="fa fa-inr" aria-hidden="true"></i> <?=$this->sma->formatDecimal($order['grand_total'])?></td>
                                                            </tr>
                                                        </table>
                                                        <input type="hidden" name="date" value="<?=$order['date']?>" />
                                                        <input type="hidden" name="reference_no" value="<?=$order['reference_no']?>" />
                                                        <input type="hidden" name="language" value="EN"> 
                                                        <input type="hidden" name="amount" value="<?=$this->sma->formatDecimal($order['grand_total']);?>">
                                                        <input type="hidden" name="currency" value="AED">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box box">                                                
                                                <div class="box-body">
                                                    <div class="box-header"><h5 class="box-title">Billing Information</h5></div>
                                                    <div class="box-content">
                                                    <?php
                                                        $address = !empty($billing_address['address_name']) ? $billing_address['address_name'].'<br/>' : "";
                                                        $address .= !empty($billing_address['line1']) ? $billing_address['line1'] : "";
                                                        $address .= !empty($billing_address['line2']) ? ', '. $billing_address['line2'] : "";
                                                        $address .= !empty($billing_address['line2']) ? ', '. $billing_address['line2'] : "";
                                                        $address .= !empty($billing_address['city']) ? ',<br/>'. $billing_address['city'] : "";
                                                        $address .= !empty($billing_address['state']) ? ' '. $billing_address['state'] : "";
                                                        $address .= !empty($billing_address['postal_code']) ? ' '. $billing_address['postal_code'] : "";
                                                        $address .= !empty($billing_address['country']) ? ', '. $billing_address['country'] : "";
                                                        $address .= !empty($billing_address['phone']) ? '<br/>Phone: '. $billing_address['phone'] : "";
                                                        $address .= !empty($billing_address['email_id']) ? ', Email: '. $billing_address['email_id'] : "";
                                                        $address .= !empty($billing_address['company_name']) ? '<br/>Company: '.$billing_address['company_name'] : "";
                                                        $address .= ' <span style="color:blue; margin-left:30px;">Edit</span>';
                                                        
                                                        echo $address;
                                                    ?>
                                                        <input type="hidden" name="billing_name"    value="<?=$billing_address['address_name']?>" />
                                                        <input type="hidden" name="billing_company" value="<?=$billing_address['company_name']?>" />
                                                        <input type="hidden" name="billing_address" value="<?=$billing_address['line1'].' '.$billing_address['line1']?>" />
                                                        <input type="hidden" name="billing_city"    value="<?=$billing_address['city']?>" />
                                                        <input type="hidden" name="billing_state"   value="<?=$billing_address['state']?>" />
                                                        <input type="hidden" name="billing_country" value="<?=$billing_address['country']?>" />
                                                        <input type="hidden" name="billing_zip"     value="<?=$billing_address['postal_code']?>" />
                                                        <input type="hidden" name="billing_tel"     value="<?=$billing_address['phone']?>" />
                                                        <input type="hidden" name="billing_email"   value="<?=$billing_address['email_id']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">                                                
                                                <div class="box-body">
                                                    <div class="box-header"><h5>Payments</h5></div>
                                                    <div class="box-content">
                                                        <h3>Total Amount (INR) : <i class="fa fa-inr" aria-hidden="true"></i> <?=$this->sma->formatDecimal($order['grand_total'])?></h3>
                                                        <div>
                                                        <table>
                                                            <?php if($payments_gatway->paypal_pro) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="paypal_pro" > <img src="<?=base_url("assets/images/paypal_pro.png");?>" alt="paypal_pro" class="img" style="display: inline;" /></label></td>
                                                            </tr>
                                                            <?php } if($payments_gatway->stripe) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="stripe" > <img src="<?=base_url("assets/images/stripe.png");?>" alt="stripe" class="img" style="display: inline;" /></label></td>
                                                            </tr>
                                                            <?php } if($payments_gatway->authorize) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="authorize" >  <img src="<?=base_url("assets/images/authorize.png");?>" alt="authorize" class="img" style="display: inline;" /></label></td>
                                                            </tr>
                                                            <?php } if($payments_gatway->instamojo) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="instamojo" >  <img src="<?=base_url("assets/images/instamojo.png");?>" alt="instamojo" class="img" style="display: inline;" /></label>
                                                                    <input type="hidden" class="payment_gatway instamojo" name="redirect_url" value="<?=base_url('webshop/payment_instamojoResponseHandler')?>"> 
                                                                    <input type="hidden" class="payment_gatway instamojo" name="cancel_url" value="<?=base_url("webshop/payment_cancel")?>">                                                                    
                                                                    <input type="hidden" class="payment_gatway instamojo" name="ACCESS_CODE" value="<?=$payment_config['instamojo']['AUTH_TOKEN']?>">
                                                                    <input type="hidden" class="payment_gatway instamojo" name="API_KEY" value="<?=$payment_config['instamojo']['API_KEY']?>">
                                                                    <input type="hidden" class="payment_gatway instamojo" name="API_URL" value="<?=$payment_config['instamojo']['API_URL']?>">
                                                                </td>
                                                            </tr>
                                                            <?php } if($payments_gatway->ccavenue) { ?>
                                                            <tr>
                                                                <td>
                                                                    <label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="ccavenue" checked >  <img src="<?=base_url("assets/images/ccavenue.png");?>" alt="ccavenue" class="img" style="display: inline;"/></label>
                                                                    <input type="hidden" class="payment_gatway ccavenue" name="redirect_url" value="<?=base_url("webshop/payment_ccavResponseHandler")?>"> 
                                                                    <input type="hidden" class="payment_gatway ccavenue" name="cancel_url" value="<?=base_url("webshop/payment_cancel")?>">
                                                                    <!-- <input type="hidden" class="payment_gatway ccavenue" name="cancel_url" value="<?=base_url("webshop/payment_cancel?order_id=" . urlencode($order['id']))?>"> -->
                                                                    <input type="hidden" class="payment_gatway ccavenue" name="MERCHANT_ID" value="<?=$payment_config['ccavenue']['MERCHANT_ID']?>">
                                                                    <input type="hidden" class="payment_gatway ccavenue" name="ACCESS_CODE" value="<?=$payment_config['ccavenue']['ACCESS_CODE']?>">
                                                                    <input type="hidden" class="payment_gatway ccavenue" name="API_KEY" value="<?=$payment_config['ccavenue']['API_KEY']?>">
                                                                    <input type="hidden" class="payment_gatway ccavenue" name="API_URL" value="<?=$payment_config['ccavenue']['API_URL']?>">
                                                                </td>
                                                            </tr>
                                                            <?php } if($payments_gatway->paytm) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="paytm" >  <img src="<?=base_url("assets/images/paytm.png");?>" alt="paytm" class="img" style="display: inline;" /></label></td>
                                                            </tr>
                                                            <?php } if($payments_gatway->payswiff) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="payswiff" >  <img src="<?=base_url("assets/images/payswiff.png");?>" alt="payswiff" class="img" style="display: inline;" /></label></td>
                                                            </tr>
                                                            <?php } if($payments_gatway->payumoney) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="payumoney" >  <img src="<?=base_url("assets/images/payumoney.png");?>" alt="payumoney" class="img" style="display: inline;" /></label></td>
                                                            </tr>
                                                            <?php } if($payments_gatway->paynear) { ?>
                                                            <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="paynear" >  <img src="<?=base_url("assets/images/paynear.png");?>" alt="paynear" class="img" style="display: inline;" /></label></td>
                                                            </tr>
                                                            <?php } if($payments_gatway->razorpay) {?>
                                                              <tr>
                                                                <td><label><input type="radio" required="required" class="payment_gatway_option" name="payment_gatway" value="razorpay"  ></label></td>
                                                            </tr>

                                                            <?php } ?>
                                                        </table>
                                                        </div>
                                                        <div><button type="submit" name="submit" id="btn_payment" value="payment_gatway" class="btn btn-success">Payment</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                
                                </div>
                                <?php
                                echo form_close();
                                ?>   
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
        
        <script>
        
        // $(document).ready(function(){
            
            
        //     $('.payment_gatway_option').click(function(){
                
        //         $('.payment_gatway').attr("disabled","disabled");
                                
        //         if($(this).val()){
        //             $('.'+$(this).val()).removeAttr("disabled");
        //             $('#btn_payment').removeAttr("disabled");
        //         }
        //     });
            
            
        // });
        
        </script>        
        <script>
    
        // JavaScript to automatically click the button on page load
        window.onload = function() {
            document.getElementById('btn_payment').click();
        }
</script>
    </body>
</html>