<?php
session_start();
include("db-contact.php");
include("timeout.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/EditQ&A.css" rel="stylesheet" type="text/css" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />

</head>
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
						<li><a href="EventCM.php.php">活動列表</a></li>
						<li><a href="ExperienceCM.php">心得列表</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="hold.php">關於益尋愛</a>
							<ul class="dropdown-menu">
								<a href="Q_ACM.php"><li>益尋愛Q&A </li></a>
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


        <div id="wrapper">
            <div id="page-wrapper">
                <div id="page">
                    <div id="wide-content">
                   <a class="button1" href="Q&A.php">返回 Q&A</a>


                      <form>
                      <label for="lname"><h4>新增常見問題</h4></label>
                      <input type="text" id="lname" name="lname">
                      <label for="answer"><h4>回覆</h4></label>
                      <textarea></textarea>
                    </form>
						
                        <center><a class="button" href="#">確定新增</a></center>

                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="totop">
             <img src="images/totop.png" id="btn" title="回到頂部">
    </div>


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
