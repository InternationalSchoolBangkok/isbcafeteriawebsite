<?php if($_COOKIE["magic_word"]=="softdev1234"): ?>
  <html>
  <head>
    <title>Editor</title>
  </head>
  <body>
    <a>Click on one of the links below in order to edit that week.</a>
    <ul>
      <li><a href="week.php?week=1">Week 1</a></li>
      <li><a href="week.php?week=2">Week 2</a></li>
      <li><a href="week.php?week=3">Week 3</a></li>
      <li><a href="week.php?week=4">Week 4</a></li>
    </ul>
    <a>To change the current week on display, select the current week and submit.</a>
    <form method="post" action="week-select.php">
    <select name="current-week">
        <?php
        $cache = array();
        if(file_exists("phpcache")){
        	$cache = unserialize(file_get_contents("phpcache"));//array associating filename to extension
        }
        $selected = $cache["current-week"];
        for($i=1;$i<=4;$i++){
          if ($i == $selected){
            $selectIt = "selected";
          }else{
            $selectIt = "";
          }
          echo "<option value='".$i."' ".$selectIt.">Week ".$i."</option>\n";
        }
        ?>
    </select>
    <INPUT TYPE="submit" name="submit" />
</form>
  </body>
  </html>
<?php else: ?>
  <?php header("Location: pass.php"); ?>
<?php endif ?>
