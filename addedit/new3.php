<?php
session_start();
$_SESSION['$ProductID'] = strip_tags($_POST['ProductID']);
$ProductID = $_POST['ProductID'];
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$ProductID = stripslashes($ProductID);			
$resultSet = mysqli_query($connection,"SELECT * FROM `product detail`");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {

  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}

/* UPLOAD */
.thumb {
	width:230x;
    height: 200px;
    margin: 0.2em -0.7em 0 0;
}

#server img{
  max-width:300x;
  max-height:300px;
}

</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">

	$(document).ready(function() {
	var $fileUpload = $("#files"),
	$list = $('#list'),
	thumbsArray = [],
	maxUpload = 5;

	// READ FILE + CREATE IMAGE
	function read(f) {
	return function(e) {
		var base64 = e.target.result;
		var $img = $('<img/>', {
		src: base64,
		title: encodeURIComponent(f.name), //( escape() is deprecated! )
		"class": "thumb"
		});
		var $thumbParent = $("<span/>", {
		html: $img,
		"class": "thumbParent"
		}).append('<span class="remove_thumb"/>');
		thumbsArray.push(base64); // Push base64 image into array or whatever.
		$list.append($thumbParent);
		};
	}

	// HANDLE FILE/S UPLOAD
	function handleFileSelect(e) {
	e.preventDefault(); // Needed?
	var files = e.target.files;
	var len = files.length;
	if (len > maxUpload || thumbsArray.length >= maxUpload) {
    return alert("Sorry you can upload only 5 images");
	}
	for (var i = 0; i < len; i++) {
		var f = files[i];
		if (!f.type.match('image.*')) continue; // Only images allowed		
		var reader = new FileReader();
		reader.onload = read(f); // Call read() function
		reader.readAsDataURL(f);
		}
	}

	$fileUpload.change(function(e) {
	handleFileSelect(e);
	});
});
</script>
</head>
<body>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" method = "POST" action="Image.php" enctype="multipart/form-data">
  <div class="container">
      <h1>Insert Image Form</h1>
      <p>This show the data of product</p>
	  <hr>
	  <label for="ProductName"><b>Product Name : </b></label>
	  <?php
	  while($row = mysqli_fetch_array($resultSet))
	  {
		  if($row['ProductID'] == $ProductID)
		  {
		  echo $row['ProductName']."<br>"."<br>";
		  break;
		  } 
	  }
	  ?>
	<label for="Price"><b>Price : </b></label>
		<?php
		echo $row['Price']."<br>"."<br>";
		?>
	<label for="Description"><b>Description : </b></label>
		<?php
		echo $row['Description']."<br>"."<br>";
		?>
	<label for="Description"><b>Category : </b></label>
		<?php 
		echo $row['Category']."<br>"."<br>";
		?>
    <label for="Description"><b>Quantity : </b></label>
		<?php
		echo $row['Quantity']."<br>"."<br>";
		?>
		<div id = "server">
		<label for="image"><b>Image to insert</b></label>
        <input type="file" id="files" name="testImages[]" multiple accept="image/*" required>
		</div>
		<br>
		<label for="Description"><b>Preview : </b></label>
		<div></div>
	    <output id="list"></output>
		 <div class="clearfix">
		 <button type="submit" class="signupbtn" value="upload">Add image</button>
	           </form>
               <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		 </div>
	</div>
	</div>
	<script>
	var modal = document.getElementById('id02').style.display='block';
	</script>
</body>
</html>