<?php 
session_start(); 
error_reporting(0);
include("db-contact.php");
header("Content-Type:text/html; charset=utf-8");

$email = $_POST['email'];
$gender = $_POST['gender'];
$birth = $_POST['birth'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$job = $_POST['job'];
$language = $_POST['language'];
$other = $_POST['other'];
$foodHabit = $_POST['foodHabit'];
$cusIntro = $_POST['cusIntro'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$profilePic= $_POST['profilePic'];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$name=$_FILES['file']['name'];
$tmp_name=$_FILES['file']['tmp_name'];
$sizemb=round($size/1024000,2);


$allLanguage = implode (",", $language);
if($allLanguage !==null && $other!==null ){
	$allLanguage =$allLanguage.",";
}	


//紅色字體為判斷密碼是否填寫正確
if($_SESSION['cusID'] != "0" && $pw != null && $pw2 != null && $pw == $pw2)
{
    $cusID = $_SESSION['cusID'];
	if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){
		if($sizemb < 3){
			$file=explode(".",$name);
			$new_name="cusImg"."-".date(ymdhis)."-".rand(0,50).".".$file[1];
			$dir='cus-comImg/';
			
		//更新資料庫資料語法
				$sql = "update customer set password='$pw', gender='$gender', birth='$birth'  , phone='$phone', job='$job', language='$allLanguage' 
					 , otherLanguage='$other', foodHabit='$foodHabit', cusIntro='$cusIntro', profilePic='$new_name' where cusID='$cusID'";
				if(mysql_query($sql))
				{
						move_uploaded_file($tmp_name,"cus-comImg/".$new_name);
						if($profilePic != "cusImg-w.png" && $profilePic != "cusImg-m.png")
						{
							unlink($dir.$profilePic);
						}	
						echo '資料修改成功!頁面跳轉中...';
						echo '<meta http-equiv=REFRESH CONTENT=3;url=userfile.php>';
				}
				else
				{
						echo '資料修改失敗,請返回上一頁重新修改...';
						echo  mysql_error();
				}
		}else{
			 echo "照片檔案太大，請重新選擇";
			 echo '<br><br><input type ="button" onclick="history.back()" value="返回上一頁"></input>';	
		} 
	}else if($type!=="image/jpeg" || $type!=="image/png" || $type!=="image/gif"){
		$sql = "update customer set password='$pw', gender='$gender', birth='$birth'  , phone='$phone', job='$job', language='$allLanguage' 
					 , otherLanguage='$other', foodHabit='$foodHabit', cusIntro='$cusIntro' where cusID='$cusID'";
		
		mysql_query($sql) or die("資料修改失敗,請重新提交...");
		echo  mysql_error();

		echo "資料修改成功!頁面跳轉中...";
		echo '<meta http-equiv=REFRESH CONTENT=3;url=userfile.php>';
	}	
}else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index(afterlogin).php>';
}
?>