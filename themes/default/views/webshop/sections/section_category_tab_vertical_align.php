<?php
$sectionKey = md5('section_category_tab_vertical_align');
$sectionData = $section_category_tab_vertical_align;

?>
<section class="stretch-full-width section-products-carousel-with-vertical-tabs">
    <header class="section-header">
        <h2 class="section-title">
            <strong><?=$sectionData['section_titles']?></strong>
            <?= $is_admin_login ? ' <small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_category_tab_vertical_align").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
        </h2>
    </header>
    <!-- /.section-header -->
    <div class="products-carousel-with-vertical-tabs row">
        <ul role="tablist" class="nav">
        <?php 
            if(is_array($sectionData['section_tabs'])){
                $i=0;
                foreach ($sectionData['section_tabs'] as $category_id => $tabs) {
                    $i++;
                    $tabHash = md5($category_id . $sectionKey);
                    $classActive = $i==1 ? ' active ' : '';
        ?>
                    <li class="nav-item">
                        <a class="nav-link <?=$classActive?>" href="#tab-<?=$tabHash?>" data-toggle="tab">
                            <span class="category-title">
                                <i class="tm tm-desktop-pc"></i> <?=$tabs?></span>
                            <i class="tm tm-arrow-right"></i>
                        </a>
                    </li>
        <?php                    
                }//end foreach
            }//end if
        ?> 
        </ul>
        <div style="background-size: cover; background-position: center center; background-image: url( <?= $images ?>banner/vertical-bg.png ); height: 552px;" class="tab-content">
        <?php 
        if(is_array($sectionData['section_tabs'])){
            $i=0;
            foreach ($sectionData['section_tabs'] as $category_id => $tabs) {
                $i++;
                $tabHash = md5($category_id . $sectionKey);
                $classActive = $i==1 ? ' active ' : '';
    ?>    
            <div id="tab-<?=$tabHash?>" class="tab-pane <?=$classActive?>" role="tabpanel">
                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:6,&quot;slidesToScroll&quot;:6,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1600,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
                    <div class="container-fluid">
                        <div class="woocommerce columns-5">
                            <div class="products">
                            <?php

                                echo create_products_structure($sectionData['section_products'][$category_id], $uploads , $sectionKey);

                            ?>                                
                            </div>
                        </div>
                        <!-- .woocommerce-->
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
    <!-- /.products-carousel-with-vertical-tabs -->
</section>
<!-- /.section-products-carousel-with-vertical-tabs -->