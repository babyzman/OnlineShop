<?php
	$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
	$pid = $_POST["product_id2"];
		$result = $mysqli->query("SELECT * FROM `product detail`");
		$result2 = $mysqli->query("SELECT * FROM `product pic`");
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
			echo "<br>"."<br>";
			echo "Product Picture: ";
			echo "<br>"."<br>";
				while($row2 = mysqli_fetch_array($result2))
				{
					if($row2['ProductID'] == $pid)
					{
						echo "<br>";
						$Image = $row2['PathofPicture'] ;
						echo '<img src="/picture/'.$Image.'"height="250" width="300",>';
						echo "&nbsp;&nbsp;$Image";
						echo "<br></br>";
					}
				}
			break;
			}
		}
?>