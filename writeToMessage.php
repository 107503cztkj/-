<?php
session_start();
include("db-contact.php");
error_reporting(0);


if($_SESSION['login'] == "1")
{
	$sql = "insert into message (expID,cusID,cusNickname,content)values('$_POST[expID]','$_POST[cusID]','$_POST[cusNickname]','$_POST[content]')"; 
	mysql_query($sql) or die(mysql_error()); 

	$expID=$_POST['expID'];
	echo '<meta http-equiv=REFRESH CONTENT=0;url=Experience.php?e='.$expID.'>';
}else{
	echo "<script>alert('請先登入才能與大家分享你的留言唷!'); location.href = 'login.php';</script>";
}

?> 