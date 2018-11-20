<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title  -->
<title>|益尋愛|</title>

<!-- ===================== All CSS Files ===================== -->

<!-- Style css -->
<link rel="stylesheet" href="Login.css">
<link rel="stylesheet" href="stylelogin.css">


<!-- Responsive css -->
<link rel="stylesheet" href="esponsive.css">

<!--[if IE]>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>


<header class="header_area">
	<!-- Top Header Area Start -->
	<div class="top_header_area hidden-xs">
		<div class="container">
						
						
					</div>
				</div>
			</div>
	
	<!-- Top Header Area  End -->

	<!-- Main Header Area Start -->
	<div class="main_header_area home2">
		<div class="">
			<div class="row">
			

				<div class="col-sm-9 col-xs-12">
					<!-- Menu Area -->
					<div class="main_menu_area">
						<div class="mainmenu">
							<nav>
								<ul id="nav">
									<li><a href="index.php">訊息專欄<i class="fa fa-caret-right" aria-hidden="true"></i>
</a>
										<ul class="sub-menu">
										<li><a href="downloadList.php">下載專區</a></li>
										<li><a href="bsThing.php">桃園大小事</a></li>
										<li><a href="newNews.php">最新消息</a></li>
									</ul>
									</li>
									<li><a href="EventNews.php">活動快訊<i class="fa fa-caret-right" aria-hidden="true"></i></a>											   									</li>
                                    <li><a href="Organization.php">公益組織<i class="fa fa-caret-right" aria-hidden="true"></i></a>											   									</li>
									<li><a href="History.php">愛心回顧<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
									<li><a href="About.php">關於益尋愛<i class="fa fa-caret-right" aria-hidden="true"></i>
</a>
												<ul class="sub-menu">
													<li><a href="Q&A.php">益尋愛Q&A </a></li>
												</ul>
											</li>
									<li class="current_page_item"><a href="Login.php">益寶登入<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									</li>
											
								</ul>
							</nav>
						</div>
						<!-- mainmenu end -->
						<!-- Search Button Area -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main Header Area End -->

	
</header>
<div class="space"></div>

 <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/logo.png" alt="sing up image"></figure>
                        <a class="signup-image-link">還不是益尋愛會員嗎?
						<a href="Toregister.php" class="signup-image-link">點我註冊!</a>
                    </div>
					
                    <div class="signin-form">
                        <h2 class="form-title">登入</h2>
                        <form action="loginCon.php" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="Email"><i class="fa fa-envelope-open-o"></i></label>
                                <input type="text" name="email" id="Email" placeholder="Email" required />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="fa fa-key"></i></label>
                                <input type="password" name="pw" id="your_pass" placeholder="密碼" required />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>記得我</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="登入"/>
                           </div>
                            
                            
                        </form>
						<p class="forget"><a href="pwForget.php">忘記密碼?</a></p>
                       
                    </div>
                </div>
            </div>
        </section>

    </div>
    
<!-- ===================== Awesome Feature 

	<!-- Bottom Footer Area Start -->
	<div class="footer_bottom_area">
		<div class="">
			<div class="row">
				
					<div class="footer_bottom wow fadeInDown">
						<p><font color="#FFFFFF">Copyright © 2018 益尋愛 怡仁愛心基金會</font></p>
					</div>
					<!-- Bottom Footer Copywrite Text Area End -->
				
			</div>
			<!-- end./ row -->
		</div>
		<!-- end./ container -->
	</div>
	<!-- Bottom Footer Area End -->
</footer>
<!-- ===================== Footer Area End ===================== -->

<!-- ===================== All jQuery Plugins ===================== -->

<!-- jQuery (necessary for all JavaScript plugins) -->
<script src="js/jquery-1.12.3.min.js"></script>

<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>

<!-- Nivoslider js -->
<script src="js/jquery.nivoslider.js"></script>
<script src="js/nivoslider-active.js"></script>

<!-- owl-carousel js -->
<script src="js/owl.carousel.min.js"></script>

<!-- Ajax Contact js -->
<script src="js/ajax-contact.js"></script>

<!-- Coundown js -->
<script src="js/coundown-timer.js"></script>

<!-- Meanmenu js -->
<script src="js/meanmenu.js"></script>

<!-- Magnific Popup js -->
<script src="js/jquery.magnific-popup.min.js"></script>

<!-- counterup and waypoint js -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/counterup.min.js"></script>

<!-- back to top js -->
<script src="js/jquery.scrollUp.js"></script>

<!-- wow js -->
<script src="js/wow.min.js"></script>

<!-- script js -->
<script src="js/custom.js"></script>

</body>
</html>
