<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Your Orders</title>
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap-grid.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/bootstrap-reboot.min.css" media="all" />
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
                            Orders
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="row">
                                    <div class="col-sm-3"><h3>Your Orders</h3></div>
                                    <div class="col-sm-6">
                                        <select name="order_range" class="form-field">
                                            <option>Last 3 Months</option>
                                            <option>Last 6 Months</option>
                                            <option>Year 2021</option>
                                            <option>Year 2019</option>
                                            <option>Year 2018</option>
                                        </select>
                                    </div>
                                </div>
                                <hr style="margin-top:10px;"/>
                                <div class="type-page hentry">
                                    <!-- .entry-header -->
                                    <div class="myorder col-sm-9">
                                    <?php
                                        foreach ($orders['orders'] as $order) {
                                    ?>
                                        <section class="order_section border " style="background-color: #edefef; border-radius: 10px 10px 0 0; margin-bottom: 20px;">
                                            <header class="order_header row" style="padding: 10px;">                                                 
                                                <div class="col-sm-3"><strong>#Order Date</strong><br/><?=Date_Time_Format($order->date,'jS M Y g:ia')?></div>                                                
                                                <div class="col-sm-4"><strong>#Shipping Address</strong><br/><?=$order->address_name?> (<?=$order->postal_code?>)</div>
                                                <div class="col-sm-2"><strong>#Total Amount</strong><br/><?=rupeeFormat($order->grand_total)?></div>
                                                <div class="col-sm-3">
                                                    <strong>#Order No:</strong> <a class="text-info" href="<?=base_url("webshop/order_details/".md5($order->order_id))?>" ><?=$order->invoice_no?></a> <br/><strong>#Status:</strong> <?=$order->sale_status?>
                                                    <a style="float: right;" data-toggle="collapse" data-target="#order_<?=md5($order->order_id)?>">Hide</a>
                                                </div> 
                                            </header>
                                            <div class="order_items" style="background-color: #fff;" id="order_<?=md5($order->order_id)?>" class="collapse">                                                
                                                <table class="table" style="margin-bottom: 0px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>Product Description</th>
                                                            <th>Qty </th>
                                                            <th>Action</th>
                                                        </tr>                                                        
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $items = $orders['items'][$order->order_id];
                                                   
                                                     foreach ($items as $item) {

                                                    ?>
                                                        <tr>
                                                            <td class="col-sm-2"><img class="img" alt="<?=$item->product_code?>" src="<?= $uploads.'thumbs/'.$item->image?>" /></td>
                                                            <td><?=$item->product_name?> <?=$item->option_name ? '<br/>('.$item->option_name.')' : ''?></td>
                                                            <td class="col-sm-2"><?=number_format($item->quantity)?></td>
                                                            <td class="col-sm-2">
                                                                <a href="#">Return</a><br/>
                                                                <a href="#">Cancel</a><br/>                                                                 
                                                            </td>
                                                        </tr>  
                                                    <?php } ?>
                                                    </tbody>
                                                </table>                                                
                                            </div>                                             
                                        </section>
                                        <?php } ?>
                                    </div> 
                                    <div class="col-sm-3">
                                        
                                    </div>
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