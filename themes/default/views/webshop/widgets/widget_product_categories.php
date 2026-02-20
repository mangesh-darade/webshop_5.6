<div id="techmarket_product_categories_widget-2" class="widget woocommerce widget_product_categories techmarket_widget_product_categories">
    <ul class="product-categories category-single">
        <li class="product_cat">
            <ul class="show-all-cat">
                <li class="product_cat">
                    <span class="show-all-cat-dropdown">Show All Categories</span>                    
                    <ul>
                    <?php
                    if (is_array($main_categories)) {
                        foreach ($main_categories as $category) {
                            
                            if(md5($category->id)== $idHash){
                                $openCategory = $category->name;
                                continue;
                            }
                            
                            if (is_array($categories[$category->id])) {
                    ?>     
                        <li class="cat-item"><a href="<?= base_url("webshop/products/?q=cetegory&catid=".$category->id."&key=".str_replace([' & ', '&',' ','-'], '_', $category->name)."&id=".md5($category->id))?>"><?= $category->name ?></a></li>
                        <?php }}} ?>                       
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="cat-item current-cat"><a href="#"><?=$openCategory?></a></li>
            </ul>
        </li>
    </ul>
    <!-- .product-categories -->
</div>
<!-- .techmarket_widget_product_categories -->