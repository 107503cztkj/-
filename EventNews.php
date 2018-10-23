<?php
include("db-contact.php");
include("function.php");
error_reporting(0);



if (isset($_POST['search2'])) {
	$searchq =$_POST['search2'];
	
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/EventNews.css" rel="stylesheet" type="text/css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/Search(simple2).css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />
 

</head>
<body>

	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	<div id="header-wrapper">
		<div class="container">
			<div id="header"> 
			<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125556682-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125556682-1');
</script>

				<div id="logo"></div>
				<!--~~~~~~~~~~~~~~~~~~-->         
				<!--~~~導覽列~~~-->  
				<div class="navbar" >
					<ul>
						<li class="dropdown">
							<a class="dropdown-toggle" href="Index.php">訊息專欄</a>
							<ul class="dropdown-menu" >
								<a href="Downloadlist.php"><li>下載專區</li></a>
								<a href="BSthing.php"><li>桃園大小事</li></a>
								<a href="NewNews.php"><li>最新消息</li></a>
							</ul>
						</li>
						<li><a href="EventNews.php">活動快訊</a></li>
						<li><a href="Organization.php">公益組織</a></li>
						<li><a href="History.php">愛心回顧</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="About.php">關於益尋愛</a>
							<ul class="dropdown-menu">
								<a href="Q_A.php"><li>益尋愛Q&A </li></a>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="Login.php">益寶登入</a> 
						</li>
					</ul>            
				</div>   
			</div>
			<!--~~~~~~~~~~~~--> 

			<!------------------------------------------------>
			<!--定義列表--------------------------------------->
			<!------------------------------------------------>
			<div class="love">

				<div class="act-select">
					<select>
						<option value="0">活動地區</option>
						<option value="1">北部</option>
						<option value="2">中部</option>
						<option value="3">南部</option>

					</select>
				</div>
				<div class="act-select">
					<select>
						<option value="0">活動類型</option>
						<option value="1">社區服務</option>
						<option value="2">公益義賣</option>
						<option value="3">社會援助</option>
						<option value="4">教育助學</option>
					</select>
				</div>
				<div class="act-select">
					<select>
						<option value="0">開始日期</option>	
						
					</select>
				</div></center>
				<div class="act-select" >
					<select>
						<option value="0">結束日期</option>	
						
					</select>
				</div>
			<!-- The form -->

				<form class="example" action="search.php" method="POST" style="margin:auto;max-width:400px">
					<input type="text" placeholder="搜尋活動" name="search1">
						
					<button type="submit" name="search2"><i class="fa fa-search"></i></button>
				</form>
			</div>  


	<!------------------------------------------------>
	<!--定義列表--------------------------------------->
	<!------------------------------------------------>
	<div class="content">   	
		<!-- events -->
	<div class="events" id="events">
			<h3 class="agileinfo_header w3layouts_header">Our Latest <span>Events</span></h3>
			<p class="w3_services_para"><span>動動手報名 一起做公益</span></p>
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
						<div class="agileinfo_events_grid1">
							<h5><a href="Event.php?f=<?php echo $row['eventID']?>"><?php echo cut_content($row['eventName'],10)?></a></h5>
							<p><?php  cut_content($row['description'],15);?>
							<p>活動開始日期:  <?php echo $row['startDate']?></br>
							活動結束日期:   <?php echo $row['endDate']?></p>
							需求人數: <?php echo $row['need']?>人		已報名人數: <?php echo $count ?> 人
						</div>
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
		
	
		
		
		
	

		<div class="number">
	<?php
			//分頁頁碼
			echo "<br /><a href=?page=1>首頁</a> ";
			for( $i=1 ; $i<=$pages ; $i++ ) {
				if ( $page-3 < $i && $i < $page+3 ) {
					echo "[<a href=?page=".$i.">".$i."</a>] ";
				}
			} 
			echo " <a href=?page=".$pages.">末頁</a><br /><br />";
		?>
		</div>
    </div> 
	</div>
	</div>
	
	

  	<div class="totop">
        <a href="#">
            <img src="images/totop.png" title="回頂端" id="btn">
        </a>
    </div>
	<!--~~~~~~~~~~~~~~~~~~~~~~--> 
	<!------------------------------------------------>
	<!------------------------------------------------>
    
 	<div class="footer">
        <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
    </div> 		
    

    <!--==========================================-->  
    
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
	<script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>
    <script src="js/select.js"></script>  
    <script src="js/myDropdownMenu.js"></script> 

           
</body>
</html>
