<?php
  $id = htmlspecialchars($_POST["id"]);
  $pw = htmlspecialchars($_POST["pw"]);
  $filename = "./list.csv";

  // Check of space
  if(strcmp($id, "") == 0 || strcmp($pw, "") == 0){
    exit("Error: ID or password is not given.");
  }

  if(!file_exists($filename)){
    touch($filename);
  }
  $fp = fopen($filename, "r+");
  flock($fp, LOCK_EX);
  $flag = false;
  while ($line = fgetcsv($fp)) {
    if(strcmp($line[0], $id) == 0){
      $flag = true;
      break;
    }
  }

  if($flag){
    exit("This ID is already exists.");
  }
  else{
    fputcsv($fp, Array($id, hash("sha256", $pw)));
  }
  flock($fp, LOCK_UN);
  fclose($fp);
 ?>

 <!DOCTYPE HTML>
 <html lang="en-US">
 <head>
 <meta charset="UTF-8">
 <title>Register</title>
 <link rel="shortcut icon" type="image/x-icon" href="style/images/favicon.png" />
 <link rel="stylesheet" type="text/css" href="style.css" media="all" />
 <link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
 <!--[if IE 7]>
 <link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
 <![endif]-->
 <!--[if IE 8]>
 <link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
 <![endif]-->
 <!--[if IE 9]>
 <link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
 <![endif]-->
 <script type="text/javascript" src="style/js/jquery-1.6.4.min.js"></script>
 <script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
 <script type="text/javascript" src="style/js/jquery.jcarousel.js"></script>
 <script type="text/javascript" src="style/js/jquery.prettyPhoto.js"></script>
 <script type="text/javascript" src="style/js/carousel.js"></script>
 <script type="text/javascript" src="style/js/jquery.flexslider-min.js"></script>
 <script type="text/javascript" src="style/js/jquery.masonry.min.js"></script>
 <script type="text/javascript" src="style/js/jquery.slickforms.js"></script>
 </head>
 <body>
 <!-- Begin Wrapper -->
 <div id="wrapper">
 	<!-- Begin Sidebar -->
 	<div id="sidebar">
 		 <div id="logo"><a href="index.html"><img src="style/images/logo.png" alt="Caprice" /></a></div>

 	<!-- Begin Menu -->
     <div id="menu" class="menu-v">
 			<ul>
         <li><a href="index.html">Home</a>
         </li>
         <li><a href="museums.html">Museums</a>
         </li>
         <li><a href="review.php">Review(BBS)</a>
         </li>
         <li><a href="enquete.html">Enquete</a>
         </li>

         <li><a href="login.html" class="active">Login</a></li>
       </ul>
     </div>
     <!-- End Menu -->


     <div class="sidebox">
     <ul class="share">

     	<li><a href="#"><img src="style/images/icon-facebook.png" alt="Facebook" /></a></li>
     	<li><a href="#"><img src="style/images/icon-twitter.png" alt="Twitter" /></a></li>


     </ul>
     </div>


 	</div>
 	<!-- End Sidebar -->

 	<!-- Begin Content -->
 	<div id="content">
 	<h1 class="title">ユーザ登録完了</h1>
 	<div class="line"></div>
 	<div class="intro">手続きが完了しました。</div>
    </header>
    ユーザ名　: <?php echo $id ?><br>
    パスワード: <?php echo $pw ?><br>
    <a href="./regist.html" target="_self">登録画面に戻る</a>
    <!-- Begin Footer -->
    <div id="footer">
      <div class="footer-box one-third">
      </div>
      <div class="footer-box one-third">
      <h3>About</h3>
      <p>これは、一都六県に所在する主な美術館や科学館の情報を掲載しております。</p>
      <p>Yuta Yanagi #1510151<br>
            <br>
            <span class="lite1">Tel:</span> 080 5054 8347<br>
            <span class="lite1">E-mail:</span> y1510151@edu.cc.uec.ac.jp</p>
      </div>

      <div class="footer-box one-third last">
      </div>
    </div>
    <!-- End Footer -->


    </div>
    <!-- End Content -->

    </div>
    <!-- End Wrapper -->
    <div class="clear"></div>
    <script type="text/javascript" src="style/js/scripts.js"></script>
    <!--[if !IE]> -->
    <script type="text/javascript" src="style/js/jquery.corner.js"></script>
    <!-- <![endif]-->
    </body>
    </html>
