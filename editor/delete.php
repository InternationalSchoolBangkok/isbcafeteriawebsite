<?php
$cache = array();
if(file_exists("phpcache")){
  $cache = unserialize(file_get_contents("phpcache"));//array associating filename to extension
}
$target_dir = "images/";
//save the file according to their html "name" attribute
foreach($_POST as $key => $file){
    $imageFileType = $cache[$key];
    $target_file = $target_dir.$key.".".$imageFileType;
    unlink($target_file);
    unset($cache[$key]);
    break;
}
file_put_contents("phpcache",serialize($cache));
header("Location: index.php");
?>
