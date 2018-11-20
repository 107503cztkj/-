<?php
session_start();
include("db-contact.php"); 
include("timeout.php"); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>|益尋愛|</title>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap2.css" rel="stylesheet" type="text/css" media="all">
<link href="css/Event.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Skills Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="js/jquery-1.11.1.min.js"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
</script>
<!---End-smoth-scrolling---->

<!----icon back---->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


 
</head>
<body>
		<!--start-header-section-->
			<div class="header-section">
			
				<div class="continer">
					<div class="back" style="position:absolute;" >
						<label>
							<img style="margin-top:0px; margin-left:10px;" 
							 src="img/eventback.png" title="回到上一頁">

							<input style="margin-left:-30px; opacity: 0;" 
							type="button" class="backbt" value="返回" onclick="javascript:history.go(-1)" />
						</label>
					</div>
					
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

					<img src="upload/<?php echo $row['eventPic']?>" width="200" height="200">
					<h1><?php echo $row['eventName']?></h1>
					<a href="#contact" class="scroll top"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
				</div>
			</div>
		<!--end header-section-->
			<!--start-study-section-->
			<div class="study-section">
				<div class="container">
				
					<div class="study-grids">
						<div class="col-md-6 study-grid">
						<div class="study1">
							<p><img src="images/startdate.png">&nbsp活動開始日期:   <?php echo $row['startDate']?></p>
							<p><img src="images/overdate.png">&nbsp活動結束日期:   <?php echo $row['endDate']?></p>
							<p><img src="images/stopdate.png">&nbsp報名截止日期:  <?php echo $row['DeadlineDate']?></p>
                            <p>服務時數: <?php echo $row['hour']."小時" ?></br>
                            <p><img src="images/address.png">&nbsp地點:</br><?php echo $row['address']?></p>
                            </br>
                            <p>徵求人數: <?php echo $row['need']?> 人</p>
                            <p>已報名人數: <?php echo $count ?> 人</p>
						</div>
						</div>
						<div class="col-md-6 study-grid">
						<p style="font-size:30px">舉辦組織:</br>  <a href="OrganizationFile.php?e=<?php echo $row3['comID'] ?>"><?php echo $row3['comName'] ?></a></p>
						<div class="study2">
						<img src="cus-comImg/<?php echo $row3['comPic']?>" width="200" height="200">
						</div>
					</div>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--end study-section-->
			<!--start-services-section-->
			
					<!--end services-section-->
					<!--start-social-section-->
				<div class="social-icons">
				<center><p style="font-size:36px;">提供福利</p></center>
				<center><p>(紅字表示有提供)</p></center>
                </br>
			<div class="container">
					<?php
						if(preg_match("/便當/i", $row["offer"])){
						 $color[0] = "color:red";
						}else{
							$color[0] = "";
						}	
						if(preg_match("/礦泉水/i", $row["offer"])){
						 $color[1] = "color:red";
						}else{
							$color[1] = "";
						}
						if(preg_match("/保險/i", $row["offer"])){
						 $color[2] = "color:red";
						}else{
							$color[2] = "";
						}
						if(preg_match("/紀念品/i", $row["offer"])){
						 $color[3] = "color:red";
						}else{
							$color[3] = "";
						}
							
					?>
						<div class="col-md-3 face">
					<p style="<?php echo $color[0]?>"><img src="images/dish.png">供餐</p>
							</div>
								<div class="col-md-3 face">
						<p style="<?php echo $color[1]?>"><img src="images/water.png">礦泉水</p>
						</div>
							<div class="col-md-3 face">
						<p style="<?php echo $color[2]?>"><img src="images/shield.png">保險</p>
						</div>
						<div class="col-md-3 face">
						<p style="<?php echo $color[3]?>"><img src="images/heart-box.png">紀念品</p>
						</div>
		
						<div class="clearfix"> </div>
							</div>
							</div>
							<!--end-social-section-->
							<!--start-contact-section-->
						<div class="contact-section" id="contact">
				<center><div class="container">
					<p style="font-size:46px;">-活動內容-</p>
                    </br></br><?php echo $row['description']?>
					</br></br></br>
					<?php
					if($_GET['s']=="full"){
						$status="已額滿";
						$style="full";
					}else if($_GET['s']=="over"){
						$status="報名截止";
						$style="over";
					?>
					</br><center><a class="<?php echo $style ?>"><?php echo $status ?></a></center>	
					<?
					}else if($_GET['s']=="join"){
						$status="我要報名";
						$style="join";
					?>
					<center><div id="btn"><input type="button" value="我要報名" onclick="confirmChoice()"></center>					
					<?php
					}
					?>
					
			</div>	
            </center>	 
		</div>
	</div>

	<!---google map--->
	<iframe width='100%' height='550' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' 
	src="https://maps.google.com.tw/maps?f=q&hl=zh-TW&geocode=&z=16&output=embed&t=&q=<?php echo $row['address']?>">
	</iframe>
	
	<!-- Bottom Footer Area Start -->
	<div class="footer_bottom_area">
		<div class="container">
			<div class="row">

				<div class="footer_bottom wow fadeInDown">
					<p>Copyright © 2018 益尋愛 怡仁愛心基金會</p>
				</div>
				<!-- Bottom Footer Copywrite Text Area End -->
				
			</div>
			<!-- end./ row -->
		</div>
		<!-- end./ container -->
	</div>
	<!-- Bottom Footer Area End -->
</footer>
<!-- ===================== Footer Area End ===================== -->
			

	<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=AIzaSyDuyM09lyMesD69uuBCES3oUEoQC0QyHXM" type="text/javascript"></script>
    <script src="js/googlemap.js"></script>
	<script>
		function confirmChoice(){
			if (confirm ("嗨!確定報名此活動嗎?")){　
				document.location.href="signUp.php?e=<?php echo $row['eventID']?>"　 
			}else{　
				
			}
		}
	</script>

</body>
</html> 