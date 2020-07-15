 "use strict";


 function validate(){

 	var errMsg = "";								/* stores the error message */
 	var result = true;								/* assumes no errors */

//card type validation
  var visa = document.getElementById("visa").checked;
  var mastercard = document.getElementById("mastercard").checked;
  var americanexpress = document.getElementById("americanexpress").checked;
  var cardname = document.getElementById("cardname").value;
  var cardexp = document.getElementById("cardexp").value;
  var cardexpRE = /^\d\d-\d\d$/;
  var now = new Date();
  var currentMonth = now.getMonth();
  var currentYear = now.getYear()-100;
  var month = Number(cardexp.substr(0,2))
  var year = Number(cardexp.substr(3,2))
  var cardcvv = document.getElementById("cardcvv").value;
  var cardno = document.getElementById("cardno").value;


  var disable = true
  if (!disable) {
  if (!(visa || mastercard || americanexpress)){
    errMsg = errMsg + "Please select credit card type.\n";
    result = false;
}

//card name alphabet and space, less than 40 characters

  if (!cardname.match(/^[a-zA-Z ]+$/)){
    errMsg = errMsg + "Name on card must only contain alpha characters and space\n";
    result = false;
}
  else if (cardname.length > 40) {
    errMsg = errMsg + "Name on card must be less than 40 characters\n";
    result = false;
  }

//card expiration date match pattern and current
  if ((!cardexp.match(cardexpRE))||(month>12)||(month<1)){
    errMsg = errMsg + "Please enter a valid expiration date\n";
    result = false;
  }
  else if (year<currentYear){
    errMsg = errMsg + "Your credit card is expired\n";
    result = false;
  }
  else if ((year=currentYear)&&(month<currentMonth)){
    errMsg = errMsg + "Your credit card is expired\n";
    result = false;
  }


//CVV match card
    if ((visa || mastercard)&&(!cardcvv.match(/^[0-9]{3}$/))){
      errMsg = errMsg + "Please enter a valid 3-digit CVV\n";
      result = false;
    }
    else if ((americanexpress)&&(!cardcvv.match(/^[0-9]{4}$/))){
      errMsg = errMsg + "Please enter a valid 4-digit CVV\n";
      result = false;
    }


//card number match card
    if (visa) {
      var visaRE = /^4[0-9]{15}$/;
      if (!cardno.match(visaRE)){
        errMsg = errMsg + "Visa card number must be 16 digits starting with 4.\n";
        result = false;
      }
    }
    else if (mastercard){
      var mastercardRE = /^5[1-5][0-9]{14}$/;
      if (!cardno.match(mastercardRE)){
        errMsg = errMsg + "MasterCard number must be 16 digits starting with 51 to 55.\n";
        result = false;
      }
    }
    else if (americanexpress) {
      var americanexpressRE = /^3[4-7][0-9]{13}$/;
      if (!cardno.match(americanexpressRE)){
        errMsg = errMsg + "American Express number must be 15 digits starting with 34 to 37.\n";
        result = false;
      }
    }}


  if (errMsg !=""){
    alert (errMsg);
  }

 	return result;    //if false the information will not be sent to the server
 }

//calculate total cost
function calcCost(room, nights){
	var cost = 0;
	if (room =="single") {cost = 190;}
	if (room =="double") {cost = 350;}
	if (room =="family") {cost = 490;}
	return cost * nights;
}

//get booking from client side
function getBooking(){
	var cost = 0;
	if(sessionStorage.firstname != undefined){    //if sessionStorage for username is not empty
		//confirmation text
		document.getElementById("confirm_name").textContent = sessionStorage.firstname + " " + sessionStorage.lastname;
		document.getElementById("confirm_email").textContent =sessionStorage.email;
		document.getElementById("confirm_phone").textContent = sessionStorage.phone;
		document.getElementById("confirm_address").textContent = sessionStorage.street + " " + sessionStorage.suburb + " " + sessionStorage.state + " " + sessionStorage.postcode;
		document.getElementById("confirm_contact").textContent =sessionStorage.contact;
    document.getElementById("confirm_room").textContent =sessionStorage.room;
    document.getElementById("confirm_nights").textContent =sessionStorage.nights;
    document.getElementById("confirm_optional").textContent =sessionStorage.optional;
    document.getElementById("confirm_comment").textContent =sessionStorage.comment;
		cost = calcCost(sessionStorage.room, sessionStorage.nights);
		document.getElementById("confirm_cost").textContent = cost;

		//fill hidden fields --> send to php server
		document.getElementById("firstname").value = sessionStorage.firstname;
		document.getElementById("lastname").value = sessionStorage.lastname;
		document.getElementById("email").value = sessionStorage.email;
		document.getElementById("phone").value = sessionStorage.phone;
		document.getElementById("street").value = sessionStorage.street;
    document.getElementById("suburb").value = sessionStorage.suburb;
    document.getElementById("state").value = sessionStorage.state;
    document.getElementById("postcode").value = sessionStorage.postcode;
		document.getElementById("contact").value = sessionStorage.contact;
		document.getElementById("room").value = sessionStorage.room;
    document.getElementById("nights").value = sessionStorage.nights;
    document.getElementById("optional").value = sessionStorage.optional;
    document.getElementById("comment").value = sessionStorage.comment;
		document.getElementById("cost").value = cost;
	}

}




//clear booking and return
function cancelBooking(){
  sessionStorage.clear();
 window.location = "enquire.html";
}
