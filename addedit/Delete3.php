<?php
	$i = 0;
	$ProductID = $_POST['product_id4'];
	$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
	$PictureName = $_POST['del_name'];
	$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
    mysqli_select_db($connection,"id15522295_dbproject");
	$resultSet = mysqli_query($connection,"SELECT ProductID FROM `product pic` WHERE ProductID = '$ProductID'");
	$result55 = mysqli_query($connection,"SELECT * FROM `product pic` WHERE PathofPicture = '$PictureName'");
	$rows2 = $result55->fetch_assoc();
	while($rows = $resultSet->fetch_assoc())
	{
		$i++;
	}
	if($i<=1)
	{
		echo "<script> alert('The picture cannot be deleted because there are only 1 picture of this product')</script>";
		echo "Delete Picture";
	}
	else
	{
		$sql = "DELETE FROM `product pic` WHERE ProductID = '$ProductID' AND PathofPicture = '$PictureName'";
		if($rows2 == "")
		{
		    echo "<script> alert('This product picture name is not exist for this productID')</script>";
		    echo "Delete Picture";
		}
		else
		{
		    if (mysqli_query($connection, $sql)){
			echo "<script> alert('The picture has been deleted')</script>";
			echo "Delete Picture";
		    }
	    }
	}
?>