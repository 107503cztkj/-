<?php
session_start();
include("db-contact.php");
include("function.php");
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>|益尋愛|</title>
<link href="css/Search(simple7).css" rel="stylesheet" type="text/css" />
<link href="css/ExperienceCM.css" rel="stylesheet" type="text/css" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"> 
function check_all(obj,cName) 
{ 
    var checkboxs = document.getElementsByName(cName); 
    for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;} 
} 
</script> 
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
								<a href="DownloadlistCM.php"><li>下載專區</li></a>
								<a href="BSthingCM.php"><li>桃園大小事</li></a>
								<a href="NewNewsCM.php"><li>最新消息</li></a>
						  </ul>
						</li>
						<li><a href="EventCM.php">活動列表</a></li>
						<li><a href="ExperienceCM.php">心得列表</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="About.php">關於益尋愛</a>
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
                
	<!------------------------------------------------>
	<!--定義列表--------------------------------------->
	<!------------------------------------------------>
            
	<div class="content">
	<center><h1 class="title"><font color="#a5bef3">│心得列表│</font></h1>
		<form name="form1" method="get" class="example" action="">
			<input type="text" placeholder="搜尋心得.." name="key" >
			<a href="#" onClick="document.form1.submit();"><button type="submit" ><i class="fa fa-search" style="color:#666063;"></i></button></a>
		</form>
		<?php
			if($_GET["key"]<>""){
			  $key=str_replace(" ","%",trim(addslashes($_GET["key"])));
			 
			 }
		?>

		<?php
		$sql="select * from experiences where (title like '%$key%') Order by add_time desc";
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
		?>
		<form action="UpdateExperienceCM.php"  method="post">	
			<table style="border:3px #cccccc solid;" cellpadding="10" border='1'>
			<thead>
				<tr class="info" style="color:#666">
					<th width="80"><input type="checkbox" name="all" onclick="check_all(this,'IDrow[]')" />全選</th>
					<th width="45">#</th>
					<th width="500">標題</th>
					<th width="200">發布者</th>
					<th width="200">日期</th>
					<th width="60"></th>
			</thead>
			<?php
				for($i=1;$i<=mysql_num_rows($data);$i++){
				$row=mysql_fetch_array($data);
			?>

			<tbody>
				<tr>
					<td><?php echo "<input type=\"checkbox\" name=\"IDrow[]\" value=\"$row[expID]\"/>";?></td>
					<td><?php echo $i ?></td>
					<td><a href="Experience2CM.php?e=<?php echo $row['expID']?>"><?php echo $row['title']?></a></td>
					<td><?php echo $row['cusNickname']?></td>
					<td><?php echo date('Y-m-d',strtotime($row['add_time']))?></td>
					<td><a class="button3" style="text-decoration:none;" href="UpdateExperienceCM.php?e=<?php echo $row['expID']?>">刪除</a></td>
				</tr>
			</tbody>
			<?php
			}
			?>			   
			</table></center>
		
			<div class="DELETE">
			<a class="deletedata" style="text-decoration:none;"><input type="submit" name="deleteall" id="button1"  value="刪除選取檔案" /></a>
			</div>
		</form>
    </div>
	<div class="number">			
				<?php
					//分頁頁碼
					echo "<br /><a href=?page=1>首頁</a> ";
					for( $i=1 ; $i<=$pages ; $i++ ) {
						if ( $page-3 < $i && $i < $page+3 ) {
							echo "[<a href=?page=".$i.">".$i."</a>] ";
						}
					} 
					echo " <a href=?page=".$pages.">末頁</a><br /><br />";
				?>
	</div>
</div> 

	<!------------------------------------------------>
	<!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn">
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
