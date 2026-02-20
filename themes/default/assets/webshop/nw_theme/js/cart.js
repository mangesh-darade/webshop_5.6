document.addEventListener("DOMContentLoaded", function () {
  sessionStorage.removeItem("applied_coupon");
  const couponForm = document.querySelector(".source-key");
  const couponInput = document.getElementById("discount");

  // Handle form submission for coupon code
  if (couponForm) {
    couponForm.addEventListener("submit", (event) => {
      event.preventDefault(); // Prevent default form submission and page reload

      if (!couponInput.value.trim()) {
        alert("Please enter coupon code");
        return;
      }

      // Get cart total from the page
      const cartTotalElement = document.querySelector(
        "#cart_original_subtotal"
      );
      if (cartTotalElement) {
        // const cartTotalText = cartTotalElement.value;
        const cartTotal = cartTotalElement.value;
        // console.log("cartTotalcartTotal", cartTotal);
        // const cartTotal = parseFloat(cartTotalText.replace(/[^0-9.-]+/g, ""));

        // Call the apply_coupon function from common.js
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

  // Override the apply_coupon function to handle cart-specific updates
  window.apply_coupon = function (coupon_code, cart_amount) {
    if ($("#coupon_code_id").val()) {
      $("#coupon_code_response").html(
        "<i class='fa fa-info-circle'></i> Coupon already applied."
      );
      return;
    }

    let postData = "action=apply_coupon";
    postData = postData + "&coupon_code=" + coupon_code;
    postData = postData + "&cart_amount=" + cart_amount;

    $("#coupon_code_response").show();

    $.ajax({
      type: "POST",
      url: baseUrl + "webshop_request",
      data: postData,
      beforeSend: function () {
        $("#coupon_code_response").html(
          "<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Loading Cart Items</div>"
        );
      },
      success: function (data) {
        var objData = JSON.parse(data);

        if (objData.status == "success") {
          if (
            parseFloat(objData.coupon_data.aplied_discount_amount) >
            parseFloat(cart_amount)
          ) {
            $("#coupon_code_response").html(
              "<i class='fa fa-times-circle'></i> Discount cannot exceed total amount."
            );
            alert(
              "Coupon discount is greater than cart total. Cannot apply this coupon."
            );
            return;
          }
          alert("Coupon applied successfully!");
          $("#coupon_code_response").html(
            '<i class="fa fa-check"></i> ' + objData.msg
          );
          $("#coupon_code_response").addClass("success-coupon-msg");
          $("#coupon_code_response").removeClass("error-coupon-msg");
          // Update cart total display
          var baseTotal = parseFloat(cart_amount);
          var discount = parseFloat(objData.coupon_data.aplied_discount_amount);
          var cart_total = (baseTotal - discount).toFixed(2);

          // Save coupon data to sessionStorage for checkout page
          const couponData = {
            id: objData.coupon_data.id,
            code: coupon_code,
            discount_rate: objData.coupon_data.discount_rate,
            discount_amount: objData.coupon_data.aplied_discount_amount,
            applied_at: new Date().toISOString(),
            cart_subtotal_amt: baseTotal - discount,
            cart_total: baseTotal,
          };
          sessionStorage.setItem("applied_coupon", JSON.stringify(couponData));

          // Update hidden fields
          $("#coupon_code_id").val(objData.coupon_data.id);
          $("#coupon_code_value").val(coupon_code);
          $("#coupon_discount_rate").val(objData.coupon_data.discount_rate);
          $("#coupon_discount_amount").val(
            objData.coupon_data.aplied_discount_amount
          );

          //   // Update cart total display
          //   var baseTotal = parseFloat(cart_amount);
          //   var discount = parseFloat(objData.coupon_data.aplied_discount_amount);
          //   var cart_total = (baseTotal - discount).toFixed(2);

          // Update the grand total display
          $(".grand-total").html(`Total:  ${currencySymbol} ${cart_total}`);

          // Show discount information
          $("#coupon_code_response").append(
            "<br><small>Discount applied: " +
              currencySymbol +
              parseFloat(objData.coupon_data.aplied_discount_amount).toFixed(
                2
              ) +
              "</small>"
          );
        } else if (objData.status == "failed") {
          alert(objData.msg);
          $("#coupon_code_response").html(
            '<i class="fa fa-times-circle"></i> ' + objData.msg
          );
          $("#coupon_code_response").addClass("error-coupon-msg");
          $("#coupon_code_response").removeClass("success-coupon-msg");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        $("#coupon_code_response").html(
          '<i class="fa fa-times-circle"></i> Error applying coupon. Please try again.'
        );
      },
    });
  };
  document
    .querySelector("#coupon_code_response")
    .addEventListener("click", (event) => {
      console.log(couponInput);
      if (
        !document
          .querySelector("#coupon_code_response")
          .classList.contains("error-coupon-msg")
      )
        return;
      couponInput.value = "";
      document.querySelector(".error-coupon-msg").style.display = "none";
    });
});
