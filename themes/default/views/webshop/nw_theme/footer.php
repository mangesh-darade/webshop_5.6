<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 logo-search">
                <?php $logo_image = 'webshop/default_banner.png'; // fallback image
                $phone_number = "";
                foreach ($this->data['website_setting'] as $item) {
                    if ($item->fields === 'logo_image' && !empty($item->value)) {
                        $logo_image = $item->value;
                        // break;
                    }
                    if ($item->fields === 'phone_number' && !empty($item->value)) {
                        $phone_number = $item->value;
                    }
                }
                ?>
                <a href="<?= base_url('webshop') ?>">
                    <img src="<?= $uploads . $logo_image ?>" alt="Logo" style=" margin-top: -25px; height: 130px; width: 160px;">
                </a>
            </div><!--/col-->
            <div class="col-md-8 features">
                <!-- <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <h5 class="larger">100% <span>Satisfaction Guaranteed</span></h5>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <h5>Proven Performance <span>Backed by Science</span></h5>
                    </div>
                    <div class="clearfix visible-sm-block"></div>
                    <div class="col-sm-6 col-md-3">
                        <h5>Lab Verified <span>for Quality, Dosage &amp; Potency</span></h5>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <h5>Kind &amp; Knowledgeable <span>Customer Service</span></h5>
                    </div>
                </div>
            </div> -->
            </div>

            <p class="contact"><strong>Questions?</strong> Call our friendly customer service team at <strong><a class="website-phone-number"><?= !empty($phone_number) ? $phone_number : "00-0000-0000" ?> </a></strong><br>
                Weekdays 9am-12:30pm and 1:30pm-4pm EST</p>

            <div class="row" style="margin-bottom:30px;">
                <!-- <div class="col-md-6 nl-signup">
                <h5><i class="fa fa-envelope"></i> Stay Updated - Herbinn Micro Medicines Newsletter</h5>
                <p>Get health news, exclusive offers, and more</p>
                <div method="post" class="nl-signup-form">
                    <div class="input-group">
                        <input name="email" id="email-nl-signup-footer" type="text" class="form-control input-lg" placeholder="Your email address here">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-lg">Join Us Today</button>
                        </span>
                    </div>
                    <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response" value="03AFcWeA4KO9LsAhssmIGaW3SWNRa60q52zszqwR-uhkMPwNy0g_Yh33miMb7kfB14xhS-JZUiSyXnr2ZavKYitwZseJBt7q0xPZqjeVwK_Tz1Yxb-yi00vgMuZYzisyRZXoFDqCUPms2ugjZh2XRmJfLV-G6XvifckPulaX3AuTwLfVaBFDCxjr7gLs_NAIaZ54rbXcInhz4rMsJWqD0LVUd0AM3Od_RYa_F3Xn7nSWQ5c4iT-pRuzspfBJ4EoulgaZYMOlu8lJatszT-cj76rLxoR1JO_L9TziQWci07BB-AYXFKgoIAYV6whN_MSWwokLhzYc4sL9tfg6kaUPV_X9V8i24H-NPA9bW7YWr1sZwh62633hNXC9idWX9-gP8oNs27dPlS_yML8SYA4RM22dKvvNcNwj4W2kFiij7XxNqG22HH9-b-dn-o163n4Ef2um9HjWIf3K7wCefT9zesi9GdbSx759-9sFDGkVB0Vn_4tTKt8gQXu8fBb3lVVUXS7mfvTKkyvrlb5SIi6DAvoj1KAOOE3HrOok25IRWbL3-z4cUSZC34YHx3UvwDFq1E8iNMeYUekFEtybGYbJWyttuPmCimwNTYDqSScZOe871_nj6suGoccb1jBzENnof9RFrx7HmObj4XsLP-yn5fky3vGUNlvTEPZcBBXqSmvfBvfPnWelMfAV9q9e2BLs4-xHS8Sq-jUwRgXZnvFV1rZ6jtsDoF0rNg4tcoovn4Ze8NvqZh8NG244CxT2IIAgjEclvHPkKi9w2s7T_MoT24_zNPj7U1pAJbsuVBfiY4-HIQyDjy3huGXPdeGjkH9mPs25Skbqivgw8epMsUOSqPp8IO29IQrSZzPvrWadu9NQ2Hf0ynKTIrRWfL3Mpudkpy7_E3s2bm3Gni">
                    <input type="hidden" name="signup_id" value="nw_newsletter_footer">
                    <input type="hidden" name="sc_req" value="0">
                </div>
                <p style="color:#CCC; font-size: 90%">This site is protected by reCAPTCHA and the Google <a href="<?= baseUrl('webshop/privacy_policy') ?>" target="_blank">Privacy Policy</a> and <a href="<?= baseUrl('webshop/terms_and_conditions') ?>" target="_blank">Terms of Service</a> apply.</p>
            </div> -->
                <!-- <div class="col-md-6">
                <h5>We Accept:</h5>
                <img src="<?= $assets . 'nw_theme/images/visa.gif' ?>" alt="Visa logo">
                <img src="<?= $assets . 'nw_theme/images/MasterCard.gif' ?>" alt="MasterCard logo">
                <img src="<?= $assets . 'nw_theme/images/DiscoverCard.gif' ?>" alt="Discover logo">
                <img src="<?= $assets . 'nw_theme/images/Amex.gif' ?>" alt="American Express logo">
                <a href="#" title="How PayPal Works">
                    <img src="<?= $assets . 'nw_theme/images/paypal.jpg' ?>" border="0" alt="PayPal Logo">
                </a>
            </div> -->
            </div><!--/row-->

            <div class="row f-links">
                <div class="col-xs-6 col-sm-3 col-md-2 column links">
                    <h5>Company</h5>
                    <ul>
                        <li><a class="underline" href="<?= baseurl('webshop/about_us') ?>">About Us</a></li>
                        <!-- <li><a href="#">Testimonials</a></li> -->
                        <li><a  class="underline" href="<?= baseurl('webshop/terms_and_conditions') ?>">Terms and Conditions</a></li>
                        <li><a class="underline" href="<?= baseurl('webshop/privacy_policy') ?>">Privacy Policy</a></li>

                    </ul>
                </div>
                <div class="col-xs-6 col-sm-3 col-md-2 column categories">
                    <h5>Shopping Help</h5>
                    <ul>
                        <?php
                        $alwaysPresentLinkArr = ['aboutus', 'terms_conditions', 'policy'];
                        $customPagesObj = $this->data['custom_pages'];

                        foreach ($customPagesObj as $key => $value) {
                            if ($customPagesObj->$key->is_active == 1 && $customPagesObj->$key->page_section == "footer_links" && !in_array($customPagesObj->$key->page_key, $alwaysPresentLinkArr, $strict = false) && !empty($customPagesObj->$key->page_text)) {
                        ?>
                                <li><a href="<?= baseurl('webshop/' . $customPagesObj->$key->page_key) ?>"><?= $customPagesObj->$key->page_title  ?></a></li>
                        <?php
                            }
                        }
                        ?>
                        <li><a href="<?= baseurl('webshop/contact_us') ?>">Contact Us</a></li>
                        <!-- <li><a href="#">Returns</a></li>
                        <li><a href="#">Shipping Info</a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Specials</a></li>
                        <li><a href="#">Guarantee</a></li> -->
                    </ul>
                </div>

                <div class="col-xs-6 col-sm-3 col-md-2 column">
                    <h5>Your Account</h5>
                    <ul>
                        <li ><a class="underline" href="<?= $this->session->webshop->is_login == "true" ? base_url('webshop/your_account') : base_url('webshop/login') ?>">Manage Account</a></li>
                        <!-- <li><a href="#">Order Status</a></li> -->
                    </ul>
                </div>
                <!-- <div class="col-xs-6 col-sm-3 col-md-2 column sharing-links">
                <h5>Connect with Us</h5>
                <a href="#" class="fb"><i class="fa fa-facebook"></i> Follow Us</a><br>
                <a href="#" class="tw"><i class="fa fa-twitter"></i> Follow Us</a>
            </div> -->

                <div class="clearfix visible-sm-block"></div>


            </div><!--/row-->

            <div class="fine-print">
                <p>*These statements have not been evaluated by the Food and Drug Administration. These products are not intended to diagnose, treat, cure, or prevent any disease.</p>
                <p>The information and products shown on this website should not be interpreted as a substitute for physician evaluation or treatment. Users are advised to seek the advice of their physician or other qualified health care provider with any questions you may have regarding a medical condition. ©2025 Herbinn Micro Medicines. All rights reserved.</p>
            </div>
        </div><!--/container-->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>