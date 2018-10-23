<?php
include("db-contact.php");
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
<link rel="stylesheet" href="OrganizationFile.css">

<!-- Responsive css -->
<link rel="stylesheet" href="css/responsive.css">

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
							<div class="login">
								<i class="fa fa-sign-in" aria-hidden="true"></i>
								<a href="Login.php">登入</a>
							</div>
							<div class="reg">
								<i class="fa fa-user" aria-hidden="true"></i>
								<a href="Toregister.php">註冊</a>
							</div>
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
								<li><a href="index.php">訊息專欄<i class="fa fa-caret-right" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="downloadList.php">下載專區</a></li>
										<li><a href="bsThing.php">桃園大小事</a></li>
										<li><a href="newNews.php">最新消息</a></li>
									</ul>
								</li>
								<li><a href="EventNews.php">活動快訊<i class="fa fa-caret-right" aria-hidden="true"></i></a>											   									</li>
								<li><a href="Organization.php">公益組織<i class="fa fa-caret-right" aria-hidden="true"></i></a>											   									</li>
								<li><a href="History.php">愛心回顧<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
								<li class="current_page_item"><a href="About.php">關於益尋愛<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="Q&A.php">益尋愛Q&A </a></li>
									</ul>
								</li>
								<li><a href="Login.php">益寶登入<i class="fa fa-caret-right" aria-hidden="true"></i></a>
								</li>
										
							</ul>
							</nav>
						</div>
						<!-- mainmenu end -->
						<!-- Search Button Area -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header Area End -->

	
</header>
<div class="space"></div>

<div class="container">
	<!-- ===========================
	HEADER
	============================ -->
	<div class="space"></div>
	<?php
	$sql="select * from company where comID=".$_GET['e'];
	$data = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($data);
	?>	
    <div id="header" class="row">
		<div class="col-sm-2">
			<img class="propic" src="cus-comImg/<?php echo $row['comPic'] ?>" alt="">
		</div>
		<!-- photo end-->
				<div class="col-sm-10">
			<div class="cv-title">
				<div class="row">
					<div class="col-sm-7">
						<h1><?php echo $row['comName']?></h1>
                        
					</div>
                    <div class="col-sm-5 text-right dl-share">
						<center><a class="btn btn-success" href="<?php echo $row['url']?>" target=_blank>前往機構網站</a></center>
                        </br>
					</div>
				</div>
			</div><!-- Title end-->

			<!-- ===========================
			SOCIAL & CONTACT
			============================ -->
			<div class="row">
				<div class="col-sm-4">
					<ul class="list-unstyled">
						<li><span class="social fa fa-home"></span>&nbsp機構地址: <?php echo $row['address']?>
						</li>
						<li><span class="social fa fa-phone"></span>&nbsp連絡電話: <?php echo $row['phone']?>
						</li>
						<li><span class="social fa fa-envelope-o"></span>&nbsp電子信箱: <?php echo $row['comMail']?>
</a>
						</li>
                        
					</ul>
				</div><!-- social 1st col end-->

			</div><!-- header social end-->
		</div><!-- header right end-->
	</div><!-- header end-->

	<hr class="firsthr">

	<!-- ===========================
	BODY LEFT PART
	============================ -->
	<div class="col-md-8 mainleft">
		<div id="statement" class="row mobmid">
			<div class="col-sm-1">
				<span class="secicon fa fa-user"></span>
			</div><!--icon end-->

			<div class="col-sm-11">
				<h3>機構簡介</h3>
				<p><?php echo $row['comIntro']?></p>
				
			</div><!--info end-->
		</div><!--personal statement end-->

		<hr>

		<div id="education" class="row mobmid">
			<div class="col-sm-1">
				<span class="secicon fa fa-graduation-cap"></span>
			</div><!--icon end-->

			<div class="col-sm-11">
				<h3>過去曾舉辦的活動</h3>
				<?php
				$comID=$_GET['e'];
				$sql = "SELECT * FROM event where (comID = $comID && startDate<NOW()) order by startDate desc";
				$data = mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($data)<1){
				?>
				此機構過去尚未舉辦過活動
				<?php	
				}else{
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
				?>
		<!-----------這是一個活動的開始------------------->
				<div class="row">
					<div class="col-md-9">
						<p class="sub"><a href="Event.php?f=<?php echo $row['eventID']?>"><h4><?php echo $row['eventName'] ?></h4></a></p>
						
						<p><?php  cut_content($row['description'],25);?></p>
					</div>
		<!--------------讀日期的開始---------------->
					<div class="year col-md-3">
						<p><?php echo $row['startDate']?></p>
					</div>
                    <!-----------------日期的結束----------->
				</div><!--Education & Certification 1 end-->
				<!------------------活動的結束--------------->
				<hr><!-------hr留著才有分隔線--------->
				<?php
				}}
				?>
				
			</div>
		</div><!--Education & Certifications end-->
		
	
	</div><!--left end-->
	
	<!-- ===========================
	SIDEBAR
	=========================== -->
	<div class="col-md-4 mainright">
		<div class="row">
			<div class="col-sm-1 col-md-2 mobmid">
				<span class="secicon fa fa-magic"></span>
			</div><!--icon end-->


			<div class="col-sm-11 col-md-10 ">
				<h3>即將舉辦的活動</h3>
				<?php
				$comID=$_GET['e'];
				$sql = "SELECT * FROM event where (comID = $comID && startDate>NOW()) order by startDate desc";
				$data = mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($data)<1){
				?>
				此機構接下來尚未舉辦活動
				<?php	
				}else{
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
				?>
				<div class="award">
					<p class="sub"><a href="Event.php?f=<?php echo $row['eventID']?>"><h4><?php echo $row['eventName'] ?></h4></a></p> <p><?php echo $row['startDate']?></p>
					<p><?php  cut_content($row['description'],25);?></p>
				</div>
				<!--1st award end-->
				<?php
				}}
				?>
			</div><!--awards end-->

		</div>
		
		<hr>

		
		</div><!--tech skills end-->
	</div><!--right end-->
</div><!--container end-->
<!-- ===================== Awesome Feature 

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
