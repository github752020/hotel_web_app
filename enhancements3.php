<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 3" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Quinn Chan"  />
  <title>Enhancements3</title>
  <link href="styles/style.css" rel="stylesheet" />
</head>
<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  ?>

<article class="main">
  <h2>MANAGER REGISTRATION</h2>
    <p>This enhancement is applied to the <a href="manager.php">manger page</a>. It includes a <a href ="register.php">“Manager registration”</a> page
      with server side validation requiring a unique username and a password rule, and store this information in a table.
      A <a href ="login.php">“Manager Log-in”</a> page is used to control access to the manager web pages, ensuring the manager web page cannot be entered directly using a URL.
      A “Manager Log-out” page connected to a <a href ="logout.php">‘log-out’</a> link on the manager page if ‘logged in’. I have used a session
      to maintain the user's state. Myqsli is required to access the manager table.
    </p><br/>

    <h2>ADVANCED SEARCH</h2>
      <p>This enhancement is applied to the <a href="manager.php">manger page</a>. A number of advanced manager reports are provided based on compound queries.
        They include the most popular product ordered; fulfilled orders purchased between two dates the manager enters,
        and the average number of orders per day. This requires a separate display other than the result table. The queries have used
        comparison of date, datediff/distinct date to get the results.
    </p><br/>

    <h2>SORTING BY KEY VALUES</h2>
      <p>This enhancement is applied to the <a href="manager.php">manger page</a>. The user is able to select a column heading, and
re-sort the table in the order of that field. If selected again, reverse the order. This involves
the passing of variables and concatenate two query strings to form a sorting query.
The function is disabled when the query is sorting by order cost</p><br/>

  <h2>PREVIOUS ENHANCEMENT</h2>
    <p><a href="enhancements2.php">Link to enhancements from assignment 2</a></p>
    <br/>

</article>

<?php
  include_once("footer.inc");
?>

</body>
</html>
