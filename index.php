<?php
error_reporting(0);
session_start();
$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$USERNAME = $_SESSION['Username'];
$USERID = $_SESSION['UserID'];
$result55 = mysqli_query($connection,"select * from user where UserID = '$USERID'") or die ("Failed to query database". mysql_error());
$row55 = mysqli_fetch_array($result55);
if($row55['Admin'] == "Yes")
{
    $USERNAME = "";
    $USERID = "";
    unset($_SESSION['Username']);
	unset($_SESSION['UserID']);
}
?>
<!doctype html>
<html lang="zxx">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online-Shop </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#pro_id').blur(function(){
			$.ajax({
				type:'POST',
				url:'getdata5.php',
				dataType:'json',
				async:true,
				success:function(response){
					var obj=$.parseJSON(response);
					$('#pro_id').val(obj.pro_id);
				}
			});
		});
});
</script>
<style>
</style>
</head>

<body>
<!-- language: php -->
<?php
class page_class
{
   // Properties
   var $current_page;
   var $amount_of_data;
   var $page_total;
   var $row_per_page;

   // Constructor
   function page_class($rows_per_page)
   {
      $this->row_per_page = $rows_per_page;

      $this->current_page = $_GET['page'];
      if (empty($this->current_page))
         $this->current_page = 1;
   }

   function specify_row_counts($amount)
   {
      $this->amount_of_data = $amount;
      $this->page_total= 
         ceil($amount / $this->row_per_page);
   }   

   function get_starting_record()
   {
      $starting_record = ($this->current_page - 1) * 
                     $this->row_per_page;
      return $starting_record;               
   }   

   function show_pages_link()
   {
      if ($this->page_total > 1)
      {
        for ($i = 1; $i <= $this->page_total; $i++)
        {
           if ($i == $this->current_page)
              echo "$i&nbsp|&nbsp";
           else   
              {
                 $script_name = $_SERVER['PHP_SELF'];
                 echo "<a href=\"$script_name?page=$i\">$i</a>&nbsp&nbsp|&nbsp&nbsp\n";
              }
        }   
      }
   }   
}
?>
<!-- language: php -->
    <?php $per_page = 6;
    $page = new Page_class($per_page);
    error_reporting(0); // disable the annoying error report
	$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
	mysqli_select_db($connection,"id15522295_dbproject");
    $result= mysqli_query($connection,"SELECT * FROM `product detail`");
    // paging start
    $row_counts = mysqli_num_rows($result);
    $page->specify_row_counts($row_counts);
    $starting_record = $page->get_starting_record();

    $result= mysqli_query($connection,"SELECT * FROM `product detail` LIMIT $starting_record, $per_page");
    $number = $starting_record; //numbering
    $num_rows = mysqli_num_rows($result);
?>
<?php
if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
	if($USERNAME !=NULL)
	{
	    $connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
	    mysqli_select_db($connection,"id15522295_dbproject");
		$model = $_POST['ProductID'];
		$model2 = $_POST['Quantity'];
		$resultSet5= mysqli_query($connection,"SELECT * FROM `product detail` WHERE ProductID = $model") or die(mysqli_error($connection));
		while($rows5 = $resultSet5->fetch_assoc())
		{
		$Quantity10 = $rows5['Quantity'];
		}
		if($Quantity10>=$_POST['Quantity'])
		{
			if(isset($_SESSION['cart'])){
				$item_array_id = array_column($_SESSION['cart'], "ProductID");
				if(in_array($_POST['ProductID'], $item_array_id)){
					echo "<script>alert('Product is already added in the cart..!')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}else{ 

				$count = count($_SESSION['cart']);
				$count++;
				$item_array = array(
					'ProductID' => $_POST['ProductID'],
					'Quantity' => $_POST['Quantity'],
					'Price' => $_POST['Price'],
					'ProductName' => $_POST['ProductName']
				);
				$_SESSION['cart'][$count] = $item_array;
				$count1 = count($_SESSION['cart']);
				}
			}else{
				$item_array = array(
						'ProductID' => $_POST['ProductID'],
						'Quantity' => $_POST['Quantity'],
						'Price' => $_POST['Price'],
						'ProductName' => $_POST['ProductName']
				);
				// Create new session variable
				$_SESSION['cart'][0] = $item_array;
			}
		}
		else
		{
			echo "<script>alert('Product is out of stock!')</script>";
			echo "<script>window.location = 'index.php'</script>";
		}
	}
	else
	{
		echo "<script>alert('To added in the cart has to have user!')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
}
?>

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                </div>
                                <div class="header-info-right">
                                   <ul>                                          
                                       <li><a href="viewprofile.php">My Account </a></li>
									   <li><a href="addaddress.php">Add Address  </a></li>
                                       <li><a href="cart.php">Shopping</a></li>
                                       <li><a href="cart.php">Cart</a></li>
                                   </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="index.php">Catagory</a></li>
                                            <li><a href="https://www.facebook.com/cpe.kmutt/">Facebook</a>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="cart.php">Cart</a></li>
                                                    <li><a href="about.html">About</a></li>
                                                    <li><a href="OrderConfirm.php">Confirmation</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                     </li>
                                    <li class=" d-none d-xl-block">
                                    </li>
                                    <li>
                                        <div class="shopping-card">
                                            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li>
								   <?php
								   if($USERNAME != NULL)
								   {
									  echo "Username: $USERNAME";
									  echo "<li class='d-none d-lg-block'><a href='signout.php' class = 'btn header-btn' id = 'signout'>Sign out</a></li>";
								   }
								   else
								   {
									   echo "<li class='d-none d-lg-block'><a href='login.php' class = 'btn header-btn'>Sign in</a></li>";
								   }
								   ?>
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/categori/cat1_1.jpg">
        </div>
    </div>
    <!-- slider Area End-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div id="foot" style="left: 0px; transform-origin: 0px -2050px; transform: scale(0.6);">
        <svg class="Path_12" viewBox="0 0 451.485 1313.745">
		<path id="Path_12" d="M 0 0 L 451.484619140625 0 L 451.484619140625 3000.74462890625 L 0 3000.74462890625 L 0 0 Z">
		</path>
	</svg>
	
	<div id="SHOP_BY_CATEGORY">
		<span>SHOP BY CATEGORY</span>
	</div><svg class="Rectangle_11">
		<rect id="Rectangle_11" rx="0" ry="0" x="0" y="0" width="451" height="114">
		</rect>
	</svg>
	<div id="All">
		<span>All</span>
	</div>
	<div id="Electronics_bj">
		<span>Electronics</span>
	</div><div id="Computers">
		<span>Computers</span>
	</div><div id="Smart_Home">
		<span>Smart Home</span>
	</div>
	<div id="Arts__Crafts">
		<span>Arts &amp; Crafts</span>
	</div>
	<div id="Fashion">
		<span>Fashion</span>
	</div><div id="Home_and_Kitchen">
		<span>Home and Kitchen</span>
	</div>
	<div id="Baby">
		<span>Baby</span>
	</div>
	<div id="Health">
		<span>Health</span>
	</div>
	</div>
        <div style="position:absolute; left:350px;">
        <b>Home&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;<span class="orange">All Products</span></b>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="row">
                <div class="col-md-2">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                            </form>
                        </div>

                        </div>

                </div>
                <div class="col-xl-10">
                    <div class="product_list">
                        <div class="row" style="min-width: 1800px; max-width: 2200px;">
                            <div id="foot" style="left: 0px; transform-origin: 400px 200px; transform: scale(0.75);">
                            <div class="col-lg-7 col-sm-6">
                                <div class="single_product_item">
                                    <img src="" alt="" class="img-fluid">
                                    <?php
									$resultSet2 = $mysqli->query("SELECT * FROM `product pic`");
									while($rows = $result->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Image = "";
										$ProductID1 = $rows['ProductID'];
										$Price = $rows['Price'];
										$Quantity_item = $rows['Quantity'];
										$ProductName1 = $rows['ProductName'];
										$Price1 = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
											{
												$Image = $rows2['PathofPicture'];
												$Image1 = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';
												break;
											}
										}
										echo '<h3><a href="#" id = "pop" rel="<?=$ProductName?>">'.$ProductName.'</a></h3>'."<p>Quantity: $Quantity_item items<p>"."<p>Price: $Price Baht<p>";									
										break;  
									}
									$element ="<form action = \"index.php\" method = \"POST\">
									<select type=\"number\" name='Quantity' placeholder = 'Quantity'>
									<option value =\"1\">1</option>
									<option value =\"2\">2</option>
									<option value =\"3\">3</option>
									<option value =\"4\">4</option>
									<option value =\"5\">5</option>
									<option value =\"6\">6</option>
									<option value =\"7\">7</option>
									<option value =\"8\">8</option>
									<option value =\"9\">9</option>
									<option value =\"10\">10</option>
									</select>
									<br>
									<br>
									<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
									<input type='hidden' name='ProductID' value= '$ProductID1'>	
									<input type='hidden' name='Price' value = '$Price1'>
									<input type='hidden' name='Quantity_item' value = '$Quantity1'>
									<input type='hidden' name='ProductName' value = '$ProductName1'>
									</form>";
									echo $element;
									?>
                                </div>
                            </div>
                        </div>
                            <div id="foot" style="left: 0px; transform-origin: 900px 200px; transform: scale(0.75);">
                            <div class="col-lg-7 col-sm-6">
                                <div class="single_product_item">
                                   <img src="" alt="" class="img-fluid">
                                    <?php
									$resultSet2 = $mysqli->query("SELECT * FROM `product pic`");
									while($rows = $result->fetch_assoc())
									{
										$ProductID = $rows['ProductID'];
										$Image = "";
										$ProductName = $rows['ProductName'];
										$Quantity_item = $rows['Quantity'];
										$Price = $rows['Price'];
										$Price2 = $rows['Price'];
										$ProductName2 = $rows['ProductName'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										if (empty($Image))
										{
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';	
										}
										echo '<h3><a href="#" id = "pop" rel="<?=$ProductName?>">'.$ProductName.'</a></h3>'."<p>Quantity: $Quantity_item items<p>"."<p>Price: $Price Baht<p>";									
										break;  
									}
									if($rows != NULL)
									{
									$element ="<form action = \"index.php\" method = \"POST\">
									<select type=\"number\" name='Quantity' placeholder = 'Quantity'>
									<option value =\"1\">1</option>
									<option value =\"2\">2</option>
									<option value =\"3\">3</option>
									<option value =\"4\">4</option>
									<option value =\"5\">5</option>
									<option value =\"6\">6</option>
									<option value =\"7\">7</option>
									<option value =\"8\">8</option>
									<option value =\"9\">9</option>
									<option value =\"10\">10</option>
									</select>
									<br>
									<br>
									<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
									<input type='hidden' name='ProductID' value= '$ProductID'>	
									<input type='hidden' name='Price' value = '$Price2'>
									<input type='hidden' name='ProductName' value = '$ProductName2'>
									</form>";
									echo $element;
									}
									?>
                                </div>
                            </div>
                        </div>
                            <div id="foot" style="left: 0px; transform-origin: 1400px 500px; transform: scale(0.75);">
                            <div class="col-lg-7 col-sm-6">
                                <div class="single_product_item">
                                             <img src="" alt="" class="img-fluid">
                                    <?php
									$resultSet2 = $mysqli->query("SELECT * FROM `product pic`");
									while($rows = $result->fetch_assoc())
									{
										$ProductID2 = $rows['ProductID'];
										$Image = "";
										$ProductName = $rows['ProductName'];
										$Quantity_item = $rows['Quantity'];
										$Price = $rows['Price'];
										$Price3 = $rows['Price'];
										$ProductName3 = $rows['ProductName'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										if (empty($Image))
										{
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';	
										}
										echo '<h3><a href="#" id = "pop" rel="<?=$ProductName?>">'.$ProductName.'</a></h3>'."<p>Quantity: $Quantity_item items<p>"."<p>Price: $Price Baht<p>";									
										break; 
									}
									if($rows != NULL)
									{
									$element ="<form action = \"index.php\" method = \"POST\">
									<select type=\"number\" name='Quantity' placeholder = 'Quantity'>
									<option value =\"1\">1</option>
									<option value =\"2\">2</option>
									<option value =\"3\">3</option>
									<option value =\"4\">4</option>
									<option value =\"5\">5</option>
									<option value =\"6\">6</option>
									<option value =\"7\">7</option>
									<option value =\"8\">8</option>
									<option value =\"9\">9</option>
									<option value =\"10\">10</option>
									</select>
									<br>
									<br>
									<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
									<input type='hidden' name='ProductID' value= '$ProductID2'>	
									<input type='hidden' name='Price' value = '$Price3'>
									<input type='hidden' name='ProductName' value = '$ProductName3'>
									</form>";
									echo $element;
									}
									?>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                        <div id="foot" style="left: 0px; transform-origin: 300px 300px; transform: scale(0.75);">
                            <div class="col-lg-7 col-sm-6">
                                <div class="single_product_item">
                                    <img src="" alt="" class="img-fluid">
                                    <?php
									$resultSet2 = $mysqli->query("SELECT * FROM `product pic`");
									while($rows = $result->fetch_assoc())
									{
										$ProductID3 = $rows['ProductID'];
										$Image = "";
										$ProductName = $rows['ProductName'];
										$Quantity_item = $rows['Quantity'];
										$Price = $rows['Price'];
										$Price4 = $rows['Price'];
										$ProductName4 = $rows['ProductName'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										if (empty($Image))
										{
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';	
										}
										echo '<h3><a href="#" id = "pop" rel="<?=$ProductName?>">'.$ProductName.'</a></h3>'."<p>Quantity: $Quantity_item items<p>"."<p>Price: $Price Baht<p>";									
										break; 
									}
									if($rows != NULL)
									{
									$element ="<form action = \"index.php\" method = \"POST\">
									<select type=\"number\" name='Quantity' placeholder = 'Quantity'>
									<option value =\"1\">1</option>
									<option value =\"2\">2</option>
									<option value =\"3\">3</option>
									<option value =\"4\">4</option>
									<option value =\"5\">5</option>
									<option value =\"6\">6</option>
									<option value =\"7\">7</option>
									<option value =\"8\">8</option>
									<option value =\"9\">9</option>
									<option value =\"10\">10</option>
									</select>
									<br>
									<br>
									<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
									<input type='hidden' name='ProductID' value= '$ProductID3'>	
									<input type='hidden' name='Price' value = '$Price4'>
									<input type='hidden' name='ProductName' value = '$ProductName4'>
									</form>";
									echo $element;
									}
									?>
                                </div>
                            </div>
                        </div>
                        <div id="foot" style="left: 0px; transform-origin: 900px 0px; transform: scale(0.75);">
                            <div class="col-lg-7 col-sm-6">
                                <div class="single_product_item">
                                            <img src="" alt="" class="img-fluid">
                                    <?php
									$resultSet2 = $mysqli->query("SELECT * FROM `product pic`");
									while($rows = $result->fetch_assoc())
									{
										$ProductID4 = $rows['ProductID'];
										$Image = "";
										$ProductName = $rows['ProductName'];
										$Quantity_item = $rows['Quantity'];
										$Price = $rows['Price'];
										$Price5 = $rows['Price'];
										$ProductName5 = $rows['ProductName'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										if (empty($Image))
										{
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';	
										}
										echo '<h3><a href="#" id = "pop" rel="<?=$ProductName?>">'.$ProductName.'</a></h3>'."<p>Quantity: $Quantity_item items<p>"."<p>Price: $Price Baht<p>";									
										break;  
									}
									if($rows != NULL)
									{
									$element ="<form action = \"index.php\" method = \"POST\">
									<select type=\"number\" name='Quantity' placeholder = 'Quantity'>
									<option value =\"1\">1</option>
									<option value =\"2\">2</option>
									<option value =\"3\">3</option>
									<option value =\"4\">4</option>
									<option value =\"5\">5</option>
									<option value =\"6\">6</option>
									<option value =\"7\">7</option>
									<option value =\"8\">8</option>
									<option value =\"9\">9</option>
									<option value =\"10\">10</option>
									</select>
									<br>
									<br>
									<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
									<input type='hidden' name='ProductID' value= '$ProductID4'>	
									<input type='hidden' name='Price' value = '$Price5'>
									<input type='hidden' name='ProductName' value = '$ProductName5'>
									</form>";
									echo $element;
									}
									?>
                                </div>
                            </div>
                        </div>
                            <div id="foot" style="left: 0px; transform-origin: 1400px 100px; transform: scale(0.75);">
                            <div class="col-lg-7 col-sm-6">
                                <div class="single_product_item">
                                    <img src="" alt="" class="img-fluid">
                                    <?php
									$resultSet2 = $mysqli->query("SELECT * FROM `product pic`");
									while($rows = $result->fetch_assoc())
									{
										$ProductName6 = $rows['ProductName'];
										$Image = "";
										$ProductID5 = $rows['ProductID'];
										$Quantity_item = $rows['Quantity'];
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										$Price6 = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										if (empty($Image))
										{
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';	
										}
										echo '<h3><a href="#" id = "pop" rel="<?=$ProductName?>">'.$ProductName.'</a></h3>'."<p>Quantity: $Quantity_item items<p>"."<p>Price: $Price Baht<p>";									
										break; 
									}
									if($rows != NULL)
									{
									$element ="<form action = \"index.php\" method = \"POST\">
									<select type=\"number\" name='Quantity' placeholder = 'Quantity'>
									<option value =\"1\">1</option>
									<option value =\"2\">2</option>
									<option value =\"3\">3</option>
									<option value =\"4\">4</option>
									<option value =\"5\">5</option>
									<option value =\"6\">6</option>
									<option value =\"7\">7</option>
									<option value =\"8\">8</option>
									<option value =\"9\">9</option>
									<option value =\"10\">10</option>
									</select>
									<br>
									<br>
									<button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
									<input type='hidden' name='ProductID' value= '$ProductID5'>	
									<input type='hidden' name='Price' value = '$Price6'>
									<input type='hidden' name='ProductName' value = '$ProductName6'>
									</form>";
									echo $element;
									}
									?>
						<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel"><?php echo ($ProductName); ?></h4>
									</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
                    </div>
                    </div>
                     </div>
                </div>
            </div>
            </div>
        </div>
								<div style="width:200px; margin:0 auto;transform: scale(1.2);">
								<?php
								$page->show_pages_link();
								?>
								</div>
    </section>
    <!-- product list part end-->
    
    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="picture/volk.jpg" alt="#">
                            </div>
                            <p>"Saruth Ruagsuwan"</p>
                            <h5> Front End</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="picture/man.jpg" alt="#">
                            </div>
                            <p>"Suphakit Wongsarawit"</p>
                            <h5>Back End</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="picture/partid.jpg" alt="#">
                            </div>
                            <p>"Partid Rerkshanandana"</p>
                            <h5>Back End</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="picture/wind.jpg" alt="#">
                            </div>
                            <p>"Pukapon Pasurkarn"</p>
                            <h5>Back End</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- Shop Method Start-->
    <div class="shop-method-area section-padding20">
        <div class="container">
            <br>
            <br>
            <br>
            <br>
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>We have free shippinh if you order to certain price</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Website System</h6>
                        <p>We have good and secure Website system.</p>
                    </div>
                </div> 
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>We have good and secure Payment system.</p>
                    </div>
                </div>
                
            </div>
            <br>
            <br>
            <br>
            <br>
            
    <footer>
  	<div id="foot" style="left: 0px; transform-origin: -800px -4500px; transform: scale(0.6);">	
	<svg class="Rectangle_13">
		<rect id="Rectangle_13" rx="0" ry="0" x="-5000" y="0" width="13000" height="334">
		</rect>
	</svg>
	<div id="Group_9">
		<div id="Group_8">
			<div id="Online_Shop_cu">
				<span>Online Shop</span>
			</div>
			<svg class="Path_1_cv" viewBox="0 0 13.921 13.921">
				<path id="Path_1_cv" d="M 0 0 L 13.92142009735107 0 L 13.92142009735107 13.92142009735107 L 0 13.92142009735107 L 0 0 Z">
				</path>
			</svg>
		</div>
		<div id="Quick_Links__Home__Category__C">
			<span>Quick Links<br></span><br><span style="font-style:normal;font-weight:normal;">Home<br><br>Category<br><br>Contract Us</span>
		</div>
		<div id="New_Products__All__Fashion__El">
			<span>New Products</span><br><span style="font-style:normal;font-weight:normal;"><br>All<br><br>Fashion<br><br>Electronics</span>
		</div>
		<div id="Support__FAQ__Term__Condition_">
			<span>Support</span><br><span style="font-style:normal;font-weight:normal;"><br>FAQ<br><br>Term &amp; Condition<br><br>Report Issue</span>
		</div>
		</div>
	</div>
	</footer>
        </div>
    
        </div>
        


    <!-- Shop Method End-->

<!-- JS here -->
        <!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
        
        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>

        <!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
        <!-- Jquery Plugins, main Jquery -->    
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>

        <!-- swiper js -->
        <script src="./assets/js/swiper.min.js"></script>
            <!-- swiper js -->
        <script src="./assets/js/mixitup.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>
        


</body>
</html>