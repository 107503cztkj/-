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

<link href="css/AddExperience.css" rel="stylesheet" type="text/css" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
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

<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
			<div id="wide-content">
				<center><h1 style="color:#e2beee">《 心得編輯 》</h1></center>
				<form method="POST" action="UpdateExperience.php" enctype="multipart/form-data">
					<?php
					$sql="select * from experiences where expID=".$_GET['e'];
					$data = mysql_query($sql) or die(mysql_error());
					$row = mysql_fetch_array($data);
					$eventID=$row['eventID'];

					$sql2="select * from event where eventID='$eventID'";
					$data2=mysql_query($sql2) or die(mysql_error());
					$row2=mysql_fetch_array($data2); 
					?>
					<div>
						<input type="hidden"  name="cusID"  value="<?php echo $row['cusID']?>">
						<input type="hidden"  name="id"  value="<?php echo $_GET['e']?>">
						 暱稱：<input type="text" name="cusNickname" value=" <?php echo $row['cusNickname']?>" required /><br><br />
				
						 標題：<input type="text" name="title" value=" <?php echo $row['title']?>" required="required"></br></br>
						 參與活動名稱: <input type="text" readonly value=" <?php echo $row2['eventName']?>" required="required"></br></br>							
					<form>
						活動照片：
						<input type="hidden"  name="expPic" value="<?php echo $row['expPic']?>">
						<img src="upload/<?php echo $row['expPic'] ?>" width="40%"></br></br>
						重新選擇活動照片：
						<input type='file' class="upl" name="pic" accept="image/*">
						<div>
							<img class="preview" style="max-width: 200px; max-height: 200px;">
							<div class="size"></div>
						</div>
					</form>
					   <p>心得內容:</p>
					   <div align="center">	
							<textarea id="editor1" name="content" style="width:600px;height:450px;">
								<?php echo $row['content'] ?>
							</textarea><br>
						</div>
						</br></br>
							
					<center><input type="submit" value="修改心得!" name="b1"></center>
					</div>
				</form>
				                   
                        
            </div>
        </div>
    </div>
</div>
      
            
<!------------------------------------------------>            
 <div class="totop">
        <a href="#">
            <img src="images/totop.png" id="btn">
        </a>
    </div>
<!------------------------------------------------>
    <div class="footer">
        <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
    </div> 		
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
	<script src="ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'editor1' );</script>
    <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
	
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>
    
    <script src="js/scripts.js"></script>   
    <script src="js/myDropdownMenu.js"></script> 
	<script src="js/preview.js"></script>
	
       
</body>
</html>

