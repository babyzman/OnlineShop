<?php
$total = $_POST["total"];
$shipping = $_POST["shipping"];
if($shipping == 'EMS')
{
	echo "Shipping Price: 50 Baht";
	echo "<br></br>";
	echo "Estimate Delivery: 3 days";
	echo "<br></br>";
	echo "<br></br>";
	$total = $total+50;
}
else if($shipping == 'KERRY')
{
	echo "Shipping Price: 70 Baht";
	echo "<br></br>";
	echo "Estimate Delivery: 2 days";
	echo "<br></br>";
	echo "<br></br>";
	$total = $total+70;
}
else
{
	echo "Shipping Price: 70 Baht";
	echo "<br></br>";
	echo "Estimate Delivery: 3 days";
	echo "<br></br>";
	echo "<br></br>";
	$total = $total+70;
}
echo "Total: $total Baht";
?>