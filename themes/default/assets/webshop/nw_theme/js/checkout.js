document.addEventListener("DOMContentLoaded", function () {
  const sameCheckElement = document.getElementById("billtocopy");
  const billingDiv = document.getElementById("userbilling");
  const shippingDiv = document.getElementById("usershipping");
  const sameAddressCheckInput = document.getElementById(
    "billing_and_shipping_address_is_same"
  );

  function checkSameBillNShip() {
    if (sameCheckElement.checked) {
      shippingDiv.style.display = "none";
      sameAddressCheckInput.value = "1";
      return;
    }
    shippingDiv.style.display = "block";
    sameAddressCheckInput.value = "0";
  }
  checkSameBillNShip();

  sameCheckElement.addEventListener("change", (event) => {
    // console.log(event.target.checked);
    if (event.target.checked) {
      shippingDiv.style.display = "none";
      // sameCheckElement.value = "1";
      sameAddressCheckInput.value = "1";
      return;
    }
    shippingDiv.style.display = "block";
    // sameCheckElement.value = "0";
    sameAddressCheckInput.value = "0";
  });

  // Function to load and display applied coupon data
  function loadAppliedCoupon() {
    const couponData = sessionStorage.getItem("applied_coupon");

    if (couponData) {
      try {
        const coupon = JSON.parse(couponData);

        // Populate hidden fields with coupon data
        if (document.getElementById("coupon_code_id")) {
          document.getElementById("coupon_code_id").value = coupon.id;
        }
        if (document.getElementById("coupon_code_value")) {
          document.getElementById("coupon_code_value").value = coupon.code;
        }
        if (document.getElementById("coupon_code")) {
          document.getElementById("coupon_code").value = coupon.code;
        }
        if (document.getElementById("coupon_discount_rate")) {
          document.getElementById("coupon_discount_rate").value =
            coupon.discount_rate;
        }
        if (document.getElementById("coupon_discount_amount")) {
          document.getElementById("coupon_discount_amount").value =
            coupon.discount_amount;
        }

        if (document.getElementById("cart_subtotal_amt")) {
          document.getElementById("cart_subtotal_amt").value =
            coupon.cart_subtotal_amt;
        }

        // Display coupon information on checkout page
        // displayCouponInfo(coupon);

        // Update order total with discount
        // updateOrderTotalWithDiscount(coupon.discount_amount);

        console.log("Applied coupon loaded:", coupon);
      } catch (error) {
        console.error("Error parsing coupon data:", error);
        sessionStorage.removeItem("applied_coupon");
      }
    }
  }

  // Function to display coupon information
  function displayCouponInfo(coupon) {
    // Create or update coupon display area
    let couponDisplay = document.getElementById("applied_coupon_display");

    if (!couponDisplay) {
      couponDisplay = document.createElement("div");
      couponDisplay.id = "applied_coupon_display";
      couponDisplay.className = "applied-coupon-info";
      couponDisplay.style.cssText =
        "background: #e8f5e8; border: 1px solid #4caf50; padding: 10px; margin: 10px 0; border-radius: 5px;";

      // Insert after coupon form or at appropriate location
      const couponForm =
        document.querySelector(".source-key") ||
        document.querySelector(".coupon-form") ||
        document.getElementById("coupon-section");
      if (couponForm) {
        couponForm.parentNode.insertBefore(
          couponDisplay,
          couponForm.nextSibling
        );
      } else {
        // Insert at the top of the page if no coupon form found
        const container =
          document.querySelector(".container") ||
          document.querySelector(".main-content");
        if (container) {
          container.insertBefore(couponDisplay, container.firstChild);
        }
      }
    }

    couponDisplay.innerHTML = `
      <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
          <strong><i class="fa fa-check-circle" style="color: #4caf50;"></i> Coupon Applied: ${
            coupon.code
          }</strong>
          <br>
          <small>Discount: ${currencySymbol || "$"}${parseFloat(
      coupon.discount_amount
    ).toFixed(2)}</small>
        </div>
        <button type="button" onclick="removeAppliedCoupon()" class="btn btn-sm btn-danger" style="border-radius: 20px;">
          <i class="fa fa-times"></i> Remove
        </button>
      </div>
    `;
  }

  // Function to update order total with discount
  function updateOrderTotalWithDiscount(discountAmount) {
    const discount = parseFloat(discountAmount);

    // Find the order total element and update it
    const orderTotalElement =
      document.querySelector(".order-total") ||
      document.querySelector(".grand-total") ||
      document.querySelector("[data-total]");

    if (orderTotalElement) {
      const currentTotalText = orderTotalElement.textContent;
      const currentTotal = parseFloat(
        currentTotalText.replace(/[^0-9.-]+/g, "")
      );
      const newTotal = (currentTotal - discount).toFixed(2);

      // Update the total display
      orderTotalElement.innerHTML = orderTotalElement.innerHTML.replace(
        currentTotalText.match(/[\d,]+\.?\d*/)[0],
        newTotal
      );
    }

    // Also update any hidden total fields
    const totalInputs = document.querySelectorAll(
      'input[name*="total"], input[name*="amount"]'
    );
    totalInputs.forEach((input) => {
      if (input.value && !isNaN(input.value)) {
        const currentValue = parseFloat(input.value);
        input.value = (currentValue - discount).toFixed(2);
      }
    });
  }

  // Function to remove applied coupon
  window.removeAppliedCoupon = function () {
    // Remove from sessionStorage
    sessionStorage.removeItem("applied_coupon");

    // Clear hidden fields
    const fields = [
      "coupon_code_id",
      "coupon_code",
      "coupon_code_value",
      "coupon_discount_rate",
      "coupon_discount_amount",
    ];
    fields.forEach((fieldId) => {
      const field = document.getElementById(fieldId);
      if (field) field.value = "";
    });

    // Remove display
    const couponDisplay = document.getElementById("applied_coupon_display");
    if (couponDisplay) {
      couponDisplay.remove();
    }

    // Revert order total (you might need to recalculate this based on your logic)
    location.reload(); // Simple solution - reload page to reset totals

    console.log("Applied coupon removed");
  };

  // Function to handle coupon application on checkout page
  function setupCheckoutCouponForm() {
    const couponButton = document.querySelector(".code_submit");
    const couponInput = document.getElementById("discount");

    if (couponButton && couponInput) {
      couponButton.addEventListener("click", function (event) {
        event.preventDefault();

        if (!couponInput.value.trim()) {
          alert("Please enter coupon code");
          return;
        }

        // Get cart total from hidden field
        const cartTotalElement = document.getElementById("cart_total");
        if (cartTotalElement) {
          const cartTotal = cartTotalElement.value;

          // Call the apply_coupon function
          if (typeof apply_coupon === "function") {
            apply_coupon(couponInput.value.trim(), cartTotal);
          } else {
            console.error("apply_coupon function not found");
            alert("Coupon functionality not available");
          }
        } else {
          console.error("Cart total element not found");
          alert("Unable to calculate cart total");
        }
      });
    }
  }

  // Function to clear coupon data when order is submitted
  function clearCouponOnOrderSubmit() {
    // Listen for form submission
    const checkoutForm = document.getElementById("custinfoform");
    if (checkoutForm) {
      checkoutForm.addEventListener("submit", function () {
        // Clear coupon data from sessionStorage when order is submitted
        sessionStorage.removeItem("applied_coupon");
        console.log("Coupon data cleared on order submission");
      });
    }
  }

  // Load applied coupon when page loads
  loadAppliedCoupon();

  // Set up checkout coupon form
  setupCheckoutCouponForm();

  // Set up order submission handler
  clearCouponOnOrderSubmit();

  // Also listen for storage changes (in case coupon is applied from another tab)
  window.addEventListener("storage", function (e) {
    if (e.key === "applied_coupon") {
      if (e.newValue) {
        loadAppliedCoupon();
      } else {
        // Coupon was removed
        const couponDisplay = document.getElementById("applied_coupon_display");
        if (couponDisplay) {
          couponDisplay.remove();
        }
      }
    }
  });
});
