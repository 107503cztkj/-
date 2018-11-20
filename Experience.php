<?php
session_start();
include("db-contact.php");
include("timeout.php"); 
?>
<!DOCTYPE html>

<head>
	<title>|益尋愛|</title>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link href="css/Experiencebootstrap.css" rel='stylesheet' type='text/css' />
	
	<link href="Experience.css" rel='stylesheet' type='text/css' />
	<link href="css/Experiencefontawesome-all.css" rel="stylesheet">
	
</head>

<body>
	

<header class="header_area">
	<!-- Top Header Area Start -->
	<div class="top_header_area hidden-xs">
		<div class="container">
						<!--  Login Register Area -->
						<div class="login_register">
							
						</div>

						
					</div>
				</div>
			</div>
	
	<!-- Top Header Area  End -->

<div class="space"></div>
		<!--/blog-->
		<div class="container">
			<label>
				<img style="margin-top:0px; margin-left:10px;" 
					src="img/eventback.png" title="回到上一頁">

				<input style="margin-left:-30px; opacity: 0;" 
				type="button" class="backbt" value="返回" onclick="javascript:history.go(-1)" />
			</label>

			
		<?php
		$expID=$_GET['e'];
		$sql="select * from experiences where expID=$expID";
		$data = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($data);
		$eventID=$row['eventID'];
		$cusID1=$row['cusID'];
		$sql6="select * from customer where cusID=$cusID1";
		$data6 = mysql_query($sql6) or die(mysql_error());
		$row6 = mysql_fetch_array($data6);

		$sql2="select * from event where eventID='$eventID'";
		$data2=mysql_query($sql2) or die(mysql_error());
		$row2=mysql_fetch_array($data2); 
		$comID=$row2['comID'];
		
		$sql3="select * from company where comID='$comID'";
		$data3=mysql_query($sql3) or die(mysql_error());
		$row3=mysql_fetch_array($data3); 
		?>
		<div class="row inner-sec-wthree-agileits">
				<div class="col-lg-8 blog-sp">
					<article class="blog-x row">
						<div class="blog-img">
							
								<center><img src="upload/<?php echo $row['expPic']?>" alt="" class="img-fluid" /></center>
                                <!------------目前我沒限制圖片大小 所以會依原圖顯示，因為我試過 是覺得不管大圖小圖看起來都算合理，而且也不會跑版 所以還沒改-->
						</div>
						<div class="blog_info">
							<h5><?php echo $row['title'] ?></h5>
                           	<p><font size="1px">發布日期:<?php echo date('Y-m-d',strtotime($row['add_time']))?></font></p>

							<p><?php echo $row['content']?></p>

						</div>
						<div class="clearfix"></div>
					</article>
					<div class="comment-top">
						<h4>留言區</h4>
						<?php
							$sql4 = "SELECT * FROM message where expID=$expID order by add_time desc"; 
							$result4=mysql_query($sql4) or die(mysql_error());
							$data_nums = mysql_num_rows($result4); //統計總比數
							$per = 5; //每頁顯示項目數量
							$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
							if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
								$page=1; //則在此設定起始頁數
							} else {
								$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
							}
							$start = ($page-1)*$per; //每一頁開始的資料序號
							$result4 = mysql_query($sql4.' LIMIT '.$start.', '.$per) or die("Error");
						?>
						<?
							for($i=1;$i<=mysql_num_rows($result4);$i++){
							$row4=mysql_fetch_array($result4);
							$cusID=$row4['cusID'];
							
							$sql5 = "SELECT * FROM customer where cusID=$cusID"; 
							$result5=mysql_query($sql5) or die(mysql_error());
							$row5=mysql_fetch_array($result5);
						?>
                      <!----------留言開始----------->
						<div class="media">
							<img src="cus-comImg/<?=$row5['profilePic']?>" alt="" class="img-fluid" />
							<div class="media-body">
								<h5 class="mt-0"><?=$row4['cusNickname']?></h5>
                                <div class="timeword"><p><?=$row4['add_time']?></div>
								<p><?=$row4['content']?></p>
						
								
							</div>
						</div>
						<?
						
						}
						?>
					  <center>
					  <?php
						if(mysql_num_rows($result4)>0){
					  ?>
					   <!-----------------頁碼--------->
					  <ul class="pagination pagination-sm">
						<li><a href="?e=<?=$expID?>&page=1" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						<?php
						for( $i=1 ; $i<=$pages ; $i++ ) {
							if ( $page-3 < $i && $i < $page+3 ) {
						?>
						<li><a href="?e=<?=$expID?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
						<?php
							}
						}
						?>
						<li><a href="?e=<?=$expID?>&page=<?php echo $pages ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
					  </ul>
					   <!-----------------頁碼結束--------->
					   <?php
						}else{
							echo "有想要對作者說點甚麼嗎~快來留言吧^__^";
						}	
						?>
					  </center>
					   
					</div>
			  <!------------留言結束----------------->
                    <div class="comment-top">
						<h4>留言分享</h4>
						<div class="comment-bottom">
							<form action="writeToMessage.php" method="post" name = "myform" onsubmit="return CheckPost();">
								<input class="form-control" type="hidden" name="expID" value="<? echo $expID?>">
								<input class="form-control" type="hidden" name="cusID" value="<? echo $_SESSION['cusID']?>">
								<input class="form-control" type="text" name="cusNickname" placeholder="暱稱" required>
								
								<textarea name="content" placeholder="寫下您的回應吧！..." required></textarea>

								<input class="form-control" type="submit"  name="submit" value="送出">
							</form>
						</div>
                        </br>
					</div>
					
				</div>
                <!-------------------------------------->
                
                <!--------------個人介紹---------------->
                
				<aside class="col-lg-4 single-left">
					<div class="single-gd">
						<img src="cus-comImg/<?=$row6['profilePic']?>" class="img-fluid" alt="">
                       <center> <p>發布者:&nbsp <?php echo $row['cusNickname']?></p></center>
                         
						<center><a href="#" class="myButton">查看益寶</a></center>
					</div>
					<div class="single-gd">
                    <div class="interview">
					<p>活動名稱:<?php echo $row2['eventName']?></p>
                    <p>舉辦機構:<?php echo $row3['comName']?></p>
                    <p>活動日期:<?php echo $row2['startDate']?></p>
                     </div>
						<center><a href="OrganizationFile.php?e=<?=$comID?>" class="myButton">查看機構介紹</a></center>
					</div>
					


	



</body>
</html>


