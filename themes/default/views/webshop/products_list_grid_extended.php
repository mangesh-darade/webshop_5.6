<div id="grid-extended" class="tab-pane active" role="tabpanel">
    <div class="woocommerce columns-4">
        <div class="products">
         <?php
        $maxPrice = 0;
        $sectionKey = "grid_extended";
        
        if(is_array($listItems)){
            $i=0;
            foreach ($listItems as $Item) {
                $i++;
                $product = $Item;                
                $product_hash               = md5($Item['id'] . $sectionKey);
                 
                $variant_price[1]           = 0;
                $variant_unit_quantity[1]   = 1;                        
                $variant_id[1]              = '';
                
                if($Item['brand']) {
                    $categoryBrands[] = $Item['brand'];
                }
                
                $variant_options = '';
                 
                if(isset($product['variants'])){
                    $v=0;
                    foreach ($product['variants'] as $variant) {
                        $v++;
                        $variant_options           .= '<option value="'.$variant['id'].'" price="'.($variant['price']).'" unit_quantity="'.$variant['unit_quantity'].'" quantity="'.$variant['quantity'].'" title="'.$variant['name']. '" class="attached enabled text-capitalize">'.$variant['name']. '</option>';              
                        $variant_quantity[$v]       = $variant['quantity'];
                        $variant_name[$v]           = $variant['name'];
                        $variant_price[$v]          = $variant['price'];
                        $variant_unit_quantity[$v]  = $variant['unit_quantity'];                        
                        $variant_id[$v]             = $variant['id'];     

                        if($v==1){
                            $product_variants = $variant;
                            $product_name = $product['name'] .' (<span class="variant_name_'.$product_hash.'">'.$variant['name'].'</span>)';
                        }
                    }
                    $item_quantity = $variant_quantity[1];

                } else {
                    $variant_name[1]        = '';
                    $variant_price[1]       = 0;
                    $variant_quantity[1]    = 0;
                    $item_quantity          = $product['quantity'];
                    $product_name           = $product['name'];
                    $product_variants       = false;
                }

                //Set Overselling Condition.
                $item_quantity = $this->webshop_settings->overselling ? 999 : $item_quantity;
        ?>     
            
            <div class="product <?php if($i%4 == 1){ echo 'first'; } ?>">
                <div class="yith-wcwl-add-to-wishlist">
                    <a style="cursor:pointer; font-size:20px; float:right; margin-right:10px;" class="addtowishlist" product_hash="<?=$product_hash?>"><i class="tm tm-favorites"></i></a>
                </div>
                <!-- .yith-wcwl-add-to-wishlist -->
                <a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?=base_url("webshop/product_details/$product_hash")?>">
                    <img style="height: 197px;" alt="<?=$Item['name']?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" src="<?= $uploads.$Item['image'] ?>">
                    <?php
                        $product_price  = product_sale_price($Item, $variant_price);

                        $promo_price    = $product_price['promo_price'] ? $product_price['promo_price'] : FALSE;

                        $sale_price     = $promo_price ? $promo_price : $product_price['unit_price'];
                        
                        $product['promo_price'] = $promo_price;
                        $product['unit_price']  = $sale_price;
                     ?>
                    <span class="price">
                        <?php
                            if($promo_price && (int)$promo_price < $product_price['unit_price']) {
                        ?>
                            <del class="amount text-danger" style="margin-right:10px;">Rs. <?= number_format($product_price['unit_price'],2)?></del>
                        <?php
                            }
                        ?>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">Rs.</span><span id="display_unit_price_<?=$product_hash?>"><?= number_format($sale_price,2)?></span></span>
                    </span>
                    <h2 class="woocommerce-loop-product__title"><?=$product_name?></h2>
                    <span class="sku_wrapper">Product Code:
                        <span class="sku"><?=$Item['code']?></span>
                    </span>
                </a>
                <?php
                        if($variant_options){
                    ?>
                        <div class="value">
                            <select class="form-control" name="product_variants[<?=$Item['id']?>]" id="product_variants_<?=$product_hash?>" onchange="update_price_by_variants('<?=$product_hash?>')">
                            <?php echo $variant_options  ?>
                            </select>
                            <a href="#" class="reset_variations" style="visibility: hidden;">Clear</a>
                        </div>
                    <?php
                        } else {
                            //echo '<div class="value"> &nbsp;</div>';
                        }
                    ?>
                <!-- .woocommerce-LoopProduct-link -->
                <div class="techmarket-product-rating">
                    <div title="Rated <?=$Item['ratings_avarage']?> out of 5" class="star-rating">
                        <span style="width:<?=((float)$Item['ratings_avarage']*100/5)?>%">
                            <strong class="rating  ratings_avarage_<?=$product_hash?>"><?=$Item['ratings_avarage']?></strong> out of 5</span>
                    </div>
                    <div class="review-count">(<?= !empty($Item['comments_count']) ? $Item['comments_count'] : '0'?>  customer review)</div>
                </div>
                <!-- .techmarket-product-rating -->
                
                <?php if($Item['product_details']) { ?>
                <div class="woocommerce-product-details__short-description">
                    <?=$Item['product_details']?>
                </div>
                <?php } ?>
                <!-- .woocommerce-product-details__short-description -->
                
                <?php
                //Webshop hepler function to set products hidden fields
                 echo product_hidden_fields($product, $product_hash, $product_variants);
                
                ?>
                
                <?php
                    if($item_quantity) {
                ?>
                    <big class="text-danger btn_outofstock_<?=$product_hash?>" style="display: none;" >Out Of Stock</big>
                    <a class="button product_type_simple add_to_cart_button btn_addtocart_<?=$product_hash?>" onclick="add_to_cart('<?=$product_hash?>')" >Add to cart</a>
                <?php } else { ?>
                    <big class="text-danger btn_outofstock_<?=$product_hash?>" >Out Of Stock</big>
                    <a class="button product_type_simple add_to_cart_button btn_addtocart_<?=$product_hash?>" style="display: none;" onclick="add_to_cart('<?=$product_hash?>')" >Add to cart</a>
                <?php } ?>
                    <p><a class="add-to-compare-link" href="#">Add to compare</a></p>
            </div>
            <!-- .product -->  
        <?php 
        
                $maxPrice = $sale_price > $maxPrice ? $sale_price : $maxPrice;
                        
            }//end foreach.
        }//End If.
        ?>     
        </div>
        <!-- .products -->
    </div>
    <!-- .woocommerce -->
</div>
<!-- .tab-pane -->