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
					$cusID=$_GET['i'];
					$sql = "SELECT experiences.expID,experiences.title,experiences.add_time FROM experiences,customer WHERE experiences.cusID = customer.cusID && customer.cusID =".$_GET['i'];
					$data = mysql_query($sql) or die(mysql_error());
					if(mysql_num_rows($data)<1){
				?>		
					</br><center><p>您尚未發布過心得唷! 快去與大家分享吧~</p></center>
				<?php	
					}else{
				?>	
            	<center><p><strong><h1>心得紀錄</h1></strong></p></center>
				<center>		
				<form action="UpdateExperience.php"  method="post">	
                    <table style="border:3px #eae2d5 solid;" cellpadding="10" border='1'>
					<thead>
                      <tr class="info">
							<th width="60"><input type="checkbox" name="all" onclick="check_all(this,'IDrow[]')" />全選</th>
						  <th width="45">#</th>
						  <th width="450">標題名稱</th>
						  <th width="100">發表日期</th>
						  <th width="80"></th>
						  <th width="80"></th>
					  </tr>
					</thead>
					<?php
						for($i=1;$i<=mysql_num_rows($data);$i++){
						$row=mysql_fetch_array($data);
					?>
					<tbody>
					 <tr>
						<td><?php echo "<input type=\"checkbox\" name=\"IDrow[]\" value=\"$row[expID]\"/>";?></td>
						 <td><?php echo $i; ?></td>
						 <td><?php echo $row['title']; ?></td>
						 <td><?php echo date('Y-m-d',strtotime($row['add_time']))?></td>
						 <td><a href="uExperience.php?e=<?php echo $row['expID']?>" style="text-decoration:none;">修改</a></td>
						 <td><a class="button3" style="text-decoration:none;" href="UpdateExperience.php?e=<?php echo $row['expID']?>">刪除</a></td>
					 </tr>
					</tbody>
					<?php
					}
					?>
					</table>
					<div class="DELETE">
					<a class="deletedata" style="text-decoration:none;"><input type="submit" name="deleteall" id="button1"  value="刪除所選心得" /></a>
					</div>
				</form>	
				<?php
				}
				?>
				</center>
            </div>    
        </div>


    <a href="UserFile.php" class="button1">返回益寶小檔案</a>
	<a href="AddExperience.php" class="button1">新增愛心回顧</a>

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
