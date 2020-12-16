<?php
	$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
    mysqli_select_db($connection,"id15522295_dbproject");
	$sql = "DELETE FROM `product pic` WHERE ProductID = '$ProductID'";
	if ($mysqli->query($sql)){
		echo "<script> alert('The picture has been deleted')</script>";
		echo "Delete Picture";
	}
?>