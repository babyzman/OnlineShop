<?php
error_reporting(0);
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
session_start();
$i =0;
$USERNAME = $_SESSION['Username'];
$Shipping = $_POST['Shipping'];
$total = 0;
$result = mysqli_query($connection,"select * from `itemorder` ORDER BY `OrderID` ASC");
$result2 = mysqli_query($connection,"select * from `user`");
$result1 = mysqli_query($connection,"select * from `itemorder`");
$timestamp = date("Y-m-d H:i:s");
$numResults = mysqli_num_rows($result1);
$counter = 0;
if (isset($_SESSION['cart'])){
	while($row1 = $result2->fetch_assoc())
	{
		if($USERNAME == $row1['Username'])
		{
			$USERID = $row1['UserID'];
			break;
		}
	}
	while($rows = $result1->fetch_assoc())
	{
		break;
	}
	if($rows['OrderID'] == NULL)
	{
		$OrderID = 1;
	}
	else
	{
		while ($row = mysqli_fetch_array($result)) {
			if (++$i == $numResults) {
				$OrderID = $row['OrderID']+1;
			} else {
				// not last row
			}
		}
	}
	echo $OrderID;
	foreach ($_SESSION['cart'] as $Order1){
	$total = $total+($Order1['Price']*$Order1['Quantity']);
	}
	if($Shipping == 'ems')
	{
		$total = $total+50;
	}
	else if($Shipping == 'kerry')
	{
		$total = $total+70;
	}
	else
	{
		$total = $total+70;
	}
	foreach ($_SESSION['cart'] as $Order) {
		$item_array = array('ProductID' => $Order['ProductID'],
		'Quantity' => $Order['Quantity'],
		'Price' => $Order['Price'],
		'ProductName' => $Order['ProductName'],
		'ProductID' => $Order['ProductID'],
		'OrderID' => $OrderID,
		'total' => $total,
		'Shipping' => $Shipping);
		$ProductID = $Order['ProductID'];
		$Quantity = $Order['Quantity'];
	if (isset($_SESSION['cart2'])){
	$count = count($_SESSION['cart2']);
	$count++;
	$_SESSION['cart2'][$count] = $item_array;
	echo $count;
	}
	else
	{
		$_SESSION['cart2'][0] = $item_array;
	}
		echo $OrderID;
		echo $ProductID;
		echo $USERID;
		$sql = "INSERT INTO `itemorder` (OrderID,UserID,TimeStamp,ProductID,ShippingMethod,Quantity) VALUES ('$OrderID','$USERID','$timestamp','$ProductID','$Shipping','$Quantity')";
		mysqli_query($connection, $sql) or die(mysqli_error($connection));
	}
	unset($_SESSION['cart']);
	echo '<script>window.location.href="OrderConfirm.php"</script>';
}
else
{
	echo "<script>alert('Cart is empty')</script>";
	echo "<script>window.location = 'index.php'</script>";
}
?>	