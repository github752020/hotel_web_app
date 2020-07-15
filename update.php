<?php
  session_start ();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Update record</title>

<meta charset="utf-8" />
<meta name="description" content="Update record"  />
<meta name="keywords" content="PHP, Mysql" />
<link href="styles/style.css" rel="stylesheet" />
<link rel="stylesheet" href="styles/bootstrap.css"/>

</head>
<body>

<?php

include_once("header.inc");
include_once("menu.inc");
if (isset ($_SESSION["user"])) {
require_once ("settings.php");
$conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db);
if (!$conn) {
  echo "<p>Database connection failure</p>";
} else {

  if (isset ($_POST["update"])) {
    $order_status=trim($_POST["order_status"]);
    $update=trim($_POST["update"]);
    $query = "update orders set order_status='$order_status' where order_id=$update";}
  elseif (isset ($_POST["cancel"])) {
    $cancel=trim($_POST["cancel"]);
    $query = "delete from orders where order_id=$cancel";}

    $result = mysqli_query($conn, $query);

    if(!$result){
      echo "<p>Operation unsuccessful.</p>";
      echo $query;
    } else {
      echo "<p>Successfully operated</p>";
    }

    mysqli_close($conn);
}
} else {echo "<p class='red'>Please log in</p>";}
?>
<p><a href="manager.php">Back</a></p>
</body>
</html>
