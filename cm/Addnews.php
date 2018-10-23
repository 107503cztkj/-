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

<link href="css/NewNews2CM.css" rel="stylesheet" type="text/css" />
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
						<li><a href="Actlist.php">活動列表</a></li>
						<li><a href="History.php">心得列表</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="About.php">關於益尋愛</a>
							<ul class="dropdown-menu">
								<a href="Q_A.php"><li>益尋愛Q&A </li></a>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="YibaoList.php">益寶管理</a>
							<ul class="dropdown-menu" >
                                <a href="YibaoList.php"><li>益寶列表 </li></a>
                                <a href="OList.php"><li>機構列表 </li></a>
                                <a href="logout.php"><li>登出</li></a>
							</ul>	
						</li>
					</ul>                      
                </div>   
            </div> 
            <!--~~~~~~~~~~~~--> 
            <div class ="top">
                <p><strong><font color="#808080"><h1>新增-最新消息</h1></font></strong></p>
            </div>
			  
					<div id="page-wrapper">
					
					<div id="page" class="container">
					
				<center><div id="content">
				<form action="writeToNnews.php"  method="post" enctype="multipart/form-data">
					<div class="title">
						<input type="hidden"  name="id" style="font-size:20px;width:700px;">
						<h3>標題:</h3> 
						<input type="text" name="title" style="font-size:20px;width:700px;" required>
					</div>
					圖片上傳&nbsp 
							<input type='file' class="upl" name="pic" accept="image/*">
								<div>
									<img class="preview" style="max-width: 150px; max-height: 150px;">
									<div class="size"></div>
								</div>
					附件上傳(限制2MB)&nbsp <input type="file" name="file" size="20" accept=".doc,.docx,.pdf,.xls"/>
					
					<h3>消息內容:</h3> 
					<p>
					<textarea id="editor1" name="content" style="width:700px;height:400px;" required>
					</textarea><br>
					</p>
  
				</div>
                <div id="sidebar">
					<center> <button class="button1" type="submit"/>上傳</button> </center>
					<div class=btn>
						<a href="NewNewsCM.php" class="button button-small">返回列表</a>
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
    
    <script src="ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'editor1' );</script>
    <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
    

	<script src="js/navbar.js"></script> 
    <script src="js/myDropdownMenu.js"></script>
	<script src="js/preview.js"></script>	
           
           
</body>
</html>

