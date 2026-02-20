// let state = document.getElementById("billing_state");
// let formElement = document.getElementById("billingInfo");

// formElement.addEventListener("submit", (event) => {
//   if (
//     state.value === "default" ||
//     state.attributes["data-value"] == "default"
//   ) {
//     alert("Please select correct state value");
//     event.preventDefault();
//     return;
//   }

//   window.location.href = baseUrl + "webshop";
// });

document.addEventListener("DOMContentLoaded", () => {
  let URLparams = new URLSearchParams(window.location.search);
  if (URLparams.get("order_status") == "failure") {
    alert("Something went wrong with the payment process. Try again");
    window.location.href = baseUrl + " checkout";
    return;
  }

  const deliveryMode = document.getElementById("Delivery");
  const deliveryArea = document.getElementById("delivery-area");
  deliveryArea.style.display = "block";

  const firstName = document.getElementById("billing_first_name");
  const lastName = document.getElementById("billing_last_name");
  const email = document.getElementById("billing_email");
  const phoneNo = document.getElementById("billing_phone");
  const countryCode = document.getElementById("country_code");
  const address = document.getElementById("billing_address_1");
  const city = document.getElementById("billing_city");
  const terms = document.getElementById("checkoutTerms");
  const delivery = document.getElementById("Delivery");
  const areaCharges = document.getElementById("areachargess");
  const differentShipAddress = document.getElementById(
    "ship_to_different_address"
  );
  const shipFirstName = document.getElementById("shipping_first_name");
  const shipLastName = document.getElementById("shipping_last_name");
  const shipAddress = document.getElementById("shipping_address_1");
  const shipPhone = document.getElementById("shipping_phone");
  const shipCity = document.getElementById("shipping_city");
  // const shipPincode = document.getElementById("shipping_postcode");
  const shipEmail = document.getElementById("shipping_email");

  // document.getElementById("placeOrder");

  firstName.addEventListener("blur", (e) => {
    if (!firstName.value || !/^[A-Za-z]+$/.test(firstName.value)) {
      // if (!firstName.value) {
      firstName.classList.add("error");
    } else {
      firstName.classList.remove("error");
    }
  });

  firstName.addEventListener("keydown", (e) => {
    if (!/[a-zA-Z]/.test(e.key)) {
      e.preventDefault();
    }
  });

  firstName.addEventListener("input", (e) => {
    // console.log("name", firstName.value);
    if (!firstName.value) {
      firstName.classList.add("error");
    } else {
      firstName.classList.remove("error");
    }
  });

  lastName.addEventListener("blur", (e) => {
    if (!lastName.value || !/^[A-Za-z]+$/.test(lastName.value)) {
      // if (!lastName.value) {
      lastName.classList.add("error");
    } else {
      lastName.classList.remove("error");
    }
  });

  lastName.addEventListener("input", (e) => {
    if (!lastName.value) {
      lastName.classList.add("error");
    } else {
      lastName.classList.remove("error");
    }
  });

  lastName.addEventListener("keydown", (e) => {
    if (!/[a-zA-Z]/.test(e.key)) {
      e.preventDefault();
    }
  });

  phoneNo.addEventListener("blur", (e) => {
    if (!phoneNo.value) {
      phoneNo.classList.add("error");
      // countryCode.classList.add("error-code");
    } else {
      phoneNo.classList.remove("error");
      // countryCode.classList.remove("error-code");
    }
  });

  phoneNo.addEventListener("input", (e) => {
    if (!phoneNo.value) {
      phoneNo.classList.add("error");
    } else {
      phoneNo.classList.remove("error");
    }
  });

  phoneNo.addEventListener("keypress", (e) => {
    if (e.target.value[0] == 0) {
      e.preventDefault();
      return;
    }
  });

  city.addEventListener("blur", (e) => {
    if (!city.value || !/^[A-Za-z]+$/.test(city.value)) {
      city.classList.add("error");
    } else {
      city.classList.remove("error");
    }
  });

  city.addEventListener("input", (e) => {
    if (!city.value) {
      city.classList.add("error");
    } else {
      city.classList.remove("error");
    }
  });

  city.addEventListener("keydown", (e) => {
    if (!/[a-zA-Z]/.test(e.key)) {
      e.preventDefault();
    }
  });

  address.addEventListener("blur", (e) => {
    if (!address.value) {
      address.classList.add("error");
    } else {
      address.classList.remove("error");
    }
  });

  address.addEventListener("input", (e) => {
    if (!address.value) {
      address.classList.add("error");
    } else {
      address.classList.remove("error");
    }
  });

  terms.addEventListener("click", (e) => {
    if (!terms.checked) {
      terms.classList.add("error-terms");
    } else {
      terms.classList.remove("error-terms");
    }
  });

  areaCharges.addEventListener("change", (e) => {
    if (areaCharges.value) {
      areaCharges.classList.remove("error");
    }
  });

  $(".billing-state-dp").on("change", function () {
    if (!$(this).val()) {
      $(this).addClass("error");
    } else {
      $(this).removeClass("error");
    }
  });

  $(".billing-state-dp").on("paste", function (e) {
    e.preventDefault();
  });

  Array.from(document.querySelectorAll(".placeOrder")).forEach((btn) => {
    btn.addEventListener("click", function (e) {
      // console.log("code", countryCode);
      if (!firstName.value) {
        firstName.classList.add("error");
      } else {
        firstName.classList.remove("error");
      }

      if (!lastName.value) {
        lastName.classList.add("error");
      } else {
        lastName.classList.remove("error");
      }

      if (email.value) {
        const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
        if (!pattern.test(email.value)) {
          email.classList.add("error");
          e.preventDefault();
        } else {
          email.classList.remove("error");
        }
      }

      if (!address.value) {
        address.classList.add("error");
      } else {
        address.classList.remove("error");
      }

      if (!phoneNo.value) {
        phoneNo.classList.add("error");
        countryCode.classList.add("error-code");
      } else {
        phoneNo.classList.remove("error-code");
        countryCode.classList.remove("error");
      }

      if (!city.value) {
        city.classList.add("error");
      } else {
        city.classList.remove("error");
      }

      if (!terms.checked) {
        terms.classList.add("error-terms");
      } else {
        terms.classList.remove("error-terms");
      }

      if (delivery.checked) {
        if (!areaCharges.value) {
          areaCharges.classList.add("error");
          e.preventDefault();
        } else {
          areaCharges.classList.remove("error");
        }
      }

      if (!$(".billing-state-dp option:selected").val()) {
        $(".billing-state-dp").addClass("error");
        e.preventDefault();
      } else {
        $(".billing-state-dp").removeClass("error");
      }

      if (differentShipAddress.checked) {
        if (!shipFirstName.value) {
          shipFirstName.classList.add("error");
        } else {
          shipFirstName.classList.remove("error");
        }

        if (!shipLastName.value) {
          shipLastName.classList.add("error");
        } else {
          shipLastName.classList.remove("error");
        }

        if (!shipAddress.value) {
          shipAddress.classList.add("error");
        } else {
          shipAddress.classList.remove("error");
        }

        if (!shipPhone.value) {
          shipPhone.classList.add("error");
        } else {
          shipPhone.classList.remove("error");
        }

        if (!shipCity.value) {
          shipCity.classList.add("error");
        } else {
          shipCity.classList.remove("error");
        }

        if (shipEmail.value) {
          const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,}$/;
          if (!pattern.test(shipEmail.value)) {
            shipEmail.classList.add("error");
            e.preventDefault();
          } else {
            shipEmail.classList.remove("error");
          }
        }

        // if (!shipPincode.value) {
        //   shipPincode.classList.add("error");
        // } else {
        //   shipPincode.classList.remove("error");
        // }
      }
    });
  });

  differentShipAddress.addEventListener("click", () => {
    if (differentShipAddress.checked) {
      shipFirstName.setAttribute("required", "required");
      shipLastName.setAttribute("required", "required");
      shipAddress.setAttribute("required", "required");
      shipPhone.setAttribute("required", "required");
      shipCity.setAttribute("required", "required");
      // shipPincode.setAttribute("required", "required");
      // shipEmail.setAttribute("required", "required");

      shipFirstName.addEventListener("blur", (e) => {
        if (!shipFirstName.value) {
          shipFirstName.classList.add("error");
        } else {
          shipFirstName.classList.remove("error");
        }
      });

      shipFirstName.addEventListener("input", (e) => {
        if (!shipFirstName.value) {
          shipFirstName.classList.add("error");
        } else {
          shipFirstName.classList.remove("error");
        }
      });

      shipFirstName.addEventListener("keydown", (e) => {
        if (!/[a-zA-Z]/.test(e.key)) {
          e.preventDefault();
        }
      });

      shipLastName.addEventListener("blur", (e) => {
        if (!shipLastName.value) {
          shipLastName.classList.add("error");
        } else {
          shipLastName.classList.remove("error");
        }
      });

      shipLastName.addEventListener("input", (e) => {
        if (!shipLastName.value) {
          shipLastName.classList.add("error");
        } else {
          shipLastName.classList.remove("error");
        }
      });

      shipLastName.addEventListener("keydown", (e) => {
        if (!/[a-zA-Z]/.test(e.key)) {
          e.preventDefault();
        }
      });

      shipAddress.addEventListener("blur", (e) => {
        if (!shipAddress.value) {
          shipAddress.classList.add("error");
        } else {
          shipAddress.classList.remove("error");
        }
      });

      shipAddress.addEventListener("input", (e) => {
        if (!shipAddress.value) {
          shipAddress.classList.add("error");
        } else {
          shipAddress.classList.remove("error");
        }
      });

      shipPhone.addEventListener("blur", (e) => {
        if (!shipPhone.value) {
          shipPhone.classList.add("error");
        } else {
          shipPhone.classList.remove("error");
        }
      });

      shipPhone.addEventListener("input", (e) => {
        if (!shipPhone.value) {
          shipPhone.classList.add("error");
        } else {
          shipPhone.classList.remove("error");
        }
      });

      shipPhone.addEventListener("keypress", (e) => {
        if (e.target.value[0] == 0) {
          e.preventDefault();
          return;
        }
      });

      // shipCity.addEventListener("blur", (e) => {
      //   if (!shipCity.value) {
      //     shipCity.classList.add("error");
      //   } else {
      //     shipCity.classList.remove("error");
      //   }
      // });

      // shipCity.addEventListener("input", (e) => {
      //   if (!shipCity.value) {
      //     shipCity.classList.add("error");
      //   } else {
      //     shipCity.classList.remove("error");
      //   }
      // });

      shipCity.addEventListener("blur", (e) => {
        if (!shipCity.value || !/^[A-Za-z]+$/.test(shipCity.value)) {
          shipCity.classList.add("error");
        } else {
          shipCity.classList.remove("error");
        }
      });

      shipCity.addEventListener("input", (e) => {
        if (!shipCity.value) {
          shipCity.classList.add("error");
        } else {
          shipCity.classList.remove("error");
        }
      });

      shipCity.addEventListener("keydown", (e) => {
        if (!/[a-zA-Z]/.test(e.key)) {
          e.preventDefault();
        }
      });

      // shipPincode.addEventListener("blur", (e) => {
      //   if (!shipPincode.value) {
      //     shipPincode.classList.add("error");
      //   } else {
      //     shipPincode.classList.remove("error");
      //   }
      // });

      // shipPincode.addEventListener("input", (e) => {
      //   if (!shipPincode.value) {
      //     shipPincode.classList.add("error");
      //   } else {
      //     shipPincode.classList.remove("error");
      //   }
      // });
    } else {
      shipFirstName.removeAttribute("required");
      shipLastName.removeAttribute("required");
      shipAddress.removeAttribute("required");
      shipPhone.removeAttribute("required");
      shipCity.removeAttribute("required");
      // shipPincode.removeAttribute("required");
    }
  });
});
