<?php
session_start();
include("db-contact.php"); 
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
    <link href="ORecord.css" rel="stylesheet">

    <!-- Modernizer -->
    <script type="text/javascript" src="js/vendor/modernizr-3.3.1.min.js"></script>
	<script type="text/javascript"> 
	function check_all(obj,cName) 
	{ 
    var checkboxs = document.getElementsByName(cName); 
    for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
	} 
	</script>

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
											<a href="UserFile.php" data-tooltip="切換益寶"><img class="avatar avatar-42" src="img/3.jpg" alt=""></a>
										</li>	
										<li>
											<a href="OJoin.html" data-tooltip="報名狀況"><i class="fa fa-bell-o" style="font-size:30px;"></i></a>
										</li>									
										<li>
											<a href="ORecord.php?f=<?php echo $row2['comID']?>" data-tooltip="舉辦紀錄"><span class="ace-icon ace-icon-experience"></span></a>
										</li>
							   			<li>
											<a href="Logout.php" data-tooltip="登出"><i class="fa fa-sign-out" style="font-size:24px"></i></a>
										</li>
			</ul>
        </nav><!-- #ace-tab-nav-sm -->

        <article id="ace-card" class="ace-card bg-primary">
		<?php
		$sql2 = "SELECT * FROM company where comID=".$_GET['f'];
		$data2 = mysql_query($sql2) or die(mysql_error());
		$row2 = mysql_fetch_array($data2);
		?>		
			<div class="ace-card-inner text-center">
				<img class="avatar avatar-195" src="cus-comImg/<?php echo $row2['comPic'] ?>" width="195" height="195" alt="">
				<h1>機構名稱</h1>
			<!-----名字的地方--->	<p class="text-muted"><?php echo $row2['comName'] ?></p>
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
											<a href="UserFile.php" data-tooltip="切換益寶"><img class="avatar avatar-42" src="img/3.jpg" alt=""></a>
										</li>	
										<li>
											<a href="OJoin.html" data-tooltip="報名狀況"><i class="fa fa-bell-o" style="font-size:30px;"></i></a>
										</li>										
										<li>
											<a href="ORecord.php" data-tooltip="舉辦經歷"><span class="ace-icon ace-icon-experience"></span></a>
										</li>
										
										<li>
											<a href="Logout.php" data-tooltip="登出"><i class="fa fa-sign-out" style="font-size:24px"></i></a>
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
						
					<!-- START: PAGE CONTENT -->

    <div class="padd-box">
		
        <section class="section clear-mrg">
            <h2 class="title-lg text-upper">舉辦經歷</h2>
			<?php 
							
				$sql = "SELECT * FROM event where comID=".$_GET['f'];
				$data = mysql_query($sql) or die(mysql_error());
				$data_nums = mysql_num_rows($data); //統計總比數
				$per = 5; //每頁顯示項目數量
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
					</br><center><p>貴機構尚未舉辦過活動! 快去新增活動吧~</p></center>
			<?php	
				}else{
			?>
             <div class="AddEvent"> <a href="AddEvent.html" title="新增活動"><img src="../img/AddEvent.png" alt="" border="5"></a></div>

            <div class="padd-box-sm clear-mrg">
            <!---------------------------內文開始(小心其他框架)----------------->
                <!-- Table goes in the document BODY -->
				<a class="button" href="AddEvent.php">發布新活動</a>
				<form action="UpdateEvent.php"  method="post">
                    <table class="gridtable" width="100%">
                        <tr>
                        	<th ><input type="checkbox" name="all" onclick="check_all(this,'IDrow[]')" /></th>
                            <th>#</th>
                            <th width="40%">活動名稱</th>
                            <th width="25%">活動日期</th>
                            <th width="10%">報名</br>人數</th>
                            <th width="10%">實到</br>人數</th>
                            <th width="15%">回    饋</th>
                            <th></th>
                            <th></th>
                       </tr>
					   <?php
						for($i=1;$i<=mysql_num_rows($data);$i++){
						$row=mysql_fetch_array($data);
						$eventID=$row['eventID'];
						
						$count=0;
						$sql2 = "SELECT * FROM  applicationform where eventID='$eventID'";
						$data2 = mysql_query($sql2) or die(mysql_error());
						for($j=1;$j<=mysql_num_rows($data2);$j++){
							$count++;
						}
					?>
                        <tr>
                            <td><?php echo "<input type=\"checkbox\" name=\"IDrow[]\" value=\"$row[eventID]\"/>";?></td>
                            <td><?php echo $i ?></td>
                            <td ><?php echo $row['eventName'] ?></td>
                            <td><?php echo $row['startDate'] ?></td>
                            <td><?php echo $count."人" ?></td>
                            <td></td>
                            <td ><a href="OFeedback.php?e=<?php echo $eventID ?>"style="text-decoration:none;">未給予</a></td>
                            <td><a href="uEvent.php?e=<?php echo $row['eventID']?>" style="text-decoration:none;" target="_blank" style="color:gray;">修改</a></td>
                            <td><a class="button3" style="text-decoration:none;" href="UpdateEvent.php?e=<?php echo $row['eventID']?>">刪除</a></td>
                        </tr>
                    <?php
					}}
					?> 
						
                    </table>
					<center> <input type="submit" name="deleteall" id="button1"  value="刪除所選活動" /></center>
					</form>
                    
                <!----------------框架結束-------------------->
            </div><!-- .padd-box-sm -->
        </section><!-- .section -->


        
    </div><!-- .padd-box -->
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
							<li><a href="typography.html">最新消息</a></li>
							<li><a href="components.html">桃園大小事</a></li>
							<li><a href="search.html">下載專區</a></li>
						</ul>
					</li>
					<li><a href="portfolio.html">活動快訊</a>
					<li><a href="testimonials.html">公益組織</a></li>
					<li><a href="#">愛心回顧</a></li>
					<li class="has-sub-menu"><a href="category.html">關於益尋愛</a>
						<ul class="sub-menu">
							<li><a href="single.html">益尋愛Q&A </a></li>
						</ul>
					</li>
					<li><a href="contact.html">contact</a></li>
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
