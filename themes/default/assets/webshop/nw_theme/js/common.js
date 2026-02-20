const namePattern = /^[A-Za-z]+$/;
let phonePattern = /^[1-9][0-9]{9}$/;
let commonPhonePattern = /^[1-9][0-9]{8,9}$/;
const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{8,}$/;
const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
const nonEmptyPattern = /^.+$/;
let registerPageValidDigits;
let billDigits;
let phoneDigitValidBillPattern;
let shipDigits;
let phoneDigitValidShipPattern;

function validateInput(
  element,
  eventName,
  errorElement,
  onlyValidate = false,
  pattern,
) {
  let isValidated = true;
  if (onlyValidate) {
    if (!pattern.test(element.value)) {
      isValidated = false;
    }
    if (!isValidated) {
      errorElement.classList.add("error-validation");
      return false;
    }
    errorElement.classList.remove("error-validation");
    return true;
  }

  element.addEventListener(eventName, function (event) {
    if (event.target.value === "" || !pattern.test(event.target.value)) {
      errorElement.classList.add("error-validation");
      return false;
    }
    errorElement.classList.remove("error-validation");
    return true;
  });
}

function validatePhoneInput(element, validDigits = null) {
  element.addEventListener("keypress", (event) => {
    // console.log("pressed");
    if (!/\d/.test(event.key)) {
      event.preventDefault();
      return;
    }
    if (event.target.value[0] == 0) {
      event.preventDefault();
      return;
    }

    console.log("digits", validDigits);
    const cleaned = event.target.value.replace(/\D/g, "").replace(/^0+/, "");
    if (validDigits) {
      if (cleaned.length >= validDigits) {
        event.preventDefault();
        return;
      }
    } else {
      if (cleaned.length >= 10) {
        event.preventDefault();
        return;
      }
    }
  });
}

function validateKeyPressInput(element, errorElement, regexPattern) {
  element.addEventListener("keypress", (event) => {
    if (!regexPattern.test(event.key)) {
      errorElement.classList.add("error-validation");
      event.preventDefault();
      return;
    }
    errorElement.classList.remove("error-validation");
    return;
  });
}

const path = window.location.pathname.split("/").pop();
// ====================================================================================================================
// =======================================REGISTER==================================================================
// ====================================================================================================================

if (path == "register") {
  // ==================================================Name==============================================
  // console.log("herererer");
  const fName = document.getElementById("txtfirstname");
  const fNameError = document.getElementById("firstNameError");
  const lName = document.getElementById("txtlastname");
  const lNameError = document.getElementById("lastNameError");
  validateInput(fName, "input", fNameError, false, namePattern);
  validateInput(fName, "blur", fNameError, false, namePattern);
  validateKeyPressInput(fName, fNameError, namePattern);
  validateInput(lName, "input", lNameError, false, namePattern);
  validateInput(lName, "blur", lNameError, false, namePattern);
  validateKeyPressInput(lName, lNameError, namePattern);

  // =========================================Country=====================================================
  const countryElementRegister = document.getElementById("billtocountry");
  const phoneInput = document.getElementById("phone");
  const phoneError = document.getElementById("phoneError");
  // let inputRegister, blurRegister, phnRegister;
  let phoneKeypressHandler = null; // Store reference to the keypress handler
  let inputHandler = null; // Store reference to input handler

  function changeValidDigitsRegister() {
    registerPageValidDigits = Number(
      countryElementRegister.options[
        countryElementRegister.selectedIndex
      ].getAttribute("phonedigits"),
    );

    phonePattern = new RegExp(`^[1-9][0-9]{${registerPageValidDigits - 1}}$`);

    if (phoneInput.value) {
      validateInput(phoneInput, null, phoneError, true, phonePattern);
    }

    // Remove old keypress handler if exists
    if (phoneKeypressHandler) {
      phoneInput.removeEventListener("keypress", phoneKeypressHandler);
    }

    if (inputHandler) {
      phoneInput.removeEventListener("input", inputHandler);
    }

    // Create new keypress handler with updated valid digits
    phoneKeypressHandler = (event) => {
      if (!/\d/.test(event.key)) {
        event.preventDefault();
        return;
      }
      if (event.target.value[0] == 0) {
        event.preventDefault();
        return;
      }

      // console.log("digits", registerPageValidDigits);
      const cleaned = event.target.value.replace(/\D/g, "").replace(/^0+/, "");
      if (registerPageValidDigits) {
        if (cleaned.length >= registerPageValidDigits) {
          event.preventDefault();
          return;
        }
      } else {
        if (cleaned.length >= 10) {
          event.preventDefault();
          return;
        }
      }
    };

    inputHandler = (event) => {
      validateInput(phoneInput, null, phoneError, true, phonePattern);
    };

    // Attach new handler
    phoneInput.addEventListener("keypress", phoneKeypressHandler);
    phoneInput.addEventListener("input", inputHandler);
  }

  countryElementRegister.addEventListener("change", (event) => {
    changeValidDigitsRegister();
  });

  // ==================================================Phone==============================================
  changeValidDigitsRegister();

  // =========================================Email=====================================================
  const emailInputReg = document.getElementById("txtemail");
  const emailErrorReg = document.getElementById("emailError");
  // console.log("emailInputReg", emailInputReg);
  // console.log("emailErrorReg", emailErrorReg);

  // validateInput(emailInputReg, "input", emailErrorReg, false, emailPattern);
  // validateInput(emailInputReg, "blur", emailErrorReg, false, emailPattern);

  // =========================================Password=====================================================
  const passwordEle = document.getElementById("txtregpassword");
  const passwordErrorEle = document.getElementById("passError");
  validateInput(passwordEle, "input", passwordErrorEle, false, passPattern);
  // validateInput(passwordEle, "blur", passwordErrorEle, false), passPattern;

  // =========================================Register=====================================================
  const registerform = document.getElementById("registerform");
  registerform.addEventListener("submit", (event) => {
    const validFName = validateInput(
      fName,
      null,
      fNameError,
      true,
      namePattern,
    );
    const validLName = validateInput(
      lName,
      null,
      lNameError,
      true,
      namePattern,
    );
    const validPhone = validateInput(
      phoneInput,
      null,
      phoneError,
      true,
      new RegExp(`^[1-9][0-9]{${registerPageValidDigits - 1}}$`),
    );
    const validPassword = validateInput(
      passwordEle,
      null,
      passwordErrorEle,
      true,
      passPattern,
    );

    let validEmail = true;
    if (emailInputReg.value) {
      // console.log("emailInputReg", emailInputReg);
      // console.log("emailErrorReg", emailErrorReg);
      validEmail = validateInput(
        emailInputReg,
        null,
        emailErrorReg,
        true,
        emailPattern,
      );
    }

    // console.log("validEmail", validEmail);
    if (
      !validFName ||
      !validLName ||
      !validPhone ||
      !validPassword ||
      !validEmail
    ) {
      event.preventDefault();
      return;
    }
  });
}
// ====================================================================================================================
// =======================================LOGIN==================================================================
// ====================================================================================================================
else if (path == "login") {
  const errMsgLogin = document.querySelector(".error-msg-login");
  const phoneInputLogin = document.getElementById("webshop_phone");
  const phoneErrorLogin = document.getElementById("phoneErrorLogin");
  const passInputLogin = document.getElementById("webshop_password");
  const passErrorLogin = document.getElementById("passError");
  // phoneInputLogin.addEventListener("keypress", function (e) {
  //   if (!/\d/.test(e.key)) {
  //     e.preventDefault();
  //     return;
  //   }
  //   const cleaned = this.value.replace(/\D/g, "").replace(/^0+/, "");
  //   if (cleaned.length >= 10) {
  //     e.preventDefault();
  //     return;
  //   }
  // });
  validatePhoneInput(phoneInputLogin);
  validateInput(
    phoneInputLogin,
    "input",
    phoneErrorLogin,
    false,
    commonPhonePattern,
  );
  validateInput(
    phoneInputLogin,
    "blur",
    phoneErrorLogin,
    false,
    commonPhonePattern,
  );

  const loginForm = document.getElementById("loginform");
  loginForm.addEventListener("submit", (event) => {
    const validPhoneInputLogin = validateInput(
      phoneInputLogin,
      null,
      phoneErrorLogin,
      true,
      commonPhonePattern,
    );

    const validatePass = validateInput(
      passInputLogin,
      null,
      passErrorLogin,
      true,
      nonEmptyPattern,
    );

    if (!validPhoneInputLogin || !validatePass) {
      document.getElementById("togglePasswordLogin").style.top = "57%";
      event.preventDefault();
      return;
    }
    return;
  });
}
// ====================================================================================================================
// ==================================----=CHECKOUT================================================================
else if (path == "checkout") {
  filterStates("billtocountry", "txtstate", null, null, true, "bill");

  // -----------------NAME-----------------------
  const fName = document.getElementById("txtfirstname");
  const fNameError = document.getElementById("fNameError");
  const lName = document.getElementById("txtlastname");
  const lNameError = document.getElementById("lNameError");

  validateInput(fName, "input", fNameError, false, namePattern);
  validateInput(fName, "blur", fNameError, false, namePattern);
  validateKeyPressInput(fName, fNameError, namePattern);
  validateInput(lName, "input", lNameError, false, namePattern);
  validateInput(lName, "blur", lNameError, false, namePattern);
  validateKeyPressInput(lName, lNameError, namePattern);

  // -----------------CITY-----------------------
  const city = document.getElementById("txtcity");
  const cityError = document.getElementById("cityError");
  validateInput(city, "input", cityError, false, namePattern);
  validateInput(city, "blur", cityError, false, namePattern);

  // -----------------PHONE-----------------------
  const phone = document.getElementById("txtphone");
  const phoneError = document.getElementById("phoneError");
  // validateInput(phone, "input", phoneError, false, phoneDigitValidBillPattern);
  // validateInput(phone, "blur", phoneError, false, phoneDigitValidBillPattern);
  // validatePhoneInput(phone, billDigits);

  // -----------------EMAIL-----------------------
  const email = document.getElementById("txtemail");
  const emailError = document.getElementById("emailError");
  validateInput(email, "input", emailError, false, emailPattern);
  validateInput(email, "blur", emailError, false, emailPattern);

  // -----------------ADDRESS-----------------------
  const address1 = document.getElementById("txtaddress1");
  const address1Error = document.getElementById("add1Error");
  validateInput(address1, "input", address1Error, false, nonEmptyPattern);
  validateInput(address1, "blur", address1Error, false, nonEmptyPattern);

  // -----------------SUITE-----------------------
  const address2 = document.getElementById("txtaddress2");
  const address2Error = document.getElementById("add2Error");
  validateInput(address2, "input", address2Error, false, nonEmptyPattern);
  validateInput(address2, "blur", address2Error, false, nonEmptyPattern);

  // ----------FILTER STATES -------------------------------
  const stateElement = document.getElementById("txtstate");
  const stateElementError = document.getElementById("stateError");
  const countryElement = document.getElementById("billtocountry");
  const countryElementError = document.getElementById("countryError");

  let checkBillInputHandler = null;
  let checkBillKeyPressHandler = null;

  stateElement.addEventListener("change", function (event) {
    if (!event.target.value) {
      console.log("not");
      stateElementError.classList.add("error-validation");
    } else {
      stateElementError.classList.remove("error-validation");
      console.log("yes");
    }
  });

  function changeValidDigitsBill() {
    phonePattern = new RegExp(`^[1-9][0-9]{${billDigits - 1}}$`);

    if (phone.value) {
      validateInput(phone, null, phoneError, true, phonePattern);
    }

    // Remove old keypress handler if exists
    if (checkBillKeyPressHandler) {
      phone.removeEventListener("keypress", checkBillKeyPressHandler);
    }

    if (checkBillInputHandler) {
      phone.removeEventListener("input", checkBillInputHandler);
    }
    checkBillKeyPressHandler = (event) => {
      if (!/\d/.test(event.key)) {
        event.preventDefault();
        return;
      }
      if (event.target.value[0] == 0) {
        event.preventDefault();
        return;
      }

      console.log("billDigits", billDigits);
      const cleaned = event.target.value.replace(/\D/g, "").replace(/^0+/, "");
      if (billDigits) {
        if (cleaned.length >= billDigits) {
          event.preventDefault();
          return;
        }
      } else {
        if (cleaned.length >= 10) {
          event.preventDefault();
          return;
        }
      }
    };

    checkBillInputHandler = (event) => {
      validateInput(phone, null, phoneError, true, phonePattern);
    };
    phone.addEventListener("keypress", checkBillKeyPressHandler);
    phone.addEventListener("input", checkBillInputHandler);
  }

  changeValidDigitsBill();

  countryElement.addEventListener("change", () => {
    filterStates("billtocountry", "txtstate", phone, phoneError, false, "bill");
    changeValidDigitsBill();
  });

  // ===============================================
  // ====================SHIPPPING=============
  filterStates("shiptocountry", "txtsstate", null, null, true, "ship");
  // -----------------NAME-----------------------
  const fNameS = document.getElementById("txtsfirstname");
  const fNameErrorS = document.getElementById("fNameErrorS");
  const lNameS = document.getElementById("txtslastname");
  const lNameErrorS = document.getElementById("lNameErrorS");

  validateInput(fNameS, "input", fNameErrorS, false, namePattern);
  validateInput(fNameS, "blur", fNameErrorS, false, namePattern);
  validateInput(lNameS, "input", lNameErrorS, false, namePattern);
  validateInput(lNameS, "blur", lNameErrorS, false, namePattern);

  // -----------------CITY-----------------------
  const cityS = document.getElementById("txtscity");
  const cityErrorS = document.getElementById("cityErrorS");
  validateInput(cityS, "input", cityErrorS, false, namePattern);
  validateInput(cityS, "blur", cityErrorS, false, namePattern);

  // -----------------PHONE-----------------------
  const phoneS = document.getElementById("txtsphone");
  const phoneErrorS = document.getElementById("phoneErrorS");
  // validateInput(
  //   phoneS,
  //   "input",
  //   phoneErrorS,
  //   false,
  //   phoneDigitValidShipPattern
  // );
  // validateInput(phoneS, "blur", phoneErrorS, false, phoneDigitValidShipPattern);
  // validatePhoneInput(phoneS, shipDigits);

  // -----------------EMAIL-----------------------
  const emailS = document.getElementById("txtsemail");
  const emailErrorS = document.getElementById("emailErrorS");
  validateInput(emailS, "input", emailErrorS, false, emailPattern);
  validateInput(emailS, "blur", emailErrorS, false, emailPattern);

  // / -----------------ADDRESS-----------------------
  const address1S = document.getElementById("txtsaddress1");
  const address1ErrorS = document.getElementById("add1ErrorS");
  validateInput(address1S, "input", address1ErrorS, false, nonEmptyPattern);
  validateInput(address1S, "blur", address1ErrorS, false, nonEmptyPattern);

  // -----------------SUITE-----------------------
  const address2S = document.getElementById("txtsaddress2");
  const address2ErrorS = document.getElementById("add2ErrorS");
  validateInput(address2S, "input", address2ErrorS, false, nonEmptyPattern);
  validateInput(address2S, "blur", address2ErrorS, false, nonEmptyPattern);

  // ---------------------FILTER STATES----------------------------
  const stateElementS = document.getElementById("txtsstate");
  const stateElementErrosS = document.getElementById("stateErrorS");
  const countryElementS = document.getElementById("shiptocountry");
  const countryElementErrorS = document.getElementById("countryErrorS");

  let checkShipKeyPressHandler = null;
  let checkShipInputHandler = null;

  function changeValidDigitsShip() {
    let shipPhonePattern = new RegExp(`^[1-9][0-9]{${shipDigits - 1}}$`);

    if (phoneS.value) {
      validateInput(phoneS, null, phoneErrorS, true, shipPhonePattern);
    }

    // Remove old keypress handler if exists
    if (checkShipKeyPressHandler) {
      phoneS.removeEventListener("keypress", checkShipKeyPressHandler);
    }

    if (checkShipInputHandler) {
      phoneS.removeEventListener("input", checkShipInputHandler);
    }

    checkShipKeyPressHandler = (event) => {
      if (!/\d/.test(event.key)) {
        event.preventDefault();
        return;
      }
      if (event.target.value[0] == 0) {
        event.preventDefault();
        return;
      }

      console.log("shipDigits", shipDigits);
      const cleaned = event.target.value.replace(/\D/g, "").replace(/^0+/, "");
      if (shipDigits) {
        if (cleaned.length >= shipDigits) {
          event.preventDefault();
          return;
        }
      } else {
        if (cleaned.length >= 10) {
          event.preventDefault();
          return;
        }
      }
    };

    checkShipInputHandler = (event) => {
      // console.log("shipPattern", shipPhonePattern);
      validateInput(phoneS, null, phoneErrorS, true, shipPhonePattern);
    };
    phoneS.addEventListener("keypress", checkShipKeyPressHandler);
    phoneS.addEventListener("input", checkShipInputHandler);
  }
  changeValidDigitsShip();

  countryElementS.addEventListener("change", () => {
    filterStates(
      "shiptocountry",
      "txtsstate",
      phoneS,
      phoneErrorS,
      false,
      "ship",
    );
    // if (phoneS.value) {
    //   validateInput(
    //     phoneS,
    //     null,
    //     phoneErrorS,
    //     true,
    //     phoneDigitValidShipPattern
    //   );
    // }
    changeValidDigitsShip();
  });

  const sameCheckElement = document.getElementById("billtocopy");
  sameCheckElement.addEventListener("change", (event) => {
    if (event.target.checked) {
      filterStates("shiptocountry", "txtsstate", null, null, true, "ship");

      countryElementS.addEventListener("change", () => {
        filterStates(
          "shiptocountry",
          "txtsstate",
          phoneS,
          phoneErrorS,
          false,
          "ship",
        );
        // if (phoneS.value) {
        //   validateInput(
        //     phoneS,
        //     null,
        //     phoneErrorS,
        //     true,
        //     phoneDigitValidShipPattern
        //   );
        // }
        changeValidDigitsShip();
      });

      // if (phoneS.value) {
      //   validateInput(
      //     phoneS,
      //     null,
      //     phoneErrorS,
      //     true,
      //     phoneDigitValidShipPattern
      //   );
      // }

      changeValidDigitsShip();
    }
  });

  // --------SUBMIT------------------
  const checkoutForm = document.getElementById("custinfoform");
  checkoutForm.addEventListener("submit", (event) => {
    const validFName = validateInput(
      fName,
      null,
      fNameError,
      true,
      namePattern,
    );
    const validLName = validateInput(
      lName,
      null,
      lNameError,
      true,
      namePattern,
    );
    const validCity = validateInput(city, null, cityError, true, namePattern);
    const validPhone = validateInput(
      phone,
      null,
      phoneError,
      true,
      phoneDigitValidBillPattern,
    );

    const validEmail = validateInput(
      email,
      null,
      emailError,
      true,
      emailPattern,
    );

    const validateAddress1 = validateInput(
      address1,
      null,
      address1Error,
      true,
      nonEmptyPattern,
    );

    const validateAddress2 = validateInput(
      address2,
      null,
      address2Error,
      true,
      nonEmptyPattern,
    );

    const validState = validateInput(
      stateElement,
      null,
      stateElementError,
      true,
      nonEmptyPattern,
    );
    const validCountry = validateInput(
      countryElement,
      null,
      countryElementError,
      true,
      nonEmptyPattern,
    );

    if (
      !validFName ||
      !validLName ||
      !validCity ||
      !validPhone ||
      !validEmail ||
      !validateAddress1 ||
      !validateAddress2 ||
      !validState ||
      !validCountry
    ) {
      event.preventDefault();
      // return;
    } else {
      // console.log(countryElement.value);
      // console.log(countryElement.find(":selected"));
      // console.log();
      countryElement.value = `${countryElement
        .find(":selected")
        .data("country-id")}~${countryElement.val()}`;
      event.preventDefault();
    }

    if (!document.getElementById("billtocopy").checked) {
      const validFName = validateInput(
        fNameS,
        null,
        fNameErrorS,
        true,
        namePattern,
      );
      const validLName = validateInput(
        lNameS,
        null,
        lNameErrorS,
        true,
        namePattern,
      );
      const validCity = validateInput(
        cityS,
        null,
        cityErrorS,
        true,
        namePattern,
      );
      const validPhone = validateInput(
        phoneS,
        null,
        phoneErrorS,
        true,
        phoneDigitValidShipPattern,
      );

      const validEmail = validateInput(
        emailS,
        null,
        emailErrorS,
        true,
        emailPattern,
      );

      const validateAddress1 = validateInput(
        address1S,
        null,
        address1ErrorS,
        true,
        nonEmptyPattern,
      );

      const validateAddress2 = validateInput(
        address2S,
        null,
        address2ErrorS,
        true,
        nonEmptyPattern,
      );

      const validCountryS = validateInput(
        countryElementS,
        null,
        countryElementErrorS,
        true,
        nonEmptyPattern,
      );
      const validStateS = validateInput(
        stateElementS,
        null,
        stateElementErrosS,
        true,
        nonEmptyPattern,
      );

      if (
        !validFName ||
        !validLName ||
        !validCity ||
        !validPhone ||
        !validEmail ||
        !validateAddress1 ||
        !validateAddress2 ||
        !validCountryS ||
        !validStateS
      ) {
        event.preventDefault();
        return;
      }
    }
    return;
  });
}

// ---------------------------------------------------------------------------------------
function togglePassword(element, toggler) {
  if (element) {
    if (element.type == "password") {
      element.type = "text";
      toggler.innerHTML = `<img src="${assets}nw_theme/images/eye-show.png" alt="Hide" width="20" height="20">`;
      return;
    }
    element.type = "password";
    toggler.innerHTML = `<img src="${assets}nw_theme/images/eye-hide.png" alt="Hide" width="20" height="20">`;
  }
}

const passToggler = document.querySelector(".passToggler");
const loginPass = document.getElementById("webshop_password");
const regPass = document.getElementById("txtregpassword");
const newPass = document.getElementById("new_password");
const confirmNewPass = document.getElementById("confirm_password");
if (passToggler) {
  passToggler.addEventListener("click", (event) => {
    if (loginPass) {
      togglePassword(loginPass, passToggler);
    } else if (regPass) {
      togglePassword(regPass, passToggler);
    }
  });
}

const phoneNosArray = document.querySelectorAll(".website-phone-number");
// console.log("phoneNosArrayphoneNosArray", phoneNosArray);
if (phoneNosArray.length) {
  // phoneNosArray.forEach((ele) => (ele.textContent = websitePhoneNumber));
}

export {
  namePattern,
  phonePattern,
  passPattern,
  emailPattern,
  nonEmptyPattern,
  validateInput,
  validatePhoneInput,
  togglePassword,
};

function filterStates(
  countryElementId,
  stateElementId,
  phoneElement,
  phoneErrorElement,
  onlyChange = false,
  toChangePhoneValid,
) {
  // console.log("toChangePhoneValidtoChangePhoneValid", toChangePhoneValid);
  let countryId = $(`#${countryElementId}`)
    .find(":selected")
    .data("country-id");
  let validPhoneDigit = Number(
    $(`#${countryElementId}`).find(":selected").attr("phonedigits"),
  );
  // console.log("phoneDigitValidphoneDigitValid", phoneDigitValid);
  phonePattern = new RegExp(`^[1-9][0-9]{${validPhoneDigit - 1}}$`);
  $(`#${stateElementId} option`).each(function () {
    var stateCountryId = $(this).data("country-id");
    if (
      stateCountryId != undefined &&
      stateCountryId.toString() === countryId.toString()
    ) {
      $(this).show();
    } else {
      $(this).hide();
    }
  });
  $(`#${stateElementId}`).val("");

  // console.log("toChangePhoneValidtoChangePhoneValid", toChangePhoneValid);

  if (toChangePhoneValid == "bill") {
    billDigits = validPhoneDigit;
    phoneDigitValidBillPattern = phonePattern;
  } else {
    shipDigits = validPhoneDigit;
    phoneDigitValidShipPattern = phonePattern;
  }

  // if (!onlyChange) {
  //   if (phoneElement.value) {
  //     validateInput(phoneElement, null, phoneErrorElement, true, phonePattern);
  //   }
  //   return;
  // }
}

// var mybutton = document.getElementById("back-to-top-btn");
// function topFunction() {
//   window.scrollTo({ top: 0, behavior: 'smooth' });
// }

document.addEventListener("DOMContentLoaded", () => {
  let navName =
    window.location.pathname.split("/")[
      window.location.pathname.split("/").length - 2
    ] + "_nav";

  if (document.querySelector(`.${navName}`)) {
    document.querySelector(`.${navName}`).classList.add("highlight-nav-option");
  }
});
