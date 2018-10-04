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

<link href="css/OFeedback.css" rel="stylesheet" type="text/css" />
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
        <center><h1 class="title"><font color="#000">活動名稱</font></h1>
        <center><h2 class="title"><font color="#000">活動回饋表</font></h2>
        <div class= "detail">
        活動日期:</br>
        應到人數:
        </div>
                    
            <table style="border:3px #cccccc solid;" cellpadding="10" border='1'>
            <thead>
                <tr class="info" style="color:#666">
                    <th width="40">編號</th>
                    <th width="100">姓名</th>
                    <th width="150">
                    <div class="text2">
                    評分:&nbsp&nbsp&nbsp
                        <select>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>   
                        <option value="2">2</option>   
                        <option value="1">1</option>             
                        </select>&nbsp&nbsp★
                    </div>
                    </th>
                    <th width="150">   
                    <div class="text">
                    評語:&nbsp&nbsp&nbsp
                        <select>
                        <option value="prefect">活動過程表現完美，很期待下次再與你合作喔！</option>
                        <option value="Nice">謝謝您今天的參與，讓活動順利落幕！</option>
                        <option value="bad">過程表現有待加強，希望您繼續加油！</option>
                        <option value="other" >其他評語</option>
                        </select></div>
                        </th>
                    <th width="100">其他評語</th>
                    <th width="80">
                    <div class="text2">
                    是否出席&nbsp&nbsp&nbsp
                        <select>
                        <option value="yes">是</option>
                        <option value="no">否</option>          
                        </select></div>
                    
                    </th>
                    </tr>
            </thead>
            </center>
        
            <tbody>
                <tr>
                
                    <td></td>
                    <td></td>
                    <td> 
                    <div class="text2">
                        <select>
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>   
                        <option value="2">2</option>   
                        <option value="1">1</option>             
                        </select>&nbsp&nbsp★
                    </div>
                    </td>
                    <td>
                    <div class="text">
                        <select>
                        <option value="prefect">活動過程表現完美，很期待下次再與你合作喔！</option>
                        <option value="Nice">謝謝您今天的參與，讓活動順利落幕！</option>
                        <option value="bad">過程表現有待加強，希望您繼續加油！</option>
                        <option value="other" >其他評語</option>
                        </select></div>
                    </td>
                    <td>
                    <form>
                    <input type="other" name="other">
                    </form>
                    </td>
                    <td>
                    <div class="text2">
                        <select>
                        <option value="yes">是</option>
                        <option value="no">否</option>          
                        </select></div>
                </td>
                </tr>
            </tbody>
            
            </table>
            </center>
            
            <a class="button" href="#">送出回饋表</a>
			
					   <a href="ORecord.php" class="button1">返回</a>
            
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
    <script src="js/OFeedback.js"></script>   
    <script src="../freecss_greentextile/styles.css"></script>
    <script src="../freecss_greentextile/nivo-slider.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script> 
    <script src="js/myDropdownMenu.js"></script> 
           
           
</body>
</html>
