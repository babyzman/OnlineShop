<?php
session_start();
$ProductID = $_POST['ID'];
$ProductName = $_POST['ProductName'];
$Quantity = $_POST['Quantity'];
$Price = $_POST['Price'];
$Description = $_POST['Description'];
$Category = $_POST['Category'];
$ProductID = stripslashes($ProductID);
$ProductName = stripslashes($ProductName);
$Quantity = stripslashes($Quantity);
$Price = stripslashes($Price);
$Description = stripslashes($Description);
$Category = stripslashes($Category);

$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");

$sql = "UPDATE `product detail` SET ProductName = '$ProductName',Quantity = '$Quantity',Price = '$Price',Description = '$Description',Category = '$Category' WHERE ProductID = '$ProductID'";
if (mysqli_query($connection, $sql)) {
    echo "<script> alert('The item has been edited');window.location.href='index.php';</script>";
} else {
    echo "<script> alert('Error!! While Edit Item');window.location.href='index.php';</script>";
}
?>