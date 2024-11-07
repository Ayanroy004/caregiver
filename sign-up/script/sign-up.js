// dropdown toggle 
function toggleMenu() {
  var navbar = document.querySelector(".navbar");
  navbar.classList.toggle("open");
}

// pop up OTP section 

let popUp = document.getElementById("popup");
let bodyBlur = document.getElementById("cont");
function openPopUp(){
  popUp.classList.add("open-popup");
  bodyBlur.classList.add("onBlur");
}

function closePopUp() {
  popUp.classList.remove("open-popup");
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