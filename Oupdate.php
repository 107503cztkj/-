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

<link href="css/Oupdate.css" rel="stylesheet" type="text/css" />
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
						  <a class="dropdown-toggle" href="UserFile.php">益寶小檔案</a>
						  	
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
					$email=$_SESSION['email'];
					$sql = "SELECT * FROM customer where email= '$email' ";
					$data = mysql_query($sql) or die(mysql_error());
					$row = mysql_fetch_array($data);
					$cusID=$row['cusID'];
					
					$sql2 = "SELECT * FROM company where cusID= '$cusID' ";
					$data2 = mysql_query($sql2) or die(mysql_error());
					$row2 = mysql_fetch_array($data2);
					
			?>		
			<div>
				<form action="oUpdate_finish.php"  method="post" enctype="multipart/form-data">
					<input type="hidden"  name="comPic" value="<?php echo $row2['comPic']?>">
					<div class="photo">
						<img class="photo" src="cus-comImg/<?php echo $row2['comPic'] ?>">
					</div>
                    <table>
                        <tr>
                            <td><h2>機構名稱:&nbsp;<?php echo "<input type=\"text\" name=\"comName\" value=\"$row2[comName]\" style=\"width:200px\"/ maxlength=\"20\">";?></h2></td>
                        </tr>
                        <tr>
                            <td><strong><strong>連絡電話:</strong>&nbsp;<?php echo "<input type=\"text\" name=\"phone\" value=\"$row2[phone]\" id=\"mobile\" pattern='\d{2}[\-]\d{8}' style=\"width:120px\"/  required>";?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>服務信箱:</strong>&nbsp; <?php echo "<input type=\"email\" name=\"comMail\" value=\"$row2[comMail]\" id=\"email\"  style=\"width:230px\"/  required>";?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>聯絡地址:</strong>&nbsp;<?php echo "<input type=\"text\" name=\"address\" value=\"$row2[address]\" style=\"width:230px\" required/>";?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>機構網址:</strong>&nbsp;<?php echo "<input type=\"url\" name=\"url\" value=\"$row2[url]\"  style=\"width:330px\" />";?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="Introduce"><h2>機構介紹:</h2>
                                <?php echo "<textarea name=\"comIntro\" cols=\"45\" rows=\"5\">$row2[comIntro]</textarea>" ?>
                                </br></br>
                            </td>
                        </tr>
						<input type="hidden" name="comID" value="<?php echo $row2['comID']?>" >
                    </table>
                    <label><img src="images/thumbnail.png" /><input type="file" name="file" class="photobt"></label></br>
					<div class="save"><input type="submit" class="submit" value="儲存"></div>
				</form>	
            </div>
		</div>    
	</div>
	</div>
    

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
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>  
    <script src="js/myDropdownMenu.js"></script> 
           
           
</body>
</html>
