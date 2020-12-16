<?php
		$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789','id15522295_dbproject');
		$result = $mysqli->query("SELECT * FROM `product detail`");
		$i = 0;
		while($row = mysqli_fetch_array($result))
		{
			$a = $i++;
			if($a == 5)
			break;
		}
		$ProductID = $row['ProductID'];
		echo $ProductID;
		echo json_encode($ProductID);
?>