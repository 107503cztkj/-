<?php
error_reporting(0);
header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");

$applicant=$_POST["applicant"];
$cusID=$_COOKIE['cusID'];
$OName=$_POST["OName"];
$address=$_POST["address"];
$email=$_POST["email"];
$url=$_POST["url"];
$phone=$_POST["phone"];
$intro=$_POST["intro"];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$name=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];
$zipcode=$_POST["zipcode"];
$city=$_POST["city"];
$town=$_POST["town"];
$address=$_POST["address"];

$allAddress=$zipcode.$city.$town.$address;

if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
	if($sizemb < 3){
		$file=explode(".",$name);
		$new_name="comPic"."-".date(ymdhis)."-".rand(0,50).".".$file[1];
		move_uploaded_file($tmp_name,"comApply/".$new_name);
		$sqlStr="insert into applylist (applicant,cusID,comName,comEMail,comAddress,comPhone,comIntro,comUrl,comPic)

		values('$applicant','$cusID','$OName','$email','$allAddress','$phone','$intro','$url','$new_name')";
		
		$sqlStr2="update customer set comStatus=2 where cusID='$cusID'";
		//echo $sqlStr."<br>";
		mysql_query($sqlStr) or die("機構申請提交失敗...");
		mysql_query($sqlStr2) or die("提交失敗...");

		echo "機構申請已提交!請靜待審核唷~<br>頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=3;url=UserFile.php>';
	}else{
		 echo "照片檔案太大，請重新選擇";
		 echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
	} 	
}else if($type!=="image/jpeg" || $type!=="image/png" || $type!=="image/gif"){
	  $new_name="comPic.png";
	  $sqlStr="insert into applylist (applicant,cusID,comName,comEMail,comAddress,comPhone,comIntro,comPic)

		values('$applicant','$cusID','$OName','$email','$allAddress','$phone','$intro','$new_name')";
	  $sqlStr2="update customer set comStatus=2 where cusID='$cusID'";
	  
	  
	  mysql_query($sqlStr) or die("機構申請提交失敗...");
	  mysql_query($sqlStr2) or die("提交失敗...");
	  
	  echo "機構申請已提交!請靜待審核唷~<br>頁面跳轉中...";
	  echo '<meta http-equiv=REFRESH CONTENT=3;url=UserFile.php>';
	  
}
		





?>