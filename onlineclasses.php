<?php
session_start();
if($_SESSION['username'] == ''){
    $_SESSION['target_page']='https://www.coursera.org/';
    header("Location: signin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    EMPOWHER|Online Classes
  </title>
</head>

<body>
  <iframe src="https://www.coursera.org/" frameborder="0"></iframe>
</body>

</html>