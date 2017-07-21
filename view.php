<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BBS</title>
  </head>
  <body>
    <header>
      <h1>掲示板(BBS)</h1>
    </header>
    <hr>
    <p>
      <b>投稿フォーム</b>
      <form action="post.php" method="post">
        名前:<input type="text" name="name"><br>
        投稿内容:<br>
        <textarea name="content" rows="4" cols="40"></textarea><br>
        <input type="submit" value="投稿">
      </form>
    </p>
    <hr>
    <?php
      if(is_file("./log.csv")){
        if(is_readable("./log.csv")){
          $fp = fopen("./log.csv", "r");
          flock($fp, LOCK_SH);
          $contents = array();

          while ($line = fgets($fp)) {
            $content = explode(",", $line);
            array_push($contents, $content);
          }
          $count = 0;
          for($i=count($contents)-1; $i>=0; $i--){
            if(count($content) == 3){
              $count++;
              $content = $contents[$i];
              echo "<p>".$count;
              echo ":<strong>名前: $content[0]</strong>  ";
              echo "投稿日時:<time>$content[1]</time><br>$content[2]</p>";
              echo "<hr>";
            }
          }
          flock($fp, LOCK_UN);
          fclose($fp);
        }
        else {
          echo "ファイルが開けません.";
        }
      }
      else {
        echo "投稿がありません。";
      }

     ?>
  </body>
</html>
