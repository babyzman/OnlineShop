<?php
session_start();
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$Username = $_POST['AdminUsername'];
$Password = $_POST['AdminPassword'];
$Username = stripslashes($Username);
$Password = stripslashes($Password);
$Admin = "Yes";
$result = mysqli_query($connection,"select * from user where Username = '$Username'") or die ("Failed to query database". mysql_error());
$rows = mysqli_fetch_assoc($result);
if($rows['Username'] != "")
{
    echo "<script> alert('Username already exists');window.location.href='index.php';</script>";
}
else
{
    $add = "INSERT INTO user (Username,Password,Admin) VALUES ('$Username','$Password','$Admin')";
    if (mysqli_query($connection, $add)) {
        echo "<script> alert('Admin has been added');window.location.href='index.php';</script>";
    } else {
        echo "<script> alert('Error!! While Adding Admin');window.location.href='index.php';</script>";
    }
}
?>