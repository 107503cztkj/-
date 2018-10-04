<?php
session_start();
include("db-contact.php"); 
include("timeout.php"); 
error_reporting(0);
?>

<?php 
if($_SESSION['email'] == null)
{
	echo "<script>alert('您無權限觀看此頁面!請先登入!'); location.href = 'login.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/Review.css" rel="stylesheet" type="text/css" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="js/jquery.twzipcode.min.js"></script>

</head>
<body>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="header-wrapper">
        <div class="container">
            <div id="header">
                <div id="logo"></div>
                <!--~~~~~~~~~~~~~~~~~~-->         
                 <!--~~~導覽列~~~-->  
                <div class="navbar" >
                    <ul>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="Index.php">訊息專欄</a>
                            <ul class="dropdown-menu" >
                                <a href="Downloadlist.php"><li>下載專區</li></a>
                                <a href="BSthing.php"><li>桃園大小事</li></a>
                                <a href="NewNews.php"><li>最新消息</li></a>
                            </ul>
                        </li>
                        <li><a href="EventNews.php">活動快訊</a></li>
                        <li><a href="Organization.php">公益組織</a></li>
                        <li><a href="History.php">愛心回顧</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="About.php">關於益尋愛</a>
                            <ul class="dropdown-menu">
                                <a href="Q_A.php"><li>益尋愛Q&A </li></a>
                            </ul>
                        </li>
                        <li class="dropdown">
							  <a class="dropdown-toggle" href="UserFile.php">益寶小檔案</a>
							  <ul class="dropdown-menu" >
									<a href="logout.php"><li>登出</li></a>
							  </ul>	
						</li>
                    </ul>            
                </div>  
            </div>
            <!--~~~~~~~~~~~~--> 
			<?php
					$email=$_SESSION['email'];
					$sql = "SELECT * FROM customer where email= '$email' ";
					$data = mysql_query($sql) or die(mysql_error());
					$row = mysql_fetch_array($data);
					setcookie('cusID',$row['cusID']);
				
			?>
            <div id="page" class="content">
            
                <div id="wide-content">
                  <div id="title"> <h3>申請成為機構 </h3></p>
                  <center>請確實填寫申請機構的基本資料，並按下確認申請的按鈕</br>資料將由桃園市青年志工中心進行審核。</center></div>
				  <form method="POST" action="writeToReview.php" enctype="multipart/form-data" >
					 
							
						<div id="form">
							上傳機構頭像及政府登記資料</br>
						<input type='file' class="upl" name="file" accept="image/jpeg,image/gif,image/png">
						<div>
							<img class="preview" style="max-width: 150px; max-height: 150px;">
							<div class="size"></div>
						</div>
						</div>
							<div class="alldata">										
							機構帳號申請負責人:&nbsp&nbsp<?php echo "<input type=\"text\" name=\"applicant\" value=\"$row[cusName]\" style=\"width:100px\"/ maxlength=\"10\">";?></p>
							機構名稱:&nbsp&nbsp
							<input type="text" name="OName" required="required"></p>
							機構登記住址:
							<div id="zipcode2"></div>
							<script>
							$("#zipcode2").twzipcode({
							countySel: "臺北市", // 城市預設值, 字串一定要用繁體的 "臺", 否則抓不到資料
							districtSel: "大安區", // 地區預設值
							zipcodeIntoDistrict: true, // 郵遞區號自動顯示在地區
							css: ["city", "town form-control"], // 自訂 "城市"、"地區" class 名稱 
							countyName: "city", // 自訂城市 select 標籤的 name 值
							districtName: "town" // 自訂地區 select 標籤的 name 值
							});
							</script>
							<input type="text" class="form-control" name="address" style="width:300px" maxlength="25" required="required"/></br></br>
							機構E-mail:&nbsp <input type="text" name="email" required="required">
							連絡電話:&nbsp <input type="text" name="phone" required="required"></p></br>
							機構網址:&nbsp <input type="text" name="url" required="required"></p></br>
							機構介紹:&nbsp </br>
							<textarea cols="80" rows="10" id="textarea" onfocus="if(value=='請寫下機構介紹讓我們更了解您！'){value=''}"
							onblur="if (value ==''){value='請寫下機構介紹讓我們更了解您！'}" name="intro">請寫下機構介紹讓我們更了解您！</textarea></p>
							<center><div id="SB"><input type="submit" style="width:100px;height:50px;" value="確定申請"></div></center>
						   
						</div>
						</div>
					</form>	
                    
					
        </div>	
    </div>
	
<!------------------------------------------------>
      <div class="totop">
             <img src="images/totop.png" id="btn" title="回到頂部">
    </div>

<!------------------------------------------------>
    
    <div class="footer">
        <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
    </div> 		
    
<!------------------------------------------------>
<!------------------------------------------------>    
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>
    
    <script src="js/scripts.js"></script>   
    <script src="js/myDropdownMenu.js"></script>  
	<script> function preview(input) {
 
    // 若有選取檔案
    if (input.files && input.files[0]) {
 
        // 建立一個物件，使用 Web APIs 的檔案讀取器(FileReader 物件) 來讀取使用者選取電腦中的檔案
        var reader = new FileReader();
 
        // 事先定義好，當讀取成功後會觸發的事情
        reader.onload = function (e) {
            
            console.log(e);
 
            // 這裡看到的 e.target.result 物件，是使用者的檔案被 FileReader 轉換成 base64 的字串格式，
            // 在這裡我們選取圖檔，所以轉換出來的，會是如 『data:image/jpeg;base64,.....』這樣的字串樣式。
            // 我們用它當作圖片路徑就對了。
            $('.preview').attr('src', e.target.result);
 
            // 檔案大小，把 Bytes 轉換為 KB
            var KB = format_float(e.total / 1024, 2);
            $('.size').text("檔案大小：" + KB + " KB");
        }
 
        // 因為上面定義好讀取成功的事情，所以這裡可以放心讀取檔案
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script>
$(function (){
 
	function format_float(num, pos)
	{
		var size = Math.pow(10, pos);
		return Math.round(num * size) / size;
	}
 
	function preview(input) {
 
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('.preview').attr('src', e.target.result);
				var KB = format_float(e.total / 1024, 2);
				$('.size').text("檔案大小：" + KB + " KB");
			}
 
			reader.readAsDataURL(input.files[0]);
		}
	}
 
	$("body").on("change", ".upl", function (){
		preview(this);
	})
	
})
</script>
</body>
</html>
