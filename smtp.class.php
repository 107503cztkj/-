<?php
include("db-contact.php");
require_once('mailSetting.php');

$email = stripslashes(trim($_POST['email']));
	
$sql = "select * from customer where email= '$email'";
$data = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($data);

if($row==0){//该邮箱尚未注册！
	echo '該信箱尚未註冊，請重新確認!';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=pwforget.php>';
	exit;	
}else{
	$cusName = $row['cusName'];
	$getpasstime = time();
	$uid = $row['cusID'];
	$token = md5($uid.$row['cusName'].$row['password']);//组合验证码
	$url = "http://140.131.114.142/yixunai/pwReset.php?email=".$email."&token=".$token;//构造URL
	$time =  date("Y-m-d H:i:s");;
	
	$mail->Subject ="《益尋愛》密碼重設通知信";//郵件標題
    $mail->Body = "親愛的".$cusName."：\n您在".$time."提交了找回密碼請求，請於30分鐘內點擊下面的超連結重置密碼。\n若您無發送此要求，請忽略。
	\n《益尋愛》感謝您~\n ".$url; //郵件內容
    $mail->IsHTML(true);                             //郵件內容為html
    $mail->AddAddress("$email");//收件者郵件及名稱
    
	if(!$mail->Send()){
		echo "Error: " . $mail->ErrorInfo;
		echo "密碼重設通知信發送失敗,請再來一次！";//寄信失敗顯示的錯誤訊息
			echo '<meta http-equiv=REFRESH CONTENT=3;url=pwforget.php>';
	}else{
			echo "您好</br>";
			echo "系统已向您的信箱發送了一封郵件<br/>請於30分鐘內至您的信箱重設您的密碼！";//寄信成功就會顯示的提示訊息
			mysql_query("update `customer` set `getpasstime`='$getpasstime' where cusID='$uid '");
			echo '<meta http-equiv=REFRESH CONTENT=4;url=Login.php>';
			
	}
	  
}	
?>