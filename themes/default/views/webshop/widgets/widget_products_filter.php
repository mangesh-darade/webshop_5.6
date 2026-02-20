<div id="techmarket_products_filter-3" class="widget widget_techmarket_products_filter">
    <span class="gamma widget-title">Filters</span>
    <div class="widget woocommerce widget_price_filter" id="woocommerce_price_filter-2">
        <p>
            <span class="gamma widget-title">Filter by price#</span>
        <div class="price_slider_amount">
            <input id="amount" type="text" placeholder="Min price" data-min="6" value="33" name="min_price" style="display: none;">
            <button class="button" type="submit">Filter</button>
        </div>
        <div id="slider-range" class="price_slider"></div>
    </div>
    <?php
    if(!empty($brands_list)) {
    ?>
    <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-2">
        <span class="gamma widget-title">Brands</span>
        <?php
//        $brandsList = array_unique($brands_list);
//        print_r($brandsList);
//        $brands = get_brands($brandsList);
//
//               echo '<pre>';
//                print_r($brands_list);
//                 echo '</pre>';
        ?>
        <ul>            
        <?php 
            $b=0;
            foreach ($brands_list as $brand){
                $b++;
        ?>
            
            <li class="wc-layered-nav-term"><label><input type="checkbox" name="filter_brand" value="<?=$brand->brand_id?>" class="form-input" /><?=$brand->brand_name?></label>
                <span class="count">(1)</span>
            </li>
        <?php  
                if($b>=10){ break;}
            }//end foreach
        ?> 
        </ul>
    </div>
    <?php } ?>
    <!-- .woocommerce widget_layered_nav -->
<!--    <div class="widget woocommerce widget_layered_nav maxlist-more" id="woocommerce_layered_nav-3">
        <span class="gamma widget-title">Color</span>
        <ul>
            <li class="wc-layered-nav-term "><a href="#">Black</a>
                <span class="count">(4)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Blue</a>
                <span class="count">(4)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Green</a>
                <span class="count">(5)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Orange</a>
                <span class="count">(5)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Red</a>
                <span class="count">(4)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Yellow</a>
                <span class="count">(5)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Green</a>
                <span class="count">(5)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Orange</a>
                <span class="count">(5)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Red</a>
                <span class="count">(4)</span>
            </li>
            <li class="wc-layered-nav-term "><a href="#">Yellow</a>
                <span class="count">(5)</span>
            </li>
        </ul>
    </div>-->
    <!-- .woocommerce widget_layered_nav -->
</div>