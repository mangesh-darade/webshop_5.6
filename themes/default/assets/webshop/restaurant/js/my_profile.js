// ----------------------profile details element--------------------------------
const profileFName = document.getElementById("fName");
// const profileLName = document.getElementById("lName");
const pNameValid = document.getElementById("p-name-valid");
const profileDOB = document.getElementById("dob");
const pDobValid = document.getElementById("p-dob-valid");
const profileEmail = document.getElementById("email");
const pEmailValid = document.getElementById("p-email-valid");
const profilePhoneNumber = document.getElementById("profile-contact");
const profileform = document.getElementById("profile-form");

// -------------------------address modal elements------------------------------
const addressModalWS = document.getElementById("addressModalWS");
const shippingBoxesDiv = document.getElementById("shipping-boxes");
const aMAddressName = document.getElementById("address_name");
const aMNameValid = document.getElementById("am-name-valid");
// const aMCompanyName = document.getElementById("company_name");
// const aMCompanyValid = document.getElementById("am-company-valid");
const aMAddress_line_1 = document.getElementById("address_line_1");
const aMLine1Valid = document.getElementById("am-line1-valid");
const aMAddress_line_2 = document.getElementById("address_line_2");
const aMLine2Valid = document.getElementById("am-line2-valid");
const aMCity = document.getElementById("city");
const aMCityValid = document.getElementById("am-city-valid");
const aMPincode = document.getElementById("postal_code");
const aMPincodeValid = document.getElementById("am-pincode-valid");
const aMState = document.getElementById("state");
const aMStateValid = document.getElementById("am-state-valid");
const aMCountry = document.getElementById("country");
// const aMCountryValid = document.getElementById("am-country-valid");
const aMContact = document.getElementById("phone");
const aMContactValid = document.getElementById("am-phone-valid");
const aMEmail = document.getElementById("email_id");
const aMEmailValid = document.getElementById("am-email-valid");
const isDefaultAddress = document.getElementById("default_address");
const aMAction = document.getElementById("addressModalAction");
const customerId = document.getElementById("customer_id");
const addressId = document.getElementById("address_id");

// const submitAddress = document.getElementById("manage-address");

// <div>
//   <img src="${assets}restaurant/img/addr_delete_icon.svg.svg" />
// </div>;
// -------------------------populate addresses------------------------------------
async function populateProfileDetails() {
  const response = await fetch(`${baseUrl}/your_profile`);
  const data = await response.json();
  const customerData = data.customer;
  // console.log("customerData", customerData);
  if (customerData) {
    profileFName.value = customerData.name ? customerData.name : "";
    // profileLName.value = customerData.name;
    profileDOB.value = customerData.dob ? customerData.dob : "";
    profileEmail.value = customerData.email ? customerData.email : "";
    profilePhoneNumber.value = customerData.phone ? customerData.phone : "";
    customerId.value = customerData.id;

    // Show billing address from companies table
    //  const billingAddressInput = document.getElementById("Billing_Address_Input");
    //   if (billingAddressInput) {
    //     const billingText = [
    //       customerData.address,
    //       customerData.city,
    //       customerData.state,
    //       customerData.postal_code,
    //       customerData.country
    //     ].filter(Boolean).join(", ");

    //     billingAddressInput.value = billingText;
    //     billingAddressInput.title = billingText; // ✅ Tooltip on hover
    //   }
  }
}

async function populateAddresses() {
  const addressResponse = await fetch(`${baseUrl}/your_address`);
  const addressDataJSON = await addressResponse.json();
  const customer_id = addressDataJSON.customer_id;
  // console.log("addressDataJSON", addressDataJSON);
  const addressesData = addressDataJSON.addresses;
  // console.log("addressesData", addressesData);

  // Populate billing address in Billing_Address_Input field
  const billingAddressInput = document.getElementById("Billing_Address_Input");
  if (
    billingAddressInput &&
    addressesData &&
    Object.keys(addressesData).length
  ) {
    const defaultBilling =
      Object.values(addressesData).find((addr) => addr.is_default === "1") ||
      Object.values(addressesData)[0];
    if (defaultBilling) {
      const billingText = [
        defaultBilling.address_name,
        defaultBilling.email_id,
        defaultBilling.phone,
        defaultBilling.line1,
        defaultBilling.line2,
        defaultBilling.city,
        // defaultBilling.state,
        defaultBilling.postal_code,
        defaultBilling.country,
      ]
        .filter(Boolean)
        .join(", ");
      billingAddressInput.value = billingText;
      billingAddressInput.title = billingText; // Tooltip on hover
    }
  }

  if (Object.keys(addressesData).length) {
    const addressesArray = [];
    Object.keys(addressesData).map(
      (key) => addressesArray.push(addressesData[key])
      // console.log(addressesData[key])
    );
    addressesArray.sort((a, b) => b["is_default"] - a["is_default"]);
    // console.log("addressesArray", addressesArray);
    shippingBoxesDiv.innerHTML = "";
    shippingBoxesDiv.innerHTML = `
          ${addressesArray
            .map((address) => {
              return `<div class="shipping-box ${
                address["is_default"] === "1" ? "primary" : ""
              } " type="button" data-toggle="modal" data-target="#addressModalWS" id="${
                address["id"]
              }">
              <div class="icon-prim-div">
                ${
                  address["is_default"] === "1"
                    ? "<span class='primary-text'>Primary Address</span>"
                    : ""
                }
                <img src="${assets}restaurant/img/edit_address_icon.svg" class="edit-address-icon"/>
              </div>
              <div class="address-label">${
                address["label"] ? address["label"] : ""
              }</div>
                      ${
                        address["address_name"] ? address["address_name"] : ""
                      }<br/>
                      ${
                        address["company_name"]
                          ? address["company_name"] + ","
                          : ""
                      } 
                      ${
                        address["email_id"] ? address["email_id"] + "<br/>" : ""
                      }    
                      ${address["line1"] ? address["line1"] + "," : ""}${
                address["line2"] ? address["line2"] + "," : ""
              } 
                      ${
                        address["postal_code"] ? address["postal_code"] : ""
                      }  ${address["city"] ? address["city"] + "," : ""} ${
                address["state"] ? address["state"] + "," : ""
              }
                      ${address["country"] ? address["country"] : ""}.
                  </div>`;
            })
            .join("")}`;
    shippingBoxesDiv.insertAdjacentHTML(
      "beforeend",
      `<div class="shipping-box add-new" type="button" data-toggle="modal" data-target="#addressModalWS">
          <img src="${assets}/restaurant/img/add_address_icon.svg" alt="add-address-icon.svg" />
        </div>`
    );
  }

  Array.from(document.querySelectorAll(".shipping-box")).map((box) => {
    box.addEventListener("click", (e) => {
      let id = e.target.closest(".shipping-box").id;
      if (id) {
        aMAddressName.value = addressesData[id]["address_name"];
        // aMCompanyName.value = addressesData[id]["company_name"];
        aMAddress_line_1.value = addressesData[id]["line1"];
        aMAddress_line_2.value = addressesData[id]["line2"];
        aMCity.value = addressesData[id]["city"];
        aMPincode.value = addressesData[id]["postal_code"];
        aMState.value = addressesData[id]["state"];

        aMCountry.value = addressesData[id]["country"];
        const postalDiv = document.querySelector(".postal-div");
        const cityDiv = document.querySelector(".city-div");
        let hasPostalCode =
          aMCountry.selectedOptions[0].getAttribute("haspostalcode");
        let selectedCountryName =
          aMCountry.selectedOptions[0].getAttribute("id");
        Array.from(document.getElementById("country-code").options).find(
          (opt) => opt.getAttribute("countryName") === selectedCountryName
        ).selected = true;
        const selectedOptionValue =
          countryDropdown.options[countryDropdown.selectedIndex].id;
        countryDropdown.options[countryDropdown.selectedIndex].textContent =
          selectedOptionValue;
        Array.from(countryDropdown.options).map((option) => {
          if (option.id !== selectedOptionValue)
            option.textContent = `(${option.id}) ${option.attributes.countryname.value}`;
        });
        if (hasPostalCode == "true") {
          aMPincode.value = "";
          postalDiv.style.display = "block";
          cityDiv.classList.remove("col-md-12");
          cityDiv.classList.add("col-md-6");
        } else {
          postalDiv.style.display = "none";
          aMPincode.value = "000000";
          cityDiv.classList.add("col-md-12");
          cityDiv.classList.remove("col-md-6");
        }

        // const capitalizedCountry = addressesData[id]["country"]
        //   .split(" ")
        //   .map((word) => {
        //     newWord = "";
        //     for (let i = 0; i < word.length; i++) {
        //       if (i === 0) {
        //         newWord = newWord + word[i].toUpperCase();
        //       } else {
        //         newWord = newWord + word[i];
        //       }
        //     }
        //     return newWord;
        //   })
        //   .join(" ");
        // aMCountry.aMCountry.value = capitalizedCountry;
        // document.getElementById(capitalizedCountry).classList.add("selected");

        aMContact.value = addressesData[id]["phone"];
        aMEmail.value = addressesData[id]["email_id"];
        addressId.value = addressesData[id]["id"];
        addressesData[id]["is_default"] == "1" ? isDefaultAddress.click() : "";
      } else {
        aMAction.value = "add";
        aMAddressName.value = "";
        // aMCompanyName.value = "";
        aMAddress_line_1.value = "";
        aMAddress_line_2.value = "";
        aMCity.value = "";
        aMPincode.value = "";
        aMState.value = "";
        // aMCountry.value = "";
        aMContact.value = "";
        aMEmail.value = "";
        addressId.value = "";
      }
      customerId.value = customer_id;
    });
  });

  document
    .getElementById("close-address-modal")
    .addEventListener("click", (event) => {
      window.location.reload();
    });

  aMCountry.addEventListener("change", (event) => {
    const postalDiv = document.querySelector(".postal-div");
    const cityDiv = document.querySelector(".city-div");
    const countryDropdown = document.getElementById("country-code");

    let hasPostalCode =
      aMCountry.selectedOptions[0].getAttribute("haspostalcode");
    let selectedCountryName = aMCountry.selectedOptions[0].getAttribute("id");
    Array.from(document.getElementById("country-code").options).find(
      (opt) => opt.getAttribute("countryName") === selectedCountryName
    ).selected = true;
    const selectedOptionValue =
      countryDropdown.options[countryDropdown.selectedIndex].id;
    countryDropdown.options[countryDropdown.selectedIndex].textContent =
      selectedOptionValue;
    Array.from(countryDropdown.options).map((option) => {
      if (option.id !== selectedOptionValue)
        option.textContent = `(${option.id}) ${option.attributes.countryname.value}`;
    });
    validateAMContact();

    if (hasPostalCode == "true") {
      aMPincode.value = "";
      postalDiv.style.display = "block";
      cityDiv.classList.remove("col-md-12");
      cityDiv.classList.add("col-md-6");
      return;
    }
    postalDiv.style.display = "none";
    aMPincode.value = "000000";
    cityDiv.classList.add("col-md-12");
    cityDiv.classList.remove("col-md-6");
  });

  const countryDropdown = document.getElementById("country-code");
  countryDropdown.options[countryDropdown.selectedIndex].textContent =
    countryDropdown.options[countryDropdown.selectedIndex].id;
  countryDropdown.addEventListener("change", (event) => {
    const postalDiv = document.querySelector(".postal-div");
    const selectedOptionValue =
      countryDropdown.options[countryDropdown.selectedIndex].id;
    countryDropdown.options[countryDropdown.selectedIndex].textContent =
      selectedOptionValue;
    Array.from(countryDropdown.options).map((option) => {
      if (option.id !== selectedOptionValue)
        option.textContent = `(${option.id}) ${option.attributes.countryname.value}`;
    });

    let hasPostalCode =
      countryDropdown.selectedOptions[0].getAttribute("haspostalcode");
    aMCountry.value =
      countryDropdown.selectedOptions[0].getAttribute("countryName");
    validateAMContact();

    filterStates();

    if (hasPostalCode == "true") {
      aMPincode.value = "";
      postalDiv.style.display = "block";
      return;
    }
    postalDiv.style.display = "none";
    aMPincode.value = "000000";
  });

  addressModalWS.addEventListener("submit", async (event) => {
    event.preventDefault();
    const a = validateAMAddressName();
    // const b = validateAMCompanyName();
    const c = validateAMCity();
    const d = validateAMLine1();
    const e = validateAMLine2();
    const f = validateAMPincode();
    const g = validateAMState();
    // const h = validateAMCountry();
    const i = validateAMContact();
    const j = validateAMEmail();
    if (!a || !c || !d || !e || !f || !g || !i || !j) return;

    let default_address = 0;
    if (isDefaultAddress.checked) {
      default_address = 1;
    }
    const req = await fetch(`${baseUrl}/manage_address_webshop`, {
      headers: { "Content-Type": "application/json" },
      method: "POST",
      body: JSON.stringify({
        address_name: aMAddressName.value,
        // company_name: aMCompanyName.value,
        line1: aMAddress_line_1.value,
        line2: aMAddress_line_2.value,
        city: aMCity.value,
        postal_code: aMPincode.value,
        state: aMState.value,
        country: aMCountry.value,
        phone: aMContact.value,
        email_id: aMEmail.value,
        is_default: default_address,
        customer_id: customerId.value,
        address_id: addressId.value,
        addressAction: aMAction.value,
      }),
    });
    const res = await req.json();
    if (res.statusMessage == "success") {
      alert("Address updated successfully.");
      window.location.reload();
    } else {
      alert("something went wrong. Please try again.");
      window.location.reload();
    }
  });
}

function validateProfileName() {
  // if (profileFName.value === profName) return false;
  if (profileFName.value.trim().length == 0) {
    profileFName.classList.add("error");
    pNameValid.classList.add("p-error");
    pNameValid.classList.remove("p-correct");
    return false;
  } else if (!/^[A-Za-z ]+$/.test(profileFName.value)) {
    profileFName.classList.add("error");
    pNameValid.classList.add("p-error");
    pNameValid.classList.remove("p-correct");
    return false;
  } else {
    profileFName.classList.remove("error");
    pNameValid.classList.remove("p-error");
    pNameValid.classList.add("p-correct");
  }
  return true;
}

function validateProfileEmail() {
  // if (profileEmail.value == profEmail) return false;
  if (profileEmail.value) {
    if (
      profileEmail.value === "" ||
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(profileEmail.value)
    ) {
      profileEmail.classList.add("error");
      pEmailValid.classList.add("p-error");
      pEmailValid.classList.remove("p-correct");
      return false;
    } else {
      profileEmail.classList.remove("error");
      pEmailValid.classList.remove("p-error");
      pEmailValid.classList.add("p-correct");
    }
    return true;
  }
  return true;
}

function validateProfileDob() {
  // if (profileDOB.value == profDob) return false;
  // console.log("profileDOB.value", profileDOB.value);
  if (profileDOB.value) {
    let today = new Date();
    let date = `${today.getFullYear()}-${
      today.getMonth() < 10
        ? "0" + (Number(today.getMonth()) + 1)
        : Number(today.getMonth()) + 1
    }-${today.getDay() < 10 ? "0" + today.getDate() : today.getDay()}`;

    if (
      profileDOB.value === "" ||
      new Date(profileDOB.value) >= new Date(date)
    ) {
      profileDOB.classList.add("error");
      pDobValid.classList.add("p-error");
      pDobValid.classList.remove("p-correct");
      return false;
    } else {
      profileDOB.classList.remove("error");
      pDobValid.classList.remove("p-error");
      pDobValid.classList.add("p-correct");
    }
    return true;
  }
  return true;
}

function validateAMAddressName() {
  if (aMAddressName.value === "" || !/^[A-Za-z ]+$/.test(aMAddressName.value)) {
    aMAddressName.classList.add("error");
    aMNameValid.classList.add("p-error");
    aMNameValid.classList.remove("p-correct");
    return false;
  } else {
    aMAddressName.classList.remove("error");
    aMNameValid.classList.remove("p-error");
    aMNameValid.classList.add("p-correct");
  }
  return true;
}

// function validateAMCompanyName() {
//   if (aMCompanyName.value === "" || !/^[A-Za-z ]+$/.test(aMCompanyName.value)) {
//     aMCompanyName.classList.add("error");
//     aMCompanyValid.classList.add("p-error");
//     aMCompanyValid.classList.remove("p-correct");
//     return false;
//   } else {
//     aMCompanyName.classList.remove("error");
//     aMCompanyValid.classList.remove("p-error");
//     aMCompanyValid.classList.add("p-correct");
//   }
//   return true;
// }

function validateAMLine1() {
  if (aMAddress_line_1.value === "") {
    aMAddress_line_1.classList.add("error");
    aMLine1Valid.classList.add("p-error");
    aMLine1Valid.classList.remove("p-correct");
    return false;
  } else {
    aMAddress_line_1.classList.remove("error");
    aMLine1Valid.classList.remove("p-error");
    aMLine1Valid.classList.add("p-correct");
  }
  return true;
}

function validateAMLine2() {
  if (aMAddress_line_2.value === "") {
    aMAddress_line_2.classList.add("error");
    aMLine2Valid.classList.add("p-error");
    aMLine2Valid.classList.remove("p-correct");
    return false;
  } else {
    aMAddress_line_2.classList.remove("error");
    aMLine2Valid.classList.remove("p-error");
    aMLine2Valid.classList.add("p-correct");
  }
  return true;
}

function validateAMCity() {
  if (aMCity.value === "" || !/^[A-Za-z ]+$/.test(aMCity.value)) {
    aMCity.classList.add("error");
    aMCityValid.classList.add("p-error");
    aMCityValid.classList.remove("p-correct");
    return false;
  } else {
    aMCity.classList.remove("error");
    aMCityValid.classList.remove("p-error");
    aMCityValid.classList.add("p-correct");
  }
  return true;
}

function validateAMPincode() {
  return true;
  if (aMPincode.value === "") {
    aMPincode.classList.add("error");
    aMPincodeValid.classList.add("p-error");
    aMPincodeValid.classList.remove("p-correct");
    return false;
  } else {
    aMPincode.classList.remove("error");
    aMPincodeValid.classList.remove("p-error");
    aMPincodeValid.classList.add("p-correct");
  }
  return true;
}

function validateAMState() {
  if (aMState.value === "" || aMState.value == "Select State") {
    aMState.classList.add("error");
    aMStateValid.classList.add("p-error");
    aMStateValid.classList.remove("p-correct");
    return false;
  }
  aMState.classList.remove("error");
  aMStateValid.classList.remove("p-error");
  aMStateValid.classList.add("p-correct");
  return true;

  if (aMState.value === "" || !/^[A-Za-z ]+$/.test(aMState.value)) {
    aMState.classList.add("error");
    aMStateValid.classList.add("p-error");
    aMStateValid.classList.remove("p-correct");
    return false;
  } else {
    aMState.classList.remove("error");
    aMStateValid.classList.remove("p-error");
    aMStateValid.classList.add("p-correct");
  }
  return true;
}

// function validateAMCountry() {
//   if (aMCountry.value === "") {
//     aMCountry.classList.add("error");
//     aMCountryValid.classList.add("p-error");
//     aMCountryValid.classList.remove("p-correct");
//     return false;
//   } else {
//     aMCountry.classList.remove("error");
//     aMCountryValid.classList.remove("p-error");
//     aMCountryValid.classList.add("p-correct");
//   }
//   return true;
// }

function validateAMContact() {
  // console.log("isvalidatngg");
  const aMCountry = document.getElementById("country");

  const digitsLength = Number(
    aMCountry.selectedOptions[0].getAttribute("phonedigits")
  );
  const regex = new RegExp(`^[0-9]{${digitsLength}}$`);

  // console.log("regex", regex);
  // console.log("selected", aMCountry.selectedOptions[0]);
  if (
    aMContact.value === "" ||
    !regex.test(aMContact.value.trim()) ||
    aMContact.value[0] == 0
  ) {
    aMContact.classList.add("error");
    aMContactValid.classList.add("p-error");
    aMContactValid.classList.remove("p-correct");
    return false;
  } else {
    aMContact.classList.remove("error");
    aMContactValid.classList.remove("p-error");
    aMContactValid.classList.add("p-correct");
  }
  return true;
}

function validateAMEmail() {
  if (aMEmail.value) {
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(aMEmail.value)) {
      aMEmail.classList.add("error");
      aMEmailValid.classList.add("p-error");
      aMEmailValid.classList.remove("p-correct");
      return false;
    } else {
      aMEmail.classList.remove("error");
      aMEmailValid.classList.remove("p-error");
      aMEmailValid.classList.add("p-correct");
    }
    return true;
  }
  return true;
}

profileFName.addEventListener("blur", (event) => {
  if (!validateProfileName()) event.preventDefault;
});
profileEmail.addEventListener("blur", (event) => {
  if (!validateProfileEmail()) event.preventDefault();
});
profileDOB.addEventListener("blur", (even) => {
  if (!validateProfileDob()) even.preventDefault();
});
profileFName.addEventListener("input", (event) => {
  if (!validateProfileName()) event.preventDefault;
});
profileEmail.addEventListener("input", (event) => {
  if (!validateProfileEmail()) event.preventDefault();
});
profileDOB.addEventListener("input", (event) => {
  if (!validateProfileDob()) event.preventDefault();
});

aMAddressName.addEventListener("blur", (event) => {
  if (!validateAMAddressName()) event.preventDefault();
});
// aMCompanyName.addEventListener("blur", (event) => {
//   if (!validateAMCompanyName()) event.preventDefault();
// });
aMAddress_line_1.addEventListener("blur", (event) => {
  if (!validateAMLine1()) event.preventDefault();
});
aMAddress_line_2.addEventListener("blur", (event) => {
  if (!validateAMLine2()) event.preventDefault();
});
aMCity.addEventListener("blur", (event) => {
  if (!validateAMCity()) event.preventDefault();
});
aMPincode.addEventListener("blur", (event) => {
  if (!validateAMPincode()) event.preventDefault();
});
aMState.addEventListener("blur", (event) => {
  if (!validateAMState()) event.preventDefault();
});
// aMCountry.addEventListener("blur", (event) => {
//   if (!validateAMCountry()) event.preventDefault();
// });
aMContact.addEventListener("blur", (event) => {
  if (!validateAMContact()) event.preventDefault();
});
aMEmail.addEventListener("blur", (event) => {
  if (!validateAMEmail()) event.preventDefault();
});
// ------------------
aMAddressName.addEventListener("input", (event) => {
  if (!validateAMAddressName()) event.preventDefault();
});
// aMCompanyName.addEventListener("input", (event) => {
//   if (!validateAMCompanyName()) event.preventDefault();
// });
aMAddress_line_1.addEventListener("input", (event) => {
  if (!validateAMLine1()) event.preventDefault();
});
aMAddress_line_2.addEventListener("input", (event) => {
  if (!validateAMLine2()) event.preventDefault();
});
aMCity.addEventListener("input", (event) => {
  if (!validateAMCity()) event.preventDefault();
});
aMPincode.addEventListener("input", (event) => {
  if (!validateAMPincode()) event.preventDefault();
});
aMState.addEventListener("input", (event) => {
  if (!validateAMState()) event.preventDefault();
});
// aMCountry.addEventListener("change", (event) => {
//   if (!validateAMCountry()) event.preventDefault();
// });
aMContact.addEventListener("input", (event) => {
  if (!validateAMContact()) event.preventDefault();
});
aMContact.addEventListener("keypress", function (e) {
  const aMCountry = document.getElementById("country");

  const digitsLength = Number(
    aMCountry.selectedOptions[0].getAttribute("phonedigits")
  );
  const regex = new RegExp(`^[0-9]{${digitsLength}}$`);
  if (!/\d/.test(e.key)) {
    e.preventDefault();
    return;
  }
  const cleaned = this.value.replace(/\D/g, "").replace(/^0+/, "");
  if (cleaned.length >= digitsLength) {
    e.preventDefault();
  }
});

aMEmail.addEventListener("input", (event) => {
  if (!validateAMEmail()) event.preventDefault();
});
// ---------------------------------------------------------
document.addEventListener("DOMContentLoaded", async () => {
  await populateProfileDetails();
  let profName = profileFName.value;
  let profDob = profileDOB.value;
  let profEmail = profileEmail.value;
  await populateAddresses();

  profileform.addEventListener("submit", async (event) => {
    event.preventDefault();
    if (
      !validateProfileName() ||
      !validateProfileDob() ||
      !validateProfileEmail()
    ) {
      return;
    }

    let nameStr = "";
    let inputNameArr = profileFName.value.trim().split(/\s+/);
    inputNameArr.map((word, idx) => {
      if (word) {
        if (idx == 0) {
          nameStr = word;
        } else {
          nameStr = nameStr + " " + word;
        }
      }
    });

    let req = await fetch(`${baseUrl}/profile_update_webshop`, {
      method: "POST",
      body: JSON.stringify({
        fName: nameStr,
        email: profileEmail.value,
        dob: profileDOB.value,
      }),
    });
    let status = await req.json();
    if (status.statusMessage === "success") {
      alert("Profile updated sucessfully.");
      window.location.reload();
      return;
    }
    alert("Something went wrong . Please try again later.");
    window.location.reload();
  });

  $("#country").on("change", function () {
    console.log("changing");
    filterStates();
  });
});

profileTab.addEventListener("click", async (e) => {
  await populateProfileDetails();
  await populateAddresses();
});

// Array.from(document.querySelectorAll("delete-address-modal")).map(
//   (deleteBtn) => {
//     console.log("deleteBtn", deleteBtn);
//     deleteBtn.addEventListener("click", (event) => {
//       event.target.closest(".shipping-box").id;
//       console.log(event.target.closest(".shipping-box"));
//       event.stopPropagation();
//     });
//   }
// );

function filterStates() {
  let countryId = $("#country").find(":selected").data("country-id");
  // var countryId = countryValue.split("~")[0];
  $("#state option").each(function () {
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
  // Reset selection
  $("#state").val("");
}
// On page load
filterStates();
// On country change
