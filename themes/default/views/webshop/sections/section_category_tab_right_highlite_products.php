<?php
$sectionKey = md5('section_category_tab_right_highlite_products');
$sectionData = $section_category_tab_right_highlite_products;

?>
<section class="full-width section-products-carousel-tabs section-product-carousel-with-featured-product carousel-with-featured-1">
    <header class="section-header">
        <h2 class="section-title">
            <?=$sectionData['section_titles']?>
            <?= $is_admin_login ? ' <small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_category_tab_right_highlite_products").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
        </h2>
        <ul role="tablist" class="nav justify-content-center">
            <?php 
                if(is_array($sectionData['section_tabs'])){
                    $i=0;
                    foreach ($sectionData['section_tabs'] as $category_id => $tabs) {
                        $i++;
                        $tabHash = md5($category_id . $sectionKey);
                        $classActive = $i==1 ? ' active ' : '';
                        echo '<li class="nav-item"><a class="nav-link '.$classActive.'" href="#tab-'.$tabHash.'" data-toggle="tab">'.$tabs.'</a></li>';
                    }//end foreach
                }//end if
            ?> 
        </ul>
    </header>
    <div class="tab-content">
    <?php 
        if(is_array($sectionData['section_tabs'])){
            $i=0;
            foreach ($sectionData['section_tabs'] as $category_id => $tabs) {
                $i++;
                $tabHash = md5($category_id . $sectionKey);
                $classActive = $i==1 ? ' active ' : '';
    ?>    
        <div role="tabpanel" id="tab-<?=$tabHash?>" class="tab-pane <?=$classActive?>">
            <div class="tab-product-carousel-with-featured-product">
                <div class="tab-carousel-products">
                    <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;rows&quot;:2,&quot;slidesPerRow&quot;:6,&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesPerRow&quot;:2,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesPerRow&quot;:3,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:1599,&quot;settings&quot;:{&quot;slidesPerRow&quot;:4,&quot;slidesToScroll&quot;:1}}]}">
                        <div class="container-fluid">
                            <div class="woocommerce columns-6">
                                <div class="products">
                                <?php
                            
                                    echo create_products_structure($sectionData['section_products'][$category_id], $uploads, $sectionKey);
                                                     
                                ?>
                                </div>
                            </div>
                            <!-- .woocommerce-->
                        </div>
                        <!-- .container-fluid -->
                    </div>
                    <!-- .products-carousel -->
                </div>
                <!-- .tab-carousel-products -->
                <div class="tab-featured-product">
                    <div class="woocommerce columns-1">
                        <div class="products">
                        <?php
                        $highliteProducts = $sectionData['section_products_highlite'][$category_id];
                      
                        $Item = $highliteProducts[0];
                        
                        $product_hash = md5($Item['id']);
                        
                        if(isset($Item['variants'])){
                            $v=0;
                            foreach ($Item['variants'] as $variant) {
                                $v++;
                                $variant_options           .= '<option value="'.$variant->id.'" price="'.($variant->price + $Item['price']).'" unit_quantity="'.$variant->unit_quantity.'" quantity="'.$variant->quantity.'" title="'.$variant->name. '" class="attached enabled text-capitalize">'.$variant->name. '</option>';              
                                $variant_quantity[$v]       = $variant->quantity;
                                $variant_name[$v]           = $variant->name;
                                $variant_price[$v]          = $variant->price + $Item['price'];
                                $variant_unit_quantity[$v]  = $variant->unit_quantity;                        
                                $variant_id[$v]             = $variant->id;
                                if($v==1){
                                    $product_name = $Item['name'] .' (<span class="variant_name_'.$product_hash.'">'.$variant->name.'</span>)';
                                }
                            }
                            $item_quantity = $variant_quantity[1];
                        } else {
                            $variant_name[1] = '';
                            $variant_price[1] = 0;
                            $variant_quantity[1] = 0;
                            $item_quantity = $Item['quantity'];
                            $product_name = $Item['name'];
                        } 

                        //Set Overselling Condition.
                        $item_quantity = $this->webshop_settings->overselling ? 999 : $item_quantity;

                        
                        ?>
                        <div class="tab-product-featured product">
                           <a class="woocommerce-LoopProduct-link" href="<?=base_url("webshop/product_details/$product_hash")?>">
                               <img width="600" height="600" alt="<?=$Item['image']?>" class="attachment-shop_single size-shop_single wp-post-image" src="<?= $uploads . $Item['image'] ?>">
                               <span class="price">
                                <?php
                                    $product_price  = product_sale_price($Item, $variant_price);

                                    $promo_price    = $product_price['promo_price'] ? $product_price['promo_price'] : FALSE;

                                    $sale_price     = $promo_price ? $promo_price : $product_price['unit_price'];
                               
                                ?>
                                   <ins>
                                       <span class="woocommerce-Price-amount amount">
                                           <span class="woocommerce-Price-currencySymbol">Rs. </span><span id="display_unit_price_<?=$product_hash?>"><?= number_format($sale_price,2)?></span></span>
                                   </ins>
                                <?php  if($promo_price && (int)$promo_price < $product_price['unit_price']) { ?>
                                   <del>
                                       <span class="woocommerce-Price-amount amount">
                                           <span class="woocommerce-Price-currencySymbol">Rs. </span> <?= number_format($product_price['unit_price'],2)?></span>
                                   </del>
                                <?php
                                    }
                                ?>
                               </span>
                               <h2 class="woocommerce-loop-product__title"><?=$product_name?></h2>
                           </a>
                           <div class="techmarket-product-rating">
                               <div title="Rated <?=$Item['ratings_avarage']?> out of 5" class="star-rating">
                                   <span style="width:<?=((float)$Item['ratings_avarage']*100/5)?>%">
                                       <strong class="rating  ratings_avarage_<?=$product_hash?>"><?=$Item['ratings_avarage']?></strong> out of 5</span>
                               </div>
                               <span class="review-count">(<?= !empty($Item['comments_count']) ? $Item['comments_count'] : '0'?>  customer review)</span>
                           </div>
                            <input type="hidden" value="1" name="quantity[<?=$Item['id']?>]" id="quantity_<?=$product_hash?>">
                            <input type="hidden" value="<?=$Item['tax_rate']?>" name="tax_rate[<?=$Item['id']?>]" id="tax_rate_<?=$product_hash?>">
                            <input type="hidden" value="<?=$Item['tax_method']?>" name="tax_method[<?=$Item['id']?>]" id="tax_method_<?=$product_hash?>">
                            <input type="hidden" value="<?=$Item['price']?>" name="price[<?=$Item['id']?>]" id="price_<?=$product_hash?>">
                            <input type="hidden" value="<?=$Item['id']?>" name="product_id[<?=$Item['id']?>]" id="product_id_<?=$product_hash?>">
                            <input type="hidden" value="<?=$sale_price?>" name="unit_price[<?=$Item['id']?>]" id="unit_price_<?=$product_hash?>">
                            <input type="hidden" value="<?=$promo_price?>" name="promotion_price[<?=$Item['id']?>]" id="promotion_price_<?=$product_hash?>">
                            <!--<input type="hidden" value="<?=$variant_id[1]?>" name="product_variants[<?=$Item['id']?>]" id="product_variants_<?=$product_hash?>">-->
                            <input type="hidden" value="<?=$variant_unit_quantity[1]?>" name="variant_unit_quantity[<?=$Item['id']?>]" id="variant_unit_quantity_<?=$product_hash?>">
                            <input type="hidden" value="<?=$variant_price[1]?>" name="variant_unit_price[<?=$Item['id']?>]" id="variant_unit_price_<?=$product_hash?>">                  
                                            
                           <?php
                            if($item_quantity) {
                            ?>
                                <big class="text-danger btn_outofstock_<?=$product_hash?>" style="display: none;" >Out Of Stock</big>
                                <a class="button add_to_cart_button btn_addtocart_<?=$product_hash?>" onclick="add_to_cart('<?=$product_hash?>')" >Add to cart</a>
                            <?php } else { ?>
                                <big class="text-danger btn_outofstock_<?=$product_hash?>" >Out Of Stock</big>
                                <a class="button add_to_cart_button btn_addtocart_<?=$product_hash?>" style="display: none;" onclick="add_to_cart('<?=$product_hash?>')" >Add to cart</a>
                            <?php } ?>
                       </div> 
                        </div>
                    </div>
                </div>
                <!-- .tab-featured-product -->
            </div>
            <!-- .tab-product-carousel-with-featured-product -->
        </div>
    <?php 
                }//end foreach section_tabs
           }//end if section_tabs
        ?>      
    </div>
    <!-- .tab-content -->
</section>
<!-- .section-products-carousel-tabs-->