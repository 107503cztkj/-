<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title  -->
<title>|益尋愛|</title>

<!-- ===================== All CSS Files ===================== -->

<!-- Style css -->
<link rel="stylesheet" href="Toregister.css">
<link rel="stylesheet" href="stylelogin.css">


<!-- Responsive css -->
<link rel="stylesheet" href="responsive.css">

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
									<li><a href="About.php">關於益尋愛<i class="fa fa-caret-down" aria-hidden="true"></i>
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
			<form action="register_finish.php" method="POST" class="register-form" id="register-form">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">註冊</h2>
                        
							<div class="form-group">
                                <label for="email"><i class="fa fa-envelope-open-o"></i></i></label>
                                <input type="email" name="email" id="email" placeholder="Email 帳號*" required />
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="fa fa-user-o"></i></i></label>
                                <input type="text" name="cusName" id="name" placeholder="姓名(請確實填寫真名)*" required />
                            </div>
                             <div class="form-group">
                                <label for="ID"><i class="fa fa-id-badge"></i></label>
                                <input type="ID" name="ID" id="ID" placeholder="身分證字號*" required />
                            </div>
                            <div class="form-group">
                                <label for="mw"><i class="zmdi zmdi-lock"></i></label>
                                <input type="mw" name="gender" id="mw" placeholder="性別*" required />
                            </div>
                            <div class="form-group">
                                <label for="hb"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="hb" name="birth" id="hb" placeholder="生日*" required />
                            </div>
                        
                    </div>
                    
                    
                    <div class="signup-image"></br></br>
                         
                            <div class="form-group">
                                <label for="phone"><i class="fa fa-mobile-phone"></i></label>
                                <input type="phone" name="phone" id="phone" placeholder="連絡電話"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fa fa-key"></i></label>
                                <input type="password" name="pw" id="password" placeholder="密碼*" required />
                            </div>
                              <div class="form-group">
                                <label for="password"><i class="fa fa-key"></i></label>
                                <input type="password" name="pw2" id="password" placeholder="再次確認密碼*" required />
                            </div>
                            <div class="form-group">
                              <textarea name="cusIntro" rows="4" cols="40" placeholder="簡單介紹一下自己吧！">

							</textarea>
                            </div>
                        	 
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="確定註冊"/>
                            </div>
                        
                    </div>
                </div>
			</form>	
            </div>
        </section>

    
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
