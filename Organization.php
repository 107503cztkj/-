<?php
include("db-contact.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/Organization.css" rel="stylesheet" type="text/css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/Search(simple).css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <!--定義列表--------------------------------------->
            <!------------------------------------------------>
			<div class="love">

				<form name="form1" method="get"  class="example" action="" style="margin:auto;max-width:400px">
					<input type="text" placeholder="搜尋機構" name="key">
					<a href="#" onClick="document.form1.submit();"><button type="submit"><i class="fa fa-search"></i></button></a>
				</form>
				
			</div> 
			
            <!-- The form -->
			<div class ="content">
				<?php
				if($_GET["key"]<>""){
				  $key=str_replace(" ","%",trim(addslashes($_GET["key"])));
				 
				 }
				?>	
				
			<!------------------------------------------------>
			<!--定義列表--------------------------------------->
			<!------------------------------------------------>	
			
				<?php
					$sql="select * from company where (comname like '%$key%')";
					$data=mysql_query($sql) or die(mysql_error());
				?>
				<?php 
					$data_nums = mysql_num_rows($data); //統計總比數
					$per = 6; //每頁顯示項目數量
					$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
					if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
						$page=1; //則在此設定起始頁數
					} else {
						$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
					}
					$start = ($page-1)*$per; //每一頁開始的資料序號
					$data = mysql_query($sql.' LIMIT '.$start.', '.$per) or die("Error");
				?>
						
				<?php
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
				?>
				<div class="item" >
					<div class="photo"><img class="photo" src="cus-comImg/<?php echo $row['comPic'] ?>"></div>
					<table>
						 <tr>
						<td colspan="2"><font size="+1"> <center><strong><a href="OrganizationFile.php?e=<?php echo $row['comID']?> "><?php echo $row['comName']?></a></strong></center></font></td>
						 </tr>
					</table>
					
				</div>
				
				<?php
				}
					//分頁頁碼
					//echo "<br /><a href=?page=1>首頁</a> ";
					//for( $i=1 ; $i<=$pages ; $i++ ) {
						//if ( $page-3 < $i && $i < $page+3 ) {
						//	echo "[<a href=?page=".$i.">".$i."</a>] ";
						//}
					//} 
					//echo " <a href=?page=".$pages.">末頁</a><br /><br />";
				?>	
			</div>
	</div>
</div>
<!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn" title="回到頂部">
    </div>
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
    
    <script src="js/scripts.js"></script>   
    <script src="js/myDropdownMenu.js"></script> 
           
           
</body>
</html>
