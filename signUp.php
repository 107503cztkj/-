<?php
session_start();
include("db-contact.php"); 
error_reporting(0);


if($_SESSION['login'] == "1")
{
		$email=$_SESSION['email'];
		$sql = "SELECT * FROM customer where email= '$email' ";
		$data = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_array($data);
		$cusID = $row['cusID'];		
		$cusName = $row['cusName'];
		$cusMail = $row['email'];
		
		$eventID = $_GET['e'];
		$sql2 = "SELECT * FROM event where eventID= '$eventID' ";
		$data2 = mysql_query($sql2) or die(mysql_error());
		$row2 = mysql_fetch_array($data2);
		$eventName = $row2['eventName'];
		
		$sqlCheck = "SELECT `eventID`,`cusID` FROM applicationform WHERE `eventID`='$eventID' AND `cusID`='$cusID'";
		$resultCheck = mysql_query($sqlCheck);
		$nums = mysql_fetch_array($resultCheck);
		
		if($nums>0){
			echo"<script>alert('您已報名過此活動囉!');history.go(-1);</script>";		
			
		}else{	
			$sql = "insert into applicationform (eventID, eventName, cusID, cusName,cusEmail) values ('$eventID', '$eventName', '$cusID', '$cusName', '$cusMail') ";

			if(mysql_query($sql))
			{
				echo"<script>alert('報名成功! 感謝您~');location.href = 'http://140.131.114.142/yixunai/Event.php?f=$eventID';</script>";
			}
			else
			{
				echo  mysql_error();
				echo"<script>alert('報名失敗!請重新報名~');history.go(-1);</script>";		
			}
		}
}else{
	echo "<script>alert('想報名嗎?請先登入唷'); location.href = 'login.php';</script>";
}
?>
