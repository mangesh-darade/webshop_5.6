<section class="section-top-categories section-categories-carousel" id="categories-carousel-1">
    <header class="section-header">
        <h4 class="pre-title">Featured</h4>
        <h2 class="section-title">Top categories 
            <br>this week
            <?= $is_admin_login ? ' <small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_top_categories").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
        </h2>
        <nav class="custom-slick-nav"></nav>
        <!-- .custom-slick-nav -->
        <a class="readmore-link" href="#">Full Catalog</a>
    </header>
    <!-- .section-header -->
    <div class="product-categories-1 product-categories-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:1,&quot;dots&quot;:false,&quot;arrows&quot;:true,&quot;prevArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-left\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;nextArrow&quot;:&quot;&lt;a href=\&quot;#\&quot;&gt;&lt;i class=\&quot;tm tm-arrow-right\&quot;&gt;&lt;\/i&gt;&lt;\/a&gt;&quot;,&quot;appendArrows&quot;:&quot;#categories-carousel-1 .custom-slick-nav&quot;,&quot;responsive&quot;:[{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}}]}">
        <div class="woocommerce columns-5">
            <div class="products">
                <?php                
               
                $sectionTopCategories   = !empty($section_top_categories) ? json_decode(unserialize($section_top_categories), TRUE) : '';
                
                $topCategories          = (is_array($sectionTopCategories) && isset($sectionTopCategories['section_top_categories'])) ? $sectionTopCategories['section_top_categories'] : $main_categories; 
                
                $topCategoriesTitles    = (is_array($sectionTopCategories) && isset($sectionTopCategories['category_titles']))  ? $sectionTopCategories['category_titles'] : ''; 
                
//                echo '<pre>';
//                print_r($topCategories);
//                print_r($sectionTopCategories['section_top_categories']);
//                echo '</pre>';
                
                if(is_array($topCategories)) {
                    foreach ($topCategories as $cid) {
                        
                        $category = is_numeric($cid) ? $main_categories[$cid] : $cid ;
                ?>      
                        <div class="product-category product first">
                            <a href="<?= base_url("webshop/category_products/".$category->id)?>">
                            <?php
                                $uploadsDir = FCPATH . 'uploads/';
                                $imagePath = $uploadsDir . $category->image;
                                $defaultImage = base_url('assets/mdata/' . $this->Customer_assets . '/uploads/no_image.png');
                                $imgSrc = (!empty($category->image) && file_exists($imagePath)) 
                                    ? base_url('uploads/' . $category->image) 
                                    : $defaultImage;
                            ?>
                                <img style="height:170px;" alt="<?= $category->name ?>" class="img img-responsive" src="<?= $imgSrc ?>">

                                <h2 class="woocommerce-loop-category__title">
                                <?php
                                    if(!empty($topCategoriesTitles)){
                                        echo $topCategoriesTitles[$category->id];
                                    } else {
                                        echo $category->name; 
                                    }                                    
                                ?>
                                </h2>
                            </a>
                        </div>
                <?php                        
                    }//end foreach
                }//end if
                ?>
            </div>
            <!-- .products -->
        </div>
        <!-- .woocommerce -->
    </div>
    <!-- .product-categories-carousel -->
</section>
<!-- .section-categories-carousel -->