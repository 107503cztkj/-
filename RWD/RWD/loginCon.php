<?php
include("db-contact.php");
error_reporting(0);
//解決網頁亂碼問題
header("Content-Type:text/html; charset=utf-8");

@session_start(); // 開始 session 
session_register('login'); //註冊一個變數到 session 
$_SESSION['login'] = 0; // 把剛剛註冊的變數歸零（也就是代表尚未登入） 

$email=$_POST["email"];
$pw=$_POST["pw"];

$result=mysql_query("SELECT * FROM customer where email='$email'");

while($row = mysql_fetch_array($result)){
	if(empty($email)==FALSE && empty($pw)==FALSE){

	 $userEmail=$email;
	 $userEmail=mysql_real_escape_string($userEmail);
	 $userPassword=md5(trim($pw));
	 $userPassword=mysql_real_escape_string($userPassword);
		if($row['email']==$email){
			if($row["status"]=="1"){
				 if($row["password"]==$pw){

					$_SESSION["email"]=$email;
					$_SESSION['password']=$pw;

					header('Location: Userfile.php');
					$_SESSION['login'] = 1;

				 }else{
				 
						echo "登入失敗!</br>";
						echo "請確認帳號密碼是否正確,並請重新登入...";
						echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
					 
						break;
				 }
			}else{
				echo "此帳號尚未驗證! 快去信箱開通帳號吧~";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
				break;	
			}
		}else{
			echo "此Email帳號尚未註冊唷!";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
			break;
		}	

			
					
}else{				
		echo "登入失敗!</br>";
		echo "未輸入完整欄位.....";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
	 
		break;	
	}
}
	
?>
