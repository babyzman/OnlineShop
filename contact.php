<?php
error_reporting(0);
session_start();
$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789','id15522295_dbproject');
$USERNAME = $_SESSION['Username'];
$USERID = $_SESSION['UserID'];
?>
<!doctype html>
<html class="no-js" lang="zxx">

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
</head>

<body>
    
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

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
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- ================ contact section start ================= -->
    <div class="contact-section">
		
            <div class="container">
                <p align="center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d969.282262914853!2d100.49383532922987!3d13.649912802627204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDM4JzU5LjciTiAxMDDCsDI5JzM5LjgiRQ!5e0!3m2!1sth!2sth!4v1588583376605!5m2!1sth!2sth" width="1200" height="450
				" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p
					</div>
					<br>
				<p align="center"><div class="col-lg-9 offset-lg-1"></p>
				<td align="center"><div class="media contact-info">
                          <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h8 class="text-left">Witsawa Watthana Bldg</h3>
                                <p>Bangkok,Thungkhru,10410</p>
                          </div>
					      <div class="col-lg-12 offset-lg-2">
                        <div class="media contact-info"></p>
                          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                          <div class="media-body">
                                <h8>+66 218 5588</h3>
                                <p class="col-xl-20">Customer Support</p>  
					    </div>
                        <div class="col-lg-7 offset-lg-2">
                      <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h8>Saruthvolk@mail.kmutt.ac.th</h3>
                                <p>Contract us anytime !</p>
                            </div>
                        </div>
                    </div>
                </div>
		</div></td>
        </div>

    
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