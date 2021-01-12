<?php
    //include 'session.php';
    //include 'database.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    EMPOWHER|Assessments
  </title>
  <link rel="stylesheet" href="design.css" type="text/css">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="style1.css" type="text/css">

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
  <br><br> <br><br>
  <div class="logo"><img src="rosegold1.png" width="150px"></div>
  <form action="server.php" method="POST">
    <div class="wrapper">
      <div class="title">
        <h1>Add assessment questions</h1>
      </div>
      <div class="contact-form">
        <div class="input-fields">
          <h2>Enter the question</h2>
          <div class="msg">
            <h2>Enter the Question Type</h2>
            <div class="select">
              <select name="subjecttype">
                <option>Problem Solving</option>
                <option>Decision Making</option>
              </select>
              <div class="select__arrow"></div>
            </div>
            <textarea id="question" name="question" placeholder="Enter the question"></textarea>
          </div>
          <input type="text" id="option1" name="option1" class="input" placeholder="Email the first option">
          <input type="text" id="option2" name="option2" class="input" placeholder="Email the second option">
          <input type="text" id="option3" name="option3" class="input" placeholder="Email the third option">
          <input type="text" id="option4" name="option4" class="input" placeholder="Email the fourth option">
          <h2>Enter the answer</h2>
          <div class="select">
            <select name="answer">
              <option>Option1</option>
              <option>Option2</option>
              <option>Option3</option>
              <option>Option4</option>
            </select>
            <div class="select__arrow"></div>
          </div>
          <input type="submit" name="submit-portal-questions" class="button button1">
          </br></br></br></br>
        </div>
      </div>
    </div>
  </form>
</body>

</html>