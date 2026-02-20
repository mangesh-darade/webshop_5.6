<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Order Success</title>
        <!-- <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap.min.css" media="all" /> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
    
    <body class="page-template-default woocommerce-checkout woocommerce-page woocommerce-order-received can-uppercase woocommerce-active">
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
                            <span class="delimiter"><i class="tm tm-breadcrumbs-arrow-right"></i></span>Order received
                        </nav>
                        <!-- .woocommerce-breadcrumb -->

                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="page hentry">

                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-order">
                                        
                                                <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you! <br/>Your order has been placed successfully.</p>

                                                <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                                    <li class="woocommerce-order-overview__order order">
                                                        Order number:<strong><?=$order['reference_no']?></strong>
                                                    </li>

                                                    <li class="woocommerce-order-overview__date date">
                                                        Date:<strong><?=DateTimeFormat($order['date'], 'jS F Y')?></strong>
                                                    </li>

                                                    
                                                    <li class="woocommerce-order-overview__total total">
                                                        Total:<strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span><?=$this->sma->formatDecimal($order['grand_total'],2)?></span></strong>
                                                    </li>

                                                    <li class="woocommerce-order-overview__payment-method method">
                                                            Payment Statue: <strong><?=$order['payment_status']?></strong>
                                                    </li>
                                                    
                                                    <li class="woocommerce-order-overview__payment-method method">
                                                            Payment method: <strong><?=$order['payment_method']?></strong>
                                                    </li>
                                                    
                                                </ul>
                                                <!-- .woocommerce-order-overview -->

                                            
                                                <section class="woocommerce-order-details">
                                                    <h2 class="woocommerce-order-details__title">Order Summary</h2>

                                                    <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                                        <thead>
                                                            <tr>
                                                                <th class="woocommerce-table__product-name product-name">Product</th>
                                                                <th class="woocommerce-table__product-name product-mrp">MRP</th>
                                                                <th class="woocommerce-table__product-name product-quantity">Price � Qty</th>
                                                                <th class="woocommerce-table__product-name product-tax">Tax</th>
                                                                <th class="woocommerce-table__product-table product-total">Total</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                        if(is_array($items)){
                                                            foreach ($items as $item) { 
                                                             
                                                                $price = $item['real_unit_price'] - $item['unit_discount']
                                                                
                                                        ?>
                                                            <tr class="woocommerce-table__line-item order_item">
                                                                <td class="woocommerce-table__product-name product-name">
                                                                    <a href="#"><?=$item['product_name']?></a>                                                                     
                                                                </td>
                                                                <td class="woocommerce-table__product-name product-mrp">
                                                                    <a href="#"><?=$this->sma->formatDecimal($item['real_unit_price'])?></a>                                                                     
                                                                </td>
                                                                <td><strong class="product-quantity"><?=$this->sma->formatDecimal($item['net_unit_price'])?> � <?=$this->sma->formatDecimal($item['unit_quantity'])?></strong></td>
                                                                <td><strong class="product-tax"><span class="woocommerce-Price-currencySymbol">Rs.</span> <?=$this->sma->formatDecimal($item_tax = $item['unit_tax']*$item['unit_quantity'])?></strong></td>
                                                                <td class="woocommerce-table__product-total product-total">
                                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs.</span> <?=$this->sma->formatDecimal($total = $item['net_unit_price']*$item['unit_quantity'])?></span>  
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                                $subtotal +=  $total;
                                                                $totalDiscount += $item['item_discount'];
                                                                $tax_total += $item_tax;
                                                            }                                                        
                                                        }
                                                        ?> 

                                                        </tbody>

                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <th scope="row">Subtotal:</th>
                                                                <th><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span><?=$this->sma->formatDecimal($subtotal)?></span></th>
                                                            </tr>
                                                           
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <th scope="row">Tax/GST:</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span><?=$this->sma->formatDecimal($tax_total)?></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <th scope="row">Shipping:</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span><?=$this->sma->formatDecimal($order['shipping'])?></span></td>
                                                            </tr>                                                            
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <th scope="row">Rounding:</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span><?=$this->sma->formatDecimal($order['rounding'])?></span></td>
                                                            </tr>                                                            
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <th scope="row">Total Billing Amount:</th>
                                                                <th><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span><?=$this->sma->formatDecimal($totalBillAmount = $subtotal + $tax_total + $order['shipping'])?></span></th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <th scope="row">Paid Amount:</th>
                                                                <th><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span><?=$this->sma->formatDecimal($order['paid'])?></span></th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"></td>
                                                                <th scope="row">Balance Amount:</th>
                                                                <th><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">Rs. </span><?=$this->sma->formatDecimal($totalBillAmount - $order['paid'])?></span></th>
                                                            </tr>
                                                            
                                                        </tfoot>
                                                    </table>
                                                     
                                                    <!-- .woocommerce-table -->
                                                </section>
                                                <!-- .woocommerce-order-details -->

                                                <section>
                                                    <div class="text-center">
                                                        <a href="<?=base_url("webshop/order_details/".md5($order['id']))?>" class="btn btn-primary">View Orders</a>
                                                        <a href="<?=base_url("webshop/index")?>" class="btn btn-info">Continue Shopping</a>
                                                    </div>
                                                </section>
                                            </div>
                                            <!-- .woocommerce-order -->
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
    </body>
</html>