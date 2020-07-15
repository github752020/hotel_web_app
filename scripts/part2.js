 "use strict";

function display_price(){
  var price = 0
  var room = document.getElementById("room").value;
  switch (room){
    case "single":
      price = 190;
    break;
    case "double":
      price = 350;
    break;
    case "family":
      price = 490;
    break;
  }
  document.getElementById("price_per_night").innerHTML = "Price per night AUD " + price;
}

function get_optional(){
  var smoking = document.getElementById("smoking").checked;
  var nosmoking = document.getElementById("nosmoking").checked;
  var pickup = document.getElementById("pickup").checked;
  var breakfast = document.getElementById("breakfast").checked;
  var none = document.getElementById("none").checked;
  var optional = [];
  if (none) {optional.push("None"); }
  if (smoking) {optional.push("Smoking room"); }
  if (nosmoking) {optional.push("Non-smoking room"); }
  if (pickup) {optional.push("Airport pick-up"); }
  if (breakfast) {optional.push("Breakfast"); }
  return optional;
}

function get_contact(){
  var contact = "";
  var contactarray = document.getElementsByName('contact');
  for (var i = 0; i < contactarray.length; i++) {
    if (contactarray[i].checked) {
      contact = contactarray[i].value;
    }
  }
  return contact;
}


 function validate() {
   var errMsg = "";
   var result = true;

   var firstname = document.getElementById("firstname").value;
   var lastname = document.getElementById("lastname").value;
   var email = document.getElementById("email").value;
   var phone = document.getElementById("phone").value;

   var street = document.getElementById("street").value;
   var suburb = document.getElementById("suburb").value;
   var state = document.getElementById("state").value;
   var postcode = document.getElementById("postcode").value;
   var address = street+" "+suburb+" "+state+" "+postcode;

   var contact = get_contact();
   var room = document.getElementById("room").value;
   var comment = document.getElementById("comment").value;
   var optional = get_optional();
   var postcode1 = Number(postcode.charAt(0));
   var nights = document.getElementById("nights").value;


   var disable = true
   if (!disable) {
   if (!Number.isInteger(nights) || (nights <= 0)){
     errMsg = errMsg + "Length of Stay must be a positive number\n";
     result = false;
   }


   var tempMsg = "Please enter a correct postcode or change the state.\n";
   switch (state) {
     case "vic":
      if ((postcode1 != 3)&&(postcode1 != 8)){
       errMsg = errMsg + tempMsg;
       result = false;
      }
      break;
      case "nsw":
       if ((postcode1 != 1)&&(postcode1 != 2)){
         errMsg = errMsg + tempMsg;
         result = false;
       }
       break;
      case "qld":
        if ((postcode1 != 4)&&(postcode1 != 9)){
          errMsg = errMsg + tempMsg;
          result = false;
        }
        break;
        case "act":
        case "nt":
         if (postcode1 != 0){
           errMsg = errMsg + tempMsg;
           result = false;
         }
         break;
         case "wa":
          if (postcode1 != 6){
            errMsg = errMsg + tempMsg;
            result = false;
          }
          break;
          case "sa":
           if (postcode1 != 5){
             errMsg = errMsg + tempMsg;
             result = false;
           }
           break;
           case "tas":
            if (postcode1 != 7){
              errMsg = errMsg + tempMsg;
              result = false;
            }
            break;
   }}




   if (errMsg !=""){
     alert (errMsg);
   }
   if (result){
     storeBooking (firstname, lastname, email, phone, street, suburb, state, postcode, contact, room, nights, optional, comment)
}
   return result;
}

function storeBooking(firstname, lastname, email, phone, street, suburb, state, postcode, contact, room, nights, optional, comment){
  sessionStorage.email = email;
  sessionStorage.firstname = firstname;
  sessionStorage.lastname = lastname;
  sessionStorage.phone = phone;
  sessionStorage.street = street;
  sessionStorage.suburb = suburb;
  sessionStorage.state = state;
  sessionStorage.postcode = postcode;
  sessionStorage.contact = contact;
  sessionStorage.room = room;
  sessionStorage.nights = nights;
  sessionStorage.optional = optional;
  sessionStorage.comment = comment;

  alert("Booking stored");
}




 function init() {
   var enquire = document.getElementById("enquire");//get refto the HTMLelement
   enquire.onsubmit = validate;//register the event listener
   var room_price = document.getElementById("room");
   room_price.onchange = display_price;
 }

 window.onload = init;
