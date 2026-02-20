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
    <meta name="google-site-verification" content="vaKLz762nEBRW-9yZ1dHDuoBm2UAQNH15mSfjY6C9r0" />

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
    background-color:#fa8507 !important;
}
.is-invalid {
    border-color: red !important;
  }

  #fp-btn-res{
    cursor: pointer;
    color: #fa8507 ;
    text-decoration : underline;
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
                <h1 class="breadcumb-title sec-title1 text-white my-0">Sign In</h1>
                <ul class="breadcumb-menu-style1 bg-white">
                    <li><a href="<?= base_url('webshop') ?>"><i class="fal fa-home text-theme"></i>Home</a></li>
                    <li class="active">Sign In</li>
                </ul>
            </div>
        </div>
    </div>
        <div class="login-wrapper py-60 py-lg-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php
                    $hidden = ['return_page' => ($return_page ? $return_page : 'webshop/index')];
                    $attributes = array('name' => 'loginform', 'method' => 'post', 'class' => 'woocomerce-form woocommerce-form-login login bg-smoke px-40 py-40');
                    echo form_open('webshop/login', $attributes, $hidden);
                ?>
                <h2 class="form-title text-center mb-35">Sign in</h2>
                 <!-- <div class="form-group">
                            <label for="signUpUserName" class="sr-only">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name*" id="signUpUserName" name="first" required="">
                            <small id="firstNameError" class="text-danger d-none">Only alphabets are allowed.</small>
                        </div>
                        <div class="form-group">
                            <label for="signUpUserName" class="sr-only">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name*" id="signUpUserName" name="last" required="">
                            <small id="lastNameError" class="text-danger d-none">Only alphabets are allowed.</small>
                        </div>                       
                <div class="form-group">
                    <label for="webshop_username" class="sr-only"> email address</label>
                    <input type="text" class="form-control" placeholder=" email address" id="webshop_username" name="webshop_username" >
                </div> -->
                <div class="form-group">
                        <label for="signUpUserPhone" class="sr-only">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Mobile number(Without Country Code) *" id="signUpUserPhone" name="phone" required pattern="\d+" value="" >
                        <small id="billing_phone_error" style="color: red; display: none;"></small>
                       <!-- <small id="phone" style="color: red;" class ="<?= empty($phone_error) ? 'd-none' : '' ?>">
                            <?= isset($login_error) ? $login_error : '' ?>
                        </small> -->
                </div>
                <div class="form-group position-relative">
                    <label for="webshop_password" class="sr-only">Password*</label>
                    <input type="password" class="form-control pr-5" placeholder="Password*" id="webshop_password" name="webshop_password" required="" value="">

                    <!-- Eye icon for show/hide -->
                    <span toggle="#webshop_password" class="fa fa-fw fa-eye field-icon toggle-password" style="
                        position: absolute;
                        top: 50%;
                        right: 10px;
                        transform: translateY(-50%);
                        cursor: pointer;
                        z-index: 2;
                    "></span>
                    <small id="phone" class="text-danger <?= empty($phone_error) ? 'd-none' : '' ?>">
                        <?= !empty($phone_error) ? $phone_error : '' ?>
                 </small>
                </div>
                <div class="form-group">
                    <input type="checkbox" class="woocommerce-Button button" value="Login" name="submit_login" id="rememberme">
                    <label for="rememberme" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me
                    </label>
                    <div><a id="fp-btn-res"> Forgot password ? </a></div>
                </div>
                <div class="form-group mb-0 text-center">
                    <button class="vs-btn mask-style1 w-100 rounded-0 bg-white woocommerce-Button button" type="submit" name="submit_login" value="Login">Login</button>
                    <!-- <div class="bottom-links link-inherit d-md-flex justify-content-between mt-3">
                        <a href="<?= base_url("webshop/forgot_password") ?>" class="recovery-link mb-2 mb-md-0 woocommerce-LostPassword lost_password">Forgot your password?</a>
                    </div> -->
                </div>
                <?php echo form_close(); ?>
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

    <!-- <?php  include_once('forgot_password_modal.php')  ?> -->

    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var baseUrl = "<?= base_url('webshop/') ?>";
    </script>
    <style>
    .py-lg-150 {
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }
    :root {
    --body-color: #B0B0B0;
    }
    </style>
    <script>
  ////////////////////Password invisible/visible///////////////////      
  document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('fp-btn-res').addEventListener('click', (event) => {
        event.preventDefault();    
        var myModalNew = new bootstrap.Modal(document.getElementById('signinModalNew'));
        myModalNew.show();         
        onLoadModal();
    })
    
    document.getElementById('signUpUserPhone').addEventListener('input', function() {
        const phone = this.value.trim();
        const errorMsg = document.getElementById('billing_phone_error');
        const isValid = /^[1-9][0-9]*$/.test(phone);

        if (phone === '' || isValid) {
            errorMsg.style.display = 'none';
        } else {
            errorMsg.textContent = 'Phone number must only contain digits and should not start with 0.';
            errorMsg.style.display = 'block';
        }
    });
    document.getElementById('signUpUserPhone').addEventListener('input', function() {
        var phone = this.value.trim(); 
        const dataToSend = {
            phone: phone,
        };
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
        dataToSend[csrfName] = csrfHash;
        $.ajax({
            url: '<?php echo base_url('webshop/clear_phone_error'); ?>',
            type: 'POST',
            data: dataToSend,
            success: function(response) {
                try {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('#phone').addClass('d-none').text('');
                    }
                    else{
                    $('#phone').addClass('d-none').text('');
                    }
                } catch (e) {
                    console.error('Invalid JSON:', response);
                }
            },
            error: function(xhr, status, error) {
                alert('Request failed: ' + error);
            }
        });
    });
    const phoneInput = document.getElementById('signUpUserPhone');
    phoneInput.addEventListener('keypress', function (e) {
        if (!/\d/.test(e.key)) {
            e.preventDefault();
            return;
        }
        const cleaned = this.value.replace(/\D/g, '').replace(/^0+/, '');
        if (cleaned.length >= 10) {
            e.preventDefault();
        }
    });
    document.querySelectorAll('.toggle-password').forEach(function (icon) {
      icon.addEventListener('click', function () {
        const input = document.querySelector(this.getAttribute('toggle'));
        const isPassword = input.getAttribute('type') === 'password';
        input.setAttribute('type', isPassword ? 'text' : 'password');
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    });
  });
  //////////////////First and last Name validate///////////////////
    const firstInput = document.querySelector('input[name="first"]');
    const lastInput = document.querySelector('input[name="last"]');
    const firstNameError = document.getElementById('firstNameError');
    const lastNameError = document.getElementById('lastNameError');

    function validateAlphaOnly(input, errorEl) {
        input.addEventListener('input', function () {
        const original = this.value;
        this.value = original.replace(/[^a-zA-Z\s]/g, '');

        const isInvalid = original !== this.value || this.value.trim() === '';

        if (isInvalid) {
            this.classList.add('is-invalid');
            errorEl.classList.remove('d-none');
        } else {
            this.classList.remove('is-invalid');
            errorEl.classList.add('d-none');
        }
        });
    }

    validateAlphaOnly(firstInput, firstNameError);
    validateAlphaOnly(lastInput, lastNameError);
  /////////////////////Mobile Number Validation//////////////////////
    const phoneInput = document.querySelector('input[name="phone"]');
    const phoneError = document.getElementById('phoneError');

    phoneInput.addEventListener('input', function () {
        const original = this.value;

        // Remove all non-digit characters
        let cleaned = original.replace(/\D/g, '');

        // Remove leading 0s
        if (cleaned.startsWith('0')) {
            cleaned = cleaned.replace(/^0+/, '');
        }

        // Limit to 10 digits
        if (cleaned.length > 10) {
            cleaned = cleaned.slice(0, 10);
        }

        this.value = cleaned;

        // Validation: Only show error if it's not 10 digits (but not empty)
        if (this.value !== '' && this.value.length !== 10) {
            this.classList.add('is-invalid');
            phoneError.classList.remove('d-none');
        } else {
            this.classList.remove('is-invalid');
            phoneError.classList.add('d-none');
        }
    });
    /////////////////////////Password Validation////////////////////////
    document.getElementById('webshop_password').addEventListener('input', function () {
    const password = this.value;
    const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/;

    if (!pattern.test(password)) {
        this.setCustomValidity("Password must be at least 8 characters, include uppercase, lowercase, number, and special character.");
    } else {
        this.setCustomValidity("");
    }
});
    /////////////////////Email Id Validation///////////////////////
     const emailUsernameInput = document.getElementById('webshop_username');
     emailUsernameInput.addEventListener('blur', function () {
     const value = this.value.trim();

           // Standard email pattern (supports uppercase)
     const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

          // Optional field — allow empty
          if (value === '') {
                this.setCustomValidity('');
                this.classList.remove('is-invalid');
                return;
          }

            // // Invalid email format
            // if (!emailPattern.test(value)) {
            //     this.setCustomValidity('Please enter a valid email address.');
            //     this.classList.add('is-invalid');
            // } else {
            //     this.setCustomValidity('');
            //     this.classList.remove('is-invalid');
            // }
        });

     emailUsernameInput.addEventListener('input', function () {
         this.setCustomValidity('');
         this.classList.remove('is-invalid');
        });
  ///////////////////////////////////submit_login//////////////////////////////////////////  
document.querySelector('button[name="submit_login"]').addEventListener('click', function(e) {
    const form = this.closest('form');
    let isFormValid = true;
    let firstInvalidField = null;

    // Clear previous error messages
    form.querySelectorAll('.field-error').forEach(el => el.remove());

    // Loop through all inputs, selects, and textareas
    const inputs = form.querySelectorAll('input, select, textarea');

    inputs.forEach(input => {
        const name = input.getAttribute('name');

        if (name !== 'email' && input.hasAttribute('required')) {
            if (!input.value.trim()) {
                isFormValid = false;

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

            // Live removal of error when user types
            input.addEventListener('input', function () {
                if (this.value.trim() !== '') {
                    this.style.border = '';
                    const nextError = this.parentNode.querySelector('.field-error');
                    if (nextError) nextError.remove();
                }
            });
        }
    });

    if (!isFormValid) {
        e.preventDefault();
        if (firstInvalidField) firstInvalidField.focus();
    }
});
// $(document).ready(function () {
//     $('#signUpUserPhone').on('input', function () {
//         alert("hhhhhhh");
//         var phone = $(this).val().trim();
//          const dataToSend = {
//             phone: phone,
//         };
//         var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
//         var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
//         dataToSend[csrfName] = csrfHash;
//         $.ajax({
//               url: '<?= base_url('webshop/clear_phone_error') ?>',
//               type: 'POST',
//               data: dataToSend,
//               success: function(response) {
//                   var res = JSON.parse(response);
//                   console.log(res.status);
//                   if (res.status === 'success') {
//                      $('#phone').addClass('d-none').text('');
//                   } 
//               },
//               error: function(xhr, status, error) {
//                   alert('Request failed');
//               }
//           });
//     });
// });

</script>

</body>

</html>