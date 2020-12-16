<?php
    session_start();
	$Username = $_SESSION['Username'];
	
     

	
	$connection=mysqli_connect("localhost","root","");
mysqli_select_db($connection,"dbproject");
	
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
				$sql3 = "DELETE FROM useraddress WHERE UserID = '$userid'";
				$sql4 = "DELETE FROM user WHERE UserID = '$userid'";
				
				if (mysqli_query($connection, $sql3))
				{
					if (mysqli_query($connection, $sql4))
					{
					echo "<script> alert('Successfully deleted')</script>";
					}
					else
					{
					echo "<script> alert('error sorry something went wrong')</script>";	
					}
				}

		//}
		else 
			{
			echo "<script> alert('error sorry something went wrong')</script>";
			}
}
?>