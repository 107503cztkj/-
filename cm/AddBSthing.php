<?php
session_start();
include("db-contact.php");
include("timeout.php");
error_reporting(0);
?>

<?php 
if($_SESSION['ID'] !== "yiren"){
	echo "<script>alert('您無權限觀看此頁面!請先登入!'); location.href = 'login.php';</script>";
}		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/BSthing2CM.css" rel="stylesheet" type="text/css" />
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
								<a href="DownloadlistCM.php"><li>下載專區</li></a>
								<a href="BSthingCM.php"><li>桃園大小事</li></a>
								<a href="NewNewsCM.php"><li>最新消息</li></a>
						  </ul>
						</li>
						<li><a href="hold.php">活動列表</a></li>
						<li><a href="hold.php">心得列表</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="hold.php">關於益尋愛</a>
							<ul class="dropdown-menu">
								<a href="hold.php"><li>益尋愛Q&A </li></a>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="hold.php">益寶管理</a>
							<ul class="dropdown-menu">
								<a href="YibaoList.php"><li>益寶列表 </li></a>
								<a href="OList.php"><li>機構列表 </li></a>
								<a href="logout.php"><li>登出</li></a>
							</ul>	
						</li>
					</ul>                          
                </div>   
            </div>
			<!--~~~~~~~~~~~~--> 
			 <div class="content">
				<div class ="top">
					<center><h1 class="title"><font color="#808080">新增-桃園大小事</font></h1>
				</div> 
			
				
				<div id="page-wrapper">
				<form action="writeToBSthing.php"  method="post">
					<div id="page" class="container">
					<div id="sidebar">
						
							<ul class="default">
								<li>發佈單位:</li>
								<li><input type="text" name="name" style="font-size:16px;width:200px;"></li></br>
								
							
							</ul>
							<div class=btn>
								<a href="BSthingCM.php" class="button button-small">返回列表</a>
							</div>
						</div>
						<div id="content">
							<div class="title">
							<input type="hidden"  name="id" style="font-size:20px;width:700px;">
							<h3>標題:</h3>
							<input type="text" name="title" style="font-size:20px;width:700px;">
						</div>
						<h3>消息內容:</h3> 
						<p>
						<textarea id="editor1" name="content" style="width:700px;height:400px;">
						</textarea><br>
						<center><button type="submit" class="button1">送出</button></center>
						</div>
					</div>
				</form>	
</div>
</div> 
</div>
	<!------------------------------------------------>
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
    
    <script src="ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'editor1' );</script>
    <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>
    
    <script src="js/scripts.js"></script>   
    <script src="js/myDropdownMenu.js"></script> 
           
           
</body>
</html>
