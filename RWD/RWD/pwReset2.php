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
                 	
                    <div id="wrapper">
                        <div id="findpw" class="animate form">
                            <form action="pwReset3.php" method="POST">
								<form  action="mysuperscript.php" autocomplete="on"> 
									<h1>重設密碼</h1> 
									<p>Hi親愛的益寶[<?php echo $_COOKIE['cusName']?>]</p>   
									<p>Email帳號: <?php echo $_COOKIE['email']?></p> 
									<p> 
										<label for="username" class="uname">請輸入您的新密碼 </label>
										<input id="password" name="pw" required type="password" placeholder="123abc"/>
									</p>
									<p> 
										<label for="username" class="uname">再次輸入您的新密碼 </label>
										<input id="password" name="pw2" required type="password" placeholder="123abc"/>
									</p>
									
									<p class="login button"> 
										<input type="submit" value="送出"> 
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
