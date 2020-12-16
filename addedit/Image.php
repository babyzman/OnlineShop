<?php
session_start();
error_reporting(0);
$ProductID = $_SESSION['$ProductID'];
$FILE1 = $_FILES['testImages']['name'][0];
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$Directory = '../picture/';
if(isset($_FILES['testImages']['name']))
	{
    $file_name_all="";
    for($i=0; $i<count($_FILES['testImages']['name']);$i++) 
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
	   move_uploaded_file($tmpFilePath,$Directory.$filename);
	    if($query)
	        {
	            echo "<script> alert('Success added picture to database');</script>";
	            echo "<script>window.location = 'index.php'</script>";
	        }
            else
        	{
            	echo "<script> alert('Error while adding picture to database')</script>";
            	echo "<script>window.location = 'index.php'</script>";
        	}
		}
	}
else
	{
	echo "<script> alert('Please selected the file to upload')</script>";
	}
?>