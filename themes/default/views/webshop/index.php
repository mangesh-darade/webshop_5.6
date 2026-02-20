<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>Webshop <?=$webshop_settings->home_page?> <?=$webshop_settings->theme_color?> <?=$_GET['strip']?></title>
        
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
    <link rel="stylesheet" type="text/css" href="<?=$assets?>css/colors/<?=$webshop_settings->theme_color?>.css"
        media="all" />

    <link href="//fonts.googleapis.com/css?family=Rubik:300,400,500,900" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$uploads?>logos/<?= $webshop_settings->favicon ?>">
    <link rel="manifest" href="<?=$uploads?>logos/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=$uploads?>logos/ms-icon-144x144.png">

    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" type="text/css" href="<?=$assets?>css/custom.css" media="all" />
</head>
<?php
    
        /*
         * Value get from settings
         * Get Homepage Theme Number From Home Page Theme Name.
         */
    
        $home_page_theme_number = str_replace('theme_', '', $webshop_settings->home_page);
        
        
        /*
         * DO Not Change Values
         * Assign value for templeage css style
         */
        
        //$home_page_body_class = ($home_page_theme_number == 13 ? 1 : ($home_page_theme_number == 14 ? 6 : $home_page_theme_number));
        
        switch ($home_page_theme_number) {            
            case 9:
                $home_page_body_class = "page home page-template-default";
                break;
            case 13:
                $home_page_body_class = "woocommerce-active page-template-template-homepage-v1 can-uppercase";
                break;
            case 14:
                $home_page_body_class = "woocommerce-active page-template-template-homepage-v6 can-uppercase";
                break;
            default:
                $home_page_body_class = "woocommerce-active page-template-template-homepage-v".$home_page_theme_number." can-uppercase";
                break;
        }//end switch
    ?>

<body class="<?=$home_page_body_class?>">

    <div id="page" class="hfeed site">

        <?php
           
           include_once('header.php');            
          
           
           /*
            * Value From Webshop Settings
            * Include Homepage Theme Layout
            * As Per Webshop Settings.
            */
           
           include_once($webshop_settings->home_page . ".php"); 
           
          
           
           
           
           
           include_once('footer.php'); 
           
           
           ?>

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
    <script type="text/javascript" src="<?=$assets?>custom_js/home.js"></script>
    <script type="text/javascript" src="<?=$assets?>custom_js/common.js"></script>
   </body>

</html>