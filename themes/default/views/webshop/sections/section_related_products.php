<section class="related">
    <header class="section-header">
        <h2 class="section-title">
            Related Products 
            <?= $is_admin_login ? '<small title="Section Settings"><a href="'.base_url("webshop_settings/elements/section_related_products").'" target="new" ><i class="fa fa-cog text-info"></i></a></small>' : ''; ?>
        </h2>
        <nav class="custom-slick-nav"></nav>
    </header>
    <!-- .section-header -->
    <div class="products">
        <?php
            $sectionKey = md5('section_related_products');
            
            echo create_products_structure($related_products, $uploads , $sectionKey, $display=true);
        ?>
    </div>
</section>
<!-- .single-product-wrapper -->
 