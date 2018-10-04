<?php 
session_start(); 
error_reporting(0);
include("db-contact.php");
include("timeout.php");
header("Content-Type:text/html; charset=utf-8");


if($_GET['e'] !==null){
	$id = $_GET['e'];
	$sql="delete from news where ID = '$id'";
	if(mysql_query($sql)){
	
		echo "消息刪除成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=NewNewsCM.php>';
	}else{
		echo "消息刪除失敗,請返回上一頁重新刪除...";	
	}
}else if($_REQUEST['deleteall']){
	
	$check=$_POST['IDrow'];
	if($check !== null){
		foreach($check as $value){
			
			$sqlStr="delete from news where ID = '$value'";
			mysql_query($sqlStr) or die("消息刪除失敗,請返回上一頁重新刪除...");
		}		
			echo "所選消息刪除成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=NewNewsCM.php>';
	}else{
		echo "未選取消息!";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}else{
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$time=date("Y-m-d H:i:s");
	
	$sql="update news set title='$title',content='$content',fdate='$time' where ID='$id'";
	if(mysql_query($sql)){
	
		echo "更新成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=NewNewsCM.php>';
	}else{
		echo "消息更新失敗,請返回上一頁重新編輯...";	
	}
	
	
}

?>