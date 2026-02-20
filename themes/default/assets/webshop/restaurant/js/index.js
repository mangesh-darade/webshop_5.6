async function getProducts(categoryId) {
  return new Promise((resolve, reject) => {
    $.ajax({
      url: baseUrl + `category_products/${categoryId}`,
      method: "GET",
      success: function (response) {
        resolve(response);
      },
      error: function (xhr, status, error) {
        console.error("AJAX error:", status, error);
        reject(error);
      },
    });
  });
}
const divElement = document.getElementById("division");
function populateSpecialItems(products, element) {
  // console.log("populated");
  if (products.special_items.length) {
    element.innerHTML = `
                      <div>  
                      ${
                        products.special_item_text
                          ? `<div id='specialItems1'>
                            <p id='specialItemsInner'>${products.special_item_text}</p>
                          </div>
                        `
                          : ""
                      }
                          <div class="tab-pane  active" id="party-food productsDiv" aria-labelledby="party-food-tab" >              
                            <div class="row justify-content-center">
                              ${products.special_items
                                .map((prod) => {
                                  return `                      
                                          <div class="col-sm-6 col-md-3 products">                                                                                                              
                                              <div class="vs-food-box selectProduct special-items">  
                                                  <img src="${
                                                    products.uploads
                                                  }/webshop/SpecialsCrown.svg" alt="crown_image" class="crown-img">                                                                                                         
                                                  <div class="food-image image-scale-hover "> 
                                                  ${
                                                    products
                                                      .restaurant_is_active
                                                      .is_working === "false" ||
                                                    prod.product_is_active ===
                                                      "false" ||
                                                    products
                                                      .category_is_active[0] ===
                                                      "false"
                                                      ? "<span class='product-image-greyout'>Not available now</span> "
                                                      : ""
                                                  }                                                                                    
                                                      <a href="${baseUrl}product_details/${
                                    prod.proudctIdHash
                                  }" productid="${prod.id}">
                                                                  <img src='${
                                                                    products.uploads
                                                                  }${
                                    prod.image
                                  }' alt="${prod.code} Image" productid="${
                                    prod.id
                                  }" class="product-images special-items-img ${
                                    products.restaurant_is_active.is_working ===
                                      "false" ||
                                    prod.product_is_active === "false" ||
                                    products.category_is_active[0] === "false"
                                      ? "greyOutProductImage"
                                      : ""
                                  }"/>
                                                      </a>
                                                  </div>
                                                  <div class="food-content d-flex flex-column ">
                                                  <div>
                                                  <span class="text-black">${
                                                    products.Settings.symbol
                                                  }${prod.formatedPrice}</span> 
                                                  <button class="fal fa-shopping-cart addToCartBtn ${
                                                    products
                                                      .restaurant_is_active
                                                      .is_working === "false" ||
                                                    prod.product_is_active ===
                                                      "false" ||
                                                    products
                                                      .category_is_active[0] ===
                                                      "false"
                                                      ? "greyOutProduct"
                                                      : ""
                                                  }" id="${
                                    prod.id
                                  }" tax_rate="${
                                    prod.tax_rate ? prod.tax_rate : 0
                                  }" tax_method="${
                                    prod.tax_method ? prod.tax_method : 0
                                  }" price="${
                                    prod.special_price
                                  }" promotion_price="${
                                    prod.promo_price ? prod.promo_price : 0
                                  }" product_price="${
                                    prod.special_price ? prod.special_price : 0
                                  }" quantity="1" ></button>
                    
                                              </div> 
                                                      
                                                      <h3 class="food-title h4 mb-0 ">
                                                          <a href="${baseUrl}product_details/${
                                    prod.proudctIdHash
                                  }" productid="${
                                    prod.id
                                  }" class="product_name">${prod.name}</a>
                                                      </h3>
                                                  </div>
                                              </div>
                                          </div>
                                      `;
                                })
                                .join("")}
                                  </div>
                       </div> 
                    </div>`;
    divElement.style.display = "flex";
  } else {
    element.innerHTML = "";
    divElement.style.display = "none";
  }
}

function populateProducts(products, element) {
  element.innerHTML = `
                <div class="tab-pane  active" id="party-food productsDiv" aria-labelledby="party-food-tab" >
                    <div class="row justify-content-center">
                    ${
                      products.listItems.length
                        ? products.listItems
                            .map((prod) => {
                              return `                      
                                <div class="col-sm-6 col-md-3 products "> 
                                                                                                     
                                    <div class="vs-food-box selectProduct"> 
                                    ${
                                      prod.product_info_text
                                        ? prod.product_info_text[0] === "All*"
                                          ? `<div class='product-available-banner'><p>All Days<br/>${prod.product_info_text[1]}</p></div>`
                                          : prod.product_info_text
                                          ? `<div class='product-available-banner'><p>${prod.product_info_text[0]}<br/>${prod.product_info_text[1]}</p></div>`
                                          : ""
                                        : ""
                                    }
                                                                       
                                        <div class="food-image image-scale-hover ">  

                                        ${
                                          products.restaurant_is_active
                                            .is_working === "false" ||
                                          prod.product_is_active === "false" ||
                                          products.category_is_active[0] ===
                                            "false"
                                            ? "<span class='product-image-greyout'>Not available now</span> "
                                            : ""
                                        }
                                                                             
                                            <a href="${baseUrl}product_details/${
                                prod.proudctIdHash
                              }" productid="${prod.id}">
                                                        <img src='${
                                                          products.uploads
                                                        }${prod.image}' alt="${
                                prod.code
                              } Image" productid="${
                                prod.id
                              }" class="product-images ${
                                products.restaurant_is_active.is_working ===
                                  "false" ||
                                prod.product_is_active === "false" ||
                                products.category_is_active[0] === "false"
                                  ? "greyOutProductImage"
                                  : ""
                              }"/>
                                            </a>
                                        </div>
                                        <div class="food-content d-flex flex-column">
                                        <div>
                                        <span class="text-black">${
                                          products.Settings.symbol
                                        }${prod.price}</span> 
                                        <button class="fal fa-shopping-cart addToCartBtn ${
                                          products.restaurant_is_active
                                            .is_working === "false" ||
                                          prod.product_is_active === "false" ||
                                          products.category_is_active[0] ===
                                            "false"
                                            ? "greyOutProduct"
                                            : ""
                                        }" id="${prod.id}" tax_rate="${
                                prod.tax_rate ? prod.tax_rate : 0
                              }" tax_method="${
                                prod.tax_method ? prod.tax_method : 0
                              }" price="${prod.price}" promotion_price="${
                                prod.promo_price ? prod.promo_price : 0
                              }" product_price="${
                                prod.price ? prod.price : 0
                              }" quantity="1" ></button>
          
                                    </div> 
                                            
                                            <h3 class="food-title h4 mb-0 ">
                                                <a href="${baseUrl}product_details/${
                                prod.proudctIdHash
                              }" productid="${prod.id}" class="product_name">${
                                prod.name
                              }</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            `;
                            })
                            .join("")
                        : "<h3>There are no products to show in this category</h3>"
                    }
                    </div>
                </div> `;
}

async function addToCartCall(obj) {
  $.ajax({
    type: "POST",
    url: baseUrl + "webshop_request",
    data: obj,
    success: function (data) {
      var objData = JSON.parse(data);
      if (objData.status == "SUCCESS") {
        alert("Item successfully added to the cart.");
        Array.from(document.getElementsByClassName("cart-count")).forEach(
          (ele) => {
            ele.innerText = objData.cart_count
              ? objData.cart_count
              : objData.cart_items;
          }
        );
      }
      window.location.reload();
    },
    error: function (xhr, status, error) {
      console.log("Error:", status, error);
      alert("Something went wrong please try again later.");
    },
  });
}

const productsElement = document.getElementById("foodTabContent");
const categoryElement = document.getElementById("categories");
const specialItemsElement = document.getElementById("specialItems");
const categoryAvailableBannerDiv = document.getElementById(
  "category-available-banner"
);
categoryElement.addEventListener("click", async (event) => {
  if (event.target.classList.contains("categories")) {
    let categoryID = event.target.id;
    productsElement.innerHTML = `<h3 class="col-12" style="text-align:center;">Loading.....</h3>`;
    let products = await getProducts(categoryID);
    if (products) {
      populateProducts(JSON.parse(products), productsElement);
      // populateSpecialItems(JSON.parse(products), specialItemsElement);
      localStorage.setItem("category", categoryID);
      // localStorage.setItem("products", JSON.stringify(JSON.parse(products)));
      // return;

      // if (JSON.parse(products).special_items.length) {
      populateSpecialItems(JSON.parse(products), specialItemsElement);
      // }
      // } else {
      //   productsElement.innerHTML =
      //     "<h3>Failed to load content..... Please try again later</h3>";
      document
        .getElementById("foodTabContent")
        .scrollIntoView({ behavior: "smooth" });
    }

    let prod = JSON.parse(products);
    console.log("products", prod);
    // if (
    //   prod["restaurant_is_active"]["is_holiday"] === "Yes" ||
    //   prod["restaurant_is_active"]["is_working"] === "false"
    // ) {
    //   categoryAvailableBannerDiv.style.padding = "0%";
    //   categoryAvailableBannerDiv.innerHTML = "";
    // } else if (prod.category_is_active[0] == "false") {
    categoryAvailableBannerDiv.innerHTML = `
          <p>${event.target.text} is available on 
             ${
               prod.category_is_active[1][0] === "All*"
                 ? "All days"
                 : prod.category_is_active[1][0]
             }              
             ${
               prod.category_is_active[1][1]
                 ? "from <br/>" + prod.category_is_active[1][1]
                 : ""
             }
        `;
    // categoryAvailableBannerDiv.style.padding = "2%";
    // } else {
    //   categoryAvailableBannerDiv.innerHTML = "";
    //   categoryAvailableBannerDiv.style.padding = "0%";
    // }
  }
});

productsElement.addEventListener("click", async (event) => {
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

specialItemsElement.addEventListener("click", async (event) => {
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

document.addEventListener("DOMContentLoaded", function () {
  var items = document.querySelectorAll(".categories");

  items.forEach(function (item) {
    item.addEventListener("click", function () {
      items.forEach(function (link) {
        link.classList.remove("selected");
      });

      item.classList.add("selected");
    });
  });

  let selected_category = JSON.parse(localStorage.getItem("category"));
  // let products = JSON.parse(localStorage.getItem("products"));

  console.log("selectedselected", selected_category);

  if (selected_category) {
    // console.log("inininininininin");
    document.getElementById(selected_category).click();
  } else {
    let firstCategory = document.querySelector(".categories.active");
    if (firstCategory) {
      firstCategory.click();
    }
  }

  // if (products) {
  //   populateProducts(products, document.getElementById("foodTabContent"));
  // }
});

document.addEventListener("DOMContentLoaded", () => {
  let URLparams = new URLSearchParams(window.location.search);
  if (URLparams.get("order_status") == "success") {
    alert("Order placed successfully.");
    window.location.href = baseUrl;
  }
  window.localStorage.clear();
});

// document.addEventListener("DOMContentLoaded", function () {
//   setTimeout(function () {
//     let firstCategory = document.querySelector(".categories.active");
//     if (firstCategory) {
//       firstCategory.click();
//     }
//   }, 100);
// });

document.addEventListener("DOMContentLoaded", function () {
  let URLparams = new URLSearchParams(window.location.search);
  let categoryIdFromUrl = URLparams.get("category_id");

  if (categoryIdFromUrl) {
    // Save it to localStorage for the rest of the logic to work
    localStorage.setItem("category", JSON.stringify(categoryIdFromUrl));

    // Simulate click directly
    let categoryButton = document.getElementById(categoryIdFromUrl);
    if (categoryButton) {
      categoryButton.click();
    }
  } else {
    let selected_category = JSON.parse(localStorage.getItem("category"));
    if (selected_category) {
      document.getElementById(selected_category)?.click();
    } else {
      let firstCategory = document.querySelector(".categories.active");
      if (firstCategory) {
        firstCategory.click();
      }
    }
  }
});
