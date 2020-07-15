<?php
  session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Manager</title>
<meta charset="utf-8" />

 <link rel="stylesheet" href="styles/bootstrap.css"/>
 <link href="styles/style.css" rel="stylesheet" />
 </head>
<body>
<?php
include_once("header.inc");
include_once("menu.inc");

  if (isset ($_SESSION["user"])) {
    $user = $_SESSION["user"];
    echo "<h2>Welcome: ", $user, "</h2>";
?>
<section id="form">
  <form method="post" action="search.php">
    <input type="hidden" name="query" id="order_by_all" value="order_by_all"/>
    <p>	<input type="submit" value="Display all" /></p>
  </form><hr>

  <form method="post" action="search.php">
    <input type="hidden" name="query" id="order_by_name" value="order_by_name"/>
    <p>	<label for="order_firstname">Firstname of customer: </label>
			<input type="text" name="order_firstname" id="order_firstname" placeholder="firstname"/>
      	<label for="order_lastname">Lastname of customer: </label>
        <input type="text" name="order_lastname" id="order_lastname" placeholder="lastname"/></p>
    <p>	<input type="submit" value="Display by name" /></p>
  </form><hr>

  <form method="post" action="search.php">
    <input type="hidden" name="query" id="order_by_room" value="order_by_room"/>
    <p> <label for="order_room">Room type</label>
      <select name="order_room" id="order_room" required="required" size=3>
        <option value="single" selected="selected">Single Room</option>
        <option value="double">Double Room</option>
        <option value="family">Family Suite</option>
        </select></p>
    <p>	<input type="submit" value="Display by room" /></p>
  </form><hr>

  <form method="post" action="search.php">
    <input type="hidden" name="query" id="order_by_status" value="order_by_status"/>
    <p> <label for="order_status">Order status</label>
      <select name="order_status" id="order_status" required="required" size=4>
      <option value="pending" selected="selected">Pending</option>
        <option value="fulfilled">Fulfilled</option>
        <option value="paid">Paid</option>
        <option value="archieved">Archieved</option>
        </select></p>
    <p>	<input type="submit" value="Display by status" /></p>
  </form><hr>

  <form method="post" action="search.php">
    <input type="hidden" name="query" id="order_by_cost" value="order_by_cost"/>
    <p>	<input type="submit" value="Sorted by cost" /></p>
  </form>

  <fieldset>
    <legend>Advanced search</legend>
    <form method="post" action="search.php">
      <input type="hidden" name="query" id="order_by_popular" value="order_by_popular"/>
      <p>	<input type="submit" value="Display the most popular room" /></p>
    </form><hr>

    <form method="post" action="search.php">
      <input type="hidden" name="query" id="order_by_date" value="order_by_date"/>
      <p>	<label for="order_startdate">Start date: </label>
        <input type="text" name="order_startdate" id="order_startdate" placeholder="YYYY-MM-DD"/>
          <label for="order_enddate">End date: </label>
          <input type="text" name="order_enddate" id="order_enddate" placeholder="YYYY-MM-DD"/></p>
      <p>	<input type="submit" value="Fulfilled orders within chosen period" /></p>
    </form><hr>

    <form method="post" action="search.php">
      <input type="hidden" name="query" id="order_by_average" value="order_by_average"/>
      <p>	<input type="submit" value="Average number of orders per day" /></p>
    </form><hr>
  </fieldset>

	<p><a href="logout.php">Log out</a></p>
<?php
  } else {
    /*echo "<p class='red'>Please log in</p>";*/
   header ("location:login.php");
	}
?>
<hr />
<p><a href="index.html">Home</a></p>
</section>
</body>
</html>
