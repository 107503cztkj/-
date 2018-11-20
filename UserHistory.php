﻿<?php
session_start();
include("db-contact.php"); 
include("function.php"); 
include("timeout.php"); 
error_reporting(0);
?>
<?php 
if($_SESSION['email'] == null)
{
	echo "<script>alert('您無權限觀看此頁面!請先登入!'); location.href = 'login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en" class="ace ace-card-on ace-tab-nav-on ace-main-nav-on ace-sidebar-on" data-theme-color="#c0e3e7">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>|益尋愛|</title>
    <meta name="description" content="">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <!-- Icon Fonts -->
    <link href="fonts/icomoon/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="js/plugins/highlight/solarized-light.css" rel="stylesheet">
    <link href="UserHistory.css" rel="stylesheet">

    <!-- Modernizer -->
    <script type="text/javascript" src="js/vendor/modernizr-3.3.1.min.js"></script>
  </head>
  <body>
     <div class="ace-wrapper">
         <header id="ace-header" class="ace-container-shift ace-logo-in ace-head-boxed ace-nav-right">
             <div class="ace-head-inner">
                 <div class="ace-head-container ace-container">
                         
                         <div id="ace-head-col2" class="ace-head-col text-right">
                             <div class="ace-nav-container ace-container hidden-sm hidden-xs">
                                 <nav id="ace-main-nav">
                                    <ul class="clear-list">
										<li><a href="index.php">訊息專欄</a></li>
										<li><a href="EventNews.php">活動快訊</a>
										<li><a href="Organization.php">公益組織</a></li>
										<li><a href="History.php">愛心回顧</a></li>
										<li><a href="About.php">關於益尋愛</a></li>
										<li><a href="UserFile.php">益寶小檔案</a></li>
									</ul>
                                 </nav>
                             </div>
                         </div>
                         <!-------------右邊的圓圈按鈕---->
                         <div id="ace-head-col3" class="ace-head-col text-right">
                             <button id="ace-sidebar-btn" class="btn btn-icon btn-light btn-shade">
                                 <span class="ace-icon ace-icon-side-bar-icon"></span>
                             </button>
                         </div>
                     </div>
                 </div><!-- .ace-container -->
             </div><!-- .ace-head-inner -->
        </header><!-- #ace-header -->

        
        <nav id="ace-nav-sm" class="ace-nav hidden-lg hidden-md">
            <ul class="clear-list">
				<li>
					<a href="Organization-uibao.php" data-tooltip="Home"><img class="avatar avatar-42" src="img/uploads/avatar/avatar-42x42.png" alt=""></a>
				</li>
				<li>
					<a href="experience.php" data-tooltip="Experience"><span class="ace-icon ace-icon-experience"></span></a>
				</li>
				<li>
					<a href="portfolio.php" data-tooltip="Portfolio"><span class="ace-icon ace-icon-portfolio"></span></a>
				</li>
				<li>
					<a href="testimonials.php" data-tooltip="References"><span class="ace-icon ace-icon-references"></span></a>
				</li>
				<li>
					<a href="contact.php" data-tooltip="Contact"><span class="ace-icon ace-icon-contact"></span></a>
				</li>
				<li>
					<a href="category.php" data-tooltip="Blog"><span class="ace-icon ace-icon-blog"></span></a>
				</li>
			</ul>
        </nav><!-- #ace-tab-nav-sm -->
		<?php 
				
			$cusID=$_SESSION['cusID'];
			$sql = "SELECT * FROM customer where cusID= '$cusID' ";
			$data = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($data);
			
			
		?>
        <article id="ace-card" class="ace-card bg-primary">
			<div class="ace-card-inner text-center">
				<img class="avatar avatar-195" src="cus-comImg/<?php echo $row['profilePic'] ?>" width="195" height="195" alt="">
				<h1>益寶名稱</h1>
			<!-----名字的地方--->	<p class="text-muted"><?php echo $row['cusName']?></p>
			</div>

		</article><!-- #ace-card -->

        <div id="ace-content" class="ace-container-shift">
            <div class="ace-container">

                
                    <div id="ace-nav-wrap" class="hidden-sm hidden-xs">
                        <div class="ace-nav-cont">
                            <div id="ace-nav-scroll">
                                <nav id="ace-nav" class="ace-nav">
                                    <ul class="clear-list">
										<li>
											<a href="Ofile.php" data-tooltip="切換機構"><img class="avatar avatar-42" img src="img/3.jpg" alt=""></a>
										</li>									
										<li>
											<a href="UserRecord.php" data-tooltip="活動經歷"><span class="ace-icon ace-icon-experience"></span></a>
										</li>
										<li>
											<a href="USerJoin.php" data-tooltip="已報名活動"><i class="fa fa-bell-o" style="font-size:30px;"></i></a>
										</li>
										<li>
											<a href="USerTime.php" data-tooltip="服務時數表"><i class="fa fa-file-text-o" style="font-size:30px;"></i></a>
										</li>
										<li>
											<a href="UserHistory.php" data-tooltip="愛心回顧紀錄"><span class="ace-icon ace-icon-blog"></span></a>
										</li>
										<li>
											<a href="logout.php" data-tooltip="登出"><i class="fa fa-sign-out" style="font-size:24px"></i></a>
										</li>
									</ul>
                                </nav>
                            </div>


                            
                        </div>
                        <div class="ace-nav-btm"></div>
                    </div><!-- .ace-nav-wrap -->

                <div class="ace-paper-stock">
                    <main class="ace-paper clearfix">
                        <div class="ace-paper-cont clear-mrg">
						 <h2 class="title-lg text-upper">愛心回顧紀錄</h2>
						 <?php
							$sql = "SELECT * FROM experiences,customer WHERE experiences.cusID = customer.cusID && customer.cusID = $cusID";
							$data = mysql_query($sql) or die(mysql_error());
							$data_nums = mysql_num_rows($data); //統計總比數
							$per = 3; //每頁顯示項目數量
							$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
							if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
								$page=1; //則在此設定起始頁數
							} else {
								$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
							}
							$start = ($page-1)*$per; //每一頁開始的資料序號
							$data = mysql_query($sql.' LIMIT '.$start.', '.$per) or die("Error");
					
							if(mysql_num_rows($data)<1){
						?>		
							</br><center><p>您尚未發布過心得唷! 快去與大家分享吧~</p></center>
						<?php	
							}else{
								for($i=1;$i<=mysql_num_rows($data);$i++){
								$row=mysql_fetch_array($data);
						?>
                         <!----------------框架開始------------->
				<div class="padd-box-sm">
					<header class="post-header text-center">
						<!---心得名稱-->	
						<h2 class="post-title entry-title text-upper"><a rel="bookmark" href="single-slider.php"><?php echo $row['title']; ?></a></h2>
						
						<div class="post-header-info">

							<!---日期-->    
							<span class="post-author vcard"><p>發布日期:<?php echo date('Y-m-d',strtotime($row['add_time']))?></p></span>
							<!---發布者-->
							&nbsp;<span class="post-author vcard">by <a class="url fn n" rel="author"><?php echo $row['cusNickname']?></a></span>
						
						</div>
 
 							<a class="button" href="uExperience.php?e=<?php echo $row['expID']?>">修改</a>
                            <a class="button1"  href="UpdateExperience.php?e=<?php echo $row['expID']?>">刪除</a>

                          
								</header>

								<div class="post-content entry-content editor clearfix clear-mrg">
									<p><?php echo cut_content($row['content'],100);?></p>
								</div>

								<footer class="post-footer">
									<div class="post-footer-top brd-btm clearfix">
										
										
											<a class="btn btn-sm btn-primary" href="Experience.php?e=<?php echo $row['expID']?>" rel="bookmark">完整內容...</a>
										
									</div>
								</footer>
				</div>
						</article>
                        </br><!-- .post -->
						<?php
							}}
						?>
                         <!----------------框架結束------------>
                         
<!-- END: PAGE CONTENT -->
						
                </div><!-- .ace-paper-cont -->
                <!-----------------頁碼--------->
                <div class="pagination">
							<a class="next page-numbers" href="?page=1"><i class="ace-icon ace-icon-chevron-left"></i>首頁</a>
							<?php
							for( $i=1 ; $i<=$pages ; $i++ ) {
								if ( $page-3 < $i && $i < $page+3 ) {
							?>	
							<a class="page-numbers" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
							<?php
								}
							}
							?>
							<a class="next page-numbers" href="?page=<?php echo $pages ?>">末頁<i class="ace-icon ace-icon-chevron-right"></i></a>
						</div>
                <!-- .頁碼結束 -->
            </main><!-- .ace-paper -->
        </div><!-- .ace-paper-stock -->

        </div><!-- .ace-container -->
    </div><!-- #ace-content -->

    <div id="ace-sidebar">
		<button id="ace-sidebar-close" class="btn btn-icon btn-light btn-shade">
			<span class="ace-icon ace-icon-close"></span>
		</button>
<!----------右手邊小框框----------->
		<div class="space"></div>
		<div id="ace-sidebar-inner">
			<nav id="ace-main-nav-sm" class="visible-xs visible-sm text-center">
				<ul class="clear-list">
					<li class="has-sub-menu"><a href="#">訊息專欄</a>
						<ul class="sub-menu">
							<li><a href="typography.php">最新消息</a></li>
							<li><a href="components.php">桃園大小事</a></li>
							<li><a href="search.php">下載專區</a></li>
						</ul>
					</li>
					<li><a href="portfolio.php">活動快訊</a>
					<li><a href="testimonials.php">公益組織</a></li>
					<li><a href="#">愛心回顧</a>
					</li>
					<li class="has-sub-menu"><a href="category.php">關於益尋愛</a>
						<ul class="sub-menu">
							<li><a href="single.php">益尋愛Q&A </a></li>
						</ul>
					</li>
					<li><a href="contact.php">contact</a></li>
				</ul>
			</nav><!-- #ace-main-nav-sm -->
<!-------------原本這裡是用來放右邊的東西的------------------->
		</div><!-- #ace-sidebar-inner -->
	</div><!-- #ace-sidebar -->

    <footer id="ace-footer" class="ace-container-shift">
        <div class="ace-container">
			<div class="ace-footer-cont clear-mrg">
				<p class="text-center">Copyright © 2018 益尋愛 怡仁愛心基金會</p>				
			</div>
        </div><!-- .ace-container -->
    </footer><!-- #ace-footer -->

    <!-- Triangle Shapes -->
    <svg id="ace-bg-shape-1" class="hidden-sm hidden-xs" height="519" width="758">
        <polygon points="0,455,693,352,173,0,92,0,0,71" style="fill:#d2d2d2;stroke:purple;stroke-width:0; opacity: 0.5">
    </svg>

    <svg id="ace-bg-shape-2" class="hidden-sm hidden-xs" height="536" width="633">
        <polygon points="0,0,633,0,633,536" style="fill:#c0e3e7;stroke:purple;stroke-width:0" />
    </svg>
</div><!-- .ace-wrapper -->

<!-- Scripts -->
<script type="text/javascript" src="js/vendor/jquery-1.12.4.min.js"></script>


<!---<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDiwY_5J2Bkv2UgSeJa4NOKl6WUezSS9XA"></script>--->
<script type="text/javascript" src="js/plugins/highlight/highlight.pack.js"></script>
<script type="text/javascript" src="js/plugins/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/plugins/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="js/plugins/progressbar.min.js"></script>
<script type="text/javascript" src="js/plugins/slick.min.js"></script>

<script type="text/javascript" src="js/options.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>