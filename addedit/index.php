<?php
error_reporting(0);
session_start();
$UserID = $_SESSION['UserID'];
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$resultSet = mysqli_query($connection,"SELECT ProductID FROM `product detail`");
$resultSet2 = mysqli_query($connection,"SELECT ProductID FROM `product detail`");
$result = mysqli_query($connection,"SELECT * FROM `product detail`");
$resultSet4 = mysqli_query($connection,"SELECT * FROM `user` WHERE UserID = '$UserID'");
$resultSet3 = mysqli_query($connection,"SELECT ProductID FROM `product detail`");
$rows5 = mysqli_fetch_assoc($resultSet4);
if($rows5['Admin'] != "Yes")
{
    echo "<script> alert('Only admin user can go in this page');window.location.href='/index.php';</script>";
}
?>
<!doctype html>
<html>
<head>
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
<script src="js/jquery.min.js"></script>
<script>

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
<script>
$(document).ready(function(){
	$('#ProductID').on('change',function(){
		var ID = $(this).val();
		if(ID){
			$.ajax({
				type:'POST',
				url:'getdata.php',
				data:{"product_id": ID
				},
				success:function(html){
					$('#ProductName').html(html);
				}
			});
		}else{
			$('#ProductName').html('<option value="">Select product ID first</option>');
		}
	});
});
</script>
<script>
$(document).ready(function(){
	$('#ProductID2').on('change',function(){
		var ID2 = $(this).val();
		if(ID2){
			$.ajax({
				type:'POST',
				url:'getdata2.php',
				data:{"product_id2": ID2
				},
				success:function(html){
					$('#ProductName2').html(html);
				}
			});
		}else{
			$('#ProductName2').html('<option value="">Select product ID first</option>');
		}
	});
});
</script>
<script>
$(document).ready(function(){
	$('#delete').on('click',function(){
		var ID3 = $('#ProductID2').val();
		var del = $('#delete_name').val();
		if(ID3){
			if(del){
					$.ajax({
					type:'POST',
					url:'Delete.php',
					data:{"product_id3": ID3,
					},
					success:function(html){
						$('#delete').html(html);
					}
				});
				}else{
					$.ajax({
					type:'POST',
					url:'Delete.php',
					data:{"product_id3": ID3
					},
					success:function(html){
						$('#delete').html(html);
					}	
					});
				}
		}else{
			$('#delete').html('<option value="">Choose ProductID First</option>');
		}
	});
});
</script>
<script>
$(document).ready(function(){
	$('#delete2').on('click',function(){
		var ID4 = $('#ProductID2').val();
		var del = $('#delete_name').val();
		if(ID4){
			if(del){
					$.ajax({
					type:'POST',
					url:'Delete3.php',
					data:{"product_id4": ID4,
						  "del_name": del
					},
					success:function(html){
						$('#delete2').html(html);
					}
				});
			}
		}else{
			$('#delete2').html('<option value="">Choose ProductID First</option>');
		}
	});
});
</script>
	</head>
<body>

<h2>Admin</h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add product</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Edit product</button>
<button onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Add image</button>
<button onclick="document.getElementById('id04').style.display='block'" style="width:auto;">Delete product</button>
<button onclick="document.getElementById('id05').style.display='block'" style="width:auto;">Add admin</button>
<button onclick="window.location.href='/index.php'" style="width:auto;">Home</button>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action = "connect.php" method = "POST" enctype = multipart/form-data>
    <div class="container">
      <h1>Add Form</h1> 
          <p>Please fill in this form to add the item to database.</p>
           <label for="ProductName"><b>Product Name</b></label>
               <input type="text" placeholder="Enter Product Name" name="ProductName" required>
	       <label for="Price"><b>Price</b></label>
               <input type="text" placeholder="Enter Price" name="Price" required>
           <label for="Description"><b>Description</b></label>
               <input type="text" placeholder="Enter description of the item" name="Description" required>
               <label for="Category"><b>Category</b></label>
			   <br>
			   <br>
               <select name="Category">
			   <option value = "Beauty">Beauty</option>
			   <option value = "Books">Books</option>
			   <option value = "Clothing&Accessories">Clothing & Accessories</option>
			   <option value = "Consumer Electronics"> Electronics</option>
			   <option value = "Travel Accessories">Travel Accessories</option>
			   <option value = "Musical Instruments">Musical Instruments</option>
			   <option value = "Office Products">Office Products</option>
			   <option value = "Pet Supplies">Pet</option>
			   <option value = "Sports">Sports</option>
			   <option value = "Toys">Toys</option>
			   </select>
			   <br>
			   <br>
	       <label for="Quantity"><b>Quantity</b></label>
               <input type="text" placeholder="Enter quantity of the item" name="Quantity" required>
           <div class="clearfix">
            <div id = "server">
		    <label for="image"><b>Image to insert</b></label>
            <input type="file" id="files" name="testImages[]" multiple accept="image/*">
		    </div>
		       <button type="submit" class="signupbtn">Add</button>
	      </form>
               <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		  </div>
   </form>
</div>

</div>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action = "new.php" method = "POST">
    <div class="container">
      <h1>Edit Form</h1>
      <p>First choose the ProductID you want to edit</p>
      <hr>
      <label for="ProductID"><b>Product ID  :</b></label>
	  <select name="ID" id="ProductID">
                <option value="">Select ProductID</option>
                //populate value using php
                <?php
                    while($rows = $resultSet->fetch_assoc())
					{
					$ProductID = $rows['ProductID'];
					echo "<option value = '$ProductID'>$ProductID</option>";
					}
                ?>
            </select>
		<h3>This is the Original information Product before edit</h3>
        <label id ="ProductName"></label>
		<h3>Choose the information to edit</h3>
		<label for="ProductName"><b>Product Name : </b></label>
		<input type="text" placeholder="Edit the product Name" name="ProductName"required>
		<label for="Price"><b>Price : </b></label>
		<input type="text" placeholder="Edit Price" name="Price"required>
		<label for="Description"><b>Description : </b></label>
		<input type="text" placeholder="Edit description of the item" name="Description"required>
		<label for="Category"><b>Category</b></label>
			   <br>
			   <br>
               <select name="Category">
			   <option value = "Beauty">Beauty</option>
			   <option value = "Books">Books</option>
			   <option value = "Clothing&Accessories">Clothing & Accessories</option>
			   <option value = "Consumer Electronics"> Electronics</option>
			   <option value = "Travel Accessories">Travel Accessories</option>
			   <option value = "Musical Instruments">Musical Instruments</option>
			   <option value = "Office Products">Office Products</option>
			   <option value = "Pet Supplies">Pet</option>
			   <option value = "Sports">Sports</option>
			   <option value = "Toys">Toys</option>
			   </select>
			   <br>
			   <br>
		<label for="Quantity"><b>Quantity : </b></label>
		<input type="text" placeholder="Enter quantity of the item" name="Quantity" required>
		<div class="clearfix">
		       <button type="submit" class="signupbtn">Add image</button>
	      </form>
               <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
		  </div>
	</div>
	</div>
<div id="id03" class="modal">
  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action = "new3.php" method = "POST">
  <div class="container">
      <h1>Insert Image Form</h1>
      <p>First choose the ProductID you want to insert image</p>
      <hr>
      <label for="ProductID"><b>Product ID  :</b></label>
	  <select name ="ProductID">
	<?php
		while($rows = $resultSet2->fetch_assoc())
		{
			$ProductID = $rows['ProductID'];
			echo "<option value = '$ProductID'>$ProductID</option>";
		}
	?>
	   </select> 
	<div class="clearfix">
		       <button type="submit" class="signupbtn">Add Image</button>
	      </form>
               <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
		  </div>
	</div>
	</div>
<div id="id04" class="modal">
  <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action = "Delete.php" method = "POST">
    <div class="container">
      <h1>Delete Product Picture</h1>
      <p>First choose the ProductID you want to Delete</p>
      <hr>
      <label for="ProductID2"><b>Product ID  :</b></label>
	  <select name="ID2" id="ProductID2">
                <option value="">Select ProductID</option>
                //populate value using php
                <?php
                    while($rows = $resultSet3->fetch_assoc())
					{
					$ProductID = $rows['ProductID'];
					echo "<option value = '$ProductID'>$ProductID</option>";
					}
                ?>
            </select>
		<h3>This is the Original information Product before delete</h3>
        <label id ="ProductName2"></label>
		<label>Delete picture name</label>
		<input id ="delete_name" placeholder = "insert picture name" type = "text" required>
		<div class="clearfix">
		       <button type="button" class="signupbtn" id="delete">Delete Item</button>
	      </form>
               <button type="button" class="cancelbtn" id="delete2">Delete Picture</button>
		  </div>
	</div>
	</div>
<div id= "id05" class = "modal">
    <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
     <form class="modal-content" action = "AddAdmin.php" method = "POST">
         <div class="container">
         <h1>Add admin Form</h1>
         <p>Input Admin username and password</p>
         <hr>
         <label for="AdminName"><b>Username :</b></label>
         <input type="text" placeholder="Enter username of the admin" name="AdminUsername" required>
         <label for="AdminPass"><b>Password :</b></label>
         <input type="text" placeholder="Enter username of the admin" name="AdminPassword" required>
         <div class="clearfix">
         <button type="submit" class="signupbtn">Submit</button>
         </form>
         <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
         </div>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal = document.getElementById('id02');
var modal = document.getElementById('id03');
var modal = document.getElementById('id04');
var modal = document.getElementByID('id05');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
