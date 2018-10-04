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

if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
  if($sizemb < 3){
	  $file=explode(".",$name);
	  $new_name="expPic"."-".date(ymdhis)."-".rand(0,10).".".$file[1];
	  move_uploaded_file($tmp_name,"upload/".$new_name);
	  
	  $sqlStr="insert into experiences (cusNickname, title, expPic, content) values('$cusNickname','$title','$new_name','$content')";

	  mysql_query($sqlStr) or die("心得分享失敗! 請重新新增...");

	  echo "心得分享成功!感謝您的分享~  </br>頁面跳轉中...";
	  echo '<meta http-equiv=REFRESH CONTENT=2;url=History(a).php>';
	  
  }else{
	  echo "照片檔案太大，請重新選擇";
	  echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
  }
}else if($type!=="image/jpeg" || $type!=="image/png" || $type!=="image/gif"){
	  $new_name="expPic-01.png";
	  $sqlStr="insert into experiences (cusNickname, title, expPic, content) values('$cusNickname','$title','$new_name','$content')";

	  mysql_query($sqlStr) or die("心得分享失敗! 請重新新增...");

	  echo "心得分享成功!感謝您的分享~  </br>頁面跳轉中...";
	  echo '<meta http-equiv=REFRESH CONTENT=2;url=History(a).php>';
	
}


?>
