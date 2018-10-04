<?php 
session_start(); 
error_reporting(0);
include("db-contact.php");
header("Content-Type:text/html; charset=utf-8");



if($_GET['e'] !==null){
	$cusID = $_GET['e'];
	$sqlStr="delete from customer where cusID = '$cusID'";
	if(mysql_query($sqlStr)){
		echo "益寶刪除成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=YibaoList.php>';
	}else{
		echo "益寶刪除失敗,請返回上一頁重新刪除...";
	}	
	
}else if($_GET['o'] !==null){
	$comID = $_GET['o'];
	$sqlStr="delete from company where comID = '$comID'";
	if(mysql_query($sqlStr)){
		echo "機構刪除成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=OList.php>';
	}else{
		echo "機構刪除失敗,請返回上一頁重新刪除...";
	}
	
}else if($_REQUEST['Ydeleteall']){
	
	$check=$_POST['IDrow'];
	if($check !== null){
		foreach($check as $value){
			$sqlStr="delete from customer where cusID = '$value'";
			mysql_query($sqlStr) or die("益寶刪除失敗,請返回上一頁重新刪除...");
		}		
			echo "益寶刪除成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=YibaoList.php>';
	}else{
		echo "未選取欲刪除的益寶!";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}else if($_REQUEST['Odeleteall']){
	
	$check=$_POST['IDrow'];
	if($check !== null){
		foreach($check as $value){
			$sqlStr="delete from company where comID = '$value'";
			mysql_query($sqlStr) or die("機構刪除失敗,請返回上一頁重新刪除...");
		}		
			echo "機構刪除成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=OList.php>';
	}else{
		echo "未選取欲刪除的機構!";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}
?>