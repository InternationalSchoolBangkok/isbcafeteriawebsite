<?php if($_COOKIE["magic_word"]=="softdev1234"): ?>
<style>
img{
	width:100px;
}

</style>
<?php
$foodArray = ["asian","continental","noodle","japanese","veggies","live"];
$dayArray = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
$lDayArray = ["monday","tuesday","wednesday","thursday","friday"];
$cache = array();
if(file_exists("phpcache")){
	$cache = unserialize(file_get_contents("phpcache"));//array associating filename to extension
}
?>
<div class="section" id="section1">
	<?php
	for($day=0;$day<5;$day++){
		echo "<div class='slide' id='slide".($day+1)."' data-anchor='slide".($day+1)."'>".
		"\n<h1>".$dayArray[$day]."</h1>
		<div class='menu'>
		<table>
		<tr>
		<td>Asian</td>
		<td>Continental</td>
		<td>Noodle</td>
		<td>Japanese</td>
		<td>Vegetarian/Salads</td>
		<td>Live Station</td>
		</tr>";
		for($row=0;$row<4;$row++){
			echo "<tr>\n";
			for($col=0;$col<6;$col++){
				echo "<td class='tdhover'><img class='imghover' src='images/".$lDayArray[$day].
				$foodArray[$col].($row+1).".".$cache[$lDayArray[$day].$foodArray[$col].($row+1)]."'>".
				"\n<form action='upload.php' method='post' enctype='multipart/form-data'>".
				"\n<input type='file' name='".$lDayArray[$day].$foodArray[$col].($row+1)."'>".
				"\n<input type='submit'>".
				"\n</form>".     
                /*Delete Form*/
                "\n<form action='delete.php' method='post'>".
				"\n<input type='submit' name='delete' value='Delete'/>".
				"\n</form>".
				"\n</td>";
			}
			echo "</tr>\n";
		}
		echo "</table>".
		"\n</div>".
		"\n</div>";
	}
	?>
</div>
<?php else: ?>
<?php header("Location: pass.php"); ?>
<?php endif ?>
