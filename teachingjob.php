<?php
session_start();
if($_SESSION['username'] == ''){
    $_SESSION['target_page']='teachingjob.php';
    header("Location: signin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    EMPOWHER|Teaching Jobs
  </title>
  <link rel="stylesheet" href="design.css" type="text/css">
  <link rel="stylesheet" href="style.css" type="text/css">
  <meta charset="UTF-8">
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
  <h1>Teaching Job Section</h1>
  <div class="card">
  <h2>Is Teaching your Dream Career? Become a YourAcademy Tutor</h2>
    <h2>What is a YourAcademy Tutor Opportunity?</h2>
    <p> As a WONK Tutor, you will be expected to teach a single student or a group at the student's home or your own. You can teach any subject that you are an expert at including Maths, Science, Accountancy, Hindi, English or even Sanskrit. In addition to academics, you can also conduct classes or workshops for Music, Dance, Foreign Languages, Storytelling etc. You can choose to work as per your own schedule and convenience.
    </p>
    <h2>Benefits</h2>
    <p>Average YourAcademy Tutor Earning: Rs.40,000 p.m. </p>
    
    <h2>Are you the right person for this Job? If your answer is 'YES' for the following points then YES you are
    </h2>
    <p>1. Minimum 18 years of age<br>
      2. Female <br>
      3. 12th pass OR currently in graduation OR completed graduation<br>
      4. Have good communication skills and have keen interest in teaching students<br>
      5. Be very strong in academics or extra curricular activities </p>
    <h2>How to apply for the job</h2>
    <h3>Step 1 </h3><?php if($_SESSION['username']==''){ echo "<a href='signin.php' target='blank'></a>";}?><button
      class="button button1">Sign In with Empowher</button></a><br>
    <h3>Step 2 </h3>
    <h4>Upload A PDF To The Database</h4>
    <?php 
      if($_SESSION['userdocdone']=='false'){
       $content_doc = "<h3>Upload all your certificates along with resume as a single PDF file</h3><br />";
       $doc_div = "
       <form action='server.php' method='POST' accept-charset='utf-8' enctype='multipart/form-data'>
        <div>
          <input type='file' name='pdf_file' accept='.pdf' />
          <input type='hidden' name='MAX_FILE_SIZE' value='67108864' />
        </div>
        <div>
          <input type='hidden' name='clientID' value='".$_SESSION['userid']."' />
          <label for='submit'>Submit To Database</label><br />
          <input type='submit' name='submit-teaching-attachement' />
        </div>
      </form>
       ";
       $content_doc .= $doc_div;
       echo $content_doc;
      }else{
       $content_doc = "<h3>All your certificates has been uploaded</h3>";
       echo $content_doc;
      }
    ?>
     <h3>Step 3 </h3>   
     <h4>You're done! Now,just wait to hear back from YourAcademy. All the best!</h4>
  
  </div>
  </div>
</body>

</html>