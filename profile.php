<?php
include 'server.php';
//session_start();
$userID = -1;
$userName = '';
if($_SESSION['username']==''){
    header("Location: signin.php");
    exit();
}else{
    echo $_SESSION['username'];
    $userName = $_SESSION['username'];
}
if($_SESSION['userid']==-1){
    header("Location: signin.php");
    exit();
}else{
    echo $_SESSION['userid'];
    $userID = $_SESSION['userid'];
}

$result = getDetailsWithUserID($conn,$userID,$userName);
if($result['Gender']=='female'){
  $checkedF = "checked";
  $checkedM = '';
}else{
  $checkedF = "";
  $checkedM = 'checked';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    EMPOWHER|Profile
  </title>
  <style>
    .p_c{
      
      margin-left: 60px;
    }
  </style>
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
  <div class="logo"><img src="rosegold1.png" width="150px"></div>
  <div class="card">
  <center><h2>Welcome <?=$_SESSION['username'];?></h2></center>
  <p>
  <form action="server.php" method="post">
    <label class="p_c">Name____________ </label><input  class="p_c" type="text" name="Name" value="<?=$result['Name'];?>"><br><br>
    <label class="p_c">EmailID_________ </label><input  class="p_c" type="text" name="EmailID" value="<?=$result['EmailID'];?>"><br><br>
    <label class="p_c">ContactNumber___ </label><input  class="p_c" type="text" name="ContactNumber"
      value="<?=$result['ContactNumber'];?>"><br><br>
    <label class="p_c">DateofBirth_____</label><input class="p_c" type="date" id="dob" name="DateofBirth"
      value="<?=$result['DateofBirth'];?>"><br><br>
    <label class="p_c">Gender__________ </label>
    <input type="radio" name="gender" id="g1" value="female" <?=$checkedF?>>Female
    <input type="radio" name="gender" id="g2" value="male" <?=$checkedM?>>Male<br><br>
    <input class='button button1' type='submit' name='info-update' id='applybtn' value='Apply'>
  </form>
  </p>
  <form action='server.php' method='post'>
    <input type="hidden" name="clientSessID" value="<?=session_id();?>" />
    <input type="hidden" name="clientName" value="<?=$_SESSION['username'];?>" />
    <input type="hidden" name="clientID" value="<?=$_SESSION['userid'];?>" />
    <input class='button button1' type='submit' name='submit-logout' id='logoutbtn' value='LogOut'>
  </form>

  <form action='server.php' method='post'>
    <input class='button button1' type='submit' name='create_pdf' id='logoutbtn' value='Create PDF'>
  </form>
</div>
</div>
</body>
</div>
</html>