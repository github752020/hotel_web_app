 "use strict";

//prefill credit card Name payment page
 function prefill_form(){
   if ((sessionStorage.firstname != undefined)&&(sessionStorage.lastname != undefined)){
     document.getElementById("cardname").value = sessionStorage.firstname+" "+sessionStorage.lastname;
   }
}

///////////////////////////////////////////////////////////////////
//slideshow product page
var slides = document.querySelectorAll('#slides .slide');
var a = 0;
var slideInterval;
//rotate the slides
function nextSlide() {
slides[a].className = 'slide';
a = (a + 1 + slides.length) % slides.length;
slides[a].className = 'slide showing';
}

//payment and product page sharing the same js
function init () {
  if (document.getElementById("slides")){
    slideInterval = setInterval(nextSlide, 5000);
  }
  else if (document.getElementById("checkout")){
    var cancelorder = document.getElementById("cancelorder");
    cancelorder.onclick = cancelBooking;//part2a.js
    var checkout = document.getElementById("checkout");
    checkout.onclick = validate;//part2a.js
    getBooking();//part2a.js
    prefill_form();
  }

}
window.onload = init;
