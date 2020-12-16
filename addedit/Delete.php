<?php
	$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
    mysqli_select_db($connection,"id15522295_dbproject");
	$ProductID = $_POST['product_id3'];
	$sql = "DELETE FROM `product detail` WHERE ProductID = '$ProductID'";
	$sql1 = "DELETE FROM `product pic` WHERE ProductID = '$ProductID'";
	mysqli_query($connection,$sql1);
	if (mysqli_query($connection,$sql)or die(mysqli_error($connection)))
	{
		echo "<script> alert('The item has been deleted');window.location.href='index.php';</script>";
		echo "Delete Item";
	}
?>