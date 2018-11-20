<?php

error_reporting(0);

header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");

$cusID=$_POST["cusID"];
$cusNickname=$_POST["cusNickname"];
$title=$_POST["title"];
$eventID=$_POST["eventID"];
$content=$_POST["content"];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$name=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];
$sizemb=round($size/1024000,2);

$sqlCheck = "SELECT `eventID`,`cusID` FROM experiences WHERE `eventID`='$eventID' AND `cusID`='$cusID'";
$resultCheck = mysql_query($sqlCheck);
$nums = mysql_fetch_array($resultCheck);

if($nums>0){
			echo"<script>alert('您已為此活動分享過心得囉!');history.go(-1);</script>";		
			
}else{
	if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
	  if($sizemb < 3){
		  $file=explode(".",$name);
		  $new_name="expPic"."-".date(ymdhis)."-".rand(0,10).".".$file[1];
		  move_uploaded_file($tmp_name,"upload/".$new_name);
		  
		  $sqlStr="insert into experiences (cusID,cusNickname, title, eventID, expPic, content) values('$cusID','$cusNickname','$title','$eventID','$new_name','$content')";

		  mysql_query($sqlStr) or die("心得分享失敗! 請重新新增...");
		  echo "心得分享成功!感謝您的分享~  </br>頁面跳轉中...";
		  echo '<meta http-equiv=REFRESH CONTENT=2;url=History.php>';
		  
	  }else{
		  echo "照片檔案太大，請重新選擇";
		  echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
	  }
	}else if($type!=="image/jpeg" || $type!=="image/png" || $type!=="image/gif"){
		  $new_name="expPic.png";
		  $sqlStr="insert into experiences (cusID,cusNickname, title, eventID, expPic, content) values('$cusID','$cusNickname','$title','$eventID','$new_name','$content')";

		  mysql_query($sqlStr) or die("心得分享失敗! 請重新新增...");

		  echo "心得分享成功!感謝您的分享~  </br>頁面跳轉中...";
		  echo '<meta http-equiv=REFRESH CONTENT=2;url=History.php>';
		
	}
}	


?>
