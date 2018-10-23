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

<link href="css/Organization-yibao.css" rel="stylesheet" type="text/css" />
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
					$cusID = $row['cusID'];	
					
				?>	
				<?php 
				if($row['comStatus']==0){
					echo "您尚未成為機構的身份唷!";
				}else if($row['comStatus']==1){
					$sql2 = "SELECT * FROM company where cusID= '$cusID'";
					$data2 = mysql_query($sql2) or die(mysql_error());
					$row2 = mysql_fetch_array($data2);
				?>
				<div class="btn">		
                    <a href="userFile.php" class="button1" ></p>切換</p>益寶</a>
                    <a href="Oupdate.php" class="button2"></p>修改</p>資料</a>
                    </div>
                <div>
                    <img class="photo" src="cus-comImg/<?php echo $row2['comPic'] ?>" width="200px">
                        <table width="450">
                    <table>
                        <tr>
                            <td><h2>機構名稱:</h2> <?php echo $row2['comName'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>連絡電話: </strong><?php echo $row2['phone'] ?></td>
                        </tr>
                        <tr>
							<td><strong>服務信箱: </strong> <?php echo $row2['comMail'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>聯絡地址: </strong><?php echo $row2['address'] ?></td>
                        </tr>
						<tr>
                            <td colspan="2"><strong>機構網站:</strong><a href="<?php echo $row2['url'] ?>">點此</a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="Introduce"><h2>機構介紹:</h2>  </br>
                                <?php echo $row2['comIntro'] ?>
                            </td>
                        </tr>
                    </table>
				
                </div>
            </div>    
        </div>
    
    <a href="ORecord.php?f=<?php echo $row2['comID']?>" class="button">查看機構活動紀錄</a>
	<?php
	}
	?>
	<?php 
	if($row['comStatus']==0){
	?>	
		<a href="Review.php" class="button">申請成為機構</a>
	<?php
	}else if($row['comStatus']==2){
	?>	
		<p>機構申請審核中...</p>
	<?php
	}else if($row['comStatus']==3){
	?>
		<p>機構申請資格不符...不通過</p>
		<a href="Review.php" class="button">重新成為機構</a>
	<?php	
	}
	?>
		
    
    <!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn" title="回到頂部">
    </div>
	<div class="back">
        <label><img src="images/back.png" title="回到上一頁">
            <input type="button" class="backbt" value="返回" onclick="javascript:history.go(-1)" />
        </label>
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
