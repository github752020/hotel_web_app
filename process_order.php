<!DOCTYPE html>
<html lang="en">
<head>
	<title>Process order</title>
	<meta charset="utf-8"/>
	<meta name="description" content="Assign3" />
	<meta name="keywords"    content="php" />
	<meta name="author"      content="Quinn Chan" />
</head>

<body>
	<h1>Process Order</h1>

<?php

		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

    $errMsg = "";
    //1
    if (isset ($_POST["firstname"])) {
      $firstname = sanitise_input($_POST["firstname"]);
      if ( (strlen ($firstname) == 0 )) {
        $errMsg .= "<p>You must enter your first name.</p>";
      }
      elseif (!preg_match("/^[a-zA-Z]*$/",$firstname)) {
  			$errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
  		}
      elseif ( (strlen ($firstname) > 25 )) {
        $errMsg .= "<p>Max 25 characters allowed in your first name.</p>";
      }

    //2
      $lastname = sanitise_input($_POST["lastname"]);
      if ( (strlen ($lastname) == 0 )) {
        $errMsg .= "<p>You must enter your last name.</p>";
      }
      elseif (!preg_match("/^[a-zA-Z]*$/",$lastname)) {
  			$errMsg .= "<p>Only alpha letters allowed in your last name.</p>";
  		}
      elseif ( (strlen ($lastname) > 25 )) {
        $errMsg .= "<p>Max 25 characters allowed in your last name.</p>";
      }

    //3
    $email = sanitise_input($_POST["email"]);
    if ((strlen ($email) == 0 )) {
      $errMsg .= "<p>You must enter your email address.</p>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errMsg .= "<p>Invalid email format</p>";
    }

    //4
    $phone = sanitise_input($_POST["phone"]);
    if ( (strlen ($phone) == 0 )) {
      $errMsg .= "<p>You must enter your phone number.</p>";
    }
    elseif (!is_numeric($phone)) {
			$errMsg .= "<p>You must enter only digits for phone number.</p>";
		}
    elseif ( (strlen ($phone) > 10 )) {
      $errMsg .= "<p>Max 10 digits allowed in your phone number.</p>";
    }

    //5
    $street = sanitise_input($_POST["street"]);
    if ( (strlen ($street) == 0 )) {
      $errMsg .= "<p>You must enter your street address.</p>";
    }
    elseif ( (strlen ($street) > 40 )) {
      $errMsg .= "<p>Max 40 characters allowed in your street address.</p>";
    }

    //6
    $suburb = sanitise_input($_POST["suburb"]);
    if ( (strlen ($suburb) == 0 )) {
      $errMsg .= "<p>You must enter your suburb address.</p>";
    }
    elseif ( (strlen ($suburb) > 20 )) {
      $errMsg .= "<p>Max 20 characters allowed in your suburb address.</p>";
    }

    //7
    $postcode = sanitise_input($_POST["postcode"]);
    if ( (strlen ($postcode) == 0 )) {
      $errMsg .= "<p>You must enter your postcode.</p>";
    }
    elseif (!is_numeric($postcode)) {
			$errMsg .= "<p>You must enter only digits for postcode.</p>";
		}
    elseif ( (strlen ($postcode) != 4 )) {
      $errMsg .= "<p>Exactly 4 digits allowed in your postcode.</p>";
    }

    //8
    if (isset ($_POST["state"])) {$state = sanitise_input($_POST["state"]);
		if (strlen ($state) == 0 ) {
      $errMsg .= "<p>You must enter your state.</p>";
    } else {
    switch ($state) {
      case "vic":
      $x = array("3","8");
       break;
      case "nsw":
      $x = array("1","2");
        break;
      case "qld":
      $x = array("4","9");
        break;
      case "act":
      case "nt":
      $x = array("0");
        break;
      case "wa":
      $x = array("6");
        break;
      case "sa":
      $x = array("5");
        break;
      case "tas":
      $x = array("7");
        break;
    }
    if (!in_array($postcode[0], $x)) {
      $y = implode("or", $x);
     $errMsg .= "<p>The postcode for $state starts with $y</p>";
	 }}}

    //9
    if (isset ($_POST["contact"])) {$contact = sanitise_input($_POST["contact"]);}
		if ( (strlen ($contact) == 0 )) {
      $errMsg .= "<p>You must enter preferred contact.</p>";
    }
    //10
    $room = sanitise_input($_POST["room"]);
    if ( (strlen ($room) == 0 )) {
      $errMsg .= "<p>You must select room type.</p>";
    }

    //11
    $nights = sanitise_input($_POST["nights"]);
    if ( (strlen ($nights) == 0 )) {
      $errMsg .= "<p>You must enter number of nights.</p>";
    }
    elseif (!filter_var($nights, FILTER_VALIDATE_INT) ||($nights <= 0)) {
      $errMsg .= "<p>You must enter positive integer for nights.</p>";
    }

    //12
		if (isset ($_POST["optional"])) {$optional = sanitise_input($_POST["optional"]);}
		else {
			$optional = "";
		if (isset ($_POST["features"])){$optional.="None,";}
		if (isset ($_POST["smoking"])) {$optional.="Smoking room,";}
		if (isset ($_POST["nosmoking"])){$optional.="Non-smoking room,";}
		if (isset ($_POST["pickup"])){$optional.="Airport pick-up,";}
		if (isset ($_POST["breakfast"])) {$optional.="Breakfast";}
    }

    //13
    $comment = sanitise_input($_POST["comment"]);

    //14
    //$cost = sanitise_input($_POST["cost"]);

    //15
		$paymentMethod = "";
    if (isset ($_POST["paymentMethod"])) {$paymentMethod = sanitise_input($_POST["paymentMethod"]);}
    if ( (strlen ($paymentMethod) == 0 )) {
      $errMsg .= "<p>You must select card type.</p>";
    }

    //16
    $cardname = sanitise_input($_POST["cardname"]);
    if ( (strlen ($cardname) == 0 )) {
      $errMsg .= "<p>You must enter your card name.</p>";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",$cardname)) {
      $errMsg .= "<p>Only alpha letters and space allowed in your card name.</p>";
    }
    elseif ( (strlen ($cardname) > 40 )) {
      $errMsg .= "<p>Max 40 characters allowed in your card name.</p>";
    }

    //17
    $cardexp = sanitise_input($_POST["cardexp"]);
    $month = substr($cardexp,0,2);
    $year = substr($cardexp,3,2);
    if (strlen ($cardexp) == 0 ) {
      $errMsg .= "<p>You must enter your card expiry date.</p>";
    }
    elseif ((!preg_match("/^\d\d-\d\d$/",$cardexp)) ||($month>12)||($month<1)) {
      $errMsg .= "<p>Please enter valid card expiry date.</p>";
    }
    elseif (date("Y") > ($year+2000)) {
      $errMsg .= "<p>Your credit card is expired</p>";
    }
    elseif ((date("Y") == ($year+2000)) && (date('m') > $month)) {
      $errMsg .= "<p>Your credit card is expired</p>";
    }

    //18
    $cardcvv = sanitise_input($_POST["cardcvv"]);
		if (strlen ($cardcvv) == 0 ) {
      $errMsg .= "<p>You must enter your card CVV.</p>";
    }
		else {
    switch ($paymentMethod) {
      case "visa":
      case "mastercard":
      if (!preg_match("/^[0-9]{3}$/", $cardcvv)){
        $errMsg .= "<p>Please enter a valid 3-digit CVV</p>";
      }
      break;
      case "americanexpress":
       if (!preg_match("/^[0-9]{4}$/", $cardcvv)){
      $errMsg .= "<p>Please enter a valid 4-digit CVV</p>";
    } break;
  }}

    //19
    $cardno = sanitise_input($_POST["cardno"]);
		if (strlen ($cardno) == 0 ) {
      $errMsg .= "<p>You must enter your card number.</p>";
    }
		else {
    switch ($paymentMethod) {
      case "visa":
      if (!preg_match("/^4[0-9]{15}$/", $cardno)){
        $errMsg .= "<p>Visa card number must be 16 digits starting with 4.</p>";
      }
      break;
      case "mastercard":
      if (!preg_match("/^5[1-5][0-9]{14}$/", $cardno)){
        $errMsg .= "<p>MasterCard number must be 16 digits starting with 51 to 55.</p>";
      }
      break;
      case "americanexpress":
       if (!preg_match("/^3[4-7][0-9]{13}$/", $cardno)){
      $errMsg .= "<p>American Express number must be 15 digits starting with 34 to 37.</p>";
    } break;
  }}



//to fix_order if theres error
    if ($errMsg != "") {
     header("location:fix_order.php?errMsg=".$errMsg."&firstname=".$firstname.
   "&lastname=".$lastname."&email=".$email."&phone=".$phone."&street=".$street.
   "&suburb=".$suburb."&state=".$state."&postcode=".$postcode."&contact=".$contact.
   "&room=".$room."&nights=".$nights."&optional=".$optional."&comment=".$comment);
 }

    else { //calculate cost
      switch ($room){
      case "single":
        $cost = 190;
        break;
      case "double":
          $cost = 350;
          break;
      case "family":
            $cost = 490;
            break;
      }
      $order_cost = $nights*$cost;
      $order_time = date('Y-m-d H:i:s');
      $order_status = "pending";
//store order in database
      require_once ("settings.php");
      $conn = @mysqli_connect($host,
              $user,
              $pwd,
              $sql_db);
      if (!$conn) {
        echo "<p>Database connection failure</p>";
      }
      else {
			$create_table = "create table if not exists `orders`
			(firstname varchar(25) NOT NULL,
			lastname varchar(25) NOT NULL,
			email varchar(30) NOT NULL,
			phone varchar(10) NOT NULL,
			street varchar(40) NOT NULL,
			suburb varchar(20) NOT NULL,
			state char(3) NOT NULL,
			postcode char(4) NOT NULL,
			contact varchar(10) NOT NULL,
			room varchar(10) NOT NULL,
			nights int NOT NULL,
			optional varchar(60),
			comment varchar(100),
			paymentMethod varchar(20) NOT NULL,
			cardname varchar(50) NOT NULL,
			cardno varchar(20) NOT NULL,
			cardexp varchar(20) NOT NULL,
			cardcvv varchar(4) NOT NULL,
			order_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			order_cost decimal(10,2) NOT NULL,
			order_time DATETIME(0) NOT NULL,
			order_status varchar(10) NOT NULL);";
			$result = mysqli_query($conn, $create_table);
      $sql_table="orders";
      $query = "insert into $sql_table (firstname,lastname,email,phone,street,suburb,state,postcode,
      contact,room,nights,optional,comment,paymentMethod,cardno,cardcvv,
      cardexp,cardname,order_cost,order_time,order_status) values
      ('$firstname','$lastname','$email','$phone','$street','$suburb','$state','$postcode',
      '$contact','$room','$nights','$optional','$comment','$paymentMethod','$cardno','$cardcvv',
      '$cardexp','$cardname','$order_cost','$order_time','$order_status')";
      $result = mysqli_query($conn, $query);
      $order_id = mysqli_insert_id($conn);

			//display receipt if data is stored
      if(!$result){
        echo "<p class=\"wrong\">Something is wrong with",  $query, "</p>";
      } else {
				$cc = str_pad(substr($cardno, -4), strlen($cardno), '*', STR_PAD_LEFT);
        header("location:receipt.php?errMsg=".$errMsg."&firstname=".$firstname.
      "&lastname=".$lastname."&email=".$email."&phone=".$phone."&street=".$street.
      "&suburb=".$suburb."&state=".$state."&postcode=".$postcode."&contact=".$contact.
      "&room=".$room."&nights=".$nights."&optional=".$optional."&comment=".$comment.
      "&paymentMethod=".$paymentMethod."&cardno=".$cc."&cardcvv=".$cardcvv."&cardexp=".$cardexp.
      "&cardname=".$cardname."&order_id=".$order_id."&order_cost=".$order_cost.
			"&order_time=".$order_time."&order_status=".$order_status);
      }
      mysqli_close($conn);
      }

    }
	}
	else{
		header ("location:enquire.php"); //cannot access if not directed from payment.php
	}

?>

</body>
</html>
