<?php 
session_start(); 
error_reporting(0);
include("db-contact.php");
include("timeout.php");
header("Content-Type:text/html; charset=utf-8");


if($_GET['e'] !==null){
	$id = $_GET['e'];
	$sql="select * from bsthing where ID = '$id'";
	$data=mysql_query($sql) or die(mysql_error());
	for($i=1;$i<=mysql_num_rows($data);$i++){
		$row=mysql_fetch_array($data);
		$dir='upload/bsthing/';
		$pic=$row['pic'];
		$file=$row['file'];
		$url1=$dir.$pic;
		$url2=$dir.$file;
	}	
	$sql="delete from bsthing where ID = '$id'";
	if(mysql_query($sql)){
		unlink($url1);
		unlink($url2);
		echo "消息刪除成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=BSthingCM.php>';
	}else{
		echo "消息刪除失敗,請返回上一頁重新刪除...";	
	}
}else if($_REQUEST['deleteall']){
	
	$check=$_POST['IDrow'];
	if($check !== null){
		foreach($check as $value){
			$sql="select * from bsthing where ID = '$value'";
			$data=mysql_query($sql) or die(mysql_error());
			for($i=1;$i<=mysql_num_rows($data);$i++){
				$row=mysql_fetch_array($data);
				$dir='upload/bsthing/';
				$pic=$row['pic'];
				$file=$row['file'];
				$url1=$dir.$pic;
				$url2=$dir.$file;
				unlink($url1);
				unlink($url2);
			}
			
			$sqlStr="delete from bsthing where ID = '$value'";
			mysql_query($sqlStr) or die("消息刪除失敗,請返回上一頁重新刪除...");
		}		
			echo "所選消息刪除成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=BSthingCM.php>';
	}else{
		echo "未選取消息!";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
}else{
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$promulgator = $_POST['promulgator'];
	$dir='upload/bsthing/';
	
	$picSize=$_FILES['pic']['size'];
	$picName=$_FILES['pic']['name'];
	$tmp_name1=$_FILES['pic']['tmp_name'];
	$sizemb1=round($picSize/1024000,2);

	$fileSize=$_FILES['file']['size'];
	$fileName=$_FILES['file']['name'];
	$tmp_name2=$_FILES['file']['tmp_name'];
	$sizemb2=round($fileSize/1024000,2);
	
	$time=date("Y-m-d H:i:s");
	
	if($sizemb1 < 2 && $sizemb2 < 2){
		if($picName == null){
			$bsPic=$_POST['pic'];
		}else{
			$pic=explode(".",$picName);
			$bsPic="newsPic"."-".date(ymd)."-".rand(0,10).".".$pic[1];
			move_uploaded_file($tmp_name1,"upload/bsthing/".$bsPic); 
			unlink($dir.$_POST['pic']);
		}	
		if($fileName == null){		
			$bsfile=$_POST['file'];;
		}else{
			$file=explode(".",$fileName);
			$bsfile="newsfile"."-".date(ymd)."-".rand(0,10).".".$file[1];	
			move_uploaded_file($tmp_name2,"upload/bsthing/".$bsfile);
			unlink($dir.$_POST['file']);
		}	
		
		$sql="update bsthing set title='$title',content='$content',promulgator='$promulgator',pic='$bsPic',file='$bsfile',fileName='$fileName',fdate='$time' where ID='$id'";
		if(mysql_query($sql)){
			echo "更新成功!頁面跳轉中...";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=BSthingCM.php>';
		}else{
			echo "消息更新失敗,請返回上一頁重新編輯...";
		}
	}else{
		echo "檔案太大，請重新選擇";
		echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
	}
	
	
}

?>