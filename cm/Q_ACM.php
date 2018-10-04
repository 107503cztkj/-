<?php
session_start();
include("db-contact.php");
//include("timeout.php");
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

<link href="css/Q_A.css" rel="stylesheet" type="text/css" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

</head>
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
						<li><a href="EventCM.php.php">活動列表</a></li>
						<li><a href="ExperienceCM.php">心得列表</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="hold.php">關於益尋愛</a>
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


        <div id="wrapper">
            <div id="page-wrapper">
                <div id="page">
                    <div id="wide-content">
	
                       <h2><b><font color="#ff7070" >益尋愛 Q&A </font></b></h2>
   				       	 <a class="button" id="btn">新增問答</a>
                         <?php
							$sql="select * from q_a";
							$data=mysql_query($sql) or die(mysql_error());
							?>
							<?php 
								$data_nums = mysql_num_rows($data); //統計總比數
								$per = 10; //每頁顯示項目數量
								$pages = ceil($data_nums/$per); //取得不小於值的下一個整數
								if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
									$page=1; //則在此設定起始頁數
								} else {
									$page = intval($_GET["page"]); //確認頁數只能夠是數值資料
								}
								$start = ($page-1)*$per; //每一頁開始的資料序號
								$data = mysql_query($sql.' LIMIT '.$start.', '.$per) or die("Error");
								for($i=1;$i<=mysql_num_rows($data);$i++){
								$row=mysql_fetch_array($data);
							?>
                            <br />
                            <strong><font size="+1" color="#FF9999" class="edit"><?php echo $i.".".$row['title'] ?></strong></font>
                            <a class="button1" href="#">修改</a>
                            <br/>
                            <h4 class="editgrow"><?php echo $row['content'] ?></h4>
                            <?php
							}
							?>
                         <!-- add new item Dynamically in the show block -->
						  <div id="showBlock"></div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="totop">
             <img src="images/totop.png" id="btn" title="回到頂部">
    </div>


    <div class="footer">
        <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
    </div> 	



    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>
    <script src="js/myDropdownMenu.js"></script> 
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script>
	  //set the default value
	  var txtId = 1;
	  
	  //add input block in showBlock
	  $("#btn").click(function () {
		  $("#showBlock").append('<div id="div' + txtId + '">Input:<input type="text" name="test[]" /> <input type="button" value="del" onclick="deltxt('+txtId+')"></div>');
		  txtId++;
		  $("#showBlock").append('<div id="div' + txtId + '">file:<input type="file" name="file[]" /> <input type="button" value="add" onclick="deltxt('+txtId+')"></div>');
		  txtId++;
	  });
	  //remove div
	  function deltxt(id) {
		  $("#div"+id).remove();
	  }
	</script>
	<script type="text/javascript" src="js/jquery.jeditable.js"></script>
	<script>
	$(function(){ 
	   $('.edit').editable('UpdateDownload.php', { 
		 width   :400, 
		 height  :25, 
		 tooltip  : '點擊已進行編輯...' 
		 
		})
		}); 
	</script>
	<script>
	$(function(){ 
	   $('.editgrow').editable('UpdateDownload.php', { 
	     type: "autogrow",
		 width   :600, 
		 height  :100, 
		 tooltip  : '點擊已進行編輯...' 
		 
		})
		}); 
	</script>

</body>
</html>
