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

<link href="css/Check.css" rel="stylesheet" type="text/css" />
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
            
	<div class="content">
	<center><h1 class="title"><font>│機構審核清單│</font></h1>
		<table style="border:3px #cccccc solid;" cellpadding="10" border='1'>
		<thead>
			<tr class="info" style="color:#666">
				<th width="40">#</th>
				<th width="400">機構名稱</th>
				<th width="150">負責人</th>
				<th width="200">聯絡方式</th>
				<th width="100">申請日期</th>
				<th width="100">審核狀態</th>
			</tr>
		</thead>
		<?php
			$sql="select * from applylist Order by add_time desc";
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
		<?php
			for($i=1;$i<=mysql_num_rows($data);$i++){
			$row=mysql_fetch_array($data);
			
			if($row['checkStatus']==0){
				$checkStatus="未審核";
			}else if($row['checkStatus']==1){
				$checkStatus="已通過";
			}else if($row['checkStatus']==2){
				$checkStatus="資格不符";
			}
			
		?>
		<tbody>
			<tr>
			    <td><?php echo $i ?></td>
				<td><a href="CheckFile.php?f=<?php echo $row['applyID']?>"><?php echo $row['comName'] ?><a></td>
				<td><?php echo $row['applicant'] ?></td>
				<td><?php echo $row['comPhone'] ?></td>
				<td><?php echo  date('Y-m-d',strtotime($row['add_time']))?></td>
				<td><?php echo $checkStatus ?></td>
			</tr>
		</tbody>
		<?php
		}
		?>		
		</table></center>
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
</div> 
	<!------------------------------------------------>
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
