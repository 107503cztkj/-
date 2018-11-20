<?php
session_start();
include("db-contact.php");
include("function.php");
include("timeout.php");
error_reporting(0);
?>
<?php 
if($_SESSION['ID'] !== "yiren"){
	echo "<script>alert('您無權限觀看此頁面!請先登入!'); location.href = 'login.php';</script>";
}		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/AddEvent.css" rel="stylesheet" type="text/css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="js/jquery.twzipcode.min.js"></script>
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
								<a href="DownloadlistCM.php"><li>下載專區</li></a>
								<a href="BSthingCM.php"><li>桃園大小事</li></a>
								<a href="NewNewsCM.php"><li>最新消息</li></a>
						  </ul>
						</li>
						<li><a href="EventCM.php">活動列表</a></li>
						<li><a href="ExperienceCM.php">心得列表</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="About.php">關於益尋愛</a>
							<ul class="dropdown-menu">
								<a href="Q_ACM.php"><li>益尋愛Q&A </li></a>
							</ul>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle">益寶管理</a>
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
	<!------------------------------------------------>
	<!--定義活動列表------------------------------------>
	<!------------------------------------------------>
	<div class="content"> 
		<center><h1 style="color:#fbc0e7">《 新增活動 》</h1></center>
		<form method="POST" action="writeToEventCM.php" enctype="multipart/form-data" > 
				<div class="form-group">                     
					<label><b>舉辦機構:</b></label>&nbsp;
					<select name="comID">	
					<?php
						$sql2="select * from company";
						$data2=mysql_query($sql2) or die(mysql_error());
						for($i=1;$i<=mysql_num_rows($data2);$i++){
						$row2=mysql_fetch_array($data2);
						echo "<option value=".$row2['comID'].">".$row2['comName']."</option>";  
						
					}
					?>	
					</select>
				</div>
				<div class="form-group">                     
					<label><b>活動名稱:</b></label>&nbsp;
					<input type="text" class="form-control" name="eventName" maxlength="30" required="required"/>
				</div> 
				<div>
				<label><b>活動宣傳圖片:</b></label><br><br>
										
							
								<input type='file' class="upl" name="file" accept="image/jpeg,image/gif,image/png">
								<div>
									<img class="preview" style="max-width: 150px; max-height: 150px;">
									<div class="size"></div>
								</div>		
				</div></br>
				
				<label><b>活動類型:</b></label>
				<select name="eventType" required="required">
						<option value="0">--活動類型--</option>
						<option value="社區服務">社區服務</option>
						<option value="環境人文">環境人文</option>
						<option value="文化面相">文化面向</option>
						<option value="科技面向">科技面向</option>
						<option value="健康促進">健康促進</option>
						<option value="教育助學">教育助學</option>
				</select><br><br>
				<label><b>活動開始日期:</b></label>
				<div class="input-append date form-group" id="dp1" data-date-format="yyyy/mm/dd">
					<input type="date" class="form-control" name="startDate"/>
				</div> 
				<label><b>活動結束日期:</b></label>
				<div class="input-append date form-group" id="dp2" data-date-format="yyyy/mm/dd">
					<input type="date" class="form-control" name="endDate"/>
				</div> 
				<label><b>報名截止日期:</b></label>
				<div class="input-append date form-group" id="dp3" data-date-format="yyyy/mm/dd">
					<input type="date" class="form-control" name="DeadlineDate"/>
				</div>  
				<div class="form-group">                     
					<label><b>徵求人數(限填大於0的數字):</b></label>&nbsp;
					<input name="need" size="3" required="required" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
				</div>
				
				<div>
					<h3>提供福利:</h3><br>
						<input type="checkbox" value="便當" name="offer[]"> 便當 
						<input type="checkbox" value="礦泉水" name="offer[]"> 礦泉水 <br>
						<input type="checkbox" value="保險" name="offer[]"> 保險 
						<input type="checkbox" value="紀念品" name="offer[]"> 紀念品
						<br>其他: <input type="text" class="form-control" name="other" maxlength="10" />
				</div>
				<div>
					<br><label><b>給予時數(小時):</b></label>&nbsp;
					<input type="text" class="form-control" name="hour" size="1" required="required" onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"/>
				</div>				
				<div>
					<h3>活動地址:</h3><br>				
					<div id="zipcode2"></div>
					<script>
					$("#zipcode2").twzipcode({
					countySel: "臺北市", // 城市預設值, 字串一定要用繁體的 "臺", 否則抓不到資料
					districtSel: "大安區", // 地區預設值
					zipcodeIntoDistrict: true, // 郵遞區號自動顯示在地區
					css: ["city", "town form-control"], // 自訂 "城市"、"地區" class 名稱 
					countyName: "city", // 自訂城市 select 標籤的 name 值
					districtName: "town" // 自訂地區 select 標籤的 name 值
					});
					</script>							
					<input type="text" class="form-control" name="address" style="width:300px" maxlength="25" required="required"/></br></br>
					</div>
					<h3>活動內容:</h3><br>		
				<div align="center">	
					<textarea id="editor1" name="description" style="width:550px;height:500px;"></textarea><br>
				</div>
				<center><input type="submit" value="新增活動!" name="b1"></center>			
		</form>
		
	</div>
	</div>
	
	
	
	<!------------------------------------------------>
	<!------------------------------------------------>
    
    <div class="footer">
        <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3>
    </div>   		
    
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <!--==========================================-->  
	<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=AIzaSyDuyM09lyMesD69uuBCES3oUEoQC0QyHXM" type="text/javascript"></script>
    <script src="js/googlemap.js"></script>

    <script src="ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'editor1' );</script>
    <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>

    <script src="js/totop.js"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
	<script src="js/navbar.js"></script>
    <script src="js/myDropdownMenu.js"></script>
	<script src="js/preview.js"></script>
    


           
</body>
</html>