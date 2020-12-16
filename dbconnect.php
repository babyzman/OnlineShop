<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "dbproject";
$username = $_POST['username'];
	$password = $_POST['password'];
	$phoneno = $_POST['phoneno'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$gender = $_POST['gender'];
	$birthday_date = $_POST['birthday_date'];
	$addresstype = $_POST['addresstype'];
	$streetname = $_POST['streetname'];
	$houseno = $_POST['houseno'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$Directory = 'profilepic/';
	$username = stripslashes($username);
	$password = stripslashes($password);
	$phoneno = stripslashes($phoneno);
	$email = stripslashes($email);
	$name = stripslashes($name);
	$surname = stripslashes($surname);
	$gender = stripslashes($gender);
	$birthday_date = stripslashes($birthday_date);
	$addresstype = stripslashes($addresstype);
	$streetname = stripslashes($streetname);
	$houseno = stripslashes($houseno);
	$zipcode = stripslashes($zipcode);
	$city = stripslashes($city);
	$province = stripslashes($province);
	$Admin = "No";
	
	$target_dir = "C:/xampp/htdocs/project/profilepic/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $Directory)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg");
// Create connection
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$sql = "INSERT INTO user (Username,Password,PhoneNo,Email,Name,Surname,Gender,Birthday_date,Profile_Pic,Admin)
		values ('$username','$password','$phoneno','$email','$name','$surname','$gender','$birthday_date','$image','$Admin')";
		
//$address = "INSERT INTO user address (Username,Password,PhoneNo,Email,Name,Surname,Gender,Birthday_date)
		//values ('$username','$password','$phoneno','$email','$name','$surname','$gender','$birthday_date')";
// Check connection
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}
else{
		$sql2 = "SELECT UserID FROM user WHERE Username = '$username'";
		$result = mysqli_query($connection,$sql2); 
		$count = mysqli_num_rows($result);
	if($count == 0)
		{
      if (mysqli_query($connection, $sql)) 
	  {
		$getuserid = "SELECT UserID FROM user WHERE Username = '$username'";
		$result = mysqli_query($connection,$sql2); 
			while($row = mysqli_fetch_array($result))
			{
			$userid = $row['UserID'];
			}
				$sql3 = "INSERT INTO useraddress (UserID,AddressType,StreetName,HouseNo,Zipcode,City,Province)
				values ('$userid','$addresstype','$streetname','$houseno','$zipcode','$city','$province')";
				if (mysqli_query($connection, $sql3))
				{
					echo "<script> alert('Success registered');window.location.href='login.php'</script>";					
				}
			else
			{
			 echo "<script> alert('Error while adding address');window.location.href='register.php'</script>";	
			} 
	  }
		else
			{
			 echo "<script> alert('Error while registering');window.location.href='register.php'</script>";	
			}
		}
		else 
			{
			echo "<script> alert('username already exist');window.location.href='register.php'</script>";
			}
}
?>