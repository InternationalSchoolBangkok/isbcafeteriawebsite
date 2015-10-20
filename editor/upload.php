<html>
<head>
	<script>
	function onload(){
		setTimeout(goBack,1200);
	}
 function goBack(){
	 document.location = "/editor/index.php";
 }
	</script>
</head>
<body onload="onload()">
	<h1>
	<?php
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
	//echo $target_file."<br>";
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($file["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check file size
	if ($file["size"] > 5000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($file["tmp_name"], $target_file)) {
			echo "The file ". basename( $file["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	file_put_contents("phpcache",serialize($cache));
	?>
</h1>
<br>
<a>You will be returned to the previous page<a>
</body>
</html>
