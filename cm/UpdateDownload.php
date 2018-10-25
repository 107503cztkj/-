<?php 
session_start(); 
error_reporting(0);
include("db-contact.php");
include("timeout.php");
header("Content-Type:text/html; charset=utf-8");


$id = $_POST['id'];
$value = $_POST['value'];
list($field,$idd) = explode('_', $id);
$time=date("Y-m-d H:i:s"); //获取系统当前时间 

if(empty($value)){ 
  echo "不能為空"; 
}else{ 
  //更新字段信息 
  $query=mysql_query("update download set $field='$value',fdate='$time' where ID='$idd'"); 
  if($query){ 
    echo $value; 
	echo '<meta http-equiv=REFRESH CONTENT=0;url=DownloadlistCM.php>';
  }else{ 
    echo "更新出錯";
  } 
}
  
  
if($_GET['e'] !==null){
	$id = $_GET['e'];
	$sql="select * from download where ID = '$id'";
	$data=mysql_query($sql) or die(mysql_error());
	for($i=1;$i<=mysql_num_rows($data);$i++){
		$row=mysql_fetch_array($data);
		$dir='../downloadFile/';
		$file=$row['url'];
		$url=$dir.$file;
	}
	$sqlStr="delete from download where ID = '$id'";
	if(mysql_query($sqlStr)){
		unlink($url);
		echo "檔案刪除成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=DownloadlistCM.php>';
	}else{
		echo "檔案刪除失敗,請返回上一頁重新刪除...";
	}	
	

}else if($_REQUEST['deleteall']){
	
	$check=$_POST['IDrow'];
	if($check !== null){
		foreach($check as $value){
			$sql="select * from download where ID = '$value'";
			$data=mysql_query($sql) or die(mysql_error());
			for($i=1;$i<=mysql_num_rows($data);$i++){
				$row=mysql_fetch_array($data);
				$dir='../downloadFile/';
				$file=$row['url'];
				$url=$dir.$file;
				unlink($url);
			}
			$sqlStr="delete from download where ID = '$value'";
			mysql_query($sqlStr) or die("檔案刪除失敗,請返回上一頁重新刪除...");
		}		
			echo "檔案刪除成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=DownloadlistCM.php>';
	}else{
		echo "未選取檔案!";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}else if($_REQUEST['reset']){
	$type=$_FILES['file']['type'];
	$size=$_FILES['file']['size'];
	$name=$_FILES['file']['name'];
	$tmp_name=$_FILES['file']['tmp_name'];
	$ID = $_POST['ID'];
	$url = $_POST['url'];
	$dir = 'downloadFile/'.$url;

	$sizemb=round($size/1024000,2);

	echo "檔案名稱：".$name."</br>";
	echo "檔案大小：".$sizemb."MB</br>";
	echo "檔案類型：".$type."</br>";
	if($sizemb < 3){
	  $file=explode(".",$name);
	  $new_name="download"."-".date(ymd)."-".rand(0,10).".".$file[1];
	  move_uploaded_file($tmp_name,"../downloadFile/".$new_name);
	  $sqlStr="update download set url='$new_name',fdate='$time' where ID='$ID' ";
		if(mysql_query($sqlStr)){
			unlink($dir);
			echo "<br>檔案更新成功!<br>三秒後跳轉頁面...";
			echo '<meta http-equiv=REFRESH CONTENT=3;url=DownloadlistCM.php>';
		}else{
			echo "檔案上傳失敗,請重新上傳...";
			echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
		}
	}else{
		echo "檔案太大，請重新選擇";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}	
?>