$(document).ready(function () {
  var cart_total = $("#header_cart_subtotal_amount").val();

  $("#header_cart_total").html(cart_total);

  $(".cart_qty").bind("change", function () {
    var itemQty = $(this).val();

    var itemKey = $(this).data("item_key");
    var itemPrice = $(this).data("item_price");

    var subtotal = parseFloat(itemPrice) * parseInt(itemQty);
    $(".item_subtotal_" + itemKey).html(subtotal);
    $("#item_subtotal_" + itemKey).val(subtotal);

    var cartTotal = 0;
    $(".item_subtotal").each(function () {
      cartTotal = parseFloat(cartTotal) + parseFloat($(this).val());
    });

    cartTotal = formatNumber(cartTotal, 2);

    $(".cart_subtotal").html(cartTotal);
    $(".cart_total").html(cartTotal);
    $("#header_cart_total").html(cartTotal);

    update_cart(itemKey, itemQty);
  });

  $(".addtowishlist").click(function () {
    var key = $(this).attr("product_hash");
    var pid = key ? "_" + key : "";
    var callurl = $("#base_url").val();
    var variant_id = $("#product_variants" + pid).val();
    var product_id = $("#product_id" + pid).val();

    var postData = "action=add_to_wishlist";
    postData = postData + "&variant_id=" + variant_id;
    postData = postData + "&product_id=" + product_id;

    $.ajax({
      type: "POST",
      url: callurl + "webshop/webshop_request",
      data: postData,
      beforeSend: function () {
        //$("#top-cart-wishlist-count").html("<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Adding In Wishlist</div>");
      },
      success: function (data) {
        var objData = JSON.parse(data);
        if (objData.status == "SUCCESS") {
          var wishlist_count = objData.count;
          $("#top-cart-wishlist-count").html(parseInt(wishlist_count));
          $("#success_alert_message").html(
            '<i class="fa fa-check"></i> Item added to wishlist.'
          );
          $("#success_alert").addClass("show");
          setTimeout(function () {
            $("#success_alert").removeClass("show");
          }, 3000);
        } else {
          $("#error_alert_message").html(
            '<i class="fa fa-time"></i> ' + objData.error
          );
          $("#error_alert").addClass("show");
          setTimeout(function () {
            $("#error_alert").removeClass("show");
          }, 3000);
        }
      },
    });
  });

  $(".remove_from_wishlist").click(function () {
    var key = $(this).attr("product_hash");
    var pid = key ? "_" + key : "";
    var callurl = $("#base_url").val();
    var variant_id = $("#variant_id" + pid).val();
    var product_id = $("#product_id" + pid).val();
    alert(key);
    var postData = "action=remove_from_wishlist";
    postData = postData + "&variant_id=" + variant_id;
    postData = postData + "&product_id=" + product_id;

    $.ajax({
      type: "POST",
      url: callurl + "webshop/webshop_request",
      data: postData,
      beforeSend: function () {
        //$("#top-cart-wishlist-count").html("<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Adding In Wishlist</div>");
      },
      success: function (data) {
        var objData = JSON.parse(data);
        if (objData.status == "SUCCESS") {
          var wishlist_count = objData.count;
          $("#top-cart-wishlist-count").html(parseInt(wishlist_count));
          $("#success_alert_message").html(
            '<i class="fa fa-check"></i> Item remove from wishlist.'
          );
          $("#success_alert").addClass("show");
          $("#row" + pid).hide();
          setTimeout(function () {
            $("#success_alert").removeClass("show");
          }, 3000);
        } else {
          $("#error_alert_message").html(
            '<i class="fa fa-time"></i> ' + objData.error
          );
          $("#error_alert").addClass("show");
          setTimeout(function () {
            $("#error_alert").removeClass("show");
          }, 3000);
        }
      },
    });
  });
});

function remove_cart_item(key, source) {
  var callurl = $("#base_url").val();
  var postData = "action=remove_cart_item";
  postData = postData + "&cart_item_key=" + key;
  postData = postData + "&action_source=" + source; //[header_cart or cart_page]

  $.ajax({
    type: "POST",
    url: callurl + "webshop/webshop_request",
    data: postData,
    beforeSend: function () {
      $("#header_cart_content").html(
        "<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Loading Cart Items</div>"
      );
    },
    success: function (data) {
      if (source == "header_cart") {
        $("#header_cart_content").html(data);
      }

      if (source == "cart_page") {
        $(".cart_page_content").html(data);
        load_header_cart();
      }

      setTimeout(function () {
        var cartCount = parseInt($("#header_cart_item_count").val());
        var cartTotal = $("#header_cart_subtotal_amount").val();
        cartCount = cartCount ? cartCount : "0";
        cartTotal = cartTotal ? cartTotal : "0.00";
        $("#header_cart_count").html(cartCount);
        $("#header_cart_total").html(cartTotal);
      }, 500);

      $("#success_alert_message").html(
        '<i class="fa fa-check"></i> Item Removed successfully.'
      );
      $("#success_alert").addClass("show");
      setTimeout(function () {
        $("#success_alert").removeClass("show");
      }, 3000);
    },
  });
}

function update_cart(itemKey, itemQty) {
  var callurl = $("#base_url").val();

  var postData = "action=update_cart";
  postData = postData + "&itemKey=" + itemKey;
  postData = postData + "&itemQty=" + itemQty;

  $.ajax({
    type: "POST",
    url: callurl + "webshop/webshop_request",
    data: postData,
    beforeSend: function () {
      $("#header_cart_content").html(
        "<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Loading Cart Items</div>"
      );
    },
    success: function (data) {
      if (data == "SUCCESS") {
        $("#success_alert_message").html(
          '<i class="fa fa-check"></i> Cart updated successfully.'
        );
        $("#success_alert").addClass("show");
        setTimeout(function () {
          $("#success_alert").removeClass("show");
        }, 3000);
      }
    },
  });
}

function update_price_by_variants(key) {
  var pid = key ? "_" + key : "";

  var promotion_price = parseFloat($("#promotion_price" + pid).val());
  var overselling = webshop_settings_overselling; //JS Globle Variable Have Defined In Footer File.

  if (promotion_price) {
    return false;
  } else {
    var variant_id = $("#product_variants" + pid).val();
    var variant_name = $("#product_variants" + pid + " option:selected").attr(
      "title"
    );
    var variant_price = parseFloat(
      $("#product_variants" + pid + " option:selected").attr("price")
    );
    var variant_unit_quantity = parseFloat(
      $("#product_variants" + pid + " option:selected").attr("unit_quantity")
    );
    var variant_quantity = parseFloat(
      $("#product_variants" + pid + " option:selected").attr("quantity")
    );
    var unit_price = "";

    variant_price = parseFloat(variant_price) ? variant_price : 0;

    var product_price = $("#price" + pid).val();
    var tax_rate = $("#tax_rate" + pid).val();
    var tax_method = $("#tax_method" + pid).val();

    unit_price = parseFloat(product_price) + parseFloat(variant_price);

    if (parseFloat(tax_rate) && tax_method == 1) {
      var tax_amt = (parseFloat(unit_price) * parseFloat(tax_rate)) / 100;
      unit_price = unit_price + tax_amt;
    }

    var decimal = key ? 0 : 2;

    $("#unit_price" + pid).val(Math.round(unit_price));
    $("#display_unit_price" + pid).html(
      formatNumber(Math.round(unit_price), decimal)
    );
    $("#variant_unit_price" + pid).val(variant_price);
    $("#variant_unit_quantity" + pid).val(variant_unit_quantity);
    $("#variant_id" + pid).val(variant_id);
    $("span.variant_name" + pid).html(variant_name);

    //If overselling is off hide add_to_cart button
    if (overselling == 0) {
      $("#quantity" + pid).attr("max", variant_quantity);

      if (parseFloat(variant_quantity) > 0) {
        $(".btn_outofstock" + pid).hide();
        $(".btn_addtocart" + pid).show();
      } else {
        $(".btn_outofstock" + pid).show();
        $(".btn_addtocart" + pid).hide();
      }
    }
  }
}

function add_to_cart(key) {
  var pid = key ? "_" + key : "";

  var callurl = $("#base_url").val();
  var variant_id = parseInt($("#product_variants" + pid).val());
  var variant_unit_quantity = parseFloat(
    $("#variant_unit_quantity" + pid).val()
  );
  var variant_price = $("#variant_unit_price" + pid).val();

  variant_unit_quantity = variant_unit_quantity ? variant_unit_quantity : 1;
  variant_price = variant_price ? variant_price : 0;

  var product_id = $("#product_id" + pid).val();
  var product_price = $("#unit_price" + pid).val();
  var quantity = $("#quantity" + pid).val();
  var tax_rate = $("#tax_rate" + pid).val();
  var tax_method = $("#tax_method" + pid).val();
  var price = $("#price" + pid).val();
  var promotion_price = $("#promotion_price" + pid).val();

  var postData = "action=add_to_cart";
  postData = postData + "&product_id=" + product_id;
  postData = postData + "&tax_rate=" + tax_rate;
  postData = postData + "&tax_method=" + tax_method;
  postData = postData + "&price=" + price;
  postData = postData + "&promotion_price=" + promotion_price;

  if (variant_id) {
    postData = postData + "&variant_id=" + variant_id;
    postData = postData + "&variant_price=" + variant_price;
    postData = postData + "&variant_unit_quantity=" + variant_unit_quantity;
  }

  postData = postData + "&product_price=" + product_price;
  postData = postData + "&quantity=" + quantity;

  $.ajax({
    type: "POST",
    url: callurl + "webshop/webshop_request",
    data: postData,
    beforeSend: function () {
      $("#button_add_to_cart").html(
        "<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Adding In Cart</div>"
      );
    },
    success: function (data) {
      var objData = JSON.parse(data);
      if (objData.status == "SUCCESS") {
        $("#header_cart_count").html(objData.cart_count);
        $("#header_cart_total").html(objData.cart_total);
        $("#button_add_to_cart").html("Add to cart");

        $("#success_alert_message").html(
          '<i class="fa fa-check"></i> Item Added successfully.'
        );
        $("#success_alert").addClass("show");
        setTimeout(function () {
          $("#success_alert").removeClass("show");
        }, 3000);
      }
    },
  });
}
function load_header_cart() {
  var callurl = $("#base_url").val();
  var postData = "action=load_header_cart";

  $.ajax({
    type: "POST",
    url: callurl + "webshop/webshop_request",
    data: postData,
    beforeSend: function () {
      $("#header_cart_content").html(
        "<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Loading Cart Items</div>"
      );
    },
    success: function (data) {
      if (data == "EMPTY") {
        $("#error_alert_message").html(
          '<i class="fa fa-check"></i> Shopping cart is empty..'
        );
        $("#error_alert").addClass("show");
        setTimeout(function () {
          $("#error_alert").removeClass("show");
        }, 1000);
        $("#header_cart_content").html("Cart is empty!");
      } else {
        $("#header_cart_content").html(data);
      }
    },
  });
}

function roundNumber(number, toref) {
  var rn = number;
  switch (toref) {
    case 1:
      rn = Math.round(number * 20) / 20;
      break;
    case 2:
      rn = Math.round(number * 2) / 2;
      break;
    case 3:
      rn = Math.round(number);
      break;
    case 4:
      rn = Math.ceil(number);
      break;
    default:
      rn = number;
  }
  return rn;
}

function formatNumber(x, d) {
  return formatSA(parseFloat(x).toFixed(d));
}

function formatSA(x) {
  x = x.toString();
  var afterPoint = "";
  if (x.indexOf(".") > 0) afterPoint = x.substring(x.indexOf("."), x.length);
  x = Math.floor(x);
  x = x.toString();
  var lastThree = x.substring(x.length - 3);
  var otherNumbers = x.substring(0, x.length - 3);
  if (otherNumbers != "") lastThree = "," + lastThree;
  var res =
    otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;

  return res;
}

function apply_coupon(coupon_code, cart_amount) {
  if ($("#coupon_code_id").val()) {
  $("#coupon_code_response").html(
    "<i class='fa fa-info-circle'></i> Coupon already applied."
  );
  return;
}
  var callurl = $("#base_url").val();

  var postData = "action=apply_coupon";
  postData = postData + "&coupon_code=" + coupon_code;
  postData = postData + "&cart_amount=" + cart_amount;

  $.ajax({
    type: "POST",
    url: baseUrl + "webshop_request",
    data: postData,
    beforeSend: function () {
      $("#checkoutCouponForm").removeClass("show");
      $("#coupon_code_response").html(
        "<div class='overlay'><i class='fa fa-refresh fa-spin'></i> Loading Cart Items</div>"
      );
    },
    success: function (data) {
      var objData = JSON.parse(data);

       if (objData.status == "success") {
        if (parseFloat(objData.coupon_data.aplied_discount_amount) > parseFloat(cart_amount)) {
          $("#coupon_code_response").html(
            "<i class='fa fa-times-circle'></i> Discount cannot exceed total amount."
          );
          alert("Coupon discount is greater than cart total. Cannot apply this coupon.");
          return;
        }
        alert("Coupon applied successfully!");
        $("#coupon_code_response").html(
          '<i class="fa fa-check"></i> ' + objData.msg
        );
        $("#coupon_code_id").val(objData.coupon_data.id);
        $("#coupon_code_value").val(coupon_code);
        $("#coupon_discount_rate").val(objData.coupon_data.discount_rate);
        $("#coupon_discount_amount").val(
          objData.coupon_data.aplied_discount_amount
        );
        var cart_total = (
          parseFloat(cart_amount) -
          parseFloat(objData.coupon_data.aplied_discount_amount)
        ).toFixed(2);
        var baseTotal = parseFloat(cart_amount); // product only
        var discount = parseFloat(objData.coupon_data.aplied_discount_amount);
        var shipping = parseFloat($("#shipping_charges").val()) || 0;
        var cart_total = (baseTotal - discount + shipping).toFixed(2);

        //  Update all relevant elements
        // $("#cart_total").val(cart_total);
        $("#orderTotal").html(cart_total);
        $("#cart_subtotal_amt").val(cart_total); // important
        $("#cart_total_amount_show").html(cart_total);
        $("#couponDiscountAmountShow").html(
          parseFloat(objData.coupon_data.aplied_discount_amount).toFixed(2)
        );
        $(".tr-coupon-discount").show(); // Show the discount row
      } else if (objData.status == "failed") {
        // var msg = '<i class="fa fa-check"></i> ' + objData.msg;
        // msg +=
        //   '<br/>Have a coupon? <a data-toggle="collapse" href="#checkoutCouponForm" aria-expanded="false" aria-controls="checkoutCouponForm" class="showlogin">Click here</a>';
        alert(objData.msg);
        // $("#coupon_code_response").html(msg);
      }
    },
  });
}
