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

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Style css -->
<link rel="stylesheet" href="EventNews.css">

<!-- Responsive css -->
<link rel="stylesheet" href="css/responsive.css">

<!-- search -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

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

    <section class="blog_area section_padding_100">
        <div class="container">
          <div class="row">
              <div class="col-xs-12">
                  <div class="section_heading wow fadeInUp">
                      <img src="img/EventNews.png" alt="">
                      <h4 class="wow fadeInUp">活動快訊</h4>
					  
                  </div>
              </div>
		  </div>
		
		<!-- Search Button -->
		<div class="box">
			<div class="container-4">
				<input type="search" id="search" placeholder="Search..." />
				<button class="icon"><i class="fas fa-search"></i></button>
			</div>
    	</div>
     <!------------------------------------------------------>
        <div class="container">

		<div class="events" id="events">
			<div class="w3_agile_services_grids">
			<?php
			$sql="select * from event order by add_time desc";
			$result=mysql_query($sql) or die(mysql_error());
			?>
			<?php 
				$data_nums = mysql_num_rows($result); //統計總比數
				$per = 9; //每頁顯示項目數量
				$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
				if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
					$page=1; //則在此設定起始頁數
				} else {
					$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
				}
				$start = ($page-1)*$per; //每一頁開始的資料序號
				$result = mysql_query($sql.' LIMIT '.$start.', '.$per) or die("Error");
			?>
			<?php
			for($i=1;$i<=mysql_num_rows($result);$i++){
			$row=mysql_fetch_array($result);
			$date = explode('-',$row['startDate']);
			
			$count=0;
			$sql2 = "SELECT * FROM  applicationform where eventID='$row[eventID]'";
			$data2 = mysql_query($sql2) or die(mysql_error());
			for($j=1;$j<=mysql_num_rows($data2);$j++){
				$count++;
			}
			
			if($count>=$row['need']){
				$statusPic="fullbutton.png";
			}else if($row['DeadlineDate']< date("Y-m-d")){
				$statusPic="overbutton.png";
			}else if($row['DeadlineDate'] >= date("Y-m-d")){
				$statusPic="joinbutton.png";
			}
			
			?>
				<div class="col-md-4 w3_agileits_events_grid">
					<div class="wthree_events_grid">
						<div class="wthree_events_grid1">
							<img src="upload/<?php echo $row['eventPic'] ?>" class="img-responsive" />
							<div class="agileits_event_grid_date">
								<p><span><?php echo $date[2] ?></span><?php echo $row['startDate']?></p>
							</div>
						</div>
						<center><div class="agileinfo_events_grid1">
							<h5><a href="Event.php?f=<?php echo $row['eventID']?>"" data-toggle="modal" data-target="#myModal"><?php echo cut_content($row['eventName'],10)?></a></h5>
							<p><?php  cut_content($row['description'],15);?>
							<p>活動開始日期:  <?php echo $row['startDate']?></br>
							活動結束日期:   <?php echo $row['endDate']?></p>
							需求人數: <?php echo $row['need']?>人		已報名人數: <?php echo $count ?> 人
						</div></center>
						<div class="btn"><a  href="Event.php?f=<?php echo $row['eventID']?>"><img src="images/<?php echo $statusPic ?>"></a></div>

					</div>
				</div>
				
				<?php
				}
				?>
				
				<div class="clearfix"> </div>
			</div>
		
	</div>
<!-- //events -->	
     
	</div>
	
	<!-- end. container -->
</section>
<!-- ===================== Price and Plans Area End ===================== -->

<
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
