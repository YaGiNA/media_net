<?php
  $id = htmlspecialchars($_POST["id"]);
  $pw = htmlspecialchars($_POST["pw"]);
  $filename = "./list.csv";
  $dest = "./secret.php";

  // check of null
  if(strcmp($id, "") == 0 || strcmp($pw, "") == 0){
    exit("Error: ID or password is not given.");
  }

  if(!file_exists($filename)){
    exit("Error: There is no users.");
  }

  $fp = fopen($filename, "r+");
  flock($fp, LOCK_EX);
  $flag = false;

  // Make $flag true when there is no different between hash of ID + PW
  while ($line = fgetcsv($fp)) {
    if (
      strcmp($line[0], $id) == 0 && strcmp($line[1], hash("sha256", $pw) == 0)
    ) {
      $flag = true;
      break;
    }
  }

  flock($fp, LOCK_UN);
  fclose($fp);

  // Move to userpage when identifying of ID + PW is succeeded.
  if ($flag) {
    setcookie("id", $id, time()+30);
    header("HTTP/1.1 301 Moved Permanetly");
    header("Location: $dest");
    exit;
  }
  else{
    exit("Error: Invalid of ID + PW");
  }
 ?>
