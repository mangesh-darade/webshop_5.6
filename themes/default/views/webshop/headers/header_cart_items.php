<?php
$subtotal = 0;
if (isset($cart_items) && is_array($cart_items) && count($cart_items)) {
    ?>
    <ul class="woocommerce-mini-cart cart_list product_list_widget ">
        <?php
        foreach ($cart_items as $itemKey => $item) {

            if (isset($cart_data['variant_images'])&& $cart_data['variant_images'][$itemKey]) {
                $item_image = $cart_data['variant_images'][$itemKey];
            } else {
                $item_image = $cart_data['products'][$item['product_id']]['image'];
            }

            $product_name = $cart_data['products'][$item['product_id']]['name'];

            $variant_name = ($item['variant_id']) ? ' ' . $cart_data['variants'][$item['variant_id']]['name'] : '';
            ?>
            <li class="woocommerce-mini-cart-item mini_cart_item">
                <a class="remove remove_cart_item" aria-label="Remove this item" data-cart_item_key="<?= $itemKey ?>" data-product_sku="" onclick="remove_cart_item('<?= $itemKey ?>', 'header_cart')">×</a>
                <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>">
                    <img src="<?= $thumbs . $item_image ?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?= $product_name . $variant_name ?>"><?= $product_name . $variant_name ?>
                </a>
                <span class="quantity"><?= $item['quantity'] ?> ×
                    <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">Rs.</span><?= number_format($item['product_price'], 2) ?></span>
                </span>
            </li>
            <?php
            $subtotal += ((float) $item['quantity'] * (float) $item['product_price']);
        }//end foreach.
        ?>                        
    </ul>
    <!-- .cart_list -->
    <p class="woocommerce-mini-cart__total total">
        <strong>Subtotal:</strong>
        <span class="woocommerce-Price-amount amount">
            <span class="woocommerce-Price-currencySymbol">Rs.</span> <?= number_format($subtotal, 2) ?></span>                            
    </p>
    <p class="woocommerce-mini-cart__buttons buttons">
        <a href="<?= base_url("webshop/cart") ?>" class="button wc-forward">View cart</a>
        <a href="<?= base_url("webshop/checkout") ?>" class="button checkout wc-forward">Checkout</a>
        <input type="hidden" id="header_cart_subtotal_amount" value="Rs.<?= number_format($subtotal, 2) ?>" />
        <input type="hidden" id="header_cart_item_count" value="<?= count($cart_items) ?>" />
    </p>
<?php
} else {
?>
    <p class="woocommerce-mini-cart__buttons buttons"> <i class="fa fa-shopping-cart"></i> Cart is empty !</p> 
<?php
}?>
                    