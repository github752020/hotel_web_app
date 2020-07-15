<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 1" />
  <meta name="keywords" content="HTML5, CSS" />
  <meta name="author" content="Quinn Chan"  />
  <title>Hotel rooms</title>
  <link href="styles/style.css" rel="stylesheet" />

</head>
<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  ?>



  <div class="container-fluid">
    <div class="row equal">
      <aside id="product">
<!--Slideshow items-->
        <ul id="slides">
          <li class="slide showing"></li>
          <li class="slide"></li>
          <li class="slide"></li>
          <li class="slide"></li>
        </ul>
      </aside>

      <section id="producttext">
        <h1>You are nearly there.</h1>
            <p>
              Located in the heart of Melbourne and overlooking Rundle Mall, set within a heritage-listed, renovated building, the boutique Hotel Nearly There is 200 m from the Art Gallery of Australia. It is 3 minutes' drive from Melbourne Convention Centre, Victoria Oval and Parliament House. Melbourne Airport is 4.5 km away.
              <br/>Guests at Hotel Nearly There have access to the restaurants, cinemas, nightclubs, bars and a 25-yard heated indoor pool, steam room, sun terraces and a fully equipped fitness centre. Guests also enjoy an onsite fitness centre. The Hotel Nearly There Spa offers a range of facials, massages, beauty treatments and therapies.
              <br/>The luxurious Hotel Nearly There offers free WiFi, a restaurant and lounge bar. There are 3 types of rooms - single, double, and family rooms. All rooms offer stylish décor and a 55-inch flat-screen TV. Each room features original artworks and marble bathrooms, the city and bay views are framed by floor-to-ceiling windows.We speak your language!
            </p><br><br><br>
            <p>Please choose your desired room type</p>
            <ul>
              <li><a href="#single"><img src="images/single.png" alt="single"></a></li>
              <li><a href="#double"><img src="images/double.png" alt="double"></a></li>
              <li><a href="#family"><img src="images/family.png" alt="family"></a></li>
            </ul>
      </section>
<!--Single room-->
      <section class="room" id="single">
        <div class="price">
          <h1>Single Room </h1>
          <h2>From AUD 190</h2>
        </div>
          <table class="features">
            <caption>Room Features</caption>
            <tr>
              <td><h2>120 sqft</h2></td>
              <td class="options" colspan="2">
                <em>Optional features</em>
              <ol>
                <li>Smoking room</li>
                <li>Non-smoking room</li>
                <li>Airport pick-up</li>
                <li>Breakfast</li>
              </ol>
              </td>
            </tr>
            <tr>
              <td><img src="images/singlebed.svg" width="103" alt="single bed">Single Bed</td>
              <td><img src="images/bath.png" alt="bathroom">Bathroom</td>
              <td><img src="images/wifi.png" alt="wifi">Free Wifi</td>
            </tr>
            <tr>
              <td><img src="images/tv.png" alt="TV">Flat TV</td>
              <td><img src="images/aircon.png" alt="air con">Air Conditioning</td>
              <td><img src="images/minibar.png" alt="minibar">Minibar</td>
            </tr>
          </table>
        <a href="#producttext">back to top</a>
      </section>
<!--Double room-->
      <section class="room" id="double">
        <div class="price">
          <h1>Double Room</h1>
          <h2>From AUD 350</h2>
        </div>
        <table class="features">
          <caption>Room Features</caption>
            <tr>
              <td><h2>200 sqft</h2></td>
              <td class="options" colspan="2">
                <em>Optional features</em>
              <ol>
                <li>Twin beds</li>
                <li>Smoking room</li>
                <li>Non-smoking room</li>
                <li>Airport pick-up</li>
                <li>Breakfast</li>
              </ol>
              </td>
            </tr>
            <tr>
              <td><img src="images/doublebed.svg" width="103" alt="king bed">King's Bed</td>
              <td><img src="images/bath.png" alt="bathroom">Bathroom</td>
              <td><img src="images/wifi.png" alt="wifi">Free Wifi</td>
            </tr>
            <tr>
              <td><img src="images/tv.png" alt="TV">Flat TV</td>
              <td><img src="images/aircon.png" alt="air con">Air Conditioning</td>
              <td><img src="images/minibar.png" alt="minibar">Minibar</td>
            </tr>
          </table>
          <a href="#producttext">back to top</a>
      </section>
<!--Family suite-->
      <section class="room" id="family">
        <div class="price">
          <h1>Family Suite</h1>
          <h2>From AUD 490</h2>
        </div>
          <table class="features">
            <caption>Room Features</caption>
            <tr>
              <td><h2>460 sqft</h2></td>
              <td class="options" colspan="2">
                <em>Optional features</em>
              <ol>
                <li>Smoking room</li>
                <li>Non-smoking room</li>
                <li>Airport pick-up</li>
                <li>Breakfast</li>
              </ol>
              </td>
            </tr>
            <tr>
              <td colspan="3"><img src="images/doublebed.svg" width="103" alt="queen bed">
                <img src="images/doublebed.svg" width="103" alt="queen bed">Two Queen's Beds</td>
            <tr>
              <td><img src="images/bath.png" alt="bathroom">Bathroom</td>
              <td><img src="images/tv.png" alt="TV">Flat TV</td>
              <td><img src="images/aircon.png" alt="air con">Air Conditioning</td>
            </tr>
            <tr>
              <td><img src="images/wifi.png" alt="wifi">Free Wifi</td>
              <td><img src="images/minibar.png" alt="minibar">Minibar</td>
              <td><img src="images/laundry.png" alt="laundry">Washing machine</td>
            </tr>
          </table>
          <a href="#producttext">back to top</a>
      </section>
    </div>
  </div>

  <?php
    include_once("footer.inc");
  ?>
  <script src="scripts/enhancements.js"></script>
</body>
</html>
