<?php
error_reporting(0);
session_start();
ob_start();
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$_SESSION['Username'] = $_POST['Username'];
$Username = stripslashes($Username);
$Password = stripslashes($Password);

$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");

$result = mysqli_query($connection,"select * from user where Username = '$Username'") or die ("Failed to query database". mysql_error());

$row = mysqli_fetch_array($result);

if ($row['Admin'] == "Yes")
{
    if($row['Password'] == $Password)
    {
	    echo "<script>alert('Login success welcome admin');window.location.href='addedit/index.php';</script>";
	    $_SESSION['UserID'] = $row['UserID'];
    }
    else
    {
        echo "<script>alert('Login failed password is wrong');window.location.href='login.php';</script>";	
    }
}
else if ($row['Username'] == $Username && $row['Password'] == $Password){
echo "<script> alert('Login success !! Welcome');window.location.href='index.php';</script>";
$_SESSION['UserID'] = $row['UserID'];
exit();
} else {
    if($row['Username'] == "")
    {
        unset($_SESSION['Username']);
	    unset($_SESSION['UserID']);
    	echo "<script>alert('Login failed');window.location.href='login.php';</script>";	
    }
    else
    {
        echo "<script>alert('Login failed password is wrong');window.location.href='login.php';</script>";
    }
}
?>