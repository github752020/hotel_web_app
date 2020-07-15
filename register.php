<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 3" />
  <meta name="keywords" content="PHP, MYSQL" />
  <meta name="author" content="Quinn Chan"  />
  <title>Register</title>
  <link href="styles/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/bootstrap.css"/>
</head>
<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  $errm = "";
  $id = "";
  $pwd = "";
  function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 require_once ("settings.php");
 $conn = @mysqli_connect($host,
         $user,
         $pwd,
         $sql_db);
 if (!$conn) {
   echo "<p>Database connection failure</p>";
 } else {

   if (isset($_POST["id"])) {$id = sanitise_input($_POST["id"]);
  if (isset($_POST["pwd"])) {$pwd = sanitise_input($_POST["pwd"]);}

    $sql_table="manager";

    //id check
    if ( (strlen ($id) == 0 )) {
      $errm .= "<p>You must enter your username.</p>";
    }
    elseif (!preg_match("/^[a-zA-Z_]*$/",$id)) {
      $errm .= "<p>Only alpha letters and underscore are allowed in your username.</p>";
    }
    elseif ( (strlen ($id) > 25 )) {
      $errm .= "<p>Max 25 characters allowed in your username.</p>";
    }

    //pwd check
    if ( (strlen ($pwd) == 0 )) {
      $errm .= "<p>You must enter your password.</p>";
    }
    elseif (!preg_match("/^[0-9a-zA-Z]*$/",$pwd)) {
      $errm .= "<p>Only alpha letters and numbers are allowed in your password.</p>";
    }
    elseif ( (strlen ($pwd) > 25 )||(strlen ($pwd) < 8 )) {
      $errm .= "<p>Password must be between 8 to 25 characters.</p>";
    }

// check id is unique
    if ($errm == "") {
      $query = "select * from $sql_table where id='$id'";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) == 0) {
        $query = "insert into $sql_table (id, pwd) values ('$id', '$pwd')";
        $result = mysqli_query($conn, $query);

        if (!$result){echo "<p>Registration failed.</p>";}
        else {echo "<p>Your account has been created.</p>";}
      }
      else {$errm .="<p>Your username is not unique.</p>";}

    }}

  mysqli_close($conn);
}

?>
<h1>Manager Registration</h1>
<hr />
  <section id="form">
    <p>ID must be less than 25 characters with alphbets and "_" only.</p>
    <p>Password must be between 8 to 25 characters with alphbets and numbers only.</p>
    <form method="post" action="register.php" >
      <p>Enter ID:
      <input type="text" name="id" value="<?php echo $id; ?>"/></p>
      <p>Enter password:
      <input type="text" name="pwd" /></p>
      <section class="errMsg"><?php echo $errm; ?></section>
      <p><input type="submit" value="Register" /></p>
    </form>
    <p><a href = "login.php">Log In</a></p>
    <hr />
  </section>
</body>
</html>
