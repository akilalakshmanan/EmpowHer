<?php
  include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    EMPOWHER|Profile
  </title>
  <link rel="stylesheet" href="design.css" type="text/css">
</head>

<body>
  <div class="bg"></div>
  <div class="top">
    <ul>
      <b>
        <li><a href="portal_users.php" target="blank">List Users</a></li>
        <li><a href="portal_questions.php" target="blank">Add Questions For Assessment</a></li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Statistics</a>
          <div class="dropdown-content">
            <a href="resumestats.php">Resume</a>
            <a href="assessmentstats.php">Assessment</a>
            <a href="userstats.php">UserActivity</a>
          </div>
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
</body>

</html>