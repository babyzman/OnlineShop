<?php
session_start();

    $username = $_SESSION['Username'];
	$password = $_POST['password'];
	$phoneno = $_POST['phoneno'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$gender = $_POST['gender'];
	$birthday_date = $_POST['birthday_date'];
	
	$username = stripslashes($username);
	$password = stripslashes($password);
	$phoneno = stripslashes($phoneno);
	$email = stripslashes($email);
	$name = stripslashes($name);
	$surname = stripslashes($surname);
	$gender = stripslashes($gender);
	$birthday_date = stripslashes($birthday_date);
	
        // Create connection
        $connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
        mysqli_select_db($connection,"id15522295_dbproject");
        $sql = "UPDATE user  SET Password = '$password',PhoneNo = '$phoneno',Email = '$email',Name = '$name',Surname = '$surname',Gender = '$gender',Birthday_date = '$birthday_date'
        		WHERE Username = '$username'";
        		
        // Check connection
        if (!$connection) {
           die("Connection failed: " . mysqli_connect_error());
        }
        else{
              if (mysqli_query($connection, $sql)) 
        	  {
        					echo "<script> alert('Success Edited information');window.location.href='viewprofile.php';</script>";
        				}
        			else
        			{
        			 echo "<script> alert('Error while editing information');window.location.href='viewprofile.php';</script>";	
        			} 
        	  }
?>