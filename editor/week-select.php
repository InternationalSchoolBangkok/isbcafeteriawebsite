<?php
$week = $_POST["current-week"];
if($week!=""){
  $cache = array();
  if(file_exists("phpcache")){
    $cache = unserialize(file_get_contents("phpcache"));//array associating filename to extension
  }
  $cache["current-week"]=$week;
  $referer = getallheaders()["Referer"];
  header("Location: ".$referer);
  file_put_contents("phpcache",serialize($cache));
  exit();
}else{
  exit();
}
?>
