<?php
session_start();
include("db-contact.php");
include("timeout.php"); 
include("function.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title  -->
<title>|益尋愛|</title>


<!-- ===================== All CSS Files ===================== -->

<!-- Style css -->

<link rel="stylesheet" href="style.css">

<!-- Responsive css -->
<link rel="stylesheet" href="responsive.css">

<!--[if IE]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>


<header class="header_area">
	<!-- Top Header Area Start -->
	<div class="top_header_area hidden-xs">
		<div class="container">
						<!--  Login Register Area -->
						<div class="login_register">
						<?php
							if($_SESSION['login'] == "0"){
								
						?>	

							<div class="login">
								<i class="fa fa-sign-in" aria-hidden="true"></i>
								<a href="Login.php">登入</a>
							</div>
							<div class="reg">
								<i class="fa fa-user" aria-hidden="true"></i>
								<a href="Toregister.php">註冊</a>
							</div>
						<?php
							}else{
						?>
							<div class="login">
								<i class="fa fa-sign-in" aria-hidden="true"></i>
								<a href="Logout.php">登出</a>
							</div>
						<?php
							}
						?>		
						</div>

						
					</div>
				</div>
			</div>
	
	<!-- Top Header Area  End -->

	<!-- Main Header Area Start -->
	<div class="main_header_area home2">
		<div class="container">
			<div class="row">
			

				<div class="col-sm-9 col-xs-12">
					<!-- Menu Area -->
					<div class="main_menu_area">
						<div class="mainmenu">
							<nav>
							<ul id="nav">
								<li class="current_page_item"><a href="index.php">訊息專欄<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="downloadList.php">下載專區</a></li>
										<li><a href="bsThing.php">桃園大小事</a></li>
										<li><a href="newNews.php">最新消息</a></li>
									</ul>
								</li>
								<li><a href="EventNews.php">活動快訊<i class="fa fa-caret-right" aria-hidden="true"></i></a>											   									</li>
								<li><a href="Organization.php">公益組織<i class="fa fa-caret-right" aria-hidden="true"></i></a>											   									</li>
								<li><a href="History.php">愛心回顧<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
								<li><a href="About.php">關於益尋愛<i class="fa fa-caret-right" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="Q&A.php">益尋愛Q&A </a></li>
									</ul>
								</li>
								<?
									if($_SESSION['login'] == "0"){
								?>
								<li><a href="Login.php">益寶登入<i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</li>
								<?
									}else{
								?>
								<li><a href="UserFile.php">益寶小檔案<i class="fa fa-caret-right" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="Logout.php">登出 </a></li>
									</ul>
								</li>
								<?
									}
								?>
										
							</ul>
							</nav>
						</div>
						<!-- mainmenu end -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header Area End -->

</header>

<section class="welcome_area">
	<!-- slider area start -->
	<div class="slider-area educamp">
		<!-- slider -->
		<div class="edu-c edu-d edu-pre">
			<div id="edu-n-slider" class="slides">
				<img src="img/bg-pattern/background-image-1.jpg" alt="" title="#slider-direction-1">
				
			</div>

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<!-- direction 1 -->
						<div id="slider-direction-1" class="slider-direction">
							<div class="slider-content text-left lft-pr d-table slider-1">
								<div class="title-container d-table-c title-compress">
									<h2 class="title1">桃園市青年志工中心</h2>
									
									<a class="btn btn-default" href="About.php" role="button">關於我們</a>
								</div>
							</div>
							<!-- layer 1 -->
							<div class="layer-1">
								<img src="img/slider-1.png" alt="">
							</div>
						</div>
                       
					</div>
					
				</div>
			</div>
		</div>
		<!-- slider end -->
	</div>
	<!-- end slider -->
</section>


<!-- ===================== Price and Plans Area Start ===================== -->
</br>
<div class="price_plan_area section_padding_100">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="section_heading wow fadeInUp">
					<img src="img/icon-img/why-choose-icon.png" alt="">
					<h4 class="wow fadeInUp">訊息專欄</h4>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">

			<!-- Single Price Plan Area Start -->
			<div class="col-sm-4">
			
				<div class="single_price_plan1">
					<div class="title">
						<h3>最新消息</h3>
					</div>
					<div class="description">
					<marquee  direction="up"  height="130px" scrollamount="2"onMouseOver="this.stop()" onMouseOut="this.start()" >
					<?php
					$sql="select * from news Order By fdate desc limit 0,5";
					$data=mysql_query($sql) or die(mysql_error());
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
					?>
					<center><p><a href="NewNews.php?e=<?php echo $row['ID']?> "><?php cut_content($row['title'],17);?></a></p></center>
					
					<?php
					}
					?>
					</marquee>
					</div>
				</div>
			</div>
			<!-- Single Price Plan Area End -->

			<!-- Single Price Plan Area Start -->
			<div class="col-sm-4">
				<div class="single_price_plan">
					<div class="title">
						<h3>桃園大小事</h3>
					</div>
					<div class="description">
					<marquee  direction="up"  height="130px" scrollamount="2"onMouseOver="this.stop()" onMouseOut="this.start()" >
					<?php
					$sql="select * from bsthing Order By fdate desc limit 0,5";
					$data=mysql_query($sql) or die(mysql_error());
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
					?>
                    <center><p><a href="BSthing.php?e=<?php echo $row['ID']?> "><?php cut_content($row['title'],17); ?></a></p></center>
                
				    <?php
					}
				    ?>
					</marquee>
					</div>
				</div>
			</div>
			<!-- Single Price Plan Area End -->

			<!-- Single Price Plan Area Start -->
			<div class="col-sm-4">
				<div class="single_price_plan3">
					<div class="title">
						<h3>下載專區</h3>
					</div>
					<div class="description">
					<?php
					$sql="select * from download Order by fdate desc limit 0,5";
					$data=mysql_query($sql) or die(mysql_error());
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
					?>
					 
					<p><a href="Downloadlist.php"><?php cut_content($row['title'],17); ?></a></p>
					 
				    <?php
					}
				    ?>
					</div>
				</div>
			</div>
			<!-- Single Price Plan Area End -->
			
			
			
			</div>
		</div>
	
	</div>
	
<!-- ===================== Price and Plans Area End ===================== -->


	<!-- Bottom Footer Area Start -->
	<div class="footer_bottom_area">
		<div class="container">
			<div class="row">
				
					<div class="footer_bottom wow fadeInDown">
						<p>Copyright © 2018 益尋愛 怡仁愛心基金會</p>
					</div>
					<!-- Bottom Footer Copywrite Text Area End -->
				
			</div>
			<!-- end./ row -->
		</div>
		<!-- end./ container -->
	</div>
	<!-- Bottom Footer Area End -->
</footer>
<!-- ===================== Footer Area End ===================== -->

<!-- ===================== All jQuery Plugins ===================== -->

<!-- Indexgallery -->

<!-- jQuery (necessary for all JavaScript plugins) -->
<script src="js/jquery-1.12.3.min.js"></script>

<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>

<!-- Nivoslider js -->
<script src="js/jquery.nivoslider.js"></script>
<script src="js/nivoslider-active.js"></script>

<!-- owl-carousel js -->
<script src="js/owl.carousel.min.js"></script>

<!-- Ajax Contact js -->
<script src="js/ajax-contact.js"></script>

<!-- Coundown js -->
<script src="js/coundown-timer.js"></script>

<!-- Meanmenu js -->
<script src="js/meanmenu.js"></script>

<!-- Magnific Popup js -->
<script src="js/jquery.magnific-popup.min.js"></script>

<!-- counterup and waypoint js -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/counterup.min.js"></script>

<!-- back to top js -->
<script src="js/jquery.scrollUp.js"></script>

<!-- wow js -->
<script src="js/wow.min.js"></script>

<!-- script js -->
<script src="js/custom.js"></script>

</body>
</html>
