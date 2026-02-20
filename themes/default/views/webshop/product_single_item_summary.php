<?php
      
        $variant_options = '';
        $variant_price = [];
        $variant_unit_quantity = [];
            
        if(is_array($product_variants) && !empty($product_variants)){
            $v=0;
           
            foreach ($product_variants as $variant) {
                $v++;                 
                $selected = $product['variant_id'] == $variant['id'] ? ' selected="selected" ' : '';
                $variant_options           .= '<option '.$selected.' value="'.$variant['id'].'" price="'.($variant['price']+$product['price']).'" unit_quantity="'.$variant['unit_quantity'].'" quantity="'.$variant['quantity'].'" title="'.$variant['name']. '" class="attached enabled text-capitalize"> '.$variant['name'].'</option>';
                $variant_quantity[$v]       = $variant['quantity'];
                $variant_name[$v]           = $variant['name'];
                $variant_price[$v]          = $variant['price'];                        
                $variant_unit_quantity[$v]  = $variant['unit_quantity']; 
                $variant_id[$v]             = $variant['id'];
                
                if($v==1){
                    $product_variant = $variant;
                }
            }
            $item_quantity = $variant_quantity[1];
        } else {
            $variant_name[1]        = '';
            $variant_price[1]       = 0;
            $variant_quantity[1]    = 0;
            $item_quantity          = $product['quantity'];
        } 
        
        //Set Overselling Condition.
        $item_quantity = $this->webshop_settings->overselling ? 999 : $item_quantity;
        
        $product_price  = product_sale_price($product, $variant_price);
        
        $promo_price    = $product_price['promo_price'] ? $product_price['promo_price'] : FALSE;

        $sale_price     = $promo_price ? $promo_price : $product_price['unit_price'];
        
        $product['promo_price'] = $promo_price;
        $product['unit_price']  = $sale_price;
    ?>
<div class="summary entry-summary">
    <div class="single-product-header">
        <h1 class="product_title entry-title"><?=$product['name']?> <?=$variant_name[1]? ' (<span class="variant_name">'.$variant_name[1].'</span>)':''?></h1>
        <a href="#" class="add-to-wishlist add_to_wishlist" product_hash=""> Add to Wishlist</a>
    </div>
    <!-- .single-product-header -->
    <div class="single-product-meta">
        <?php if($product['brand']) { ?>
        <div class="brand">
            <a href="#">
                <img alt="<?=$product['brand']?>" src="<?= $images ?>brands/5.png">
            </a>
        </div>
        <?php } ?>
        <div class="cat-and-sku">
            <span class="posted_in categories">
               Category: <a rel="tag" href="#"><?=$categories[$product['category_id']][$product['subcategory_id']]->name?></a>
            </span>
            <span class="sku_wrapper">Product Code:
                <span class="sku"><?=$product['code']?></span>
            </span>

          <span class="sku_wrapper">Brand Code:
                <span class="sku"><?= $product['brand_name'] ?></span>
            </span>
            <strong class="posted_in categories">
               MRP: <?= number_format($product['mrp'],2) ?>
            </strong>
        </div>
        <div class="product-label">
            <div class="ribbon label green-label">
                <span>A+</span>
            </div>
        </div>
    </div>
     
    <!-- .single-product-meta -->
    <div class="rating-and-sharing-wrapper">
        <div class="woocommerce-product-rating">
            <div class="star-rating">
                <span style="width:<?=((float)$product['ratings_avarage']*100/5)?>%">Rated
                    <strong class="rating"><?=$product['ratings_avarage']?></strong> out of 5 based on
                    <span class="rating"><?=$product['ratings_count']?></span> customer rating</span>
            </div>
            <a rel="nofollow" class="woocommerce-review-link" href="#reviews">(<span class="count"><?= !empty($product['comments_count']) ? $product['comments_count'] : '0'?></span> customer review)</a>
        </div>
    </div>
    <!-- .rating-and-sharing-wrapper -->
    <div class="woocommerce-product-details__short-description">
       <?=$product['product_details']?>
    </div>
    <!-- .woocommerce-product-details__short-description -->   
    
    <?php if ($webshop_settings->product_description != "product_description_extended") { ?>
        <div class="product-actions-wrapper">
            <div class="product-actions">
                <p class="price">                
                    <ins>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">Rs. </span><span id="display_unit_price"><?=number_format($sale_price,2)?></span></span>
                    </ins>
                    <?php if($product_price['unit_price'] < $product_price['real_unit_price']) { ?>
                    <del class="text-danger">
                        <span class="woocommerce-Price-amount amount ">
                            <span class="woocommerce-Price-currencySymbol">Rs. </span><?= number_format($product_price['real_unit_price'],2)?></span>
                    </del>
                    <?php } ?>
                </p>
                <!-- .single-product-header -->
                <form enctype="multipart/form-data" method="post" class="cart">                                                        
                    <table class="variations">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="quantity">
                                        <label for="quantity-input">Quantity</label>
                                        <input type="number" min="1" max="<?=($item_quantity?$item_quantity:1)?>" step="1" class="input-text text col-12" title="Qty" value="1" name="quantity" id="quantity">
                                    </div>
                                </td>
                                <td>
                                    <?php if($variant_options){ ?>
                                    <div class="label"><label for="product_variants">Options</label></div>
                                    <div class="value">
                                        <select data-show_option_none="yes" data-attribute_name="attribute_pa_screen-size" name="product_variants" class="" id="product_variants" onchange="update_price_by_variants()">
                                        <?= $variant_options ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <?php
                                    echo product_hidden_fields($product, $product_hash, $product_variant);                                                           
                                    
                                    if($item_quantity) {                                        
                                    ?>
                                        <big class="text-danger btn_outofstock" style="display: none;" >Out Of Stock</big>
                                        <button class="single_add_to_cart_button button alt btn_addtocart" name="button_add_to_cart" id="button_add_to_cart" type="button" onclick="add_to_cart();">Add to cart</button>
                                    <?php } else { ?>
                                        <big class="text-danger btn_outofstock" >Out Of Stock</big>
                                        <button class="single_add_to_cart_button button alt btn_addtocart" style="display: none;" name="button_add_to_cart" id="button_add_to_cart" type="button" onclick="add_to_cart();">Add to cart</button>
                                    <?php } ?>
                                    
<!--                                <input type="hidden" value="<?=$product['tax_rate']?>" name="tax_rate" id="tax_rate">
                                    <input type="hidden" value="<?=$product['tax_method']?>" name="tax_method" id="tax_method">
                                    <input type="hidden" value="<?=$product_price['real_unit_price']?>" name="price" id="price">
                                    <input type="hidden" value="<?=$product['id']?>" name="product_id" id="product_id">
                                    <input type="hidden" value="<?=$sale_price?>" name="unit_price" id="unit_price">
                                    <input type="hidden" value="<?=$product_price['promo_price']?>" name="promotion_price" id="promotion_price">
                                    <input type="hidden" value="<?=$variant_unit_quantity[1]?>" name="variant_unit_quantity" id="variant_unit_quantity">
                                    <input type="hidden" value="<?=$variant_price[1]?>" name="variant_unit_price" id="variant_unit_price">-->
                                </td>
                            </tr>
                        </tbody>
                    </table>                    
                </form>
                <!-- .cart -->                
            </div>
            <!-- .product-actions -->
        </div>
        <!-- .product-actions-wrapper -->
    <?php } ?>
</div>
<!-- .entry-summary -->

<?php
if ($webshop_settings->product_description == "product_description_extended") {
    ?>
    <div class="product-actions-wrapper">
        <div class="product-actions">
            <div class="availability">
                Availability:                
                <?php
                if($product['quantity']){
                    echo '<p class="stock in-stock">'. number_format($product['quantity'],2) . " in stock </p>";
                } else {
                    if($webshop_pos_settings->eshop_overselling){
                       echo '<p class="stock in-stock"> stock </p>';
 
                    }else{
                       echo '<p class="stock out-of-stock">Out of stock</p>';
                    }
                }
                ?>               
            </div>
            <!-- .availability -->
            <div class="additional-info">
                <i class="tm tm-free-delivery"></i>Item with
                <strong>Free Delivery</strong>
            </div>
            <!-- .additional-info -->
            
            <p class="price">
                <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">Rs. </span><span id="display_unit_price"><?= number_format($sale_price,2)?></span></span>
                    <?php
                        if($product_price['unit_price'] < $product_price['real_unit_price']) {
                    ?>
                        <del class=" text-danger">
                            <span class="amount">Rs. <?= number_format($product_price['real_unit_price'],2)?></span>
                        </del>
                    <?php } ?>
            </p>
            <!-- .price -->
            <form class="variations_form cart">
                <table class="variations">
                    <tbody>
                    <?php  if($variant_options){ ?>
                        <tr>
                            <td class="label">
                                <label for="product_variants">Product Options</label>
                            </td>
                            <td class="value">
                                <select data-show_option_none="yes" data-attribute_name="attribute_pa_screen-size" name="product_variants" class="" id="product_variants" onchange="update_price_by_variants();">
                                <?= $variant_options ?>
                                </select>
                            </td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td colspan="2">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" type="number" name="quantity" value="1" min="1" max="<?=($item_quantity?$item_quantity:1)?>" step="1" title="Qty" size="4" class="input-text qty text" style="width:100%;" >
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="single_variation_wrap">
                    <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled">
                       <?php
                          
                            echo product_hidden_fields($product, '', $product_variant);
                        ?>
                        
                        <?php
                                                      
                        if($item_quantity) {
                        ?>
                            <big class="text-danger btn_outofstock wc-variation-selection-needed" style="display: none;" >Out Of Stock</big>
                            <button class="single_add_to_cart_button button alt wc-variation-selection-needed btn_addtocart" name="button_add_to_cart" id="button_add_to_cart" type="button" onclick="add_to_cart();">Add to cart</button>
                        <?php } else { 
                             if($webshop_pos_settings->eshop_overselling){ ?>
                              <button class="single_add_to_cart_button button alt wc-variation-selection-needed btn_addtocart" name="button_add_to_cart" id="button_add_to_cart" type="button" onclick="add_to_cart();">Add to cart</button>

                        <?php }else{ ?>
         
                            <big class="text-danger btn_outofstock wc-variation-selection-needed" >Out Of Stock</big>
                            <button class="single_add_to_cart_button button alt wc-variation-selection-needed btn_addtocart" style="display: none;" name="button_add_to_cart" id="button_add_to_cart" type="button" onclick="add_to_cart();">Add to cart</button>

 
                        <?php } 
                      } ?>
<!--                        <input type="hidden" value="<?=$product['tax_rate']?>" name="tax_rate" id="tax_rate">
                        <input type="hidden" value="<?=$product['tax_method']?>" name="tax_method" id="tax_method">
                        <input type="hidden" value="<?=$product_price['real_unit_price']?>" name="price" id="price">
                        <input type="hidden" value="<?=$product['id']?>" name="product_id" id="product_id">
                        <input type="hidden" value="<?=$sale_price?>" name="unit_price" id="unit_price">
                        <input type="hidden" value="<?=$product_price['promo_price']?>" name="promotion_price" id="promotion_price">
                        <input type="hidden" value="<?=$variant_unit_quantity[1]?>" name="variant_unit_quantity" id="variant_unit_quantity">
                        <input type="hidden" value="<?=$variant_price[1]?>" name="variant_unit_price" id="variant_unit_price">
                                -->
                    </div>
                </div>
                <!-- .single_variation_wrap -->
            </form>
            <!-- .variations_form -->
            <!--<a class="add-to-compare-link" href="compare.html">Add to compare</a>-->
        </div>
        <!-- .product-actions -->
    </div>
    <!-- .product-actions-wrapper -->
<?php } ?>