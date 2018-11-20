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
		<?php
		$sql="select * from experiences where expID=".$_GET['e'];
		$data = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($data);
		$eventID=$row['eventID'];

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
							<a href="single.html">
								<img src="upload/<?php echo $row['expPic']?>" alt="" class="img-fluid" />
                                <!------------目前我沒限制圖片大小 所以會依原圖顯示，因為我試過 是覺得不管大圖小圖看起來都算合理，而且也不會跑版 所以還沒改-->
							</a>
						</div>
						<div class="blog_info">
							<h5><?php echo $row['title'] ?></h5>
                           	<p><font size="1px">發布日期:<?php echo date('Y-m-d',strtotime($row['add_time']))?></font></p>

							<p><?php echo $row['content']?></p>
							<ul class="blog_list">
								<li>
									<a href="#">
										<span class="fa fa-comment" aria-hidden="true"></span>
										3</a>
									<i>|</i>
								</li>
								<li>
									<a href="#">
										<span class="fa fa-heart" aria-hidden="true"></span>
										10</a>
									
								</li>
								
							</ul>

						</div>
						<div class="clearfix"></div>
					</article>
					<div class="comment-top">
						<h4>留言區</h4>
						<?
						$sql = "SELECT * FROM message order by add_time desc"; 
						$result=mysql_query($sql) or die(mysql_error());
						for($i=1;$i<=mysql_num_rows($result);$i++){
						$row=mysql_fetch_array($result);
						?>
                      <!----------留言開始----------->
						<div class="media">
							<img src="img/4.jpg" alt="" class="img-fluid" />
							<div class="media-body">
								<h5 class="mt-0"><?=$row['cusNickname']?></h5>
                                <div class="timeword"><p><?=$row['add_time']?></div>
								<p><?=$row['content']?></p>
						
								
							</div>
						</div>
						<?
						}
						?>
					  <center>
					  <ul class="pagination pagination-sm">
						<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
					  </ul>
					  </center>
					   
					</div>
			  <!------------留言結束----------------->
                    <div class="comment-top">
						<h4>留言分享</h4>
						<div class="comment-bottom">
							<form action="writeToMessage.php" method="post" name = "myform" onsubmit="return CheckPost();">
								<input class="form-control" type="hidden" name="expID" value="<? echo $_GET['e']?>">
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
						<img src="img/1.jpg" class="img-fluid" alt="">
                       <center> <p>發布者:&nbsp <?php echo $row['cusNickname']?></p></center>
                         
						<center><a href="#" class="myButton">查看益寶</a></center>
					</div>
					<div class="single-gd">
                    <div class="interview">
					<p>活動名稱:<?php echo $row2['eventName']?></p>
                    <p>舉辦機構:<?php echo $row3['comName']?></p>
                    <p>活動日期:<?php echo $row2['startDate']?></p>
                     </div>
						<center><a href="#" class="myButton">查看機構介紹</a></center>
					</div>
					


	



</body>
</html>


