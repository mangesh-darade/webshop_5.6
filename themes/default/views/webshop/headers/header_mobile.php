<!--Mobile Header-->
    <div class="col-full handheld-only">
        <div class="handheld-header">
            <div class="row">
                <div class="site-branding">
                   <?php if($webshop_settings->logo){ ?>
                    <a href="<?= base_url('index') ?>" class="custom-logo-link" rel="home">
                        <img src="<?= $uploads . "logos/".$webshop_settings->logo  ?>" alt="logo" class="img" />
                    </a>
                    <?php } ?>
                    <!-- /.custom-logo-link -->
                </div>
                <!-- /.site-branding -->
                <!-- ============================================================= End Header Logo ============================================================= -->
                <div class="handheld-header-links">
                    <ul class="columns-3">
                        <li class="my-account">
                            <a href="<?=base_url("webshop/login")?>" class="has-icon">
                                <i class="tm tm-login-register"></i>
                            </a>
                        </li>
                        <li class="wishlist">
                            <a href="<?= base_url('#wishlist') ?>" class="has-icon">
                                <i class="tm tm-favorites"></i>
                                <span class="count"><?=$wishlist_count?></span>
                            </a>
                        </li>
                       <!-- <li class="compare">
                            <a href="<?php // base_url('#compare') ?>" class="has-icon">
                                <i class="tm tm-compare"></i>
                                <span class="count">0</span>
                            </a>
                        </li> -->
                    </ul>
                    <!-- .columns-3 -->
                </div>
                <!-- .handheld-header-links -->
            </div>
            <!-- /.row -->
            <div class="techmarket-sticky-wrap">
                <div class="row">
                    <nav id="handheld-navigation" class="handheld-navigation" aria-label="Handheld Navigation">
                        <button class="btn navbar-toggler" type="button">
                            <i class="tm tm-departments-thin"></i>
                            <span>Menu</span>
                        </button>
                        <div class="handheld-navigation-menu">
                            <span class="tmhm-close">Close</span>
                            <ul id="menu-departments-menu-1" class="nav">
                                <li class="highlight menu-item animate-dropdown">
                                    <a title="Top Products" href="#">Top Products</a>
                                </li>
                                <?php
                                if (is_array($main_categories)) {
                                    foreach ($main_categories as $category) {
                                        
                                        if (is_array($categories[$category->id])) {
                                        ?>                                                
                                        <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                                            <a title="<?= $category->name ?>" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="#"> <?= $category->name ?> <span class="caret"></span></a>
                                            <ul role="menu" class=" dropdown-menu">
                                                <li class="menu-item menu-item-object-static_block animate-dropdown">
                                                    <div class="yamm-content">
                                                        <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                                            <div class="kc-col-container">
                                                                <div class="kc_single_image">
                                                                    <img src="<?= $images ?>megamenu.jpg" class="" alt="" />
                                                                </div>
                                                                <!-- .kc_single_image -->
                                                            </div>
                                                            <!-- .kc-col-container -->
                                                        </div>
                                                        <!-- .bg-yamm-content -->
                                                        <div class="row yamm-content-row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title"><?= $category->name ?></li>
                                                                            <?php                                                                            
                                                                                foreach ($categories[$category->id] as $subcategory) {
                                                                                    ?>
                                                                                    <li><a href="<?= base_url("webshop/category_products/".$category->id."/".$subcategory->id)?>"><?= $subcategory->name ?></a></li>
                                                                                <?php
                                                                                }                                                                            
                                                                            ?>
                                                                            <li class="nav-divider"></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="kc-col-container">
                                                                    <div class="kc_text_block">
                                                                        <ul>
                                                                            <li class="nav-title"><?= $category->name ?> Brands</li>
                                                                            <?php
                                                                            if (is_array($category_brands[$category->id])) {
                                                                                foreach ($category_brands[$category->id] as $brands) {
                                                                                    ?>
                                                                                    <li><a href="<?= base_url("webshop/products/?q=brand&catid=".$category->id."&key=".str_replace([' & ', '&',' ','-'], '_', $brands->brand_name)."&id=".md5($brands->brand_id))?>"><?= $brands->brand_name ?></a></li>                                                                                    
                                                                                <?php
                                                                                }
                                                                            }
                                                                            ?>                                                                                
                                                                        </ul>
                                                                    </div>
                                                                    <!-- .kc_text_block -->
                                                                </div>
                                                                <!-- .kc-col-container -->
                                                            </div>
                                                            <!-- .kc_column -->
                                                        </div>
                                                        <!-- .kc_row -->
                                                    </div>
                                                    <!-- .yamm-content -->
                                                </li>
                                            </ul>
                                        </li>
                                        <?php } else { ?>
                                        <li class="menu-item animate-dropdown">
                                            <a title="<?= $category->name ?>" href="<?= base_url("webshop/category_products/".$category->id)?>"><?= $category->name ?></a>
                                        </li>
                                        <?php }//end else ?>
                                <?php
                                    }//end foreach
                                }//end if
                                ?>
                            </ul>
                        </div>
                        <!-- .handheld-navigation-menu -->
                    </nav>
                    <!-- .handheld-navigation -->
                    <div class="site-search">
                        <div class="widget woocommerce widget_product_search">
                            <form role="search" method="get" action="<?= base_url('webshop/search_products') ?>" class="woocommerce-product-search" >
                                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                                <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products&hellip;" value="" name="search" />
                                <input type="submit" value="Search" />
                                <input type="hidden" name="search_by_category" value="0" />
                            </form>
                        </div>
                        <!-- .widget -->
                    </div>
                    <!-- .site-search -->
                    <a class="handheld-header-cart-link has-icon" href="<?= base_url('webshop/cart') ?>" title="View your shopping cart">
                        <i class="tm tm-shopping-bag"></i>
                        <span class="count" id="header_cart_count"><?=isset($cart_items)? count($cart_items) : 0;?></span>
                    </a>
                </div>
                <!-- /.row -->
            </div>
            <!-- .techmarket-sticky-wrap -->
        </div>
        <!-- .handheld-header -->
    </div>
    <!-- .handheld-only -->