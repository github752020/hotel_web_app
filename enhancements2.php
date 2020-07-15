<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 1" />
  <meta name="keywords" content="HTML5, CSS" />
  <meta name="author" content="Quinn Chan"  />
  <title>Enhancements2</title>
  <link href="styles/style.css" rel="stylesheet" />
</head>
<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  ?>

<article class="main">
  <h2>PRELOADED USERNAME</h2>
    <p>’Name on Credit Card’ as a concatenation of the firstname and lastname,
      into the input field, to enable a user to change the value.The event is triggered on window load.
      This design is applied to the <a href="payment.html">payment page</a>. In the future, other
       form-prefilling codes can be implemented, with the precautions of user privacy.
    </p><br/>

    <h2>SLIDESHOW</h2>
      <p>Hotel pictures are displayed dynamically on the <a href="product.html">product page</a>.
        The slideshow is triggered by window load. Fade in-and-out effect was used with the help of CSS.
         This technique is acknowledged to <a href="https://www.sitepoint.com/make-a-simple-javascript-slideshow-without-jquery/">
           Yaphi Berhanu - Make a Simple JavaScript Slideshow without jQuery</a>.
         querySelectorAll is used, so the link to script file needs to be at the bottom of the html,
         after loading all required elements. In the future, this effect could be achieved with
         various methods, one of which is jQuery. Code to handle situation when JavaScript is unavailable
         also need to be implemented.
    </p><br/>

    <h2>PREVIOUS ENHANCEMENT</h2>
      <p><a href="enhancements.html">Link to enhancements from assignment 1</a></p>

    <h2>Acknowledgement</h2>
      <p>Images are sourced from external websites in additional to those previously used.</p>
        <ol>
          <li><img alt="champagne" class="thumbnails" src="styles/images/cham.jpg"> from <a href="https://www.lottehotel.com/gimpo-city/en/hotel-offers/packages/2019-01/the-suite-in-the-city.html">LOTTE City Hotel Gimpo Airport</a></li>
          <li><img alt="massage" class="thumbnails" src="styles/images/massage.jpg"> from <a href="https://miosuperhealth.com/benefits-of-massage-therapy-at-the-spa/">MIOSUPERHEALTH</a></li>
          <li><img alt="wine glasses" class="thumbnails" src="styles/images/wine2.jpg"> from <a href="https://holidayinnmelbourne.com.au/">Holiday Inn Melbourne</a></li>
        </ol>
</article>

<?php
  include_once("footer.inc");
?>

</body>
</html>
