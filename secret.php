<?php
  if(isset($_COOKIE["id"])){
    $name = $_COOKIE["id"];
  }
  else{
    $msg = "You are not permitted to view this page.<br>";
    $msg .= "Please return to <a href='./login.html'>login page</a> and login again.";
    exit($msg);
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>こんにちは</title>
  </head>
  <body>
    <header>
      <h1>こんにちは</h1>

    </header>
    ﾅｲﾈー　ﾅﾆﾓﾅｲﾈー
  </body>
</html>
