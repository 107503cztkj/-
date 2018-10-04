<?php
include("db-contact.php");

$email = $_COOKIE['email'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];

$sql = "select * from customer where email= '$email'";
$data = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($data);

if($pw==$pw2){
	$sql="update customer set password='$pw' where email='$email'";
	if(mysql_query($sql))
	{
		echo "密碼重設成功!請重新登入~";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
	}else{
			echo mysql_error();
			echo "<script>alert('密碼重設失敗!請重新設定!');history.go(-1);</script>";  ;
	}	
}else{
			echo "<script>alert('密碼不一致，請重新確認！');history.go(-1);</script>";  ;
	  
}	
?>