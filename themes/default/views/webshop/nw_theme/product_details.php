<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Details | Herbinn Micro Medicines</title>
    <meta name="description" content="Established in the year 1994 we Herbinn Micro Medicines" />
    <link rel="canonical" href="https://herbinnmicromedicines.elintpos.in/webshop" />
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Oxygen:700' rel='stylesheet' type='text/css' />
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=210616_01" rel="stylesheet" media="screen" charset="utf-8" />
    <link href="<?= $assets ?>nw_theme/css/print.css" rel="stylesheet" type="text/css" media="print" charset="utf-8" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8" />
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>nw_theme/css/slick-slider.css" />
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">

    <style>
        .btn-increase,
        .btn-decrease {
            pointer-events: auto !important;
            opacity: 1 !important;
        }

        .add-to-cart {
            /* background: #FBC132; */
            background: #63ad1f;
            /* border: 1px solid #FBC132; */
            border: 1px solid #63ad1f;
            /* text-transform: uppercase; */
            font-size: 20px;
            border-radius: 20px;
            display: block;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .main.product-pf {
            padding-top: 40px;
        }

        @media (min-width:1024px) {
            .main.product-pf {
                padding-top: 50px;
            }
        }

        .product-pf .heading {
            padding-bottom: 30px;
        }

        .product-pf .heading h1 {
            margin-top: 0;
        }

        @media (min-width: 1024px) {
            .product-pf .heading {
                width: 68%;
                float: left;
                padding: 0 30px 30px 0;
                border-bottom: 1px solid #DDD;
                border-right: 1px solid #DDD;
            }
        }

        .product-pf .heading h3 {
            font-size: 18px;
            margin: 0 0 20px;
        }

        .product-inner-pf {
            position: relative;
            overflow: auto;
        }

        .product-pf .images {
            font-size: 100%;
        }



        @media(max-width:720px) {
            .product-pf .images {
                max-width: none;
            }

            .product-pf .slider-product-contain {
                max-width: 320px !important;
            }
        }

        .b2g1h-notice {
            margin-bottom: 20px;
            padding: 15px;
            overflow: auto;
            background: #CCECFF;
            border: 1px dashed #5e93b1;
        }

        .b2g1h-notice h3,
        .b2g1h-notice h4 {
            margin: 0 0 5px;
        }

        .b2g1h-notice p {
            margin: 0 0 5px;
        }

        .b2g1h-notice img {
            float: left;
            margin-right: 5px;
            max-width: 100%;
            height: auto;
        }

        .b2g1h-notice div {
            overflow: hidden;
        }

        .b2g1h-notice .fine-print {
            font-size: 12px;
            color: #666;
        }

        @media (max-width: 512px) {
            .b2g1h-notice img {
                float: none;
                margin: 0 0 10px;
            }
        }


        .product-inner-pf .images {
            position: relative;
            text-align: center;
            padding-bottom: 30px;
        }

        @media (min-width: 1024px) {
            .product-inner-pf .images {
                width: 68%;
                float: left;
                padding: 30px 40px 40px 110px;
                border-right: 1px solid #DDD;
                border-bottom: 1px solid #DDD;
            }
        }

        .slider-product-contain {
            max-width: 580px;
            margin: 0 auto;
        }

        @media (min-width: 1024px) {
            .slider-product-contain .thumbs {
                position: absolute;
                top: 30px;
                left: 0;
                width: 70px;
            }
        }

        .slider-product-contain .thumbs a {
            display: inline-block;
            margin: 0 3px 10px;
        }

        .slider-product-contain .thumbs img {
            max-width: 50px;
            display: inline-block;
        }

        .slider-product-contain .slick-slider {
            margin-bottom: 15px;
        }

        @media (min-width: 728px) {
            .slider-product-contain .thumbs img {
                max-width: 70px;
                margin: 0
            }
        }

        @media (min-width: 1024px) {
            .slider-product-contain .thumbs a {
                border: 1px solid #CCC;
                border-radius: 5px;
                padding: 5px;
                margin: 0 0 10px;
            }

            .slider-product-contain .thumbs a.selected {
                border-color: #0099FF;
            }
        }

        .desc-short {
            text-align: left;
            font-size: 100%;
        }

        .desc-short h5 {
            font-size: 120%;
            line-height: 140%;
        }

        .desc-short ul {
            margin: 0;
            padding: 0 0 0 20px;
            list-style: square;
        }

        .desc-short ul li {
            margin-bottom: 5px;
        }

        .desc-short .infographic,
        .desc-short .learnMore {
            display: none;
        }

        @media (min-width: 1024px) {
            .purchase-options {
                width: 32%;
                float: right;
                padding-left: 40px;
                position: absolute;
                top: 0;
                right: 0;
            }
        }

        .purchase-options p.price {
            font-size: 30px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .purchase-options #price-old {
            font-weight: normal;
            color: #999;
        }

        .purchase-options #price-savings {
            display: block;
            font-size: 18px;
        }

        .purchase-options img.eas {
            display: block;
            margin-bottom: 3px;
        }

        .purchase-options .choices {
            margin-bottom: 20px;
        }

        .purchase-options .choices label {
            position: relative;
            display: block;
            padding: 15px 20px 15px 40px;
            margin: 0;
            border-bottom: 1px solid #DDD;
            background: #F3F3F3;
        }

        .purchase-options .choices label:last-of-type {
            border-bottom: none;
        }

        .purchase-options .choices input {
            position: absolute;
            top: 15px;
            left: 20px;
        }

        .purchase-options .choices .special {
            display: block;
        }

        .purchase-options .seals {
            text-align: center;
        }

        .purchase-options .seals img {
            height: auto;
            max-width: 70px;
            display: inline-block;
            margin: 0 3px 10px;
        }

        .purchase-options .choices label {
            overflow: auto;
        }

        .purchase-options img.opt-b3g1f {
            float: right;
            max-height: 80px;
            margin: -10px -15px -10px 0;
        }

        .product-tabs {
            clear: both;
        }

        @media(min-width:1024px) {
            .info-long {
                float: left;
                width: 68%;
                padding: 30px 40px 0 0;
                border-right: 1px solid #DDD;
            }
        }

        .r-tabs-tab a {
            background: #FFF;
            color: #666666;
            border: none;
            border-bottom: 2px solid #FFF;
        }

        .r-tabs-tab.r-tabs-state-active a {
            color: #000000;
            background-color: #FFF;
            border: none;
            border-bottom: 2px solid #FFCC00;
        }

        .r-tabs-accordion-title a {
            background: #FFF;
            color: #666;
            border-color: #CCC;
        }

        @media(min-width:768px) {
            .r-tabs-tab a {
                font-size: 110%;
            }

            .r-tabs-panel {
                border: none;
                padding: 30px 0;
            }
        }

        .related {
            clear: both;
            padding: 30px;
            background: #FDFBEE;
        }

        .related h5 {
            font-size: 150%;
            margin-bottom: 20px;
        }
    </style>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PB1C3K06KC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-PB1C3K06KC');
        gtag('config', 'AW-1072698999'); // Adwords
        gtag('config', 'G-JPFC9S1N5L'); //Keith
    </script>

</head>


<body>

    <?php include_once('header.php'); ?>

    <?php
    $product = $this->data['product'];
    $productId = $product['id'];
    $productName = $product['name'];
    $productDescp = $product['product_details'];
    $productPrice = $product['price'];
    // $productImage = $uploads . $product['image'];
    $noImage = $uploads . 'no_image.png';
    $productImage = !empty($product['image']) ? $uploads . $product['image'] : $noImage;
    $uploads = $this->data['uploads'];
    $formattedPrice = $this->sma->formatMoney($productPrice);
    $productTaxRate = $product['tax_rate'];
    $productTaxMethod = $product['tax_method'];
    $productPromoPrice = $product['promo_price'];
    $productDesc = $product['product_details'];
    $isIncartQuantity = false;
    foreach ($this->data['cart_items'] as $item) {
        if ($item['product_id'] == $productId) {
            $isIncartQuantity = $item;
            $found = true;
            break;
        }
    }

    $productCF1 = $product['cf1']  ? $product['cf1'] : '';
    $productCF2 = $product['cf2']  ? $product['cf2'] : '';
    $productCF3 = $product['cf3']  ? $product['cf3'] : '';

    ?>
    <div class="main product-pf">
        <div class="container">
            <meta itemprop="description" content="<?= $productDesc ?>" />
            <div class="product-inner-pf">
                <div class="prod-img-head-div">
                    <div class="heading">
                        <h1 itemprop="name"><?= $productName ?></h1>
                        <div class="productDescp"><?= $productDescp ?></div>

                        <?php
                        // var_dump($gallary_images);
                        ?>


                    </div><!--/heading-->

                    <div class="images">
                        <div class="slider-product-contain">
                            <div class="slider slider-product">
                                <?php
                                if (is_array($gallary_images) && !empty($gallary_images)) {
                                    foreach ($gallary_images as $image) {
                                ?>
                                        <div><a href="<?= $productImage ?>"><img src="<?= $uploads . $image['photo'] ?>" class="img-responsive" title="<?= $productName ?>" alt="<?= $productName ?>" itemprop="image" /></a></div>
                                    <?php
                                    }
                                } else {  ?>

                                    <div><a href="<?= $productImage ?>"><img src="<?= $productImage ?>" class="img-responsive" title="<?= $productName ?>" alt="<?= $productName ?>" itemprop="image" /></a></div>
                                    <div><a href="<?= $productImage ?>"><img src="<?= $productImage ?>" class="img-responsive" title="<?= $productName ?>" alt="<?= $productName ?>" /></a></div>
                                    <div><a href="<?= $productImage ?>"><img src="<?= $productImage ?>" class="img-responsive" title="<?= $productName ?>" alt="<?= $productName ?>" /></a></div>
                                <?php } ?>
                            </div>

                            <!-- <p class="product-servings">30-Day Supply</p> -->

                            <?php
                            if (is_array($gallary_images) && !empty($gallary_images)) { ?>
                                <div class="thumbs"> <?php

                                                        foreach ($gallary_images as $image) {
                                                        ?>
                                        <a><img src="<?= $thumbs . $image['photo'] ?>" title="<?= $productName ?>" alt="<?= $productName ?>" class="img-responsive" /></a>

                                    <?php
                                                        }        ?>
                                </div> <?php
                                    }
                                        ?>

                            <!-- <div class="thumbs">
                                <a class="selected"><img src="<?= $productImage ?>" title="<?= $productName ?>" alt="<?= $productName ?>" class="img-responsive" /></a>
                                <a><img src="<?= $productImage ?>" title="<?= $productName ?>" alt="<?= $productName ?>" class="<?= $productName ?>" /></a>
                                <a><img src="<?= $productImage ?>" title="<?= $productName ?>" alt="<?= $productName ?>" class="<?= $productName ?>" /></a>
                            </div> -->
                        </div>

                    </div><!--/images-->
                </div>

                <div class="prod-detail-div">
                    <div class="purchase-options" id="purchase-options">
                        <form name="prodinfo" id="prodinfo">
                            <input type="hidden" name="addtocart">
                            <input type="hidden" name="additem" value="N441">

                            <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <meta itemprop="availability" content="InStock" />
                                <meta itemprop="priceCurrency" content="USD" />
                                <meta itemprop="price" content="<?= $formattedPrice ?>" />
                            </div>

                            <?php
                            $productCategory;
                            if (!empty($categories)) {
                                foreach ($categories as $category) {
                                    if ($product['category_id'] == $category->id) {
                                        $productCategory = $category->name;
                                        break;
                                    }
                                }
                            }
                            ?>
                            <p class="price">
                                <span id="price-old"></span>
                                <span class="<?php echo ($productCategory == 'Softgel Capsules' || $productCategory == 'Veterinary Nutraceuticals') ? 'hide_price' : '' ?>" id="price-current"><?= $formattedPrice ?></span>
                                <span id="price-savings"></span>
                            </p>

                        <div class="buy-qty" style='display:flex; margin-bottom:15px;'>
                            <div style='display:flex; flex-grow:1; max-width:120px;gap: 5px;'>
                                <!-- Decrease Button -->
                                <button type="button" class="btn btn-outline-secondary btn-decrease" style="width:35px; border: 1px solid #cbcaca;">-</button>
                                <input name="txtquanto" oninput="this.value = (this.value < 0) ? '' : this.value;" type="number" min="1" value="<?= $found ?  $isIncartQuantity['quantity'] : 1 ?>" isincart="<?= $found ? '1' : '0' ?>" class="form-control itemQty" id="txtquanto" style="height:100%" onkeydown="event.preventDefault(); alert('Please use spinner arrows');" />
                                <!-- Increase Button -->
                                <button type="button" class="btn btn-outline-secondary btn-increase" style="width:35px; border: 1px solid #cbcaca;">+</button>
                            </div>
                            <div style='padding-left:15px; flex-grow:3'>
                                <button class="btn btn-block add-to-cart" name="submit-form" type="submit" value="Add to Cart" product_id="<?= $productId ?>" quantity="1" tax_rate="<?= $productTaxRate ?>" tax_method="<?= $productTaxMethod ?>" price="<?= $productPrice ?>" promotion_price="<?= $productPromoPrice ?>" product_price="<?= $productPrice ?>" product_desc="<?= $productDesc ?>" imageurl="<?= $productImage ?>" productname="<?= $productName ?>">Add to Cart</button>
                            </div>
                        </div>

                        </form>

                        <!-- <p style="font-size: 120%; margin-bottom:15px">Ships in 1 Business Day</p>

                        <p><img style="display: block; max-width:100%; margin:0 auto 15px" src="<?= $assets ?>nw_theme/images/guarantee-product-page.png" alt="Guarantee"></p>

                        <div style="max-width:360px; margin:0 auto 15px; padding:12px 15px; border:1px solid #DDD">
                            <h5 style="margin-top:0">Buy Now, Pay Later</h5>
                            <div data-pp-message data-pp-placement="product" data-pp-style-layout="text"></div>
                        </div> -->

                        <!-- <div class="seals" style="margin-bottom:30px">
                            <img src="<?= $assets ?>nw_theme/images/icon-non-gmo.png" alt="Made with non-gmo ingredients" title="Made with non-gmo ingredients">
                            <img src="<?= $assets ?>nw_theme/images/icon-gluten-free.png" alt="Gluten free" title="Gluten free">
                            <img src="<?= $assets ?>nw_theme/images/icon-fda-registered-facility.png" alt="Made in a FDA registered facility" title="Made in a FDA registered facility">
                            <img src="<?= $assets ?>nw_theme/images/GMPSeal.png" alt="Current good manufacturing process" title="Current good manufacturing process">
                            <img src="<?= $assets ?>nw_theme/images/icon-third-party-tested.png" alt="Third party tested" title="Third party tested">
                        </div> -->



                    </div><!--/purchase-options-->

                    <div class="info-long">
                        <a id="product-details"></a> <a id="tabArea"></a>

                        <div id="product-tabs" class="product-tabs">

                            <ul class="product-tabs-nav">
                                <!-- <?php if ($productCF1) { ?> <li><a href="#ProductDetail">Product Detail</a></li> <?php } ?> -->
                                <!-- <li><a href="#reviews">Reviews</a></li>-->
                                <!-- <?php if ($productCF2) { ?> <li><a href="#UsageWarnings">Usage/Warnings</a></li> <?php } ?> -->
                                <!-- <?php if ($productCF3) { ?> <li><a href="#SupplementFacts">Supplement Facts</a></li>  <?php } ?> -->

                                <li><a href="#ProductDetail">Product Detail</a></li>
                                <!-- <li><a href="#UsageWarnings">Usage/Warnings</a></li> -->
                                <li><a href="#SupplementFacts">Supplement Facts</a></li>
                            </ul>

                            <?php if ($productCF1) {  ?>
                                <div id="ProductDetail">
                                    <div class="desc-pd"><?= $productCF1 ?></div>
                                </div>
                            <?php } ?>

                            <!-- <?php if ($productCF2) {  ?>
                                <div id="UsageWarnings">
                                    <div class="desc-pd"><?= $productCF2 ?></div>
                                </div>
                            <?php } ?> -->

                            <?php if ($productCF3) {  ?>
                                <div id="SupplementFacts">
                                    <div class="desc-pd"><?= $productCF3 ?></div>
                                </div>
                            <?php } ?>
                            <!-- <div id="UsageWarnings">
                                <h3>Usage</h3>
                                <p>As a dietary supplement, adults mix one scoop with your favorite beverage or smoothie.</p>
                                <h3>Warnings</h3>
                                <p>Please consult with a health care professional before starting any diet, exercise or supplementation program, before taking any medication, or if you have or suspect you might have a medical condition, are currently taking prescription drugs, or are pregnant or breastfeeding.</p>
                            </div>
                            <div id="SupplementFacts">
                                <p><img class="img-responsive" src="<?= $assets ?>nw_theme/images/N441_Ingredients.jpg" alt="Fermented Organic Beet Ingredients"></p>
                                <p><strong>Contains No</strong> salt, dairy, wheat, gluten, eggs,
                                    peanuts, soy, sesame, yeast, tree nuts, fish, shellfish, preservatives, artificial colors or flavors.</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php') ?>
    <div class="search-overlay"></div>
    <div class="modal fade" id="modal-free-shipping" tabindex="-1" role="dialog" aria-labelledby="modal_banner_fine_print" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 120%">FREE standard shipping only available in the contiguous United States.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $assets . 'nw_theme/js/main.js?ver=200406' ?>"></script>
    <script src="<?= $assets . 'nw_theme/js/jquery.magnific-popup-new.min.js' ?>"></script>
    <script src="<?= $assets . 'nw_theme/js/welcome-message.js' ?>"></script>
    <script src="<?= $assets . 'nw_theme/js/jquery.scrolldepth.min.js' ?>"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>

    <script src="<?= $assets . 'nw_theme/js/jquery.responsiveTabs.min.js' ?>"></script>
    <script src="//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js"></script>
    <script>
        baseUrl = "<?= base_url('webshop/') ?>";
        const currencySymbol = "<?= $this->data['Settings']->symbol ?>";
    </script>

    <script>
        var purchase_options_offset;
        var purchase_options_height;
        var has_purchase_options = false;
        var has_extra_options = false;
        var header_nav_height;
        var buy_now_button_top_padding = 20;
        var breakpoint_tablet = 992;

        function activateTab(tab_number) {
            $('#product-tabs').responsiveTabs('activate', tab_number);
        }

        function addToCart(url, obj, quantity, price, image, name) {
            $.ajax({
                type: 'POST',
                url: url,
                data: obj,
                success: function(jsonData) {
                    let data = JSON.parse(jsonData);
                    // if (json.length !== 0) {
                    if (data.status == "SUCCESS") {
                        // if (json.item_added[0].price_sale !== "") {
                        //     var display_price = json.item_added[0].price_sale;
                        // } else {
                        //     var display_price = json.item_added[0].price;
                        // }
                        // if (json.item_added[0].amount > 1) {
                        //     display_price += ' each';
                        // }
                        // var display_qty = parseInt(json.item_added[0].amount);

                        cart_contents = '<div class="mfp-added-cart"><h2>Added to cart</h2>';
                        cart_contents += `<div class="row" style="margin-bottom:30px;"><div class="col-xs-4 col-md-4"><img class="img-responsive" src="${image}" + '"></div>`;
                        cart_contents += `<div class="col-xs-8 col-md-8 pap-item"><h3>${name}</h3>`;
                        if (!document.getElementById('price-current').classList.contains('hide_price')) {
                            cart_contents += `<p><strong>Qty:</strong> ${quantity} &nbsp;&nbsp;<strong>Price:</strong> ${currencySymbol} ${(Number(quantity) * Number(price))} </p>`;
                        } else {
                            cart_contents += `<p><strong>Qty:</strong> ${quantity} &nbsp;&nbsp;</p>`;
                        }
                        cart_contents += '<p><a href="<?= base_url('webshop/cart') ?>" class="btn add-to-cart" style="margin-bottom:5px; font-size:130%; padding-left:30px; padding-right:30px">View Cart &amp; Checkout</a> <a class="btn btn-grey btn-sm continue-shopping" style="border-radius:60px">Continue Shopping</a></p>';
                        cart_contents += '</div></div>';

                        cart_contents += '</div></div>';
                        $.magnificPopup.open({
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in',
                            type: 'inline',
                            items: {
                                src: cart_contents
                            },
                            callbacks: {
                                open: function() {
                                    $(".mfp-added-cart .add-to-cart").click(function() {
                                        gtag('event', 'Add to Cart Popup - Click - Checkout', {
                                            'event_category': 'Cart Events',
                                        });
                                    });
                                    $(".mfp-added-cart .item a").click(function(event) {
                                        gtag('event', 'Add to Cart Popup - Click - PAP item', {
                                            'event_category': 'Cart Events',
                                            'event_label': $(this).closest('.item').find('h4').text()
                                        });
                                    });
                                },
                                close: function() {
                                    gtag('event', 'Add to Cart Popup - Click - Close', {
                                        'event_category': 'Cart Events',
                                    });

                                    window.location.reload();
                                }
                            }
                        });
                        $(".continue-shopping").click(function() {
                            gtag('event', 'Add to Cart Popup - Click - Continue Shopping', {
                                'event_category': 'Cart Events',
                            });
                            $.magnificPopup.close();
                            window.location.reload();
                        });
                        $(current_btn).removeClass("loading").html("Add to Cart");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", status, error);
                    alert("Something went wrong please try again later.");
                    $.magnificPopup.open({
                        items: {
                            src: '<div class="white-popup"><h3>Error Adding to Cart</h3><p>An error occurred while trying to add the selected product to your cart. Please try again.</p></div>',
                            type: 'inline'
                        }
                    });
                }
            });
        }

        function updateCart(url, updateObj, quantity, price, image, name) {
            $.ajax({
                type: 'POST',
                url: url,
                data: updateObj,
                success: function(data) {
                    // let data = JSON.parse(jsonData);
                    // if (json.length !== 0) {
                    if (data == "SUCCESS") {
                        // if (json.item_added[0].price_sale !== "") {
                        //     var display_price = json.item_added[0].price_sale;
                        // } else {
                        //     var display_price = json.item_added[0].price;
                        // }
                        // if (json.item_added[0].amount > 1) {
                        //     display_price += ' each';
                        // }
                        // var display_qty = parseInt(json.item_added[0].amount);

                        cart_contents = '<div class="mfp-added-cart"><h2>Added to cart</h2>';
                        cart_contents += `<div class="row" style="margin-bottom:30px;"><div class="col-xs-4 col-md-4"><img class="img-responsive" src="${image}"></div>`;
                        cart_contents += `<div class="col-xs-8 col-md-8 pap-item"><h3>${name}</h3>`;
                        if (!document.getElementById('price-current').classList.contains('hide_price')) {
                            cart_contents += `<p><strong>Qty:</strong> ${quantity} &nbsp;&nbsp;<strong>Price:</strong> ${currencySymbol} ${(Number(quantity) * Number(price))} </p>`;
                        } else {
                            cart_contents += `<p><strong>Qty:</strong> ${quantity} &nbsp;&nbsp;</p>`;
                        }
                        cart_contents += '<p><a href="<?= base_url('webshop/cart') ?>" class="btn add-to-cart" style="margin-bottom:5px; font-size:130%; padding-left:30px; padding-right:30px">View Cart &amp; Checkout</a> <a class="btn btn-grey btn-sm continue-shopping" style="border-radius:60px">Continue Shopping</a></p>';
                        cart_contents += '</div></div>';


                        cart_contents += '</div></div>';
                        $.magnificPopup.open({
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in',
                            type: 'inline',
                            items: {
                                src: cart_contents
                            },
                            callbacks: {
                                open: function() {
                                    $(".mfp-added-cart .add-to-cart").click(function() {
                                        gtag('event', 'Add to Cart Popup - Click - Checkout', {
                                            'event_category': 'Cart Events',
                                        });
                                    });
                                    $(".mfp-added-cart .item a").click(function(event) {
                                        gtag('event', 'Add to Cart Popup - Click - PAP item', {
                                            'event_category': 'Cart Events',
                                            'event_label': $(this).closest('.item').find('h4').text()
                                        });
                                    });
                                },
                                close: function() {
                                    gtag('event', 'Add to Cart Popup - Click - Close', {
                                        'event_category': 'Cart Events',
                                    });

                                    window.location.reload();
                                }
                            }
                        });
                        $(".continue-shopping").click(function() {
                            gtag('event', 'Add to Cart Popup - Click - Continue Shopping', {
                                'event_category': 'Cart Events',
                            });
                            $.magnificPopup.close();
                            window.location.reload();

                        });
                        $(current_btn).removeClass("loading").html("Add to Cart");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error:", status, error);
                    alert("Something went wrong please try again later.");
                    $.magnificPopup.open({
                        items: {
                            src: '<div class="white-popup"><h3>Error Adding to Cart</h3><p>An error occurred while trying to add the selected product to your cart. Please try again.</p></div>',
                            type: 'inline'
                        }
                    });
                }
            });

        }


        $(document).ready(function() {

            // Image slider
            $('.slider-product').slick({
                autoplay: false,
                useTransform: true,
                cssEase: 'cubic-bezier(0.250, 0.460, 0.450, 0.940)',
                dots: false,
                speed: 500,
                slidesToShow: 1,
                adaptiveHeight: true,
                arrows: false
            });
            // On before slide change
            $('.slider-product').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                $(".slider-product-contain .thumbs a").removeClass("selected").eq(nextSlide).addClass("selected");
            });
            $(".slider-product-contain .thumbs a").click(function(e) {
                $(".slider-product-contain .thumbs a").removeClass("selected");
                $(this).addClass("selected");
                $('.slider-product').slick('slickGoTo', $(this).index());
                $('.slider-product').slick('slickSetOption', 'autoplay', false, true);
            });
            // Image zoom
            $('.slider-product a:not(.video-play)').magnificPopup({
                type: 'image',
                //closeBtnInside: false,
                fixedContentPos: true,
                closeOnContentClick: true,
                mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                image: {
                    verticalFit: true
                },
                zoom: {
                    enabled: true,
                    duration: 300 // don't foget to change the duration also in CSS
                }
            });
            $('.slider-product a').on('mfpOpen', function(e) {
                gtag('event', 'Image Zoom - NW', {
                    'event_category': 'Cart Events',
                    'event_label': $("#prodinfo input[name='additem']").val()
                });
            });

            // Tabs
            if ($('#product-tabs').length) {
                $('#product-tabs').responsiveTabs({
                    startCollapsed: false,
                    scrollToAccordion: false,
                    setHash: false
                    //animation: 'slide'
                });


                $(".product-tabs-nav a, .r-tabs-anchor").click(function(event) {
                    gtag('event', 'click', {
                        'event_category': 'Product Tabs',
                        'event_label': 'Product Tab - NW - ' + $(this).attr("href").substr(1)
                    });
                });
            }
            // Related Products slider
            $('.related-slider').slick({
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                useTransform: true,
                cssEase: 'cubic-bezier(0.250, 0.460, 0.450, 0.940)',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
            // if ($(".options-extra").length) has_extra_options = true;
            if ($("#purchase-options").length) has_purchase_options = true;
            if (has_purchase_options) {
                purchase_options_offset = $('#purchase-options').offset().top;
                purchase_options_height = $("#purchase-options").innerHeight();
                header_nav_height = $("header").innerHeight();
            }

            var eas_option_selected = false;
            $(".related-slider a").click(function() {
                gtag('event', 'Related Product - NW', {
                    'event_category': 'Cart Events',
                    'event_label': $(this).data("product-id")
                });
            });
            $(".infographic").click(function() {
                gtag('event', 'click', {
                    'event_category': 'Infographic',
                    'event_label': $(this).data("product-id")
                });
            });
            $(".buy-float").click(function() {
                gtag('event', 'Buy Now - NW', {
                    'event_category': 'Cart Events'
                });
            });

            const itemQtyElement = document.querySelector('.itemQty');
            const itemQty = itemQtyElement.value;
            const isInCartEle = document.getElementById('txtquanto');
            const isInCart = isInCartEle.attributes['isincart'].value;


            // Add to cart
            $(".add-to-cart").click(function(event) {
                event.preventDefault();
                console.log(document.querySelector('.itemQty').value);

                const newItemQty = itemQtyElement.value;

                if (!newItemQty || newItemQty == 0) {
                    alert("please enter a valid value");
                    return;
                }

                if (isNaN(newItemQty) || String(newItemQty).toLowerCase().includes('e')) {
                    alert("Please enter a valid quantity");
                    event.target.value = "";
                    return;
                }

                if ($("#prodinfo .btn").hasClass("loading")) { // START loading check
                } else { // ELSE loading check


                    current_btn = $("#prodinfo .add-to-cart");
                    $(current_btn).addClass("loading").html("Loading...");

                    let url = baseUrl + 'webshop_request';



                    const quantity = Number(newItemQty);
                    const price = Number(event.target.attributes.product_price.value);
                    const image = event.target.attributes.imageurl.value;
                    const name = event.target.attributes.productname.value;

                    let obj = {
                        action: "add_to_cart",
                        product_id: Number(event.target.attributes.product_id.value),
                        product_price: Number(event.target.attributes.product_price.value),
                        quantity: Number(newItemQty),
                        tax_rate: Number(event.target.attributes.tax_rate.value),
                        tax_method: Number(event.target.attributes.tax_method.value),
                        price: Number(event.target.attributes.price.value),
                        promotion_price: Number(event.target.attributes.promotion_price.value),

                    };

                    let updateObj = {
                        action: "update_cart",
                        itemKey: Number(event.target.attributes.product_id.value),
                        itemQty: newItemQty,
                    }

                    if (Number(isInCart)) {
                        if (itemQty == newItemQty) {
                            // alert("Please update the quantity");
                            window.location.href = `${baseUrl}/cart`;
                            $(current_btn).removeClass("loading").html("Add to Cart");
                            return;
                        }

                        updateCart(url, updateObj, newItemQty, price, image, name);
                        return;
                    }

                    addToCart(url, obj, quantity, price, image, name);
                } // END loading check
                return false;
            });




            $(".video-play").click(function(event) {
                $(this).hide();
                var video_id = $(this).data('video-id');
                $("#" + video_id).css({
                    display: 'block'
                });
                var vid = document.getElementById(video_id);
                vid.play();
            });

        });
    </script>
    <script>
        $(document).ready(function(){

    // Increase
    $(document).on('click', '.btn-increase', function(){
        var input = $(this).siblings('.itemQty');
        var qty = parseInt(input.val()) || 1;
        input.val(qty + 1);
    });

    // Decrease
    $(document).on('click', '.btn-decrease', function(){
        var input = $(this).siblings('.itemQty');
        var qty = parseInt(input.val()) || 1;
        if(qty > 1){
            input.val(qty - 1);
        }
    });

});

    </script>

    <script type="module" src="<?= $assets ?>nw_theme/js/common.js"></script>


</body>

</html>