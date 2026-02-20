<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>Privacy Policy - Terms and Conditions | Herbinn Micro Medicines</title>
    <meta name="description" content="Established in the year 1994 we Herbinn Micro Medicines">
    <link href="//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:600" rel="stylesheet" type="text/css">
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=20090901" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/shop-tweaks.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
    <link href="<?= $assets ?>nw_theme/css/common.css" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">

</head>

<body>

    <?php include_once('header.php'); ?>

    <div class="main ">
        <div class="container">
            <div class="main-row">
                <div class="main-content about-us"><?= isset($terms_and_conditions->page_text) ? $terms_and_conditions->page_text : '' ?>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('footer.php'); ?>

    <script src="<?= $assets ?>nw_theme/js/main.js"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>
    <script src="<?= $assets ?>nw_theme/js/login.js" defer></script>
    <script src="<?= $assets ?>nw_theme/js/common.js" defer></script>
    <script>
        const assets = "<?= $assets ?>";
    </script>
</body>

</html>