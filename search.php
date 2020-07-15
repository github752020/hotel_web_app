<?php
  session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Search result</title>
<meta charset="utf-8" />
 <link href="styles/style.css" rel="stylesheet" />
 </head>
<body>
<?php
include_once("header.inc");
include_once("menu.inc");

  if (isset ($_SESSION["user"])) {
    $user = $_SESSION["user"];
    echo "<h2>Welcome: ", $user, "</h2>";

    require_once ("settings.php");
    $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db);
    if (!$conn) {
      echo "<p>Database connection failure</p>";
    } else {
    $firstname="";
    $lastname="";
    $room="";
    $order_status="";
    $order_startdate="";
    $order_enddate="";

    if (isset ($_GET["order_firstname"])) {$firstname = trim($_GET["order_firstname"]);}
    if (isset ($_GET["order_lastname"])) {$lastname = trim($_GET["order_lastname"]);}
    if (isset ($_GET["order_room"])) {$room = trim($_GET["order_room"]);}
    if (isset ($_GET["order_status"])) {$order_status = trim($_GET["order_status"]);}
    if (isset ($_GET["order_startdate"])) {$order_startdate = trim($_GET["order_startdate"]);}
    if (isset ($_GET["order_enddate"])) {$order_enddate = trim($_GET["order_enddate"]);}

    if (isset ($_POST["order_firstname"])) {$firstname = trim($_POST["order_firstname"]);}
    if (isset ($_POST["order_lastname"])) {$lastname = trim($_POST["order_lastname"]);}
    if (isset ($_POST["order_room"])) {$room = trim($_POST["order_room"]);}
    if (isset ($_POST["order_status"])) {$order_status = trim($_POST["order_status"]);}
    if (isset ($_POST["order_startdate"])) {$order_startdate = trim($_POST["order_startdate"]);}
    if (isset ($_POST["order_enddate"])) {$order_enddate = trim($_POST["order_enddate"]);}
    if (isset($_POST["query"])) {$q = $_POST["query"];}
    elseif (isset($_GET["query"])) {$q = $_GET["query"];}
    else {header("location:manger.php");}
    //queries
    switch($q)
     {
      case "order_by_all":
      $query = "select order_id, order_time, order_cost, room, nights, optional,
      firstname, lastname, order_status FROM orders";
       break;
      case "order_by_name":
      $query = "select order_id, order_time, order_cost, room, nights, optional,
      firstname, lastname, order_status FROM orders WHERE firstname='$firstname'
      and lastname='$lastname'";
        break;
      case "order_by_room":
      $query = "select order_id, order_time, order_cost, room, nights, optional,
      firstname, lastname, order_status FROM orders WHERE room='$room'";
        break;
      case "order_by_status":
      $query = "select order_id, order_time, order_cost, room, nights, optional,
      firstname, lastname, order_status FROM orders WHERE order_status='$order_status'";
      break;
      case "order_by_cost":
      $query = "select order_id, order_time, order_cost, room, nights, optional,
      firstname, lastname, order_status FROM orders ORDER BY order_cost";
        break;
      case "order_by_popular":
      $query_advanced = "select room, COUNT(*) FROM orders GROUP BY room ORDER BY COUNT(*) DESC LIMIT 1";
      $result_advanced = mysqli_query($conn, $query_advanced);
      $row = mysqli_fetch_assoc($result_advanced);
      echo "<p>The most popular room is ", $row['room'],"</p>";
        break;
      case "order_by_date":
      $query = "select * FROM orders WHERE DATE(order_time) >= DATE('$order_startdate 00:00:00')
  AND DATE(order_time) <= DATE('$order_enddate 23:59:59') and order_status='fulfilled'";
        break;
      case "order_by_average":
      //select count(*)/DATEDIFF(now(), MIN(order_time)) from orders; if you want to count from first order to today
      $query_advanced = "select count(*) / count(distinct date(order_time)) from orders";
      $result_advanced = mysqli_query($conn, $query_advanced);
      $row = mysqli_fetch_assoc($result_advanced);
      echo "<p>Average order per day is ", $row['count(*) / count(distinct date(order_time))'], "</p>";
        break;
    }

    //sorting function
    $sort="";
    $order="asc";
    if ($q != "order_by_cost"){
    if (isset($_GET["order"])) {$order = $_GET["order"];}
    $lastsort="order_id"; if (isset($_GET["lastsort"])) {$lastsort = $_GET["lastsort"];}
    if (isset($_GET["sort"])) {
      $sort = $_GET["sort"];
        if ($sort==$lastsort) {
          if ($order=="asc") {$query .= " ORDER BY $sort DESC"; $order="desc";}
          else {$query .= " ORDER BY $sort ASC"; $order="asc";}
        } else {$query .= " ORDER BY $sort ASC"; $order="asc";}

    }
    $lastsort = $sort;
}

//display result in a table
    if (($q != "order_by_average")&&($q != "order_by_popular")){
    $result = mysqli_query($conn, $query);

    if (!$result) {
      echo "<p>Something is wrong with ", $query, "</p>";
    } else {
      echo "<table class=\"manager\">\n";
      echo "<tr>\n "
      ."<th scope=\"col\"><a href=\"search.php?sort=order_id&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Order number</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=order_time&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Order date</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=order_cost&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Order cost</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=room&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Room type</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=nights&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Stay(Nights)</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=optional&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Optional</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=firstname&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">First name</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=lastname&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Last name</a></th>\n"
      ."<th scope=\"col\"><a href=\"search.php?sort=order_status&query=$q&lastsort=$sort&order=$order&order_firstname=$firstname&order_lastname=$lastname&order_room=$room&order_status=$order_status&order_startdate=$order_startdate&order_enddate=$order_enddate\">Order status</a></th>\n"
      ."<th scope=\"col\">Change status</th>\n"
      ."<th scope=\"col\">Cancel order</th>\n"
      ."</tr>\n ";

      while ($row = mysqli_fetch_assoc($result)){
        echo "<tr>\n ";
        echo "<td>", $row["order_id"],"</td>\n";
        echo "<td>", $row["order_time"],"</td>\n";
        echo "<td>", $row["order_cost"],"</td>\n";
        echo "<td>", $row["room"],"</td>\n";
        echo "<td>", $row["nights"],"</td>\n";
        echo "<td>", $row["optional"],"</td>\n";
        echo "<td>", $row["firstname"],"</td>\n";
        echo "<td>", $row["lastname"],"</td>\n";
        echo "<td>", $row["order_status"],"</td>\n";
        echo '<td><form method="post" action="update.php">
        <select name="order_status">
        <option value="pending">Pending</option>
        <option value="fulfilled">Fulfilled</option>
        <option value="paid">Paid</option>
        <option value="archieved">Archieved</option>
        </select><button type="submit" value="',$row["order_id"],'" name="update">Update</button></form></td>';
        echo '<td><form method="post" action="update.php"><button type="submit" value="',$row["order_id"],'" name="cancel">Cancel</button></form></td>';
        echo "</tr>\n ";
      }
    echo "</table>\n";}
    mysqli_free_result($result);

    }
    mysqli_close($conn);

  }
?>
	<p><a href="logout.php">Log out</a></p>
<?php
  } else {
    echo "<p class='red'>Please log in</p>";
  }
?>
<hr />
<p><a href="manager.php">Back</a></p>
</body>
</html>
