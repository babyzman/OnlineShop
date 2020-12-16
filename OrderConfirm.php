<?php
error_reporting(0);
session_start();
$USERNAME = $_SESSION['Username'];
$USERID = $_SESSION['UserID'];
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$resultSET= mysqli_query($connection,"SELECT * FROM `product detail`");
$resultSET2= mysqli_query($connection,"SELECT * FROM `product detail`");
$i = 0;
while($row = mysqli_fetch_assoc($resultSET))
{
	$item_array = array(
		'ProductID' => $row['ProductID']
		);
		$_SESSION['ID'][i] = $item_array;
		$i++;
}
?>
<?php
$Price = array_column($_SESSION['cart'],'Price');
$Quantity = array_column($_SESSION['cart'], 'Quantity');
$i = 0;
$total = 0;
while($_SESSION['cart']){
	$total = $Price[$i]*$Quantity[$i];
	$total1 = $total1+$total; 
	$i++;
	if($Price[$i] == NULL)
	{
		break;
	}
}	
?>
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
              echo "$i | ";
           else   
              {
                 $script_name = $_SERVER['PHP_SELF'];
                 echo "<a href=\"$script_name?page=$i\">$i</a> |\n";
              }
        }   
      }
   }   
}
?>
<?php
if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart2'] as $key => $value){
          if($value['OrderID'] == $_GET['id']){
			  if(count($_SESSION['cart2']) <= 1)
			  {
				  unset($_SESSION['cart2']);
			  }
			  else
			  {
				unset($_SESSION['cart2'][$key]);
			  }
          }
      }
	 $ID = $_GET['id'];
	 $sql = "DELETE FROM `itemorder` WHERE OrderID = '$ID'";
	 mysqli_query($connection, $sql);
	 sort($_SESSION['cart2']);
	 echo "<script>alert('Order has been Removed...!')</script>";
     echo "<script>window.location = 'OrderConfirm.php'</script>";
  }
}
?>
<!-- language: php -->
<?php $per_page = 3;
    $page = new Page_class($per_page);
    error_reporting(0); // disable the annoying error report
	$connection=mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"dbproject");
	$ProductID = array_column($_SESSION['cart'], 'ProductID');
	$result= mysqli_query($connection,"SELECT * FROM `product detail` WHERE ProductID IN (".implode(',', $ProductID).")");
    // paging start
    $row_counts = mysqli_num_rows($result);
    $page->specify_row_counts($row_counts);
    $starting_record = $page->get_starting_record();

    $result= mysqli_query($connection,"SELECT * FROM `product detail` WHERE ProductID IN (".implode(',', $ProductID).") LIMIT $starting_record, $per_page");
    $number = $starting_record; //numbering
    $num_rows = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Online-Shop </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
	$('#ShippingWay').on('change',function(){
		var Shipping = $(this).val();
		var total= <?php echo $total1?>;
		if(Shipping){
			$.ajax({
				type:'POST',
				url:'calculate.php',
				data:{"shipping": Shipping,
				"total": total
				},
				success:function(html){
					$('#total5').html(html);
				}
			});
		}else{
			$('#total5').html('sss');
		}
	});
});
</script>
</head>
<style>
   h10{
    font-family: "Segoe UI",;
    padding: 150px;
    color: #2577fd;
    font-size: 30px;
    margin-top: 0px;
    font-style: normal;
    font-weight: 400;
    text-transform: normal;
    } 
    h9{
    font-family: "Segoe UI",;
    padding: 150px;
    color: #000000;
    font-size: 20px;
    margin-top: 0px;
    font-style: normal;
    font-weight: 400;
    text-transform: normal;
    } 
</style>
<body>

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
									   <li><a href="addaddress.html">Add Address  </a></li>
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
                                                    <li><a href="confirmation.html">Confirmation</a></li>
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
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Order From your ID</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
              <h10><span style="color: black">Cart</span><span style="color: black; padding: 100px">&gt;</span><span style="font-weight: 600; padding: 5px">Transaction</span><span style="color:black;padding: 100px">&gt;</span><span style="color: black;padding: 5px">Completed</span></span></h10>
              <br></br>
              <br>
              <br>
            <thead>
              <tr>
                <th scope="col">Order Number</th>
				<th scope="col">Way of Shipping</th>
                <th scope="col">ProductName</th>
                <th scope="col">Total</th>
				<th scope="col">Remove</th>
              </tr>
            </thead>
            <tbody>
                  <div class="media">
                    <div class="media-body">
					<?php
				$total2 = 0;
                $total = 0;
				$i = 0;
				$j = 0;
				$k = 1;
                    if (isset($_SESSION['cart2'])){
						$count = count($_SESSION['cart2']);
						$total = array_column($_SESSION['cart2'],'total');
						$Shipping = array_column($_SESSION['cart2'],'Shipping');
						$Price = array_column($_SESSION['cart2'],'Price');
                        $OrderID = array_column($_SESSION['cart2'],'OrderID');
						$Quantity = array_column($_SESSION['cart2'],'Quantity');
						$ProductName = array_column($_SESSION['cart2'],'ProductName');
						$ProductID = array_column($_SESSION['cart2'],'ProductID');
                        while ($_SESSION['cart2']){
											echo "<td>";
											echo "Order: $k";
											echo "</td>";
											echo "<td>";
											echo "Ship: $Shipping[$j]";
											echo "</td>";
											echo "<td>";
											while(1)
											{
												echo $ProductName[$j];
												echo "<br></br>";
												$j++;
												if($OrderID[$i] != $OrderID[$j])
												{
													break;
												}
												else if($OrderID[$j] == NULL)
												{
													break;
												}
											}
											echo "</td>";
											echo "<td>";
											echo $total[$i];
											$id = $OrderID[$i];
											$total2 = $total2+$total[$i];
											while(1)
											{
												$i++;
												if($i == $j)
												{
													break;
												}
											}
											echo "</td>";
											echo "<td>";
											$element = "<form action=\"OrderConfirm.php?action=remove&id=$id\" method=\"post\" class=\"cart-items\">
														<button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button></form>";
											echo $element;
											echo "</td>";
											echo "</tr>";
											echo "<tr>";
											$k++;
											if($Price[$j] == NULL)
											{
												break;
											}
								}
								echo "<td>";
								echo "total : $total2";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "<td></td>";
								echo "</td>";
					}
						else{
                        echo "<h9>Order is Empty</h9>";
					}
                ?>
				<form method = "POST" action = "transaction.php">
				<tr>
				<td>
				<select name="Transaction" id="TransactionWay">
				<option value="">Select way of payment</option>
				<option value="1">Credit</option>
				<option value="2">Bank</option>
				<option value="3">Cash on delievery</option>
				</select>
				<br>
				<br>
				<br>
				<div id="1" class="pr-price d1">
				<label for="ProductName"><b>Credit Card No. </b></label>
				<br>
				<input type = "text" name = "Creditcard" placeholder = "Input your creditcard" class = "single-input-secondary">
				<br>
				<label for="ProductName"><b>CVV </b></label>
				<br>
				<input type = "text" name = "CVV" placeholder = "Input your cvv"class = "single-input-secondary">
				</div>
				<div id="2" class="pr-price d2">
				<label for="ProductName"><b>Bank No. </b></label>
				<input type = "text" name = "Bank" placeholder = "Input your Bank No." class = "single-input-secondary">
				</div>
				</td>
                <td></td>
				<td></td>
				<td></td>
				</tr>
				<td>
				<button type="submit" class="btn btn-warning my-3" name="add">Make the payment<i class="fas fa-shopping-cart"></i></button>
				<td></td>
				<td></td>
				<td></td>
				</td>
				</tr>
				</form>
        </div>
      </div>
      </table>
      </tbody>
  </section>



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
    
    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
					<script>
				$(function () {
				$('.pr-price').hide();

				$('#TransactionWay').on("change",function () {
				$('.pr-price').hide();
				$('.d'+$(this).val()).show();
				}).val("5");
				});
				</script>
</body>
   <footer>
  	<div id="foot" style="left: 0px; transform-origin: -100px -4500px; transform: scale(0.6);">	
	<svg class="Rectangle_13">
		<rect id="Rectangle_13" rx="0" ry="0" x="-5000" y="0" width="18000" height="334">
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
</html>