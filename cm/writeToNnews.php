<?php

error_reporting(0);
header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");


$title=$_POST["title"];
$content=$_POST["content"];

$picSize=$_FILES['pic']['size'];
$picName=$_FILES['pic']['name'];
$tmp_name1=$_FILES['pic']['tmp_name'];
$sizemb1=round($picSize/1024000,2);

$fileSize=$_FILES['file']['size'];
$fileName=$_FILES['file']['name'];
$tmp_name2=$_FILES['file']['tmp_name'];
$sizemb2=round($fileSize/1024000,2);

if($sizemb1 < 2 && $sizemb2 < 2){
	if($picName == null){
		$newsPic="null";
	}else{
		$pic=explode(".",$picName);
		$newsPic="newsPic"."-".date(ymd)."-".rand(0,10).".".$pic[1];
		move_uploaded_file($tmp_name1,"upload/news/".$newsPic); 
	}	
	if($fileName == null){		
		$newsfile="null";
	}else{
		$file=explode(".",$fileName);
		$newsfile="newsfile"."-".date(ymd)."-".rand(0,10).".".$file[1];	
		move_uploaded_file($tmp_name2,"upload/news/".$newsfile);
	}		  
	$sqlStr="insert into news (title,content,pic,file,fileName) values('$title','$content','$newsPic','$newsfile','$fileName')";

	mysql_query($sqlStr) or die("消息上傳失敗! 請重新新增...");

	echo "消息上傳成功! 頁面跳轉中...";
	echo '<meta http-equiv=REFRESH CONTENT=2;url=NewNewsCM.php>';
}else{
	echo "檔案太大，請重新選擇";
	echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
}	  
	  



?>
