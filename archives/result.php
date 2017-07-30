<?php
  if (is_readable("result.csv") && $fp=fopen("result.csv", "r")) {
    flock($fp, LOCK_SH);

    $cnt["ct"] = 0;
    $cnt["cc"] = 0;
    $cnt["sh"] = 0;

    while ($csvline = fgets($fp)) {
      $data = explode(",", trim($csvline, "\n"));
      if (count($data) == 3) {
        $menu = (string)$data[2];
        if (isset($cnt[$menu])) {
          $cnt[$menu]++;
        }
      }
    }
    flock($fp, LOCK_UN);
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>enquete結果</title>
  </head>
  <body>
    <?php if(is_readable("./form.html")): ?>
      <header>
        <h1>みんなの好きなメニュー</h1>
        現時点でのenquete結果です
      </header>
      <p>
        商品名 獲得数[票]<br>
        チキンおろしたれ <?php echo $cnt["ct"] ?><br>
        クリームチーズメンチカツ <?php echo $cnt["cc"] ?><br>
        カツカレー <?php echo $cnt["sh"] ?><br>
      </p>
      <p>
        <a href="./form.html" target="_self">フォームに戻る</a>
      </p>
    <?php else: ?>
      <p>CSVファイルがありません。前回講義の実習は終わりましたか？</p>
    <?php endif; ?>
    <footer>
      <p><small>&copy;copyright 2017 y.yanagi</small></p>
    </footer>
  </body>
</html>
