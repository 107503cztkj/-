<?php
if($_SESSION['login'] == "1"){

	echo "<script language=\"JavaScript\">";  
		  //一段時間未執行,則系統登出
	echo "var oTimerId;";
	echo "function Timeout(){";
	echo "alert('閒置過久,請重新登入!'); location.href = 'logout.php';";
	echo "}";
	echo "function ReCalculate(){";
	echo "clearTimeout(oTimerId);";
	echo "oTimerId = setTimeout('Timeout()', 30 * 60 * 1000);";
	echo "}";
	echo "document.onmousedown = ReCalculate;";
	echo "document.onmousemove = ReCalculate;";
	echo "ReCalculate();";
		
	echo "</script>";
}
   
?>