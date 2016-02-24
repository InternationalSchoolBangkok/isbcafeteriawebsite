<?php 
	if($_POST){
		$pw = $_POST['password'];
		if($pw == 'isbeatz'){
			setcookie("magic_word","softdev1234",time()+315360000,"/","",0);
			header("Location: index.php");
		}
	}
	
?>
<head>
	<title>Password Page</title>
</head>
<body style="text-align:center">
	<form action="pass.php" method="post">
		Password: <input type="password" name="password">
		<input type="submit" value="Submit">
	</form>
</body>

