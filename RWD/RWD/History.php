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
<link rel="stylesheet" href="History.css">

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
						<div class="search_button hidden-xs">
							<a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header Area End -->

	<!-- Search Box Area Start -->
	<div id="search">
		<div class="search_box_area">
			<form action="" method="get">
				<input type="text" name="key" id="search_box" placeholder="搜尋文章...">
				<input type="submit" value="Submit" id="sub">
				<div id="close_button">
					<i class="fa fa-times-circle" aria-hidden="true"></i>
				</div>
			</form>
		</div>
	</div>
	<!-- Search Box Area End -->

	
        </header>
        <div class="space"></div>
        <section class="blog_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section_heading wow fadeInUp">
                            <img src="img/History.png" alt="">
                            <h4 class="wow fadeInUp">愛心回顧</h4>
                        </div>
                    </div>
                </div>
	<!----------------------------------------------------------------->
            <div class="container">
			<?php
			if($_GET["key"]<>""){
				$key=str_replace(" ","%",trim(addslashes($_GET["key"])));
			 
			}
			$sql="select * from experiences where (title like '%$key%' or content like '%$key%' or cusNickname like '%$key%') order by add_time desc";
			$result=mysql_query($sql) or die(mysql_error());
			for($i=1;$i<=mysql_num_rows($result);$i++){
			$row=mysql_fetch_array($result);
			?>
            <div class="w3-welcome-grids w3-welcome-bottom">
                        <div class="col-md-5 w3ls-welcome-img1 w3ls-welcome-img2">
                            <img src="upload/<?php echo $row['expPic']?>"  height="300" width="300" />
                        </div>
                        <div class="write">
                            <h5><?php echo $row['title']?></h5>
                            <p>發布夥伴: <?php echo $row['cusNickname']?></p>
                            <p>發布日期: <?php echo date('Y-m-d',strtotime($row['add_time']))?></p>
                            <p><?php cut_content($row['content'],135);?></span></p>
                            <a class="button" href="Experience.php?e=<?php echo $row['expID']?>">詳全文</a>
        
                    <!------------------------->
                        </div>
            </div>
			<?php
			}
			?>
            </div>
            </div>
            <!-- end. container -->
        </section>
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
