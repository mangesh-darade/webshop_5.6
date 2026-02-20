<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
        <title>Products Listing</title>
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
        <link rel="shortcut icon" href="<?=$assets?>images/fav-icon.png">
        <link rel="stylesheet" type="text/css" href="<?=$assets?>css/custom.css" media="all" />  
    </head>
    <?php
        switch ($webshop_settings->product_list_page) {
            case "list_page_fullwidth":
                $list_page_body_class = "full-width";
                break;
            case "list_page_two_sidebar":
                $list_page_body_class = "two-sidebar";
                break;
            case "list_page_rightbar":
                $list_page_body_class = "right-sidebar";
                break;
            default:
                $list_page_body_class = "";
                break;
        }//End switch      
    ?>
    <body class="woocommerce-active <?=$list_page_body_class?> page-template-template-homepage-v<?=$home_page_body_class?> can-uppercase">
        <div id="page" class="hfeed site">
           
           <?php
           
                include_once('header.php'); 
           
           ?>
            
            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">
                    <div class="row">
                        <nav class="woocommerce-breadcrumb">
                            <a href="#">Home</a>
                            <span class="delimiter">
                                <i class="tm tm-breadcrumbs-arrow-right"></i>
                            </span>Shop
                        </nav>
                        <!-- .woocommerce-breadcrumb -->
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">                           
                                <div class="shop-control-bar">
                                    <div class="handheld-sidebar-toggle">
                                        <button type="button" class="btn sidebar-toggler">
                                            <i class="fa fa-sliders"></i>
                                            <span>Filters</span>
                                        </button>
                                    </div>
                                    <!-- .handheld-sidebar-toggle -->
                                    <h1 class="woocommerce-products-header__title page-title">Shop</h1>
                                    <form class="form-techmarket-wc-ppp" method="POST">
                                        <select class="techmarket-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp">
                                            <option value="20">Show 20</option>
                                            <option value="40">Show 40</option>
                                            <option value="-1">Show All</option>
                                        </select>
                                        <input type="hidden" value="5" name="shop_columns">
                                        <input type="hidden" value="15" name="shop_per_page">
                                        <input type="hidden" value="right-sidebar" name="shop_layout">
                                    </form>
                                    <!-- .form-techmarket-wc-ppp -->
                                    <form method="get" class="woocommerce-ordering">
                                        <select class="orderby" name="orderby">
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option selected="selected" value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                        <input type="hidden" value="5" name="shop_columns">
                                        <input type="hidden" value="15" name="shop_per_page">
                                        <input type="hidden" value="right-sidebar" name="shop_layout">
                                    </form>
                                    <!-- .woocommerce-ordering -->
                                    <nav class="techmarket-advanced-pagination">
                                        <form class="form-adv-pagination" method="post">
                                            <input type="number" value="1" class="form-control" step="1" max="5" min="1" size="2" id="goto-page">
                                        </form> of 5<a href="#" class="next page-numbers">→</a>
                                    </nav>
                                    <!-- .techmarket-advanced-pagination -->
                                </div>
                                <!-- .shop-control-bar -->
                                
                                <div class="tab-content">                                    
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
                                </div>
                                <!-- .tab-content -->
                                
                                <div class="shop-control-bar-bottom">
                                    <form class="form-techmarket-wc-ppp" method="POST">
                                        <select class="techmarket-wc-wppp-select c-select" name="ppp">
                                            <option value="20">Show 20</option>
                                            <option value="40">Show 40</option>
                                            <option value="-1">Show All</option>
                                        </select>
                                        <input type="hidden" value="5" name="shop_columns">
                                        <input type="hidden" value="15" name="shop_per_page">
                                        <input type="hidden" value="right-sidebar" name="shop_layout">
                                    </form>
                                    <!-- .form-techmarket-wc-ppp -->
                                    <p class="woocommerce-result-count">
                                        Showing 1&ndash;15 of 73 results
                                    </p>
                                    <!-- .woocommerce-result-count -->
                                    <nav class="woocommerce-pagination">
                                        <ul class="page-numbers">
                                            <li>
                                                <span class="page-numbers current">1</span>
                                            </li>
                                            <li><a href="#" class="page-numbers">2</a></li>
                                            <li><a href="#" class="page-numbers">3</a></li>
                                            <li><a href="#" class="page-numbers">4</a></li>
                                            <li><a href="#" class="page-numbers">5</a></li>
                                            <li><a href="#" class="next page-numbers">→</a></li>
                                        </ul>
                                        <!-- .page-numbers -->
                                    </nav>
                                    <!-- .woocommerce-pagination -->
                                </div>
                                <!-- .shop-control-bar-bottom -->                                
                            </main>
                            <!-- #main -->
                        </div>
                         <!-- #primary -->
                         
                    <?php if($webshop_settings->product_list_page != "list_page_fullwidth") { ?>
                       
                        <div id="secondary" class="widget-area shop-sidebar" role="complementary">
                            
                            <?php  include_once('widgets/widget_product_categories.php'); ?>
                            
                            <?php  include_once('widgets/widget_products_filter.php'); ?>
                            
                            <?php  include_once('widgets/widget_latest_products_slider.php'); ?>
                            
                        </div> 
                        <!-- #secondary -->
                        
                        <?php if($webshop_settings->product_list_page == "list_page_two_sidebar") { ?>  
                        
                        <div id="tertiary" class="widget-area shop-sidebar" role="complementary">
                            
                            <?php include_once('widgets/widget_featured_products.php'); ?>
                            
                        </div>
                        <!-- #tertiary -->
                        <?php } ?>
                        
                    <?php }//End if Not list_page_fullwidth. ?>
                    
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
