<?php
session_start();
include("db-contact.php"); 
error_reporting(0);


if($_SESSION['email'] != null)
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
		$row = mysql_fetch_array($data2);
		$eventName = $row['eventName'];
		

		$sql = "insert into applicationform (eventID, eventName, cusID, cusName,cusEmail) values ('$eventID', '$eventName', '$cusID', '$cusName', '$cusMail')";

		if(mysql_query($sql))
		{
			echo"<script>alert('報名成功! 感謝您~');location.href = 'http://140.131.114.142/develop/Event(a).php?f=$eventID';</script>";
		}
		else
		{
			echo  mysql_error();
			echo"<script>alert('報名失敗!請重新報名~');history.go(-1);</script>";		
		}

}else{
	echo "<script>alert('想報名嗎?請先登入唷'); location.href = 'login.php';</script>";
}
?>
