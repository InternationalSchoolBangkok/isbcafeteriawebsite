<?php
$output = "";
$cache = array();
if(file_exists("phpcache")){
	$cache = unserialize(file_get_contents("phpcache"));//array associating filename to extension
}
$target_dir = "images/";
$uploadOk = 0;
//save the file according to their html "name" attribute
foreach($_FILES as $key => $file){
	if(!is_null($file)){
		$uploadOk = 1;
		$imageFileType = pathinfo($file["name"],PATHINFO_EXTENSION);
		$target_file = $target_dir.$key.".".$imageFileType;
		$cache[$key] = $imageFileType;
		break;
	}
}
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($file["tmp_name"]);
	if($check !== false) {
		$text = $text."\n"."File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		$text = $text."\n"."File is not an image.";
		$uploadOk = 0;
	}
}
// Check file size
if ($file["size"] > 5000000) {
	$text = $text."\n"."Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
	$text = $text."\n"."Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	$text = $text."\n"."Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($file["tmp_name"], $target_file)) {
		//echo "The file ". basename( $file["name"]). " has been uploaded.";
	} else {
		$text = $text."\n"."Sorry, there was an error uploading your file.";
	}
}
file_put_contents("phpcache",serialize($cache));
if($uploadOk != 0){
	header("Location: index.php");
	exit();
}
?>
<html>
<head>
	<script>
	function onload(){
		setTimeout(goBack,5000);
	}
	function goBack(){
		document.location = "/editor/index.php";
	}
	</script>
</head>
<body onload="onload()">
	<h1>
		<?php echo $text; ?>
	</h1>
	<br>
	<a>You will be returned to the previous page in a few seconds</a>
</body>
</html>
