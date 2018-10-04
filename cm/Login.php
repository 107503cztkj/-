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
										<label for="username" class="uname" data-icon="u" > 帳號 </label>
										<input id="username" name="ID" required type="text" />
									</p>
									<p> 
										<label for="password" class="youpasswd" data-icon="p"> 密碼 </label>
										<input id="password" name="pw" required type="password" /> 
									</p>
									<p class="forget"><a href="pwForget.php">忘記密碼?</a></p>
									<p class="login button"> 
										<input type="submit" value="登入"> 
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
