<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - Shop Details</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Meenatshi Chettinadu Restaurant">
    <meta name="keywords" content="Meenatshi Chettinadu Restaurant" />
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==============================
       Google Web Fonts
    ============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cookie&family=Roboto:wght@300;400;500;700&family=Rufina:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="manifest" href="<?= $assets ?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $assets ?>restaurant/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
        All CSS File
    ============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/bootstrap.min.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/flaticon.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/fontawesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/jquery.datetimepicker.min.css">
    <!-- Layer Slider -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/nice-select.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/style.css">
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/theme-color1.css">
    <link rel="stylesheet" id="themeColor" href="#">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">
<style>
   .card-fixed {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    min-height: 500px;
    background: #fff;
    border: 1px solid #eee;
    padding: 15px;
}

/* Separate image box inside the card */
.card-fixed .product-header {
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f9f9f9;
    overflow: hidden;
}

.card-fixed .product-img img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain;
}

/* Make product body stretch and button stick to bottom */
.card-fixed .product-body {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-fixed .vs-btn {
    margin-top: auto;
}



</style>
</head>

<body>

    <!--********************************
           Code Start From Here 
    ******************************** -->
    <?php
    include_once('header.php');
    ?>

    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 background-image link-inherit mb-30"
    data-vs-img="<?= !empty($setting_map['banner_image']) ? $uploads . $setting_map['banner_image'] : $uploads . 'webshop/default_banner.png' ?>"
        data-overlay="black" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content text-center pt-65 pt-lg-140 pb-95 pb-lg-175">
                <h1 class="breadcumb-title sec-title1 text-white my-0">Ingredients</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Ingredients</li>
                </ul>
            </div>
        </div>
    </div>

   <?php include("restaurant_non_working_banner.php")?>
    <!--==============================
     Shop Area 
    ==============================-->
    <section class="vs-product-wrapper product-details-layout1 pt-10 pb-lg-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!-- <span class='product-details-available-banner'><p>ALL DAYS<br/></span> -->
                    <div class="product-img vs-carousel slick-dots-white arrow-white" data-slidetoshow="1"
                        data-dots="true" data-arrows="true">
                        <?php $og_image = $this->data['product']['image'];
                        $uploads = $this->data['uploads'];
                        ?>   
                        <div>
                            <img src="<?= $uploads . $og_image ?>" alt="Product Image" class="w-100"> 
                        </div> 
                        <?php
                            if (is_array($gallary_images) && !empty($gallary_images)) { 
                                foreach ($gallary_images as $image) { ?>
                                    <div>
                                        <img src="<?= $uploads . $image['photo'] ?>" alt="Product Image" class="w-100"> 
                                    </div> <?php
                                }   
                            }  
                        ?>
                        <!-- <div>
                            <img src="<?= $uploads . $og_image ?>" alt="Food Image" class="w-100"> 
                        </div>  -->
                        <!-- <div>
                            <span class='product-available-banner'><p>ALL DAYS<br/></span>
                            <img src="<?= $uploads . $image ?>" alt="Food Image" class="w-100">
                        </div>
                        <div>
                            <span class='product-available-banner'><p>ALL DAYS<br/></span>
                            <img src="<?= $uploads . $image ?>" alt="Food Image" class="w-100">
                        </div>
                        <div>
                            <span class='product-available-banner'><p>ALL DAYS<br/></span>
                            <img src="<?= $uploads . $image ?>" alt="Food Image" class="w-100">
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-7 align-self-center pr-4 pt-4 pt-lg-0">
                    <div class="product-content">
                        <?php
                        $price = $this->data['product']['price'] ? $this->data['product']['price'] : 0;
                        $variantId = $this->data['product']['variant_id'] ? $this->data['product']['variant_id'] : 0;
                        $variantPrice = $this->data['product']['variant_price'] ? $this->data['product']['variant_price'] : 0;
                        $unitQuantity = $this->data['product']['unit_quantity' ] ? $this->data['product']['unit_quantity']  : 1;
                        $name = $this->data['product']['name'];
                        $prodId = $this->data['product']['id'];
                        $productCategoryId = $this->data['product']['category_id'];
                        $categoryActive = $this->data['product']['category_is_active'][0];
                        $productActive = $this->data['product']['product_is_active'];
                        $productInfoText = $this->data['product']['product_info_text'];
                        $restaurant_is_active = ($this->data['restaurant_is_active']['is_working'] == "false" || $this->data['restaurant_is_active']['is_holiday'] == "false") ? false : true ;
                        $isIncartQuantity;
                        foreach ($this->data['cart_items'] as $item) {
                            if ($item['product_id'] == $prodId) {
                                $isIncartQuantity = $item;
                                $found = true;
                                break; 
                            }
                        }
                        $selectedCategory;
                        foreach ($this->data['categories']['main'] as $category) {                            
                            if ($category->id == $productCategoryId) {
                                $selectedCategory = $category;
                                break;
                            }
                        }
                        ?>
                        <div class="price text-bold mb-10 text-lg">
                            <span class="text-theme" id="productPrice" value="<?= $price ?>" prodid=<?= $prodId ?>>
                                <?= $this->sma->formatMoney($price) ?></span>
                        </div>
                        <h2 class="product-title h3"><?= $name ?></h2>

                        <div class="action-buttons d-xl-flex">
                            <div class="quantity-box mr-10 justify-content-start mb-4 mb-xl-0">
                                <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                <input type="text" value="<?= $found ?  $isIncartQuantity['quantity'] : 1 ?>" id="<?= $isIncartQuantity["product_id"] ?>" isincart="<?= $found ?  1 : 0 ?>" id="<?= $isIncartQuantity["product_id"] ?>" class="qty-input" min="1" step="1" 
                                oninput="validateQuantity(this)" readonly>
                                <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                            </div>
                            <!-- <a class="icon-btn bg-theme" href="#" productId=<?= $prodId ?> variantId=<?= $variantId ?> variantPrice=<?= $variantPrice ?> unitQuantity=<?= $unitQuantity ?> >
                                <i class="far fa-heart"></i>
                            </a> -->
                            <a class="vs-btn style1 rounded-0 <?= ((!$restaurant_is_active)  || ($categoryActive == 'false') || ($productActive == "false")) ? 'greyOutProductDetail' : "" ?>" href="<?= base_url('webshop/cart') ?>" id="orderNowBtn">
                                Order Now 
                            </a> 
                            <?= 
                                ((!$restaurant_is_active) || ($categoryActive == 'false') || ($productActive == "false")) && $productInfoText
                                    ? '<span class="productDetailsInfoPill">' .
                                        ($productInfoText[0] == "All*" 
                                            ? "All Days" . (!empty($productInfoText[1]) ? "<br/>" . $productInfoText[1] : "")
                                            : $productInfoText[0] . (!empty($productInfoText[1]) ? "<br/>" . $productInfoText[1] : "")
                                        ) .
                                    '</span>'
                                    : ''
                            ?>              
                            <!-- <a class="icon-btn bg-theme rounded-0" href="<?= base_url('webshop/cart') ?>" id="cartButton"><i
                                    class="far fa-shopping-cart"></i></a> -->
                        </div>
                        <div class="border-top py-15 mt-30 link-inherit list-style-none">
                            <ul>
                                <li class="mb-2"><strong>Categories:</strong>
                                    <a href="<?= base_url('webshop') ?>"><?= $selectedCategory->name ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($product['product_details'])): ?>
            <ul class="nav product-tab-style1 mt-lg-60 mt-30" id="productTab" role="tablist">
                <li>
                    <a class="active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description"
                        aria-selected="false" class="">Description</a>
                </li>
                <!-- <li>
                    <a id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                        aria-selected="true">Review (02)</a>
                </li> -->
            </ul>
            <div class="tab-content" id="productDetailsTab">
                <div class="tab-pane show active" id="description" aria-labelledby="description-tab">
                    <div class="product-description">
                    <p class="about-text mb-xl-55"><?= isset($product['product_details']) ? $product['product_details'] : '' ?></p>
                    </div>
                </div>
                <div class="tab-pane" id="review" aria-labelledby="review-tab">
                    <div class="vs-comment-area list-style-none vs-comments-layout1   ">
                        <ul class="comment-list">
                            <li class="vs-comment">
                                <div class="vs-post-comment">
                                    <div class="author-img">
                                        <img src="assets/img/blog/blog-comments-author-1.jpg" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-top">
                                            <div class="comment-author">
                                                <span class="commented-on">22 April, 2022</span>
                                                <h4 class="name">Mark Jack</h4>
                                            </div>
                                            <div class="reply_and_edit">
                                                <a href="blog-details.html" class="vs-btn style1"><i
                                                        class="fal fa-reply-all mr-10"></i>Replay</a>
                                            </div>
                                        </div>
                                        <p class="text">Progressively procrastinate mission-critical action items before
                                            team building ROI.
                                            Interactively provide access to cross functional quality vectors for
                                            client-centric catalysts for change.
                                        </p>
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="vs-comment">
                                        <div class="vs-post-comment">
                                            <div class="author-img">
                                                <img src="assets/img/blog/blog-comments-author-2.jpg"
                                                    alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <div class="comment-top">
                                                    <div class="comment-author">
                                                        <span class="commented-on">23 April, 2022</span>
                                                        <h4 class="name">John Deo</h4>
                                                    </div>
                                                    <div class="reply_and_edit">
                                                        <a href="blog-details.html" class="vs-btn style1"><i
                                                                class="fal fa-reply-all mr-10"></i>Replay</a>
                                                    </div>
                                                </div>
                                                <p class="text">Competently provide access to fully researched methods
                                                    of empowerment without sticky models. Credibly morph front-end niche
                                                    markets.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="vs-comment">
                                <div class="vs-post-comment">
                                    <div class="author-img">
                                        <img src="assets/img/blog/blog-comments-author-3.jpg" alt="Comment Author">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-top">
                                            <div class="comment-author">
                                                <span class="commented-on">26 April, 2022</span>
                                                <h4 class="name">Tara sing</h4>
                                            </div>
                                            <div class="reply_and_edit">
                                                <a href="blog-details.html" class="vs-btn style1"><i
                                                        class="fal fa-reply-all mr-10"></i>Replay</a>
                                            </div>
                                        </div>
                                        <p class="text">Competently provide access to fully researched methods of
                                            empowerment without sticky models. Credibly morph front-end niche markets
                                            whereas 2.0 users. Enthusiastically seize team.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- Review Form -->
                    <!-- <div
                        class="vs-comment-form comment-form-layout1 bg-smoke px-10 px-md-30 pt-30 pb-30 mb-lg-60 mb-md-40 mb-30">
                        <div class="form-title">
                            <h3 class="h3">Add A Review</h3>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="vs-rating-input mb-30">
                                    <strong>Your rating: </strong>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                    <span class="active"><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                            <div class="col-12 form-group">
                                <textarea placeholder="Write a Message" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" placeholder="Your Name" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" placeholder="Your Email" class="form-control">
                            </div>
                            <div class="col-12 form-group mb-0">
                                <button class="vs-btn style3 rounded-0">Submit</button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <?php endif; ?>
            <!-- Related products -->
            <div class="related-products vs-product-layout1 link-inherit">
                <h3 class="mb-lg-35">Related products</h3>
                <div class="row vs-carousel g-5" data-slidetoshow="3" data-mdslidetoshow="2" data-smslidetoshow="1" data-xsslidetoshow="1">
                    <?php 
                        if(isset($related_products) && !empty($related_products)) { 
                            // var_dump($related_products);
                            foreach ($related_products as $product) {
                                if ($product["id"] !== $prodId) { 
                    ?>                        
                        <div class="col-md-8 col-lg-6">
                            <div class="vs-product card-fixed">
                                <div class="product-header">
                                    <div class="product-img">
                                        <img src="<?= $uploads . $product["image"] ?>" alt="Product Image" class="w-100">
                                    </div>
                                    <span class="discount"></span>
                                    <div class="action-buttons">
                                        <!-- <a class="icon-btn bg-theme" href="#"><i class="far fa-heart"></i></a>ss -->
                                        <a class="icon-btn bg-theme popup-image" href="<?= base_url('assets/mdata/' . $this->Customer_assets . '/uploads/' . $product['image']) ?>"><i class="far fa-eye"></i></a>

                                    </div>
                                </div>
                                <div class="product-body d-flex flex-column justify-content-between">
                                    <div class="product-content">
                                        <div class="price text-bold">
                                            <span class="text-theme"><?= $this->sma->formatMoney($product["price"]) ?></span>
                                        </div>
                                        <h3 class="product-title h4"><a href="<?= base_url("webshop/product_details/" . md5($product['id'])) ?>"><?= $product["name"] ?></a></h3>
                                    <a class="vs-btn style1 rounded-0 <?= ((!$restaurant_is_active)  || ($categoryActive == 'false') ) ? 'greyOutProductDetail' : "" ?>" href="<?= base_url("webshop/product_details/" . md5($product['id'])) ?>">Order Now</a>
                                    
                                    </div>
                                </div>

                            </div>
                        </div>                          
                    <?php
                                }
                            }
                        } 
                    ?>
                </div>
            </div>
            
        </div>
    </section>

    <!--==============================
            Footer Area
    ==============================-->
    <?php
    include_once('footer.php');
    ?>


    <!--********************************
                    Code End  Here 
    ******************************** -->

    <!--==============================
    Sidemenu
============================== -->
    <!-- header cart -->
    <?php  include_once('header_cart.php')  ?>
    <!--  -->
    <!-- Scroll Top Top Button -->
    <!-- <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a> -->


    <!--==============================
        All Js File
    ============================== -->
    <script defer src="<?= $assets ?>restaurant/js/vendor/jquery.min.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script defer src="<?= $assets ?>restaurant/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script defer src="<?= $assets ?>restaurant/js/bootstrap.min.js"></script>
    <!-- Layer Slider -->
    <script defer src="<?= $assets ?>restaurant/js/greensock.min.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/layerslider.transitions.js"></script>
    <!-- Counter js -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.counterup.min.js"></script>
    <script defer src="<?= $assets ?>restaurant/js/waypoints.min.js"></script>
    <!-- Date Picker -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script defer src="<?= $assets ?>restaurant/js/jquery.nice-select.min.js"></script>
    <!-- Custom Carousel -->
    <script defer src="<?= $assets ?>restaurant/js/vscustom-carousel.min.js"></script>
    <!-- Mobile Menu -->
    <script defer src="<?= $assets ?>restaurant/js/vsmenu.min.js"></script>
    <!-- Form Js -->
    <script defer src="<?= $assets ?>restaurant/js/ajax-mail.js"></script>
    <!-- Google Map js -->
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <!-- Image Loaded -->
    <script defer src="<?= $assets ?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script defer src="<?= $assets ?>restaurant/js/main.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/product_details.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
        const title = '<?= !empty($setting_map['title']) ? $setting_map['title'] : "Default Website Title" ?>';
        document.querySelector("title").textContent = `Product Details - ${title}`;
    </script>
<script>
    function validateQuantity(input) {
    if (parseInt(input.value) < 1) {
        input.value = 1;  
    }
}
</script>
</body>

</html>