<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Order Details</title>
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
    <body class="page-template-default page woocommerce-wishlist can-uppercase">
        <div id="page" class="hfeed site">
            
            <?php 
            
                include_once('header.php'); 
                
            ?>
            
            <div id="content" class="site-content">

                <div class="col-full">

                    <div class="row">

                        <nav class="woocommerce-breadcrumb">
                            <a href="<?=base_url('webshop/index')?>">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            <a href="<?=base_url('webshop/your_account')?>">Account</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>
                            <a href="<?=base_url('webshop/your_orders')?>">Orders</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>                            
                            Order Details
                        </nav>

                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">

                            <main id="main" class="site-main">

                                <div class="type-page hentry">

                                    <header class="entry-header">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">Order Details</h1>
                                        </div>
                                    </header>
                                    <!-- .entry-header -->

                                    <?php                                    
                                        $orderData  = $order['orders'][0];
                                        $orderItems = $order['items'][$orderData->order_id];         
                                    ?>  
                                                                       
                                    <section class="order_section border " style="background-color: #edefef; border-radius: 10px 10px 0 0; margin-bottom: 20px;">
                                        
                                        <header class="order_header row" style="padding: 10px;">                                                 
                                                <div class="col-sm-4"><strong>#Order Date:</strong>  </div>                                                                           
                                                <div class="col-sm-3"><strong>#Order No:</strong> <?=$orderData->invoice_no?></div>                                                 
                                                <div class="col-sm-3"><strong>#Status:</strong> <?=$orderData->sale_status?></div> 
                                                <div class="col-sm-2"><a href="#" class="text-primary">#Invoice</a></div> 
                                        </header>

                                        <div class="order_items" style="background-color: #fff;">                                                
                                            <table class="table" style="margin-bottom: 0px;">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Description</th>
                                                        <th>Qty x Price</th>
                                                        <th>Subtotal</th>
                                                    </tr>                                                        
                                                </thead>
                                                <tbody>
                                                <?php                                           
                                                    foreach ($orderItems as $item) {
                                                ?>
                                                    <tr>
                                                        <td class="col-sm-2"><img class="img" style="width: 80px;" alt="<?=$item->product_code?>" src="<?= $uploads.$item->image?>" /></td>
                                                        <td>
                                                            <p style="text-transform: capitalize;">
                                                                <?=$item->product_name?> <?=$item->option_name ? '<br/>('.$item->option_name.')' : ''?>
                                                                <?= '<br/><small>Product Code : '.$item->product_code?></small>
                                                            </p>
                                                            <!--<p>Delivered Date: 5th December 2021</p>-->
                                                        </td>
                                                        <td class="col-sm-2"><?=numberFormat($item->quantity)?> x <?=rupeeFormat($item->unit_price)?> <br/><small>(Tax <?=$item->tax?>)</small></td>
                                                        <td class="col-sm-2"><?=rupeeFormat($item->subtotal)?> <br/><small>(Tax <?=rupeeFormat($item->item_tax)?>)</small></td>
                                                    </tr>   
                                                <?php } ?>
                                                </tbody>
                                            </table>                                                
                                        </div>

                                        <div class="order_shipping_address row" style="padding: 10px;">
                                            <div class="col-sm-8">
                                                <p><strong>#Shipping Address: </strong><br/>
                                                    <?php
                                                    echo $orderData->address_name;
                                                    echo ' '.$orderData->line1;
                                                    echo ' '.$orderData->line2;
                                                    echo ' '.$orderData->city;                                                        
                                                    echo ' '.$orderData->state;
                                                    echo ' '.$orderData->country;
                                                    echo ' '.$orderData->postal_code;
                                                    ?>
                                                </p>
                                                
                                                <p>
                                                    <strong>#Payment Status: </strong><?=$orderData->payment_status?><br/>
                                                    <strong>#Payment Method: </strong><?=$orderData->payment_method?><br/>
                                                </p>
                                                <p>
                                                    <strong>#Delivery Status: </strong><?=$orderData->delivery_status?><br/>
                                                </p>
                                            </div>

                                            <div class="col-sm-4">
                                                <table class=" table table-condensed" style="padding: 0; border: none!important;">
                                                    <tr><td>Subtotal</td><td><?=rupeeFormat($orderData->total)?></td></tr>
                                                    <tr><td>Tax Amount</td><td><?=rupeeFormat($orderData->total_tax)?></td></tr>
                                                    <tr><td>Shipping</td><td><?=rupeeFormat($orderData->shipping)?></td></tr>
                                                    <?php if((float)$orderData->total_discount > 0) { ?>
                                                    <tr><td>Discount</td><td><?=rupeeFormat($orderData->total_discount)?></td></tr>
                                                    <?php } ?>
                                                    <?php if((float)$orderData->rounding > 0) { ?>
                                                    <tr><td>Rounding</td><td><?=rupeeFormat($orderData->rounding)?></td></tr>
                                                    <?php } ?>
                                                    <tr><th>Grand Total</th><th><?=rupeeFormat($orderData->grand_total)?></th></tr>
                                                </table>
                                            </div>
                                        </div>

                                    </section>
                                    
                                    
                                    
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

            <div class="col-full">
                
                <?php include_once('sections/section_recently_viewed_products.php'); ?>
                
                <?php include_once('sections/section_footer_brands.php'); ?>
                
            </div>
            <!-- .col-full -->
           <?php include_once('footer.php'); ?>
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