<?php
session_start();
include("db-contact.php"); 
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

<link href="css/CheckFile.css" rel="stylesheet" type="text/css" />
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
        <div class="navbar" id="my-element" >
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
					<a class="dropdown-toggle" href="hold.php">關於益尋愛</a>
					<ul class="dropdown-menu">
						<a href="Q_ACM.php"><li>益尋愛Q&A </li></a>
					</ul>
				</li>
				<li class="dropdown">
					  <a class="dropdown-toggle" >益寶管理</a>
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
            <!--定義列表--------------------------------------->
            <!------------------------------------------------>

            <div id="wide-content">
            <div class="content">
			<div style="border-width:3px;border-style:dotted;border-color:#adadad;padding:20px;">
			<?php
				$sql="select * from applylist where applyID=".$_GET['f'];
				$data=mysql_query($sql) or die(mysql_error());
				$row = mysql_fetch_array($data);
				setcookie('applyID',$row['applyID']);
			?> 			
                <div class="photo"><img class="photo" src="../comApply/<?php echo $row['comPic'] ?>">
					<div class="link"><a href="<?php echo $row['comUrl'] ?>" target="_blank" class="button">前往機構</a></div>
                </div>
				<table>
                    <tr>
                        <td><h2><?php echo $row['comName'] ?></h2></td>
                    </tr>
                    <tr>
                        <td><strong>機構申請人: </strong><?php echo $row['applicant'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>連絡電話: </strong><?php echo $row['comPhone'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>服務信箱: </strong><?php echo $row['comEmail'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>聯絡地址: </strong><?php echo $row['comAddress'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="Introduce"><h2>機構介紹:</h2></br>
                            <?php echo $row['comIntro'] ?>
                        </td>
                    </tr>
                </table>
                
                <div class="bbtn">
                    <a href="writeToCheck.php?f=y" onClick="var reply = confirm('確定通過?')" class="button btn1">審核通過</a>
                    <a href="writeToCheck.php?f=n"  class="button btn3">不通過</a>
                    <a href="Check.php?"  class="button btn2">返回列表</a>
                </div>
            </div>    
        </div>
    </div>
	</div>
        
	<!------------------------------------------------>
    <div class="totop">
            <img src="images/totop.png" id="btn" title="回到頂部">
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
