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
		<center><h1 style="color:#fbc0e7">《 活動編輯 》</h1></center>
		<form method="POST" action="UpdateEventCM.php" enctype="multipart/form-data">
		<?php
		$sql="select * from event where eventID=".$_GET['e'];
		$data = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($data);
		$eventID=$row['eventID'];
		if (preg_match("/社區服務/i", $row["type"])){
			$selected[0] = "selected";
		}
		if (preg_match("/環境人文/i", $row["type"])){
			$selected[1] = "selected";
		}
		if (preg_match("/文化面相/i", $row["type"])){
			$selected[2] = "selected";
		}
		if (preg_match("/科技面向/i", $row["type"])){
			$selected[3] = "selected";
		}
		if (preg_match("/健康促進/i", $row["type"])){
			$selected[4] = "selected";
		}
		if (preg_match("/教育助學/i", $row["type"])){
			$selected[5] = "selected";
		}
		if (preg_match("/供餐/i", $row["offer"])){
			 $checked[0] = "checked";
		}
		if (preg_match("/礦泉水/i", $row["offer"])){
			 $checked[1] = "checked";
		}
		if (preg_match("/保險/i", $row["offer"])){
			 $checked[2] = "checked";
		}
		if (preg_match("/紀念品/i", $row["offer"])){
			 $checked[3] = "checked";
		}
		?>
		<div class="form-group">  
					<input type="hidden"  name="id"  value="<?php echo $_GET['e']?>">
					<label><b>活動名稱:</b></label>&nbsp;
					<input type="text" class="form-control" name="eventName" maxlength="30" value="<?php echo $row['eventName']?>"required="required"/>
				</div> 
				<div>
				<label><b>活動宣傳圖片:</b></label><br><br>
					<input type="hidden"  name="eventPic" value="<?php echo $row['eventPic']?>">
					<img src="../upload/<?php echo $row['eventPic'] ?>" width="20%"></br></br>					
					重新選擇活動照片：		
					<input type='file' class="upl" name="pic" accept="image/*">
					<div>
						<img class="preview" style="max-width: 150px; max-height: 150px;">
						<div class="size"></div>
					</div>		
				</div></br>
				
				<label><b>活動類型:</b></label>
				<select name="eventType" required="required">
						<option value="0">--活動類型--</option>
						<option value="社區服務" <?php echo $selected[0] ?>>社區服務</option>
						<option value="環境人文" <?php echo $selected[1] ?>>環境人文</option>
						<option value="文化面相" <?php echo $selected[2] ?>>文化面向</option>
						<option value="科技面向" <?php echo $selected[3] ?>>科技面向</option>
						<option value="健康促進" <?php echo $selected[4] ?>>健康促進</option>
						<option value="教育助學" <?php echo $selected[5] ?>>教育助學</option>
				</select><br><br>
				<label><b>活動開始日期:</b></label>
				<div class="input-append date form-group" id="dp1" data-date-format="yyyy/mm/dd">
					<input type="date" class="form-control" name="startDate" value="<?php echo $row['startDate'] ?>"/>
				</div> 
				<label><b>活動結束日期:</b></label>
				<div class="input-append date form-group" id="dp2" data-date-format="yyyy/mm/dd">
					<input type="date" class="form-control" name="endDate" value="<?php echo $row['endDate'] ?>"/>
				</div> 
				<label><b>報名截止日期:</b></label>
				<div class="input-append date form-group" id="dp3" data-date-format="yyyy/mm/dd">
					<input type="date" class="form-control" name="DeadlineDate" value="<?php echo $row['DeadlineDate'] ?>"/>
				</div>  
				<div class="form-group">                     
					<label><b>徵求人數(限填大於0的數字):</b></label>&nbsp;
					<input name="need" size="3" value="<?php echo $row['need'] ?>" required onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}">
				</div>
				
				<div>
					<h3>提供福利:</h3><br>
						<input type="checkbox" value="供餐" name="offer[]" <?php echo $checked[0] ?>> 供餐 
						<input type="checkbox" value="礦泉水" name="offer[]" <?php echo $checked[1] ?>> 礦泉水 <br>
						<input type="checkbox" value="保險" name="offer[]" <?php echo $checked[2] ?>> 保險 
						<input type="checkbox" value="紀念品" name="offer[]" <?php echo $checked[3] ?>> 紀念品
						<br>其他: <input type="text" class="form-control" name="other" maxlength="10" value="<?php echo $row['otherOffer'] ?>"/>
				</div>
				<div>
					<br><label><b>給予時數(小時):</b></label>&nbsp;
					<input type="text" class="form-control" name="hour" size="1" value="<?php echo $row['hour'] ?>" required onkeyup="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}" onafterpaste="if(this.value.length==1){this.value=this.value.replace(/[^1-9]/g,'')}else{this.value=this.value.replace(/\D/g,'')}"/>
				</div>				
				<div>
					<h3>活動地址:</h3><br>				
									
					<input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>" style="width:300px" maxlength="25" required /></br></br>
					</div>
					<h3>活動內容:</h3><br>		
				<div align="center">	
					<textarea id="editor1" name="description" style="width:750px;height:450px;">
						<?php echo $row['description'] ?>
					</textarea></br></br>
				</div>
				<center><input type="submit" value="更新活動!" name="b1"></center>			
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