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

<link href="css/Time.css" rel="stylesheet" type="text/css" />
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
                                <a href="Downloadlist.php"><li>下載專區</li></a>                                 <a href="BSthing.php"><li>桃園大小事</li></a>                                 <a href="NewNews.php"><li>最新消息</li></a>
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
            <div class ="top">
                    <p><strong><h1>個人時數表</h1></strong></p>
                    <div class="text">
                小提醒:</br></br>時數表須在列印後經由桃園市青年志工中心蓋章認證後生效。</br>
                地址:桃園市桃園區三民路三段106號R樓
                </div>
                </div>
           
                <table border="1">
                    <tr class="info">
                        <td width="250">姓名</td>
                        <td width="250">身分證資料</td>
                        <td width="250">服務機構</td>
                        <td width="300">服務活動</td>
                        <td width="150">服務日期</td>
                        <td width="150">是否出席</td>
                        <td width="250">蓋章證明</td>
                        <td width="150">列印</td>
                    </tr>
                    <!--~~~~~~~~~~~~~~~~~~~~~~-->
                    <!-- 資料內容             -->
                    <!--~~~~~~~~~~~~~~~~~~~~~~-->                          
                    <tr>
                        <td></td>						
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="" class="button"style="text-decoration:none;">列印證明</a></td>
                    </tr>
                    <!--~~~~~~~~~~~~~~~~~~~~~~--> 
                </table>
                
            </div>
        </div>
        <div><a href="UserFile.php" class="button1">返回益寶小檔案</a></div><br>
    </div>

    

    <div class="totop">
             <img src="images/totop.png" id="btn" title="回到頂部">
    </div>

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
