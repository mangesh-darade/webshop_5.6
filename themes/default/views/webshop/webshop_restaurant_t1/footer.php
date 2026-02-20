<div class="background-image" data-vs-img="<?= !empty($setting_map['banner_image']) ? $uploads . $setting_map['banner_image'] : $uploads . 'webshop/default_banner.png' ?>"
        data-overlay="black" data-opacity="8">
    <!--==============================
        Subscribe Form
    ==============================-->
    <section class="vs-subscribe-wrapper vs-subscribe-layout2 py-lg-100 py-40" style=" display :none;">
        <div class="container">
            <div class="row no-gutters justify-content-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="vs-subscribe mb-4 mb-xl-0 text-center text-xl-left">
                        <h2 class="text-white mb-1">Subscribe to our newsletter</h2>
                        <p class="text-white text-md mb-0">Get updates for new products</p>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-7 pl-xl-5">
                    <form action="#" class="vs-subscribe-form subscribe-form-style1 d-sm-flex ">
                        <span class="subscribe-form-icon"><i class="fal fa-envelope text-title"></i></span>
                        <input type="email" class="form-control" placeholder="Your Email Address">
                        <button type="submit" class="vs-btn style1">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-wrapper footer-layout1 dark-footer ">
        <div
            class="footer-widget-wrapper border-top footer-widget-layout1 pt-40 pt-lg-100 pb-10 pb-lg-70 z-index-common">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-xl-9">
                        <div class="widget pt-0">
                            <h3 class="widget_title text-20">About Us</h3>
                            <div class="vs-widget-about">
                                <?php if (!empty($setting_map['about_us'])): ?>
                                <p class="widget-about-text m-0 lh-32 pr-xl-5">
                                    <?= htmlspecialchars($setting_map['about_us']); ?>
                                </p>
                                <?php endif; ?>

                                <?php if (!empty($setting_map['address'])): ?>
                                <a class='' href="https://maps.app.goo.gl/AE9h2Gd8u1ZLiQmn7" target="_blank"
                                    style="color:#fa8507">
                                    <i class="fas fa-location-dot mx-2" id="locate"></i>
                                     <?= htmlspecialchars($setting_map['address']); ?>
                                </a>
                                <?php endif; ?>
                            </div>

                            <div class="social-links links-has-border mt-3">
                                <!-- Make sure Font Awesome is loaded in your HTML head -->
                                <link rel="stylesheet"
                                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

                                <!-- Social Media Icons Section -->
                                <ul>
                                    <?php if (!empty($website_setting)): ?>
                                    <?php foreach ($website_setting as $item): ?>
                                    <?php
                                                    if (
                                                        strpos($item->fields, 'media_') === 0 &&
                                                        !empty($item->value) &&
                                                        !empty($item->icons)
                                                    )  {
                                                        if (preg_match('/href=["\']?([^"\'>]+)["\']?/', $item->value, $match)) {
                                                            $link = $match[1];
                                                        } else {
                                                            $link = $item->value;
                                                        }
                                                        $icon = !empty($item->icons) ? $item->icons : str_replace(['media_', '_link'], '', $item->fields);
                                                    ?>
                                    <li>
                                        <a href="<?= htmlspecialchars($link) ?>" target="_blank">
                                            <i class="fab fa-<?= htmlspecialchars($icon) ?>"></i>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-xl-5" style="display : none;">
                        <div class="widget widget_nav_menu   ">
                            <h3 class="widget_title text-20">Menu</h3>
                            <div class="menu-all-pages-container">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <ul class="menu">
                                            <li><a href="">Morning Temptations</a></li>
                                            <li><a href="">Dosa Corner</a></li>
                                            <li><a href="">Lunch Meals</a></li>
                                            <li><a href="">Lunch Combos</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <ul class="menu">
                                            <li><a href="">Biriyani</a></li>
                                            <li><a href="">Starters</a></li>
                                            <li><a href="">Indian Breads</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3>
                            <div class=" widget widget_nav_menu ">
                                <h3 class=" widget_title text-20" style="margin-left: 8px;">Quick Links</h3>
                        <div class="menu-all-pages-container">
                            <div class="row">
                                <ul class="menu white-links">
                                    <li><a href="<?= base_url('webshop/terms_and_conditions') ?>">Terms And
                                            Conditions</a></li>
                                    <li><a href="<?= base_url('webshop/privacy_policy') ?>">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4" style=" display :none;">

                    <div class="widget  ">
                        <h3 class="widget_title text-20">Latest Posts</h3>
                        <div class="vs-widget-recent-post pt-2">
                            <div class="recent-post media align-items-center">
                                <div class="media-img">
                                    <img src="<?=$assets?>restaurant/img/widget/post-thumb-2-1.jpg"
                                        alt="Recent Post Image">
                                </div>
                                <div class="media-body pl-20">
                                    <h4 class="recent-post-title h6 "><a href="blog.html">Assertively visualize
                                            best-of-breed customers.</a></h4>
                                    <a class="text-theme" href="blog.html"><i
                                            class="fal fa-calendar-alt text-theme"></i>05 June, 2022.</a>
                                </div>
                            </div>
                            <div class="recent-post media align-items-center">
                                <div class="media-img">
                                    <img src="<?=$assets?>restaurant/img/widget/post-thumb-2-2.jpg"
                                        alt="Recent Post Image">
                                </div>
                                <div class="media-body pl-20">
                                    <h4 class="recent-post-title h6"><a href="blog.html">Wonderful Natural
                                            Feeling Lorem ipsum</a></h4>
                                    <a class="text-theme" href="blog.html"><i
                                            class="fal fa-calendar-alt text-theme"></i>28 June, 2022.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="footer-copyright text-center bg-theme py-3 link-inherit z-index-common">
<div class="container">
    <p class="text-white mb-0">
        Copyright <i class="fal fa-copyright"></i>
        <?= date('Y'); ?> 
        <a href="<?= !empty($setting_map['Copyright_heading']) ? $setting_map['Copyright_heading'] : base_url('webshop') ?>">
            <?= !empty($setting_map['index_heading']) ? $setting_map['index_heading'] : " " ?>
        </a> - All rights reserved by 
        <a href="https://www.elintom.io">ElintOm</a>.
    </p>
</div>

</div>
<div>
    <a href="<?= base_url('webshop/cart') ?>">
        <button class="fal fa-shopping-cart" id="goToCartBtn" onclick="location.href='<?= base_url('webshop/cart') ?>';"></button>

    </a>
</div>

<?php           
                include_once('whatsapp_chatbot.php');       
            ?>
</footer>
</div>
<style>
[data-opacity="6"]:before {
    opacity: 0.01 !important;
}

.pb-lg-70 {
    padding-bottom: 0px !important;
}

.pt-lg-100 {
    padding-top: 50px !important;
}

.white-links li::marker {
    color: white;
}
</style>
<?php if (!isset($this->session->webshop->user_id)) : ?>
<!-- MODAL STYLES & FIX -->
<style>
  .modal-backdrop {
    z-index: 1050 !important;
  }

  .modal {
    z-index: 1060 !important;
  }

  .sidemenu-wrapper {
    z-index: 1040 !important;
  }

  .modal-dialog-centered {
    top: 50% !important;
    transform: translateY(-50%) !important;
  }
</style>

<!-- MODAL HTML -->
<!-- <div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 p-3 text-center">
      <div class="modal-header border-0 justify-content-center">
        <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid" style="height: 80px;">
      </div>
      <div class="modal-body">
        <h5 class="mb-3">Sign in or continue to place your order</h5>
        <div class="mb-3">
          <input type="text" class="form-control text-center" placeholder="1111111111">
        </div>
        <div class="text-muted small mb-2">
          Looks like you don't have an account — let's get you signed up!
        </div>
        <a href="<?= base_url('webshop/register') ?>" class="text-decoration-none text-warning fw-semibold">Create account</a>
        <hr class="my-4">
        <div class="mb-2 fw-semibold">Don’t have an account?</div>
        <div class="text-muted small mb-3">Your address won’t be saved for future orders.</div>
        <button onclick="window.location.href='<?= base_url('webshop/checkout') ?>'" class="btn btn-outline-warning w-100 fw-semibold">Continue as guest</button>
      </div>
    </div>
  </div>
</div> -->

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- MODAL TRIGGERS -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    // const modal = new bootstrap.Modal(document.getElementById('signinModal'));
    
    // Checkout button modal trigger
    document.querySelectorAll(".vs-btn.style1.checkout.wc-forward").forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        // modal.show();
      });
    });

    // Cart icon button trigger
    const goToCartBtn = document.getElementById("goToCartBtn");
    if (goToCartBtn) {
      goToCartBtn.addEventListener("click", function (e) {
        e.preventDefault();
        // modal.show();
      });
    }
  });
</script>
<?php endif; ?>
