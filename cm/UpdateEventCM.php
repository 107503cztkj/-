<?php

error_reporting(0);

header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");

$cusNickname=$_POST["cusNickname"];
$title=$_POST["title"];
$content=$_POST["content"];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$name=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];
$sizemb=round($size/1024000,2);

if($_GET['e'] !==null){
	$id = $_GET['e'];
	$sql="select * from event where eventID = '$id'";
	$data=mysql_query($sql) or die(mysql_error());
	for($i=1;$i<=mysql_num_rows($data);$i++){
		$row=mysql_fetch_array($data);
		$dir='../upload/';
		$pic=$row['eventPic'];
		$url=$dir.$pic;
	}	
	$sql="delete from event where eventID = '$id'";
	if(mysql_query($sql)){
		if($pic!=="eventPic.png"){
			unlink($url);
		}	
		echo "活動刪除成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=EventCM.php>';
	}else{
		echo "活動刪除失敗,請返回上一頁重新刪除...";	
	}
}else if($_REQUEST['deleteall']){
	
	$check=$_POST['IDrow'];
	if($check !== null){
		foreach($check as $value){
			$sql="select * from event where eventID = '$value'";
			$data=mysql_query($sql) or die(mysql_error());
			for($i=1;$i<=mysql_num_rows($data);$i++){
				$row=mysql_fetch_array($data);
				$dir='../upload/';
				$pic=$row['eventPic'];
				$url=$dir.$pic;
				if($pic!=="eventPic.png"){
					unlink($url);
				}
			}
			
			$sqlStr="delete from event where eventID = '$value'";			
			mysql_query($sqlStr) or die("心得刪除失敗,請返回上一頁重新刪除...");
		}		
			echo "所選活動刪除成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=EventCM.php>';
	}else{
		echo "未選取活動!";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}else{
	$id = $_POST['id'];
	$eventName=$_POST["eventName"];
	$eventType=$_POST["eventType"];
	$startDate=$_POST["startDate"];
	$endDate=$_POST["endDate"];
	$DeadlineDate=$_POST["DeadlineDate"];
	$need=$_POST["need"];
	$offer=$_POST["offer"];	
	$allOffer = implode (",", $offer);
	$other=$_POST["other"];
	$hour=$_POST["hour"];
	$address=$_POST["address"];
	$description=$_POST["description"];
	$dir='../upload/';
	
	$size=$_FILES['pic']['size'];
	$name=$_FILES['pic']['name'];
	$tmp_name=$_FILES['pic']['tmp_name'];
	$sizemb=round($size/1024000,2);
	
	if($sizemb < 2 && $sizemb < 2){
		if($name == null){
			$pic=$_POST['eventPic'];
		}else{
			$pic=explode(".",$name);
			$pic="eventPic"."-".date(ymd)."-".rand(0,10).".".$pic[1];
			move_uploaded_file($tmp_name,"../upload/".$pic); 
			if($_POST['eventPic']!=="eventPic-01.jpg" && $_POST['eventPic']!=="eventPic-02.jpg" && $_POST['eventPic']!=="eventPic-03.jpg"
			   && $_POST['eventPic']!=="eventPic-04.jpg" && $_POST['eventPic']!=="eventPic-05.jpg" && $_POST['eventPic']!=="eventPic-06.jpg"){
				unlink($dir.$_POST['eventPic']);
			}	
		}
		  $sqlStr="update event set eventName='$eventName',type='$eventType',startDate='$startDate',endDate='$endDate',
					DeadlineDate='$DeadlineDate',need='$need',offer='$allOffer',otherOffer='$other',hour='$hour',
					address='$address',description='$description',eventPic='$pic' where eventID='$id'";
		  

		  mysql_query($sqlStr) or die("活動更新失敗! 請重新編輯...");
		
		  echo "活動更新成功! </br>頁面跳轉中...";
		  echo '<meta http-equiv=REFRESH CONTENT=2;url=EventCM.php>';
		  
	}else{
		  echo "照片檔案太大，請重新選擇";
		  echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
	}
}
	



?>
