<html xmlns="http://www.w3.org/1999/xhtml">
<?php  
session_start(); 
include("db-contact.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
$url = 'http://140.131.114.142/yixunai/Login.php';
$cusName = $_COOKIE['cusName'];
$token = $_COOKIE['token'];
$email = $_COOKIE['email'];
$sql = "select * from customer order by  adtime desc limit 1";
$result = mysql_query($sql);
$row =mysql_fetch_array($result);
$to =$email; //收件者
$subject = "《益尋愛》註冊帳號驗證信"; //信件標題
$msg = "親愛的".$cusName."：\n感謝您在《益尋愛》註冊了新帳號。\n請點擊連結開通您的帳號，一起開始我們的公益冒險吧~\n<a href=http://140.131.114.142/develop/verifyActive.php?verify=".$token."\n如果以上網址無法點擊，請將它複製到您的瀏覽器，該連結30分鐘內有效。";
  
  $headers = "From: 益尋愛"; //寄件者
  if(mail( "$to", "$subject", "$msg", "$headers")):
		echo "嘿!&nbsp;" .$cusName."</br>";
		echo "註冊成功囉! </br>請去信箱收驗證信完成註冊吧~~ 感謝您!";//寄信成功就會顯示的提示訊息
		echo '<meta http-equiv=REFRESH CONTENT=5;url=Login.php>';
  else:
		echo "email註冊驗證信發送失敗,請再來一次！";//寄信失敗顯示的錯誤訊息
		echo $row ['email'].$cusName;
  endif;
  
?>