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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    EMPOWHER|Sign In
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

  <div class="card">
    <h2><u>Kindly sign in and access our resources!</u></h2>
    <form action="server.php" method="GET">
      <label for="emailid">E-mail
        Id</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" id="email" name="emailid" placeholder="Enter e-mailid" required><br><br>
      <label
        for="pwd">Password</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="password" id="pwd" name="pwd" placeholder="password"><br><br>
      <input type="submit" name="login" class="button button1" />
    </form>
    <h3>New to Empowher ?<a href="register.html" target="blank"> Register here:)</a></h3>
  </div>
</body>

</html>