<footer class="site-footer footer-v1">
    <input type="hidden" id="base_url" value="<?= base_url()?>" />
    <div class="col-full">
        <div class="before-footer-wrap">
            <div class="col-full col-12 d-flex flex-column ">
                <div class="footer-newsletter d-flex justify-content-center align-items-center" style="width:100%; padding:1%">
                    <div class="media d-flex">
                        <i class="footer-newsletter-icon tm tm-newsletter"></i>
                        <div class="media-body">
                            <div class="clearfix d-flex flex-column flex-lg-row justify-content-center align-items-center">
                                <div class="newsletter-header">
                                    <h5 class="newsletter-title">Sign up to Newsletter</h5>
                                    <span class="newsletter-marketing-text">...and receive
                                        <strong>Rs. 100 coupon for first shopping</strong>
                                    </span>
                                </div>
                                <!-- .newsletter-header -->
                                <div class="newsletter-body">
                                    <form class="newsletter-form">
                                        <input type="email" placeholder="Enter your email address" class="m-1">
                                        <button class="button m-1" type="button">Sign up</button>
                                    </form>
                                </div>
                                <!-- .newsletter body -->
                            </div>
                            <!-- .clearfix -->
                        </div>
                        <!-- .media-body -->
                    </div>
                    <!-- .media -->
                </div>
                <!-- .footer-newsletter -->
                <div class="footer-social-icons">
                    <ul class="social-icons nav">
                        <li class="nav-item">
                            <a class="sm-icon-label-link nav-link">
                                <i class="fa fa-facebook"></i> Facebook</a>
                        </li>
                        <li class="nav-item">
                            <a class="sm-icon-label-link nav-link">
                                <i class="fa fa-twitter"></i> Twitter</a>
                        </li>
                        <li class="nav-item">
                            <a class="sm-icon-label-link nav-link">
                                <i class="fa fa-google-plus"></i> Google+</a>
                        </li>
                        <li class="nav-item">
                            <a class="sm-icon-label-link nav-link">
                                <i class="fa fa-vimeo-square"></i> Vimeo</a>
                        </li>
                        <li class="nav-item">
                            <a class="sm-icon-label-link nav-link">
                                <i class="fa fa-rss"></i> RSS</a>
                        </li>
                    </ul>
                </div>
                <!-- .footer-social-icons -->
            </div>
            <!-- .col-full -->
        </div>
        <!-- .before-footer-wrap -->
        <div class="footer-widgets-block">
            <div class="row">
                <div class="footer-contact col-xl-6">
                    <div class="footer-logo">
                        <a href="<?= base_url('webshop/index')?>" class="custom-logo-link" rel="home">
                            <img src="<?= $uploads."logos/logo.png"?>" class="img" alt="logo" />
                        </a>
                    </div>
                    <!-- .footer-logo -->
                    <div class="contact-payment-wrap">
                        <div class="footer-contact-info">
                            <div class="media">
                                <span class="media-left icon media-middle">
                                    <i class="tm tm-call-us-footer"></i>
                                </span>
                                <div class="media-body">
                                    <span class="call-us-title">Got Questions ? Call us 24/7!</span>
                                    <span class="call-us-text">(+91) 9999912345, (+91) 9999912346 </span>
                                    <address class="footer-contact-address">17 MK Gandhi Road, Jupitar House, Nayar
                                        Compllex, MH India</address>
                                    <a href="#" class="footer-address-map-link">
                                        <i class="tm tm-map-marker"></i>Find us on map</a>
                                </div>
                                <!-- .media-body -->
                            </div>
                            <!-- .media -->
                        </div>
                        <!-- .footer-contact-info -->
                        <div class="footer-payment-info">
                            <div class="media">
                                <span class="media-left icon media-middle">
                                    <i class="tm tm-safe-payments"></i>
                                </span>
                                <div class="media-body">
                                    <h5 class="footer-payment-info-title">We are using safe payments</h5>
                                    <div class="footer-payment-icons">
                                        <ul class="list-payment-icons nav">
                                            <li class="nav-item">
                                                <img class="payment-icon-image"
                                                    src="<?= $uploads ?>webshop/images/credit-cards/mastercard.svg"
                                                    alt="mastercard" />
                                            </li>
                                            <li class="nav-item">
                                                <img class="payment-icon-image"
                                                    src="<?= $uploads ?>webshop/images/credit-cards/visa.svg"
                                                    alt="visa" />
                                            </li>
                                            <li class="nav-item">
                                                <img class="payment-icon-image"
                                                    src="<?= $uploads ?>webshop/images/credit-cards/paypal.svg"
                                                    alt="paypal" />
                                            </li>
                                            <li class="nav-item">
                                                <img class="payment-icon-image"
                                                    src="<?= $uploads ?>webshop/images/credit-cards/maestro.svg"
                                                    alt="maestro" />
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- .footer-payment-icons -->
                                    <div class="footer-secure-by-info">
                                        <h6 class="footer-secured-by-title">Secured by:</h6>
                                        <ul class="footer-secured-by-icons">
                                            <li class="nav-item">
                                                <img class="secure-icons-image"
                                                    src="<?= $uploads ?>webshop/images/secured-by/norton.svg"
                                                    alt="norton" />
                                            </li>
                                            <li class="nav-item">
                                                <img class="secure-icons-image"
                                                    src="<?= $uploads ?>webshop/images/secured-by/mcafee.svg"
                                                    alt="mcafee" />
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- .footer-secure-by-info -->
                                </div>
                                <!-- .media-body -->
                            </div>
                            <!-- .media -->
                        </div>
                        <!-- .footer-payment-info -->
                    </div>
                    <!-- .contact-payment-wrap -->
                </div>
                <!-- .footer-contact -->
                <div class="footer-widgets col-xl-6">
                    <div class="columns">
                        <aside class="widget clearfix">
                            <div class="body">
                                <h4 class="widget-title">Find it Fast</h4>
                                <div class="menu-footer-menu-1-container">
                                    <ul id="menu-footer-menu-1" class="menu">
                                        <?php
                                        if (is_array($main_categories)) {
                                            $i=0;
                                            foreach ($main_categories as $category) {
                                                $i++;
                                               echo '<li class="menu-item">
                                                    <a href="'.base_url('webshop/category_products/'.$category->id).'">' . $category->name . '</a>
                                                </li>';
                                               if($i==10){ break; }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- .menu-footer-menu-1-container -->
                            </div>
                            <!-- .body -->
                        </aside>
                        <!-- .widget -->
                    </div>
                    <!-- .columns -->
                    <div class="columns">
                        <aside class="widget clearfix">
                            <div class="body">
                                <h4 class="widget-title">Find Brands</h4>
                                <div class="menu-footer-menu-2-container">
                                    <ul id="menu-footer-menu-2" class="menu">
                                        <?php
                                        if (is_array($all_brands)) {
                                            $i=0;
                                            foreach ($all_brands as $brand) {
                                                $i++;
                                               echo '<li class="menu-item">
                                                    <a href="'. base_url("webshop/products/?q=brand&catid=".$brand->category_id."&key=".str_replace([' & ', '&',' ','-'], '_', $brand->name)."&id=".md5($brand->id)) .'">' . $brand->name . '</a>
                                                </li>';
                                               if($i==10){ break; }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- .menu-footer-menu-2-container -->
                            </div>
                            <!-- .body -->
                        </aside>
                        <!-- .widget -->
                    </div>
                    <!-- .columns -->
                    <div class="columns">
                        <aside class="widget clearfix">
                            <div class="body">
                                <h4 class="widget-title">Customer Care</h4>
                                <div class="menu-footer-menu-3-container">
                                    <ul id="menu-footer-menu-3" class="menu">
                                        <li class="menu-item">
                                            <a href="#">My Account</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="#">Wishlist</a>
                                        </li>
                                        <?php
                                    if(isset($custom_pages['footer_links']) && is_array($custom_pages['footer_links'])){
                                        foreach ($custom_pages['footer_links'] as $page) {
                                    ?>
                                        <?php if($page['page_type']=='text') { ?>
                                        <li class="menu-item"><a
                                                href="<?=base_url("webshop/page/".$page['page_key'].'/'.md5($page['id']))?>"><?=$page['page_title']?></a>
                                        </li>
                                        <?php } elseif($page['page_type']=='file' && !empty($page['page_file'])) { ?>
                                        <li class="menu-item"><a
                                                href="<?=base_url("assets/mdata/$Customer_assets/uploads/webshop/pages/".$page['page_file'])?>"
                                                target="new"><?=$page['page_title']?></a></li>
                                        <?php } ?>

                                        <?php
                                        }
                                    }
                                    
                                    ?>

                                    </ul>
                                </div>
                                <!-- .menu-footer-menu-3-container -->
                            </div>
                            <!-- .body -->
                        </aside>
                        <!-- .widget -->
                    </div>
                    <!-- .columns -->
                </div>
                <!-- .footer-widgets -->
            </div>
            <!-- .row -->
        </div>
        <!-- .footer-widgets-block -->
        <div class="site-info">
            <div class="col-full">
                <div class="copyright">Copyright &copy; <?=date('Y');?> <a href="#">Simplypos</a>. All rights reserved.
                </div>
                <!-- .copyright -->
            </div>
            <!-- .col-full -->
        </div>
        <!-- .site-info -->
    </div>
    <!-- .col-full -->
    <?php           
        include_once('whatsapp_chatbot.php');       
    ?>
</footer>
<!-- .site-footer -->
<script>
//Define JS global variables
let webshop_settings_overselling = '<?= $this->webshop_settings->overselling;?>';
</script>