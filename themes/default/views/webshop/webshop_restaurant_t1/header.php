<?php
$setting_map = [];
foreach ($website_setting as $item) {
    $setting_map[$item->fields] = $item->value;
}
?>
<!--==============================
     Preloader
    ==============================-->
<!-- <div class="preloader  ">
    <button class="vs-btn mask-style1 preloaderCls">Cancel Preloader </button>
    <div class="preloader-inner">
        <div class="loader-logo">
            <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image">
        </div>
        <div class="loader-wrap pt-4">
            <span class="loader"></span>
        </div>
    </div>
</div> -->
<!--==============================
    Popup Search Box
    ============================== -->
<div class="popup-search-box d-none d-lg-block  ">
    <button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>
    <form action="#">
        <input type="text" class="border-theme" placeholder="What are you looking for">
        <button type="submit"><i class="fal fa-search"></i></button>
    </form>
</div>

<div id="holiday-banner">

    <?php
    $isHoilday = $this->data['restaurant_is_active']['is_holiday'];
    $show_banner = $this->data['restaurant_is_active']['show_banner'];
    $infoText = $this->data['restaurant_is_active']['info_text'];
    $isWorking = $this->data['restaurant_is_active']['is_working'];

    echo $isWorking == "false" &&  $show_banner == "true" ? '<img src="' . $assets . 'restaurant/img/closed-image.png" class="close-img"/>' : "";
    echo $show_banner == "true" ? '<p>' . $infoText . '</p>' : '';
    ?>
</div>
<!--========================
    Sticky Header
    ========================-->
<div class="sticky-header-wrap sticky-header py-1 py-sm-2 py-lg-1 desktop-view" class="header_cart">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-6 col-md-3 col-lg-2 col-xl-2">
            <div class="header-logo">
                    <a href="<?= base_url('webshop') ?>"><img src="<?= !empty($setting_map['logo_image']) ? $uploads . $setting_map['logo_image'] : $uploads . 'webshop/Minatshi Logo.png' ?>" alt="Logo"></a>
                </div>
            </div>
            <div class="col-6 col-md-9 col-lg-5 col-xl-3 position-static">
                <nav class="main-menu menu-style1 link-inherit text-right text-xl-left">
                    <ul>
                        <li>
                            <a href="<?= base_url('webshop') ?>">Home</a>
                        </li>
                        <?php if (!empty($custom_pages_webshop->aboutus) && (int) $custom_pages_webshop->aboutus->is_active == 1): ?>
                            <li>
                                <a href="<?= base_url('webshop/about_us') ?>">About Us</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?= base_url('webshop/cart') ?>">Cart</a>
                        </li>
                        <?php if (!empty($custom_pages_webshop->contactus) && (int) $custom_pages_webshop->contactus->is_active == 1): ?>
                            <li>
                                <a href="<?= base_url('webshop/contactus') ?>"><?= $custom_pages_webshop->contactus->page_title ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <button type="button" class="vs-menu-toggle ml-auto d-block text-theme border-theme d-lg-none"><i
                        class="far fa-bars"></i></button>
            </div>
            <div class="col-lg-5 col-xl-7">
                <div class="header-right d-none d-lg-flex align-items-center justify-content-end">
                    <div class="contact-info media align-items-center d-none d-xl-flex">
                        <div class="media-icon mr-15 pl-30" data-overlay="theme" data-opacity="1">
                            <!-- <i class="fal fa-clock text-theme fa-2x"></i> -->
                            <button class="header-call-icon">
                                <img src="<?= $assets ?>restaurant/img/MeenatshiCallChatIcon.svg" alt="call_icon_webshop" />
                            </button>
                        </div>
                        <?php if (!empty($setting_map['phone_number'])): ?>
                            <div class="media-body">
                                <span class="d-block mb-1">Call for Order</span>
                                <p class="mb-0 h4 text-font1 custom-underline">
                                    <a href="tel:<?= preg_replace('/\s+/', '', $setting_map['phone_number']) ?>">
                                        <?= $setting_map['phone_number'] ?>
                                    </a>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="header-btn pl-lg-50">
                        <a href="#" class="icon-btn bg-light-theme mr-15 searchBoxTggler">
                            <i class="fal fa-search"></i>
                        </a>
                        <a href="<?php echo ($this->session->webshop->is_login == "true") ? base_url('webshop/your_account') : base_url('webshop/register') ?>" class="icon-btn bg-light-theme mr-15">
                            <i class="fal fa-user"></i>
                        </a>
                         <a href="<?php echo ($this->session->webshop->is_login == "true") ? base_url('webshop/your_account') : base_url('webshop/register') ?>" class="">
                            <span class=""><?php echo ($this->session->webshop->is_login == "true") ? explode(" ",  $this->session->webshop->name)[0] : '' ?></span>
                        </a>
                        <a href="#" class="icon-btn bg-light-theme sideMenuToggler cart-btn" class="cart_button">
                            <span class="number bg-theme cart-count"><?= count($cart_items) ?></span>
                            <i class="fal fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-header-wrap sticky-header py-1 py-sm-2 py-lg-1 header_cart mobile-view">
    <div class="container position-relative">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-6 col-md-3 col-lg-2 col-xl-2">
            <div class="header-logo">
                    <a href="<?= base_url('webshop') ?>"><img src="<?= !empty($setting_map['logo_image']) ? $uploads . $setting_map['logo_image'] : $uploads . 'webshop/Minatshi Logo.png' ?>" alt="Logo"></a>
                </div>
            </div>
            <!-- Menu and Toggle -->
            <div class="col-6 col-md-9 col-lg-7 col-xl-5 d-flex justify-content-end justify-content-lg-start align-items-center">
                <!-- Mobile Toggle Button -->
                <button type="button" class="vs-menu-toggle d-lg-none text-theme border-0 bg-transparent mr-2">
                    <i class="far fa-bars fa-lg"></i>
                </button>
                <!-- Main Menu -->
                <nav class="main-menu menu-style1 d-none d-lg-block">
                    <ul class="d-flex gap-3 mb-0 list-unstyled">
                        <li><a href="<?= base_url('webshop') ?>">Home</a></li>
                        <li><a href="<?= base_url('webshop/about_us') ?>">About Us</a></li>
                        <li><a href="<?= base_url('webshop/cart') ?>">Cart</a></li>
                        <li><a href="<?= base_url('webshop/contact_us') ?>">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Right Side: Contact and Cart -->
            <div class="col-12 col-lg-3 col-xl-5 mt-2 mt-lg-0">
                <div class="header-right d-flex flex-column flex-lg-row align-items-center justify-content-lg-end">
                    <!-- Contact Info -->
                    <div class="contact-info d-none d-xl-flex align-items-center mr-lg-4">
                        <div class="media-icon mr-2 pl-3">
                            <!-- <i class="fal fa-clock text-theme fa-2x"></i> -->
                            <button class="header-call-icon">
                                <img src="<?= $assets ?>restaurant/img/MeenatshiCallChatIcon.svg" alt="call_icon_webshop" />
                            </button>

                        </div>
                        <div class="media-body">
                            <span class="d-block mb-1">Call for Order</span>
                            <p class="mb-0 h5 text-font1 custom-underline">
                                <!-- <a href="tel:+97143403346">+971 4 340 3346</a> -->
                                <a href="tel:<?= preg_replace('/\s+/', '', $setting_map['phone_number']) ?>">
                                    <?= $setting_map['phone_number'] ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--==============================
    Mobile Menu
    ============================== -->
<div class="vs-menu-wrapper">
    <div class="vs-menu-area">
        <button class="vs-menu-toggle text-theme"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="<?= base_url('webshop') ?>"><img src="<?= !empty($setting_map['logo_image']) ? $uploads . $setting_map['logo_image'] : $uploads . 'webshop/Minatshi Logo.png' ?>" alt="Logo"></a>
        </div>
        <div class="vs-mobile-menu link-inherit"></div>
    </div>
</div>
<!--==============================
        Header Area
    ==============================-->
<header class="header-wrapper header-layout2 py-2 py-lg-0 px-xl-115" class="header_cart">
    <div class="container-fluid position-relative">
        <div class="row align-items-center">
            <div class="col-6 col-md-3 col-lg-2 col-xl-2">
                <div class="header-logo">
                <a href="<?= base_url('webshop') ?>"><img src="<?= !empty($setting_map['logo_image']) ? $uploads . $setting_map['logo_image'] : $uploads . 'webshop/Minatshi Logo.png' ?>" alt="Logo"></a>
                </div>
            </div>
            <div class="col-6 col-md-9 col-lg-5 col-xl-3 position-static">
                <nav class="main-menu menu-style1 link-inherit text-right text-xl-left mobile-menu-active">
                    <ul>
                        <li>
                            <a href="<?= base_url('webshop') ?>">Home</a>
                        </li>
                        <?php if (!empty($custom_pages_webshop->aboutus) && (int) $custom_pages_webshop->aboutus->is_active === 1): ?>
                            <li>
                                <a href="<?= base_url('webshop/about_us') ?>">About Us</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?= base_url('webshop/cart') ?>">Cart</a>
                        </li>
                        <li class="Logoutsection">
                            <a href="<?= base_url('webshop/logout') ?>">logout</a>
                        </li>
                        <?php if (!empty($custom_pages_webshop_webshop->contactus) && (int) $custom_pages_webshop->contactus->is_active == 1): ?>
                            <li>
                                <a href="<?= base_url('webshop/contactus') ?>"><?= $custom_pages_webshop->contactus->page_title ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($custom_pages_webshop_webshop->contactus) && (int) $custom_pages_webshop->contactus->is_active == 1): ?>
                            <li>
                                <a href="<?= base_url('webshop/login') ?>"><?= $custom_pages_webshop->contactus->page_title ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($custom_pages_webshop_webshop->contactus) && (int) $custom_pages_webshop->contactus->is_active == 1): ?>
                            <li>
                                <a href="<?= base_url('webshop/register') ?>"><?= $custom_pages_webshop->contactus->page_title ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <button type="button" class="vs-menu-toggle ml-auto d-block text-theme border-theme d-lg-none"><i
                        class="far fa-bars"></i></button>
            </div>
            <div class="col-lg-5 col-xl-7">
                <div class="header-right d-none d-lg-flex align-items-center justify-content-end">
                    <div class="contact-info media align-items-center d-none d-xl-flex">
                        <div class="media-icon mr-15 pl-30" data-overlay="theme" data-opacity="1">
                            <!-- <i class="fal fa-clock text-theme fa-2x"></i> -->
                            <button class="header-call-icon">
                                <img src="<?= $assets ?>restaurant/img/MeenatshiCallChatIcon.svg" alt="call_icon_webshop" />
                            </button>

                        </div>
                        <?php if (!empty($setting_map['phone_number'])): ?>
                            <div class="media-body">
                                <span class="d-block mb-1">Call for Order</span>
                                <p class="mb-0 h4 text-font1 custom-underline">
                                    <a href="tel:<?= preg_replace('/\s+/', '', $setting_map['phone_number']) ?>">
                                        <?= $setting_map['phone_number'] ?>
                                    </a>
                                </p>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="header-btn pl-lg-50">
                        <a href="#" class="icon-btn bg-light-theme mr-15 searchBoxTggler" title="Search">
                            <i class="fal fa-search"></i>
                        </a>
                        <!-- <?php echo ($this->session->webshop->is_login) ? base_url('webshop/your_account') : base_url('webshop/your_login') ?> -->
                        <a title="My Account" href="<?php echo ($this->session->webshop->is_login == "true") ? base_url('webshop/your_account') : base_url('webshop/register') ?>" class="icon-btn bg-light-theme mr-15">
                            <i class="fal fa-user"></i>
                        </a>
                         <a title="My Account" href="<?php echo ($this->session->webshop->is_login == "true") ? base_url('webshop/your_account') : base_url('webshop/register') ?>" class="">
                            <span class=""><?php echo ($this->session->webshop->is_login == "true") ? explode(" ",  $this->session->webshop->name)[0] : '' ?></span>
                        </a>

                        <!-- <?php var_dump($this->session->webshop->name); ?> -->

                        

                        <a href="#" class="icon-btn bg-light-theme sideMenuToggler cart-btn cartButtonHeader cart_button" title="Cart">
                            <span class="number bg-theme cart-count"><?= count($cart_items) ?></span>
                            <i class="fal fa-shopping-cart"></i>
                        </a>

                        <!-- Logout Icon -->
                         <?php  if ($this->session->webshop->is_login) { ?>
                            <a href="<?= base_url('webshop/logout') ?>" class="icon-btn bg-light-theme" title="Logout">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </a>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<style>
    [data-opacity="6"]:before {
        opacity: 0 !important;
    }

    .fal,
    .far {
        font-family: Font Awesome\ 5 Pro !important;
    }

    .pl-lg-50 {
        padding-left: 35px !important;
    }

    .custom-underline {
        text-decoration: underline;
        text-decoration-color: #fa8507;
        color: inherit;
    }

    a.icon-btn.bg-light-theme {
        margin-right: 5px;
    }

    .Logoutsection {
        display: none !important;
    }

    @media (max-width: 767px) {
        .Logoutsection {
            display: block !important;
        }
    }
</style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GJSMJEERR0"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-GJSMJEERR0');
</script>
<script type="text/javascript">
    (function(c, l, a, r, i, t, y) {
        c[a] = c[a] || function() {
            (c[a].q = c[a].q || []).push(arguments)
        };
        t = l.createElement(r);
        t.async = 1;
        t.src = "https://www.clarity.ms/tag/" + i;
        y = l.getElementsByTagName(r)[0];
        y.parentNode.insertBefore(t, y);
    })(window, document, "clarity", "script", "rpi2ffehsk");
</script>
<!-- Meta Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }
    (window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1008018358182481');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1008018358182481&ev=PageView&noscript=1" />
</noscript>
<!-- End Meta Pixel Code -->