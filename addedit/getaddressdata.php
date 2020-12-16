<?php
	$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
	$pid = $_POST["address_ID"];
		$result = $mysqli->query("SELECT * FROM `useraddress` ");
		while($row = mysqli_fetch_array($result))
		{
			if($row['AddressID'] == $pid)
			{
			echo "street Name: $row[StreetName]";
			echo "<br>"."<br>";
			echo "addresstype: $row[AddressType]";
			echo "<br>"."<br>";
			echo "house NO: $row[HouseNo]";
			echo "<br>"."<br>";
			echo "zipcode: $row[Zipcode]";
			echo "<br>"."<br>";
			echo "City: $row[City]";
			echo "<br>"."<br>";
			echo "Province: $row[Province]";
			echo "<br>"."<br>";
			break;
			}
		}
?>