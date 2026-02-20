<?php
$sectionKey = md5('section_category_tab_right_align');
$sectionData = $section_category_tab_right_align;

?>
<section class="section-products-carousel-tabs ">
    <div class="section-products-carousel-tabs-wrap">
        <header class="section-header">
            <h2 class="section-title">
                <?=$sectionData['section_titles']?>
                <?= $is_admin_login ? '<small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_category_tab_right_align").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
            </h2>
            <ul role="tablist" class="nav justify-content-end">
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
            <div id="tab-<?=$tabHash?>" class="tab-pane <?=$classActive?>" role="tabpanel">
                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:8,&quot;slidesToScroll&quot;:8,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:650,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesToScroll&quot;:1}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1700,&quot;settings&quot;:{&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6}}]}">
                    <div class="container-fluid">
                        <div class="woocommerce columns-8">
                            <div class="products">
                            <?php
                            
                                echo create_products_structure($sectionData['section_products'][$category_id], $uploads , $sectionKey);
                                                     
                            ?>
                            </div>
                        </div>
                        <!-- .woocommerce -->
                    </div>
                    <!-- .container-fluid -->
                </div>
                <!-- .products-carousel -->
            </div>
        <?php 
                }//end foreach section_tabs
           }//end if section_tabs
        ?>    
        </div>
        <!-- .tab-content -->
    </div>
    <!-- .section-products-carousel-tabs-wrap -->
</section>
<!-- .section-products-carousel-tabs -->