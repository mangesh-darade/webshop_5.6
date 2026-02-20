<div class="alert alert-success alert-dismissible fade m-2" id="success_alert" role="alert">
    <span id="success_alert_message">Message Will Display Here</span>
    <button type="button" class="close btn" data-dismiss="alert"  data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="alert alert-danger alert-dismissible fade " id="error_alert" role="alert">
    <span id="error_alert_message">Message Will Display Here</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="navbar-search col-4 header-form " method="get" action="<?= base_url('webshop/search_products') ?>">
    <label class="sr-only screen-reader-text" for="search">Search for:</label>
    <div class="input-group" id="unique_id">
        <input type="text" name="search" id="search_products" class="form-control search-field product-search-field"
            dir="ltr" value="<?= isset($search_keyword)? $search_keyword : ''?>" placeholder="Search for products" />
        <div class="input-group-addon search-categories popover-header d-flex justify-content-center align-items-center">
            <select name='search_by_category' id='search_by_category' class='postform resizeselect text-center form-select' style="height:90%">
                <option value='0' selected='selected' > All Categories </option>
                <?php
                if (is_array($main_categories)) {
                    foreach ($main_categories as $category) {
                        $selected = ($active_search_category == $category->id) ? ' selected="selected" ' : '';
                        echo '<option class="level-0" value="' . $category->id . '" '.$selected.'> ' . $category->name . ' </option>';
                    }
                }
                ?>
            </select>
        </div>
        <!-- .input-group-addon -->
        <div class="input-group-btn input-group-append">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i>
                <span class="search-btn">Search</span>
            </button>
        </div>
        <!-- .input-group-btn -->
    </div>
    <!-- .input-group -->
</form>
<!-- .navbar-search -->
<!--<ul class="header-compare nav navbar-nav">
    <li class="nav-item">
        <a href="<?= base_url('webshop/compare') ?>" class="nav-link">
            <i class="tm tm-compare"></i>
            <span id="top-cart-compare-count" class="value">3</span>
        </a>
    </li>
</ul> -->
<!-- .header-compare -->
<ul class="header-wishlist nav navbar-nav col-1 wishlist-header m-0 px-2">
    <li class="nav-item">
        <a href="<?= base_url('webshop/wishlist') ?>" class="nav-link">
            <i class="tm tm-favorites"></i>
            <span id="top-cart-wishlist-count" class="value"><?=$wishlist_count?></span>
        </a>
    </li>
</ul>
<!-- .header-wishlist -->
<ul id="site-header-cart" class="site-header-cart menu col-1 cart-header m-0 px-2">
    <li class=" animate-dropdown dropdown ">
        <a class=" cart-contents" href="#" data-toggle="dropdown" title="View your shopping cart"
            onclick="load_header_cart()">
            <i class="tm tm-shopping-bag"></i>
            <span class="count" id="header_cart_count"><?=isset($cart_items)? count($cart_items) : 0;?></span>
            <span class="amount">
                <span class="price-label">Your Cart</span><span id="header_cart_total">Rs.&nbsp;0.00</span></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-mini-cart ">
            <li>
                <div class="widget woocommerce widget_shopping_cart">
                    <div class="widget_shopping_cart_content" id="header_cart_content">


                        <!-- .site-header-cart -->
                        <?php include_once 'header_cart_items.php'; ?>


                    </div>
                    <!-- .widget_shopping_cart_content -->
                </div>
                <!-- .widget_shopping_cart -->
            </li>
        </ul>
        <!-- .dropdown-menu-mini-cart -->
    </li>
</ul>
<label>Themes</label>
<select id="themes" onchange="reloadPage()">
        <option  value="default">Default</a>
        <option  value="restaurant">Restaurant</option>
</select>
<!-- .site-header-cart -->
 