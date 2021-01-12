<?php
    //include 'session.php';
    //include 'database.php';
    include 'server.php';
    //session_start();
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
        <li><a href="index.php" target="blank">Home</a></li>
        <li><a href="about.php" target="blank">About</a></li>
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">Exciting Jobs</a>
          <div class="dropdown-content">
            <a href="marketingjob.php">Marketing</a>
            <a href="teachingjob.php">Teaching</a>
          </div>
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
  <form action="server.php" method="POST">
    <div class="wrapper">
      <div class="title">
        <h1>Take your Assessment. All the best!</h1>        
      </div>
      <div class="contact-form">
        <div class="input-fields">
          <?php 
          $result = getQuestionsAndOptions($conn);
          $sample = 1;
          $question_array = array(); 
          $question_sub_type_array = array();
         //echo "<h2>";
         $i = 0;
         while($row = $result->fetch_assoc()){
           //print_r($row);
            $html_radio = "
            <div>
            <h2>".$row['question']."</h2>
            <input type='hidden' name='question".$i."' value='".$row['question']."' />
            <input type='radio' id='f-option' name='answer".$i."' value='".$row['option1']."'>
            <label for='f-option'>".$row['option1']."</label>
            <input type='radio' id='s-option' name='answer".$i."' value='".$row['option2']."'>
            <label for='s-option'>".$row['option2']."</label>
            <input type='radio' id='t-option' name='answer".$i."' value='".$row['option3']."'>
            <label for='t-option'>".$row['option3']."</label>
            <input type='radio' id='t1-option' name='answer".$i."' value='".$row['option4']."'>
            <label for='t1-option'>".$row['option4']."</label>
            </div></br>";
            array_push($question_sub_type_array,$row['subjecttype']);
            //echo $html_radio;
            $i = $i + 1;
            array_push($question_array,$html_radio);
         }
         //print_r($result);
         //echo "</h5>"; 
          echo "<h2>Decision Making</h2>";
          for($i = 0;$i<sizeof($question_array);$i++){
            if($question_sub_type_array[$i]=='Decision Making'){
              echo "<p>".$question_array[$i]."</p>";
            }
          }
          echo "<h2>Problem Solving</h2>";
          for($i = 0;$i<sizeof($question_array);$i++){
            if($question_sub_type_array[$i]!='Decision Making'){
              echo "<p>".$question_array[$i]."</p>";
            }
          }
          ?>
          <input type="submit" name="submit-assessment" class="button button1" />
        </div>
      </div>
    </div>
  </form>
  </div>
</body>

</html>