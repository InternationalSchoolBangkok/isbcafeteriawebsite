<?php
$foodArray = ["asian","continental","noodle","japanese","veggies","live"];
$dayArray = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
$lDayArray = ["monday","tuesday","wednesday","thursday","friday"];
$cache = array();
if(file_exists("editor/phpcache")){
	$cache = unserialize(file_get_contents("editor/phpcache"));//array associating filename to extension
}
$displayWeek = $cache["current-week"];
?>
<!--Redirect if user has no Javascript-->
<noscript>
	<META HTTP-EQUIV="Refresh" CONTENT="0;URL=error.html">
	</noscript>

</noscript>

<head>
	<title>Caffeteria</title>
	<!--Load dem Css files-->
	<link rel="stylesheet" type="text/css" href="jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
	<script src="jquery.min2.js"></script>
	<!--Temp Css Loader-->
	<style>

	/* Main Text Styles
	----------------------------------------*/
	h1{
		font-size: 3em;
		font-family:'Kaushan Script';
        font-style: italic;
		color: #fff;
		margin:0;
		margin-top: -50px;
		padding:30px 0 0 0;
        
        
        /*Comment this out to remove grey menu*/
	}

	.intro p{
		color: #fff;
		padding:40px 0 0 0;
	}

	body{
		font-family: helvetica;
		color: #333;
		height:100%;
		width:100vw;
		position: relative;
        -webkit-text-size-adjust: auto;
	}

	/* Section Styling
	* --------------------------------------- */
	.section{
		text-align:center;
		position: relative;
	}


	/* Page 1 Navigation
	* --------------------------------------- */
	nav ul li{
		display:inline-block;
		font-size:2em;
		padding-left:2vw;
		padding-right:2vw;
		padding-top: 5vh;
	}

	a{
		color:black;
	}
	.slide{
		padding-top:5vh;
		width:100vw;
		position: relative;

	}
	/* Individual Dates
	* --------------------------------------- */
	#slide1{
		background-color:#7EE081;

	}
	#slide2{
		background-color: #C6D8FF;

	}
	#slide3{
		background-color: #8789C0;
	}
	#slide4{
		background-color: #DDD8C4;
	}
	#slide5{
		background-color: #FFA630;
	}

	/* Individual Dates
	* --------------------------------------- */
	table{
		margin: 0 auto;
        margin-top:5vh;
		width:80vw;
	}

	table td{
		width: 12vw;
		height:auto;
		position: relative;
        margin: 0;
        font-size: 20px;
	}
        
    table tr{
        text-align: center;        
    }
    
    table tr:first-child td{
        border-style: none;
        border-bottom: 1px solid black;
        margin-bottom: 2vh;


    }
    table tr{
        margin-bottom: 10vh;    
    }

	table tr td img{
		width:12vw;
		object-fit: cover;
        line-height: 0;
        

	}
	.fp-controlArrow{
		margin-top:0vh;
	}


	/*
	*/
	.menubar {
		background-color: #484A47;
		left: -10vw;
		position: fixed;
		height:100%;
		width:10vw;
		float:left;

	}


	.menubar ul {
		list-style: none;
		position: absolute;
		margin: auto;
		padding-top: 3vh;

	}
	.menubar li :first-child{
		padding-top: -5vh;
	}

	.menubar li {
		display: inline-block;
		padding-left: 3vw;
		padding-bottom:3vh;


	}

	.menubar a {
		color: #ECEBF0;
		font-size: 15px;

	}

	.button-close {
	}

	.menuclicky {
		z-index:9999999;
		position: absolute;
		top:3vh;
		left:1vw;
		width: 100%w;
		color: white;
		text-align: center;
		text-decoration: none;
		text-transform: uppercase;
		transition: all 0.2s ease-in;
		cursor:pointer;
	}

	/*Modal Stuff
	-----------------------------------*/
	#overlay {
		position:fixed;
		top:0;
		left:0;
		width:100%;
		height:100%;
		background:#000;
		opacity:0.5;
		filter:alpha(opacity=50);
		z-index: 100;
	}

	#modal {
		position:absolute;
		/*background:url(tint20.png) 0 0 repeat;*/
		background:rgba(0,0,0,0.2);
		border-radius:14px;
		padding:8px;
		z-index: 101;
		max-width: 50vw;
	}

	#content {
		border-radius:8px;
		background:#fff;
		padding:20px;
	}

	#close {
		position:absolute;
		background:url("/resources/icons/close.png") 0 0 no-repeat;
		width:24px;
		height:27px;
		display:block;
		text-indent:-9999px;
		top:-7px;
		right:-7px;
	}
	img.modal-img{
		max-width: 100%;
		max-height: 70vh;
	}
	</style>


	<!--Javascript/JQuery-->
	<!--Load the plugin-->
	<!--Fullpage.js-->
	<script type="text/javascript" src="jquery.fullPage.js"></script>
	<!--Modal Stuff-->

	<!--Custom JS for later-->
	<script src="js.js"></script>
	<!--Settings for scroll plugin-->
	<script type="text/javascript">
	$(document).ready(function() {
		$('#fullpage').fullpage({
			anchors: ['firstPage', 'secondPage', '3rdPage'],
			sectionsColor: ['#4A6FB1', '#939FAA', 'red'],
			scrollingSpeed: 300,
			autoScrolling:false,
			scrollBar: true,
			scrollOverflow: true
		});
	});
	</script>
	<script>
	var modal = (function(){
		var
		method = {},
		$overlay,
		$modal,
		$content,
		$close;

		// Center the modal in the viewport
		method.center = function () {
			var top, left;

			top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
			left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;

			$modal.css({
				top:top + $(window).scrollTop(),
				left:left + $(window).scrollLeft()
			});
		};

		// Open the modal
		method.open = function (settings) {
			$content.empty().append(settings.content);

			$modal.css({
				width: settings.width || 'auto',
				height: settings.height || 'auto'
			});

			method.center();
			$(window).bind('resize.modal', method.center);
			$modal.show();
			$overlay.show();
		};

		// Close the modal
		method.close = function () {
			$modal.hide();
			$overlay.hide();
			$content.empty();
			$(window).unbind('resize.modal');
            
		};

		// Generate the HTML and add it to the document
		$overlay = $('<div id="overlay"></div>');
		$modal = $('<div id="modal"></div>');
		$content = $('<div id="content"></div>');
		$close = $('<a id="close" href="#">close</a>');

		$modal.hide();
		$overlay.hide();
		$modal.append($content, $close);

		$(document).ready(function(){
			$('body').append($overlay, $modal);
		});

		$overlay.click(function(e){
			e.preventDefault();
			method.close();
		});
        $close.click(function(e){
			e.preventDefault();
			method.close();
		});

		return method;
	}());

	// Wait until the DOM has loaded before querying the document
	$(document).ready(function(){
		/*$.get('ajax.html', function(data){
		modal.open({content: data});
	});*/
	$('a.imgholder').click(function(event){
		var id = event.target.id;
		var allDescriptions = {
			<?php
			//this php method prints out all of the descriptions that have been entered by the admin
			echo "dummy:'NA'";
			foreach($cache["descriptions"] as $key => $value){
				$value = addslashes ($value);
				echo ",".$key.":'".$value."'";
			}
			?>
		};
		var img = event.target.src;
		var description = allDescriptions[id];
		if(!description){
			description = "";
		}
		var content = "<img class='modal-img' src='"+img+"'/><br>"+description;
		if(img.indexOf("/editor/images/blank.png") == -1||description!=""){
			modal.open({content: content});
		}
		event.preventDefault();
	});
	$(document).keyup(function(e) {
		if (e.keyCode == 27){
			modal.close();
		}
	});
});
</script>

</head>
<body>
	<div class='menuclicky'>Menu</div>
	<div class='menubar'>
		<ul>
			<li><a class='button-close'>Close</a></li>
			<li><a href='#slide1'>Monday</a></li>
			<li><a href='#slide2'>Tuesday</a></li>
			<li><a href='#slide3'>Wednesday</a></li>
			<li><a href='#slide4'>Thursday</a></li>
			<li><a href='#slide5'>Friday</a></li>

			<li><a href='editor/'>Upload</a></li>
		</ul>
	</div>

	<div id="fullpage">
		<div id="nicP" style="display:none; z-index: 100000;">
			<p>Biography <br><a href="#" rel="modal:close">Close</a> </p>
		</div>


		<div class="section" id="section1">
			<div class="intro">
				<?php
				for($day=0;$day<5;$day++){
					echo "
					<div class='slide' id='slide".($day+1)."' data-anchor='slide".($day+1)."'>".
					"\n
					<h1>".$dayArray[$day]."</h1>
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
							$img = "week".$displayWeek.$lDayArray[$day].$foodArray[$col].($row+1);
							if($cache[$img]!=""){
								$extension = ".".$cache[$img];
							}else{
								$img =  "blank";
								$extension = ".png";
							}
							echo "<td class='tdhover'><a class='imgholder' href='#'><img id='".
							$img."'src='editor/images/".$img.$extension."'></a></td>";
						}
						echo "</tr>\n";
					}
					echo "</table>".
					"\n</div>".
					"\n</div>";
				}
				?>
			</div>
		</div>

	</div>
</body>
<script type="text/javascript">
var main = function (){
	$('.section').css("width", "100px");

	$('.section').css("width", "100vw");
	$('img').height($('img').width());
};
$( document ).ready(main);

</script>
</html>
