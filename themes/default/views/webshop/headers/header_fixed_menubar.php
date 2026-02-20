<header id="masthead" class="site-header header-v1" style="background-image: none;  border-bottom: thin solid #dfdfdf;">
    <div class="col-full desktop-only">
        <div class="techmarket-sticky-wrap">
            <div class="row">
                <div class="site-branding">
                    <a href="<?= base_url('webshop/index')?>" class="custom-logo-link" rel="home">
                        <img src="<?= $uploads . "logos/logo.png" ?>" class="img" />
                    </a>
                    <!-- /.custom-logo-link -->
                </div>
                <!-- /.site-branding -->
                <!-- ============================================================= End Header Logo ============================================================= -->
                <?php include_once('header_menus.php'); ?>
            </div>
            <!-- /.row -->
        </div>
        <!-- .techmarket-sticky-wrap -->
        <div class="row align-items-center">
            
            <?php include_once('header_department_menu.php'); ?>
            
            <?php include_once('header_searchbar_cart_menu.php'); ?>
            
        </div>
        <!-- /.row -->
    </div>
    <!-- .col-full -->
    
    <?php include_once('header_mobile.php'); ?>
    
</header>
<!-- .header-v1 -->
<!-- ============================================================= Header End ============================================================= -->
