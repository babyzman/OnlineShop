<?php
session_start();
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
$USERNAME = $_SESSION['Username'];
mysqli_select_db($connection,"id15522295_dbproject");
$result = mysqli_query($connection,"select * from `transaction` ORDER BY `TransactionID` ASC");
$result1 = mysqli_query($connection,"select * from `transaction`");
$result2 = mysqli_query($connection,"select * from `user`");
$numResults = mysqli_num_rows($result1);
error_reporting(0);
$j = 0;
$k = 0;
$h = 0;
if($_POST['Transaction'] == 1)
{

	$timestamp = date("Y-m-d H:i:s");
	$ShippingTime = date('Y-m-d H:i:s', strtotime($timestamp.' +1 day'));

	$credit = $_POST['Creditcard'];
	$Type = "credit";
	if(strlen($_POST['Creditcard']) != 16)
	{
		echo "<script>alert('Credit card has to be 16th digit')</script>";
        echo "<script>window.location = 'OrderConfirm.php'</script>";
	}
	else if(strlen($_POST['Creditcard']) == 16)
	{
		if (isset($_SESSION['cart2'])){
			while($rows = $result1->fetch_assoc())
			{
				break;
			}
			if($rows['TransactionID'] == NULL)
			{
				$TransactionID = 1;
			}
			else
			{
				while ($row = mysqli_fetch_array($result)) {
					if (++$i == $numResults) {
						$TransactionID = $row['TransactionID']+1;
					} else {
						// not last row
					}
				}
			}
			while($row1 = $result2->fetch_assoc())
			{	
				if($USERNAME == $row1['Username'])
				{
					$USERID = $row1['UserID'];
					break;
				}
			}
			while($_SESSION['cart2'])
			{
				$count1 = count($_SESSION['cart2']);
				$total1 = array_column($_SESSION['cart2'],'total');
				$Price1 = array_column($_SESSION['cart2'],'Price');
				$ProductID1 = array_column($_SESSION['cart2'],'ProductID');
				$OrderID1 = array_column($_SESSION['cart2'], 'OrderID');
				$Shipping1 = array_column($_SESSION['cart2'], 'Shipping');
				$Quantity1 = array_column($_SESSION['cart2'], 'Quantity');
				$ProductName1 = array_column($_SESSION['cart2'],'ProductName');
				$Quantity1 = $Quantity1[$h];
				$ProductID1 = $ProductID1[$h];
				$result4 = mysqli_query($connection,"select * from `product detail` WHERE ProductID = '$ProductID1'");
				while($rows2 = mysqli_fetch_array($result4))
				{
					echo "2";
					$Quantity2 = $rows2['Quantity']-$Quantity1;
				}
				$sql1 = "UPDATE `product detail` SET Quantity = '$Quantity2' WHERE ProductID = '$ProductID1'";
				mysqli_query($connection, $sql1) or die(mysqli_error($connection));
				$h++;
				if($Price1[$h] == NULL)
				{
					break;
				}
			}
			$add = "INSERT INTO `payment method` (USERID,Type,creditcardNo) VALUES ('$USERID','$Type','$credit')";
			mysqli_query($connection, $add) or die(mysqli_error($connection));
			if (isset($_SESSION['cart2'])){
				$count = count($_SESSION['cart2']);
				$total = array_column($_SESSION['cart2'],'total');
				$Price = array_column($_SESSION['cart2'],'Price');
				$ProductID = array_column($_SESSION['cart2'],'ProductID');
				$OrderID = array_column($_SESSION['cart2'], 'OrderID');
				$Shipping = array_column($_SESSION['cart2'], 'Shipping');
				$Quantity = array_column($_SESSION['cart2'], 'Quantity');
				$ProductName = array_column($_SESSION['cart2'],'ProductName');
				while ($_SESSION['cart2']){
					while(1)
					{
						$j++;
						if($OrderID[$k] != $OrderID[$j])
						{
							break;
						}
						else if($OrderID[$j] == NULL)
						{
							break;
						}
					}
					$Quantity1 = $Quantity[$k];

					$id = $OrderID[$k];
					$total1 = $total[$k];
					if($Shipping[$k] == 'EMS')
					{	
						$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +3 day'));
					}
					else if($Shipping[$k] == 'KERRY')
					{
						$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +2 day'));
					}
					else if($Shipping[$k] == 'SCG')
					{
						$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +3 day'));;
					}
					while(1)
					{
						$k++;
						if($k == $j)
						{
							break;
						}
					}
					$add1 = "INSERT INTO `transaction` (TransactionID,OrderID,TimeStamp,TotalAmount,ShippingDate,DeliveryDate,PaymentMethod) VALUES ('$TransactionID','$id','$timestamp','$total1','$ShippingTime','$timestamp1','$Type')";
					mysqli_query($connection, $add1) or die(mysqli_error($connection));
					if($Price[$j] == NULL)
					{
						break;
					}
				}
				unset($_SESSION['cart2']);
				echo "<script>alert('Successful making transaction');window.location.href='complete.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('Order is empty');window.location.href='index.php';</script>";
		}
	}
}
else if($_POST['Transaction'] == 2)
{
	$timestamp = date("Y-m-d H:i:s");
	$ShippingTime = date('Y-m-d H:i:s', strtotime($timestamp.' +1 day'));
	$bank = $_POST['Bank'];
	$Type = "bank";
	if(strlen($_POST['Bank']) != 10)
	{
		echo "<script>alert('Bank no has to be 10th digit')</script>";
        echo "<script>window.location = 'OrderConfirm.php'</script>";
	}
	else if(strlen($_POST['Bank']) == 10)
	{
		if (isset($_SESSION['cart2'])){
		while($rows = $result1->fetch_assoc())
		{
			break;
		}
		if($rows['TransactionID'] == NULL)
		{
			$TransactionID = 1;
		}
		else
		{
			while ($row = mysqli_fetch_array($result)) {
				if (++$i == $numResults) {
					$TransactionID = $row['TransactionID']+1;
				} else {
						// not last row
				}
			}
		}
		while($row1 = $result2->fetch_assoc())
		{
			if($USERNAME == $row1['Username'])
			{
				$USERID = $row1['UserID'];
				break;
			}
		}
		$add = "INSERT INTO `payment method` (USERID,Type,BankNo) VALUES ('$USERID','$Type','$bank')";
		while($_SESSION['cart2'])
			{
				$count1 = count($_SESSION['cart2']);
				$total1 = array_column($_SESSION['cart2'],'total');
				$Price1 = array_column($_SESSION['cart2'],'Price');
				$ProductID1 = array_column($_SESSION['cart2'],'ProductID');
				$OrderID1 = array_column($_SESSION['cart2'], 'OrderID');
				$Shipping1 = array_column($_SESSION['cart2'], 'Shipping');
				$Quantity1 = array_column($_SESSION['cart2'], 'Quantity');
				$ProductName1 = array_column($_SESSION['cart2'],'ProductName');
				$Quantity1 = $Quantity1[$h];
				$ProductID1 = $ProductID1[$h];
				$result4 = mysqli_query($connection,"select * from `product detail` WHERE ProductID = '$ProductID1'");
				while($rows2 = mysqli_fetch_array($result4))
				{
					echo "2";
					$Quantity2 = $rows2['Quantity']-$Quantity1;
				}
				$sql1 = "UPDATE `product detail` SET Quantity = '$Quantity2' WHERE ProductID = '$ProductID1'";
				mysqli_query($connection, $sql1) or die(mysqli_error($connection));
				$h++;
				if($Price1[$h] == NULL)
				{
					break;
				}
			}
		mysqli_query($connection, $add) or die(mysqli_error($connection));
				if (isset($_SESSION['cart2'])){
					$count = count($_SESSION['cart2']);
					$total = array_column($_SESSION['cart2'],'total');
					$Price = array_column($_SESSION['cart2'],'Price');
					$ProductID = array_column($_SESSION['cart2'],'ProductID');
					$OrderID = array_column($_SESSION['cart2'], 'OrderID');
					$Shipping = array_column($_SESSION['cart2'], 'Shipping');
					$Quantity = array_column($_SESSION['cart2'], 'Quantity');
					$ProductName = array_column($_SESSION['cart2'],'ProductName');
					while ($_SESSION['cart2']){
						while(1)
						{
							$j++;
							if($OrderID[$k] != $OrderID[$j])
							{
								break;
							}
							else if($OrderID[$j] == NULL)
							{
								break;
							}
						}
						$Quantity1 = $Quantity[$k];
						$ProductID1 = $ProductID[$k];
						$id = $OrderID[$k];
						$total1 = $total[$k];
						$result4 = mysqli_query($connection,"select * from `product detail` WHERE ProductID = '$ProductID1'");
						while($rows2 = mysqli_fetch_array($result4))
						{
							echo "2";
							$Quantity1 = $rows2['Quantity']-$Quantity1;
						}
						$sql1 = "UPDATE `product detail` SET Quantity = '$Quantity1' WHERE ProductID = '$ProductID1'";
						mysqli_query($connection, $sql1) or die(mysqli_error($connection));
						
						if($Shipping[$k] == 'EMS')
						{	
							$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +3 day'));
						}
						else if($Shipping[$k] == 'KERRY')
						{
							$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +2 day'));
						}
						else if($Shipping[$k] == 'SCG')
						{
							$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +3 day'));;
						}
						while(1)
						{
							$k++;
							if($k == $j)
							{
								break;
							}
						}
						$add1 = "INSERT INTO `transaction` (TransactionID,OrderID,TimeStamp,TotalAmount,ShippingDate,DeliveryDate,PaymentMethod) VALUES ('$TransactionID','$id','$timestamp','$total1','$ShippingTime','$timestamp1','$Type')";
						mysqli_query($connection, $add1) or die(mysqli_error($connection));
						if($Price[$j] == NULL)
						{
							break;
						}
					}
					mysqli_query($connection, $add) or die(mysqli_error($connection));
					echo "<script>alert('Successful making transaction');window.location.href='complete.php';</script>";
					unset($_SESSION['cart2']);
				}
		}
		else
		{
			echo "<script>alert('Order is empty');window.location.href='index.php';</script>";
		}
	}
}
else if($_POST['Transaction'] == 3)
{
	$timestamp = date("Y-m-d H:i:s");
	$ShippingTime = date('Y-m-d H:i:s', strtotime($timestamp.' +1 day'));	
	$Type = "cod";
	if (isset($_SESSION['cart2'])){
		while($rows = $result1->fetch_assoc())
		{
			break;
		}
		if($rows['TransactionID'] == NULL)
		{
			$TransactionID = 1;
		}
		else
		{
			while ($row = mysqli_fetch_array($result)) {
				if (++$i == $numResults) {
					$TransactionID = $row['TransactionID']+1;
				} else {
						// not last row
				}
			}
		}
		while($row1 = $result2->fetch_assoc())
		{
			if($USERNAME == $row1['Username'])
			{
				$USERID = $row1['UserID'];
				break;
			}
		}
		$add = "INSERT INTO `payment method` (USERID,Type) VALUES ('$USERID','$Type')";
		while($_SESSION['cart2'])
			{
				$count1 = count($_SESSION['cart2']);
				$total1 = array_column($_SESSION['cart2'],'total');
				$Price1 = array_column($_SESSION['cart2'],'Price');
				$ProductID1 = array_column($_SESSION['cart2'],'ProductID');
				$OrderID1 = array_column($_SESSION['cart2'], 'OrderID');
				$Shipping1 = array_column($_SESSION['cart2'], 'Shipping');
				$Quantity1 = array_column($_SESSION['cart2'], 'Quantity');
				$ProductName1 = array_column($_SESSION['cart2'],'ProductName');
				$Quantity1 = $Quantity1[$h];
				$ProductID1 = $ProductID1[$h];
				$result4 = mysqli_query($connection,"select * from `product detail` WHERE ProductID = '$ProductID1'");
				while($rows2 = mysqli_fetch_array($result4))
				{
					echo "2";
					$Quantity2 = $rows2['Quantity']-$Quantity1;
				}
				$sql1 = "UPDATE `product detail` SET Quantity = '$Quantity2' WHERE ProductID = '$ProductID1'";
				mysqli_query($connection, $sql1) or die(mysqli_error($connection));
				$h++;
				if($Price1[$h] == NULL)
				{
					break;
				}
			}
				if (isset($_SESSION['cart2'])){
					$count = count($_SESSION['cart2']);
					$total = array_column($_SESSION['cart2'],'total');
					$Price = array_column($_SESSION['cart2'],'Price');
					$OrderID = array_column($_SESSION['cart2'], 'OrderID');
					$Shipping = array_column($_SESSION['cart2'], 'Shipping');
					$Quantity = array_column($_SESSION['cart2'], 'Quantity');
					$ProductName = array_column($_SESSION['cart2'],'ProductName');
					while ($_SESSION['cart2']){
						while(1)
						{
							$j++;
							if($OrderID[$k] != $OrderID[$j])
							{
								break;
							}
							else if($OrderID[$j] == NULL)
							{
								break;
							}
						}
						$Quantity1 = $Quantity[$k];
						$ProductID1 = $ProductID[$k];
						$id = $OrderID[$k];
						$total1 = $total[$k];
						$result4 = mysqli_query($connection,"select * from `product detail` WHERE ProductID = '$ProductID1'");
						while($rows2 = mysqli_fetch_array($result4))
						{
							$Quantity1 = $rows2['Quantity']-$Quantity1;
						}
						$sql1 = "UPDATE `product detail` SET Quantity = '$Quantity1' WHERE ProductID = '$ProductID1'";
						mysqli_query($connection, $sql1) or die(mysqli_error($connection));
						if($Shipping[$k] == 'EMS')
						{	
							$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +3 day'));
						}
						else if($Shipping[$k] == 'KERRY')
						{
							$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +2 day'));
						}
						else if($Shipping[$k] == 'SCG')
						{
							$timestamp1 = date('Y-m-d H:i:s', strtotime($ShippingTime.' +3 day'));;
						}
						while(1)
						{
							$k++;
							if($k == $j)
							{
								break;
							}
						}
						$add1 = "INSERT INTO `transaction` (TransactionID,OrderID,TimeStamp,TotalAmount,ShippingDate,DeliveryDate,PaymentMethod) VALUES ('$TransactionID','$id','$timestamp','$total1','$ShippingTime','$timestamp1','$Type')";
						mysqli_query($connection, $add1) or die(mysqli_error($connection));
						if($Price[$j] == NULL)
						{
							break;
						}
					}
					mysqli_query($connection, $add) or die(mysqli_error($connection));
					echo "<script>alert('Successful making transaction');window.location.href='complete.php';</script>";
					unset($_SESSION['cart2']);
				}
	}
	else
	{
		echo "<script>alert('Order is empty');window.location.href='index.php';</script>";
	}
}
else
{
    echo "<script>alert('User have to selected way to shipping product');window.location.href='OrderConfirm.php';</script>";
}
?>