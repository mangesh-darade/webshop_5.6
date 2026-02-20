<div id="grid" class="tab-pane active" role="tabpanel">
    <div class="woocommerce columns-4">
        <div class="products">
        <?php
        
            $sectionKey = md5('products_grid');
            
            echo create_products_structure( $listItems, $uploads , $sectionKey, true );
                                                     
        ?>
        </div>
        <!-- .products -->
    </div>
    <!-- .woocommerce -->
</div>
 