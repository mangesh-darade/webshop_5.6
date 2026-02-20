<?php
$sectionKey = md5('section_category_tab_center_align');
$sectionData = $section_category_tab_center_align;
//echo '<pre>';
//print_r($sectionData);
//echo '</pre>';
?>
<section class="section-products-tabs">
    <div class="section-products-tabs-wrap">
        <header class="section-header">
            <h2 class="section-title">
                <?=$sectionData['section_titles']?>
                <?= $is_admin_login ? ' <small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_category_tab_center_align").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
            </h2>
            <ul role="tablist" class="nav justify-content-center">
            <?php 
                if(is_array($sectionData['section_tabs'])){
                    $i=0;
                    foreach ($sectionData['section_tabs'] as $category_id => $tabs) {
                        $i++;
                        $tabHash = md5($category_id . $sectionKey) ;
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
            <div id="tab-<?=$tabHash?>" class="tab-pane <?=$classActive?>" role="tabpanel">
                <div class="products-carousel">
                    <div class="container-fluid">
                        <div class="woocommerce columns-4">
                            <div class="products">
                            <?php
                            
                                echo create_products_structure($sectionData['section_products'][$category_id], $uploads , $sectionKey);
                                                     
                            ?>
                            </div>
                        </div>
                    </div>
                    <!-- .container-fluid -->
                </div>
                <!-- .products-carousel -->
            </div>
            <!-- .tab-pane -->
        <?php 
                }//end foreach section_tabs
           }//end if section_tabs
        ?>  
        </div>
        <!-- .tab-content -->
        <a href="#" class="button"><i class="tm tm-free-return"></i>See More Products</a>
    </div>
    <!-- .section-products-tabs-wrap -->
</section>
<!-- .section-products-tabs -->