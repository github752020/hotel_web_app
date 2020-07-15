<?php if (!isset($_GET["firstname"])) {header ("location:enquire.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 3" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Quinn Chan"  />
  <title>Fix Order</title>

  <link href="styles/bootstrap.css" rel="stylesheet"/>
  <link href="styles/style.css" rel="stylesheet" />
<!--Two JS files-->
  <script src="scripts/part2.js"></script>
  <script src="scripts/part2a.js"></script>
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
        <div class="errMsg"><?php if (isset($_GET["errMsg"])) {
    		echo "  ".$_GET["errMsg"];
      } ?></div>
<!--Booking summary-->
      <form novalidate="novalidate" id="fix_order" method="post" action="process_order.php">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstname">First name</label>
            <input <?php
        		echo "value='", $_GET["firstname"], "'"
        		?> name="firstname" type="text" class="form-control" id="firstname" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastname">Last name</label>
            <input <?php
        		echo "value='", $_GET["lastname"], "'"
        		?> name="lastname" type="text" class="form-control" id="lastname" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="email">Email</label>
            <input <?php
        		echo "value='", $_GET["email"], "'"
        		?> name="email" type="email" class="form-control" id="email" placeholder="you@example.com" required="required"/>
            <div class="invalid-feedback">
              Please enter a valid email address.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="phone">Phone number</label>
            <input <?php
        		echo "value='", $_GET["phone"], "'"
        		?> name="phone" type="text" class="form-control" id="phone" placeholder="Maximum 10 digits" maxlength="10" pattern="^[0-9]{0,10}$" required="required"/>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
<!--address-->
      <fieldset>
        <legend>Address</legend>
        <div class="mb-3">
          <label for="street">Street Address</label>
          <input <?php
          echo "value='", $_GET["street"], "'"
          ?> name="street" type="text" class="form-control" id="street" placeholder="" maxlength="40" required="required"/>
          <div class="invalid-feedback">
            Please enter your street address.
          </div>
        </div>

        <div class="mb-3">
          <label for="suburb">Suburb/ Town</label>
          <input <?php
          echo "value='", $_GET["suburb"], "'"
          ?> name="suburb" type="text" class="form-control" id="suburb" maxlength="20" required="required"/>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="state">State</label>
            <select name="state" class="custom-select d-block w-100" id="state" required="required">
              <option value="">Please Select</option>
              <option value="vic" <?php if ($_GET["state"]== "vic") {echo "selected = selected";}?>>VIC</option>
              <option value="nsw" <?php if ($_GET["state"]== "nsw") {echo "selected = selected";}?>>NSW</option>
              <option value="qld" <?php if ($_GET["state"]== "qld") {echo "selected = selected";}?>>QLD</option>
              <option value="nt" <?php if ($_GET["state"]== "nt") {echo "selected = selected";}?>>NT</option>
              <option value="wa" <?php if ($_GET["state"]== "wa") {echo "selected = selected";}?>>WA</option>
              <option value="sa" <?php if ($_GET["state"]== "sa") {echo "selected = selected";}?>>SA</option>
              <option value="tas" <?php if ($_GET["state"]== "tas") {echo "selected = selected";}?>>TAS</option>
              <option value="act" <?php if ($_GET["state"]== "act") {echo "selected = selected";}?>>ACT</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="postcode">Postcode</label>
            <input <?php
        		echo "value='", $_GET["postcode"], "'"
        		?> name="postcode" type="text" class="form-control" id="postcode" maxlength="4" pattern="^[0-9]{4}$" required="required"/>
            <div class="invalid-feedback">
              Exactly 4 digits are required.
            </div>
          </div>
        </div>
      </fieldset>

<!--preferred contact-->
      <hr class="mb-4">
        <h4 class="mb-3">Preferred Contact</h4>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="byemail" name="contact" type="radio" class="custom-control-input"  value="email" <?php if ($_GET["contact"]== "email") {echo "checked = checked";}?>/>
            <label class="custom-control-label" for="byemail">Email</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="bypost" name="contact" type="radio" class="custom-control-input" value="post" <?php if ($_GET["contact"]== "post") {echo "checked = checked";}?>>
            <label class="custom-control-label" for="bypost">Post</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="byphone" name="contact" type="radio" class="custom-control-input" value="phone" <?php if ($_GET["contact"]== "phone") {echo "checked = checked";}?>>
            <label class="custom-control-label" for="byphone">Phone</label>
          </div>
        </div>

<!--Room type-->
        <fieldset>
          <legend>Rooms & Optional Features</legend>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="room">Equire Room Type</label>
                <select name="room" id="room" required="required">
                  <option value="">Please Select</option>
                  <option value="single" <?php if ($_GET["room"]== "single") {echo "selected = selected";}?>>Single Room</option>
                  <option value="double" <?php if ($_GET["room"]== "double") {echo "selected = selected";}?>>Double Room</option>
                  <option value="family" <?php if ($_GET["room"]== "family") {echo "selected = selected";}?>>Family Suite</option>
                </select>
              <p><span id="price_per_night"></span></p>
            </div>
            <div class="col-md-6 mb-3">
            <label for="nights">Length of Stay (Nights)</label>
            <input <?php
        		echo "value='", $_GET["nights"], "'"
        		?> name="nights" type="text" class="form-control" id="nights" maxlength="3">
            </div>
          </div>

<!--features-->
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="none" name="features" value="none" <?php $optional = explode(',', $_GET["optional"]); if (in_array('None', $optional)) {echo "checked = checked";}?>/>
          <label class="custom-control-label" for="none">None</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="smoking" name="smoking" value="smoking" <?php if (in_array('Smoking room', $optional)) {echo "checked = checked";}?>>
          <label class="custom-control-label" for="smoking">Smoking Room</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="nosmoking" name="nosmoking" value="nosmoking" <?php if (in_array('Non-smoking room', $optional)) {echo "checked = checked";}?>>
          <label class="custom-control-label" for="nosmoking">Non-smoking Room</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="pickup" name="pickup" value="pickup" <?php if (in_array('Airport pick-up', $optional)) {echo "checked = checked";}?>>
          <label class="custom-control-label" for="pickup">Airport Pick-up</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="breakfast" name="breakfast" value="breakfast" <?php if (in_array('Breakfast', $optional)) {echo "checked = checked";}?>>
          <label class="custom-control-label" for="breakfast">Breakfast</label>
        </div>

<!--Comment-->

        <div class="col-md-12 mb-3">
        <label for="comment">Additional Comment</label><br>
        <textarea id="comment" class="form-control" name="comment" rows="4" cols="60"><?php
        echo  $_GET["comment"] ?></textarea>
        </div>
      </fieldset>

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
