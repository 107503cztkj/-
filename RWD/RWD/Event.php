<?php
include("db-contact.php"); 
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>|益尋愛|</title>
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap2.css" rel="stylesheet" type="text/css" media="all">
<link href="css/Event.css" rel="stylesheet" type="text/css" media="all" />
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
 
</head>
<body>
		<!--start-header-section-->
			<div class="header-section">
				<div class="continer">
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
						<p style="font-size:30px">舉辦組織:  <a href="OrganizationFile.php?e=<?php echo $row3['comID'] ?>"><?php echo $row3['comName'] ?></a></p>
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
                </br>
			<div class="container">
					<?php
						if(preg_match("/供餐/i", $row["offer"])){
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
						<div class="col-md-3 face">
						<p><img src="images/heart-box.png">其他</p><?php echo $row['otherOffer'] ?>
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
					</br>
					<center><div id="btn"><a href="signUp.php?e=<?php echo $row['eventID']?>" class="button" onclick=alert("嗨!確定報名此活動嗎?")><img src="images/joinbutton.png"></a></div></center>
				
			</div>	
            </center>	 
		</div>
	</div>

	<!---google map--->
	<body onload="initialize()" onunload="GUnload()">
		<form action="#" onsubmit="showAddress(this.address.value); return false">
			<center><input type="text" size="60" name="address" value="<?php echo $row['address']?>" />
			<input type="submit" value="Go!" /></center>
			<div id="map_canvas" style="width: 100%; height: 550px"></div>     
		</form>
  	</body>	

	<!--end-contact-section-->
			<!--start-map-section-->
			<div class="google-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114829.39166857985!2d-80.19154352520549!3d25.92148032545394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b2eec0a4b145%3A0x6fb7ea318103f481!2sCollins+Ave%2C+Sunny+Isles+Beach%2C+FL+33160%2C+USA!5e0!3m2!1sen!2sin!4v1436081255308"></iframe>
			</div>
			<!--end-map-section-->
			<!--start-footer-section-->
			<div class="footer-section">
						<div class="container">
							<div class="footer-top">
						 <div class="footer">
    <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
  </div> 
									</div>
	<script type="text/javascript">
	$(document).ready(function() {
		/*
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		*/
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
			</div>
	<!--end-footer-section-->

	<script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=AIzaSyDuyM09lyMesD69uuBCES3oUEoQC0QyHXM" type="text/javascript"></script>
    <script src="js/googlemap.js"></script>

</body>
</html> 