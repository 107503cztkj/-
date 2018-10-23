<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
<meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
<meta name="author" content="Codrops" />
<link rel="shortcut icon" href="../favicon.ico"> 
<link rel="stylesheet" type="text/css" href="css/demo(login).css" />
<link rel="stylesheet" type="text/css" href="css/style(login).css" />
<link rel="stylesheet" type="text/css" href="css/animate-custom(login).css" />
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/myDropdownMenu.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />

</head>
<body>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '177194299649195',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v3.0&appId=177194299649195&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
                            <a class="dropdown-toggle" href="Login.php">益寶登入</a>
                        
                            
                        </li>
                    </ul>            
                </div>   
            </div> 
            <!--~~~~~~~~~~~~--> 
            <!------------------------------------------------>
            <!--定義列表--------------------------------------->
            <!------------------------------------------------>
            <section class="content">							
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                 	<a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="loginCon.php" method="POST">
								<form  action="mysuperscript.php" autocomplete="on"> 
									<h1>登入</h1> 
									  
									<p> 
										<label for="username" class="uname" data-icon="u" > 輸入您的信箱 </label>
										<input id="username" name="email" required type="text" placeholder="123myemail@mail.com"/>
									</p>
									<p> 
										<label for="password" class="youpasswd" data-icon="p"> 輸入密碼 </label>
										<input id="password" name="pw" required type="password" placeholder="eg. X8df!90EO" /> 
									</p>
									<p class="keeplogin"> 
										<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
										<label for="loginkeeping">記住我</label>
									</p> 
								
                                    <p class="forget"><a href="pwForget.php">忘記密碼?</a></p>
									
									<div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
									<p class="login button"> 
										<input type="submit" value="登入"> 
									</p>									
																	<p class="change_link">
										還不是益尋愛會員嗎 ?
										<a href="#toregister" class="to_register">加入益尋愛</a>
									</p>
							</form>
						</form>	
                        </div>
					
						
                        <div id="register" class="animate form">
						<form action="register_finish.php"  method="post" >
                            <form  action="mysuperscript.php" autocomplete="on"> 
                                <h1> 註冊 </h1>
								
                                <p> 
                                    <label for="input-email">Email 帳號*</label>
									<input type="email" class="form-control" required id="input-email" name="email" placeholder="123yourmail@mail.com">
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname">您的姓名(請確實填寫真名)*</label>
                                    <input type="cusName" name="cusName" required placeholder="郭小董"/>
                                </p>
                                 <p> 
                                    <label for="ID" class="ID"> 身分證字號*</label>
                                    <input id="ID" name="ID" required placeholder="A123456789"/> 
									 
                                </p>
                                <p> 
                                    <label>性別*</label>                                   
									<select name="gender">
									　<option value="男">男</option>
									　<option value="女">女</option>
									</select>
                                </p>
								<p>
									<label>生日*</label>  
									<div class="input-append date form-group" id="dp3" data-date-format="yyyy/mm/dd">
									<input type="date"  class="form-control" name="birth" required /></div>
								</p>
								<p> 
                                    <label for="phone" class="phone">連絡電話(手機)*</label>
                                    <input id="phone" name="phone" required type="phone" placeholder="0912345678"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd">輸入密碼*</label>
                                    <input id="password" name="pw" required type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd">再次確認密碼*</label>
                                    <input id="password2" name="pw2" required type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="cusIntro" class="introduce">介紹你自己</label><br>
                                  	<textarea id="contact_list" name="cusIntro"  style="width:440px;height:80px;"></textarea>
									
                                </p>
                                <p class="signin button"> 
							
							
									<input type="submit" name="button" value="註冊" />
								</p>
                                <p class="change_link">  
									已註冊 ?
									<a href="Login.php" class="to_register"> 登入益尋愛 </a>
	
								</p>
                            </form>
						</form>	
						</div>
                    
					
					</div>
                </div> 
				
            </section>
	</div>
    </div>
    </div>  
    
	<!------------------------------------------------>
	<!------------------------------------------------>
   <div class="totop">
        <a href="#">
            <img src="images/totop.png" id="btn">
        </a>
    </div>
	<!------------------------------------------------>
	<!------------------------------------------------>
    
    <div class="footer">
        <h1><font size="+1"><font color="#666">Copyright © 2018 益尋愛  怡仁愛心基金會</font></font></h1>
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
           
           
</body>
</html>
