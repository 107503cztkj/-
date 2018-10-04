<?php 
include("db-contact.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/Downloadlist.css" rel="stylesheet" type="text/css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/Search(simple5).css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
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
    
            <!------------------------------------------------>
            <!--定義列表--------------------------------------->
            <!------------------------------------------------>
            <div class="content">
			<center><h1 class="title"><font color="#fcd4d4">│下載專區│</font></h1>
            <form name="form1" method="get" class="example" action="" style="margin:auto;max-width:300px">
					<input type="text" placeholder="搜尋檔案.." name="key" >
					<a href="#" onClick="document.form1.submit();"><button type="submit" ><i class="fa fa-search"></i></button></a>
			</form>
			
			
                <table style="border:2px #eae2d5 solid;" cellpadding="5" border='1'>
				<thead>
					<tr bgcolor="#f99898" style="color:#FFF">
						<td width="45">編號</td>					
						<td width="300">檔案名稱</td>
						<td width="150">檔案下載</td>
						<td width="150">更新日期</td>
				</thead>	
				<?php
				if($_GET["key"]<>""){
				  $key=str_replace(" ","%",trim(addslashes($_GET["key"])));
				 
				 }
				?>
		
				<?php
				$sql="select * from download where (title like '%$key%') Order by fdate desc";
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
				for($i=1;$i<=mysql_num_rows($data);$i++){
				$row=mysql_fetch_array($data);
				?>
				<tbody>	
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row['title']?></td>
						<td><a href="downloadFile/download.php?f=<?php echo $row['url']?>"><img src="images/download.gif" width="69" height="25" border="0"></td>
						<td><?php echo date('Y-m-d',strtotime($row['fdate']))?></td>
					</tr>
				</tbody>			
                	


				<?php
				}
				?>
				</table></center>
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

    <!------------------------------------------------>
	<!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn">
    </div>
    
	<!------------------------------------------------>
	<!------------------------------------------------>
    
    <div class="footer">
        <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
    </div> 		

    <!--==========================================-->  
    
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
