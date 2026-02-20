<header id="masthead" class="site-header <?= $strip_color == 1 ? ' header-v7 ' : ' header-v4 header-v5 header-v7 '; ?> " style="background-image: none; margin-bottom: 0px;">
    <div class="col-full desktop-only">
        <div class="techmarket-sticky-wrap">
            <div class="row">
                <nav id="primary-navigation" class="primary-navigation" aria-label="Primary Navigation" data-nav="flex-menu">
                    <ul id="menu-primary-menu" class="nav yamm">
                        <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                            <a title="Women" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#">Women <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                <li class="menu-item animate-dropdown">
                                    <a title="Eyeglasses" href="product-category.html">Eyeglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Premium Eyeglasses" href="product-category.html">Premium Eyeglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Sunglasses" href="product-category.html">Sunglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Power Sunglasses" href="product-category.html">Power Sunglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Contact Lenses" href="product-category.html">Contact Lenses</a>
                                </li>
                            </ul>
                            <!-- .dropdown-menu -->
                        </li>
                        <li class="menu-item menu-item-has-children animate-dropdown dropdown">
                            <a title="Men" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#">Men <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                <li class="menu-item animate-dropdown">
                                    <a title="Eyeglasses" href="product-category.html">Eyeglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Premium Eyeglasses" href="product-category.html">Premium Eyeglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Sunglasses" href="product-category.html">Sunglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Power Sunglasses" href="product-category.html">Power Sunglasses</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a title="Contact Lenses" href="product-category.html">Contact Lenses</a>
                                </li>
                            </ul>
                            <!-- .dropdown-menu -->
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="Personalize" href="shop.html">Personalize</a>
                        </li>
                        <li class="menu-item animate-dropdown">
                            <a title="Store" href="shop.html">Store</a>
                        </li>
                        <li class="techmarket-flex-more-menu-item dropdown">
                            <a title="..." href="#" data-toggle="dropdown" class="dropdown-toggle">...</a>
                            <ul class="overflow-items dropdown-menu"></ul>
                            <!-- . -->
                        </li>
                    </ul>
                    <!-- .nav -->
                </nav>
                <!-- .primary-navigation -->
                <div class="site-branding">
                    <a href="<?= base_url('webshop/index')?>" class="custom-logo-link" rel="home">
                        <img src="<?= $uploads . "logos/logo.png" ?>" class="img" />
                    </a>
                    <!-- /.custom-logo-link -->
                </div>
                <!-- /.site-branding -->
                <!-- ============================================================= End Header Logo ============================================================= -->
                
                <!-- .header-compare -->
                <!-- .header-wishlist -->
                <!-- .site-header-cart -->
                <?php include_once 'header_cart_items.php'; ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.techmarket-sticky-wrap -->
    </div>
    <!-- .col-full --> <!-- mobile menu -->
    <?php include_once 'header_mobile.php'; ?> 
    <!-- .handheld-only -->
</header>
<!-- .header-v7 -->
<!-- ============================================================= Header End ============================================================= -->
