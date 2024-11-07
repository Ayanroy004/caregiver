//
const hamburger = document.querySelector(".hamburger");
hamburger.addEventListener("click", function () {
  const nav = document.querySelector(".navigation");
  nav.classList.toggle("d-none");
});

hamburger.addEventListener("click", function () {
  hamburger.classList.toggle("ham-rot");
  hamburger.firstElementChild.classList.toggle("none");
  hamburger.lastElementChild.classList.toggle("present");
});
//
const service = document.querySelector(".service");
service.addEventListener("click", (e) => {
  const serviceList = document.querySelector(".effect");
  serviceList.classList.toggle("toggle");
  e.stopPropagation();
});

document.addEventListener("click", () => {
  const serviceList = document.querySelector(".effect");
  if (serviceList.classList.contains("toggle")) {
    serviceList.classList.remove("toggle");
  }
});
//

// ==========================Medicine Slider========================= \\

const slider = document.querySelectorAll(".slider");
slider.forEach((slide, index) => {
  slide.style.left = `${index * 100}%`;
});
var counter = 0;

const onPrev = () => {
  if (counter > 0) {
    counter--;
    console.log(counter);
    slider.forEach((slide) => {
      slide.style.transform = `translateX(-${counter * 100}%)`;
    });
  } else if (counter === 0) {
    counter = slider.length - 1;
    slider.forEach((slide) => {
      slide.style.transform = `translateX(-${counter * 100}%)`;
    });
  }
};

const onNext = () => {
  if (counter < slider.length - 1) {
    counter++;
    console.log(counter);
    slider.forEach((slide) => {
      slide.style.transform = `translateX(-${counter * 100}%)`;
    });
  } else if (counter === 3) {
    counter = 0;
    slider.forEach((slide) => {
      slide.style.transform = `translateX(-${counter * 100}%)`;
    });
  }
};
setInterval(onNext, 3000);

function togglePaymentOption() {
  const upiInputGroup = document.getElementById("upi-input-group");
  const cardInputGroup = document.getElementById("card-input-group");
  const cardDetailsGroup = document.getElementById("card-details-group");
  const payButton = document.getElementById("pay-button");

  if (document.getElementById("upi").checked) {
    upiInputGroup.style.display = "block";
    cardInputGroup.style.display = "none";
    cardDetailsGroup.style.display = "none";
    payButton.disabled = false; // Enable the button
  } else if (document.getElementById("card").checked) {
    upiInputGroup.style.display = "none";
    cardInputGroup.style.display = "block";
    cardDetailsGroup.style.display = "block";
    payButton.disabled = false; // Enable the button
  } else if (document.getElementById("cod").checked) {
    upiInputGroup.style.display = "none";
    cardInputGroup.style.display = "none";
    cardDetailsGroup.style.display = "none";
    payButton.disabled = false; // Enable the button
  } else {
    payButton.disabled = true; // Disable the button if nothing is selected
  }
}

// cart
document.addEventListener("DOMContentLoaded", () => {
  const cartItems = document.querySelectorAll(".list");
  const subtotalElement = document.getElementById("subtotal-value");
  const shippingElement = document.getElementById("shipping-value");
  const payableAmountElement = document.getElementById("payable-amount-value");
  const totalItemsElement = document.querySelector(
    ".show-items h4:nth-child(2)"
  );
  const savingElement = document.getElementById("saving-value"); // Element for displaying total savings
  const totalAmountInput = document.getElementById("totalAmountInput"); // Hidden input element

  function updateCart() {
    let subtotal = 0;
    let totalSavings = 0; // Initialize total savings

    cartItems.forEach((item) => {
      const selectElement = item.querySelector("select");
      const itemPriceElement = item.querySelector(".item-price");
      const subtotalPriceElement = item.querySelector(".subtotal-price");
      const quantity = parseInt(selectElement.value);
      const itemPrice = parseFloat(itemPriceElement.innerText);
      // console.log(itemPrice);
      const discountAmount = itemPrice * 0.15; // 15% discount on item price
      const discountedPrice = itemPrice - discountAmount;
      const itemSubtotal = quantity * discountedPrice;
      const itemSavings = discountAmount * quantity; // Savings for this item
      // console.log(subtotalPriceElement);
      subtotalPriceElement.innerText = itemSubtotal.toFixed(2);
      // console.log(itemSubtotal);
      // console.log(subtotalPriceElement.innerText);

      subtotal += itemSubtotal;
      // console.log(subtotal);
      totalSavings += itemSavings; // Add item savings to total savings
    });

    subtotalElement.innerText = subtotal.toFixed(2);

    let shipping = 50;
    if (subtotal > 1000) {
      shipping = 0;
    }

    shippingElement.innerText = shipping.toFixed(2);
    payableAmountElement.innerText = (subtotal + shipping).toFixed(2);
    totalAmountInput.value = (subtotal + shipping).toFixed(2); // Set the value of the hidden input field
    savingElement.innerText = totalSavings.toFixed(2); // Display total savings
  }

  function updateItemCount() {
    const itemCount = cartItems.length;
    totalItemsElement.textContent = `Items : ${itemCount}`;
  }

  cartItems.forEach((item) => {
    const selectElement = item.querySelector("select");
    selectElement.addEventListener("change", updateCart);
  });

  updateItemCount();
  updateCart();
});

// cart db
document.addEventListener("DOMContentLoaded", () => {
  function calculateDiscount() {
    const actualPriceElements = document.querySelectorAll(".item-price");
    const discountedPriceElements =
      document.querySelectorAll(".subtotal-price");
    actualPriceElements.forEach((actualPriceElement, index) => {
      const actualPrice = parseFloat(actualPriceElement.innerText);
      const discountedPrice = actualPrice * 0.85;
      // discountedPriceElements[index].innerText = discountedPrice.toFixed(2);
    });
  }
  calculateDiscount();
});

// delete product




// product

document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".cards");

  function calculateDiscount() {
    cards.forEach((card) => {
      const actualPriceElement = card.querySelector(".actual-price");
      const discountedPriceElement = card.querySelector(".discounted-price");
      const actualPrice = parseFloat(actualPriceElement.innerText);

      const discount = 0.15;
      const discountedPrice = actualPrice * (1 - discount);

      discountedPriceElement.innerText = discountedPrice.toFixed(2);
    });
  }

  calculateDiscount();
});

// product details
document.addEventListener("DOMContentLoaded", () => {
  function calculateDiscount() {
    const actualPriceElement = document.querySelector(".actual-price");
    const discountedPriceElement = document.querySelector(".discounted-price");
    const actualPrice = parseFloat(actualPriceElement.innerText);

    const discount = 0.15;
    const discountedPrice = actualPrice * (1 - discount);

    discountedPriceElement.innerText = discountedPrice.toFixed(2);
  }

  calculateDiscount();
});

// pass how many product in productdetails page
function addToCart(productId) {
  var quantity = document.getElementById("options").value;
  window.location.href =
    "?id=" + productId + "&add_to_cart=true&quantity=" + quantity;
}
