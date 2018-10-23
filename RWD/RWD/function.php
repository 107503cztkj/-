<?php


//裁切字串
function cut_content($a,$b){
	$a = strip_tags($a); //去除HTML標籤
	$sub_content = mb_substr($a, 0, $b, 'UTF-8'); //擷取子字串
	echo $sub_content;  //顯示處理後的摘要文字
	//顯示 "......"
	if (strlen($a) > strlen($sub_content)) echo "...";
}
					
?>