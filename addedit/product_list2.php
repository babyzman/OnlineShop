<?php
$mysqli = NEW Mysqli('localhost','id15522295_admin','Aa123456789!','id15522295_dbproject');
$ProductID = $_POST("ProductID");
$resultSet = $mysqli->query("SELECT * FROM `product detail`");
$resultSet2 = $mysqli->query("SELECT * FROM `product pic`");
$resultSet3 = $mysqli->query("SELECT * FROM `product pic`");
$resultSet4 = $mysqli->query("SELECT * FROM `product pic`");
$resultSet5 = $mysqli->query("SELECT * FROM `product pic`");
$resultSet6 = $mysqli->query("SELECT * FROM `product pic`");
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
                                    <div class="flag">
                                        <img src="assets/img/icon/header_icon.png" alt="">
                                    </div>
                                    <div class="select-this">
                                        <form action="#">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">USA</option>
                                                    <option value="">SPN</option>
                                                    <option value="">CDA</option>
                                                    <option value="">USD</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="contact-now">     
                                        <li>+777 2345 7886</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                   <ul>                                          
                                       <li><a href="login.html">My Account </a></li>
                                       <li><a href="product_list.html">Wish List  </a></li>
                                       <li><a href="cart.html">Shopping</a></li>
                                       <li><a href="cart.html">Cart</a></li>
                                       <li><a href="checkout.html">Checkout</a></li>
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
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="Catagori.html">Catagori</a></li>
                                            <li class="hot"><a href="#">Latest</a>
                                                <ul class="submenu">
                                                    <li><a href="product_list.html"> Product list</a></li>
                                                    <li><a href="single-product.html"> Product Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="cart.html">Card</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="about.html">About</a></li>
                                                    <li><a href="confirmation.html">Confirmation</a></li>
                                                    <li><a href="cart.html">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Product Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <input type="text" name="Search" placeholder="Search products">
                                            <div class="search-icon">
                                                <i class="fas fa-search special-tag"></i>
                                            </div>
                                        </div>
                                     </li>
                                    <li class=" d-none d-xl-block">
                                        <div class="favorit-items">
                                            <i class="far fa-heart"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-card">
                                            <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li>
                                   <li class="d-none d-lg-block"> <a href="#" class="btn header-btn">Sign in</a></li>
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
                            <h2>sss list</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Search keyword">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">Category 1</a></p>
                                    <p><a href="#">Category 2</a></p>
                                    <p><a href="#">Category 3</a></p>
                                    <p><a href="#">Category 4</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Type <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">Type 1</a></p>
                                    <p><a href="#">Type 2</a></p>
                                    <p><a href="#">Type 3</a></p>
                                    <p><a href="#">Type 4</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="" alt="" class="img-fluid">
                                    <?php
									echo $ProductID;
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                   <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                             <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                            <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                            <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                             <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                            <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                             <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                             <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3>'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
						<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										<h4 class="modal-title" id="myModalLabel"><?php echo ($ProductName); ?></h4>
									</div>
								<div class="modal-body">
								<?php
								echo '<span class="img-fluid"><img src="picture/'.$Image1.'" "height="600" width="370"/></span>';
								?>
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>									
									
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                             <img src="" alt="" class="img-fluid">
                                    <?php
									while($rows = $resultSet->fetch_assoc())
									{
										$ProductName = $rows['ProductName'];
										$Price = $rows['Price'];
										while($rows2 = $resultSet2->fetch_assoc())
										{
											if($rows['ProductID'] == $rows2['ProductID'])
												{
												$Image = $rows2['PathofPicture'];
												echo '<span class="img-fluid"><img src="picture/'.$Image.'" "height="403" width="370"/></span>';					
												break;
												}
										}
										echo '<span class="img-fluid"><img src="picture/empty.jpg" "height="403" width="370"/></span>';									
										echo '<h3><a href="single-product.html">'.$ProductName.'</a></h3>'."<p>Price: $Price dollars<p>";
										break;
									}
									?>
                                </div>
                            </div>
                        </div>
                        <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
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
                                <img src="assets/img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- Shop Method Start-->
    <div class="shop-method-area section-padding30">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div> 
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

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
                                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
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
                                    <li><a href="#">About</a></li>
                                    <li><a href="#"> Offers & Discounts</a></li>
                                    <li><a href="#"> Get Coupon</a></li>
                                    <li><a href="#">  Contact Us</a></li>
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
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
		<script>
		$("#pop").on("click", function() {
		$('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
</script>


</body>

</html>