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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/ORecord.css" rel="stylesheet" type="text/css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> 
function check_all(obj,cName) 
{ 
    var checkboxs = document.getElementsByName(cName); 
    for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
} 
</script> 

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
					
                <center><p><strong><h1><font color="#666063">機構活動紀錄</font></h1></strong></p></center>
                <div class ="top">
				<a href="AddEvent.php" class="btn2"><i class="fa fa-plus" style="color:#666063;"></i><font color="#333">新增活動</font></a>
                </div>
            </div>
			<?php 
				
				$sql = "SELECT * FROM event where comID=".$_GET['f'];
				$data = mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($data)<1){
			?>		
					</br><center><p>貴機構尚未舉辦過活動! 快去新增活動吧~</p></center>
			<?php	
				}else{
			?>	
			<center>
			<form action="UpdateEvent.php"  method="post">
			<table style="border:3px #fcfffc solid;" cellpadding="10" border='1'>
				<thead>          
					<tr class="info">
						<th width="80"><input type="checkbox" name="all" onclick="check_all(this,'IDrow[]')" />全選</th>
						<th width="45">#</th>
						<th width="700">活動名稱</th>
						<th width="150">活動日期</th>
						<th width="80">已報名人數</th>
						<th width="80">實到</br>人數</th>
						<th width="80">回饋</th>
						<th width="80"></th>
						<th width="80"></th>
					</tr>
				</thead>
				<?php
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
					$eventID=$row['eventID'];
					
					$count=0;
					$sql2 = "SELECT * FROM  applicationform where eventID='$eventID'";
					$data2 = mysql_query($sql2) or die(mysql_error());
					for($j=1;$j<=mysql_num_rows($data2);$j++){
						$count++;
					}
				?>	
				<tbody>			
					<tr>
						<td><?php echo "<input type=\"checkbox\" name=\"IDrow[]\" value=\"$row[eventID]\"/>";?></td>
						<td><?php echo $i ?></td>
						<td><?php echo $row['eventName'] ?></td>
						<td><?php echo $row['startDate'] ?></td>
						<td><?php echo $count."人" ?></td>
						<td><?php  ?></td>
						<td><a href="OFeedback.php?e=<?php echo $eventID ?>"style="text-decoration:none;">未給予</a></td>
						<td><a href="uEvent.php?e=<?php echo $row['eventID']?>" style="text-decoration:none;" target="_blank" style="color:gray;">修改</a></td>
						<td><a class="button3" style="text-decoration:none;" href="UpdateEvent.php?e=<?php echo $row['eventID']?>">刪除</a></td>
					</tr>
				</tbody>
				<?php
				}}
				?>
			
			</table>
			<div class="DELETE">
			<a class="deletedata" style="text-decoration:none;"><input type="submit" name="deleteall" id="button1"  value="刪除所選活動" /></a>
			</div>
		</form>
			</center> 
		</div>
		<center><a href="Organization-yibao.php" class="button1">返回機構檔案</a></center>
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
    <script src="../freecss_greentextile/styles.css"></script>
    <script src="../freecss_greentextile/nivo-slider.css"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script> 
    <script src="js/myDropdownMenu.js"></script> 
           
           
</body>
</html>
