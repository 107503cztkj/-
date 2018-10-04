<?php
session_start();
include("db-contact.php"); 
error_reporting(0);

$id = $_POST['id'];
$value = $_POST['value'];
list($field,$idd) = explode('_', $id);
$time=date("Y-m-d H:i:s"); //获取系统当前时间 

if(empty($value)){ 
  echo "不能為空"; 
}else{ 
  //更新字段信息 
  $query=mysql_query("update download set $field='$value',fdate='$time' where ID='$idd'"); 
  if($query){ 
    echo $value; 
	echo '<meta http-equiv=REFRESH CONTENT=0;url=DownloadlistCM.php>';
  }else{ 
    echo "更新出錯";
  } 
} 

?>