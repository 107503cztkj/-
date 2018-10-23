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

    <link href="css/Userupdate.css" rel="stylesheet" type="text/css" />
    <link href="css/Head.css" rel="stylesheet" type="text/css" />
    <link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
    <link href="css/footer.css" rel="stylesheet" type="text/css" />
    <link href="css/totop.css" rel="stylesheet" type="text/css" />

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
                            <a class="dropdown-toggle" href="Index(a).php">訊息專欄</a>
                            <ul class="dropdown-menu" >
                                <a href="Downloadlist.php"><li>下載專區</li></a>
                                <a href="BSthing.php"><li>桃園大小事</li></a>
                                <a href="NewNews.php"><li>最新消息</li></a>
                            </ul>
                        </li>
                        <li><a href="EventNews(a).php">活動快訊</a></li>
                        <li><a href="Organization.php">公益組織</a></li>
                        <li><a href="History(a).php">愛心回顧</a></li>
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
            <!------------------------------------------------>
            <!--定義列表--------------------------------------->
            <!------------------------------------------------>
            <div class="content">
			<?php
					$email=$_SESSION['email'];
					$sql = "SELECT * FROM customer where email= '$email' ";
					$data = mysql_query($sql) or die(mysql_error());
					$row = mysql_fetch_array($data);
					
					
					if (preg_match("/無/i", $row["language"])){
						 $checked[0] = "checked";
					}
					if (preg_match("/台語/i", $row["language"])){
						 $checked[1] = "checked";
					}
					if (preg_match("/客語/i", $row["language"])){
						 $checked[2] = "checked";
					}
					if (preg_match("/日語/i", $row["language"])){
						 $checked[3] = "checked";
					}
					if (preg_match("/英語/i", $row["language"])){
						 $checked[4] = "checked";
					}
					if (preg_match("/男/i", $row["gender"])){
						 $selected[2] = "selected";
					}
					if (preg_match("/女/i", $row["gender"])){
						 $selected[3] = "selected";
					}
					if (preg_match("/葷食/i", $row["foodHabit"])){
						 $selected[0] = "selected";
					}
					if (preg_match("/素食/i", $row["foodHabit"])){
						 $selected[1] = "selected";
					}

					 
				
			?>
				<form action="userUpdate_finish.php"  method="post" enctype="multipart/form-data">
					<input type="hidden"  name="profilePic" value="<?php echo $row['profilePic']?>">
					<img class="photo" src="cus-comImg/<?php echo $row['profilePic'] ?>" width="200px">					
					<div class="alldata">
					<table>
							<tr>
								<td><strong>益寶名稱(無法修改):</strong> <?php echo $row[cusName];?></td>
								<td><strong>Email(無法修改):</strong> <?php echo "<input type=\"text\" name=\"email\" value=\"$row[email]\" readonly=\"value\" style=\"border-style:none;\"/>"?></td>
							</tr>
							<br/>
							<tr>
								<td>
								<strong>性別:</strong>
								<?php echo "<select name=\"gender\">
							　	<option value=\"男\" $selected[2]>男性</option>
							　	<option value=\"女\" $selected[3]>女性</option>
								</select>" ?>
								</td>
								<td><strong>生日:</strong> <?php echo "<input type=\"date\" name=\"birth\" value=\"$row[birth]\" />";?></td>
							</tr>
							<br/>
							<tr>
								<td><strong>身分證字號(無法修改):</strong></br><?php echo $row[identity]?></td>
								<td><strong>連絡電話:</strong> <?php echo "<input type=\"text\" name=\"phone\" value=\"$row[phone]\" style=\"width:100px\"/ maxlength=\"10\">";?></td>
							</tr>
							<br/>
							<tr>
								<td><strong>職業:</strong> <?php echo "<input type=\"text\" name=\"job\" value=\"$row[job]\" style=\"width:100px\"/>";?></td>
						
								<td>
									<form><strong>擅長語言:</strong> <br>									
									<input type="checkbox" name="language[]" value="無" <?php echo $checked[0] ?>>無
									<input type="checkbox" name="language[]" value="台語" <?php echo $checked[1] ?>>台語
									<input type="checkbox" name="language[]" value="客語" <?php echo $checked[2] ?>>客語</br>
									<input type="checkbox" name="language[]" value="日語" <?php echo $checked[3] ?>>日語
									<input type="checkbox" name="language[]" value="英語" <?php echo $checked[4] ?>>英語
												
									其他: <?php echo  "<input type=\"text\" name=\"other\" value=\"$row[otherLanguage]\" style=\"width:100px\" />";?>										
									
									</form>
								</td>
							</tr>
							<tr>
								<td>
									<strong>飲食習慣:</strong> 
									<?php echo "<select name=\"foodHabit\">
										　<option value=\"葷食\" $selected[0]>葷食</option>
										　<option value=\"素食\" $selected[1]>素食</option>
										</select>" 
									?>
								
								</td>
							</tr>
							<br/>
							<tr>
								<td colspan="2" class="Introduce"><strong>自我介紹:</strong></br>             
									<?php echo "<textarea name=\"cusIntro\" cols=\"45\" rows=\"5\">$row[cusIntro]</textarea>" ?>
									
								</td>
							</tr>
							<tr>	
								<td>修改密碼: <?php echo "<input type=\"password\" name=\"pw\" value=\"$row[password]\" />";?></td>
							</tr>
							<tr>
								<td>再次確認密碼:<?php echo "<input type=\"password\" name=\"pw2\" value=\"$row[password]\" />";?></td>
							</tr>	
						</table>
						<label><img src="images/thumbnail.png" /><input type="file" name="file" class="photobt"></label></br>
					</div>
					<input type="submit" class="submit" value="儲存">
                </form>
				
			</div>
		</div>
	</div>
    <!------------------------------------------------>
    <!------------------------------------------------>
    <div class="totop">
        <img src="images/totop.png" id="btn">
    </div>


    <!------------------------------------------------>
    <!------------------------------------------------>

    <div class="footer">
        <h3>Copyright © 2018 益尋愛 怡仁愛心基金會</h3>
    </div>

    <!--==========================================-->

    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="js/totop.js"></script>

    <script src="js/navbar.js"></script>
    <script src="js/myDropdownMenu.js"></script>
	<script src="js/preview.js"></script>



</body>

</html>