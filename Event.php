<?php
include("db-contact.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="css/Event.css" rel="stylesheet" type="text/css" />
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
            <!------------------------------------------------>
            <!--定義活動列表------------------------------------>
            <!------------------------------------------------>
			
            <div class="content"> 
            <div style="border-width:3px;border-style:dashed;border-color:#FFAC55;padding:5px;">
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fyijen02488772%2F&width=20&layout=button_count&action=like&size=small&show_faces=true&share=true&height=46&appId" width="200" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            
			<?php
				
			$sql="select * from event where eventID=".$_GET['f'];
			$data = mysql_query($sql) or die('MySQL query error');
			$row = mysql_fetch_array($data);
			
			$count=0;
			$sql2 = "SELECT * FROM  applicationform where eventID='$row[eventID]'";
			$data2 = mysql_query($sql2) or die(mysql_error());
			for($j=1;$j<=mysql_num_rows($data2);$j++){
				$count++;
			}
			
			$sql3="select * from company where comID='$row[comID]'";
			$data3 = mysql_query($sql3) or die('MySQL query error');
			$row3 = mysql_fetch_array($data3);
			?>
           <h1 class=title><?php echo $row['eventName']?></h1>
			<label class=title>【<?php echo $row['type']?>】</label>
			<?php echo "<input type=\"hidden\" name=\"eventID\" value=\"$row[eventID]\" readonly=\"value\" />"?>
			<div class="photo"><img src="upload/<?php echo $row['eventPic']?>" class="photo" width=77%></div>
			
                <table class="event" width=100%>
					<tr>
						<td width=10%>舉辦組織:</td>
						<td width=10%><?php echo $row3['comName'] ?> </td>
					</tr>
                    <tr>
						<td width=10%>活動開始日期:</td>
                        <td width=10%><?php echo $row['startDate']?></td>
                        <td width=10%>活動結束日期:</td>
                        <td width=10%><?php echo $row['endDate']?></td>
                        <td width=10%>報名截止日期:</td>
                        <td width=10%><?php echo $row['DeadlineDate']?></td>
                    </tr>
                    <tr>
                        <td width=15%>徵求人數</td>
                        <td width=15%><?php echo $row['need']?> 人</td>
                        <td width=15%>已報名人數</td>
                        <td width=15%><?php echo $count ?> 人</td>
                    </tr>
                    <tr>
						<td width=15%>活動地點:</td>
                        <td width=40%><?php echo $row['address']?></td>
                    </tr>
                </table>
            
                <!--定義walfare列表--------------------------------->
                <!------------------------------------------------>
                <table class="walfare">
                    <tr>
                        <td>提供福利:<td>
						<td><?php echo $row['offer']. $row['otherOffer']?></td>
                    </tr>
					<tr>
                        <td>服務時數:<td>
						<td><?php echo $row['hour']."小時" ?></td>
                    </tr>
                </table>
                
                <!------------------------------------------------>
                <!--定義google map--------------------------------->
                <!------------------------------------------------>
                <!--<div id="map">
                
                </div>
        
                <!------------------------------------------------>
                <!--活動內容--------------------------------->
                <!------------------------------------------------>
                <table class="detail" >
                    <tr>
                        <td colspan="2"><h1>活動內容</h1></td>
                    </tr>
                    <tr>
                        <td width=5%></td>
                        <td width=95% style="table-layout: fixed"><?php echo $row['description']?>
                </br>
                </br>
                </br></td>
                 </tr>
            </table>
            
			<center><div id="btn"><a href="signUp.php?e=<?php echo $row['eventID']?>" class="button" onclick=alert("嗨!確定報名此活動嗎?")><img src="images/joinbutton.png"></a></div></center>
           
        </div>   
    </div>
	</div>
<!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn" title="回到頂部">
    </div>

    <div class="back">
        <label><img src="images/back.png" title="回到上一頁">
            <input type="button" class="backbt" value="返回" onclick="javascript:history.go(-1)" />
        </label>
    </div>

	<!------------------------------------------------>
	<!------------------------------------------------>
    
    <div class="footer">
        <h3>Copyright © 2018 益尋愛 怡仁愛心基金會</h3>
    </div>				
    

    <!--==========================================-->  
	<script>
        function myMap() {
            var mapOptions = {
                center: new google.maps.LatLng(24.994447, 121.305713),
                zoom: 20,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        }
    </script>
	<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
    
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  

    <script src="js/navbar.js"></script>
    
    <script src="js/totop.js"></script>

    <script src="js/myDropdownMenu.js"></script> 
           
</body>
</html>
