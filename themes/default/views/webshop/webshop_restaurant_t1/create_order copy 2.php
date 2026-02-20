<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - Checkout</title>
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
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $assets ?>restaurant/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $assets ?>restaurant/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $assets ?>restaurant/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $assets ?>restaurant/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $assets ?>restaurant/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $assets ?>restaurant/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $assets ?>restaurant/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $assets ?>restaurant/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $assets ?>restaurant/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?= $assets ?>restaurant/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>restaurant/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $assets ?>restaurant/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $assets ?>restaurant/img/favicons/favicon-16x16.png">
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
    <!-- <link rel="stylesheet" href="<?= $assets ?>restaurant/css/theme-color1.css"> -->
    <link rel="stylesheet" id="themeColor" href="#">
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/checkout.css" />
    <link rel="stylesheet" type="text/css" href="<?= $assets ?>restaurant/css/custom.css" />

</head>
 <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #fff;
        color: #000;
    }

    .order-container {
        border: 1px solid #ddd;
        padding: 20px;
        max-width: 700px;
        margin: auto;
        border-radius: 8px;
    }

    h2 {
        margin: 0 0 5px;
    }

    .date {
        color: #555;
    }

    .status-header {
        display: flex;
        align-items: center;
        font-size: 20px;
        font-weight: bold;
        margin: 20px 0 10px;
    }

    .status-header img {
        width: 25px;
        margin-right: 10px;
    }

    .progress-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 20px 0;
    }

    .step {
        text-align: center;
        flex: 1;
        position: relative;
    }

    .step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 16px;
        right: -50%;
        width: 100%;
        height: 4px;
        background-color: #f90;
        z-index: -1;
    }

    .step.complete:not(:last-child)::after {
        background-color: #f90;
    }

    .circle {
        background: #f90;
        color: #fff;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 8px;
    }

    .step.incomplete .circle {
        background-color: #ccc;
    }

    .address {
        margin: 20px 0;
    }

    .summary {
        text-align: right;
        font-size: 16px;
    }

    .summary div {
        margin: 4px 0;
    }

    .total {
        font-weight: bold;
    }

    .button {
        background-color: #ff7900;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 20px;
        display: inline-block;
    }
    </style>
<body>

    <!--==============================
            Header Area
    ==============================-->
    <?php
    include_once('header.php');
    ?>

    <div class="order-container">
        <h2>Order #1234567890</h2>
        <div class="date">May 15, 2025</div>

        <div class="status-header">
            <img src="https://img.icons8.com/ios-filled/50/000000/parcel.png" alt="icon">
            Order Ready
        </div>

        <div class="progress-bar">
            <div class="step complete">
                <div class="circle">✔</div>
                <div>Received<br><small>10:30<br>May 15, 2025</small></div>
            </div>
            <div class="step complete">
                <div class="circle">✔</div>
                <div>Preparing<br><small>10:57<br>May 15, 2025</small></div>
            </div>
            <div class="step complete">
                <div class="circle">✔</div>
                <div>Ready<br><small>16:25<br>May 15, 2025</small></div>
            </div>
            <div class="step incomplete">
                <div class="circle">•</div>
                <div>En Route</div>
            </div>
            <div class="step incomplete">
                <div class="circle">•</div>
                <div>Delivered<br><small>Est. 17:30</small></div>
            </div>
        </div>

        <div class="address">
            <strong>Deliver To:</strong><br>
            Box No. 34264<br>
            Dubai - 34264
        </div>

        <div class="summary">
            <div>Order Subtotal: 1500 د.إ</div>
            <div>Delivery Fee: 50 د.إ</div>
            <div>Tax: 25 د.إ</div>
            <div class="total">Order Total: 1575 د.إ</div>
        </div>

        <button class="button">View Order Details</button>
    </div>
    <!--==============================
            Footer Area
    ==============================-->
    <?php
    include_once('footer.php');
    ?>

  
    <!--  -->
    <!-- Scroll Top Top Button -->
    <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a>


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
    <script type="text/javascript" src="<?= $assets ?>restaurant/js/checkout.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script>
    var baseUrl = "<?= base_url('webshop/') ?>";
    </script>
    <script>
    document.getElementById("placeOrder").addEventListener("click", function(event) {
        var paymentSelected = document.querySelector('input[name="payment_method"]:checked');
        if (!paymentSelected) {
            alert("Please select a payment method before placing the order.");
            event.preventDefault();
        }
    });
    document.addEventListener("DOMContentLoaded", function() {
        const checkbox = document.getElementById('ship_to_different_address');
        const shippingFields = document.getElementById('shipping_fields');
        const sameAddressInput = document.getElementById('billing_and_shipping_address_is_same');
        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                shippingFields.classList.remove('d-none');
                sameAddressInput.value = 0;
            } else {
                shippingFields.classList.add('d-none');
                sameAddressInput.value = 1;
            }
        });
    });
    </script>
    <style>
    textarea.form-control {
        min-height: 122px !important;
    }
    </style>
</body>

</html>