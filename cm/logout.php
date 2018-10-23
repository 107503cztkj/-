<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
if($_SESSION['ID'] !== "yiren"){
	echo "<script>alert('您無權限觀看此頁面!請先登入!'); location.href = 'login.php';</script>";
}		
?>

<?php
//將session清空
unset($_SESSION['ID']);
session_destroy();
echo '登出中......';
echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
?>