<?php
include_once("db-contact.php");
?>

<?php
$token = stripslashes(trim($_GET['token']));
$email = stripslashes(trim($_GET['email']));
$sql = "select * from customer where email='$email'";

$query = mysql_query($sql);
$row = mysql_fetch_array($query);
if($row){
	$mt = md5($row['cusID'].$row['cusName'].$row['password']);
	if($mt==$token){
		if(time()-$row['getpasstime']>0.5*60*60){
			$msg = '該連結已過期囉！';
		}else{
			//重置密码...
			$cusName = $row['cusName'];
			setcookie('cusName',$cusName);
			setcookie('email',$email);
			$msg = '正在轉換至重設密碼頁面 請稍後唷...'.'<meta http-equiv=REFRESH CONTENT=2;url=pwReset2.php>';
		}
	}else{
		$msg =  '無效的連結';
	}
}else{
	$msg =  '錯誤的連結';	
}
echo $msg;
?>