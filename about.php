<?php
error_reporting(0);
session_start();
$USERNAME = $_SESSION['Username'];
$USERID = $_SESSION['UserID'];
?>
<!doctype html>
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
</head>

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
                        <h2>About</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->
    
    <!-- product list part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about_us_content">
                        <h5>Our Mission</h5>
                        <h3>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.</h3>
                        <div class="about_us_video">
                            <img src="assets/img/about_us_video.png" alt="#" class="img-fluid">
                            <a class="about_video_icon popup-youtube" href="https://www.youtube.com/watch?v=DWHB6nTyKDI"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Credibly innovate granular
                        internal or organic sources
                        whereas standards.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/icon/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/icon/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/icon/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->
    
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                              <!-- logo -->
                             <div class="footer-logo">
                                 <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                             </div>
                             <div class="footer-tittle">
                                 <div class="footer-pera">
                                     <p></p>
                                </div>
                             </div>
                         </div>
                       </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="index.php"> Cetagory</a></li>
                                    <li><a href="#"> Blog</a></li>
                                    <li><a href="About.html">  About</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>New Products</h4>
                                <ul>
                                    <li><a href="#">Woman Cloth</a></li>
                                    <li><a href="#">Fashion Accessories</a></li>
                                    <li><a href="#"> Man Accessories</a></li>
                                    <li><a href="#"> Rubber made Toys</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                 <li><a href="#">Frequently Asked Questions</a></li>
                                 <li><a href="#">Terms & Conditions</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Report a Payment Issue</a></li>
                             </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row">
                 <div class="col-xl-7 col-lg-7 col-md-7">
                     <div class="footer-copy-right">
                         <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  KING MONGKUT'S UNIVERSITY OF TECHNOLOGY THONBURI</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                   </div>
                 </div>
                  <div class="col-xl-5 col-lg-5 col-md-5">
                     <div class="footer-copy-right f-right">
                         <!-- social -->
                         <div class="footer-social">
                             <a href="#"><i class="fab fa-twitter"></i></a>
                             <a href="#"><i class="fab fa-facebook-f"></i></a>
                             <a href="#"><i class="fab fa-behance"></i></a>
                             <a href="#"><i class="fas fa-globe"></i></a>
                         </div>
                     </div>
                 </div>
             </div>
            </div>
        </div>
 
        <!-- Footer End-->
    </footer>

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