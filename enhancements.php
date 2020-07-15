<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="COS60004 Assignment 1" />
  <meta name="keywords" content="HTML5, CSS" />
  <meta name="author" content="Quinn Chan"  />
  <title>Enhancements</title>
  <link href="styles/style.css" rel="stylesheet" />
</head>
<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  ?>

<article class="main">
  <h2>RESPONSIVE DESIGN</h2>
    <p>Responsive design for both mobile phone and tablet is implemented with the use of media query.
      At the moment, it is mainly used around width and height of divisions.
      In the future, responsive design need to be used on more elements such as font sizes, deactivating animations.
      Mobile first design needs to be applied in the future.
      This design is applied to <a href="index.html">index page</a>, <a href="product.html">product page</a> and <a href="enquire.html">enquire page</a>.
    </p><br/>

    <h2>BOOTSTRAP</h2>
      <p>Bootstrap is used on the <a href="enquire.html">enquire page</a> and <a href="about.html">about page</a> for the styling of the form,
       the timetable, and the layout of self-introduction. Column adjustment classes are also used.
        The use was limited by some of the assignment requirements, such as use of hexadecimal numbered color instead of the bootstrap classes.
      In the future, bootstrap could be applied to the entired website with the use of a large
      number of classes.
    </p><br/>

    <h2>Others</h2>
      <p>Interactive buttons are used in the navigation bar with pseudo-elements.
      </p><br/>

    <h2>Acknowledgement</h2>
      <p>Images are sourced from external websites.</p>
        <ol>
          <li><img alt="paramount house hotel" class="thumbnails" src="styles/images/background.jpg"> of Paramount House Hotel from <a href="https://www.telegraph.co.uk/travel/destinations/oceania/australia/new-south-wales/sydney/hotels/paramount-house-hotel/">The Telegraph</a></li>
          <li><img alt="1 hotel south beach" class="thumbnails" src="styles/images/1hotelsouthbeach.jpg"> of 1 Hotel South Beach from <a href="http://tipsydiaries.com/2015/11/20/the-best-hotel-for-art-basel-miami-beach-1-hotel-homes-south-beach/">TIPSY DIARIES</a></li>
          <li><img alt="palm trees" class="thumbnails" src="styles/images/trees.jpg"> from <a href="http://www.pinterest.com/">Pinterest</a></li>
          <li><img alt="icons" class="thumbnails" src="images/single.png"> and all the other icons used in the product page from <a href="http://www.freepik.com/">Freepik</a></li>
        </ol>
</article>

<?php
  include_once("footer.inc");
?>

</body>
</html>
