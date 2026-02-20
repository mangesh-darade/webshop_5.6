<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Product Details : <?=$product['name']?></title>
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
    <?php
    switch ($webshop_settings->product_description) {
        case "product_description_extended":
            $body_class = ' full-width extended ';
            break;
        case "product_description_full_width":
            $body_class = ' full-width normal ';
            break;
        case "product_description_with_sidebar":
        default:
            $body_class = ' left-sidebar normal ';
            break;
    }//End Switch.    
    ?>
    <body class="woocommerce-active single-product <?=$body_class?>" >
        
        <div id="page" class="hfeed site">
            
            <?php
           
                include_once('header.php'); 
           
            ?>
            
            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="<?= base_url("webshop")?>">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><a href="<?= base_url("webshop/category_products/".$product['category_id'])?>"><?=$main_categories[$product['category_id']]->name?></a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><a href="<?= base_url("webshop/category_products/".$product['category_id'].'/'.$product['subcategory_id'])?>"><?=$categories[$product['category_id']][$product['subcategory_id']]->name?></a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span><?=$product['name']?>
                        </nav>
                        
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <div class="product product-type-simple">
                                    <div class="single-product-wrapper">
                                         
                                        <div class="product-images-wrapper thumb-count-4" id="single_product_gallery">
                                            <?php include_once('product_single_item_gallery.php'); ?>
                                        </div>
                                        <!-- .product-images-wrapper -->                                        
                                                                                
                                        <?php include_once('product_single_item_summary.php'); ?>
                                        
                                    </div>
                                    <!-- .single-product-wrapper -->
                                </div>
                                <!-- .product -->
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                        <?php if ($webshop_settings->product_description == "product_description_with_sidebar") { ?>
                        <div id="secondary" class="widget-area shop-sidebar" role="complementary">                           
                            
                            <?php include_once('widgets/widget_product_categories.php'); ?>
                            
                            <?php include_once('widgets/widget_latest_products_slider.php'); ?>
                            
                        </div>
                        <!-- #secondary -->
                        <?php } ?>
                    </div>
                    <!-- .row -->
                </div>
                <!-- .col-full -->
            </div>
            <!-- #content -->
            <div class="col-full">
                
                <?php //include_once('product_description_tabs.php'); ?>
                
            <?php if(isset($related_products) && !empty($related_products)) { ?>
                <div class="tm-related-products-carousel section-products-carousel" id="tm-related-products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#tm-related-products-carousel .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                    
                    <?php include_once('sections/section_related_products.php'); ?>
                    
                </div>
            <?php } ?>
                
                
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
        <script type="text/javascript" src="<?=$assets?>custom_js/common.js"></script>
         
    </body>
</html>