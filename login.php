<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 3" />
  <meta name="keywords" content="PHP, MYSQL" />
  <meta name="author" content="Quinn Chan"  />
  <title>Log In</title>
  <link href="styles/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/bootstrap.css"/>
</head>
<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  $tries = 0;
  $errm = "";
  $id = "";
 session_start();
 require_once ("settings.php");
 $conn = @mysqli_connect($host,
         $user,
         $pwd,
         $sql_db);
 if (!$conn) {
   echo "<p>Database connection failure</p>";
 } else {

   if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $tries = $_POST["tries"];
    $limit=3;
    $sql_table="manager";
    $query = "select * from $sql_table where id='$id'and pwd='$pwd'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0)  {
      $errm = "Invalid login";
      $tries++;
      if ($tries>$limit){
      header ("location:index.php");}
    }
    else {
    	$_SESSION ["user"] = $id;
    	header ("location:manager.php");}

  }
}

?>
<h1>Manager Log-in</h1>
<hr />
  <section id="form">
    <form method="post" action="login.php" >
      <p>Enter ID:
        <input type="text" name="id" value="<?php echo $id; ?>"/></p>
      <p>Enter password:
        <input type="text" name="pwd" />
        <span class="errMsg"><?php echo $errm; ?></span>
      </p>

      <p><input type="hidden" name="tries" value="<?php echo $tries; ?>"/><p>
        <p><input type="submit" value="Log in" /></p>
    </form>
    <p><a href = "register.php">Register</a></p>
    <hr />
    <p><?php echo $tries, " attempt(s) recorded"; ?></p>
  </section>
</body>
</html>
