<?php 
session_start(); 
error_reporting(0);
include("db-contact.php");
header("Content-Type:text/html; charset=utf-8");

$comID = $_POST['comID'];
$comName = $_POST['comName'];
$comMail = $_POST['comMail'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$url = $_POST['url'];
$comIntro = $_POST['comIntro'];
$comPic= $_POST['comPic'];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$name=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];
$sizemb=round($size/1024000,2);



if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
		if($sizemb < 3){
			$file=explode(".",$name);
			$new_name="comImg"."-".date(ymdhis)."-".rand(0,50).".".$file[1];
			$dir='cus-comImg/';
			
		//更新資料庫資料語法
				$sql = "update company set comName='$comName', comMail='$comMail',  address='$address',  phone='$phone', url='$url', comIntro='$comIntro', comPic='$new_name'  where comID='$comID'";
				if(mysql_query($sql))
				{
						move_uploaded_file($tmp_name,"cus-comImg/".$new_name);
						if($comPic != "comPic.png")
						{
							unlink($dir.$comPic);
						}	
						echo '資料修改成功!頁面跳轉中...';
						echo '<meta http-equiv=REFRESH CONTENT=2;url=Ofile.php>';
				}
				else
				{
						echo '資料修改失敗,請返回上一頁重新修改...';
						echo  mysql_error();
				}
		}else{
			 echo "照片檔案太大，請重新選擇";
			 echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
		} 
	}else if($type!=="image/jpeg" || $type!=="image/png" || $type!=="image/gif"){
		$sql = "update company set comName='$comName', comMail='$comMail', address='$address',  phone='$phone', url='$url', comIntro='$comIntro'  where comID='$comID'";
		
		mysql_query($sql) or die("資料修改失敗,請重新提交...");
		echo  mysql_error();

		echo "資料修改成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=Ofile.php>';
	}	

?>