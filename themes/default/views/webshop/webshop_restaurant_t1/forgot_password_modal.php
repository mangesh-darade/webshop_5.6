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
    <div class="modal fade" id="signinModalNew" tabindex="-1" aria-labelledby="signinModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 p-2" id="loginModalContentNew" style="height: 600px; overflow: hidden;">

                <div class="modal-header border-0 justify-content-center">
                    <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid"
                        style="height: 80px;">
                </div>

                <div class="modal-body mt-0">
                    <h5 class="mb-3">Forgot your password ? </h5>
                    <!-- <h5 class="text-dark mb-1 headerstyle">Sign in or continue to place your order</h5> -->
                    <!-- Mobile input -->
                    <div class="mb-3 shadow p-3  rounded_custome bg-white">
                        <small class="form-text text-muted text-left mb-3"
                            style="margin-bottom: 0px!important;margin-top: -4px!important;">
                            Please enter the mobile number associated with your account.
                        </small>
                        <input type="text" id="mobileInputNew" class="form-control border border-dark"
                            placeholder="Mobile Number(Without Country Code)" autocomplete="off" value="">
                        <div id="createAccountPromptNew" style="display: none;">
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
                    <div class="mb-3 d-none shadow p-3 rounded_custome bg-white" id="passwordWrapperNew">
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
                            <div id="ForpassoptionNew" class="d-none">
                            <div class="d-flex justify-content-between align-items-center mb-1" style="margin-top: 3px !important;">
                                <div style="margin-top: 1px !important;">
                                    <input type="checkbox" id="keepSignedIn" />
                                    <label for="keepSignedIn" class="text-muted small signbold"
                                        style="margin-left: -3px;">Keep me signed in</label>
                                </div>
                                <div style="margin-top: 1px !important;">
                                    <a href="#" id="forgotPasswordLinkNew"
                                        class="text-warning small fw-semibold text-decoration-none Forgot pass">Forgot
                                        password?</a>
                                </div>
                            </div>
                        </div>
                        <!-- Login/Continue button -->
                        <button id="loginBtnNew" class="btn btn-warning w-100 fw-semibold" name="submit_login"
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
        function onLoadModal() {
            
            const modalContentOnStart = document.getElementById('loginModalContentNew');
            if (modalContentOnStart) {
                modalContentOnStart.innerHTML = `
                    <div class="modal-header border-0 justify-content-center">
                        <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid"
                            style="height: 80px;">
                    </div>

                    <div class="modal-body mt-0">
                         <h5 class="text-dark mb-1 headerstyle">Forgot your password ? </h5> 
                        <!-- <h5 class="text-dark mb-1 headerstyle">Sign in or continue to place your order</h5> -->
                        <!-- Mobile input -->
                        <div class="mb-3 shadow p-3  rounded_custome bg-white">
                            <small class="form-text text-muted text-left mb-3"
                                style="margin-bottom: 0px!important;margin-top: -4px!important;">
                                Please enter the mobile number associated with your account.
                            </small>
                            <input type="text" id="mobileInputNew" class="form-control border border-dark"
                                placeholder="Mobile Number(Without Country Code)" autocomplete="off" value="">
                            <div id="createAccountPromptNew" style="display: none;">
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
                        <div class="mb-3 d-none shadow p-3 rounded_custome bg-white" id="passwordWrapperNew">
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
                                <div id="ForpassoptionNew" class="d-none">
                                <div class="d-flex justify-content-between align-items-center mb-1" style="margin-top: 3px !important;">
                                    <div style="margin-top: 1px !important;">
                                        <input type="checkbox" id="keepSignedIn" />
                                        <label for="keepSignedIn" class="text-muted small signbold"
                                            style="margin-left: -3px;">Keep me signed in</label>
                                    </div>
                                    <div style="margin-top: 1px !important;">
                                        <a href="#" id="forgotPasswordLinkNew"
                                            class="text-warning small fw-semibold text-decoration-none Forgot pass">Forgot
                                            password?</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Login/Continue button -->
                            <button id="loginBtnNew" class="btn btn-warning w-100 fw-semibold" name="submit_login"
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
                addListener();                
            }
        }

        function addListener() {    

            window.otp = null;
            window.checkedMobile = null;
            $('#mobileInputNew').val('');
            
            // Check mobile on blur
            $('#mobileInputNew').on('blur', function() {
                const mobile = $(this).val().trim();
                if (mobile.length === 10 || mobile.length == 9) {
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
                                $('#mobileInputNew').closest('.mb-3').addClass('d-none');
                                $('#passwordWrapperNew').removeClass('d-none');
                                // $('#loginBtnNew').removeClass('d-none');
                                $('#createAccountPromptNew').hide();
                                $('#ForpassoptionNew').removeClass(
                                    'd-none'); // Show "forgot password" + "remember me"
                                document.getElementById('forgotPasswordLinkNew').click();
                                $('#forgotPasswordLinkNew').click();
                                $('#otpSectionNew').removeClass('d-none');
                            } else {
                                $('#loginError').removeClass('d-none');
                                $('#passwordWrapperNew').addClass('d-none');
                                $('#loginBtnNew').addClass('d-none');
                                $('#mobileInputNew').closest('.mb-3').removeClass('d-none');
                                $('#createAccountPromptNew').show();
                                $('#ForpassoptionNew').addClass('d-none'); // Hide it if no account
                                $('#otpSectionNew').addClass('d-none');
                            }
                        },
                        error: function(xhr, status, error) {
                            alert('Request failed');
                        }
                    });
                }
            });

            // Attempt login
            // $('#loginBtnNew').on('click', function() {
            //     const mobile = $('#mobileInputNew').val().trim();
            //     const password = $('#passwordInput').val().trim();
            //     const dataToSend = {
            //         mobile: mobile,
            //         password: password,
            //     };
            //     var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
            //     var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';
            //     dataToSend[csrfName] = csrfHash;
            //     $.ajax({
            //         url: '<?= base_url('webshop/ajax_login') ?>',
            //         type: 'POST',
            //         data: dataToSend,
            //         success: function(response) {
            //             var res = JSON.parse(response);
            //             console.log(res.status);
            //             if (res.status === 'success') {
            //                 window.location.href = res.redirect;
            //             } else {
            //                 $('#loginError').removeClass('d-none');
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             alert('Request failed');
            //         }
            //     });

            // });
            const inputNumEle = document.getElementById('mobileInputNew');
            // const errorNumEle = document.getElementById('mobileError');

            inputNumEle.addEventListener('input', function() {
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
                    // errorNumEle.classList.add('d-none');
                }else{
                    this.classList.add('is-invalid');
                    // errorNumEle.classList.remove('d-none');
                }
            });

            function sendSMS() {
                $('#SuccessOTPNew').text('');
                $('#ErrOTPNew').text('');
                $('#OTPNew').val('');

                var MobileNo = window.checkedMobile;

                if (!MobileNo || MobileNo.trim() === '') {
                    alert('Mobile No is required');
                    return false;
                }

                var autoToken = window.autoToken || 'default_token_here';

                $('#SuccessOTPNew').text(
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
                            if (timerNew) clearInterval(timerNew);
                                timeLeftNew = 300;
                                otpExpiredNew = false;
                                timerNew = setInterval(() => {
                                    const minutes = Math.floor(timeLeftNew / 60);
                                    const seconds = timeLeftNew % 60;
                                    const timerDisplay = document.getElementById('otpTimerNew');
                                    if (timerDisplay) {
                                        timerDisplay.textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                                    }
                                    timeLeftNew--;
                                    if (timeLeftNew < 0) {
                                        clearInterval(timerNew);
                                        otpExpiredNew = true;
                                        if (timerDisplay) {
                                            timerDisplay.textContent = 'Expired';
                                        }
                                    }
                                }, 1000);
                        } else {
                            $('#ErrOTPNew').text('Failed to send OTP');
                        }
                    },
                    error: function() {
                        $('#ErrOTPNew').text('Error sending OTP request');
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

            let timeLeftNew = 0;
            let otpExpiredNew = false;
            let timerNew = null;
            document.getElementById('forgotPasswordLinkNew').addEventListener('click', function(e) {
                e.preventDefault();
                const modalContent = document.getElementById('loginModalContentNew');
                if (modalContent) {
                    modalContent.innerHTML = `
                        <div class="modal-header border-0 justify-content-center">
                            <img src="<?= $uploads ?>webshop/Minatshi Logo.png" alt="Loader Image" class="img-fluid" style="height: 80px;">
                        </div>
                        <div id="otpSectionNew">
                            <div class="modal-body">
                                <h5 class="text-dark text-center mb-1 headerstyle">Forgot your password?</h5>
                                <p class="text-muted small mb-3">No worries. We'll send a one time code to your registered mobile number.</p>
                                <button id="sendResetLinkBtnNew" class="btn w-100 fw-semibold" style="background-color:#fa8507; color: white;">Send OTP</button>
                                <span class="text-muted small">Remember it now? <a class="text-theme" style="color:#fa8507;" href="<?= base_url('webshop/login') ?>">Log in</a></span>
                            </div>
                            <div class="bottom-links link-inherit pt-0 pl-2 d-flex justify-content-start">
                            </div>
                        </div>`;
                    document.getElementById('sendResetLinkBtnNew').addEventListener('click', function() {
                        sendSMS();
                        const last4Digits = window.checkedMobile.slice(-4);
                        const otpSectionNew = document.getElementById('otpSectionNew');
                        if (otpSectionNew) {
                            otpSectionNew.innerHTML = `
                            <div class="modal-body">
                                <h5 class="text-dark text-center mb-1 headerstyle">Check your phone</h5>
                                <p class="text-muted small mb-3 ">We've sent 6-digit code to your mobile number ending in **${last4Digits}. The code will expire in <span id="otpTimerNew">05:00</span></p>
                                <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
                                    <input type="text" maxlength="1" class="otp-input-new mx-1">
                                    <input type="text" maxlength="1" class="otp-input-new mx-1">
                                    <input type="text" maxlength="1" class="otp-input-new mx-1">
                                    <input type="text" maxlength="1" class="otp-input-new mx-1">
                                    <input type="text" maxlength="1" class="otp-input-new mx-1">
                                    <input type="text" maxlength="1" class="otp-input-new mx-1">
                                </div>
                                <div id="ErrOTPNew" class="text-danger small mb-2"></div>
                                <button id="VerifyNew" class="btn w-100 fw-semibold" style="background-color:#fa8507; color:white;">Verify</button>
                                <span class="text-muted small mt-5 ">Didn't get it? <a class="text-theme mt-3" href="#" onclick="event.preventDefault(); sendSMS();">Resend OTP</a></span>
                            </div>`;
                            setTimeout(() => {
                                document.querySelectorAll('.otp-input-new').forEach((input, index, inputs) => {
                                    input.addEventListener('input', () => {
                                        if (input.value.length === 1 && index < inputs.length - 1) {
                                            inputs[index + 1].focus();
                                        }
                                    });
                                });
                            }, 0);
                            if (timerNew) clearInterval(timerNew);
                            timeLeftNew = 300;
                            otpExpiredNew = false;
                            timerNew = setInterval(() => {
                                const minutes = Math.floor(timeLeftNew / 60);
                                const seconds = timeLeftNew % 60;
                                document.getElementById('otpTimerNew').textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                                timeLeftNew--;
                                if (timeLeftNew < 0) {
                                    clearInterval(timerNew);
                                    document.getElementById('otpTimerNew').textContent = 'Expired';
                                }
                            }, 1000);
                            document.getElementById('VerifyNew').addEventListener('click', function() {
                                let enteredOtp = '';
                                document.querySelectorAll('.otp-input-new').forEach(input => {
                                    enteredOtp += input.value;
                                });
                                if (otpExpiredNew || timeLeftNew < 0) {
                                    document.getElementById('ErrOTPNew').textContent = 'OTP has expired.';
                                    if (timerNew) clearInterval(timerNew);
                                    return;
                                }
                                if (String(enteredOtp).trim() !== String(window.otp).trim()) {
                                    document.getElementById('ErrOTPNew').textContent = 'Entered OTP is Wrong.';
                                    return;
                                }
                                if (timerNew) clearInterval(timerNew);
                                // OTP matched, show reset form
                                otpSectionNew.innerHTML = `
                                <div class="modal-body">
                                    <h5 class="text-dark text-center mb-3 headerstyle">Create a new password</h5>
                                    <form id="resetFormNew" action="<?= base_url('webshop/forgot_password') ?>" method="post">
                                        <input type="hidden" name="mobile" value="${window.checkedMobile}" />
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                                        <div class="mb-3 position-relative">
                                            <input type="password" id="new_password_new" name="new_password_new" placeholder="New Password" class="form-control mb-2 border border-dark" required>
                                            <img id="togglePassword1New" src="<?= base_url('assets/logs/ViewPwdIcon.svg') ?>" 
                                            onclick="viewPasswordnewFP();" 
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                                        </div>
                                        <div class="mb-3 position-relative">            
                                            <input type="password" id="confirm_password_new" name="confirm_password_new" placeholder="Confirm Password" class="form-control mb-2 border border-dark " required>
                                            <img id="togglePassword2New" src="<?= base_url('assets/logs/ViewPwdIcon.svg') ?>" 
                                            onclick="viewPasswordconfirmFP();" 
                                            style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; width: 20px; height: 20px;" />
                                            <div id="password_error_new" class="text-danger small"></div>
                                        </div>
                                        <button type="submit" class="btn w-100 fw-semibold" style="background-color:#fa8507; color: white;" name="reset_password">Reset Password</button>
                                    </form>
                                </div>`;
                                document.getElementById('resetFormNew').addEventListener('submit', function(e) {
                                    e.preventDefault();
                                    const newPassword = document.getElementById('new_password_new').value;
                                    const confirmPassword = document.getElementById('confirm_password_new').value;
                                    const mobile =  window.checkedMobile;
                                    const errorDiv = document.getElementById('password_error_new');
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
                                                    document.getElementById('resetFormNew').appendChild(input);
                                                    document.getElementById('resetFormNew').submit();
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

    <script>
        function viewPasswordnewFP() {
            console.log("clicked here");
            var passwordField = $("#new_password_new");
            var togglePasswordImg = $("#togglePassword1New");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }

        function viewPasswordconfirmFP() {
            var passwordField = $("#confirm_password_new");
            var togglePasswordImg = $("#togglePassword2New");
            if (passwordField.attr("type") === "password") {
                passwordField.attr("type", "text");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/ViewPwdIcon.svg') ?>");
            } else {
                passwordField.attr("type", "password");
                togglePasswordImg.attr("src", "<?= base_url('assets/logs/HidePwdIcon.svg') ?>");
            }
        }
    </script>
    <style>
        .otp-input-new {
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

        #new_password_new,
        #confirm_password_new {
            border-radius: 8px;
        }

        input#mobileInputNew {
            height: 34px !important; 
            color: #B0B0B0; 
            font-family: Roboto; 
            font-weight: 400; 
            font-size: 12px; 
            line-height: 100%; 
            border-radius: 8px;
        }

    </style>
<?php endif; ?>