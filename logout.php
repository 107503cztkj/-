<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//將session清空
unset($_SESSION['email']);
$_SESSION['login'] = 0;
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=Index.php>';
?>