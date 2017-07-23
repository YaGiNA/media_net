<?php
  if (is_readable("answer_list.csv") && $fp=fopen("answer_list.csv", "r")) {
    flock($fp, LOCK_SH);

    $cnt["kahaku_vi"] = 0;
    $cnt["nmwa_vi"] = 0;
    $cnt["tnm_vi"] = 0;
    $cnt["parasite_vi"] = 0;

    $cnt["kahaku_wa"] = 0;
    $cnt["nmwa_wa"] = 0;
    $cnt["tnm_wa"] = 0;
    $cnt["parasite_wa"] = 0;

    while ($csvline = fgets($fp)) {
      $data = explode(",", trim($csvline, "\n"));
      for ($i=2; $i < count($data); $i++) {
        $menu = (string)$data[$i];
        if (isset($cnt[$menu])) {
          $cnt[$menu]++;
        }
      }
    }
    flock($fp, LOCK_UN);
  }
 ?>
 <!DOCTYPE html>
 <!DOCTYPE HTML>
 <html lang="en-US">
 <head>
 <meta charset="UTF-8">
 <title>Enquete</title>
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
         <li><a href="enquete.html" class="active">Enquete</a>
         </li>

         <li><a href="login.html">Login</a></li>
       </ul>
     </div>
     <!-- End Menu -->


     <div class="sidebox">
     <ul class="share">
     	<li class="item twitter"></li>
     </ul>
     </div>


 	</div>
 	<!-- End Sidebar -->

 	<!-- Begin Content -->
 	<div id="content">
    <?php if(is_readable("./enquete.html")): ?>
      <h1 class="title">結果</h1>
    	<div class="line"></div>
    	<div class="intro">集計結果は以下の通りです。</div>
      <table>
        <tr>
          <th>訪れたことがある博物館･美術館</th><th>投票数</th>
        </tr>
        <tr>
          <th>国立科学博物館</th>
          <th>
            <?php echo $cnt["kahaku_vi"]; ?>
          </th>
        </tr>
        <tr>
          <th>国立西洋美術館</th>
          <th>
            <?php echo $cnt["tnm_vi"]; ?>
          </th>
        </tr>
        <tr>
          <th>東京国立博物館</th>
          <th>
            <?php echo $cnt["kahaku_vi"]; ?>
          </th>
        </tr>
        <tr>
          <th>目黒寄生虫館</th>
          <th>
            <?php echo $cnt["parasite_vi"]; ?>
          </th>
        </tr>
      </table>
      <div class="clear"></div>
      <table>
        <tr>
          <th>行ってみたい博物館･美術館</th><th>投票数</th>
        </tr>
        <tr>
          <th>国立科学博物館</th>
          <th>
            <?php echo $cnt["kahaku_wa"]; ?>
          </th>
        </tr>
        <tr>
          <th>国立西洋美術館</th>
          <th>
            <?php echo $cnt["nmwa_wa"]; ?>
          </th>
        </tr>
        <tr>
          <th>東京国立博物館</th>
          <th>
            <?php echo $cnt["tnm_wa"]; ?>
          </th>
        </tr>
        <tr>
          <th>目黒寄生虫館</th>
          <th>
            <?php echo $cnt["parasite_wa"]; ?>
          </th>
        </tr>
      </table>
      <p>
        <a href="./enquete.html" target="_self">フォームに戻る</a>
      </p>
    <?php else: ?>
      <p>CSVファイルがありません。前回講義の実習は終わりましたか？</p>
    <?php endif; ?>
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
<script type="text/javascript" src="style/js/tweet.js"></script>
<script type="text/javascript" src="style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="style/js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
