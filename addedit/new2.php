<?php
session_start();
$_SESSION['$ProductID'] = strip_tags($_POST['ProductID']);
$ProductID = $_POST['ProductID'];
$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
$query = mysqli_query($mysqli);
$ProductID = stripslashes($ProductID);
$resultSet = $mysqli->query("SELECT * FROM `product detail`");
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
</style>
	</head>
<body>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action = "new.php" method = "POST">
  <div class="container">
      <h1>Edit Form</h1>
      <p>First choose the ProductID you want to edit</p>
	  <hr>
	  <label for="ProductName"><b>Product Name : </b></label>
	  <?php
	  while($row = mysqli_fetch_array($resultSet))
	  {
		  if($row['ProductID'] == $ProductID)
		  {
		  echo $row['ProductName'];
		  break;
		  } 
	  }
	?>
      <input type="text" placeholder="Edit the product Name" name="ProductName"required>
	<label for="Price"><b>Price : </b></label>
	<?php
	echo $row['Price'];
	?>
      <input type="text" placeholder="Edit Price" name="Price"required>
      <label for="Description"><b>Description : </b></label>
	  <?php
	  echo $row['Description'];
	?>
      <input type="text" placeholder="Edit description of the item" name="Description"required>
      <label for="Category"><b>Category : </b></label>
	  <?php
	  echo $row['Category'];
		?>
      <input type="text" placeholder="Edit category of the item" name="Category"required>
	  <label for="Quantity"><b>Quantity : </b></label>
	  <?php
	  echo $row['Quantity'];
	?>
      <input type="text" placeholder="Enter quantity of the item" name="Quantity" required>
	  <label for="image"><b>Image</b></label>
		<form action="/action_page.php">
  		<input type="file" id="myFile" name="filename">
		</form>
<div class="clearfix">
		       <button type="submit" class="signupbtn">Edit</button>
	      </form>
               <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		  </div>
	</div>
	</div>
	</div>
	<script>
// Get the modal

var modal = document.getElementById('id02').style.display='block';

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>