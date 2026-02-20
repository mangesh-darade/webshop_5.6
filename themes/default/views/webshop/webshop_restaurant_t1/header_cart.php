<?php
$subtotal = 0;
if (isset($cart_items) && is_array($cart_items) && count($cart_items)) {
?>
    <div class="sidemenu-wrapper d-none d-lg-block  ">
        <div class="sidemenu-content">
            <button class="closeButton border-theme text-theme bg-theme-hover sideMenuCls"><i
                    class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget" id="cart_list">
                        <?php
                        foreach ($cart_items as $itemKey => $item) {

                            if (isset($cart_data['variant_images']) && $cart_data['variant_images'][$itemKey]) {
                                $item_image = $cart_data['variant_images'][$itemKey];
                            } else {
                                $item_image = $cart_data['products'][$item['product_id']]['image'];
                            }

                            $product_name = $cart_data['products'][$item['product_id']]['name'];

                            $variant_name = ($item['variant_id']) ? ' ' . $cart_data['variants'][$item['variant_id']]['name'] : '';
                        ?>
                            <li class="woocommerce-mini-cart-item mini_cart_item">
                                <a href="#" class="remove remove_from_cart_button"
                                    onclick="remove_cart_item('<?= $itemKey ?>')"><i class="far fa-times"></i></a>
                                <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>"><img
                                        src="<?= $thumbs . $item_image ?>"
                                        alt="<?= $product_name . $variant_name ?>"><?= $product_name . $variant_name ?></a>
                                <span class="quantity"><?= (float) $item['quantity'] ?> Qty. ×
                                    <span class="">
                                        <span
                                            class="woocommerce-Price-currencySymbol"><?= $this->sma->formatMoney($item['product_price'], 2) ?>
                                            = </span>
                                    </span>
                                    <span
                                        class="woocommerce-Price-amount amount"><?= $this->sma->formatMoney((float) $item['quantity'] * (float) $item['product_price'], 2) ?></span>
                                </span>
                            </li>
                        <?php
                            $subtotal += ((float) $item['quantity'] * (float) $item['product_price']);
                        }
                        ?>
                    </ul>
                    <p class="woocommerce-mini-cart__total total">
                        <strong>Subtotal:</strong>
                        <span class="woocommerce-Price-amount amount">
                            <span
                                class="woocommerce-Price-currencySymbol"></span><?= $this->sma->formatMoney($subtotal, 2) ?></span>
                    </p>
                    <p class="woocommerce-mini-cart__buttons buttons">
                        <a href="<?= base_url('webshop/cart') ?>" class="vs-btn style1 wc-forward">View cart</a>
                        <a href="<?= base_url('webshop/checkout') ?>" class="vs-btn style1 checkout wc-forward">Checkout</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php
} else { ?>

    <div class="sidemenu-wrapper d-none d-lg-block  ">
        <div class="sidemenu-content">
            <button class="closeButton border-theme text-theme bg-theme-hover sideMenuCls"><i
                    class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <h2>Your cart is empty!</h2>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (!isset($this->session->webshop->user_id)) : ?>
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
    </style>
    <style>
        .mt-2,
        .my-2 {
            margin-top: -0.5rem !important;
        }
    </style>
    <!-- Modal HTML -->
    <div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 p-2" id="loginModalContent" style="height: 600px; overflow: hidden;">

                <div class="modal-header border-0 justify-content-center">
                    <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid"
                        style="height: 80px;">
                </div>

                <div class="modal-body mt-0">
                    <!-- <h5 class="mb-3">Sign in or continue to place your order</h5> -->
                    <h5 class="text-dark mb-1 headerstyle">Sign in or continue to place your order</h5>
                    <!-- Mobile input -->
                    <div class="mb-3 shadow p-3  rounded_custome bg-white">
                        <small class="form-text text-muted text-left mb-3"
                            style="margin-bottom: 0px!important;margin-top: -4px!important;">
                            Please enter the mobile number associated with your account.
                        </small>
                        <input type="text" id="mobileInput" class="form-control border border-dark"
                            placeholder="Mobile Number(Without Country Code)" autocomplete="off" value="">
                        <div id="createAccountPrompt" style="display: none;">
                            <div class="text-muted small mb-2 mt-3 signbold"
                                style="display: flex; justify-content: flex-start;">
                                Looks like you don't have an account — let's get you signed up!
                            </div>
                            <div style="display: flex; justify-content: flex-start;">
                                <a href="<?= base_url('webshop/register') ?>"
                                    class="text-decoration-none text-warning fw-semibold">
                                    Create account
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Password field (initially hidden) -->
                    <div class="mb-3 d-none shadow p-3 rounded_custome bg-white" id="passwordWrapper">
                        <small class="form-text text-muted text-left mb-3">
                            Please enter your password.
                        </small>

                        <div class="position-relative">
                            <input type="password" id="passwordInput" class="form-control border border-dark mb-3 pr-5"
                                placeholder="Enter password">

                            <!-- Eye icon -->
                            <img id="togglePassword" src="<?= base_url('assets/logs/HidePwdIcon.svg') ?>"
                                onclick="viewPassword();"
                                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                        </div>

                        <!-- Error message -->
                        <div class="text-danger small mb-2 d-none" id="loginError">Invalid Password</div>
                        <!-- Forgot password and Remember me -->
                        <div id="Forpassoption" class="d-none">
                            <div class="d-flex justify-content-between align-items-center mb-1" style="margin-top: 3px !important;">
                                <div style="margin-top: 1px !important;">
                                    <input type="checkbox" id="keepSignedIn" />
                                    <label for="keepSignedIn" class="text-muted small signbold"
                                        style="margin-left: -3px;">Keep me signed in</label>
                                </div>
                                <div style="margin-top: 1px !important;">
                                    <a href="#" id="forgotPasswordLink"
                                        class="text-warning small fw-semibold text-decoration-none Forgot pass">Forgot
                                        password?</a>
                                </div>
                            </div>
                        </div>
                        <!-- Login/Continue button -->
                        <button id="loginBtn" class="btn btn-warning w-100 fw-semibold" name="submit_login"
                            value="Login">Continue</button>
                    </div>


                    <hr class="my-4">

                    <div class="fw-semibold" style="margin-bottom: 2px; margin-left: 15px;">Don’t have an account?</div>
                    <div class="text-muted small" style="margin-top: -5px; margin-bottom: 3px; margin-left: 15px;">Your address won’t be saved
                        for future orders.</div>

                    <button onclick="window.location.href='<?= base_url('webshop/checkout?guest=1') ?>'"
                        class="btn btn-outline-warning w-100 fw-semibold" style="margin-left: 15px;">Continue as guest</button>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="<?= $assets ?>restaurant/css/header_cart.css">
    <!-- Bootstrap Resources (if not already included) -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- JS to trigger modal only if user not logged in -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".vs-btn.style1.checkout.wc-forward").forEach(function(btn) {
                btn.addEventListener("click", function(e) {
                    e.preventDefault(); // Prevent link navigation
                    window.otp = null;
                    window.checkedMobile = null;
                    $('#mobileInput').val('');
                    var myModal = new bootstrap.Modal(document.getElementById('signinModal'));
                    myModal.show();
                    onloadModalOld();
                });
            });

            document.querySelectorAll(".checkout-button-trigger").forEach(function(btn) {
                btn.addEventListener("click", function(e) {
                    e.preventDefault(); // Prevent link navigation
                    window.otp = null;
                    window.checkedMobile = null;
                    $('#mobileInput').val('');
                    var myModal = new bootstrap.Modal(document.getElementById('signinModal'));
                    myModal.show();
                    onloadModalOld();
                });
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function() {

            // Check mobile on blur
            $('#mobileInput').on('blur', function() {
                const mobile = $(this).val().trim();
                if (mobile.length === 10 || mobile.length == 9) {
                    console.log("foeerierei");
                    const dataToSend = {
                        mobile: mobile,
                    };
                    var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                    var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
                    dataToSend[csrfName] = csrfHash;
                    $.ajax({
                        url: '<?= base_url('webshop/check_mobile') ?>',
                        type: 'POST',
                        data: dataToSend,
                        success: function(response) {
                            var res = JSON.parse(response);
                            console.log(res.status);
                            if (res.status === 'success') {
                                window.checkedMobile = res.mobile;
                                $('#mobileInput').closest('.mb-3').addClass('d-none');
                                $('#passwordWrapper').removeClass('d-none');
                                $('#loginBtn').removeClass('d-none');
                                $('#createAccountPrompt').hide();
                                $('#Forpassoption').removeClass(
                                    'd-none'); // Show "forgot password" + "remember me"

                            } else {
                                $('#loginError').removeClass('d-none');
                                $('#passwordWrapper').addClass('d-none');
                                $('#loginBtn').addClass('d-none');
                                $('#mobileInput').closest('.mb-3').removeClass('d-none');
                                $('#createAccountPrompt').show();
                                $('#Forpassoption').addClass('d-none'); // Hide it if no account

                            }

                        },
                        error: function(xhr, status, error) {
                            alert('Request failed');
                        }
                    });
                }
            });

            // Attempt login
            $('#loginBtn').on('click', function() {
                const mobile = $('#mobileInput').val().trim();
                const password = $('#passwordInput').val().trim();
                const dataToSend = {
                    mobile: mobile,
                    password: password,
                };
                var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
                dataToSend[csrfName] = csrfHash;
                $.ajax({
                    url: '<?= base_url('webshop/ajax_login') ?>',
                    type: 'POST',
                    data: dataToSend,
                    success: function(response) {
                        var res = JSON.parse(response);
                        console.log(res.status);
                        if (res.status === 'success') {
                            window.location.href = res.redirect;
                        } else {
                            $('#loginError').removeClass('d-none');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Request failed');
                    }
                });

            });
        });
        const input = document.getElementById('mobileInput');
        const error = document.getElementById('mobileError');

        input.addEventListener('input', function() {
            // Remove non-digit characters
            this.value = this.value.replace(/\D/g, '');

            // Remove leading 0 instantly
            if (this.value.startsWith('0')) {
                this.value = this.value.replace(/^0+/, '');
            }

            // Limit to 10 digits max
            if (this.value.length > 10) {
                this.value = this.value.slice(0, 10);
            }

            if (this.value.length == 10 || this.value.length == 9) {
                this.classList.remove('is-invalid');
                error.classList.add('d-none');
            }else{
                this.classList.add('is-invalid');
                error.classList.remove('d-none');
            }

            // Error handling
            // if (this.value.length !== 10) {
            //     this.classList.add('is-invalid');
            //     error.classList.remove('d-none');
            // } else {
            //     this.classList.remove('is-invalid');
            //     error.classList.add('d-none');
            // }
        });
        // $(document).on('click', '.toggle-password', function() {
        //     var input = $($(this).attr("toggle"));
        //     var isPassword = input.attr("type") === "password";

        //     input.attr("type", isPassword ? "text" : "password");
        //     $(this).toggleClass("fa-eye fa-eye-slash");
        // });
        function viewPassword() {
            var passwordField = $("#passwordInput");
            var togglePasswordImg = $("#togglePassword");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }
    </script>
    <script>
        // function sendSMS() {
        //     $('#SuccessOTP').text('');
        //     $('#ErrOTP').text('');
        //     $('#OTP').val('');
        //     var MobileNo = window.checkedMobile;
        //     if (!MobileNo || MobileNo.trim() === '') {
        //         alert('Mobile No is required');
        //         return false;
        //     }
        //     $('#SuccessOTP').text(
        //         'OTP has been sent on your Mobile number for verification. If not getting OTP then click on send OTP');
        //     $.ajax({
        //         type: 'ajax',
        //         datatype: 'json',
        //         method: "GET",
        //         url: "<?php echo base_url(); ?>pos/send_otp",
        //         data: {
        //             MobileNo: MobileNo
        //         },
        //         success: function(response) {
        //             var res = $.parseJSON(response);
        //             callSendOTP(res.url);
        //             window.otp = res.OTP;
        //         },
        //     });
        // }
        // function callSendOTP(passurl) {
        //     $.ajax({
        //         type: 'ajax',
        //         datatype: 'json',
        //         method: 'get',
        //         url: passurl,
        //         async: false,
        //         success: function(result) {
        //             console.log('success');
        //         },
        //         error: function() {
        //             console.log('error');
        //         }
        //     });
        // }
        function sendSMS() {
            $('#SuccessOTP').text('');
            $('#ErrOTP').text('');
            $('#OTP').val('');

            var MobileNo = window.checkedMobile;

            if (!MobileNo || MobileNo.trim() === '') {
                alert('Mobile No is required');
                return false;
            }

            var autoToken = window.autoToken || 'default_token_here';

            $('#SuccessOTP').text(
                'OTP has been sent on your Mobile number for verification. If not getting OTP then click on send OTP'
            );

            // Prepare data to send
            var dataToSend = {
                MobileNo: MobileNo,
                token: autoToken
            };

            // Add CSRF token to data
            var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
            var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
            dataToSend[csrfName] = csrfHash;

            $.ajax({
                url: "<?php echo base_url(); ?>webshop/send_whatsapp_otp",
                method: "POST",
                dataType: "json",
                data: dataToSend,
                success: function(response) {
                    if (response.url) {
                        callSendOTP(response.url);
                        window.otp = response.OTP;
                        if (timer) clearInterval(timer);
                            timeLeft = 300;
                            otpExpired = false;
                            timer = setInterval(() => {
                                const minutes = Math.floor(timeLeft / 60);
                                const seconds = timeLeft % 60;
                                const timerDisplay = document.getElementById('otpTimer');
                                if (timerDisplay) {
                                    timerDisplay.textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                                }
                                timeLeft--;
                                if (timeLeft < 0) {
                                    clearInterval(timer);
                                    otpExpired = true;
                                    if (timerDisplay) {
                                        timerDisplay.textContent = 'Expired';
                                    }
                                }
                            }, 1000);
                    } else {
                        $('#ErrOTP').text('Failed to send OTP');
                    }
                },
                error: function() {
                    $('#ErrOTP').text('Error sending OTP request');
                }
            });
        }

        function callSendOTP(passurl) {
            $.ajax({
                url: passurl,
                method: "GET",
                dataType: "json",
                async: false,
                success: function(result) {
                    console.log('OTP sent via WhatsApp successfully:', result);
                },
                error: function() {
                    console.log('Error sending OTP via WhatsApp');
                }
            });
        }

        let timeLeft = 0;
        let otpExpired = false;
        let timer = null;
        document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
            e.preventDefault();
            const modalContent = document.getElementById('loginModalContent');
            if (modalContent) {
                modalContent.innerHTML = `
            <div class="modal-header border-0 justify-content-center">
                <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid" style="height: 80px;">
            </div>
            <div id="otpSection">
                <div class="modal-body">
                    <h5 class="text-dark text-center mb-1 headerstyle">Forgot your password?</h5>
                    <p class="text-muted small mb-3">No worries. We'll send a one time code to your registered mobile number.</p>
                    <button id="sendResetLinkBtn" class="btn w-100 fw-semibold" style="background-color:#fa8507; color: white;">Send OTP</button>
                    <span class="text-muted small">Remember it now? <a class="text-theme" style="color:#fa8507;" href="<?= base_url('webshop/login') ?>">Log in</a></span>
                </div>
                <div class="bottom-links link-inherit pt-0 pl-2 d-flex justify-content-start">
                </div>
            </div>`;
                document.getElementById('sendResetLinkBtn').addEventListener('click', function() {
                    sendSMS();
                    const last4Digits = window.checkedMobile.slice(-4);
                    const otpSection = document.getElementById('otpSection');
                    if (otpSection) {
                        otpSection.innerHTML = `
                        <div class="modal-body">
                            <h5 class="text-dark text-center mb-1 headerstyle">Check your phone</h5>
                            <p class="text-muted small mb-3 ">We've sent 6-digit code to your mobile number ending in **${last4Digits}. The code will expire in <span id="otpTimer">05:00</span></p>
                            <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
                                <input type="text" maxlength="1" class="otp-input mx-1">
                                <input type="text" maxlength="1" class="otp-input mx-1">
                                <input type="text" maxlength="1" class="otp-input mx-1">
                                <input type="text" maxlength="1" class="otp-input mx-1">
                                <input type="text" maxlength="1" class="otp-input mx-1">
                                <input type="text" maxlength="1" class="otp-input mx-1">
                            </div>
                            <div id="ErrOTP" class="text-danger small mb-2"></div>
                            <button id="Verify" class="btn w-100 fw-semibold" style="background-color:#fa8507; color:white;">Verify</button>
                            <span class="text-muted small mt-5 ">Didn't get it? <a class="text-theme mt-3" href="#" onclick="event.preventDefault(); sendSMS();">Resend OTP</a></span>
                        </div>`;
                        setTimeout(() => {
                            document.querySelectorAll('.otp-input').forEach((input, index, inputs) => {
                                input.addEventListener('input', () => {
                                    if (input.value.length === 1 && index < inputs.length - 1) {
                                        inputs[index + 1].focus();
                                    }
                                });
                            });
                        }, 0);
                        if (timer) clearInterval(timer);
                        timeLeft = 300;
                        otpExpired = false;
                        timer = setInterval(() => {
                            const minutes = Math.floor(timeLeft / 60);
                            const seconds = timeLeft % 60;
                            document.getElementById('otpTimer').textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                            timeLeft--;
                            if (timeLeft < 0) {
                                clearInterval(timer);
                                document.getElementById('otpTimer').textContent = 'Expired';
                            }
                        }, 1000);
                        document.getElementById('Verify').addEventListener('click', function() {
                            let enteredOtp = '';
                            document.querySelectorAll('.otp-input').forEach(input => {
                                enteredOtp += input.value;
                            });
                            if (otpExpired || timeLeft < 0) {
                                document.getElementById('ErrOTP').textContent = 'OTP has expired.';
                                return;
                            }
                            if (String(enteredOtp).trim() !== String(window.otp).trim()) {
                                document.getElementById('ErrOTP').textContent = 'Entered OTP is Wrong.';
                                return;
                            }
                            // OTP matched, show reset form
                            otpSection.innerHTML = `
                            <div class="modal-body">
                                <h5 class="text-dark text-center mb-3 headerstyle">Create a new password</h5>
                                <form id="resetForm" action="<?= base_url('webshop/forgot_password') ?>" method="post">
                                    <input type="hidden" name="mobile" value="${window.checkedMobile}" />
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                    <div class="mb-3 position-relative">
                                        <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control mb-2 border border-dark" required>
                                        <img id="togglePassword1" src="<?= base_url('assets/logs/ViewPwdIcon.svg') ?>" 
                                        onclick="viewPasswordnew();" 
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                                    </div>
                                    <div class="mb-3 position-relative">            
                                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control mb-2 border border-dark " required>
                                        <img id="togglePassword2" src="<?= base_url('assets/logs/ViewPwdIcon.svg') ?>" 
                                        onclick="viewPasswordconfirm();" 
                                        style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                                        <div id="password_error" class="text-danger small"></div>
                                    </div>
                                    <button type="submit" class="btn w-100 fw-semibold" style="background-color:#fa8507; color: white;" name="reset_password">Reset Password</button>
                                </form>
                            </div>`;
                            document.getElementById('resetForm').addEventListener('submit', function(e) {
                                e.preventDefault();
                                const newPassword = document.getElementById('new_password').value;
                                const confirmPassword = document.getElementById('confirm_password').value;
                                const mobile =  window.checkedMobile;
                                const errorDiv = document.getElementById('password_error');
                                if (newPassword !== confirmPassword) {
                                    errorDiv.textContent = 'Passwords do not match.';
                                    return;
                                }
                                const dataToSend = {
                                    mobile: mobile,
                                    password: newPassword, 
                                };
                                var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                                var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
                                dataToSend[csrfName] = csrfHash;
                                $.ajax({
                                    url: '<?= base_url('webshop/check_existing_password') ?>',
                                    type: 'POST',
                                    data: dataToSend,
                                    success: function(response) {
                                        try {
                                            var res = JSON.parse(response);
                                            if (res.exists) {
                                                errorDiv.textContent = 'This password has already been used.Please choose a different one.';
                                            } else {
                                                const input = document.createElement('input');
                                                input.type = 'hidden';
                                                input.name = 'reset_password';
                                                input.value = '1';
                                                document.getElementById('resetForm').appendChild(input);
                                                document.getElementById('resetForm').submit();
                                            }
                                        } catch (e) {
                                            console.error('Invalid JSON response:', response);
                                            errorDiv.textContent = 'Unexpected error occurred. Please try again.';
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        alert('Request failed: ' + error);
                                    }
                                });
                            });

                        });
                    }
                });
            }
        });

        function viewPasswordnew() {
            var passwordField = $("#new_password");
            var togglePasswordImg = $("#togglePassword1");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }

        function viewPasswordconfirm() {
            var passwordField = $("#confirm_password");
            var togglePasswordImg = $("#togglePassword2");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }
    </script> -->

    <script>
        function viewPasswordnew() {
            var passwordField = $("#new_password");
            var togglePasswordImg = $("#togglePassword1");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }

        function viewPasswordconfirm() {
            var passwordField = $("#confirm_password");
            var togglePasswordImg = $("#togglePassword2");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }

        function viewPassword() {
            var passwordField = $("#passwordInput");
            var togglePasswordImg = $("#togglePassword");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }
        
        function onloadModalOld() {
            const modalContentOnStartOld = document.getElementById('loginModalContent');
            if (modalContentOnStartOld) {
                modalContentOnStartOld.innerHTML = `
                    <div class="modal-header border-0 justify-content-center">
                        <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid"
                            style="height: 80px;">
                    </div>

                    <div class="modal-body mt-0">
                        <!-- <h5 class="mb-3">Sign in or continue to place your order</h5> -->
                        <h5 class="text-dark mb-1 headerstyle">Sign in or continue to place your order</h5>
                        <!-- Mobile input -->
                        <div class="mb-3 shadow p-3  rounded_custome bg-white">
                            <small class="form-text text-muted text-left mb-3"
                                style="margin-bottom: 0px!important;margin-top: -4px!important;">
                                Please enter the mobile number associated with your account.
                            </small>
                            <input type="text" id="mobileInput" class="form-control border border-dark"
                                placeholder="Mobile Number(Without Country Code)" autocomplete="off" value="">
                            <div id="createAccountPrompt" style="display: none;">
                                <div class="text-muted small mb-2 mt-3 signbold"
                                    style="display: flex; justify-content: flex-start;">
                                    Looks like you don't have an account — let's get you signed up!
                                </div>
                                <div style="display: flex; justify-content: flex-start;">
                                    <a href="<?= base_url('webshop/register') ?>"
                                        class="text-decoration-none text-warning fw-semibold">
                                        Create account
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Password field (initially hidden) -->
                        <div class="mb-3 d-none shadow p-3 rounded_custome bg-white" id="passwordWrapper">
                            <small class="form-text text-muted text-left mb-3">
                                Please enter your password.
                            </small>

                            <div class="position-relative">
                                <input type="password" id="passwordInput" class="form-control border border-dark mb-3 pr-5"
                                    placeholder="Enter password">

                                <!-- Eye icon -->
                                <img id="togglePassword" src="<?= base_url('assets/logs/HidePwdIcon.svg') ?>"
                                    onclick="viewPassword();"
                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                            </div>

                            <!-- Error message -->
                            <div class="text-danger small mb-2 d-none" id="loginError">Invalid Password</div>
                            <!-- Forgot password and Remember me -->
                            <div id="Forpassoption" class="d-none">
                                <div class="d-flex justify-content-between align-items-center mb-1" style="margin-top: 3px !important;">
                                    <div style="margin-top: 1px !important;">
                                        <input type="checkbox" id="keepSignedIn" />
                                        <label for="keepSignedIn" class="text-muted small signbold"
                                            style="margin-left: -3px;">Keep me signed in</label>
                                    </div>
                                    <div style="margin-top: 1px !important;">
                                        <a href="#" id="forgotPasswordLink"
                                            class="text-warning small fw-semibold text-decoration-none Forgot pass">Forgot
                                            password?</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Login/Continue button -->
                            <button id="loginBtn" class="btn btn-warning w-100 fw-semibold" name="submit_login"
                                value="Login">Continue</button>
                        </div>


                        <hr class="my-4">

                        <div class="fw-semibold" style="margin-bottom: 2px; margin-left: 15px;">Don’t have an account?</div>
                        <div class="text-muted small" style="margin-top: -5px; margin-bottom: 3px; margin-left: 15px;">Your address won’t be saved
                            for future orders.</div>

                        <button onclick="window.location.href='<?= base_url('webshop/checkout?guest=1') ?>'"
                            class="btn btn-outline-warning w-100 fw-semibold" style="margin-left: 15px;">Continue as guest</button>
                    </div>
                `;            
                addListenersOld();
            }
        }

        function addListenersOld () { 

            window.otp = null;
            window.checkedMobile = null;
            $('#mobileInput').val('');

            // $(document).ready(function() {
                // Check mobile on blur
                $('#mobileInput').on('blur', function() {
                    const mobile = $(this).val().trim();
                    if (mobile.length === 10 || mobile.length == 9) {
                        console.log("foeerierei");
                        const dataToSend = {
                            mobile: mobile,
                        };
                        var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                        var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
                        dataToSend[csrfName] = csrfHash;
                        $.ajax({
                            url: '<?= base_url('webshop/check_mobile') ?>',
                            type: 'POST',
                            data: dataToSend,
                            success: function(response) {
                                var res = JSON.parse(response);
                                console.log(res.status);
                                if (res.status === 'success') {
                                    window.checkedMobile = res.mobile;
                                    $('#mobileInput').closest('.mb-3').addClass('d-none');
                                    $('#passwordWrapper').removeClass('d-none');
                                    $('#loginBtn').removeClass('d-none');
                                    $('#createAccountPrompt').hide();
                                    $('#Forpassoption').removeClass(
                                        'd-none'); // Show "forgot password" + "remember me"

                                } else {
                                    $('#loginError').removeClass('d-none');
                                    $('#passwordWrapper').addClass('d-none');
                                    $('#loginBtn').addClass('d-none');
                                    $('#mobileInput').closest('.mb-3').removeClass('d-none');
                                    $('#createAccountPrompt').show();
                                    $('#Forpassoption').addClass('d-none'); // Hide it if no account

                                }

                            },
                            error: function(xhr, status, error) {
                                alert('Request failed');
                            }
                        });
                    }
                });

                // Attempt login
                $('#loginBtn').on('click', function() {
                    const mobile = $('#mobileInput').val().trim();
                    const password = $('#passwordInput').val().trim();
                    const dataToSend = {
                        mobile: mobile,
                        password: password,
                    };
                    var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                    var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
                    dataToSend[csrfName] = csrfHash;
                    $.ajax({
                        url: '<?= base_url('webshop/ajax_login') ?>',
                        type: 'POST',
                        data: dataToSend,
                        success: function(response) {
                            var res = JSON.parse(response);
                            console.log(res.status);
                            if (res.status === 'success') {
                                window.location.href = res.redirect;
                            } else {
                                $('#loginError').removeClass('d-none');
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Request failed');
                        }
                    });

                });
            // });

            const input = document.getElementById('mobileInput');
            const error = document.getElementById('mobileError');

            input.addEventListener('input', function() {
                // Remove non-digit characters
                this.value = this.value.replace(/\D/g, '');

                // Remove leading 0 instantly
                if (this.value.startsWith('0')) {
                    this.value = this.value.replace(/^0+/, '');
                }

                // Limit to 10 digits max
                if (this.value.length > 10) {
                    this.value = this.value.slice(0, 10);
                }

                if (this.value.length == 10 || this.value.length == 9) {
                    this.classList.remove('is-invalid');
                    // error.classList.add('d-none');
                }else{
                    this.classList.add('is-invalid');
                    // error.classList.remove('d-none');
                }

                // Error handling
                // if (this.value.length !== 10) {
                //     this.classList.add('is-invalid');
                //     error.classList.remove('d-none');
                // } else {
                //     this.classList.remove('is-invalid');
                //     error.classList.add('d-none');
                // }
            });
            // $(document).on('click', '.toggle-password', function() {
            //     var input = $($(this).attr("toggle"));
            //     var isPassword = input.attr("type") === "password";

            //     input.attr("type", isPassword ? "text" : "password");
            //     $(this).toggleClass("fa-eye fa-eye-slash");
            // });
            function viewPassword() {
                var passwordField = $("#passwordInput");
                var togglePasswordImg = $("#togglePassword");
                if (passwordField.attr("type") === "password") {
                    passwordField.attr("type", "text");
                    togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
                } else {
                    passwordField.attr("type", "password");
                    togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
                }
            }

            // ---------------------------------------------------------------------------------------

            // function sendSMS() {
            //     $('#SuccessOTP').text('');
            //     $('#ErrOTP').text('');
            //     $('#OTP').val('');
            //     var MobileNo = window.checkedMobile;
            //     if (!MobileNo || MobileNo.trim() === '') {
            //         alert('Mobile No is required');
            //         return false;
            //     }
            //     $('#SuccessOTP').text(
            //         'OTP has been sent on your Mobile number for verification. If not getting OTP then click on send OTP');
            //     $.ajax({
            //         type: 'ajax',
            //         datatype: 'json',
            //         method: "GET",
            //         url: "<?php echo base_url(); ?>pos/send_otp",
            //         data: {
            //             MobileNo: MobileNo
            //         },
            //         success: function(response) {
            //             var res = $.parseJSON(response);
            //             callSendOTP(res.url);
            //             window.otp = res.OTP;
            //         },
            //     });
            // }
            // function callSendOTP(passurl) {
            //     $.ajax({
            //         type: 'ajax',
            //         datatype: 'json',
            //         method: 'get',
            //         url: passurl,
            //         async: false,
            //         success: function(result) {
            //             console.log('success');
            //         },
            //         error: function() {
            //             console.log('error');
            //         }
            //     });
            // }
            function sendSMS() {
                $('#SuccessOTP').text('');
                $('#ErrOTP').text('');
                $('#OTP').val('');

                var MobileNo = window.checkedMobile;

                if (!MobileNo || MobileNo.trim() === '') {
                    alert('Mobile No is required');
                    return false;
                }

                var autoToken = window.autoToken || 'default_token_here';

                $('#SuccessOTP').text(
                    'OTP has been sent on your Mobile number for verification. If not getting OTP then click on send OTP'
                );

                // Prepare data to send
                var dataToSend = {
                    MobileNo: MobileNo,
                    token: autoToken
                };

                // Add CSRF token to data
                var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
                dataToSend[csrfName] = csrfHash;

                $.ajax({
                    url: "<?php echo base_url(); ?>webshop/send_whatsapp_otp",
                    method: "POST",
                    dataType: "json",
                    data: dataToSend,
                    success: function(response) {
                        if (response.url) {
                            callSendOTP(response.url);
                            window.otp = response.OTP;
                            if (timer) clearInterval(timer);
                                timeLeft = 300;
                                otpExpired = false;
                                timer = setInterval(() => {
                                    const minutes = Math.floor(timeLeft / 60);
                                    const seconds = timeLeft % 60;
                                    const timerDisplay = document.getElementById('otpTimer');
                                    if (timerDisplay) {
                                        timerDisplay.textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                                    }
                                    timeLeft--;
                                    if (timeLeft < 0) {
                                        clearInterval(timer);
                                        otpExpired = true;
                                        if (timerDisplay) {
                                            timerDisplay.textContent = 'Expired';
                                        }
                                    }
                                }, 1000);
                        } else {
                            $('#ErrOTP').text('Failed to send OTP');
                        }
                    },
                    error: function() {
                        $('#ErrOTP').text('Error sending OTP request');
                    }
                });
            }

            function callSendOTP(passurl) {
                $.ajax({
                    url: passurl,
                    method: "GET",
                    dataType: "json",
                    async: false,
                    success: function(result) {
                        console.log('OTP sent via WhatsApp successfully:', result);
                    },
                    error: function() {
                        console.log('Error sending OTP via WhatsApp');
                    }
                });
            }

            let timeLeft = 0;
            let otpExpired = false;
            let timer = null;
            document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
                e.preventDefault();
                const modalContent = document.getElementById('loginModalContent');
                if (modalContent) {
                    modalContent.innerHTML = `
                <div class="modal-header border-0 justify-content-center">
                    <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid" style="height: 80px;">
                </div>
                <div id="otpSection">
                    <div class="modal-body">
                        <h5 class="text-dark text-center mb-1 headerstyle">Forgot your password?</h5>
                        <p class="text-muted small mb-3">No worries. We'll send a one time code to your registered mobile number.</p>
                        <button id="sendResetLinkBtn" class="btn w-100 fw-semibold" style="background-color:#fa8507; color: white;">Send OTP</button>
                        <span class="text-muted small">Remember it now? <a class="text-theme" style="color:#fa8507;" href="<?= base_url('webshop/login') ?>">Log in</a></span>
                    </div>
                    <div class="bottom-links link-inherit pt-0 pl-2 d-flex justify-content-start">
                    </div>
                </div>`;
                    document.getElementById('sendResetLinkBtn').addEventListener('click', function() {
                        sendSMS();
                        const last4Digits = window.checkedMobile.slice(-4);
                        const otpSection = document.getElementById('otpSection');
                        if (otpSection) {
                            otpSection.innerHTML = `
                            <div class="modal-body">
                                <h5 class="text-dark text-center mb-1 headerstyle">Check your phone</h5>
                                <p class="text-muted small mb-3 ">We've sent 6-digit code to your mobile number ending in **${last4Digits}. The code will expire in <span id="otpTimer">05:00</span></p>
                                <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
                                    <input type="text" maxlength="1" class="otp-input mx-1">
                                    <input type="text" maxlength="1" class="otp-input mx-1">
                                    <input type="text" maxlength="1" class="otp-input mx-1">
                                    <input type="text" maxlength="1" class="otp-input mx-1">
                                    <input type="text" maxlength="1" class="otp-input mx-1">
                                    <input type="text" maxlength="1" class="otp-input mx-1">
                                </div>
                                <div id="ErrOTP" class="text-danger small mb-2"></div>
                                <button id="Verify" class="btn w-100 fw-semibold" style="background-color:#fa8507; color:white;">Verify</button>
                                <span class="text-muted small mt-5 ">Didn't get it? <a class="text-theme mt-3" href="#" onclick="event.preventDefault(); sendSMS();">Resend OTP</a></span>
                            </div>`;
                            setTimeout(() => {
                                document.querySelectorAll('.otp-input').forEach((input, index, inputs) => {
                                    input.addEventListener('input', () => {
                                        if (input.value.length === 1 && index < inputs.length - 1) {
                                            inputs[index + 1].focus();
                                        }
                                    });
                                });
                            }, 0);
                            if (timer) clearInterval(timer);
                            timeLeft = 300;
                            otpExpired = false;
                            timer = setInterval(() => {
                                const minutes = Math.floor(timeLeft / 60);
                                const seconds = timeLeft % 60;
                                document.getElementById('otpTimer').textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                                timeLeft--;
                                if (timeLeft < 0) {
                                    clearInterval(timer);
                                    document.getElementById('otpTimer').textContent = 'Expired';
                                }
                            }, 1000);
                            document.getElementById('Verify').addEventListener('click', function() {
                                let enteredOtp = '';
                                document.querySelectorAll('.otp-input').forEach(input => {
                                    enteredOtp += input.value;
                                });
                                if (otpExpired || timeLeft < 0) {
                                    document.getElementById('ErrOTP').textContent = 'OTP has expired.';
                                    return;
                                }
                                if (String(enteredOtp).trim() !== String(window.otp).trim()) {
                                    document.getElementById('ErrOTP').textContent = 'Entered OTP is Wrong.';
                                    return;
                                }
                                // OTP matched, show reset form
                                otpSection.innerHTML = `
                                <div class="modal-body">
                                    <h5 class="text-dark text-center mb-3 headerstyle">Create a new password</h5>
                                    <form id="resetForm" action="<?= base_url('webshop/forgot_password') ?>" method="post">
                                        <input type="hidden" name="mobile" value="${window.checkedMobile}" />
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                        <div class="mb-3 position-relative">
                                            <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control mb-2 border border-dark" required>
                                            <img id="togglePassword1" src="<?= base_url('assets/logs/ViewPwdIcon.svg') ?>" 
                                            onclick="viewPasswordnew();" 
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                                        </div>
                                        <div class="mb-3 position-relative">            
                                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control mb-2 border border-dark " required>
                                            <img id="togglePassword2" src="<?= base_url('assets/logs/ViewPwdIcon.svg') ?>" 
                                            onclick="viewPasswordconfirm();" 
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                                            <div id="password_error" class="text-danger small"></div>
                                        </div>
                                        <button type="submit" class="btn w-100 fw-semibold" style="background-color:#fa8507; color: white;" name="reset_password">Reset Password</button>
                                    </form>
                                </div>`;
                                document.getElementById('resetForm').addEventListener('submit', function(e) {
                                    e.preventDefault();
                                    const newPassword = document.getElementById('new_password').value;
                                    const confirmPassword = document.getElementById('confirm_password').value;
                                    const mobile =  window.checkedMobile;
                                    const errorDiv = document.getElementById('password_error');
                                    if (newPassword !== confirmPassword) {
                                        errorDiv.textContent = 'Passwords do not match.';
                                        return;
                                    }
                                    const dataToSend = {
                                        mobile: mobile,
                                        password: newPassword, 
                                    };
                                    var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
                                    var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
                                    dataToSend[csrfName] = csrfHash;
                                    $.ajax({
                                        url: '<?= base_url('webshop/check_existing_password') ?>',
                                        type: 'POST',
                                        data: dataToSend,
                                        success: function(response) {
                                            try {
                                                var res = JSON.parse(response);
                                                if (res.exists) {
                                                    errorDiv.textContent = 'This password has already been used.Please choose a different one.';
                                                } else {
                                                    const input = document.createElement('input');
                                                    input.type = 'hidden';
                                                    input.name = 'reset_password';
                                                    input.value = '1';
                                                    document.getElementById('resetForm').appendChild(input);
                                                    document.getElementById('resetForm').submit();
                                                }
                                            } catch (e) {
                                                console.error('Invalid JSON response:', response);
                                                errorDiv.textContent = 'Unexpected error occurred. Please try again.';
                                            }
                                        },
                                        error: function(xhr, status, error) {
                                            alert('Request failed: ' + error);
                                        }
                                    });
                                });

                            });
                        }
                    });
                }
            });
        }
    </script>

    <style>
        .otp-input {
            width: 40px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            border: 2px solid #fa8507 !important;
            border-radius: 8px;
            font-weight: 500 !important;
        }

        .modal-content {
            width: 140% !important;
        }

        #new_password,
        #confirm_password {
            border-radius: 8px;
        }
    </style>
<?php endif; ?>