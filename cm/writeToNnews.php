<?php

error_reporting(0);

header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");


$title=$_POST["title"];
$content=$_POST["content"];

	  
$sqlStr="insert into news (title,content) values('$title','$content')";

mysql_query($sqlStr) or die("消息上傳失敗! 請重新新增...");

echo "消息上傳成功! 頁面跳轉中...";
echo '<meta http-equiv=REFRESH CONTENT=2;url=NewNewsCM.php>';
	  



?>
