<?php if (!isset($_GET["firstname"])) {header ("location:enquire.php");} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 3" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Quinn Chan"  />
  <title>Receipt</title>

  <link href="styles/bootstrap.css" rel="stylesheet"/>
  <link href="styles/style.css" rel="stylesheet" />
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
        <h1>RECEIPT</h1>
        <p class="py-5 text-center">
          Thank you for your order, we look forward to your arrival.
        </p>
        <fieldset>
          <legend>Order Details</legend>
          <p>Order number: <?php echo  $_GET["order_id"] ?></p>
          <p>Order total: AUD <?php echo  $_GET["order_cost"] ?></p>
          <p>Order time: <?php echo  $_GET["order_time"] ?></p>
          <p>Order status: <?php echo  $_GET["order_status"] ?></p>
        </fieldset>
        <fieldset>
          <legend>Your Details</legend>
          <p>Your Name: <?php echo $_GET["firstname"]." ".$_GET["lastname"] ?></p>
          <p>Email address: <?php echo  $_GET["email"] ?></p>
          <p>Phone number: <?php echo  $_GET["phone"] ?></p>
          <p>Address: <?php echo $_GET["street"]." ".$_GET["suburb"]." ".$_GET["state"]." ".$_GET["postcode"] ?></p>
          <p>Contact Preference: By <?php echo  $_GET["contact"] ?></p>
        </fieldset>
        <fieldset>
          <legend>Booking Details</legend>
          <p>Room type: <?php echo  $_GET["room"] ?></p>
          <p>Length of stay: <?php echo  $_GET["nights"] ?> nights</p>
          <p>Optional features: <?php echo  $_GET["optional"] ?></p>
          <p>Comment: <?php echo  $_GET["comment"] ?></p>
        </fieldset>
        <fieldset>
          <legend>Payment Details</legend>
          <p>Card type: <?php echo  $_GET["paymentMethod"] ?></p>
          <p>Card holder: <?php echo  $_GET["cardname"] ?></p>
          <p>Card number: <?php echo  $_GET["cardno"] ?></p>
          <p>Card expiration date: <?php echo  $_GET["cardexp"] ?></p>
          <p>Card CVV: <?php echo  $_GET["cardcvv"] ?></p>
        </fieldset>


      </section>
    </div>
</div>

<?php
  include_once("footer.inc");
?>

</body>
</html>
