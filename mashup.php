<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>東京の天気</title>
  </head>
  <?php
    function uec_file_get_contents($url){
      $aContext = array(
        'http' => array(
          'proxy' => 'tcp://proxy.uec.ac.jp:8080',
          'request_fulluri' => True,
        ),
      );
      %cxContext = stream_context_create($aContext);

      $res = file_get_contents($url, False, $cxContext);
      return $res;
    }

    $url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=130010";
    $res = uec_file_get_contents($url, False, $cxContext);
    $json = json_decode($res, $assoc = true);

    date_default_timezone_set('Asia/Tokyo');
    $day = date("Y-m-d");

    foreach ($json["forecasts"] as $key) {
      if(strcmp($key["date"], $day) == 0){
        $datelabel = $key["datelabel"];
        $telop = $key["telop"];
        $image = $key["image"]["url"];

        if (isset($key["temperature"]["min"])){
          $min_temp = $key["temperature"]["min"]["celsius"];
        }
        else{
          $min_temp = "--";
        }
        if (isset($key["temperature"]["max"])){
          $max_temp = $key["temperature"]["max"]["celsius"];
        }
        else{
          $max_temp = "--";
        }
        break;
      }
    }
   ?>
  <body>
    <p>
      <?php echo $datelabel; ?>の天気 <br>
      <?php echo $telop; ?> <br>
      <img src=<?php echo $image; ?> alt=<?php echo $telop; ?>><br>
      最高気温:<?php echo $max_temp ?><br>
      最低気温:<?php echo $min_temp ?>
    </p>
    <footer>
      <p><small>&copy: copyright 2017- y.yanagi</small></p>
    </footer>
  </body>
</html>
