<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Category Products - Herbinn Micro Medicines</title>
    <meta name="description" content="Established in the year 1994 we Herbinn Micro Medicines">
    <link rel="canonical" href="https://herbinnmicromedicines.elintpos.in/webshop">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic|Oxygen:700" rel="stylesheet" type="text/css">
    <link href="<?= $assets ?>nw_theme/css/main.css?ver=210616_01" rel="stylesheet" media="screen" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/print.css" rel="stylesheet" type="text/css" media="print" charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $assets ?>nw_theme/css/jquery-ui.min.css" rel="stylesheet" type="text/css" charset="utf-8">
    <link href="<?= $assets ?>nw_theme/css/new-template.css?ver=230912_06" rel="stylesheet" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="<?= $assets ?>nw_theme/css/common.css">
    <link rel="icon" type="image/x-icon" href="<?= $uploads ?>webshop/herbinn_favicon.ico">

    <style>
        .product-category-alt {

            padding: 15px 20px;

        }

        .product-category-alt h3 {

            font-size: 20px;

            margin: 5px 0 8px;

        }

        .product-category-alt h3 a {

            color: #000;

        }

        .product-category-alt .price {

            display: block;

            font-size: 18px;

            font-weight: bold;

            color: #428B00;

            margin-bottom: 5px;

        }

        .product-category-alt .price strong {

            color: #FF0000;

        }

        .product-category-alt .price del {

            font-weight: normal;

            color: #999;

        }

        .product-category-alt .info p {

            font-size: 14px;

            line-height: 20px;

        }

        .product-category-alt .btn {

            margin-bottom: 10px;

        }

        .stars {

            display: inline-block;

            color: #EBB600;

            margin-bottom: 5px;

        }

        .toggle-vis-desc {

            position: absolute;

            top: 0;

            right: 0;

        }

        .toggle-vis-buttons {

            position: absolute;

            top: 0;

            right: 110px;

        }

        @media (min-width:1200px) {

            .product-category-alt {

                padding: 15px 25px;

            }

        }
    </style>


    <style id="dark-reader-style" type="text/css">
        @media screen {
            html {
                -webkit-transition: -webkit-filter 300ms linear;
            }
        }
    </style>
</head>





<body class="" style="top: 101px;">

    <?php include_once('header.php')  ?>


    <?php
    $baseUrl = base_url('webshop/');
    $productsList = $this->data['listItems'];

    $selectedCategoryId = $this->data['get_category_id'];
    $selectedCategory;
    foreach ($this->data['categories']['main'] as $category) {

        if ($category->id == $selectedCategoryId) {
            $selectedCategory = $category;
            break;
        }
    }

    ?>
    <div class="main category">


        <div class="heading-category">
            <div class="container">
                <div class="copy">
                    <h1><?= $selectedCategory->name ?></h1>

                </div>
            </div>

        </div>

        <?php
        if (!empty($productsList)) { ?>
            <div class="container">
                <div class="main-row">
                    <div class="main-content  full-width">
                        <div class="product-list-new">
                            <div class="row">
                                <?php
                                $baseUrl = base_url('webshop/');
                                $productsList = $this->data['listItems'];

                                $selectedCategory;
                                foreach ($this->data['categories']['main'] as $category) {
                                    if ($category->id == $productsList[0]['category_id']) {
                                        $selectedCategory = $category;
                                        break;
                                    }
                                }

                                if (!empty($productsList)) {
                                    foreach ($productsList as $product) {

                                        $productId =  $product['id'];
                                        $image = $product['image'];
                                        $uploads = $this->data['uploads'];
                                        $productPrice = $product['price'];
                                        $productTaxRate = $product['tax_rate'];
                                        $productTaxMethod = $product['tax_method'];
                                        $productPromoPrice = $product['promo_price'];
                                        $formatedPrice = $product['formatedPrice'];
                                        $productDesc = $product['product_details'];
                                ?>
                                        <div class="product-category-alt col-sm-6 col-md-4">
                                            <form>
                                                <!-- <input type="hidden" name="action" value="add_to_cart">
                                            <input type="hidden" name="product_id" value="<?= $productId ?>">
                                            <input type="hidden" name="variant_id" value="N438">
                                            <input type="hidden" name="variant_price">
                                            <input type="hidden" name="variant_unit_quantity" value="1">
                                            <input type="hidden" name="product_price" value="<?= $productPrice ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="tax_rate" value="<?= $productTaxRate ?>">
                                            <input type="hidden" name="tax_method" value="<?= $productTaxMethod ?>">
                                            <input type="hidden" name="price" value="<?= $productPrice ?>">
                                            <input type="hidden" name="promotion_price" value="<?= $productPromoPrice ?>"> -->
                                                <a href="<?= $baseUrl . 'product_details/' . $product['proudctIdHash'] ?>" class="image"><img src="<?= !empty($image) ?  $uploads . $image : $thumbs . 'no_image.png' ?>" class="img-responsive" alt="<?= $product['name'] ?>"></a>
                                                <div class="info">
                                                    <h3><a href="<?= $baseUrl . 'product_details/' . $product['proudctIdHash'] ?>"><?= $product['name'] ?></a></h3>
                                                    <span class="price <?php echo ($selectedCategory->name == 'Softgel Capsules' ||  $selectedCategory->name == 'Veterinary Nutraceuticals ') ? 'hide_price' : '' ?>" id="product_price"><?= $formatedPrice ?>
                                                    </span>

                                                    <p><?= $product['product_details'] ?> </p>
                                                    <input type="submit" class="btn add-to-cart btn-morris" alt="Add to Cart" value="Add to Cart" product_id="<?= $productId ?>" quantity="1" tax_rate="<?= $productTaxRate ?>" tax_method="<?= $productTaxMethod ?>" price="<?= $productPrice ?>" promotion_price="<?= $productPromoPrice ?>" product_price="<?= $productPrice ?>" product_desc="<?= $productDesc ?>" imageurl='<?= $uploads . $image ?>' productname="<?= $product['name'] ?>" />
                                                    <a href="<?= $baseUrl . 'product_details/' . $product['proudctIdHash'] ?>" class="btn btn-grey btn-morris" data-product="<?= $product['name'] ?>">View Full Details</a>
                                                </div>
                                            </form>
                                        </div>
                                <?php }
                                } ?>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

        <?php } else { ?>
            <h1 class="container" style="display:flex; justify-content:center; align-items:center">There are no products in this category</h1>
        <?php } ?>
    </div>


    <?php include_once('footer.php') ?>
    <div class="search-overlay"></div>
    <div class="modal fade" id="modal-free-shipping" tabindex="-1" role="dialog" aria-labelledby="modal_banner_fine_print" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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

    <script src="<?= $assets ?>nw_theme/js/main.js?ver=200406"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.magnific-popup-new.min.js"></script>
    <script src="<?= $assets ?>nw_theme/js/welcome-message.js?ver=221017_01"></script>
    <script src="<?= $assets ?>nw_theme/js/jquery.scrolldepth.min.js"></script>
    <script>
        jQuery(function() {
            jQuery.scrollDepth();
        });
    </script>


    <script>
        baseUrl = "<?= base_url('webshop/') ?>";
        const currencySymbol = "<?= $this->data['Settings']->symbol ?>";

        $(document).ready(function(e) {



            $('a.btn-morris').click(function(event) {

                gtag('event', 'Cart Events', {
                    'event_category': 'Learn More - Category - NW',
                    'event_label': $(this).data("product")
                });
            });

            // Add to cart
            Array.from(document.querySelectorAll('.add-to-cart')).forEach(ele => {
                ele.addEventListener("click", function(event) {
                    event.preventDefault();
                    if ($(this).find("input[type='submit']").hasClass("loading")) { // START loading check
                    } else { // ELSE loading check
                        current_btn = $(this).find("input[type='submit']");
                        $(current_btn).addClass("loading").val("Loading...");
                        let url = baseUrl + 'webshop_request';



                        // console.log("eeeeevvvvveeeeennnnntttttt", event.target.attributes.product_desc.value)
                        const productPrice = event.target.attributes.product_price.value;
                        const quantity = Number(event.target.attributes.quantity.value);
                        const imageUrl = event.target.attributes.imageurl.value;
                        const itemName = event.target.attributes.productname.value
                        let obj = {
                            action: "add_to_cart",
                            product_id: Number(event.target.attributes.product_id.value),
                            product_price: Number(event.target.attributes.product_price.value),
                            quantity: Number(event.target.attributes.quantity.value),
                            tax_rate: Number(event.target.attributes.tax_rate.value),
                            tax_method: Number(event.target.attributes.tax_method.value),
                            price: Number(event.target.attributes.price.value),
                            promotion_price: Number(event.target.attributes.promotion_price.value),
                            // product_desc = event.target.attributes.product_desc.value ? event.target.attributes.product_desc.value : "",            
                            // product_desc = "",            
                        };


                        // throw new Error("Parameter is not a number!");
                        function addToCart(url, obj, quantity, price, image, name) {
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: obj,
                                success: function(jsonData) {
                                    let data = JSON.parse(jsonData);
                                    if (data.status == "SUCCESS") {

                                        // console.log("priceeeee", quantity);

                                        cart_contents = '<div class="mfp-added-cart"><h2>Added to cart</h2>';
                                        cart_contents += `<div class="row" style="margin-bottom:30px;"><div class="col-xs-4 col-md-4"><img class="img-responsive" src="${image}" alt="Product image"></div>`;
                                        // cart_contents += '<div class="col-xs-8 col-md-8 pap-item"><h3>' + json.item_added[0].name + '</h3>';
                                        cart_contents += `<div class="col-xs-8 col-md-8 pap-item"><h3>${name}</h3>`;
                                        // cart_contents += '<p><strong>Qty:</strong> ' + json.item_added[0].amount + ' &nbsp;&nbsp;<strong>Price:</strong> ' + display_price + '</p>';
                                        if (!document.getElementById('product_price').classList.contains('hide_price')) {
                                            cart_contents += '<p><strong>Qty:</strong> ' + quantity + ' &nbsp;&nbsp;<strong>Price:</strong> ' + currencySymbol + productPrice + '</p>';
                                        } else {
                                            cart_contents += '<p><strong>Qty:</strong> ' + quantity + ' &nbsp;&nbsp;</p>';
                                        }
                                        cart_contents += '<p><a href="<?= baseUrl("webshop/cart") ?>" class="btn add-to-cart" style="margin-bottom:5px; font-size:130%; padding-left:30px; padding-right:30px">View Cart &amp; Checkout</a> <a class="btn btn-grey btn-sm continue-shopping" style="border-radius:60px">Continue Shopping</a></p>';
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
                                                close: function() {
                                                    // update_mini_cart("");
                                                    window.location.reload();

                                                }
                                            }
                                        });
                                        $(".continue-shopping").click(function() {
                                            $.magnificPopup.close();
                                            window.location.reload();
                                        });
                                        $(current_btn).removeClass("loading").val("Add to Cart");
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

                        addToCart(url, obj, quantity, productPrice, imageUrl, itemName)


                    } // END loading check
                    return false;
                })

            })
            // END add to cart

        });
    </script>

    <script>
        (function() {
            function equalizeCards() {
                // Reset previous heights
                var cards = document.querySelectorAll('.product-category-alt');
                cards.forEach(function(c) {
                    c.style.height = 'auto';
                });

                // Compute tallest and apply
                var maxH = 0;
                cards.forEach(function(c) {
                    var h = c.getBoundingClientRect().height;
                    if (h > maxH) maxH = h;
                });
                cards.forEach(function(c) {
                    c.style.height = maxH + 'px';
                });
            }

            // Run after images load
            if (document.readyState === 'complete') {
                equalizeCards();
            } else {
                window.addEventListener('load', equalizeCards);
            }

            // Re-run on resize (debounced)
            var to;
            window.addEventListener('resize', function() {
                clearTimeout(to);
                to = setTimeout(equalizeCards, 150);
            });
        })();
    </script>

    <script type="module" src="<?= $assets ?>nw_theme/js/common.js"></script>

</body>

</html>