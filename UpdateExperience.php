<?php

error_reporting(0);

header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");

$cusID=$_POST["cusID"];
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
	$sql="select * from experiences where expID = '$id'";
	$data=mysql_query($sql) or die(mysql_error());
	for($i=1;$i<=mysql_num_rows($data);$i++){
		$row=mysql_fetch_array($data);
		$dir='upload/';
		$pic=$row['expPic'];
		$url=$dir.$pic;
	}	
	$sql="delete from experiences where expID = '$id'";
	if(mysql_query($sql)){
		if($pic!=="expPic.png"){
			unlink($url);
		}	
		echo "心得刪除成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=UserFile.php>';
	}else{
		echo "心得刪除失敗,請返回上一頁重新刪除...";	
	}
}else if($_REQUEST['deleteall']){
	
	$check=$_POST['IDrow'];
	if($check !== null){
		foreach($check as $value){
			$sql="select * from experiences where expID = '$value'";
			$data=mysql_query($sql) or die(mysql_error());
			for($i=1;$i<=mysql_num_rows($data);$i++){
				$row=mysql_fetch_array($data);
				$dir='upload/';
				$pic=$row['expPic'];
				$url=$dir.$pic;
				if($pic!=="expPic.png"){
					unlink($url);
				}
			}
			
			$sqlStr="delete from experiences where expID = '$value'";			
			mysql_query($sqlStr) or die("心得刪除失敗,請返回上一頁重新刪除...");
		}		
			echo "所選心得刪除成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=UserFile.php>';
	}else{
		echo "未選取心得!";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}else{
	$id = $_POST['id'];
	$cusNickname = $_POST['cusNickname'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$dir='upload/';
	
	$size=$_FILES['pic']['size'];
	$name=$_FILES['pic']['name'];
	$tmp_name=$_FILES['pic']['tmp_name'];
	$sizemb=round($size/1024000,2);
	
	if($sizemb < 2 && $sizemb < 2){
		if($name == null){
			$pic=$_POST['expPic'];
		}else{
			$pic=explode(".",$name);
			$pic="expPic"."-".date(ymd)."-".rand(0,10).".".$pic[1];
			move_uploaded_file($tmp_name,"upload/".$pic); 
			if($_POST['expPic']!=="expPic.png"){
				unlink($dir.$_POST['expPic']);
			}	
		}
		  $sqlStr="update experiences set cusNickname='$cusNickname',title='$title',expPic='$pic',content='$content' where expID='$id'";
		  

		  mysql_query($sqlStr) or die("心得更新失敗! 請重新編輯...");
		
		  echo "心得更新成功! </br>頁面跳轉中...";
		  echo '<meta http-equiv=REFRESH CONTENT=2;url=UserFile.php>';
		  
	}else{
		  echo "照片檔案太大，請重新選擇";
		  echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
	}
}
	
	



?>
