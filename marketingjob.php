<?php
session_start();
/*
if($_SESSION['username'] == ''){
    $_SESSION['target_page']='marketingjob.php';
    header("Location: signin.php");
    exit();
}*/
?>
<html>

<head>
  <title>
    EMPOWHER|Marketing
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
  </div>
  </li>
  </ul>
  </div>
  <br><br> <br><br>
  <div class="logo"><img src="rosegold1.png" width="150px"></div>
  <h1>Marketing Executive Role</h1>
  <div class="card">
    <h2>Is Marketing your Dream Career? Become a Marketing Executive</h2>
    <h2>What is a Marketing Executive Role?</h2>
    <p> A Marketing Executive is responsible for promoting and selling a company's products and brands to
      distributors and shopkeepers.
      To do her job well, a marketing executive must have in-depth knowledge of the company's products, brands and
      end consumers.
    </p>
    <h2>Why women are best suited as marketing executives?</h2>
    <p>Women are well-suited for the job of marketing executive because the job involves using communication skills
      and product understanding to convince shopkeepers to stock products.
      Female marketing executives have the advantage of knowing exactly how products like detergents, soaps,
      shampoos, creams and cosmetics are used by women who make up >70% of buyers.
    </p>
    <h2>Are you the right person for this Job? If your answer is 'YES' for the following points then YES you are
    </h2>
    <p>1. Minimum 18 years of age<br>
      2. Female <br>
      3. 12th pass OR currently in graduation OR completed graduation<br>
      4. Have good communication skills<br>
      5. Already have a 2-wheeler driving license or plan to get one</p>
    <h2>How to apply for the job</h2>
    <h3>Step 1 </h3><?php if($_SESSION['username']==''){ echo "<a href='signin.php' target='blank'></a>";}?><button
      class="button button1">Sign In with Empowher</button></a><br>
    <h3>Step 2 </h3>
    <?php 
    if($_SESSION['userresumedone']=='false')
    { 
      echo "<a href='resumebuilding.php' target='blank'>
      <button class='button button1'>Create your Resume</button></a>";
    }else{
      echo "<h5 style='color: blue;'>Resume creation is finished</h5>
      <button class='button button1'>Create your Resume</button>";
    }
    ?>
    <br>
    <h3>Step 3 </h3>
    <?php 
    if($_SESSION['userresumedone']=='true')
    { 
      if($_SESSION['userassessmentdone']=='false'){
        echo "<a href='assessment.php' target='blank'>
        <button class='button button1'>Take the Assessment Test</button></a>";
      }else{
        echo "<h5 style='color: blue;'>You have attended the assessment</h5> 
        <button class='button button1'>Take the Assessment Test</button>";
      }
    }else{
      echo "<h5 style='color: blue;'>Create Resume Before attending assessment</h5><button class='button button1'>Take the Assessment Test</button>";
    }
    ?>
    <br>
  </div>
  </div>
  <script type='text/javascript'>
  </script>
</body>

</html>