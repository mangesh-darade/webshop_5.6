let timerId = 1000;
async function remove_cart_item(itemKey) {
  let obj = {
    action: "remove_cart_item",
    action_source: "cart_page",
    cart_item_key: itemKey,
  };

  $.ajax({
    type: "POST",
    url: baseUrl + "webshop_request",
    data: obj,
    success: function (data) {
      alert("Cart updated successfully!");
      window.location.reload();
    },
    error: function (xhr, status, error) {
      console.log("Error:", status, error);
      alert("Something went wrong please try again later");
    },
  });
}

// let updateCartButton = document.getElementById("updateCartButton");
// updateCartButton.addEventListener("click", () => {
//   window.location.reload();
//   alert("Cart updated successfully!");
// });

function updateCartItem(itemKey, quantity) {
  let obj = {
    action: "update_cart",
    itemKey: itemKey,
    itemQty: quantity,
  };

  $.ajax({
    type: "POST",
    url: baseUrl + "webshop_request",
    data: obj,
    success: function (data) {
      console.log(timerId);

      if (timerId) {
        clearTimeout(timerId);
      }
      timerId = setTimeout(() => {
        alert("Cart updated successfully!");
        window.location.reload();
      }, 1000);
    },
    error: function (xhr, status, error) {
      console.log("Error:", status, error);
      alert("Something went wrong please try again later");
    },
  });
}

document
  .querySelector("#cartItems")
  .addEventListener("click", function (event) {
    if (
      event.target.classList.contains("quantity-minus") ||
      event.target.classList.contains("fa-minus")
    ) {
      let input = event.target
        .closest(".quantity-box")
        .querySelector(".qty-input");
      if (input.value == 0) {
        remove_cart_item(input.id);
      } else {
        updateCartItem(input.id, input.value);
      }
    }

    if (
      event.target.classList.contains("quantity-plus") ||
      event.target.classList.contains("fa-plus")
    ) {
      let input = event.target
        .closest(".quantity-box")
        .querySelector(".qty-input");
      if (input.value == 0) {
        remove_cart_item(input.id);
      } else {
        updateCartItem(input.id, input.value);
      }
    }
  });

document.addEventListener("click", function (event) {
  if (
    event.target.closest(".quantity-plus") ||
    event.target.closest(".quantity-minus")
  ) {
    let row = event.target.closest("tr");
    let qtyInput = row.querySelector(".qty-input");
    let cartPrice = row.querySelector(".cart-price").attributes.value.value;
    let currencySymbol =
      row.querySelector(".cart-price").attributes.symbol.value;
    let totalPrice = row.querySelector(".cart-totalprice");

    let quantity = qtyInput.value;

    let newTotal = Number(cartPrice) * Number(quantity);
    let formattedTotal = newTotal.toFixed(2);
    totalPrice.textContent = `${formattedTotal}${currencySymbol}`;
    totalPrice.setAttribute("value", formattedTotal);
    updateCartTotal();
  }

  if (event.target.closest(".removeProduct")) {
    let row = event.target.closest("tr");
    if (row) {
      row.remove();
      Array.from(document.getElementsByClassName("cart-count")).forEach(
        (ele) =>
          (ele.innerText = document.getElementById("cartItems").children.length)
      );
      updateCartTotal();
    }
  }

  if (document.getElementById("cartItems").children.length === 0) {
    document.getElementById("container").innerHTML =
      "<h2 class='mt-100 mb-100'>Your cart is empty!</h2>";
  }
});

function updateCartTotal() {
  let total = 0;
  let currencySymbol = "";
  document.querySelectorAll("#cartItems tr").forEach((row, idx) => {
    if (idx == 0) {
      currencySymbol =
        row.querySelector(".cart-totalprice").attributes.symbol.value;
    }
    let itemPrice =
      row.querySelector(".cart-totalprice").attributes.value.value;

    total += Number(itemPrice);
  });

  let cartSubTotalElement = document.getElementById("subtotal");
  let cartTotalElement = document.getElementById("cart_total");
  if (cartTotalElement) {
    cartTotalElement.textContent = `${total.toFixed(2)}${currencySymbol}`;
  }
  if (cartSubTotalElement) {
    cartSubTotalElement.textContent = `${total.toFixed(2)}${currencySymbol}`;
  }
}

console.log(timerId);
