<?php
session_start();
$userid = $_SESSION['$UserID'];
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");

if(isset($_FILES['testImages']['name']))
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
	   
       $query= mysqli_query($connection,"INSERT INTO `user` (Profile_Pic) VALUES ('$filename')") or die ("Failed to query database". mysqli_error($connection));
	   move_uploaded_file($_FILES['testImages']['tmp_name'][$i],"C:/xampp/htdocs/project/profilepic/$filename");
		}
	}
else
	{
	echo "<script> alert('Please selected the file to upload')</script>";
	}
if($query)
	{
	echo "<script> alert('Success added picture to database')</script>";
	}
else
	{
	echo "<script> alert('Error while adding picture to database')</script>";
	}
?>