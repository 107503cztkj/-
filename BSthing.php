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


<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">

<link rel="stylesheet" href="assets/css/style.css" type="text/css">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title  -->
<title>|益尋愛|</title>

<!-- ===================== All CSS Files ===================== -->

<!-- Style css -->
<link rel="stylesheet" href="BSthing.css">

<!--[if IE]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

</body>


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
										<li class="current_page_item"><a href="newNews.php">最新消息</a></li>
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
           	 <center>
                <div class="space"></div>
                 <div class="col-xs-12">
                        <div class="section_heading wow fadeInUp">
                            <img src="img/News.png" alt="">
                            <h4 class="wow fadeInUp">桃園大小事</h4>
                        </div>
                        
                    </div>
                    <!-- Table goes in the document BODY -->
                    
             
                    <table class="gridtable" width="60%" >
                        <tr class="title">
                            <th>#</th>
                            <th>標題</th>
                            <th>發佈單位</th>
                            <th>發佈日期</th>
                        </tr>
						<?php
						$sql="select * from bsthing where (title like '%$key%') Order By fdate desc";
						$data=mysql_query($sql) or die(mysql_error());
						?>
						<?php 
						$data_nums = mysql_num_rows($data); //統計總比數
						$per = 10; //每頁顯示項目數量
						$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
						if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
							$page=1; //則在此設定起始頁數
						} else {
							$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
						}
						$start = ($page-1)*$per; //每一頁開始的資料序號
						$data = mysql_query($sql.' LIMIT '.$start.', '.$per) or die("Error");
						?>
						<?php
						if(mysql_num_rows($data)<1){
						?>	
						</br><center>查無相關資訊!</center>
						<?php
						}else{
						for($i=1;$i<=mysql_num_rows($data);$i++){
						$row=mysql_fetch_array($data);
						?>
                        <tr>
                            <td width="3%" align='center' valign="middle"><?php echo $i ?></td>
                           
                            <nav><ul class="navigation animate">

                            <td width="40%"><a href="" data-toggle="modal" data-target="#modal-about-us-<?php echo $row['ID']?>"><?php echo $row['title']?></a></td>
                            </ul>
                            </nav>
                            </div>
							<td width="15%" align='center' valign="middle"><?php echo $row['promulgator']?></td>
                            <td width="10%" align='center' valign="middle"><?php echo date('Y-m-d',strtotime($row['fdate']))?></td>
                        </tr>
                        <?php
						}}
						?>
                    </table>
                  
       		</center>
			<center>
			  <?php
				if(mysql_num_rows($data)>0){
			  ?>
			   <!-----------------頁碼--------->
			  <ul class="pagination pagination-sm">
				<li><a href="?page=1" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
				<?php
				for( $i=1 ; $i<=$pages ; $i++ ) {
					if ( $page-3 < $i && $i < $page+3 ) {
				?>
				<li><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php
					}
				}
				?>
				<li><a href="?page=<?php echo $pages ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
			  </ul>
			   <!-----------------頁碼結束--------->
			   <?php
				}	
				?>
			</center>	
            
           
<!-- 顯示框內容 -->
<?php
$sql="select * from bsthing where (title like '%$key%') Order By fdate desc";
$data=mysql_query($sql) or die(mysql_error());
for($i=1;$i<=mysql_num_rows($data);$i++){
$row=mysql_fetch_array($data);
?>
<div class="modal fade" id="modal-about-us-<?php echo $row['ID']?>" tabindex="-1" role="dialog" aria-labelledby="modal-about-us-label">

<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header" data-background-color="#61dfff">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h2 class="modal-title" id="modal-about-us-label"><?php echo $row['title'] ?></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-5 col-sm-5">
						<section>
							
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="person">
										<div class="image">
											<div class="bg-transfer"><img src="cm/upload/bsthing/<?php echo $row['pic']?>" alt=""></div>
										</div>
										<h4>檔案附件</h4>
										<h5>下載</h5>
									</div>
									<!--end person-->
								</div>
							
								<!--end col-md-6-->
							</div>
							<!--end row-->
						</section>
					</div>
					<!--end col-md-4-->
					<div class="col-md-7 col-sm-7">
						<section>
							<h3>發布單位:<?php echo $row['promulgator'] ?></h3>
                            <p>發布日期:<?php echo date('Y-m-d',strtotime($row['fdate'])) ?></p>
							<p><?php echo $row['content'] ?></p>
						</section>
						<section>
							
						</section>
					</div>
					<!--end col-md-7-->
				</div>
				<!--end row-->
			</div>
			<!--end modal-body-->
		</div>
		<!--end modal-content-->
	</div>
	<!--end container-->
</div>
<!--end modal-dialog-->
</div>
<?php
}
?>
<!--end #modal-about-us-->


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


<script  src="assets/js/jquery-2.2.1.min.js"></script>
<script  src="assets/bootstrap/js/bootstrap.min.js"></script>
<script  src="assets/js/jquery.validate.min.js"></script>
<script  src="assets/js/jquery.magnific-popup.min.js"></script>
<script  src="assets/js/TweenLite.min.js"></script>
<script  src="assets/js/EasePack.min.js"></script>
<script  src="assets/js/exploding-triangles.js"></script>
<script  src="assets/js/custom.js"></script>

<script>

var latitude = 34.038405;
var longitude = -117.946944;
var markerImage = "assets/img/map-marker.png";
var mapTheme = "light";
var mapElement = "map";

$(".modal").on("shown.bs.modal", function (e) {
	google.maps.event.addDomListener(window, 'load', simpleMap(latitude, longitude, markerImage, mapTheme, mapElement));
});

</script>


</body>
</html>