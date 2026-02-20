function initCountryCodeBehavior() {
  const selects = document.querySelectorAll(".country_code");

  selects.forEach((select) => {
    if (!select) {
      console.warn("Select element not found.");
      return;
    }

    // Store the full country text as a data attribute
    for (let i = 0; i < select.options.length; i++) {
      const option = select.options[i];
      option.setAttribute("data-fulltext", option.text);
    }

    function updateSelectedDisplay() {
      const selectedOption = select.options[select.selectedIndex];
      const countryCode = selectedOption.value.split("~")[0];
      selectedOption.textContent = countryCode;

      for (let i = 0; i < select.options.length; i++) {
        const option = select.options[i];
        if (option !== selectedOption) {
          option.textContent = option.getAttribute("data-fulltext");
        }
      }
    }

    updateSelectedDisplay();
    select.addEventListener("change", updateSelectedDisplay);
  });
}

document.addEventListener("DOMContentLoaded", initCountryCodeBehavior);
