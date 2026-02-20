<div class="widget widget_techmarket_products_carousel_widget">
    <section id="single-sidebar-carousel" class="section-products-carousel">
        <header class="section-header">
            <h2 class="section-title">Latest Products</h2>
            <nav class="custom-slick-nav"></nav>
        </header>
        <!-- .section-header -->
       
        
        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;rows&quot;:2,&quot;slidesPerRow&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#single-sidebar-carousel .custom-slick-nav&quot;}">
            <div class="container-fluid">
                <div class="woocommerce columns-1">
                    <div class="products">
                          <?php
                                echo latest_Products($uploads);
                            ?>
                    </div>
                    <!-- .products -->
                </div>
                <!-- .woocommerce -->
            </div>
            <!-- .container-fluid -->
        </div>
        <!-- .products-carousel -->
    </section>
    <!-- .section-products-carousel -->
</div>
<!-- .widget_techmarket_products_carousel_widget -->