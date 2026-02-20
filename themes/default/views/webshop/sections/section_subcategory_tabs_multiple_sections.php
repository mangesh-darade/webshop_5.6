<?php
$sectionKey = md5('section_subcategory_tabs_multiple_sections');
$sectionData = $section_subcategory_tabs_multiple_sections;

if(is_array($sectionData['section_tab_categories'])) {                       
    foreach ($sectionData['section_tab_categories'] as $category_id => $subcategories) {                                            

    $tab_category_products  = $sectionData['section_products'][$category_id];
    $tab_categories         = $categories[$category_id];
    
    if(is_array($tab_categories)){
    $i=0;
    $tab_containts = $cat_tabs = '';
    foreach ($subcategories as $subcat_id) {
        $subcat = $tab_categories[$subcat_id];
        $tabHash = md5($subcat->id . $sectionKey) ;
        $i++;
        if($i > 4) { break; } //Maximum 4 Category Display In Tabs
        $active = $i==1? 'active' : '';
        
        
        $cat_tabs .= '<li class="nav-item"><a class="nav-link '.$active.'" href="#tab-'.$tabHash.'" data-toggle="tab">'.$subcat->name.'</a></li>';
 
        $tab_containts.= ' <div id="tab-'.$tabHash.'" class="tab-pane '.$active.'" role="tabpanel">
                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                    <div class="container-fluid">
                        <div class="woocommerce">
                            <div class="products">';
        /*
         * Create products structure function called from webshop helper function.
         */                  
        $tab_containts.= create_products_structure($tab_category_products[$subcat->id], $uploads, $sectionKey);
                            
        $tab_containts.= '   </div>
                        </div>
                        <!-- .woocommerce -->
                    </div>
                    <!-- .container-fluid -->
                </div>
                <!-- .products-carousel -->
            </div>';
        
    }//end foreach
}//end if                
?>

<section class="section-hot-new-arrivals section-products-carousel-tabs techmarket-tabs">
    <div class="section-products-carousel-tabs-wrap">
        <header class="section-header">
            <h2 class="section-title">
                <?=$sectionData['section_titles'][$category_id]?>
                <?= $is_admin_login ? ' <small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_subcategory_tabs_multiple_sections").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
            </h2>
            <ul role="tablist" class="nav justify-content-end">
            <?php echo $cat_tabs?>  
            </ul>
        </header>
        <!-- .section-header -->
        <div class="tab-content">
            <?php echo $tab_containts?>
        </div>
        <!-- .tab-content -->
    </div>
    <!-- .section-products-carousel-tabs-wrap -->
</section>
<!-- .section-products-carousel-tabs -->

<?php
    }//end foreach.
}//end if.
?>
