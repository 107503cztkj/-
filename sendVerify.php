<?php  
session_start(); 
include("db-contact.php");
require_once('mailSetting.php');
error_reporting(0);

$url = 'http://140.131.114.142/yixunai/verifyActive.php?verify=';
$cusName = $_COOKIE['cusName'];
$token = $_COOKIE['token'];
$email = $_COOKIE['email'];
$to =$email; //收件者
$subject = "《益尋愛》註冊帳號驗證信"; //信件標題
$msg = "親愛的".$cusName."：\n感謝您在《益尋愛》註冊了新帳號。\n請點擊連結開通您的帳號，一起開始我們的公益冒險吧~\n<a href=".$url.$token.">點此開通帳號</a>\n如果以上網址無法點擊，請將它複製到您的瀏覽器，該連結30分鐘內有效。";
  

$mail->Subject =$subject;//郵件標題
$mail->Body = $msg;//郵件內容
$mail->IsHTML(true);//郵件內容為html
$mail->AddAddress("$email");//收件者郵件及名稱
if(!$mail->Send()){
	echo "Error: " . $mail->ErrorInfo;
	echo "email註冊驗證信發送失敗,請再來一次！";
}else{
	echo "嘿!&nbsp;" .$cusName."</br>";
	echo "註冊成功囉! </br>請去信箱收驗證信完成註冊吧~~ 感謝您!";//寄信成功就會顯示的提示訊息
	echo '<meta http-equiv=REFRESH CONTENT=5;url=Login.php>';
		
}

?>