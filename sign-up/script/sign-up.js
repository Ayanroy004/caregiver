
function toggleMenu() {
  var navbar = document.querySelector(".navbar");
  navbar.classList.toggle("open");
}

// pop up OTP section 

const popUp1 = document.getElementById("popup");
let bodyBlur = document.getElementById("cont");
function openPopUp(){
  popUp1.classList.add("open-popup");
  bodyBlur.classList.add("onBlur");
}

function closePopUp() {
  popUp1.classList.remove("open-popup");
  bodyBlur.classList.remove("onBlur");
}

// const pass = document.getElementById("password");
// const pass_length = pass.innerText;

// const pass_confirm = document.getElementById("password");
// const pass_confirm_length = pass_confirm.innerText;

// if (pass_length != pass_confirm_length) {
// const error_text = document.getElementById("con-pass-text");
//   error_text.innerText = "Password are not match !";
// }

function checkPasswordMatch() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const message = document.getElementById("match-message");

  if (password === confirmPassword) {
      message.style.color = "green";
      message.innerHTML = ` <i class="fa-solid fa-check"></i> `;
  } else {
      message.style.color = "red";
      message.textContent = "Passwords do not match";
  }
}


function checkMobileLength() {
  const mobile = document.getElementById("mobile").value;
  // const confirmPassword = document.getElementById("confirmPassword").value;
  const message = document.getElementById("mobile-message");

  const len = mobile.length;
  console.log(len);
  if (len == 10) {
      message.style.color = "green";
      message.innerHTML = `     <i class="fa-solid fa-check"></i> `;
  } else {
      message.style.color = "red";
      message.innerHTML = `     <i class="fa-regular fa-circle-xmark"></i>`;
}
}
