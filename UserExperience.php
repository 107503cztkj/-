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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/UserExperience.css" rel="stylesheet" type="text/css" />
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
                            <a class="dropdown-toggle" href="Index(afterlogin).php">訊息專欄</a>
                            <ul class="dropdown-menu" >
                                <a href="Downloadlist.php"><li>下載專區</li></a>                                 
								<a href="BSthing.php"><li>桃園大小事</li></a>                                 
								<a href="NewNews.php"><li>最新消息</li></a>
                            </ul>
                        </li>
                        <li><a href="EventNews(afterlogin).php">活動快訊</a></li>
                        <li><a href="Organization.php">公益組織</a></li>
                        <li><a href="History(afterlogin).php">愛心回顧</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="About.php">關於益尋愛</a>
                            <ul class="dropdown-menu">
                                <a href="Q_A.php"><li>益尋愛Q&A </li></a>
                            </ul>
                        </li>
                        <li class="dropdown">
							  <a class="dropdown-toggle" href="UserFile.php">益寶小檔案</a>
							  <ul class="dropdown-menu" >
									<a href="logout.php"><li>登出</li></a>
							  </ul>	
						</li>
                    </ul>            
                </div>  
            </div> 
            <!--~~~~~~~~~~~~--> 
            <!------------------------------------------------>
            <!--定義列表--------------------------------------->
            <!------------------------------------------------>
            <div class="content">
			<?php
					$email=$_SESSION['email'];
					$sql = "SELECT * FROM customer where email= '$email' ";
					$data = mysql_query($sql) or die(mysql_error());
					$row = mysql_fetch_array($data);
					$cusID = $row['cusID'];
				
			?>			
            	<center><p><strong><h1>心得紀錄</h1></strong></p>  	       
                        <table style="border:3px #eae2d5 solid;" cellpadding="10" border='1'>
                      <tr class="info"><th width="80">編號</th><th width="650">標題名稱</th><th width="80">發表日期</th><th width="120">撰寫心得</th><th width="80">新增/修改</th><th width="80">刪除</th></tr>
                
         <tr><td>1</td><td>愛河龍舟賽•陪伴視障朋友一起划龍舟</td><td>107/05/25</td><td>是</td><td><a href="Experience.php" style="text-decoration:none;">修改</a></td><td>刪除</td></tr>
         <tr><td>2</td><td>愛心公益園遊會•協助場地前置與義賣活動</td><td>107/05/06</td><td>是</td><td><a href="Experience.php" style="text-decoration:none;">修改</a></td><td>刪除</td></tr>
         <tr><td>3</td><td>新手上路逗陣騎車•陪伴盲友騎乘協力車</td><td>107/3/23</td><td>否</td><td><a href="Experience.php" style="text-decoration:none;">新增</a></td><td>刪除</td></tr>
         </table></center>
            </div>    
        </div>


    <a href="UserFile.php" class="button1">返回益寶小檔案</a>

    <div class="totop">
             <img src="images/totop.png" id="btn" title="回到頂部">
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
    <script src="../freecss_greentextile/styles.css"></script>
    <script src="../freecss_greentextile/nivo-slider.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script> 
    <script src="js/myDropdownMenu.js"></script> 
           
           
</body>
</html>
