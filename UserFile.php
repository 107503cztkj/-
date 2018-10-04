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

<link href="css/UserFile.css" rel="stylesheet" type="text/css" />
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
                                <a class="dropdown-toggle" href="Index(a).php">訊息專欄</a>
                                <ul class="dropdown-menu" >
                                    <a href="Downloadlist.php"><li>下載專區</li></a>                                 
									<a href="BSthing.php"><li>桃園大小事</li></a>                                 
									<a href="NewNews.php"><li>最新消息</li></a>
                                </ul>
                            </li>
                            <li><a href="EventNews(a).php">活動快訊</a></li>
                            <li><a href="Organization.php">公益組織</a></li>
                            <li><a href="History(a).php">愛心回顧</a></li>
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
			    ?>	
                <div class="btn">		
                    <a href="Organization-yibao.php" class="button1" ></p>切換</p>機構</a>
                    <a href="Userupdate.php" class="button2"></p>修改</p>資料</a>
                    </div>
                    
                    <div>
                        <img class="photo" src="cus-comImg/<?php echo $row['profilePic'] ?>" width="200px">
                        <table width="450">
                            <tr>
                                <td><strong>益寶名稱:</strong> <?php echo $row['cusName'] ?></td>
                                <td><strong>Email:</strong> <?php echo $row['email'] ?></td>
                            </tr>
                            <br/>
                            <tr>
                                <td><strong>性別:</strong> <?php echo $row['gender'] ?></td>
                                <td><strong>生日:</strong> <?php echo $row['birth'] ?></td>
                            </tr>
                            <br/>
							 <tr>
                                <td><strong>身分證字號:</strong> <?php echo $row['identity'] ?></td>
                                <td><strong>連絡電話:</strong> <?php echo $row['phone'] ?></td>
                            </tr>
                            <br/>
                            <tr>
								<td><strong>職業:</strong> <?php echo $row['job'] ?></td>
                                <td><strong>擅長語言:</strong>  <?php echo $row['language'].$row['otherLanguage']?></td>
                        
                            </tr>
                            <tr>
                                <td><strong>飲食習慣:</strong> <?php echo $row['foodHabit'] ?></td>
                        
                            </tr>
                            <br/>
                            <tr>
                                <td colspan="2" class="Introduce"><strong>自我介紹:</strong>  <br/><br/> 
                                    <?php echo $row['cusIntro'] ?>
                                </td>
                            </tr>
                        </table>
                        
                        </div>
                    </div>
                 </div>  
         <a href="UserRecord.php" class="button3">個人活動紀錄</a> <a href="UserExperience.php" class="button4">愛心回顧發布紀錄</a>
      
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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>  
    <script src="js/myDropdownMenu.js"></script>            
           
</body>
</html>
