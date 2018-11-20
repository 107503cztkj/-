<?php
include("db-contact.php");
error_reporting(0);
//解決網頁亂碼問題
header("Content-Type:text/html; charset=utf-8");

@session_start(); // 開始 session 
$_SESSION['login'] = 0; // 把剛剛註冊的變數歸零（也就是代表尚未登入） 

$error_flag = FALSE;
$notfound_flag = FALSE;


//如果收到 POST 表單送來的登入資料，到資料庫檢査是否有這個人存在
//（使用 mysql_query("SELECT ...... ")，然後把回傳的東西透過 mysql_fetch_array(......) 來檢査）
$result=mysql_query("SELECT * FROM manager");


//如果有找到，檢査密碼是否相符
while($row = mysql_fetch_array($result)){

	 //先檢査使用者有沒有輸入資料
	 if(empty($_POST["ID"])==FALSE && empty($_POST["pw"])==FALSE){

	 //防範攻擊
	 $userID=$_POST["ID"];
	 $userID=mysql_real_escape_string($userID);
	 $userPassword=md5(trim($_POST["pw"]));
	 $userPassword=mysql_real_escape_string($userPassword);
	 //有輸入資料的話，再來看輸入的email跟資料庫是否一致
		if($row["ID"]==$_POST["ID"]){
			if($row["pw"]==$_POST["pw"]){
				 //如果相符合，則設定 Session（記得要先 session_start()！），並轉址到會員中心（member.php）

					//讓網頁轉址的 PHP 寫法：header('Location: member.php');
					header('Location: Index.php');
					$_SESSION['ID'] = "yiren";

			}else{
			 //如果不符合，則設定 $error_flag 為 TRUE，繼續顯示網頁内容
				$error_flag = TRUE;
				echo "登入失敗!</br>";
				echo "請確認帳號密碼是否正確</br>並請重新登入...";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
			 
				break;
			}
		
		}else{
			//如果不符合，則設定 $error_flag 為 TRUE，繼續顯示網頁内容
				$error_flag = TRUE;
				echo "登入失敗!</br>";
				echo "請確認帳號密碼是否正確</br>並請重新登入...";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
			 
				break;
		}
	}
}	
?>
