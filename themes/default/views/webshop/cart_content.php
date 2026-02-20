<div class="type-page hentry">
    <div class="entry-content">
        <div class="woocommerce">
            <div class="cart-wrapper">
            <?php if (is_array($cart_items) && count($cart_items)) { ?>    
                <form method="post" action="#" class="woocommerce-cart-form">
                    <table class="shop_table shop_table_responsive cart">
                        <thead>
                            <tr>                                                                 
                                <th>Photo</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $subtotal = 0;
                            
                                foreach ($cart_items as $itemKey => $item) {

                                    if (isset($cart_data['variant_images']) && $cart_data['variant_images'][$itemKey]) {
                                        $item_image = $cart_data['variant_images'][$itemKey];
                                    } else {
                                        $item_image = $cart_data['products'][$item['product_id']]['image'];
                                    }

                                    $product_name = $cart_data['products'][$item['product_id']]['name'];

                                    $variant_name = ($item['variant_id']) ? ' ' . $cart_data['variants'][$item['variant_id']]['name'] : '';
                                    ?>
                                    <tr>                                                                 
                                        <td> 
                                            <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>">
                                                <img style="height:60px;" alt="<?= $product_name . $variant_name ?>" class="wp-post-image" src="<?= $thumbs . $item_image ?>">
                                            </a>                                                                     
                                        </td>
                                        <td data-title="Product" class="product-name">
                                            <div class="media cart-item-product-detail"> 
                                                <div class="media-body align-self-center">
                                                    <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>"><?= $product_name . '<br/>' . $variant_name ?></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-title="Price" class="product-price">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">Rs. </span><?= number_format($item['product_price'], 2) ?>
                                            </span>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <label for="quantity-input-<?= $itemKey ?>">Quantity</label>
                                                <input id="quantity-input-<?= $itemKey ?>" data-item_key="<?= $itemKey ?>" data-item_price="<?= $item['product_price'] ?>" type="number" min="1" max="9999" step="1" name="cart[<?= $itemKey ?>][qty]" value="<?= $item['quantity'] ?>" title="Qty" class="input-text qty text cart_qty" size="4" >
                                            </div>
                                        </td>
                                        <td data-title="Total" class="product-subtotal">
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">Rs. </span> <span class="item_subtotal_<?= $itemKey ?>"><?= number_format((float) $item['quantity'] * (float) $item['product_price'], 2) ?></span>
                                            </span>
                                            <input type="hidden" name="item_subtotal[<?= $itemKey ?>]" id="item_subtotal_<?= $itemKey ?>" class="item_subtotal" value="<?=((float)$item['quantity'] * (float) $item['product_price'])?>" />
                                            <a title="Remove this item" class="remove" href="#" onclick="remove_cart_item('<?=$itemKey?>', 'cart_page')">×</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $subtotal += ((float) $item['quantity'] * (float) $item['product_price']);
                                }//end foreach.
                            
                            ?>         

                            <tr>
                                <td colspan="6" style="text-align:right;">
                                    <!--  <div class="coupon">
                                            <label for="coupon_code">Coupon:</label>
                                            <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                            <input type="submit" value="Apply coupon" name="apply_coupon" class="button">
                                        </div>-->
                                    <a href="<?= base_url('webshop/checkout')?>" class="button">Checkout</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- .shop_table shop_table_responsive -->
                </form>
                <!-- .woocommerce-cart-form -->
                <div class="cart-collaterals">
                    <div class="cart_totals">
                        <h2>Cart totals</h2>
                        <table class="shop_table shop_table_responsive">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">Rs. </span> <span class="cart_subtotal"><?= number_format($subtotal, 2) ?></span></span>
                                    </td>
                                </tr>
                                <tr class="cart_shipping">
                                    <th>Shipping</th>
                                    <td data-title="Shipping">Rs. 0.00</td>
                                </tr>
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total">
                                        <strong>
                                            <span class="woocommerce-Price-amount amount">
                                                <span class="woocommerce-Price-currencySymbol">Rs. </span> <span class="cart_total"><?= number_format($subtotal, 2) ?></span></span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- .shop_table shop_table_responsive -->
                        <div class="wc-proceed-to-checkout" style="text-align:center;">
                             <!--<form class="woocommerce-shipping-calculator" method="post" action="#">-->
                                <p>
                                    <a class="shipping-calculator-button" data-toggle="collapse" href="#shipping-form" aria-expanded="false" aria-controls="shipping-form">Calculate shipping</a>
                                </p>
                                <div class="collapse" id="shipping-form">
                                    <div class="shipping-calculator-form">                                                                        
                                        <p id="calc_shipping_state_field" class="form-row form-row-wide validate-required">
                                            <span>
                                                <select id="calc_shipping_state" name="calc_shipping_state">
                                                    <option value="">Select an option…</option>
                                                    <?php
                                                        if(is_array($state_list)){
                                                            foreach ($state_list as $state) {
                                                                echo '<option value="'.$state['name'].'~'.$state['code'].'">'.$state['name'].'</option>';
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </span>
                                        </p>
                                        <p id="calc_shipping_postcode_field" class="form-row form-row-wide validate-required">
                                            <input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / ZIP" value="" class="input-text">
                                        </p>
                                        <p>
                                            <button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button>
                                        </p>
                                    </div>
                                </div>
                            <!--</form>--> 
                            <!-- .wc-proceed-to-checkout -->
                            <a class="checkout-button button alt wc-forward" href="<?= base_url('webshop/checkout')?>">
                                Proceed to checkout</a>
                            <a class="back-to-shopping" href="<?= base_url('webshop/products')?>">Back to Shopping</a>
                        </div>
                        <!-- .wc-proceed-to-checkout -->
                    </div>
                    <!-- .cart_totals -->
                </div>
                <!-- .cart-collaterals -->
            <?php } else { ?>
                <h2>Shopping cart is empty. Please select products.</h2>
                
            <?php }?>
            </div>
            <!-- .cart-wrapper -->
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .entry-content -->
</div>
<!-- .hentry -->
