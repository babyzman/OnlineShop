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
      foreach ($_SESSION['cart'] as $key => $value){
          if($value['ProductID'] == $_GET['id']){
			  if(count($_SESSION['cart'])<=1)
			  {
				  unset($_SESSION['cart']);
				  echo "<script>alert('Product has been Removed...!')</script>";
				  echo "<script>window.location = 'cart.php'</script>";
			  }
			  else
			  {
				  unset($_SESSION['cart'][$key]);
				  sort($_SESSION['cart']);
				  echo "<script>alert('Product has been Removed...!')</script>";
				  echo "<script>window.location = 'cart.php'</script>";
			  }
          }
      }
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
			$('#total5').html('');
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
    h8{
    font-family: "Segoe UI",;
    padding: 450px;
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
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                </ul>
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
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Complete</h2>
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
              <h10><span style="color: black;">Cart</span><span style="color: black;padding: 100px">></span><span style="color: black;padding: 5px">Transaction<span style="color:black;padding: 100px">></span><span style="font-weight: bold;padding: 5px">Completed</h10>
              <br>
              <br>
             <h8>Transaction Complete</h8>
             <br>
             <br>
             <li class='d-none d-lg-block'><a href='index.php' class = 'btn header-btn' id = 'signout'>Continue Shopping</a></li>
        </div>
      </div>
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
</body>

</html>