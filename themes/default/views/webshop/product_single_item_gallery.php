<!--    <span class="onsale">-
        <span class="woocommerce-Price-amount amount">
            <span class="woocommerce-Price-currencySymbol">$</span>242.99</span>
    </span>-->
    <!-- .onsale -->
    <div id="techmarket-single-product-gallery" class="techmarket-single-product-gallery techmarket-single-product-gallery--with-images techmarket-single-product-gallery--columns-4 images" data-columns="4">
        <div class="techmarket-single-product-gallery-images" data-ride="tm-slick-carousel" data-wrap=".woocommerce-product-gallery__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .techmarket-single-product-gallery-thumbnails__wrapper&quot;}">
            <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                <a href="#" class="woocommerce-product-gallery__trigger">🔍</a>
                <figure class="woocommerce-product-gallery__wrapper ">
                <?php
                if(is_array($gallary_images) && !empty($gallary_images)){
                    foreach ($gallary_images as $image) {                       
                ?>
                    <div data-thumb="<?= $images ?>products/sm-card-1.jpg" class="woocommerce-product-gallery__image">
                        <a href="#" tabindex="0" >
                            <img width="600" height="600" src="<?= $uploads.$image['photo'] ?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?=$product['name']?>">
                        </a>
                    </div>
                <?php
                    }                     
                } else {
                ?>
                    <div data-thumb="<?= $images ?>products/sm-card-1.jpg" class="woocommerce-product-gallery__image">
                        <a href="#" tabindex="0">
                            <img width="600" height="600" src="<?= $uploads.$product['image'] ?>" class="attachment-shop_single size-shop_single wp-post-image" alt="<?=$product['name']?>">
                        </a>
                    </div>
                <?php
                }                
                ?> 
                </figure>
            </div>
            <!-- .woocommerce-product-gallery -->
        </div>
        <!-- .techmarket-single-product-gallery-images -->
        <div class="techmarket-single-product-gallery-thumbnails" data-ride="tm-slick-carousel" data-wrap=".techmarket-single-product-gallery-thumbnails__wrapper" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;vertical&quot;:true,&quot;verticalSwiping&quot;:true,&quot;focusOnSelect&quot;:true,&quot;touchMove&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-up\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-down\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;asNavFor&quot;:&quot;#techmarket-single-product-gallery .woocommerce-product-gallery__wrapper&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:765,&quot;settings&quot;:{&quot;vertical&quot;:false,&quot;horizontal&quot;:true,&quot;verticalSwiping&quot;:false,&quot;slidesToShow&quot;:4}}]}">
            <figure class="techmarket-single-product-gallery-thumbnails__wrapper">
                <?php
                if(is_array($gallary_images) && !empty($gallary_images)){
                    foreach ($gallary_images as $image) { 
                ?>
                    <figure data-thumb="<?= $images ?>products/sm-card-1.jpg" class="techmarket-wc-product-gallery__image">
                        <img width="180" height="180" src="<?= $thumbs.$image['photo'] ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?=$product['name']?>">
                    </figure>
                <?php
                    }                     
                } else {
                ?>
<!--                    <figure data-thumb="<?= $images ?>products/sm-card-1.jpg" class="techmarket-wc-product-gallery__image">
                        <img width="180" height="180" src="<?= $thumbs.$product['image'] ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?=$product['name']?>">
                    </figure>-->
                <?php
                }                
                ?>                
            </figure>
            <!-- .techmarket-single-product-gallery-thumbnails__wrapper -->
        </div>
        <!-- .techmarket-single-product-gallery-thumbnails -->
    </div>
    <!-- .techmarket-single-product-gallery -->
