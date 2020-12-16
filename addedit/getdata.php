<?php
	$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
	$pid = $_POST["product_id"];
		$result = $mysqli->query("SELECT * FROM `product detail`");
		while($row = mysqli_fetch_array($result))
		{
			if($row['ProductID'] == $pid)
			{
			echo "Name: $row[ProductName]";
			echo "<br>"."<br>";
			echo "Price: $row[Price]";
			echo "<br>"."<br>";
			echo "Description: $row[Description]";
			echo "<br>"."<br>";
			echo "Category: $row[Category]";
			echo "<br>"."<br>";
			echo "Quantity: $row[Quantity]";
			break;
			}
		}
?>