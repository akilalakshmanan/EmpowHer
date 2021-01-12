<?php
session_start();
/*
if($_SESSION['username'] == ''){
    $_SESSION['target_page']='marketingjob.php';
    header("Location: signin.php");
    exit();
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>
    EMPOWHER|Resume Building
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
      <li class="heading"><a href="signin.php" target="blank">Sign In</a></li></b>
      <li class="heading"><a href="register.html" target="blank">Register</a></li></b>
      </ul>
    </div>
      <br><br> <br><br> 
     <div class="logo"><img src = "rosegold1.png"  width="150px"></div>
     <form action="server.php" method="POST">
     <div class="wrapper">
    <div class="title">
    <h1>RESUME BUILDING</h1>
    <div class="card">
  </div>
  </li>
  </ul>
  </div>
  <br><br> <br><br>
  <div class="logo"><img src="rosegold1.png" width="150px"></div>
  <form action="server.php" method="POST">
    <div class="wrapper">
      <div class="title">
      </div>
      <div class="contact-form">
        <div class="input-fields">
          <h2>Personal Information</h2>
          <input type="text" id="fullname" name="fullname" class="input" placeholder="Name">
          <input type="text" id="contactemail" name="emailid" class="input" placeholder="Email Address">
          <input type="text" id="contactno" name="contactno" class="input" placeholder="Contact Number">
          <div class="msg">
            <textarea id="contactaddr" name="contactaddr" placeholder="Contact Address"></textarea>
          </div>
          <input type="text" id="pincode" name="pincode" class="input" placeholder="Pincode">
          <input type="text" id="country" name="country" class="input" placeholder="Country">
          <input type="text" id="state" name="state" class="input" placeholder="State">
          <input type="text" id="citynear" name="citynear" class="input" placeholder="City">



          <!-- this is education section-->
          <h2>Education</h2>
          <input type="text" id="hsschool" class="input" name="hsschool"
            placeholder="Enter Higher Secondary School Name" required><br><br>
          <input type="text" id="hssyear" class="input" name="hssyear" placeholder="Enter Year of Passing"
            required><br><br>
          <input type="text" id="collegeug" class="input" name="collegeug"
            placeholder="Enter Under-Graduate College Name" required><br><br>
          <input type="text" id="collegeugyear" class="input" name="collegeugyear" placeholder="Enter Year of Passing"
            required><br><br>
          <input type="text" id="collegepg" class="input" name="collegepg"
            placeholder="Enter Post-Graduate College Name" required><br><br>
          <input type="text" id="collegepgyear" class="input" name="collegepgyear" placeholder="Enter Year of Passing"
            required><br><br>

          <!-- this is work section-->
          <h2>Job Experience</h2>
          <input type="text" id="job1title" class="input" name="job1title" placeholder="Enter Your Job Title"
            required><br><br>
          <input type="text" id="job1compname" class="input" name="job1compname" placeholder="Enter Company Name"
            required><br><br>
          <input type="text" id="job1country" class="input" name="job1country" placeholder="Enter Country"
            required><br><br>
          <input type="text" id="job1startmonth" class="input" name="job1startmonth" placeholder="Enter Started Month"
            required><br><br>
          <input type="text" id="job1startdate" class="input" name="job1startdate" placeholder="Enter Started Date"
            required><br><br>
          <div class="msg">
            <textarea type="text" id="job1achievements" class="input" name="job1achievements"
              placeholder="Enter Your Responsibilities and Accomplishments" required></textarea><br><br>
          </div>

          <!-- this is skills section-->
          <!-- this is Awards & Achievement section-->
          <h2>Awards & Achievements</h2>
          <input type="text" id="aaatitle" class="input" name="aaatitle"
            placeholder="Enter Your Award or Achievement Title" required><br><br>
          <input type="text" id="" name="" class="input" placeholder="Enter Description" required><br><br>
          <input type="text" id="lknames" class="input" name="lknames" placeholder="Enter Languages Known"
            required><br><br>
          <input type="text" id="owskills" class="input" name="owskills" placeholder="Enter Other Skills"
            required><br><br>
          <input type="text" id="hobbies" class="input" name="hobbies" placeholder="Enter Hobbies" required><br><br>
          <input type="submit" name="submit-resume" class="button button1">

        </div>
      </div>
    </div>
    </div>
  </form>
</body>

</html>