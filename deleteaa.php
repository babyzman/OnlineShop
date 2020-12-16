<?php
	$addressID = $_POST['address_id3'];
	$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
	$sql = "DELETE FROM `useraddress` WHERE AddressID = '$addressID'";
	if ($mysqli->query($sql)){
		echo "<script> alert('Address has been deleted');window.location.href='index.php';</script>";
		echo "Delete Address";
	}
?>