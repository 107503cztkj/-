<?php
include("db-contact.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/Experience.css" rel="stylesheet" type="text/css" />
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
		 
            <div id="wrapper">
                <div id="page-wrapper">
                    <div id="page">
                        <div id="wide-content">
                        
							
                            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fyijen02488772%2F&width=20&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId" width="200" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
											<?php
											$sql="select * from experiences where expID=".$_GET['e'];
											$data = mysql_query($sql) or die(mysql_error());
											$row = mysql_fetch_array($data);
											$eventID=$row['eventID'];

											$sql2="select * from event where eventID='$eventID'";
											$data2=mysql_query($sql2) or die(mysql_error());
											$row2=mysql_fetch_array($data2); 
											?>
											<div>
											
												<h2><strong><?php echo $row['title'] ?></strong></h2></br>
												<p>活動名稱: <?php echo $row2['eventName']?>
												<p>分享夥伴: <?php echo $row['cusNickname']?></p>
												<p>發布日期: <?php echo date('Y-m-d',strtotime($row['add_time']))?></p>
												<p><img src="upload/<?php echo $row['expPic']?>"  width="300" height="186" class="alignleft" />
												<br/>
												<p><?php echo $row['content'] ?></p>
												<br/>
												<br/>
												<a href="History.php"class="button">返回愛心回顧</a>
																						
											</div>
						</div>
					</div>
				</div>
            </div>
        </div>
<!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn" title="回到頂部">
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
    
 
	<script src="js/navbar.js"></script>
    
    <script src="js/scripts.js"></script>   
    <script src="js/myDropdownMenu.js"></script> 
</body>
</html>
