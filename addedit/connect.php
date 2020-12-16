<?php
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$ProductName = $_POST['ProductName'];
$Quantity = $_POST['Quantity'];
$Price = $_POST['Price'];
$Description = $_POST['Description'];
$Category = $_POST['Category'];
$Directory = '../picture/';
$ProductName = stripslashes($ProductName);
$Quantity = stripslashes($Quantity);
$Price = stripslashes($Price);
$Description = stripslashes($Description);
$Category = stripslashes($Category);
$add = "INSERT INTO `product detail` (ProductName,Quantity,Price,Description,Category) VALUES ('$ProductName','$Quantity','$Price','$Description','$Category')";
if (mysqli_query($connection, $add)) {
    echo '<script>alert("Successful added data")</script>';
} else {
    echo "<script> alert('Error!! While Adding Item')</script>";
}
$result55 = mysqli_query($connection,"SELECT * FROM `product detail` ORDER BY ProductID DESC LIMIT 1");
$row = mysqli_fetch_array($result55);
$ProductID = $row['ProductID'];
$sql = "DELETE FROM `product detail` WHERE ProductID = '$ProductID'";
if(getimagesize($_FILES['testImages']['tmp_name'][0]))
	{
	    $file_name_all="";
        for($i=0; $i<count($_FILES['testImages']['name']); $i++) 
		{
            $tmpFilePath = $_FILES['testImages']['tmp_name'][$i]; 
            if ($tmpFilePath != "")
    			{    
                   $name = $_FILES['testImages']['name'][$i];
                   list($txt, $ext) = explode(".", $name);
                   $file= substr(str_replace(" ", "_", $txt), 0);
                   $info = pathinfo($file);
                   $filename = $file.".".$ext;
    			}
                   $query= mysqli_query($connection,"INSERT INTO `product pic` (ProductID,PathofPicture) VALUES ('$ProductID','$filename')");
            	   move_uploaded_file("$tmpFilePath",$Directory.$filename);
		}
		if($query)
	    {
    	    echo "<script> alert('Success added picture to database');window.location.href='index.php';</script>";
    	}
        else
    	{
           echo "<script> alert('Error while adding picture to database');window.location.href='index.php';</script>";
           mysqli_query($connection,$sql);
        }
	}
else
	{
	     echo "<script> alert('You didnt insert image for this product so the it will show default image');window.location.href='index.php';;</script>";
	}
?>