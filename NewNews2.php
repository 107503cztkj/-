<?php
include("db-contact.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/NewNews2.css" rel="stylesheet" type="text/css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
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
                                <li><a href="Downloadlist.php">下載專區</a><li>
                                <li><a href="NewNews.php">最新消息</a></li>
                                <li><a href="BSthing.php">桃園大小事</a></li>
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
            <div class ="top">
                <p><strong><font color="#808080"><h1>最新消息</h1></font></strong></p>
            </div>
	
			  <?php
				$sql="select * from news where ID=".$_GET['e'];
				$data = mysql_query($sql) or die(mysql_error());
				$row = mysql_fetch_array($data);
			  ?>
					<div id="page-wrapper">
					<div id="page" class="container">
					<center><div id="content">
					<div class="title">
						<h2><?php echo $row['title'] ?></h2>
							<div class="fileandpic">
						<a href="images/測試圖.png" target="_blank"><img src="images/測試圖.png" width="300" height="300"></a>
						
						</br>
						</br>
						<a class="download" href="#">附件下載</a>
						</br>
						</br>
					</div>
						<p><?php echo $row['content'] ?></p>
						
										
					</div></br>

				</div>
                <div id="sidebar">
				
					<ul class="default">
						<li>發佈日期:</li>
						<li><?php echo date('Y-m-d',strtotime($row['fdate'])) ?></li>
					
					</ul>
					<div class=btn>
						<a href="NewNews.php" class="button button-small">返回列表</a>
					</div>
				</div></center>
			</div>
</div>
</div>
  
	<!------------------------------------------------>
     <div class="totop">
        <img src="images/totop.png" id="btn" title="回到頂部">
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

