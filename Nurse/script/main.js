function toggleMenu() {
  var navbar = document.querySelector(".navbar");
  navbar.classList.toggle("open");
}

// const profiles = document.querySelectorAll(".nurse-card");

// document.addEventListener("scroll",function(){
//     profiles.forEach( profile =>{
//         if(isInView(profile)){
//             profile.classList.add("nurse-card--visible");
//         }
//     })
// })

// function isInView(element){
//     const rect = element.getBoundingClientRect();
//     return ( rect.button > 0 && rect.top < (window.innerHeight - 150 || document.documentElement.clientHeight - 150)
//     );
// }
  function Nursename() {
   var select = document.getElementById("nurseNM");
   var select1 = document.getElementById("nrs");
   const name = select.innerText;
    // alert(name);
    select1.innerText = name;
    console.log(select1);
    console.log(name)
  }