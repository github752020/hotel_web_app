<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 1" />
  <meta name="keywords" content="HTML5, CSS" />
  <meta name="author" content="Quinn Chan"  />
  <title>Payment</title>

  <link href="styles/bootstrap.css" rel="stylesheet"/>
  <link href="styles/style.css" rel="stylesheet" />
<!--Two JS files-->
  <script src="scripts/part2a.js"></script>
  <script src="scripts/enhancements.js"></script>
</head>
<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  ?>

  <div class="container-fluid">
    <div class="row equal">
      <section id="eqimg">
        <h1>Feel<br> At Home</h1>
      </section>
      <section id="form">
        <p class="py-5 text-center">
          Please review your booking. Refund terms and conditions apply.
        </p>
<!--Booking summary-->
      <form novalidate="novalidate" id="enquire" method="post" action="process_order.php">
        <fieldset>
          <legend>Your Details</legend>
          <p>Your Name: <span id="confirm_name"></span></p>
          <p>Email address: <span id="confirm_email"></span></p>
          <p>Phone number: <span id="confirm_phone"></span></p>
          <p>Address: <span  id="confirm_address"></span></p>
          <p>Contact Preference: By <span  id="confirm_contact"></span></p>
        </fieldset>
        <fieldset>
          <legend>Booking Details</legend>
          <p>Room type: <span id="confirm_room"></span></p>
          <p>Length of stay: <span id="confirm_nights"></span> nights</p>
          <p>Optional features: <span id="confirm_optional"></span></p>
          <p>Comment: <span id="confirm_comment"></span></p>
          <p class="alignright" id ="total">Total: AUD <span id="confirm_cost"></span></p>
        </fieldset>
<!--Form hidden input-->
          <input type="hidden" name="firstname" id="firstname" />
          <input type="hidden" name="lastname" id="lastname" />
          <input type="hidden" name="email" id="email" />
          <input type="hidden" name="phone" id="phone" />
          <input type="hidden" name="street" id="street" />
          <input type="hidden" name="suburb" id="suburb" />
          <input type="hidden" name="state" id="state" />
          <input type="hidden" name="postcode" id="postcode" />
          <input type="hidden" name="contact" id="contact" />
          <input type="hidden" name="room" id="room" />
          <input type="hidden" name="nights" id="nights" />
          <input type="hidden" name="optional" id="optional" />
          <input type="hidden" name="comment" id="comment" />
          <input type="hidden" name="cost" id="cost" />
<!--Card details-->
          <fieldset>
            <legend>Payment</legend>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="visa" name="paymentMethod" type="radio" class="custom-control-input" value="visa">
              <label class="custom-control-label" for="visa">Visa</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="mastercard" name="paymentMethod" type="radio" class="custom-control-input" value="mastercard">
              <label class="custom-control-label" for="mastercard">Mastercard</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="americanexpress" name="paymentMethod" type="radio" class="custom-control-input" value="americanexpress">
              <label class="custom-control-label" for="americanexpress">American Express</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cardname">Name on card</label>
              <input type="text" class="form-control" id="cardname" name="cardname" placeholder="max 40 characters">
              <div class="invalid-feedback">
              Full name as displayed on card is required
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cardno">Credit card number</label>
              <input type="text" class="form-control" id="cardno" name="cardno" placeholder="max 16 digits">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cardexp">Expiration</label>
              <input type="text" class="form-control" id="cardexp" name="cardexp" placeholder="mm-yy">
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cardcvv">CVV</label>
              <input type="text" class="form-control" id="cardcvv" name="cardcvv" placeholder="">
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>
        </fieldset>
<!--Buttons-->
        <hr class="mb-4">
        <div class="row">
          <div class="col-md-4 mb-3">
            <button class="btn btn-primary btn-lg btn-block" id = "checkout" type="submit">Check Out</button>
          </div>
          <div class="col-md-4 mb-3">
             <button class="btn btn-primary btn-lg btn-block" id = "cancelorder" type="button">Cancel Order</button>
          </div>
        </div>
        </form>
      </section>
    </div>
</div>

<?php
  include_once("footer.inc");
?>

</body>
</html>
