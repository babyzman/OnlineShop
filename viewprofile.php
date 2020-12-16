<?php
error_reporting(0);
session_start();
$Username = $_SESSION['Username'];
$USERNAME = $_SESSION['Username'];
$USERID = $_SESSION['UserID'];
$connection=mysqli_connect("localhost","id15522295_admin","Aa123456789!");
mysqli_select_db($connection,"id15522295_dbproject");
$sql = "SELECT * FROM user WHERE Username = '$Username'";
$result = mysqli_query($connection,$sql)
?>

<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eCommerce HTML-5 Template </title>
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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<!doctype html>
<html>
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
                                            <li><a href="https://www.facebook.com/cpe.kmutt/">Facebook</a>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="login.php">Login</a></li>
                                                    <li><a href="cart.php">Cart</a></li>
                                                    <li><a href="about.html">About</a></li>
                                                    <li><a href="orderconfirm.php">Confirmation</a></li>
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
	<div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg" style="background-image: url(&quot;assets/img/hero/category.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                             <b><h2>User Information</h2></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
		<div class="whole-wrap">
		<div class="container box_1170">
		  <div class="section-top-border">
			  <div class="row"></div>
			</div>
			<div class="section-top-border">
				<div class="row">
				  <div class="col-lg-8 col-md-8">
				    <u><b><h3 class="mb-30">Account Details</h3></b></u>
				    <div class="#rcorners2">
	  <?php
	  if($USERID != "")
	  {
	  while($row = mysqli_fetch_array($result))
	  {	
            $userid = $row['UserID'];
            $result2 = mysqli_query($connection, "SELECT * FROM useraddress WHERE UserID = '$userid' ");
		    echo "<b>Username:</b> $Username";
			echo "<br>"."<br>";
			echo "<b>First Name:</b> &nbsp;$row[Name]";
			echo "<br>"."<br>";
			echo "<b>Last Name:</b> &nbsp;$row[Surname]";
			echo "<br>"."<br>";
			echo "<b>Email:</b> &nbsp;$row[Email]";
			echo "<br>"."<br>";
			echo "<b>Phone NO:</b> &nbsp;$row[PhoneNo]";
			echo "<br>"."<br>";
			echo "<b>Gender:</b> &nbsp;$row[Gender]";
			echo "<br>"."<br>";
			echo "<b>Date of Birth:</b> &nbsp;$row[Birthday_date] ";
			echo "<br>"."<br>";
			while($row1 = mysqli_fetch_array($result2))
			{
			echo "<b>$row1[AddressType] address</b>";
			echo "<br>"."<br>";
		    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Street Name: $row1[StreetName]";
			echo "<br>"."<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;House No: $row1[HouseNo]";
			echo "<br>"."<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zipcode: $row1[Zipcode]";
			echo "<br>"."<br>";	
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City: $row1[City]";
			echo "<br>"."<br>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Province: $row1[Province]";
			echo "<br>"."<br>";	
			}
	  }
	  echo "<button type=\"submit\" class=\"btn_3\" name=\"add\"><a href=\"updateuser.php\">Edit Information</a></button>";
	  echo "<br>";
	  echo "<br>";
	  echo "<button type=\"submit\" class=\"btn_3\" name=\"delete\"><a href=\"deleteaddress.php\">Delete address</a></button>";
	  }
	  else
	  {
	      echo "User has to login first before user can see the user information";
	  }
	?>
		        </div>
		  </div>
	  </div>
</div>

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

    <footer>
  	<div id="foot" style="left: 0px; transform-origin: -1000px -4000px; transform: scale(0.6);">	
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
	</div></footer>

</body>

</html>