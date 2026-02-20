document.addEventListener("DOMContentLoaded", function () {
  const searchParams = new URLSearchParams(window.location.search);
  const msg = searchParams.get("msg");
  const order_status = searchParams.get("order_status");
  console.log("order_statusorder_status", order_status);
  if (msg) {
    if (msg == "auth_success") {
      alert("Registered successfully");
    } else if (msg == "login_success") {
      alert("Logged in successfully");
    }
    window.location.href = baseUrl;
  } else if (order_status) {
    if (order_status == "success") {
      alert("Order placed successfully");
      window.location.href = baseUrl;
    }
  } else if (message) {
    console.log("messagemessage", message);
    // alert("You have been logged out successfully");
    alert(message);
  }

  const sealsArr = Array.from(document.querySelectorAll(".seal-img"));
  if (sealsArr.length)
    sealsArr.forEach((seal) => {
      seal.src = `${assets}nw_theme/images/${seal.alt}.png`;
      // console.log("sealseal", seal.src);
    });

  const linksArr = Array.from(document.querySelectorAll(".company-link"));
  if (linksArr.length)
    linksArr.forEach((link) => {
      link.href = `${baseUrl}`;
      // console.log("sealseal", seal.src);
    });

  //-------------render certification pdf (herbinn)-------
  if (document.getElementById("pdf-canvas")) {
    // Asynchronously download the PDF
    pdfjsLib.getDocument(certificateUrl).promise.then(
      function (pdf) {
        console.log("PDF loaded");

        // Fetch the first page
        pdf.getPage(1).then(function (page) {
          console.log("Page loaded");

          var scale = 1.5; // Adjust scale for zoom
          var viewport = page.getViewport({
            scale: scale,
          });

          // Prepare canvas to render PDF
          var canvas = document.getElementById("pdf-canvas");
          var context = canvas.getContext("2d");

          // Set canvas size to match PDF page
          canvas.height = viewport.height;
          canvas.width = viewport.width;

          // Render PDF page into the canvas context
          var renderContext = {
            canvasContext: context,
            viewport: viewport,
          };
          page.render(renderContext);
        });
      },
      function (error) {
        console.log("Error loading PDF: " + error);
      },
    );
  }

  if (document.querySelector("#home-nav")) {
    document.querySelector("#home-nav").classList.add("highlight-nav-option");
  }
});
