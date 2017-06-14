<?php
  $id = htmlspecialchars($_POST["id"]);
  $id = htmlspecialchars($_POST["pw"]);
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
    fputcsv($fp, Arrat($id, hash("sha256", $pw)));
  }
  flock($fp, LOCK_UN);
  fclose($fp);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ユーザ登録完了</title>
  </head>
  <body>
    <header>
      <h1>登録が完了しました。</h1>
    </header>
    ユーザ名　: <?php echo $id ?><br>
    パスワード: <?php echo $pw ?><br>
    <a href="./regist.html" target="_self">登録画面に戻る</a>
    <footer>
      <p><small>&copy; copyright 2017 y.yanagi</small></p>
    </footer>
  </body>
</html>
