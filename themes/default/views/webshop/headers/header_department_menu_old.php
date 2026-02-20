<div id="departments-menu" class="dropdown departments-menu">
    <button class="btn dropdown-toggle btn-block" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="tm tm-departments-thin"></i>
        <span>All Categories</span>
    </button>

    <ul id="menu-departments-menu" class="dropdown-menu yamm departments-menu-dropdown">
        <li class="highlight menu-item animate-dropdown">
            <a title="Top Products" href="#">Top Products</a>
        </li>
        <?php
        if (is_array($main_categories)) {
            foreach ($main_categories as $category) {
                if (is_array($categories[$category->id])) {
                    ?>      
                    <li class="yamm-tfw menu-item menu-item-has-children animate-dropdown dropdown-submenu">
                        <a title="<?= $category->name ?>" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="<?= base_url("webshop/category_products/".$category->id)?>"><?= $category->name ?> <span class="caret"></span></a>
                        <ul role="menu" class=" dropdown-menu">
                            <li class="menu-item menu-item-object-static_block animate-dropdown">
                                <div class="yamm-content">
                                    <div class="bg-yamm-content bg-yamm-content-bottom bg-yamm-content-right">
                                        <div class="kc-col-container">
                                            <div class="kc_single_image">
                                                <img src="<?= $uploads . $category->image ?>" class="img" alt="<?= $category->name ?>" />
                                            </div>
                                             <!--.kc_single_image--> 
                                        </div>
                                         <!--.kc-col-container--> 
                                    </div>
                                     <!--.bg-yamm-content--> 
                                    <div class="row yamm-content-row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="kc-col-container">
                                                <div class="kc_text_block">
                                                    <ul>
                                                        <li class="nav-title"><?= $category->name ?></li>
                                                        <?php
                                                        foreach ($categories[$category->id] as $subcategory) {
                                                            ?>
                                                        <li><a href="<?= base_url("webshop/category_products/".$category->id."/".$subcategory->id)?>"><?= $subcategory->name ?></a></li>
                                                        <?php }
                                                        ?>
                                                        <li class="nav-divider"></li>
                                                        <li>
                                                            <a href="<?= base_url("webshop/products/?q=cetegory&catid=".$category->id."&key=".str_replace([' & ', '&',' ','-'], '_', $category->name)."&id=".md5($category->id))?>">
                                                                <span class="nav-text">All <?= $category->name ?> Products</span>
                                                                <span class="nav-subtext">Discover more products</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                 <!--.kc_text_block--> 
                                            </div>
                                             <!--.kc-col-container--> 
                                        </div>
                                         <!--.kc_column--> 
                                        <div class="col-md-6 col-sm-12">
                                            <div class="kc-col-container">
                                                <div class="kc_text_block">
                                                    <ul>
                                                        <li class="nav-title"><?= $category->name ?> Brands</li>
                                                        <?php
                                                        if (isset($category_brands[$category->id])) {
                                                            foreach ($category_brands[$category->id] as $brands) {
                                                        ?>
                                                                <li style="display: inline-table; width: 49%;"><a href="<?= base_url("webshop/products/?q=brand&catid=".$category->id."&key=".str_replace([' & ', '&',' ','-'], '_', $brands->brand_name)."&id=".md5($brands->brand_id))?>"><?= $brands->brand_name ?></a></li>                                                                                    
                                                        <?php
                                                            }
                                                        }
                                                        ?>                                                                                
                                                    </ul>
                                                </div>
                                                 <!--.kc_text_block--> 
                                            </div>
                                             <!--.kc-col-container--> 
                                        </div>
                                         <!--.kc_column--> 
                                    </div>
                                     <!--.kc_row--> 
                                </div>
                                 <!--.yamm-content--> 
                            </li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="menu-item menu-item-type-custom animate-dropdown">
                        <a title="<?= $category->name ?>" href="<?= base_url("webshop/category_products/".$category->id)?>"><?= $category->name ?></a>
                    </li>       
                <?php } ?>        
                <?php
            }//end foreach.
        }//end if.
        ?>
    </ul>
</div>
<!-- .departments-menu -->