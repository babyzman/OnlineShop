<?php
    session_start();
	$Username = $_SESSION['Username'];
	$addresstype = $_POST['addresstype'];
	$streetname = $_POST['streetname'];
	$houseno = $_POST['houseno'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	
     
	$addresstype = stripslashes($addresstype);
	$streetname = stripslashes($streetname);
	$houseno = stripslashes($houseno);
	$zipcode = stripslashes($zipcode);
	$city = stripslashes($city);
	$province = stripslashes($province);
	
	$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
	
	$result = mysqli_query($connection, "SELECT * FROM user WHERE Username = '$Username' ");
	while($row = mysqli_fetch_array($result))
			{
			$userid = $row['UserID'];
			}
// Create connection
//$connection=mysqli_connect("localhost","root","");
//mysqli_select_db($connection,"dbproject");
if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
}
else{
		//$sql2 = "SELECT UserID FROM user WHERE Username = '$username'";
	//	$result = mysqli_query($connection,$sql2); 
	//	$count = mysqli_num_rows($result);
	//if($count == 0)
		//{
				$sql3 = "INSERT INTO useraddress (UserID,AddressType,StreetName,HouseNo,Zipcode,City,Province)
				values ('$userid','$addresstype','$streetname','$houseno','$zipcode','$city','$province')";
				if (mysqli_query($connection, $sql3))
				{
					echo "<script> alert('Successfully added address');window.location.href='index.php';</script>";	
				}

		//}
		else 
			{
			echo "<script> alert('error adding address')</script>";
			}
}
?>