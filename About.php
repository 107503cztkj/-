<?php
session_start();
include("db-contact.php"); 
include("timeout.php"); 
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
<link rel="stylesheet" href="About.css">

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
						<!-- Search Button Area -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header Area End -->

	
</header>
<div class="space"></div>

<!-- ===================== 本頁內容開始===================== -->

<section class="awesome_features_area home2 section_padding_100">
<div class="container">
          <div class="row">
              <div class="col-xs-12">
                  <div class="section_heading wow fadeInUp">
                      <img src="img/About.png" alt="">
                      <h4 class="wow fadeInUp">關於益尋愛</h4>
                  </div>
              </div>
          </div>
    <!----------------------圖片--------------->
    <div class="col-md-6">
            <img src="img/1493270_274440149370218_1963339746_n.jpg">
       </div>
       
		<div class="row">
			<div class="col-md-6">
            <h2 class="probootstrap-heading">關於益尋愛</h2>
            <h3>|益尋愛|桃園市青年志工中心。怡仁基金會</h3>
            <p>怡仁愛心基金會，是由桃園敏盛醫療體系支持成立之團體，體系總裁楊敏盛先生當初設立基金會的理念，
				即希望在救助醫療病患之餘， </p>能更進一步擴大慈善福利活動，讓更多需要幫助的人都能得到社會的關懷與協助。</p>

				民國七十四年敏盛綜合醫院成立怡仁愛心基金會，從初期的醫療補助、急難救助、義診施醫、協助殘障社團成立</p>
				一直到近期志願服務的推廣，同時結合醫療體系與社會福利，積極推動社區健康營造。</p>
                <p>而在2017年五月，與國立台北商業大學資訊管理科學生合作，</p>重新打造網站，並命名為|益尋愛|</p>
            </br>
            <center><p><a href="https://www.facebook.com/yijen02488772/" target=_blank class="btn btn-primary">怡仁愛心基金會Facebook粉絲專頁</a></p></center>
          </div>
      </div>
       
		<!-- end./ row -->
	</div>
	<!-- end./ container -->
</section>
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
