<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 1" />
  <meta name="keywords" content="HTML5, CSS" />
  <meta name="author" content="Quinn Chan"  />
  <title>Equire</title>

  <link href="styles/bootstrap.css" rel="stylesheet"/>
  <link href="styles/style.css" rel="stylesheet" />
  <script src="scripts/part2.js"></script>

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
          Please fill in the form, our friendly staff will contact you within 3 business days.
        </p>

        <form novalidate="novalidate" class="needs-validation" id="enquire" method="post" action="payment.php">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstname">First name</label>
                <input name="firstname" type="text" class="form-control" id="firstname" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastname">Last name</label>
                <input name="lastname" type="text" class="form-control" id="lastname" maxlength="25" pattern="^[a-zA-Z]+$" required="required"/>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com" required="required"/>
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="phone">Phone number</label>
                <input name="phone" type="text" class="form-control" id="phone" placeholder="Maximum 10 digits" maxlength="10" pattern="^[0-9]{0,10}$" required="required"/>
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
              <input name="street" type="text" class="form-control" id="street" placeholder="" maxlength="40" required="required"/>
              <div class="invalid-feedback">
                Please enter your street address.
              </div>
            </div>

            <div class="mb-3">
              <label for="suburb">Suburb/ Town</label>
              <input name="suburb" type="text" class="form-control" id="suburb" maxlength="20" required="required"/>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="state">State</label>
                <select name="state" class="custom-select d-block w-100" id="state" required="required">
                  <option value="">Please Select</option>
                  <option value="vic">VIC</option>
                  <option value="nsw">NSW</option>
                  <option value="qld">QLD</option>
                  <option value="nt">NT</option>
                  <option value="wa">WA</option>
                  <option value="sa">SA</option>
                  <option value="tas">TAS</option>
                  <option value="act">ACT</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="postcode">Postcode</label>
                <input name="postcode" type="text" class="form-control" id="postcode" maxlength="4" pattern="^[0-9]{4}$" required="required"/>
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
                <input id="byemail" name="contact" type="radio" class="custom-control-input"  value="email" checked required="required"/>
                <label class="custom-control-label" for="byemail">Email</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="bypost" name="contact" type="radio" class="custom-control-input" value="post">
                <label class="custom-control-label" for="bypost">Post</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="byphone" name="contact" type="radio" class="custom-control-input" value="phone">
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
                      <option value="" selected="selected">Please Select</option>
                      <option value="single">Single Room</option>
                      <option value="double">Double Room</option>
                      <option value="family">Family Suite</option>
                    </select>
                  <p><span id="price_per_night"></span></p>
                </div>
                <div class="col-md-6 mb-3">
                <label for="nights">Length of Stay (Nights)</label>
                <input name="nights" type="text" class="form-control" id="nights" maxlength="3">
                </div>
              </div>

<!--features-->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="none" name="features" value="none" checked="checked" required="required"/>
              <label class="custom-control-label" for="none">None</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="smoking" name="smoking" value="smoking">
              <label class="custom-control-label" for="smoking">Smoking Room</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="nosmoking" name="nosmoking" value="nosmoking">
              <label class="custom-control-label" for="nosmoking">Non-smoking Room</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="pickup" name="pickup" value="pickup">
              <label class="custom-control-label" for="pickup">Airport Pick-up</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="breakfast" name="breakfast" value="breakfast">
              <label class="custom-control-label" for="breakfast">Breakfast</label>
            </div>

<!--Comment-->

            <div class="col-md-12 mb-3">
            <label for="comment">Additional Comment</label><br>
            <textarea id="comment" class="form-control" name="comment" rows="4" cols="60" placeholder="Please enter any questions or special request."></textarea>
            </div>
          </fieldset>
          <hr class="mb-4">
          <div class="row">
            <div class="col-md-4 mb-3">
              <input class="btn btn-primary btn-lg btn-block" type="submit" value="Pay now"/>
            </div>
            <div class="col-md-4 mb-3">
      			   <input class="btn btn-primary btn-lg btn-block" type="reset" value="Reset form"/>
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
