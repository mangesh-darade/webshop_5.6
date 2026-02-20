<div id="content" class="site-content">
    <div class="col-full">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    
                    <?php include_once('sliders/home_slider_1.php')?>
                    
                    <?php
                    if(is_array($themeSections)){
                        
                        foreach ($themeSections as $sections) {
                            
                            switch ($sections->section_name) {
                                
                                case "section_subcategory_tabs_multiple_sections":
                                    
                                    include_once('sections/section_subcategory_tabs_multiple_sections.php');
                                    break;
                                    //section_category_tabs_products
                                 
                                    
                                case "section_features_list":
                                    
                                        include_once('sections/section_features_list.php');
                                   break;
                                    //section_features_list
                               
                               
                                case "section_top_categories":
                                    
                                        include_once('sections/section_top_categories.php');
                                   break;
                                    //section_top_categories
                               
                               
                                case "section_recently_viewed_products":
                                    
                                        include_once('sections/section_recently_viewed_products.php');
                                   break;
                                    //section_recently_viewed_products
                               
                               
                                case "section_fullwidth_notice":
                                    
                                        include_once('sections/section_fullwidth_notice.php');
                                   break;
                                    //section_fullwidth_notic
                               
                                case "section_full_width_banner_1":
                                    
                                        include_once('sections/section_full_width_banner_1.php');
                                   break;
                               
                                case "section_full_width_banner_2":
                                    
                                        include_once('sections/section_full_width_banner_2.php');
                                   break;                               
                               
                                case "section_footer_brands":
                                    
                                        include_once('sections/section_footer_brands.php');
                                   break;
                                    //section_footer_brands
                               
                                case "section_category_tab_right_highlite_products":
                                    
                                        include_once('sections/section_category_tab_right_highlite_products.php');
                                   break;
                                    //section_category_tab_right_highlite_products
                               
                                case "section_category_tab_center_align":
                                    
                                        include_once('sections/section_category_tab_center_align.php');
                                   break;
                                    //section_category_tab_center_align
                               
                                case "section_category_tab_right_align":
                                    
                                        include_once('sections/section_category_tab_right_align.php');
                                    break;
                                    //section_category_tab_right_align
                               
                                case "section_category_tab_left_align":
                                    
                                        include_once('sections/section_category_tab_left_align.php');
                                   break;
                                    //section_category_tab_left_align
                                
                                case "section_category_tab_vertical_align":
                                    
                                        include_once('sections/section_category_tab_vertical_align.php');
                                   break;
                                    //section_category_tab_vertical_align
                               
                                case "section_category_exclusive_products":
                                    
                                        include_once('sections/section_category_exclusive_products.php');
                                   break;
                                    //section_category_exclusive_products
                               
                                default:
                                    break;
                                
                            }//end Switch.
                            
                        }//end foreach.                        
                    }//end if $themeSections
                    
                    ?>
                    
                     
                    
                    
                  
                    
<!--                <div class="section-deals-carousel-and-products-carousel-tabs row">
                        <?php // include_once('sections/section_deals_box.php')?>
                        <?php // include_once('sections/section_deals_products.php')?>
                    </div>-->
                    
                   
                    
                    <?php   include_once('sections/section_category_exclusive_products.php')?>
                   
                    <?php // include_once('sections/section_best_sellers_product_category_tabs.php')?>
                    
                    <?php // include_once('sections/section_hr_banner_col_9_3.php')?>
                    
                    <?php // include_once('sections/section_high_ratting_products.php')?>
                    
                    
                    
                    
                    
                    <?php // include_once('sections/section_full_width_banner_1.php')?>

                    <?php // include_once('sections/section_full_width_banner_2.php')?>
                    
                    <?php // include_once('sections/section_col_6_category_tab_with_vertical_banner_col_3.php')?>
                    
                     
                    
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
</div>
 