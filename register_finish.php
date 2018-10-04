<?php session_start(); 
include("db-contact.php");
error_reporting(0);
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

$cusName = $_POST['cusName'];
$ID = $_POST['ID'];
$gender = $_POST['gender'];
$birth = $_POST['birth'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pw =  $_POST['pw'];
$pw2 = $_POST['pw2'];
$cusIntro = $_POST['cusIntro'];
$regtime = time();


$allLanguage = implode (",", $language);
$token = md5($cusName.$pw.$regtime); //創建用於激活識別碼
$token_exptime = time()+60*60*0.5;//過期時間為30分鐘後



$sql = "SELECT * FROM customer where email='$email'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
  		echo 'E-mail帳號錯誤，請重新確認....';
		echo '<br><br><input type ="button" onclick="history.back()" value="回到上一頁編輯"></input>';	
}else if($row['email'] == $email){
	
		echo '此E-mail帳號已註冊過，請重新確認....';
		echo '<br><br><input type ="button" onclick="history.back()" value="回到上一頁編輯"></input>';	
}else{

	if(chk_pid($ID)==true){
		if(ifmob($phone)=='號碼正確'){
			if($email != null && $pw != null && $pw2 != null && $pw == $pw2){
				if($gender=="男"){
					$profilePic="cusImg-m.png";
				}else{
					$profilePic="cusImg-w.png";
				}	
			//新增資料進資料庫語法
			   $sql = "insert into customer (cusName, identity, gender, birth, phone, email, password, cusIntro ,profilePic, token, token_exptime) 
						values ('$cusName', '$ID', '$gender', '$birth', '$phone', '$email', '$pw', '$cusIntro', '$profilePic', '$token', '$token_exptime')";

			   if(mysql_query($sql))
				{
					
					setcookie('cusName',$cusName);
					setcookie('token',$token);
					setcookie('email',$email);
					echo '<meta http-equiv=REFRESH CONTENT=0;url=sendVerify.php>';
				}
				else
				{
						echo '註冊失敗!請重新註冊!';
						echo mysql_error();
						echo '<meta http-equiv=REFRESH CONTENT=2;url=>Login.php#toregister>';
				}
				
			}else{
				echo "請檢查密碼是否輸入一致";
				echo '<br><br><input type ="button" onclick="history.back()" value="回到上一頁編輯"></input>';
			}
		}else{
			echo '電話號碼輸入錯誤!請重新輸入!';
			echo '<br><br><input type ="button" onclick="history.back()" value="回到上一頁編輯"></input>';
		}		
	
	}else{
		echo '身分證輸入錯誤!請重新輸入!';
		echo '<br><br><input type ="button" onclick="history.back()" value="回到上一頁編輯"></input>';
		
	}	
}

		

//身分證驗證
function chk_pid($ID) {
    if( !$ID )return false;
    $ID = strtoupper(trim($ID)); //將英文字母全部轉成大寫，消除前後空白
    //檢查第一個字母是否為英文字，第二個字元1 2 A~D 其餘為數字共十碼
    $ereg_pattern= "/^[A-Z]{1}[12ABCD]{1}[[:digit:]]{8}$/i";
    if(!preg_match($ereg_pattern, $ID))return false;
    $wd_str="BAKJHGFEDCNMLVUTSRQPZWYX0000OI";   //關鍵在這行字串
    $d1=strpos($wd_str, $ID[0])%10;
    $sum=0;
    if($ID[1]>='A')$ID[1]=chr($ID[1])-65; //第2碼非數字轉換依[4]說明處理
    for($ii=1;$ii<9;$ii++)
        $sum+= (int)$ID[$ii]*(9-$ii);
    $sum += $d1 + (int)$ID[9];
    if($sum%10 != 0)return false;
    return true;
}

//電話號碼驗證
function ifmob($str){
	$pattern = "/^(13|14|15|18)\d{9}$/";//大陸
	$twpattern = "/^(09)\d{8}$/";//台灣
	if (preg_match($pattern,$str) || preg_match($twpattern,$str)){
		return '號碼正確';
	}else{
		return '號碼錯誤';
	}
}

//email驗證
function checkemail($email){
	if (preg_match('/^([.0-9a-z]+)@([0-9a-z]+).([.0-9a-z]+)$/i',$email) == true) {
	return true; 
	}else{
	return false;
	}
}


?>