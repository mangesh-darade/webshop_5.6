<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Meenatshi Chettinadu Restaurant - About Us Two</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Meenatshi Chettinadu Restaurant">
    <meta name="keywords" content="Meenatshi Chettinadu Restaurant" />
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="google-site-verification" content="vaKLz762nEBRW-9yZ1dHDuoBm2UAQNH15mSfjY6C9r0" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--==============================
	   Google Web Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Cookie&family=Roboto:wght@300;400;500;700&family=Rufina:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$assets?>restaurant/img/favicons/favicon-32x32.png">
    <!-- <link rel="icon" type="image/png" sizes="96x96" href="<?=$assets?>restaurant/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$assets?>restaurant/img/favicons/favicon-16x16.png"> -->
    <link rel="manifest" href="<?=$assets?>restaurant/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?=$assets?>restaurant/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/bootstrap.min.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/flaticon.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/fontawesome.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/jquery.datetimepicker.min.css">
    <!-- Layer Slider -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/magnific-popup.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/nice-select.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/style.css">
    <!-- Theme Color CSS -->
    <link rel="stylesheet" href="<?=$assets?>restaurant/css/theme-color1.css">
    <link rel="stylesheet" id="themeColor" href="#">
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/common.css">

</head>

<body>

<style>
    :root {
    --body-color: black; 
}
button.vs-btn.mask-style1.w-100.rounded-0.bg-white {
    background-color: orange !important;
}
.is-invalid {
    border-color: red !important;
  }
.py-lg-150 {
    padding-top: 50px !important;
    padding-bottom: 50px !important;
}
</style>
    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   		Code Start From Here 
	******************************** -->
    <?php           
        include_once('header.php');       
    ?>
    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 background-image link-inherit  mb-30"
        data-vs-img="<?= !empty($setting_map['banner_image']) ? $uploads . $setting_map['banner_image'] : $uploads . 'webshop/default_banner.png' ?>" data-overlay="black" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content text-center pt-65 pt-lg-140 pb-95 pb-lg-175">
                <h1 class="breadcumb-title sec-title1 text-white my-0">Sign Up</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Sign Up</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="signup-wrapper py-60 py-lg-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <?php
                        $attributes = array(
                            'name' => 'register',
                            'method' => 'post',
                            'class' => 'signup-form bg-smoke px-40 py-40'
                        );
                        echo form_open('webshop/register', $attributes);
                    ?>
                        <h2 class="form-title text-center mb-lg-35">Create an account</h2>

                        <div class="form-group">
                            <label for="signUpUserName" class="sr-only">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name*" id="signUpUserName" name="first" required>
                             <small id="firstNameError" class="text-danger d-none">Only alphabets are allowed.</small>
                        </div>
                        <div class="form-group">
                            <label for="signUpUserName" class="sr-only">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name*" id="signUpUserName" name="last" required>
                            <small id="lastNameError" class="text-danger d-none">Only alphabets are allowed.</small>
                        </div>
                        <div class="form-group">
                            <label for="signUpUserEmail" class="sr-only">Email address</label>
                            <input type="email" class="form-control" placeholder="Email address" id="signUpUserEmail" name="email" >
                        </div>
                        <div class="form-group">
                            <label for="signUpUserPhone" class="sr-only">Mobile Number</label>
                            <div class="row" style="margin-right: 0; margin-left: 0;">
                                <div class="col-xs-4 Dropdown-set" style="padding-right: 5px;">
                                    <select class="country_code form-control" id="country_code" name="country_code"
                                        style="border: 1px solid rgba(0, 0, 0, 0.1); font-size: small;">
                                        <?php
                                        if (is_array($country)) {
                                            foreach ($country as $countrycode) {
                                                $value = $countrycode->code . '~' . $countrycode->name;
                                                $selected = '';
                                                if ((isset($postdata['country']) && $postdata['country'] == $value) ||
                                                    (!isset($postdata['country']) && $countrycode->code == '+971')) {
                                                    $selected = 'selected';
                                                }
                                                // if($countrycode->code == '+91'){
                                                //     continue;
                                                // }
                                                echo '<option value="' . $value . '" ' . $selected . ' data-fulltext="' . $countrycode->name . ' (' . $countrycode->code . ')">' . $countrycode->name . ' (' . $countrycode->code . ')</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-8" style="padding-left: 0px; width: 109px !imporatnt;">
                                    <input type="text" class="form-control drop-country" placeholder="Mobile Number*" id="signUpUserPhone" name="phone" required value="<?= set_value('phone') ?>">
                                </div>
                            </div>
                            <small id="mobileError" class="text-danger d-none"></small>
                        </div>
                        <?php if ($this->session->flashdata('toast_error')): ?>
                        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055">
                        <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                            <div class="toast-body">
                                <?= $this->session->flashdata('toast_error'); ?>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                        </div>
                        <?php endif; ?>

                       <div class="form-group position-relative">
                        <label for="signUpUserPass" class="sr-only">Password</label>
                        <input type="password" class="form-control pr-5" placeholder="Password*" id="signUpUserPass" name="passwd" required>
                        
                        <!-- Eye toggle button -->
                        <span toggle="#signUpUserPass" class="fa fa-fw fa-eye field-icon toggle-password" style="
                            position: absolute;
                            top: 50%;
                            right: 10px;
                            transform: translateY(-50%);
                            cursor: pointer;
                            z-index: 2;
                        "></span>
                        </div>
                      <div class="form-group">
                            <div style="margin-bottom: 20px;">
                                <a href="#" data-toggle="modal" data-target="#termsModal" style="color: orange; text-decoration: underline;">
                                    Terms and Conditions
                                </a>
                            </div>
                            <input type="checkbox" name="signUpTerms" id="signUpTerms" required>
                            <label for="signUpTerms">
                                I have read and agree to the website terms and conditions
                            </label>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="vs-btn w-100 mb-0 mask-style1 rounded-0 bg-white" type="submit" name="submit_register" value="Register">Register</button>
                            <div class="bottom-links link-inherit pt-3">
                                <span>Already have an account? <a class="text-theme" href='<?= base_url('webshop/login') ?>'>Sign in</a></span>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="termsModalLabel">Terms and Conditions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use:</p>
                <ul>
                <li>You must be at least 18 years of age to register and use our services.</li>
                <li>All content on this website is for general information and use only. It is subject to change without notice.</li>
                <li>You are responsible for maintaining the confidentiality of your login credentials.</li>
                <li>Unauthorized use of this website may give rise to a claim for damages and/or be a criminal offense.</li>
                <li>Your use of any information or materials on this website is entirely at your own risk.</li>
                <li>All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.</li>
                </ul>
                <p>By checking the box and continuing, you acknowledge that you have read and understood these terms.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"style="font-size: 1rem; color: #fff; background: orange; border: none; outline: none; box-shadow: none; 
                transition: color 0.3s ease;">Close</button>
            </div>
            </div>
        </div>
    </div>
    <!--==============================
			Footer Area
	==============================-->
    <?php           
        include_once('footer.php');       
    ?>
    <!--********************************
					Code End  Here 
	******************************** -->

    <!--==============================
    Sidemenu
============================== -->
    <!-- header cart -->
    <?php  include_once('header_cart.php')  ?>
    <!--  -->
    <!-- Scroll Top Top Button -->
    <!-- <a href="#" class="scrollToTop icon-btn bg-theme border-before-theme"><i class="far fa-angle-up"></i></a> -->


    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="<?=$assets?>restaurant/js/vendor/jquery.min.js"></script>
    <script src="<?=$assets?>restaurant/js/vendor/jquery-migrate-3.0.0.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="assets/js/app.min.js"></script> -->
    <script src="<?=$assets?>restaurant/js/slick.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=$assets?>restaurant/js/bootstrap.min.js"></script>
    <!-- Layer Slider -->
    <script src="<?=$assets?>restaurant/js/greensock.min.js"></script>
    <script src="<?=$assets?>restaurant/js/layerslider.kreaturamedia.jquery.js"></script>
    <script src="<?=$assets?>restaurant/js/layerslider.transitions.js"></script>
    <!-- Counter js -->
    <script src="<?=$assets?>restaurant/js/jquery.counterup.min.js"></script>
    <script src="<?=$assets?>restaurant/js/waypoints.min.js"></script>
    <!-- Date Picker -->
    <script src="<?=$assets?>restaurant/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="<?=$assets?>restaurant/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select -->
    <script src="<?=$assets?>restaurant/js/jquery.nice-select.min.js"></script>
    <!-- Custom Carousel -->
    <script src="<?=$assets?>restaurant/js/vscustom-carousel.min.js"></script>
    <!-- Mobile Menu -->
    <script src="<?=$assets?>restaurant/js/vsmenu.min.js"></script>
    <!-- Form Js -->
    <script src="<?=$assets?>restaurant/js/ajax-mail.js"></script>
    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ "></script>
    <!-- Image Loaded -->
    <script src="<?=$assets?>restaurant/js/imagesloaded.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="<?=$assets?>restaurant/js/main.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/about_us.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header.js"></script>
    <script defer type="text/javascript" src="<?= $assets ?>restaurant/js/header_cart.js"></script>
    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
    </script>
    <script>
    // Build a JS object with country code as key and required digits as value
    const phoneRules = {
        <?php
        if (is_array($country)) {
            foreach ($country as $c) {
                echo "'{$c->code}': {$c->phone_digits},";
            }
        }
        ?>
    };
</script>

    <script>
    ///////////////////Visible/Invisible Password/////////////////////////    
    document.querySelector('.toggle-password').addEventListener('click', function () {
    const input = document.querySelector(this.getAttribute('toggle'));
    const isPassword = input.getAttribute('type') === 'password';
    input.setAttribute('type', isPassword ? 'text' : 'password');
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
    });
    function viewPassword() {
        var passwordField = $("#signUpUserPass");
        var togglePasswordImg = $("#togglePassword");
        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
        } else {
            passwordField.attr("type", "password");
            togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
        }
    }
    //////////////////Mobile Validation/////////////////////////////////
        // const phoneInput = document.getElementById('signUpUserPhone');
        // const phoneError = document.getElementById('mobileError');

        // // Prevent typing more than 10 digits
        // phoneInput.addEventListener('keypress', function (e) {
        //     // Allow only digits
        //     if (!/\d/.test(e.key)) {
        //         e.preventDefault();
        //         return;
        //     }

        //     // Prevent entering more than 10 digits
        //     const cleaned = this.value.replace(/\D/g, '').replace(/^0+/, '');
        //     if (cleaned.length >= 10) {
        //         e.preventDefault();
        //     }
        // });

        // phoneInput.addEventListener('input', function () {
        //     const original = this.value;

        //     // Clean input: digits only, no leading 0s
        //     let cleaned = original.replace(/\D/g, '').replace(/^0+/, '');

        //     // Trim to 10 digits max
        //     if (cleaned.length > 10) {
        //         cleaned = cleaned.slice(0, 10);
        //     }

        //     this.value = cleaned;

        //     // Only validate if user has typed something
        //     if (cleaned.length === 0) {
        //         this.setCustomValidity('');
        //         this.classList.remove('is-invalid');
        //         phoneError.classList.add('d-none');
        //         return;
        //     }

        //     // Validation: must be exactly 10 digits
        //     if (cleaned.length !== 10) {
        //         this.setCustomValidity('Mobile number must be exactly 10 digits.');
        //         this.classList.add('is-invalid');
        //         phoneError.classList.remove('d-none');
        //         phoneError.textContent = 'Mobile number must be exactly 10 digits.';
        //     } else {
        //         this.setCustomValidity('');
        //         this.classList.remove('is-invalid');
        //         phoneError.classList.add('d-none');
        //     }
        // });

        // // Prevent browser from showing message on focus
        // phoneInput.addEventListener('focus', function () {
        //     this.setCustomValidity('');
        //     this.classList.remove('is-invalid');
        //     phoneError.classList.add('d-none');
        // });

        /////////////////// Mobile Validation (Dynamic by Country Code) //////////////////
        const phoneInput = document.getElementById('signUpUserPhone');
        const phoneError = document.getElementById('mobileError');
        const countryCodeSelect = document.getElementById('country_code');

        function validatePhone() {
            let phone = phoneInput.value.replace(/\D/g, '').replace(/^0+/, '');
            let selectedCode = countryCodeSelect.value.split('~')[0];
            let requiredLength = phoneRules[selectedCode] || 10; // default 10 if country not in list

            // Trim to max allowed digits
            if (phone.length > requiredLength) {
                phone = phone.slice(0, requiredLength);
            }
            phoneInput.value = phone;
            if (phone.length === 0) {
                phoneError.classList.add('d-none');
                phoneInput.classList.remove('is-invalid');
                return true;
            }
            if (phone.length !== requiredLength) {
                phoneError.textContent = `Mobile number must be exactly ${requiredLength} digits.`;
                phoneError.classList.remove('d-none');
                phoneInput.classList.add('is-invalid');
                return false;
            } else {
                phoneError.classList.add('d-none');
                phoneInput.classList.remove('is-invalid');
                return true;
            }
        }
        // Bind events
        phoneInput.addEventListener('input', validatePhone);
        countryCodeSelect.addEventListener('change', validatePhone);
  ////////////////////First and Last Name Validation ///////////////
        const firstNameInput = document.querySelector('input[name="first"]');
        const lastNameInput = document.querySelector('input[name="last"]');
        const firstNameError = document.getElementById('firstNameError');
        const lastNameError = document.getElementById('lastNameError');

        function applyNameValidation(input, errorEl) {
        input.addEventListener('input', function () {
            const original = this.value;
            const filtered = original.replace(/[^a-zA-Z\s]/g, '');
            this.value = filtered;

            // Show red border and error message only if invalid characters were attempted
            if (original !== filtered && original !== '') {
            this.classList.add('is-invalid');
            errorEl.classList.remove('d-none');
            } else {
            this.classList.remove('is-invalid');
            errorEl.classList.add('d-none');
            }
        });
        }

        applyNameValidation(firstNameInput, firstNameError);
        applyNameValidation(lastNameInput, lastNameError);
        /////////////////////////Password Validation////////////////////////
        document.getElementById('signUpUserPass').addEventListener('input', function () {
            const password = this.value;
            const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/;
            
            if (!pattern.test(password)) {
                this.setCustomValidity("Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.");
                document.querySelector('.toggle-password').style.top = "45%";                
            } else {
                this.setCustomValidity("");
            }
        });
        /////////////////////Email Id Validation///////////////////////
          const emailInput = document.getElementById('signUpUserEmail');
            emailInput.addEventListener('blur', function () {
            const value = this.value.trim();
            const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;

            if (value === '') {
                this.setCustomValidity('');
                this.classList.remove('is-invalid');
                return;
            }

            if (!pattern.test(value)) {
                this.setCustomValidity('Invalid email');
                this.classList.add('is-invalid');
            } else {
                this.setCustomValidity('');
                this.classList.remove('is-invalid');
            }
        });

        emailInput.addEventListener('input', function () {
            this.classList.remove('is-invalid');
            this.setCustomValidity('');
        });
        

        document.querySelector('form').addEventListener('submit', function(e) {
    const termsCheckbox = document.getElementById('signUpTerms');
    const errorMsg = document.getElementById('termsError');

    if (!termsCheckbox.checked) {
        e.preventDefault(); // Stop form submission
        errorMsg.style.display = 'block';
    } else {
        errorMsg.style.display = 'none';
    }
});
///////////////////////////Term and condition checkbox///////////////////////////
document.querySelector('button[name="submit_register"]').addEventListener('click', function(e) {
    const form = this.closest('form');
    const checkbox = document.getElementById('signUpTerms');
    const existingTermsError = document.getElementById('termsError');
    let isFormValid = true;
    let firstInvalidField = null;

    let selectedCode = countryCodeSelect.value.split('~')[0];
    let requiredLength = phoneRules[selectedCode] || 10;
    if (!validatePhone()) {
        phoneError.textContent = `Mobile number must be exactly ${requiredLength} digits.`;
        phoneError.classList.remove('d-none');
        phoneInput.classList.add('is-invalid');
    } else {
        phoneError.classList.add('d-none');
        phoneInput.classList.remove('is-invalid');
    }


    // Clear all previous error messages
    form.querySelectorAll('.field-error').forEach(el => el.remove());

    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        const name = input.getAttribute('name');

        // Skip terms and email
        if ((name !== 'signUpTerms' &&  input.hasAttribute('required') || (name == 'email' && input.value))) {
            if (!input.value.trim()) {
                isFormValid = false;

                if (name == 'passwd') {
                    document.querySelector('.toggle-password').style.top = "30%";
                }
                input.style.border = '1px solid red';

                const error = document.createElement('div');
                error.className = 'field-error';
                error.style.color = 'red';
                error.style.fontSize = '13px';
                error.style.marginTop = '5px';
                error.textContent = 'This field is required.';

                input.parentNode.appendChild(error);

                if (!firstInvalidField) {
                    firstInvalidField = input;
                }
            } else {
                input.style.border = '';
            }

            // Live error removal
            input.addEventListener('input', function () {
                if (this.value.trim() !== '') {
                    this.style.border = '';
                    const nextError = this.parentNode.querySelector('.field-error');
                    if (nextError) nextError.remove();
                }
            });
        }
    });

    // Terms checkbox validation
    if (!checkbox.checked) {
        isFormValid = false;

        if (!existingTermsError) {
            const errorDiv = document.createElement('div');
            errorDiv.id = 'termsError';
            errorDiv.style.color = 'red';
            errorDiv.style.fontSize = '13px';
            errorDiv.style.marginTop = '5px';
            errorDiv.textContent = 'Please accept the Terms and Conditions.';
            checkbox.parentNode.appendChild(errorDiv);
        }
    } else if (existingTermsError) {
        existingTermsError.remove();
    }

    if (!isFormValid) {
        e.preventDefault();
        if (firstInvalidField) {
            firstInvalidField.focus();
        }
    }
});

// Remove Terms error on checkbox change
document.getElementById('signUpTerms').addEventListener('change', function () {
    const errorMsg = document.getElementById('termsError');
    if (this.checked && errorMsg) {
        errorMsg.remove();
    }
});
</script>
<script>
    function initCountryCodeBehavior() {
        const selects = document.querySelectorAll('.country_code');

        selects.forEach(select => {
            if (!select) {
                console.warn("Select element not found.");
                return;
            }

            // Store the full country text as a data attribute
            for (let i = 0; i < select.options.length; i++) {
                const option = select.options[i];
                option.setAttribute('data-fulltext', option.text);
            }

            function updateSelectedDisplay() {
                const selectedOption = select.options[select.selectedIndex];
                const countryCode = selectedOption.value.split('~')[0];
                selectedOption.textContent = countryCode;

                for (let i = 0; i < select.options.length; i++) {
                    const option = select.options[i];
                    if (option !== selectedOption) {
                        option.textContent = option.getAttribute('data-fulltext');
                    }
                }
            }

            updateSelectedDisplay();
            select.addEventListener('change', updateSelectedDisplay);
        });
    }

    document.addEventListener('DOMContentLoaded', initCountryCodeBehavior);
</script>

<?php if ($this->session->flashdata('toast_error')): ?>
<script>
    toastr.options = {
        "positionClass": "toast-top-center", 
        "closeButton": true,
        "progressBar": true,
        "timeOut": "5000"
    };
    toastr.error("<?= $this->session->flashdata('toast_error'); ?>");
</script>
<?php endif; ?>

</body>

</html>