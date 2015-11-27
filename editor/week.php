	<script src="jquery.min2.js"></script>

<?php if($_COOKIE["magic_word"]=="softdev1234"): ?>
<?php
$week = $_GET["week"];//This is the week to EDIT not the week to display
if($week==""){
	header("Location: /editor/index.php");
}
?>
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
echo "<a>This page will edit week ".$week."</a><br><a href=/editor/index.php>Click here to return to the week select page</a>";
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
				$img = "week".$week.$lDayArray[$day].$foodArray[$col].($row+1);
				$extension = ".".$cache[$img];
				/*if($cache[$img]!=""){
					$extension = ".".$cache[$img];
				}else{
					$img =  "blank";
					$extension = ".png";
				}*/
				echo "<td class='tdhover'><img class='imghover' src='images/".$img.$extension."'>".
				"\n<form action='upload.php' method='post' enctype='multipart/form-data'>".
				"\n<input type='file' name='".$img."'>".
				"\n<input value='Submit Image' type='submit'>".
				"\n</form>".
				/*Delete Picture Form*/
				"\n<form action='delete.php' method='post'>".
				"\n<input type='submit' name='".$img."' value='Delete Image'/>".
				"\n</form>".
				/*Description Form*/
				"\n<form action='upload.php' method='post'>".
				"\n<textarea cols='20' rows ='3' name='".$img."'>".$cache["descriptions"][$img]."</textarea><br>".
				"\n<input value='Submit Description' type='submit'>".
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
<script>

;(function($){
  
    /**
     * Store scroll position for and set it after reload
     *
     * @return {boolean} [loacalStorage is available]
     */
    $.fn.scrollPosReaload = function(){
        if (localStorage) {
            var posReader = localStorage["posStorage"];
            if (posReader) {
                $(window).scrollTop(posReader);
                localStorage.removeItem("posStorage");
            }
            $(this).click(function(e) {
                localStorage["posStorage"] = $(window).scrollTop();
            });

            return true;
        }

        return false;
    }
    
    /* ================================================== */

    $(document).ready(function() {
        // Feel free to set it for any element who trigger the reload
        $('select').scrollPosReaload();
    });
  
}(jQuery));  
</script>