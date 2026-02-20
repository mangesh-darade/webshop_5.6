function updateOrderTime(time) {
  let [hour, minute] = time.split(":");
  hour = parseInt(hour);
  let ampm = hour >= 12 ? "PM" : "AM";
  hour = hour % 12;
  hour = hour ? hour : 12;
  let formattedTime12hr = `${hour}:${minute} ${ampm}`;
  return formattedTime12hr;
}

function updateOrderDate(date) {
  date = new Date(date);
  const day = date.getDate();
  const month = date.toLocaleString("default", {
    month: "long",
  });
  const year = date.getFullYear();
  date = `${month} ${day}, ${year}`;
  return date;
}

const orderStatuses = [
  "received",
  "inprogress",
  "foodready",
  "dispatched",
  "delivered",
];
let intervalId = "";

document.addEventListener("DOMContentLoaded", () => {
  const tbodyOrders = document.getElementById("my-orders-tbody");
  ordersTab.addEventListener("click", async (event) => {
    tbodyOrders.innerHTML = " Loading.....";
    const orderReq = await fetch(`${baseUrl}/your_orders`);
    const ordersRes = await orderReq.json();
    // console.log("ordersRes", ordersRes);
    const orderAddresses = ordersRes.addresses;
    const ordersData = ordersRes.orders.orders;
    const orderItems = ordersRes.orders.items;
    // console.log(ordersData.length);
    if (ordersRes.orders) {
      tbodyOrders.innerHTML = "";
      tbodyOrders.innerHTML = `
      ${ordersData
        .map((order) => {
          let orderDateTime = order.date.split(" ");
          let orderTime = updateOrderTime(orderDateTime[1]);
          let orderDate = updateOrderDate(orderDateTime[0]);
          let orderId = order.order_id;
          let billingID = order.billing_address_id;
          let shippingId = order.shipping_address_id;
          let orderStatus = order.sale_status
            .toLowerCase()
            .trim()
            .replace(/\s+/g, "");
          return `<tr>
                    <th class="order-id" >${order.reference_no}</th>
                    <th class="order-status in-progress-status" >${
                      order.sale_status
                    }</th>
                    <th class="order-date" >${orderDate} ${orderTime}</th>
                    <th class="order-details" >${currencySymbol}${Number(
            order.grand_total
          ).toFixed(2)}  (${orderItems[order.order_id].length} Products)</th>
                    <th class="order-action" orderid="${orderId}" billingaddid="${billingID}" shippingaddid="${shippingId}">View Details <img src="${assets}restaurant/img/view_order_details_arrow.svg" alt="view-details-arrow-iamge"/></th>
                 </tr>`;
        })
        .join("")}`;

      // renderTrackingBar(ordersRes.orders, intervalId);
    } else {
      tbodyOrders.innerHTML =
        "<div style='display:flex: widht : 100%; justify-content:center; align-items-center:center;'><h3>There are no orders to show</h3></div>";
    }

    // ------------------order--details--------------------------

    if (ordersRes.orders) {
      const viewOrderDetailsButtons = document.querySelectorAll(
        "#my-orders-tbody .order-action"
      );
      const orderDetailsDiv = document.getElementById("order-details-div");
      const accOrdersDiv = document.getElementById("acc-my-orders-div");
      const orderRefNoEle = document.getElementById("order-reference-no");
      const orderTotalEle = document.getElementById("od-order-total");
      const orderDateTimeEle = document.getElementById("order-date-time");
      const totalOrderProductsEle = document.getElementById(
        "order-total-products"
      );
      const oDTBody = document.getElementById("od-tbody");
      // console.log("viewOrderDetailsButton", viewOrderDetailsButton);
      Array.from(viewOrderDetailsButtons).map((button) => {
        button.addEventListener("click", (event) => {
          accOrdersDiv.style.display = "none";
          orderDetailsDiv.style.display = "block";
          let order_id =
            event.target.closest(".order-action").attributes["orderid"].value;
          let billingID =
            event.target.closest(".order-action").attributes["billingaddid"]
              .value;
          let addressID =
            event.target.closest(".order-action").attributes["shippingaddid"]
              .value;
          localStorage.setItem("orderID", order_id);
          localStorage.setItem("billingID", billingID);
          localStorage.setItem("addressID", addressID);

          const orderBillingAddr = document.getElementById("od-ba-in");
          const orderShippingAddr = document.getElementById("od-sa-in");

          const ba = orderAddresses[billingID];
          const sa = orderAddresses[addressID];

          orderBillingAddr.innerHTML = "Loading..........";
          orderBillingAddr.innerHTML = `
            <p class="addr-name">${ba["address_name"] || ""}</p>
            <p class="ad-val">
              ${ba["line1"] || ""}${ba["line2"] ? ", " + ba["line2"] : ""}${
            ba["city"] ? ", " + ba["city"] : ""
          }${ba["state"] ? ", " + ba["state"] : ""}${
            ba["postal_code"] ? " - " + ba["postal_code"] : ""
          }${ba["country"] ? ", " + ba["country"] : ""}
            </p>
            <p class="ad-phn">Phone Number: ${ba["phone"] || ""}</p>`;

          orderShippingAddr.innerHTML = "Loading ....................";
          orderShippingAddr.innerHTML = `
            <p class="addr-name">${sa["address_name"] || ""}</p>
            <p class="ad-val">
              ${sa["line1"] || ""}${sa["line2"] ? ", " + sa["line2"] : ""}${
            sa["city"] ? ", " + sa["city"] : ""
          }${sa["state"] ? ", " + sa["state"] : ""}${
            sa["postal_code"] ? " - " + sa["postal_code"] : ""
          }${sa["country"] ? ", " + sa["country"] : ""}
            </p>
            <p class="ad-phn">Phone Number: ${sa["phone"] || ""}</p>`;

          oDTBody.innerHTML = "Loading....";
          const clickedOrderItems = orderItems[order_id];
          // console.log("clickedOrderItems", clickedOrderItems);
          const clickedOrder = ordersData.filter(
            (order) => order.order_id == order_id
          )[0];

          // console.log("clickedOrder", clickedOrder);
          renderTrackingBar(
            clickedOrder["sale_status"],
            clickedOrder["date"],
            intervalId
          );

          orderRefNoEle.textContent = clickedOrder["reference_no"];
          orderTotalEle.textContent = `${ordersRes.Settings.symbol}${Number(
            clickedOrder["grand_total"]
          ).toFixed(2)}`;
          const orderDateTime = clickedOrder["date"].split(" ");
          // console.log("orderDateTime", orderDateTime[0], orderDateTime[1]);
          const orderDate = updateOrderDate(orderDateTime[0]);
          // console.log("orderDate", orderDate);
          const orderTime = updateOrderTime(orderDateTime[1]);
          // console.log("orderTime", orderTime);
          totalOrderProductsEle.textContent = `${clickedOrderItems.length} product(s)`;
          orderDateTimeEle.textContent = `Order Placed on ${orderDate} at ${orderTime}`;

          oDTBody.innerHTML = `${clickedOrderItems
            .map((item) => {
              return `<tr>
                        <td class="od-td">
                            <img src="${uploads}/${
                item.image
              }" alt="product-image" class="product-image-od" />
                            <div>
                                <p class="product-name m-0">${item.product_name}
                            </div>
                        </td>
                        <td>${ordersRes.Settings.symbol} ${Number(
                item.unit_price
              ).toFixed(2)}</td>
                        <td>x ${Math.abs(item.quantity)}</td>
                        <td class="product-subtotal">${
                          ordersRes.Settings.symbol
                        } ${Number(item.subtotal).toFixed(2)}</td>
                      </tr>`;
            })
            .join("")} `;
        });

        // const orderId = localStorage.getItem("orderID");
        // const billingId = localStorage.getItem("billingID");
        // const addressId = localStorage.getItem("addressID");
        // const orderBillingAddr = document.getElementById("od-ba-in");
        // const orderShippingAddr = document.getElementById("od-sa-in");
        const backToOrdersBtn = document.getElementById("od-btn");
        // console.log("order_id", orderId);
        // console.log("orderAddresses[orderId]", orderAddresses[billingId]);

        // orderBillingAddr.innerHTML = "Loading..........";
        // orderBillingAddr.innerHTML = `
        //                               <p class="addr-name">${orderAddresses[billingId]["address_name"]}</p>
        //                               <p class="ad-val">${orderAddresses[billingId]["line1"]}, ${orderAddresses[billingId]["line2"]}, ${orderAddresses[billingId]["city"]}, ${orderAddresses[billingId]["state"]} - ${orderAddresses[billingId]["postal_code"]}, ${orderAddresses[billingId]["country"]}</p>
        //                               <p class="ad-phn">Phone Number: ${orderAddresses[billingId]["phone"]}</p>
        //                             `;

        // orderShippingAddr.innerHTML = "Loading ....................";
        // orderShippingAddr.innerHTML = `
        //                               <p class="addr-name">${orderAddresses[addressId]["address_name"]}</p>
        //                               <p class="ad-val">${orderAddresses[addressId]["line1"]}, ${orderAddresses[addressId]["line2"]}, ${orderAddresses[addressId]["city"]}, ${orderAddresses[addressId]["state"]} - ${orderAddresses[addressId]["postal_code"]}, ${orderAddresses[addressId]["country"]}</p>
        //                               <p class="ad-phn">Phone Number: ${orderAddresses[addressId]["phone"]}</p>
        //                             `;

        backToOrdersBtn.addEventListener("click", (event) => {
          accOrdersDiv.style.display = "block";
          orderDetailsDiv.style.display = "none";
        });
      });
    }
  });
});

// -----------------------------------------------------------------------------------

const iconElement = document.getElementById("order-status-symbol");
const orderStatus = document.getElementById("status");

function renderTrackingBar(saleStatus, dateTime, intervalId) {
  resetTrackingBar(orderStatuses);

  // console.log("statussss", saleStatus);
  saleStatus = saleStatus.toLowerCase().trim().replace(/\s+/g, "");
  // console.log("trans statussss", saleStatus);

  let datetime = dateTime;
  let [date, time] = datetime.split(" ");
  date = new Date(date);
  const day = date.getDate();
  const month = date.toLocaleString("default", {
    month: "long",
  });
  const year = date.getFullYear();

  date = `${month} ${day}, ${year}`;

  renderIcon(saleStatus);
  showOrderStatus(saleStatus);
  updateOrderTime(time);
  for (let i = 0; i < orderStatuses.length; i++) {
    if (saleStatus == orderStatuses[i]) {
      if (i == orderStatuses.length - 1) {
        document.querySelector(`.${saleStatus}Circle`).classList.add("done");
        document
          .querySelector(`.${saleStatus}Circle`)
          .classList.remove("not-done");
        clearInterval(intervalId);
        // continue;
        break;
      }
      document.querySelector(`.${saleStatus}Circle`).classList.add("done");
      document
        .querySelector(`.${saleStatus}Circle`)
        .classList.remove("not-done");
      document.querySelector(`.${saleStatus}Strip`).classList.add("done");
      document
        .querySelector(`.${saleStatus}Strip`)
        .classList.remove("not-done");

      // console.log("breaking");
      break;
      // continue;
    }
    document.querySelector(`.${orderStatuses[i]}Circle`).classList.add("done");
    document
      .querySelector(`.${orderStatuses[i]}Circle`)
      .classList.remove("not-done");
    if (document.querySelector(`.${orderStatuses[i]}Strip`)) {
      document.querySelector(`.${orderStatuses[i]}Strip`).classList.add("done");
      document
        .querySelector(`.${orderStatuses[i]}Strip`)
        .classList.remove("not-done");
    }
  }
}

function resetTrackingBar(orderStatuses) {
  for (let i = 0; i < orderStatuses.length; i++) {
    document
      .querySelector(`.${orderStatuses[i]}Circle`)
      .classList.remove("done");
    document
      .querySelector(`.${orderStatuses[i]}Circle`)
      .classList.add("not-done");
    if (document.querySelector(`.${orderStatuses[i]}Strip`)) {
      document
        .querySelector(`.${orderStatuses[i]}Strip`)
        .classList.remove("done");
      document
        .querySelector(`.${orderStatuses[i]}Strip`)
        .classList.add("not-done");
    }
  }
}

function updateTrackingBar(saleStatus, intervalId) {
  saleStatus = saleStatus.toLowerCase().str.trim().split(/\\s+/).join();
  renderIcon(saleStatus);
  showOrderStatus(saleStatus);
  if (saleStatus == "delivered") {
    document.getElementById(`${saleStatus}Circle`).classList.add("done");
    document.getElementById(`${saleStatus}Circle`).classList.remove("not-done");
    clearInterval(intervalId);
    return;
  }
  document.getElementById(`${saleStatus}Circle`).classList.add("done");
  document.getElementById(`${saleStatus}Circle`).classList.remove("not-done");
  document.getElementById(`${saleStatus}Strip`).classList.add("done");
  document.getElementById(`${saleStatus}Strip`).classList.remove("not-done");
  return;
}

function showOrderStatus(sale_status, element = orderStatus) {
  //   sale_status
  //     .split("")
  //     .map((word) => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
  //     .join(" ");
  // console.log("before", sale_status);

  sale_status =
    sale_status.charAt(0).toUpperCase() + sale_status.slice(1).toLowerCase();
  // console.log("ffffffffffffffffff", sale_status);
  if (sale_status === "Inprogress") {
    sale_status = "In Progress";
  }
  if (sale_status === "Foodready") {
    sale_status = "Ready";
  }
  element.textContent = sale_status;
}

function renderIcon(saleStatus) {
  if (saleStatus == "foodready") saleStatus = "ready";
  const iconElement = document.getElementById("order-status-symbol");
  iconElement.innerHTML = `<img src="${assets}restaurant/img/${saleStatus}.svg" alt="webshop order ${saleStatus} image">`;
}
