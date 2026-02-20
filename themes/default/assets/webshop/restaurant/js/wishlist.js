document.addEventListener("click", async function (event) {
  if (event.target.classList.contains("addToCartBtn")) {
    let obj = {
      action: "add_to_cart",
      product_id: Number(event.target.id),
      tax_rate: Number(event.target.attributes.tax_rate.value),
      tax_method: Number(event.target.attributes.tax_method.value),
      price: Number(event.target.attributes.price.value),
      promotion_price: Number(event.target.attributes.promotion_price.value),
      product_price: Number(event.target.attributes.product_price.value),
      quantity: Number(event.target.attributes.quantity.value),
    };

    await addToCartCall(obj);
  }
});

async function addToCartCall(obj) {
  $.ajax({
    type: "POST",
    url: baseUrl + "webshop_request",
    data: obj,
    success: function (data) {
      var objData = JSON.parse(data);
      if (objData.status == "SUCCESS") {
        alert("Item successfully added to the cart");
        Array.from(document.getElementsByClassName("cart-count")).forEach(
          (ele) => {
            ele.innerText = objData.cart_count
              ? objData.cart_count
              : objData.cart_items;
          }
        );
        window.location.reload();
      }
    },
    error: function (xhr, status, error) {
      console.log("Error:", status, error);
      alert("Something went wrong please try again later");
    },
  });
}
