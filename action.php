<?php
	include 'server.php';
    if ( isset( $_POST['submit'] ) ) 
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "empowher";
		// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
        }
        // sample

		$name = $_POST['name']; 
        $emailid = $_POST['emailid']; 
        $contactno = $_POST['contactno'];
        $dob = $_POST['dob']; 
        $pwd = $_POST['pwd']; 
				$gender = $_POST['gender'];
        $sql_stmt = "INSERT INTO register (Name, E_mailId, ContactNumber , DateofBirth, Password, Gender)
         VALUES ('$name','$emailid','$contactno','$dob','$pwd','$gender')";
	
        //echo 'Query ==> '.$sql_stmt;
		if ($conn->query($sql_stmt) == TRUE) 
		{
            echo '<script language="javascript">';
            echo 'alert("Thanks for registering with Empowher");';
            echo 'window.location.href="index.php";';
            echo '</script>';
		} 
		else 
		{
            echo '<script language="javascript">';
            $err = "Error: " . $sql_stmt . "<br>" . $conn->error;
            echo 'alert('.$err.')';
            echo '</script>';
		  //echo "";
		}

		$conn->close();
	}
?>