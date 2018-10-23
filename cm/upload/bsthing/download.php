<?php
header("Content-Type:text/html; charset=utf-8");

if($_GET['f']!=null){
	$file = $_GET['f'];
	if(file_exists($file)){
	header("Content-type:application/octet-stream");
	$filename = basename($file);
	header("Content-Disposition:attachment;filename = ".$filename);
	header("Accept-ranges:bytes");
	header("Accept-length:".filesize($file));
	readfile($file);
}else{
    echo "<script>alert('文件不存在')</script>";
}
}

?>