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

<link href="css/UserRecord.css" rel="stylesheet" type="text/css" />
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
             <div class="text">
                小提醒:</br></br>時數表須在列印後經由桃園市青年志工中心蓋章認證後生效。</br>
                地址:桃園市桃園區三民路三段106號R樓
                </div>
            	<center><p><strong><h1>個人活動紀錄</h1></strong></p></center>
                 <div class ="top">
				<a href="#" class="btn2"><i class="fa fa-plus" style="color:#666063;"></i><font color="#333">列印時數一覽表</font></a>
                </div>
                  	       
            <center><table style="border:3px #eae2d5 solid;" cellpadding="10" border='1'>
                    <thead>
						 <tr bgcolor="#f99898" > 
							<td width="80">序號</td>
							<td width="150">活動日期</td>
							<td width="650">活動名稱</td>
						    <td width="300">舉辦機構</td>
							<td width="120">服務時數</td>
							<td width="100">時數表</td>
						 </tr>	
					</thead>
					<?php
						$sql2="select * from applicationform where cusID='$cusID'";
						$data2=mysql_query($sql2) or die(mysql_error());
						for($i=1;$i<=mysql_num_rows($data2);$i++){
						$row2=mysql_fetch_array($data2);
						$eventID = $row2['eventID'];
						
						$sql3="select * from event where eventID='$eventID'";
						$data3=mysql_query($sql3) or die(mysql_error());
						$row3=mysql_fetch_array($data3);
						$comID = $row3['comID'];
						
						$sql4="select * from company where comID='$comID'";
						$data4=mysql_query($sql4) or die(mysql_error());
						$row4=mysql_fetch_array($data4);
						
						
					?>
					<tbody>
						 <tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row3['startDate'] ?></td>
							<td><?php echo $row3['eventName'] ?></td>
							<td><?php echo $row4['comName'] ?></td>
							<td><?php echo $row3['hour'] ?></td>
							<td><a href="Time.php" style="text-decoration:none;">列印</a></td>
						</tr>
					 </tbody >
					<?php
					}
					?>
					</table></center>
						</div>    
					</div>
					
					   <a href="UserFile.php" class="button1">返回益寶小檔案</a>
    </div>

 
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
