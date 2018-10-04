<?php
include("db-contact.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>|益尋愛|</title>

<link href="css/OrganizationFile.css" rel="stylesheet" type="text/css" />
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
			$sql="select * from company where comID=".$_GET['e'];
			$data = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($data);
			?>			
		
					<div class="photo"><img class="photo" src="cus-comImg/<?php echo $row['comPic'] ?>"></div>
                    <table>
                        <tr>
                            <td><h2>機構名稱:</h2><?php echo $row['comName']?></td>
                        </tr>
                        <tr>
                            <td><font size="-1"><strong>服務信箱:</strong></font><?php echo $row['comMail']?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><font size="-1"><strong>聯絡地址:</strong></font><?php echo $row['address']?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><font size="-1"><strong>連絡電話:</strong></font><?php echo $row['phone']?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="Introduce"><h2>機構介紹:</h2></br>
                                <?php echo $row['comIntro']?></br></br>
                            </td>
                        </tr>
                    </table>
                    <div class="link"><a href="https://www.facebook.com/yijen02488772/" target="_blank" class="button">前往機構</a></div>
                
                        <div class="list">   
                           <h2>即將舉辦的活動</h2>   
                           <ul>   
                             <li><a href="#">活動1</a></li>   
                             <li><a href="#">活動2</a></li>   
                             <li><a href="#">活動3</a></li>      
                           </ul>   
                         </div> 
                         
                         <div class="list2">   
                           <h2>曾經舉辦的活動</h2>   
                           <ul>   
                             <li><a href="#">活動1</a></li>   
                             <li><a href="#">活動2</a></li>     
                           </ul>   
                         </div> 
				</div>
            </div>    
        

    
    
    <!--~~~~~~~~~~~~~~~~~~~~~~--> 
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
