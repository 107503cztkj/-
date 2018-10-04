<?php
error_reporting(0);
header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");

$applicant=$_POST["eventName"];
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

$allAddress=$zipcode.$city.$town.$address;
$allOffer = implode (",", $offer);
if($allOffer !==null && $other !==null){
	$allOffer = $allOffer . ",";
}

mysql_query("SET NAMES utf8");
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
		$sqlStr="insert into event (eventName,type,startDate,endDate,DeadlineDate,need,address,offer,otherOffer,hour,description,eventPic)

		values('$eventName','$eventType','$startDate','$endDate','$DeadlineDate','$need','$allAddress','$allOffer','$other', '$hour', '$description','$new_name')";
		//echo $sqlStr."<br>";
		mysql_query($sqlStr) or die("活動新增失敗,請返回上一頁重新新增...");

		echo "活動新增成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=EventNews(afterlogin).php>';
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
	$sqlStr="insert into event (eventName,type,startDate,endDate,DeadlineDate,need,address,offer,otherOffer,description,eventPic)

		values('$eventName','$eventType','$startDate','$endDate','$DeadlineDate','$need','$allAddress','$allOffer','$other','$description','$new_name')";
	//echo $sqlStr."<br>";
	mysql_query($sqlStr) or die("活動新增失敗,請返回上一頁重新新增...");

	echo "活動新增成功!頁面跳轉中...";
	echo '<meta http-equiv=REFRESH CONTENT=2;url=EventNews(afterlogin).php>';
		
}





?>