const profileTab = document.getElementById("profile-tab-account");
const ordersTab = document.getElementById("orders-tab-account");
const wishlistTab = document.getElementById("wishlist-tab-account");
const sPaymentsTab = document.getElementById("savedPayment-tab-account");

const accountTabs = document.querySelectorAll(".account-tab");
const accountDivs = document.querySelectorAll(".acc-divs");

Array.from(accountTabs).forEach((tab, index) => {
  console.log("tab", document.querySelector(`.${tab.id}`));
  if (index != 0) {
    document.querySelector(`.${tab.id}`).style.display = "none";
  } else {
    document.querySelector(`#${tab.id}`).classList.add("selected");
  }
  tab.addEventListener("click", () => {
    let nameOfClass = tab.id;
    Array.from(accountDivs).forEach((div) => {
      if (div.classList.contains(nameOfClass)) {
        div.style.display = "block";
      } else {
        div.style.display = "none";
      }
    });
    Array.from(accountTabs).forEach((sec) => {
      sec.classList.remove("selected");
    });
    tab.classList.add("selected");

    if (document.getElementById("order-details-div")) {
      document.getElementById("order-details-div").style.display = "none";
    }
  });
});
