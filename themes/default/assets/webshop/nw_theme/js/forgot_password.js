import {
  namePattern,
  phonePattern,
  passPattern,
  nonEmptyPattern,
  emailPattern,
  validateInput,
  validatePhoneInput,
  togglePassword,
} from "./common.js";

document.addEventListener("DOMContentLoaded", function () {
  const MobNoelement = document.getElementById("MobileNo");
  const sendOtpBtn = document.getElementById("send-otp-btn");
  const sendOtpForm = document.getElementById("otp-form");
  const mobErrorElement = document.getElementById("mob-error");
  const verifyOtpBtn = document.getElementById("verify-otp-btn");
  const otpInputElement = document.getElementById("otp-input");
  const resetPassDiv = document.getElementById("reset-pass-div");
  const newPassElement = document.getElementById("new_password");
  const newPassErrorEle = document.getElementById("new-pass-error");
  const confirmNewPassElement = document.getElementById("confirm_password");
  const confirmNewPassErrorEle = document.getElementById(
    "confirm-new-pass-error"
  );
  const resetPassBtn = document.getElementById("change-password-btn");
  validatePhoneInput(MobNoelement);
  validateInput(
    MobNoelement,
    "input",
    mobErrorElement,
    false,
    /^[1-9][0-9]{8,9}$/
  );
  // validateInput(MobNoelement, "blur", mobErrorElement, false, phonePattern);

  $("#MobileNo").on("input", function () {
    const mobile = $(this).val().trim();
    if (mobile.length === 10 || mobile.length === 9) {
      $("#mob-error").hide();

      const dataToSend = {
        mobile: mobile,
      };
      dataToSend[csrfName] = csrfHash;
      $.ajax({
        url: `${baseUrl}webshop/check_mobile`,
        type: "POST",
        data: dataToSend,
        success: function (response) {
          let res = JSON.parse(response);
          // console.log("check_mobile_response", res);
          if (res.status === "success") {
            window.checkedMobile = res.mobile;
            $("#registerWithUs").hide();
            $("#send-otp-btn").show();
          } else {
            $("#registerWithUs").show();
            $("#send-otp-btn").hide();
          }
        },
        error: function (xhr, status, error) {
          alert("Request failed");
        },
      });
    } else {
      $("#send-otp-btn").show();
      $("#registerWithUs").hide();
    }
  });

  function callSendOTP(passurl) {
    $.ajax({
      url: passurl,
      method: "GET",
      dataType: "json",
      async: false,
      success: function (result) {
        console.log("OTP sent via WhatsApp successfully:", result);
      },
      error: function () {
        console.log("Error sending OTP via WhatsApp");
      },
    });
  }

  function sendSMS() {
    let MobileNo = window.checkedMobile
      ? window.checkedMobile
      : MobNoelement.value;

    // console.log("mdowoemo", MobileNo);
    if (!MobileNo || MobileNo.trim() === "") {
      alert("Mobile number is required");
      return false;
    }
    // let autoToken = window.autoToken || "default_token_here";
    let dataToSend = {
      MobileNo: MobileNo,
      // token: autoToken,
    };
    dataToSend[csrfName] = csrfHash;
    $.ajax({
      url: `${baseUrl}webshop/send_whatsapp_otp`,
      method: "POST",
      dataType: "json",
      data: dataToSend,
      success: function (response) {
        // console.log("response", response);
        $("#SuccessOTP")
          .stop(true, true)
          .text("An OTP has been successfully sent on your Mobile number.")
          .fadeIn(500)
          .delay(3000)
          .fadeOut(500, function () {
            $(this).text("");
          });
        $("#otp-form").hide();
        $("#verify-otp").show();
        window.timer = setTimeout(() => {
          window.timer = "";
          window.otp = "";

          // console.log("expired now");
          $("#otp-expire-prompt").show();
          document.getElementById(
            "otp-expire-prompt"
          ).innerHTML = `<span>OTP has expired. <strong id="resend-otp-btn">Resend </strong>it</span>`;
          // }, 1200000);
          // }, 300000);

          const resendOTPBtn = document.getElementById("resend-otp-btn");
          resendOTPBtn.addEventListener("click", (event) => {
            sendSMS();
            $("#otp-expire-prompt").hide();
          });
        }, 300000);
        let clockTimer = "";
        if (response.url) {
          callSendOTP(response.url);
          window.otp = response.OTP;
          if (clockTimer) clearInterval(clockTimer);
          let timeLeft = 300;
          // otpExpired = false;
          clockTimer = setInterval(() => {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            const timerDisplay = document.getElementById("otp-timer");
            $("#otp-timer").show();
            timerDisplay.classList.add("warning-msg");
            if (timerDisplay) {
              timerDisplay.textContent = `OTP expires in ${
                minutes < 10 ? "0" : ""
              }${minutes} min :${seconds < 10 ? "0" : ""}${seconds} sec`;
            }
            timeLeft--;
            if (timeLeft < 0) {
              clearInterval(clockTimer);
              window.otp = "";
              window.timer = "";
              $("#otp-expire-prompt").show();
              document.getElementById(
                "otp-expire-prompt"
              ).innerHTML = `<span>OTP has expired. <strong id="resend-otp-btn">Resend </strong>it ?</span>`;
              $("#otp-timer").hide();
              $("#otp-check-prompt").hide();

              const resendOTPBtn = document.getElementById("resend-otp-btn");
              resendOTPBtn.addEventListener("click", (event) => {
                sendSMS();
                $("#otp-expire-prompt").hide();
              });

              // otpExpired = true;
              // if (timerDisplay) {
              //   timerDisplay.textContent = "Expired";
              // }
            }
          }, 1000);
        } else {
          $("#ErrOTP").text("Failed to send OTP");
        }
      },
      error: function () {
        $("#ErrOTP").text("Error sending OTP request");
      },
    });
  }

  sendOtpBtn.addEventListener("click", (event) => {
    const validPhone = validateInput(
      MobNoelement,
      null,
      mobErrorElement,
      true,
      /^[1-9][0-9]{8,9}$/
    );
    if (!validPhone) {
      // $("#mob-error").show();
      event.preventDefault();
      return;
    }
    sendSMS();
  });

  otpInputElement.addEventListener("input", (event) => {
    $("#otp-check-prompt").text("");
  });

  verifyOtpBtn.addEventListener("click", (event) => {
    // console.log("timertimer", window.timer);
    if (!window.timer) {
      $("#otp-check-prompt").text("");
      $("#otp-check-prompt").hide();
      $("#otp-expire-prompt").show();
      document.getElementById(
        "otp-expire-prompt"
      ).innerHTML = `<span>OTP has expired. <strong id="resend-otp-btn">Resend </strong>it ?</span>`;
      // $("#otp-expire-prompt").innerHtml(``);
      const resendOTPBtn = document.getElementById("resend-otp-btn");
      resendOTPBtn.addEventListener("click", (event) => {
        sendSMS();
        $("#otp-expire-prompt").hide();
      });
      return;
    }
    // console.log("windpowwwwww", window.otp);
    if (!otpInputElement.value) {
      $("#otp-check-prompt").show();
      $("#otp-check-prompt").text("Please enter OTP");
      return;
    }

    if (otpInputElement.value != window.otp) {
      // console.log("insideeeeee");
      $("#otp-check-prompt").removeClass("success-msg");
      $("#otp-check-prompt").addClass("error-msg");
      $("#otp-check-prompt").show();
      $("#otp-check-prompt").text("OTP doesn't match.");
      return;
    }
    // alert("OTP matches.");
    $("#otp-check-prompt").addClass("success-msg");
    $("#otp-check-prompt").removeClass("error-msg");
    $("#otp-check-prompt")
      .stop(true, true)
      .text("OTP successfully verified")
      .fadeIn(500)
      .delay(1500)
      .fadeOut(500, function () {
        $("#verify-otp").hide();
        $("#reset-pass-div").show();
        // $(this).text("");
      });
  });

  validateInput(newPassElement, "input", newPassErrorEle, false, passPattern);
  validateInput(
    confirmNewPassElement,
    "input",
    confirmNewPassErrorEle,
    false,
    passPattern
  );

  resetPassDiv.addEventListener("submit", (event) => {
    event.preventDefault();
    const validNewPass = validateInput(
      newPassElement,
      null,
      newPassErrorEle,
      true,
      passPattern
    );

    const validSamePass = newPassElement.value == confirmNewPassElement.value;
    if (!validNewPass) {
      event.preventDefault();
      return;
    }
    if (!validSamePass) {
      $("#confirm-new-pass-error").show();
      event.preventDefault();
      return;
    }
    $("#confirm-new-pass-error").hide();

    const dataToSend = {
      mobile: window.checkedMobile,
      password: newPassElement.value,
    };

    dataToSend[csrfName] = csrfHash;
    $.ajax({
      url: `${baseUrl}webshop/check_existing_password`,
      type: "POST",
      data: dataToSend,
      success: function (response) {
        try {
          var res = JSON.parse(response);
          // console.log("reeeeesss", res);
          if (res.exists) {
            $("#diff-pass").text(
              "This password has already been used.Please choose a different one."
            );
            console.log(
              "This password has already been used.Please choose a different one."
            );
          } else {
            // console.log("elseeeee");
            let newElement = document.createElement("input");
            newElement.type = "hidden";
            newElement.name = csrfName;
            newElement.value = csrfHash;
            resetPassDiv.appendChild(newElement);

            let numberElement = document.createElement("input");
            numberElement.type = "hidden";
            numberElement.name = "mobile";
            numberElement.value = window.checkedMobile;
            resetPassDiv.appendChild(numberElement);
            resetPassDiv.submit();
          }
        } catch (e) {
          console.error("Invalid JSON response:", response);
          alert("Unexpected error occurred. Please try again.");
        }
      },
      error: function (xhr, status, error) {
        alert("Request failed: " + error);
      },
    });
  });

  const newPassToggler = document.getElementById("toggleNewPassword");
  const confirmNewPassToggler = document.getElementById(
    "toggleConfirmNewPassword"
  );
  const newPass = document.getElementById("new_password");
  const confirmNewPass = document.getElementById("confirm_password");

  newPassToggler.addEventListener("click", () => {
    togglePassword(newPass, newPassToggler);
  });
  confirmNewPassToggler.addEventListener("click", () => {
    togglePassword(confirmNewPass, confirmNewPassToggler);
  });
});
