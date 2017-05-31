<?php
if(strlen($_POST["name"]) != 0){
  $name = $_POST["name"];
  $course = $_POST["course"];
  $menu = $_POST["menu"];

  $fp = fopen("./result.csv", "a+");
  flock($fp, LOCK_EX);
  $output = join(",", array($name, $course, $menu))."\n";
  fputs($fp, $output);
  flock($fp, LOCK_UN);
  fclose($fp);

}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>enquete受付完了</title>
  </head>
  <body>
    <?php if(strlen($_POST["name"]) != 0): ?>
      <header>
        <h1>回答ありがとうございました</h1>
        <p>回答内容は以下の通りです。</p>
      </header>
      <p>
        ※凡例
        コース名: md(メディア情報学), sc(セキュリティ情報学)<br>
        メニュー名: ct(チキンおろしたれ), cc(クリームチーズメンチカツ), sh(カツカレー)
      </p>
      <p>
        <a href="./result.php" target="_self">アンケート集計結果を見る</a>
        <a href="./form.html" target="_self">フォームに戻る</a>
      </p>
    <?php else: ?>
      <p>enquete入力に不備があります。enquete入力画面に戻って再入力してください。</p>
    <?php endif; ?>
    <footer>
      <p><small>&copy;copyright 2017 y.yanagi</small></p>
    </footer>
  </body>
</html>
