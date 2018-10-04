<?php
error_reporting(0);

header("Content-Type:text/html; charset=utf-8");
include("db-contact.php");

$title=$_POST["title"]; 
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$name=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];

$sizemb=round($size/1024000,2);

echo "檔案名稱：".$name."</br>";
echo "檔案大小：".$sizemb."MB</br>";
echo "檔案類型：".$type."</br>";


if($sizemb < 3){
  $file=explode(".",$name);
  $new_name="download"."-".date(ymd)."-".rand(0,10).".".$file[1];
  move_uploaded_file($tmp_name,"yixunai/downloadFile/".$new_name);
  echo "<br>上傳成功!<br>三秒後跳轉頁面...";
  $sqlStr="insert into download(title, url) values ('$title','$new_name')";
  mysql_query($sqlStr) or die("檔案上傳失敗,請重新上傳...");
  
  echo '<meta http-equiv=REFRESH CONTENT=3;url=DownloadlistCM.php>';
  
 }else{
  echo "檔案太大，請重新選擇";
  echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';
}



?>