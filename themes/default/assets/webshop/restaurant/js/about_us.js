let h2Element = document.getElementsByTagName("h2")[0];
console.log("h2Element", h2Element);
let headingElement = document.getElementById("heading");
headingElement.innerText = h2Element.textContent;
// headingElement.setAttribute("class", "sec-title1 about-title mb-10 mb-md-20");
// h2Element.setAttribute("style", "display:none");

let h3Element1 = document.getElementsByTagName("h3")[0];
let h4Element1 = document.getElementsByTagName("h4")[0];
let p1Element = document.getElementsByTagName("p")[4];
let p2Element = document.getElementsByTagName("p")[5];
let h4Element2 = document.getElementsByTagName("h4")[1];

hide([h2Element, h3Element1, h4Element1, p1Element, p2Element, h4Element2]);

let contentDiv = document.getElementById("content");
// let newElement = document.createElement("div");
contentDiv.innerText =
  h3Element1.innerText +
  h4Element1.innerText +
  " " +
  p1Element.innerText +
  p2Element.innerText +
  h4Element2.innerText;
contentDiv.append(newElement);

function hide(arr) {
  arr.map((ele) => {
    ele.setAttribute("style", "display:none");
  });
}
