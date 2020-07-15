<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="COS60004 Assignment 1" />
  <meta name="keywords" content="HTML5, CSS" />
  <meta name="author" content="Quinn Chan"  />
  <title>About</title>
  <link href="styles/bootstrap.css" rel="stylesheet"/>
  <link href="styles/style.css" rel="stylesheet" />
</head>

<body>
  <?php
    include_once("header.inc");
    include_once("menu.inc");
  ?>

  <div class="container">
    <div class="row">
      <section class="col-md-4">
        <h2>My Details</h2>
        <dl>
          <dt>Name:</dt>
          <dd>Quinn Chan</dd>
          <dt>Student ID</dt>
          <dd>s103053395</dd>
          <dt>Course:</dt>
          <dd>Master of Information Technology</dd>
          <dt>Email:</dt>
          <dd><a href="mailto:103053395@student.swin.edu.au">103053395@student.swin.edu.au</a></dd>
        </dl>
      </section>

      <section class="col-md-4">
        <h2>About Me</h2>
        <p>I was a nurse before I started studying in the Swinburne University.
        I really enjoy the course, in which I have so far learnt Ruby on Rails,
      html, css, and SQL. My favourite Netflix show is "The IT Crowd".</p>
      <p>The photo I am showing is me and my cat Max.
        When I got him from the friend of my friend, he had a surgery done
        on his right eye, which involved pulling his third eyelid to cover the
        corneal ulcer. Max is now three years old and has developed catarat in
      his operated eye.</p>
    </section>

    <section class="col-md-4">
      <h2>My Photo</h2>
      <figure id="max">
        <img src="images/me.jpg" alt="Quinn and max" width="305">
      </figure>
    </section>
  </div>

<section class="mb-3">
  <table class="table table-responsive">
    <caption><h2>My Swinburne timetable</h2></caption>
    <thead>
      <tr class="time">
        <th> </th>
        <th>8:30am</th>
        <th>9:30am</th>
        <th>10:30am</th>
        <th>11:30am</th>
        <th>12:30am</th>
        <th>1:30pm</th>
        <th>2:30pm</th>
        <th>3:30pm</th>
        <th>4:30pm</th>
        <th>5:30pm</th>
        <th>6:30pm</th>
        <th>7:30pm</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="table-info">Monday</td>
        <td colspan="9" class="nothing"> </td>
        <td colspan="2" class="COS60004">Creating Web Application COS60004</td>
        <td colspan="1" class="nothing"> </td>
      </tr>
      <tr>
        <td class="table-info">Tuesday</td>
        <td colspan="2" class="COS60006">Introduction to programming COS60006</td>
        <td colspan="2" class="COS60006">Tutorial COS60006</td>
        <td colspan="6" class="nothing"> </td>
        <td colspan="2" class="INF60007">Business Information system INF60007</td>
      </tr>
      <tr>
        <td class="table-info">Wednesday</td>
        <td colspan="2" class="COS60006">Workshop COS60006</td>
        <td colspan="2" class="COS60009">Data Management for the big Data Age COS60009</td>
        <td colspan="1" class="nothing"> </td>
        <td colspan="2" class="COS60004">Tutorial COS60004</td>
        <td colspan="1" class="nothing"> </td>
        <td colspan="1" class="COS60009">Tutorial COS60009</td>
        <td colspan="3" class="nothing"> </td>
      </tr>
      <tr>
        <td class="table-info">Thursday</td>
        <td colspan="8" class="nothing"> </td>
        <td colspan="2" class="INF60007">Tutorial INF60007</td>
        <td colspan="2" class="nothing"> </td>
      </tr>
      <tr>
        <td class="table-info">Friday</td>
        <td colspan="12" class="nothing">No school</td>
      </tr>
    </tbody>
  </table>
</section>
</div>

<?php
  include_once("footer.inc");
?>

</body>
</html>
