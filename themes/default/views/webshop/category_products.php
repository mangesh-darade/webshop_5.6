<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title><?= $main_categories[$get_category_id]->name ?> Products</title>
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
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/custom.css" media="all" />  
    </head>
    <body class="woocommerce-active left-sidebar">
        
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
                            </span>
                            <?php
                            if($get_subcategory_id){
                            ?>
                            <a href="<?= base_url("webshop/category_products/$get_category_id")?>"><?= $main_categories[$get_category_id]->name ?></a>
                                <span class="delimiter">
                                    <i class="tm tm-breadcrumbs-arrow-right"></i>
                                </span><?= $categories[$get_category_id][$get_subcategory_id]->name ?>
                            <?php
                            } else {
                                echo $main_categories[$get_category_id]->name;
                            }
                            ?>
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <section class="section-product-categories" style="margin-bottom: 20px;">
                                    <header class="section-header">
                                        <h1 class="woocommerce-products-header__title page-title"><?= $main_categories[$get_category_id]->name ?> Categories</h1>
                                    </header>
                                    <div class="woocommerce columns-5">
                                        <div class="product-loop-categories">
                                        <?php
                                        if(is_array($subcategories)) {
                                            foreach ($subcategories as $scid => $category ) {
                                        ?>
                                            <div class="product-category product first" style="height:170px;">
                                                <a href="<?= base_url("webshop/category_products/$get_category_id/$scid")?>">
                                                    <img style="height: 120px;" alt="<?= $category->name ?>" class="img img-responsive" src="<?= $uploads . $category->image ?>">
                                                    
                                                    <h2 class="woocommerce-loop-category__title"> <?= $category->name ?>
                                                        <mark class="count">(5)</mark>
                                                    </h2>
                                                </a>
                                            </div>
                                        <?php
                                            }
                                        }
                                        ?>                                         
                                        </div>
                                        <!-- .product-loop-categories -->
                                    </div>
                                    <!-- .woocommerce -->
                                </section>
                                <!-- .section-product-categories -->                                
                                 
                                <?php
                                    switch ($webshop_settings->product_list_view) {

                                        case "list":                                            
                                            include_once("products_list_view.php");

                                            break;

                                        case "list_large":                                            
                                            include_once("products_list_view_large.php");

                                            break;

                                        case "list_small":                                            
                                            include_once("products_list_view_small.php");

                                            break;

                                        case "list_grid_extended":                                            
                                            include_once("products_list_grid_extended.php");

                                            break;

                                        case "list_grid":
                                        default:
                                            include_once("products_list_grid.php");

                                            break;
                                    }//end switch. 
                                ?>  
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                        <div id="secondary" class="widget-area shop-sidebar" role="complementary">

                            <?php include_once('widgets/widget_product_categories.php'); ?>

                            <?php include_once('widgets/widget_latest_products_slider.php'); ?>

                        </div>
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
        <script type="text/javascript" src="<?= $assets ?>js/jquery.min.js"></script>
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
        <script type="text/javascript" src="<?=$assets?>custom_js/common.js"></script>
        
    </body>
</html>