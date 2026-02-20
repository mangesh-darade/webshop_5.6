<!-- HTML -->
<html lang="en" webcrx="">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="robots" content="noindex">
    <title>Cart - Herbinn Micro Medicines</title>
    <meta name="description" content="Established in the year 1994 we Herbinn Micro Medicines">
    <link href="//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Raleway:600" rel="stylesheet"
        type="text/css">
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=20090901" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/shop-tweaks.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/checkout.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css" media="screen" charset="utf-8">
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">


</head>

<body class="scrolly" style="top: 100px;">

    <?php include_once('header.php') ?>

    <div class="main shop">
        <div class="container">
            <div class="main-row">
                <div class="main-content shop-cart full-width">
                    <h1>Cart</h1>
                    <?php if (is_array($cart_items) && count($cart_items)) { ?>
                        <form class="form-inline source-key" role="form">

                            <div class="form-group">
                                <span>Do you have a promotion or offer code?
                                    <!-- <a
                                        href="#"
                                        class="popup-ajax">Learn more</a> -->
                                </span>
                                <label class="sr-only" for="discount">Promo code</label>
                                <input type="text" autocomplete="off" class="form-control" name="discount" id="discount"
                                    value="">
                                <button type="submit" class="btn btn-primary code_submit" style="border-radius:60px">Apply code</button>
                            </div>

                            <!-- Coupon response area -->
                            <div id="coupon_code_response" style="margin-top: 10px;"></div>

                            <!-- Hidden fields for coupon data -->
                            <input type="hidden" id="coupon_code_id" value="">
                            <input type="hidden" id="coupon_code_value" value="">
                            <input type="hidden" id="coupon_discount_rate" value="">
                            <input type="hidden" id="coupon_discount_amount" value="">

                        </form>
                        <?php

                        $subtotal = 0;
                        foreach ($cart_items as $itemKey => $item) {
                            if (isset($cart_data['variant_images']) && $cart_data['variant_images'][$itemKey]) {
                                $item_image = $cart_data['variant_images'][$itemKey];
                            } else {
                                $item_image = $cart_data['products'][$item['product_id']]['image'];
                            }

                            $item_name = $cart_data['products'][$item['product_id']]['name'];
                            $subtotal += ((float) $item['quantity'] * (float) $item['product_price']);
                            $item_id = $item['product_id'];

                        ?>
                            <form method="post" name="basketform" id="modify-basket">
                                <div class="product">
                                    <div class="item info">
                                        <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>"><img src="<?= $uploads . $item_image ?>"
                                                alt="<?= $item_name ?>" class="img-responsive"></a>
                                        <div>
                                            <h3><a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>"><?= $item_name ?></a></h3>
                                        </div>
                                    </div>

                                    <div class="item options">

                                    </div>

                                    <div class="item qty">
                                        <input type="hidden" name="ItemNumber" value="SN1002">
                                        <input type="hidden" name="prevqty" value="1">

                                        <div>
                                            <label>Qty</label>
                                            <input type="number" value="<?= $item['quantity'] ?>" class="item-qty-cart" productid="<?= $item_id ?>" min=1 onkeydown="event.preventDefault(); alert('Please use spinner arrows');" />
                                        </div>

                                        <?php
                                        echo !empty($item['show_price'])
                                            ? '<p class="price">
                                                <span class="sale">'
                                            . $this->sma->formatMoney($item['product_price']) .
                                            '</span>
                                                </p>'
                                            : '';
                                        ?>
                                        <a href="#" class="remove" cart_item_key="<?= $item_id ?>">
                                            <i class="icon-remove fa fa-remove"></i>
                                            Remove
                                        </a>
                                    </div>

                                    <div class="item total">
                                        Subtotal <span><?= $this->sma->formatMoney((float) $item['quantity'] * (float) $item['product_price'], 2) ?></span>
                                    </div>
                                </div>

                                <input type="submit" class="btn" name="update-cart" value="Update Cart"
                                    src="/images/btn-updatebasket.gif" alt="Update Cart" style="display: none;">
                            </form>
                        <?php }
                        ?>

                        <div class="cart-checkout">

                            <p class="total grand-total">Total: <?= $this->sma->formatMoney($subtotal) ?></p>
                            <input type="hidden" id="cart_original_subtotal" value="<?= $subtotal ?>" />

                            <p style="text-align:right; clear:both; margin-bottom:20px; font-weight:bold;"><a
                                    href="<?= base_url('webshop/checkout') ?>" class="btn-checkout">Checkout now</a></p>

                            <div style="overflow:auto">
                                <!-- <div
                                    style="float:right; max-width:420px; margin:0 0 15px; padding:12px 15px; border:1px solid #DDD">
                                    <h5 style="margin-top:0">Buy Now, Pay Later</h5>
                                    <div data-pp-message="" data-pp-placement="product" data-pp-style-layout="text"
                                        data-pp-id="1">

                                    </div>
                                </div> -->
                            </div>
                            <div class="seals">
                                <!-- <img src="<?= $assets ?>nw_theme/images/secure-credit-card-payment.jpg"
                                    alt="Secure credit card payment" title="Secure credit card payment"
                                    class="img-responsive secure-cc"> -->
                            </div>

                            <div class="paymentOptions" style="text-align:right; clear:both;">
                                <!-- <p
                                    title="How PayPal Works">
                                    <img
                                        src="<?= $assets ?>nw_theme/images/pp_cc_mark_37x23.jpg"
                                        border="0" alt="PayPal Logo">
                                </p> -->
                            </div>
                        </div>

                        <!-- <div class="basket-notices">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="guarantee-notice-new">
                                        <a href="#"><img
                                                src="<?= $assets ?>nw_theme/images/headline-guarantee.png"></a>
                                        <p>Try any product risk-free for 90 days. If you don't love it, simply send it back
                                            for a full refund. No questions asked – If it's the first time you purchased
                                            that product, we'll even pay for the return shipping.</p>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <?php } else {
                    ?>
                        <p>Your cart is empty.</p>

                        <a href="<?= base_url('webshop') ?>" class="btn btn-lg btn-primary">Continue Shopping</a>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <?php include_once('footer.php') ?>
    <div class="search-overlay"></div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-free-shipping">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 120%">FREE standard shipping only available in the contiguous United States.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= $assets ?>nw_theme/js/main.js"></script>

    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>

    <script>
        const baseUrl = "<?= base_url('webshop/') ?>";
        const currencySymbol = "<?= $this->data['Settings']->symbol ?>";
    </script>
    <script language="JavaScript" type="text/javascript">
        // function validateEmail(email) {
        //     var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        //     return re.test(String(email).toLowerCase());
        // }
        $(document).ready(function() {

            Array.from(document.querySelectorAll(".item-qty-cart")).forEach(ele => {
                let timerId = 0;
                ele.addEventListener("input", (event) => {
                    // $("#loading-overlay").fadeIn(250);
                    let updateObj = {
                        action: "update_cart",
                        itemKey: Number(event.target.attributes.productid.value),
                        itemQty: event.target.value,
                    }
                    // console.log("changed");
                    if (!event.target.value.trim() || Number(event.target.value) < 0) {
                        if (timerId) {
                            clearTimeout(timerId);
                        }
                        timerId = setTimeout(() => {
                            alert("Please enter a valid value");
                            window.location.reload();
                            return;
                        }, 1500);

                    }

                    if (event.target.value != 0 && event.target.value != "e" &&
                        event.target.value != "E" && Number(event.target.value) > 0) {
                        $.ajax({
                            type: 'POST',
                            url: baseUrl + "webshop_request",
                            data: updateObj,
                            success: function(data) {
                                if (data == "SUCCESS") {

                                    if (timerId) {
                                        clearTimeout(timerId);
                                    }
                                    timerId = setTimeout(() => {
                                        alert("Cart updated successfully!");
                                        window.location.reload();
                                    }, 1500);
                                    // alert("Cart updated successfully");
                                    // window.location.reload();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("Error:", status, error);
                                alert("Something went wrong please try again later.");
                            }
                        });

                    }

                })
            })
            $('.remove').click(function(event) {
                // $("#loading-overlay").fadeIn(250);

                console.log("euuuuuuuuu")

                let obj = {
                    action: "remove_cart_item",
                    action_source: "cart_page",
                    cart_item_key: event.target.attributes.cart_item_key.value,
                };

                $.ajax({
                    type: "POST",
                    url: baseUrl + "webshop_request",
                    data: obj,
                    success: function(data) {
                        alert("Cart updated successfully!");
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log("Error:", status, error);
                        alert("Something went wrong please try again later");
                    },
                });
                return true;
            });
            $('input[name="update-cart"]').hide();
        });
    </script>
    <script src="<?= $assets ?>custom_js/common.js"></script>
    <script src="<?= $assets ?>nw_theme/js/cart.js"></script>
</body>


</html>