<?php
include_once("db-contact.php");//連接數據庫
error_reporting(0);
?>

<?php
$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();

$sql = mysql_query("select * from customer where status=0 and token='$verify'");
$row = mysql_fetch_array($sql);

if($row){
	if($nowtime>$row['token_exptime']){ //0.5hour
		$msg = '連結有效期已過，請登錄您的帳號重新發送開通帳號郵件.';
		}else{
		mysql_query("update customer set status=1 where cusID=".$row['cusID']);
		if(mysql_affected_rows($link)!=1);
			$msg = 'Email帳號驗證成功！開始您的公益冒險吧~';
			echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
	}
}elseif($row['status']=1){
	$msg = '此帳號已開通過囉!趕快登入開始我們的公益冒險吧~'; 
	echo '<meta http-equiv=REFRESH CONTENT=2;url=Login.php>';
}else{
	$msg = 'error.';
}

echo $msg;

?>