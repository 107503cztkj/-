<?php
session_start();
error_reporting(0);
header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");

$email=$_SESSION['email'];
$eventName=$_POST["eventName"];
$eventType=$_POST["eventType"];
$startDate=$_POST["startDate"];
$endDate=$_POST["endDate"];
$DeadlineDate=$_POST["DeadlineDate"];
$need=$_POST["need"];
$offer=$_POST["offer"];	
$other=$_POST["other"];
$hour=$_POST["hour"];
$zipcode=$_POST["zipcode"];
$city=$_POST["city"];
$town=$_POST["town"];
$address=$_POST["address"];
$description=$_POST["description"];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$name=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];
$sizemb=round($size/1024000,2);

$allAddress=$zipcode.$city.$town.$address;
$allOffer = implode (",", $offer);
if($allOffer !==null && $other !==null){
	$allOffer = $allOffer . ",";
}
$sql="select * from customer where email='$email'";
$data = mysql_query($sql) or die('MySQL query error');
$row = mysql_fetch_array($data);
$cusID=$row['cusID'];
$sql2="select * from company where cusID='$cusID'";
$data2 = mysql_query($sql2) or die('MySQL query error');
$row2 = mysql_fetch_array($data2);
$comID=$row2['comID'];


if(strtotime($startDate)>strtotime($endDate)){ 
	echo "活動開始日期晚於活動結束日期!"; 
	echo '<br><br><input type ="button" onclick="history.back()" value="回到上一頁編輯"></input>';
	
}else if(strtotime($DeadlineDate)>strtotime($endDate)){ 
	echo "報名結束日期晚於活動結束日期!"; 
	echo '<br><br><input type ="button" onclick="history.back()" value="回到上一頁編輯"></input>';	
	
}else if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
	if($sizemb < 3){
		$file=explode(".",$name);
		$new_name="eventPic"."-".date(ymdhis)."-".rand(0,50).".".$file[1];
		move_uploaded_file($tmp_name,"upload/".$new_name);
		$sqlStr="insert into event (comID,eventName,type,startDate,endDate,DeadlineDate,need,address,offer,otherOffer,hour,description,eventPic)

		values('$comID','$eventName','$eventType','$startDate','$endDate','$DeadlineDate','$need','$allAddress','$allOffer','$other', '$hour', '$description','$new_name')";
		//echo $sqlStr."<br>";
		mysql_query($sqlStr) or die("活動新增失敗,請返回上一頁重新新增...");
		echo "活動新增成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=EventNews(a).php>';
	}else{
		 echo "照片檔案太大，請重新選擇";
		 echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
	} 	
}else if($type!=="image/jpeg" || $type!=="image/png" || $type!=="image/gif"){
	if($eventType=="社區服務"){
		$new_name="eventPic-01.jpg";
	}else if($eventType=="環境人文"){
		$new_name="eventPic-02.jpg";
	}else if($eventType=="文化面相"){
		$new_name="eventPic-03.jpg";
	}else if($eventType=="科技面向"){
		$new_name="eventPic-04.jpg";
	}else if($eventType=="健康促進"){
		$new_name="eventPic-05.jpg";
	}else if($eventType=="教育助學"){
		$new_name="eventPic-06.jpg";
	}
	$sqlStr="insert into event (comID,eventName,type,startDate,endDate,DeadlineDate,need,address,offer,otherOffer,description,eventPic)

		values('$comID','$eventName','$eventType','$startDate','$endDate','$DeadlineDate','$need','$allAddress','$allOffer','$other','$description','$new_name')";
	//echo $sqlStr."<br>";
	mysql_query($sqlStr) or die("活動新增失敗,請返回上一頁重新新增...");

	echo "活動新增成功!頁面跳轉中...";
	echo '<meta http-equiv=REFRESH CONTENT=2;url=EventNews(a).php>';
		
}





?>