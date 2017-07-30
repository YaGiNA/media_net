<?php
  if(strlen($_POST["name"]) != 0){
    $name = htmlspecialchars($_POST["name"]);
  }
  else {
    $name = "no name";
  }
  date_default_timezone_set("Asia/Tokyo");
  $time = date("Y/m/j H:i:s");
  $content = htmlspecialchars($_POST["content"]);

  $fp = fopen("./log.csv", "a");
  flock($fp, LOCK_EX);

  $line = $name.",".$time.",".$content."\n";
  fputs($fp, $line);

  flock($fp, LOCK_UN);
  fclose($fp);
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>投稿を受け付けました</title>
   </head>
   <body>
     <header>
       <h1>投稿内容</h1>
     </header>
     <?php
      echo "<p><b>名前: ".$name."</b> 投稿日時: <time>".$time."</time><br>".$content."</p>";
      ?>
      <hr>
      <p>
        <a href="./review.php" target="_self">掲示板に戻る</a><br>
        <a href="./index.html" target="_self">トップに戻る</a>
      </p>
      <footer>
        <p><small>&copy;copyright 2017 y.yanagi</small></p>
      </footer>
   </body>
 </html>
