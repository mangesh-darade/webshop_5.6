let inputQtyElement = document.getElementsByClassName("qty-input")[0];

let productPrice = document.getElementById("productPrice");

let cartButtonElement = document.getElementById("cartButton");

let orderNowBtn = document.getElementById("orderNowBtn");

if (inputQtyElement.attributes.isincart.value == 1) {
  orderNowBtn.addEventListener("click", async () => {
    await updateCartCall(inputQtyElement.id, inputQtyElement.value);
  });

  cartButtonElement.addEventListener("click", async () => {
    await updateCartCall(inputQtyElement.id, inputQtyElement.value);
  });
} else {
  orderNowBtn.addEventListener("click", async () => {
    await addToCartCall();
  });

  cartButtonElement.addEventListener("click", async () => {
    await addToCartCall();
  });
}

async function addToCartCall() {
  let obj = {
    action: "add_to_cart",
    product_id: Number(productPrice.attributes.prodid.value),
    tax_rate: 0,
    tax_method: 0,
    price: Number(productPrice.attributes.value.value),
    promotion_price: 0,
    product_price: Number(productPrice.attributes.value.value),
    quantity: Number(inputQtyElement.value),
  };

  $.ajax({
    type: "POST",
    url: baseUrl + "webshop_request",
    data: obj,
    success: function (data) {
      var objData = JSON.parse(data);
      if (objData.status == "SUCCESS") {
        alert("Item successfully added to the cart.");
        // window.location.reload();
      }
    },
    error: function (xhr, status, error) {
      console.log("Error:", status, error);
      alert("Something went wrong please try again later.");
    },
  });
}

async function updateCartCall(itemKey, quantity) {
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
      alert("Item successfully updated in cart.");
      // window.location.reload();
    },
    error: function (xhr, status, error) {
      console.log("Error:", status, error);
      alert("Something went wrong please try again later.");
    },
  });
}
