<?php
include("db-contact.php");
include("function.php");
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" /><!--rwd-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>|益尋愛|</title>

<link href="css/Main.css" rel="stylesheet" type="text/css" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link href="css/Ideal-image-slider.css" rel="stylesheet" type="text/css" />
<link href="css/Default/default.css" rel="stylesheet" type="text/css" />
<link href="css/My-ideal-image-slider.css" rel="stylesheet" type="text/css" />

<link href="css/MyDropdownMenu.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="images/icon.jpg">
<link href="css/Head.css" rel="stylesheet" type="text/css" />
<link href="css/footer.css" rel="stylesheet" type="text/css" />
<link href="css/totop.css" rel="stylesheet" type="text/css" />

</head>
<body>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
  <div id="header-wrapper">
    <div class="container">
      <div id="header"> 
        <div id="slider">FindLove-logo.jpg
		 <img src="images/FindLove-logo.jpg" alt="Slide 1">
            <img src="images/banner1.png" alt="Slide 2">
            <img src="images/banner2.png" alt="Slide 3">
            <img src="images/banner3.png" alt="Slide 4">                
        </div> 
        <!--~~~~~~~~~~~~~~~~~~-->         
        <!--~~~導覽列~~~-->  
        <div class="navbar" id="my-element" >
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
      <div id="wrapper1">
          <div id="three-column" class="container">
              <div><span class="arrow-down"></span></div>
              
              <div id="tbox1">
                  <div class="title">
                      <a href="NewNews.php"><h2>|最新消息|</h2></a>
                  </div>
				  
				  <marquee  direction="up"  height="180px" scrollamount="2"onMouseOver="this.stop()" onMouseOut="this.start()" >
				  <?php
					$sql="select * from news Order By fdate desc";
					$data=mysql_query($sql) or die(mysql_error());
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
					?>
                  <p><a href="NewNews2.php?e=<?php echo $row['ID']?> "><?php cut_content($row['title'],17);?></a></p>
                  </p>
				  <?php
				  }
				  ?>
				  </marquee>
              </div> 
              <div id="tbox2"> 
                  <div class="title">
                      <a href="BSthing.php"><h2>|桃園大小事|</h2></a>
                  </div>
				  
				  <marquee  direction="up"  height="180px" scrollamount="2"onMouseOver="this.stop()" onMouseOut="this.start()" >
				   <?php
					$sql="select * from bsthing Order By fdate desc";
					$data=mysql_query($sql) or die(mysql_error());
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
					?>
                  <p><a href="BSthing2.php?e=<?php echo $row['ID']?> "><?php cut_content($row['title'],17); ?></a></p>
                  </p>
				   <?php
					}
				   ?>
				   </marquee>
				
              </div>
              
              <div id="tbox3">
                  <div class="title">
                      <a href="Downloadlist.php" style="text-decoration: none;"><h2>|下載專區|</h2></a>
                  </div>
				  
				  <marquee  direction="up"  height="180px" scrollamount="2"onMouseOver="this.stop()" onMouseOut="this.start()" >
				  <?php
					$sql="select * from download Order by fdate desc limit 0,10";
					$data=mysql_query($sql) or die(mysql_error());
					for($i=1;$i<=mysql_num_rows($data);$i++){
					$row=mysql_fetch_array($data);
					?>
					 
					<p><a href="Downloadlist.php"><?php cut_content($row['title'],17); ?></a></p>
					 
				   <?php
					}
				   ?>
				   </marquee>
              </div>	
      
      
              <div id="portfolio" class="container">
                  <div class="title">
                      <h2>活動花絮</h2>
                      <span class="byline">欣賞活動完整照片及影片</span> 
                  </div>
                  <ul class="gallery-wrapper">
                      <li>
                        <a href="#image-1">
                          <img src="images/01.jpg">
                        </a>
                      </li>
                      <li>
                        <a href="#image-2">
                          <img src="images/02.jpg">
                        </a>
                      </li>
                      <li>
                        <a href="#image-3">
                          <img src="images/03.jpg">
                        </a>
                      </li>
                      <li>
                        <a href="#image-4">
                          <img src="images/04.jpg">
                        </a>
                      </li>
                      <li>
                        <a href="#image-5">
                          <img src="images/05.jpg">
                        </a>
                      </li>
                      <li>
                        <a href="#image-6">
                          <img src="images/06.jpg">
                        </a>
                      </li>
                      <li>
                        <a href="#image-7">
                          <img src="images/07.jpg">
                        </a>
                      </li>
                      <li>
                        <a href="#image-8">
                          <img src="images/08.jpg">
                        </a>
                      </li>
                    </ul>
                    <!--大图容器-->
                    <div class="hidden-images-wrapper">
                      <div id="image-1">
                        <img src="images/01.jpg" />
                        <a class="img-prev" href="#image-8">上一張</a>
                        <a class="img-next" href="#image-2">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
                      <div id="image-2">
                        <img src="images/02.jpg" />
                        <a class="img-prev" href="#image-1">上一張</a>
                        <a class="img-next" href="#image-3">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
                      <div id="image-3">
                        <img src="images/03.jpg" />
                        <a class="img-prev" href="#image-2">上一張</a>
                        <a class="img-next" href="#image-4">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
                      <div id="image-4">
                        <img src="images/04.jpg" />
                        <a class="img-prev" href="#image-3">上一張</a>
                        <a class="img-next" href="#image-5">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
                      <div id="image-5">
                        <img src="images/05.jpg" />
                        <a class="img-prev" href="#image-4">上一張</a>
                        <a class="img-next" href="#image-6">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
                      <div id="image-6">
                        <img src="images/06.jpg" />
                        <a class="img-prev" href="#image-5">上一張</a>
                        <a class="img-next" href="#image-7">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
                      <div id="image-7">
                        <img src="images/07.jpg" />
                        <a class="img-prev" href="#image-6">上一張</a>
                        <a class="img-next" href="#image-8">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
                      <div id="image-8">
                        <img src="images/08.jpg" />
                        <a class="img-prev" href="#image-7">上一張</a>
                        <a class="img-next" href="#image-1">下一張</a>
                        <a class="img-close" href="#"></a>
                      </div>
              </div> 
          </div>
      </div>
    </div>
  </div>
  
  <div class="totop">
      <img src="images/totop.png" id="btn" title="回到頂部">
</div>

  <div class="footer">
    <h3>Copyright © 2018 益尋愛  怡仁愛心基金會</h3> 
  </div> 				

    <!--==========================================-->  
    
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <!--*********-->
    <!-- 載入js  -->
    <!--*********-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    
    <script src="js/ideal-image-slider.js"></script> 
    <script src="js/iis-bullet-nav.js"></script> 
    <script src="js/my-ideal-image-slider.js"></script>

    <script src="js/totop.js"></script>

	<script src="js/navbar.js"></script>
    <script src="js/myDropdownMenu.js"></script> 
           
</body>
</html>
