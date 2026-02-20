<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
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
    <meta name="google-site-verification" content="vaKLz762nEBRW-9yZ1dHDuoBm2UAQNH15mSfjY6C9r0" />

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
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
</head>

<body>


    <!--[if lte IE 9]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



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
                <h1 class="breadcumb-title sec-title1 text-white my-0">Cart</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
    Cart Area
    ==============================-->
    <div class="vs-cart-wrapper py-10">
        <div class="container text-center" id="container">
            <?php if (is_array($cart_items) && count($cart_items)) { ?>

                <div class="cart-table table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th class="cart-col-image" scope="col">Image</th>
                                <th class="cart-col-productname" scope="col">Product</th>
                                <th class="cart-col-price" scope="col">Price</th>
                                <th class="cart-col-quantity" scope="col">Quantity</th>
                                <th class="cart-col-total" scope="col">Total</th>
                                <th class="cart-col-remove" scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems">

                            <?php
                            $subtotal = 0;

                            foreach ($cart_items as $itemKey => $item) {

                                if (isset($cart_data['variant_images']) && $cart_data['variant_images'][$itemKey]) {
                                    $item_image = $cart_data['variant_images'][$itemKey];
                                } else {
                                    $item_image = $cart_data['products'][$item['product_id']]['image'];
                                }

                                $product_name = $cart_data['products'][$item['product_id']]['name'];

                                $variant_name = ($item['variant_id']) ? ' ' . $cart_data['variants'][$item['variant_id']]['name'] : '';
                                ?>

                                <tr>
                                    <td>
                                        <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>" class="cart-productimage">
                                            <img src="<?= $thumbs . $item_image ?>" alt="product image">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>" class="cart-productname"><?= $product_name ?></a>
                                    </td>
                                    <td class="cart-price" value="<?= number_format((float) $item['product_price'], 2, '.', '') ?>" style="text-align:right" symbol="<?= $Settings->symbol?>"> <?= $this->sma->formatMoney($item['product_price'], 2) ?></td>
                                    <td>
                                        <div class="quantity-box">
                                            <button class="quantity-minus qut-btn">
                                                <i class="far fa-minus"></i>
                                            </button>
                                            <input type="number" disabled class="qty-input" id="<?= $itemKey ?>" value="<?= $item['quantity'] ?>" min=0 />
                                            <button class="quantity-plus qut-btn">
                                                <i class="far fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td style="text-align:right">
                                        <span class="cart-totalprice" value="<?= number_format((float) $item['quantity'] * (float) $item['product_price'], 2, '.', '')?>" symbol="<?= $Settings->symbol?>"><?= $this->sma->formatMoney((float) $item['quantity'] * (float) $item['product_price'], 2) ?></span>
                                    </td>
                                    <td>
                                        <button class="removeProduct cart-removeproduct"
                                            onclick="remove_cart_item('<?= $itemKey ?>')"><i
                                                class="removeProduct fas fa-times"></i></button>
                                    </td>
                                </tr>

                                <?php $subtotal += ((float) $item['quantity'] * (float) $item['product_price']);
                            } ?>
                            <!-- <tr>
                                <td colspan="6" class="actions">
                                    <form action="#" class="vs-cart-coupon">
                                        <label for="coupon-field" class="sr-only">Have a coupon code?</label>
                                        <input class="form-control" type="text" id="coupon-field"
                                            placeholder="Enter coupon code" required="required">
                                        <button type="submit" class="vs-btn mask-style1">Submit</button>
                                    </form>
                                    <a href="../webshop" class="vs-btn mask-style1 mb-2 mb-md-0">Continue Shopping</a>
                                    <a href="#" class="vs-btn mask-style1" id="updateCartButton">Update Cart</a>
                                </td>
                            </tr> -->                            
                        </tbody>
                    </table>
                </div>
                <div class="vs-cart-bottom mt-4">
                    <div class="row justify-content-end">
                        <div class="col-md-6 col-lg-4">
                            <div class="vs-cart-summary">
                                <h3 class="summary-title">Cart Totals</h3>
                                <table class="table table-totals">
                                    <tbody id="cartPricing">
                                        <tr>
                                            <td>Subtotal</td>
                                            <td id="subtotal"><?= $this->sma->formatMoney($subtotal) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <td id="tax"> <?=$this->sma->formatMoney(0)?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Order Total</td>
                                            <td id="cart_total"><?= $this->sma->formatMoney($subtotal) ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a href="./checkout" class="vs-btn mask-style1 checkout-button-trigger">Proceed To Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else { ?>
                <h2 class='mt-100 mb-100'>Your cart is empty!</h2>
            <?php } ?>

        </div>
    </div>


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
    <!-- Jquery -->
    <script src="<?= $assets ?>restaurant/js/vendor/jquery.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script src="<?= $assets ?>restaurant/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $assets ?>restaurant/js/bootstrap.min.js"></script>
    <!-- Layer Slider -->
    <script src="<?= $assets ?>restaurant/js/greensock.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="<?= $assets ?>restaurant/js/layerslider.transitions.js"></script>
    <!-- Counter js -->
    <script src="<?= $assets ?>restaurant/js/jquery.counterup.min.js"></script>
    <script src="<?= $assets ?>restaurant/js/waypoints.min.js"></script>
    <!-- Date Picker -->
    <script src="<?= $assets ?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?= $assets ?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="<?= $assets ?>restaurant/js/jquery.nice-select.min.js"></script>
    <!-- Custom Carousel -->
    <script src="<?= $assets ?>restaurant/js/vscustom-carousel.min.js"></script>
    <!-- Mobile Menu -->
    <script src="<?= $assets ?>restaurant/js/vsmenu.min.js"></script>
    <!-- Form Js -->
    <script src="<?= $assets ?>restaurant/js/ajax-mail.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <!-- Image Loaded -->
    <script src="<?= $assets ?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="<?= $assets ?>restaurant/js/main.js"></script>
    <script type="text/javascript" src="<?= $assets ?>restaurant/js/cart.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
        var formatMoney = "<?= $this->sma->formatMoney ?> "
        const title = '<?= !empty($setting_map['title']) ? $setting_map['title'] : "Default Website Title" ?>';
        document.querySelector("title").textContent = `Cart - ${title}`;
    </script>
    
    <script>
   ///////////////////////////Modal View Call as per condition////////////////////////////////////     
  document.addEventListener("DOMContentLoaded", function () {
    const modal = new bootstrap.Modal(document.getElementById('signinModal'));

    // Updated selector to match the button class
    document.querySelectorAll(".checkout-button-trigger").forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        modal.show();
      });
    });

    const goToCartBtn = document.getElementById("goToCartBtn");
    if (goToCartBtn) {
      goToCartBtn.addEventListener("click", function (e) {
        e.preventDefault();
        modal.show();
      });
    }
  });
</script>
</body>

</html>