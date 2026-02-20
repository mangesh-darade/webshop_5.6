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
      alert("Semoething went wrong please try again later");
    },
  });
}

let cartElement = document.getElementsByClassName("cart_button");
