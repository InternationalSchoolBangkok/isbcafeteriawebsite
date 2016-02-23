<?php if(getallheaders()["Pass"]!="isbeatz"): ?>
<head>
	<title>Password Page</title>
	<script Language="Javascript">
	function post(href,key,value){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("POST", href, false);
		xmlhttp.setRequestHeader(key, value);
		xmlhttp.send();
		return xmlhttp.responseText;
	}
	function submitPass(form){
		var pass = form.pass.value;
		if(pass != ""){
			post("pass.php","pass",pass);
			window.location = "index.php";
		}
		return false;
	}
	</script>
</head>
<body style="text-align:center">
	<form onSubmit="return submitPass(this)">
		Password: <input type="password" name="pass">
		<input type="submit" value="Submit">
	</form>
</body>
<?php else: ?><?php
setcookie("magic_word","softdev1234",time()+315360000,"/","",0);
header("Location: index.php");
?>
<?php endif ?>
