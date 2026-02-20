<section class="section-landscape-products-carousel recently-viewed" id="recently-viewed">
    <header class="section-header">
        <h2 class="section-title">Recently viewed products</h2>
        <nav class="custom-slick-nav"></nav>
    </header>
    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:2,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#recently-viewed .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
        <div class="container-fluid">
            <div class="woocommerce columns-5">
                <div class="products">
                    <?php
                    if (is_array($recent_viewed)) {
                        foreach ($recent_viewed as $key => $product) {
                            ?>
                            <div class="landscape-product product">
                                <a class="woocommerce-LoopProduct-link" href="<?= base_url("webshop/product_details/" . md5($product->id)) ?>">
                                    <div class="media">
                                        <img class="wp-post-image" src="<?= $thumbs . $product->image ?>" alt="<?= $product->name ?>">
                                        <div class="media-body">
                                            <span class="price">
                                                <?php
                                                $product_price = product_sale_price((array) $product);

                                                $promo_price = $product_price['promo_price'] ? $product_price['promo_price'] : FALSE;

                                                $sale_price = $promo_price ? $promo_price : $product_price['unit_price'];
                                                ?>
                                                <ins>
                                                    <span class="amount">Rs. <?= number_format($sale_price, 2) ?></span>
                                                </ins>
                                                <br/>
                                                <ins>
                                                    <span class="amount">MRP. <?= number_format($product->mrp, 2) ?></span>
                                                </ins>
                                                <?php
                                                if ($promo_price && (int) $promo_price < $product_price['unit_price']) {
                                                    ?>
                                                    <del class=" text-danger">
                                                        <span class="amount">Rs. <?= number_format($product_price['unit_price'], 2) ?></span>
                                                    </del>
                                                <?php } ?>
                                                <span class="amount"> </span>
                                            </span>
                                            <!-- .price -->
                                            <h2 class="woocommerce-loop-product__title">
                                                <?php
                                                if ($product->variant_name) {
                                                    echo $product->name . ' (' . $product->variant_name . ')';
                                                } else {
                                                    echo $product->name;
                                                }
                                                ?>
                                            </h2>
                                            <div class="techmarket-product-rating">
                                                <div title="Rated <?= (int) $product->ratings_avarage ?> out of 5" class="star-rating">
                                                    <span style="width:0%">
                                                        <strong class="rating"><?= (int) $product->ratings_avarage ?></strong> out of 5</span>
                                                </div>
                                                <span class="review-count">(<?= !empty($product->comments_count) ? (int) $product->comments_count : '0' ?>)</span>
                                            </div>
                                            <!-- .techmarket-product-rating -->
                                        </div>
                                        <!-- .media-body -->
                                    </div>
                                    <!-- .media -->
                                </a>
                                <!-- .woocommerce-LoopProduct-link -->
                            </div>
                            <?php
                        }//end foreach.   
                    }//end if
                    ?>
                </div>
            </div>
            <!-- .woocommerce -->
        </div>
        <!-- .container-fluid -->
    </div>
    <!-- .products-carousel -->
</section>
<!-- .section-landscape-products-carousel -->
