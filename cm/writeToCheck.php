<?php 
session_start(); 
error_reporting(0);
include("db-contact.php");
header("Content-Type:text/html; charset=utf-8");


$applyID = $_COOKIE['applyID'];
$status =  $_GET['f'];


if($status=="y"){
	$sql="insert into company(cusID,comName,comMail,principal,phone,address,url,comPic,comIntro) SELECT cusID,comName,comEmail,applicant,comPhone,comAddress,comUrl,comPic,comIntro from applylist where applyID='$applyID'";
	$sql2="update applylist set checkStatus=1 where applyID='$applyID'";

	$sql3="select * from  applylist where applyID='$applyID'";
	$data = mysql_query($sql3) or die('MySQL query error');
	$row = mysql_fetch_array($data);
	$cusID=$row['cusID'];
				
				
	$sql4="update customer set comStatus=1 where cusID='$cusID'";
	if(mysql_query($sql)){
		if(mysql_query($sql2)){
			if(mysql_query($sql4)){
				copy("../comApply/".$row['comPic'],"../cus-comImg/".$row['comPic']);
				echo "審核成功!頁面跳轉中...";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=check.php>';
			}else{
				echo "審核失敗,請返回上一頁重新編輯...";	
			}	
		}else{
			echo "審核失敗,請返回上一頁重新編輯...";
		}
	}else{
			echo "審核失敗,請返回上一頁重新編輯...";	
			echo  mysql_error() ;
	}	
}else if($status=="n"){
	$sql="select * from  applylist where applyID='$applyID'";
	$data = mysql_query($sql) or die('MySQL query error');
	$row = mysql_fetch_array($data);
	$cusID=$row['cusID'];
	
	$sql2="update applylist set checkStatus=2 where applyID='$applyID'";
	$sql3="update customer set comStatus=3 where cusID='$cusID'";
	
	if(mysql_query($sql)){
		if(mysql_query($sql2)){
			if(mysql_query($sql3)){
				echo "審核資料已送出!頁面跳轉中...";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=check.php>';
			}else{
				echo "審核失敗,請返回上一頁重新編輯...";	
			}	
		}else{
			echo "審核失敗,請返回上一頁重新編輯...";
		}
	}else{
			echo "審核失敗,請返回上一頁重新編輯...";	
			echo  mysql_error() ;
	}	
}	


	




?>