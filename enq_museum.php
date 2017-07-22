<?php
if(strlen($_POST["name"]) != 0){
  $name = $_POST["name"];
  $course = $_POST["course"];
  if (isset($_POST['visited']) && is_array($_POST['visited'])) {
    $visited_csv = implode(", ", $_POST["visited"]);
  } else {
    $visited_csv = "null";
  }

  if (isset($_POST['want']) && is_array($_POST['want'])) {
    $want_csv = implode(", ", $_POST["want"]);
  } else {
    $want_csv = "null";
  }

  $fp = fopen("./answer_list.csv", "a+");
  flock($fp, LOCK_EX);
  $output = join(",", array($name, $course, $visited_csv, $want_csv))."\n";
  fputs($fp, $output);
  flock($fp, LOCK_UN);
  fclose($fp);

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
        <li><a href="index.html" class="active">Home</a>
        </li>
        <li><a href="museums.html">Museums</a>
        </li>
        <li><a href="review.html">Review(BBS)</a>
        </li>
        <li><a href="enquete.html">Enquete</a>
        </li>
        <li><a href="contact.html">Contact Us</a></li>
        <li><a href="login.html">Login</a></li>
      </ul>
    </div>
    <!-- End Menu -->


    <div class="sidebox">
    <ul class="share">
    	<li><a href="#"><img src="style/images/icon-rss.png" alt="RSS" /></a></li>
    	<li><a href="#"><img src="style/images/icon-facebook.png" alt="Facebook" /></a></li>
    	<li><a href="#"><img src="style/images/icon-twitter.png" alt="Twitter" /></a></li>
    	<li><a href="#"><img src="style/images/icon-dribbble.png" alt="Dribbble" /></a></li>
    	<li><a href="#"><img src="style/images/icon-linkedin.png" alt="LinkedIn" /></a></li>
    </ul>
    </div>


	</div>
	<!-- End Sidebar -->

	<!-- Begin Content -->
	<div id="content">
  <?php if(strlen($_POST["name"]) != 0): ?>
	<h1 class="title">回答ありがとうございました</h1>
	<div class="line"></div>
	<div class="intro">回答内容は以下の通りです。</div>
      <table>
        <tr>
          <th>氏名</th><th><?php echo $name ?></th>
        </tr>
        <tr>
          <th>コース</th><th><?php echo $course ?></th>
        </tr>
        <tr>
          <th>行ったことがある美術館･博物館</th>
          <th>
            <?php
            echo $visited_csv
            ?>
          </th>
        </tr>
        <tr>
          <th>行ってみたい美術館･博物館</th>
          <th>
            <?php
            echo $want_csv
            ?>
          </th>
        </tr>
      </table>
      <p>
        ※凡例
        コース名: md(メディア情報学), sc(セキュリティ情報学)<br>
        博物館･美術館名: kahaku(国立科学博物館), nmwa(国立西洋美術館), <br>
        tnm(東京国立博物館), parasite(目黒寄生虫館) <br>
        末尾: _vi(訪れたことがある), _wa(訪れたい)
        null: 選択なし
      </p>
      <p>
        <a href="./enq_result.php" target="_self">アンケート集計結果を見る</a>
        <a href="./enquete.html" target="_self">フォームに戻る</a>
      </p>
    <?php else: ?>
      <p>enquete入力に不備があります。enquete入力画面に戻って再入力してください。</p>
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
<script type="text/javascript" src="style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="style/js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>
