<?php
include("db-contact.php");
include("function.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/History(afterlogin).css" rel="stylesheet" type="text/css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/Search(simple).css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />

</head>
<body>
 <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="header-wrapper">
		<div class="container">
			<div id="header">
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
		  <!-- The form -->
			<div class ="content">
				<form name="form1" method="get" class="example" action="" style="margin:auto;max-width:300px">
					<input type="text" placeholder="搜尋文章.." name="key" >
					<a href="#" onClick="document.form1.submit();"><button type="submit"><i class="fa fa-search"></i></button></a>
					<div class="addbt">
						<a href="AddExperience.php"><img src="images/addbt.png" title="發布心得"></a>
					</div>
				</form>
				
				<!-- Main -->
						<div class="main">
								<!-- Section -->
								<!-- Section -->
								<?php
						if($_GET["key"]<>""){
						  $key=str_replace(" ","%",trim(addslashes($_GET["key"])));
						 
						 }
						  ?>
						<?php
						$sql="select * from experiences where (title like '%$key%' or content like '%$key%' or cusNickname like '%$key%') order by add_time desc";
						$result=mysql_query($sql) or die(mysql_error());
						?>
						<?php 
							$data_nums = mysql_num_rows($result); //統計總比數
							$per = 5; //每頁顯示項目數量 
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
						$row=mysql_fetch_array($result);; 
						?>
						<section class="wrapper style1">
							<div class="inner">
								<!-- 2 Columns -->
									<div class="flex flex-2">
										<div class="col col1"><!---為了不跑版的設定-->
											<div class="image round fit"><!---必須把照片框住 才會用image round fit-->
												<img src="upload/<?php echo $row['expPic']?>" width="300" height="186">
											</div>
										</div>
										<div class="col col2"><!---為了不跑版的設定-->
											<h3 style="color:#7a4a7c"><?php echo $row['title']?></h3>
											<p>分享夥伴: <?php echo $row['cusNickname']?></p>
											<p>發布日期: <?php echo date('Y-m-d',strtotime($row['add_time']))?></p>
											<p style="max-width:700px;color:#804040"><?php cut_content($row['content'],135);?></p>
											<a href="Experience(a).php?e=<?php echo $row['expID']?>" class="button">詳全文</a>
										</div>
									</div>
							</div>
						</section></br></br></br>
					<?php
					}
					?>	
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
</div>
<!------------------------------------------------>
	<!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn">
	</div>
	
	<div class="back">
		<label><img src="images/back.png" title="回到上一頁">
			<input type="button" class="backbt" value="返回" onclick="javascript:history.go(-1)" />
		</label>
	</div>
	<!------------------------------------------------>
    
  	<div class="footer">
        <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
    </div>
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
	
	<script src="js/totop.js"></script>

	<script src="js/navbar.js"></script> 
    <script src="js/myDropdownMenu.js"></script> 
</body>
</html>