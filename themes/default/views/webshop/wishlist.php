<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Webshop Wishlist</title>
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
                            Wishlist
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="type-page hentry">
                                    <header class="entry-header">
                                        <div class="page-header-caption">
                                            <h1 class="entry-title">Wishlist</h1>
                                        </div>
                                    </header>
                                    <!-- .entry-header -->
                                    <div class="entry-content">
                                        <form class="woocommerce" method="post" action="#">
                                            <table class="shop_table cart wishlist_table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-remove"></th>
                                                        <th class="product-thumbnail"></th>
                                                        <th class="product-name">
                                                            <span class="nobr">Product Name</span>
                                                        </th>
                                                        <th class="product-price">
                                                            <span class="nobr">
                                                                Unit Price
                                                            </span>
                                                        </th>
                                                        <th class="product-stock-status">
                                                            <span class="nobr">
                                                                Stock Status
                                                            </span>
                                                        </th>
                                                        <th class="product-add-to-cart"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                                                               
                                                $sectionKey = md5('wishlist');
                                                 
                                                if(is_array($wishlist['items'])){
                                                    foreach ($wishlist['items'] as $product) {
                                                        if(is_array($wishlist_variants))
                                                        foreach ($wishlist_variants[$product['id']] as $option_id) {
                                                         
                                                            $product_hash = md5($product['id'].$option_id.$sectionKey);
                                                            
                                                            if(isset($product['variants'][$option_id])){

                                                                $variant = $product['variants'][$option_id];
                                                                
                                                                $variant_name           = $variant['name'];
                                                                $variant_price[1]       = $variant['price'];
                                                                $item_quantity          = $variant['quantity'];
                                                                
                                                                $product_name = $product['name'] .' (<span class="variant_name_'.$product_hash.'">'.$variant_name.'</span>)';
                                                                
                                                             } else {
                                                                 
                                                                $variant_name        = '';
                                                                $variant_price[1]    = 0;
                                                                $item_quantity       = $product['quantity'];
                                                                $product_name        = $product['name'];
                                                                $variant = false;
                                                            }

                                                            //Set Overselling Condition.
                                                            $item_quantity = $this->webshop_settings->overselling ? 999 : $item_quantity;

                                                            $product_price = product_sale_price($product, $variant_price);

                                                            $promo_price = $product_price['promo_price'] ? $product_price['promo_price'] : FALSE;

                                                            $sale_price  = $promo_price ? $promo_price : $product_price['unit_price'];
                                                            
                                                            $product['promo_price'] = $promo_price;
                                                            $product['unit_price']  = $sale_price;
            
                                                ?>
                                                    <tr id="row_<?=$product_hash?>">
                                                        <td class="product-remove">
                                                            <div>
                                                                <a title="Remove this product" product_hash="<?=$product_hash?>" class="remove remove_from_wishlist" style="cursor: pointer;" >×</a>
                                                            </div>
                                                        </td>
                                                        <td class="product-thumbnail">
                                                            <a href="#">
                                                                <img width="180" height="180" alt="" class="wp-post-image" src="<?=$uploads . $product['image']?>">
                                                            </a>
                                                        </td>
                                                        <td class="product-name">
                                                            <a href="#"><?=$product_name?></a>
                                                        </td>
                                                        <td class="product-price">
                                                            <ins>
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <span class="woocommerce-Price-currencySymbol">Rs. </span><span id="display_unit_price_<?=$product_hash?>"><?=number_format($sale_price,2)?></span></span>
                                                            </ins>
                                                           <?php if($promo_price && (int)$promo_price < $product_price['unit_price']) { ?>
                                                                <del>
                                                                    <span class="woocommerce-Price-amount amount">
                                                                        <span class="woocommerce-Price-currencySymbol">Rs. </span><?=number_format($product_price['unit_price'],2)?></span>
                                                                </del>
                                                           <?php } ?>                                                            
                                                        </td>
                                                        <td class="product-stock-status">
                                                            <?php if($item_quantity) {  ?>
                                                                <span class="wishlist-in-stock">In Stock</span>
                                                            <?php } else { ?>
                                                                <span class="text-danger">Out Of Stock</span>
                                                            <?php }  ?>
                                                        </td>
                                                        <td class="product-add-to-cart">
                                                        <?php
                                                            echo product_hidden_fields($product, $product_hash, $variant);
                                                           
                                                        ?>                                                            
                                                        <?php if($item_quantity) { ?>              
                                                            <big class="text-danger btn_outofstock_<?=$product_hash?>" style="display: none;" >Out Of Stock</big>
                                                            <button class="button add_to_cart_button form-control btn_addtocart_<?=$product_hash?>" rel="nofollow" onclick="add_to_cart('<?=$product_hash?>')" >Add to cart</button> 
                                                        <?php  } else { ?>
                                                            <big class="text-danger btn_outofstock_<?=$product_hash?>" >Out Of Stock</big>
                                                            <button class="button add_to_cart_button form-control btn_addtocart_<?=$product_hash?>" rel="nofollow" style="display: none;" onclick="add_to_cart('<?=$product_hash?>')" >Add to cart</button> 
                                                        <?php } ?>                                                            
                                                        </td>
                                                    </tr>
                                            <?php 
                                                        }
                                                    }//end foreach
                                                }//end if
                                                ?>
                                               </tbody>                                                 
                                            </table>
                                            <!-- .wishlist_table -->
                                        </form>
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
            <div class="col-full">
                
                <?php include_once('sections/section_recently_viewed_products.php'); ?>
                
                <?php include_once('sections/section_footer_brands.php'); ?>
                
            </div>
            
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
        <script type="text/javascript" src="<?=$assets?>custom_js/common.js"></script>
        
    </body>
</html>