<?php 
  //0 – PHP_SESSION_DISABLED: Sessions are currently disabled.
  //1 – PHP_SESSION_NONE: Sessions are enabled, but no session has been started.
  //2 – PHP_SESSION_ACTIVE: Sessions are enabled and a session has been started.
  session_start();
  if (session_status() == PHP_SESSION_ACTIVE) {
    if($_SESSION['username']!=''){
      echo '<script language="javascript">';
      echo 'alert(" Welcome ' . $_SESSION['username'] . '");';
      echo '</script>';
    }else{
      $_SESSION['username'] = '';
    }
  }
?>
<html>

<head>
  <title>
    EMPOWHER|Home
  </title>
  <link rel="stylesheet" href="design.css" type="text/css">
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
            <a href="marketingjob.php">Marketing</a>
            <a href="teachingjob.php">Teaching</a>
        <li><a href="https://www.coursera.org/">Online Courses</a></li>
        <li><a href="https://internshala.com/">Internships</a></li>
        <li class="heading"><a href="profile.php" target="blank">
            <?php if($_SESSION['username']!=''){echo "Hi ".$_SESSION['username'];}else{ echo "Profile";}?></a>
        </li>
      </b>
      <li class="heading"><a href="index.php" target="blank">EMPOWHER</a></li></b>
      <?php if($_SESSION['username']==''){echo "<li class='heading'><a href='signin.php' target='blank'>Sign In</a></li></b>";}?>
      <?php if($_SESSION['username']==''){echo "<li class='heading'><a href='register.html' target='blank'>Register</a></li></b>";}?>
  </div>
  </li>
  </ul>
  </div>
  <br><br> <br><br>
  <div class="logo"><img src="rosegold1.png" width="150px"></div>
  <div class="card">
    <b>
      <p><i>Welcome Women!!</i> It's your time! Wake up! Chin up! Raise up! Inflate yourself with the happy
        helium, and experience the new high!</p>
      <p>Let this world walk your way and speak your language!</p>
      <p>Find your FINANCIAL FREEDOM with EMPOWHER.</p>
    </b>
    <img src="giphy.gif" width="400px" height="250px">
    <p class="small"><a href="https://giphy.com/gifs/lcm-changemakers-lady-TKjoyXFQEP3ano0x1n" target="blank">Gif
        source</a></p>
    <u>
      <h3>What is EMPOWHER?</h3>
    </u>
    <p>EMPOWHER is the platform which empowers the HER in you! Come, Join us to explore the Trainings and Upskill
      yourself!</p>
    <p>Also, get 'Employed' after the successful completion of the Trainings!</p>
    <img src="3.jpg" width="500px" height="260px">
    <u>
      <h3>Why EMPOWHER?</h3>
    </u>
    <p>Kitchen is not the only space for your girl. </p>
    <p>Let the fire in the stove burn in your belly
      and fly in your dreams to shout it out to the world your 'Dream Career!!' with EMPOWHER at your back!
    </p>
    <img src="4.jpg" width="500px" height="260px">
    <u>
      <h3>How to EMPOWHER?</h3>
    </u>
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="Slide2.jpg" width="480px" height="268px">
        </div>
        <div class="flip-card-back">
          <img src="5.jpg" style='float: left;'>
          <p class="small"><a href="https://in.pinterest.com/pin/178384835227485981/" target="blank">Image
              source</a></p>
        </div>
      </div>
    </div>
  </div>
  <h2>And get <i>'Employed'!</i></h2>
  <h3><i><a href="contact.html" target="blank">Contact Us</a></i></h3>
  </div>
</body>

</html>