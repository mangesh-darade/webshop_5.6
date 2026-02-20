<?php
$sectionKey = md5('section_category_exclusive_products');
$sectionData = $section_category_exclusive_products;

if(isset($sectionData['section_tabs'])) {
    $category_id = key($sectionData['section_tabs']);

    $exclusive_products = $sectionData['section_products'][$category_id];
}
?>
<section style="background-size: cover; background-position: center center; background-image: url( <?= $uploads ?>images/slider/bg/card-bg.jpg ); height: 853px;" class="section-landscape-full-product-cards-carousel">
    <div class="col-full">
        <header class="section-header">
            <h2 class="section-title">
                <strong><?=$sectionData['section_titles']?></strong>
                <?= $is_admin_login ? '<small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_category_exclusive_products").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
            </h2>
        </header>
        <!-- .section-header -->
        <div class="row">
            <div class="landscape-full-product-cards-carousel">
                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:2,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:767,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:1,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}}]}">
                    <div class="container-fluid">
                        <div class="woocommerce columns-2">
                            <div class="products">
                            <?php
                            if(is_array($exclusive_products)){
                                foreach ($exclusive_products as $product) {
                              
                                 $product_hash = md5($product['id'].$sectionKey); 
                                    
                                    $variant_options = '';
                                    if(isset($product['variants'])){
                                        $v=0;
                                        foreach ($product['variants'] as $variant) {
                                            $v++;
                                            $variant_options           .= '<option value="'.$variant->id.'" price="'.($variant->price + $product['price']).'" unit_quantity="'.$variant->unit_quantity.'" quantity="'.$variant->quantity.'" title="'.$variant->name. '" class="attached enabled text-capitalize">'.$variant->name. '</option>';              
                                            $variant_quantity[$v]       = $variant->quantity;
                                            $variant_name[$v]           = $variant->name;
                                            $variant_price[$v]          = $variant->price + $product['price'];
                                            $variant_unit_quantity[$v]  = $variant->unit_quantity;                        
                                            $variant_id[$v]             = $variant->id;     

                                            if($v==1){
                                                $product_name = $product['name'] .' (<span class="variant_name_'.$product_hash.'">'.$variant->name.'</span>)';
                                            }
                                        }
                                        $item_quantity = $variant_quantity[1];

                                    } else {
                                        $variant_name[1]        = '';
                                        $variant_price[1]       = 0;
                                        $variant_quantity[1]    = 0;
                                        $item_quantity          = $product['quantity'];
                                        $product_name           = $product['name'];
                                    }

                                    //Set Overselling Condition.
                                    $item_quantity = $webshop_settings->overselling ? 999 : $item_quantity;

                                    $product_price = product_sale_price($product, $variant_price);

                                    $promo_price = $product_price['promo_price'] ? $product_price['promo_price'] : FALSE;

                                    $sale_price = $promo_price ? $promo_price : $product_price['unit_price'];
                            ?>
                                <div class="landscape-product-card product">
                                    <div class="media">
                                        <div class="yith-wcwl-add-to-wishlist">
                                            <a href="#" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                        </div>
                                        <div style="width:160px; height:200px;">
                                            <a class="" href="<?=base_url("webshop/product_details/").md5($product['id'])?>">
                                                 <img class="" style="width:90% !important;" src="<?=$uploads.$product['image']?>" alt="<?=$product['code']?>" />  
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a class="woocommerce-LoopProduct-link " href="<?=base_url("webshop/product_details/").md5($product['id'])?>">
                                                <span class="price">
                                                    <ins>
                                                        <span class="amount">Rs. <span id="display_unit_price_<?=$product_hash?>"><?=number_format($sale_price,2)?></span></span>
                                                    </ins>
                                            <?php if($promo_price && (int)$promo_price < $product_price['unit_price']) { ?>
                                                    <del>
                                                        <span class="amount">Rs. <?=number_format($product_price['unit_price'],2)?></span>
                                                    </del>
                                            <?php } ?>
                                                </span>
                                                <!-- .price -->
                                                <h2 class="woocommerce-loop-product__title"><?=$product_name?></h2>
                                                <div class="ribbon green-label">
                                                    <span>A++</span>
                                                </div>
                                                <div class="techmarket-product-rating">
                                                    <div title="Rated <?=$Item['ratings_avarage']?> out of 5" class="star-rating">
                                                        <span style="width:<?=((float)$Item['ratings_avarage']*100/5)?>%">
                                                            <strong class="rating"><?=$Item['ratings_avarage']?></strong> out of 5</span>
                                                    </div>
                                                    <span class="review-count">(<?= !empty($Item['comments_count']) ? $Item['comments_count'] : '0'?>  customer review)</span>
                                                </div>
                                                <!-- .techmarket-product-rating -->
                                            </a>
                                            <div class="hover-area">
                                                <?php
                                            echo '<input type="hidden" value="1" name="quantity['.$product['id'].']" id="quantity_'.$product_hash.'">
                                                <input type="hidden" value="'.$product['tax_rate'].'" name="tax_rate['.$product['id'].']" id="tax_rate_'.$product_hash.'">
                                                <input type="hidden" value="'.$product['tax_method'].'" name="tax_method['.$product['id'].']" id="tax_method_'.$product_hash.'">
                                                <input type="hidden" value="'.$product['price'].'" name="price['.$product['id'].']" id="price_'.$product_hash.'">
                                                <input type="hidden" value="'.$product['id'].'" name="product_id['.$product['id'].']" id="product_id_'.$product_hash.'">
                                                <input type="hidden" value="'.$sale_price.'" name="unit_price['.$product['id'].']" id="unit_price_'.$product_hash.'">
                                                <input type="hidden" value="'.$promo_price.'" name="promotion_price['.$product['id'].']" id="promotion_price_'.$product_hash.'">
                                                <!--<input type="hidden" value="'.$product['variant_id'].'" name="product_variants['.$product['id'].']" id="product_variants_'.$product_hash.'">-->
                                                <input type="hidden" value="'.$product['variant_unit_quantity'].'" name="variant_unit_quantity['.$product['id'].']" id="variant_unit_quantity_'.$product_hash.'">
                                                <input type="hidden" value="'.$product['variant_price'].'" name="variant_unit_price['.$product['id'].']" id="variant_unit_price_'.$product_hash.'">
                                                <input type="hidden" value="'.$variant_price[1].'" name="variant_unit_price['.$product['id'].']" id="variant_unit_price_'.$product_hash.'">';
                                           
                                            if($item_quantity) {                   
                                            echo '<big class="text-danger btn_outofstock_'.$product_hash.'" style="display: none;" >Out Of Stock</big>
                                                    <button class="button add_to_cart_button form-control btn_addtocart_'.$product_hash.'" rel="nofollow" onclick="add_to_cart(\''.$product_hash.'\')" >Add to cart</button>';
                                            } else { 
                                            echo '<big class="text-danger btn_outofstock_'.$product_hash.'" >Out Of Stock</big>
                                                    <button class="button add_to_cart_button form-control btn_addtocart_'.$product_hash.'" rel="nofollow" style="display: none;" onclick="add_to_cart(\''.$product_hash.'\')" >Add to cart</button>';
                                            }
                                        ?>
                                                <a href="#" class="add-to-compare-link">Add to compare</a>
                                            </div>
                                            <!-- .hover-area -->
                                        </div>
                                        <!-- .media-body -->
                                    </div>
                                    <!-- .media -->
                                </div>
                            <?php
                                  
                                }//end foreach
                            }//end if
                            
                            ?>
                            </div>
                            <!-- .products -->
                        </div>
                        <!-- .woocommerce -->
                    </div>
                    <!-- .container-fluid -->
                </div>
                <!-- .slick-dots -->
            </div>
            <!-- .landscape-full-product-cards-carousel -->
            <!--<img src="<?= $uploads .'images/slider/img/electronics.png'?>" alt="" style="position: absolute; bottom:-26px; right: 0px;" />-->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</section>