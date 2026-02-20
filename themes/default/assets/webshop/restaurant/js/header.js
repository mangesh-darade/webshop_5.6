// // console.log("header here");
// // let cartElement = document.getElementsByClassName("cart_button");
// // if (cartElement) {
// //   Array.from(cartElement).forEach((element) => {
// //     element.addEventListener("click", () => {});
// //   });
// // }

// async function fetchCart() {
//   return new Promise((resolve, reject) => {
//     $.ajax({
//       url: baseUrl + `cart?getCart=1`,
//       method: "GET",
//       success: function (response) {
//         resolve(response);
//       },
//       error: function (xhr, status, error) {
//         console.error("AJAX error:", status, error);
//         reject(error);
//       },
//     });
//   });
// }

// console.log(document.getElementsByClassName("cart_button_header"));
// document.addEventListener("click", async function (event) {
//   if (event.target.classList.contains("cartButtonHeader")) {
//     let request = await fetchCart();
//     let data = JSON.parse(request);
//     console.log(data);
//     if (data.cart_items) {
//       let products = data.cart_items;
//       //   console.log(data.cart_items);
//       let elementToPopulate = document.getElementById("cart_list");
//       for (const prodId in products) {
//         console.log(prodId);
//         console.log(data.cart_data.products[Number(prodId)].image);
//         elementToPopulate.append(
//           `<li class="woocommerce-mini-cart-item mini_cart_item">
//                             <a href="#" class="remove remove_from_cart_button" onclick="remove_cart_item('${Number(
//                               prodId.product_id
//                             )}')"><i class="far fa-times"></i></a>
//                             <a href="<?= base_url("webshop/product_details/" . md5($item['product_id'])) ?>"><img src="${
//                               data.uploads
//                             }${data.cart_data.products[Number(prodId)].image}"
//                                         alt="${
//                                           data.cart_data.products[
//                                             Number(prodId)
//                                           ].name
//                                         }">${
//             data.cart_data.products[Number(prodId)].name
//           }
//                             </a>
//                             <span class="quantity">${Number(
//                               prodId.quantity
//                             )} Qty. ×
//                                 <span class="">
//                                     <span class="woocommerce-Price-currencySymbol">${Number(
//                                       prodId.product_price
//                                     ).toFixed(
//                                       2
//                                     )} = </span>
//                                 </span>
//                                 <span class="woocommerce-Price-amount amount">${(
//                                   Number(prodId.quantity) *
//                                   Number(prodId.product_price).toFixed(2)
//                                 ).toFixed(2)}</span>
//                             </span>
//                         </li>`
//         );
//       }
//     }
//   }
// });

// cart_list;

let callIcons = Array.from(document.querySelectorAll(".header-call-icon"));

// whatsapp button is already taken from header.php script
callIcons.forEach((icon) => {
  //   console.log("added");
  icon.addEventListener("click", () => {
    // console.log("clicked");
    whatsappBtn.click();
  });
});
