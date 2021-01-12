<?php
session_start();
if (session_status() == PHP_SESSION_ACTIVE) {
  echo '<script language="javascript">';
  echo 'alert(" Welcome to about page Dude ' . $_SESSION['username'] . '");';
  echo '</script>';
}
?>
<html>

<head>
  <title>
    EMPOWHER|About
  </title>
  <link rel="stylesheet" href="design.css" type="text/css">
  <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
  <div class="bg"></div>

  <div class="top">
    <ul>
      <b>
        <li><a href="index.php" target="blank">Home</a></li>
        <li><a href="about.php" target="blank">About</a></li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Exciting Jobs</a>
          <div class="dropdown-content">
            <a href="#">Marketing</a>
            <a href="#">Teaching</a>
        <li><a href="https://www.coursera.org/">Online Courses</a></li>
        <li><a href="https://internshala.com/">Internships</a></li>
        <li class="heading"><a href="profile.php" target="blank">
            <?php if($_SESSION['username']!=''){echo "Hi ".$_SESSION['username'];}else{ echo "Profile";}?></a>
        </li>
      </b>
      <li class="heading"><a href="index.php" target="blank">EMPOWHER</a></li></b>
      <li class="heading"><a href="signin.php" target="blank">Sign In</a></li></b>
      <li class="heading"><a href="register.html" target="blank">Register</a></li></b>
  </div>
  </li>
  </ul>
  </div>
  <br><br> <br><br>
  <div class="logo"><img src="rosegold1.png" width="150px"></div>

  <div class="card1">
    <h3>The Best time for new Beginnings is NOW!</h3>
    <img src="1.jpg" width="280px" style='float: left;'>
    <img src="2.jpg" width="300px" style='float: right;'>

    <h2><u>ABOUT US!</u></h2>
    <p id="about">&nbsp;&nbsp;Millions of women around the world struggle to get quality education and job
      opportunities.
      &nbsp;&nbsp;They face barriers such as lack of permission to travel, funds and guidance.
      These barriers&nbsp;&nbsp;keep women out of the workforce and make them dependent on others.
    </p>
    <p>Empowher is a mobile platform set up to remove barriers for women to get quality career &nbsp;&nbsp;guidance,
      skills and job opportunities.
      Whether you are a student or job-seeker, you get
      help to create your identity from this portal.</p>
  </div>
  <h2>We are Changing with Times</h2>
  <h3><u>Watch our video!</u></h3>
  <div class="vid"><video width="600px" height="240" controls>
      <source src="vidv1.mp4" type="video/mp4">
      <source src="vidv1.ogg" type="video/ogg">
      Your browser does not support the video tag.
    </video>
    <p class="small"><a href="https://www.youtube.com/watch?v=VF4ZyJRUxk8&feature=youtu.be" target="blank">Video
        source</a></p>
    <h3>Want to know some Numbers! Here are some State Wise Worker Population Ratio(WPR) (per 1000) during 2011-12
    </h3>

    <button class="button button2"><a href="wpr_above.html" target="_blank">States/UTs as per WPR above National
        Value</a></button>
    <button class="button button2"><a href="wpr_below.html" target="_blank">States/UTs as per WPR below National
        Value</a></button>
    <button class="button button2"><a href="top5.html" target="_blank">Top 5 States as per WPR</a></button>
    <button class="button button2"><a href="bottom5.html" target="_blank">Bottom 5 States as per WPR</a></button>

  </div>
  <h3><i><a href="contact.html" target="blank">Contact Us</a></i></h3>
</body>

</html>