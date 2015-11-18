<?php
$foodArray = ["asian","continental","noodle","japanese","veggies","live"];
$dayArray = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
$lDayArray = ["monday","tuesday","wednesday","thursday","friday"];
$cache = array();
if(file_exists("editor/phpcache")){
	$cache = unserialize(file_get_contents("editor/phpcache"));//array associating filename to extension
}
?>
<head>
	<title>Caffeteria</title>
	<!--Load dem Css files-->
	<link rel="stylesheet" type="text/css" href="jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
    <script src="jquery.min.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="jquery.min2.js"></script> 
    <link rel="stylesheet" href="jquery.modal.css" type="text/css" media="screen" />

	<!--Temp Css Loader-->
	<style>

	/* Main Text Styles
	----------------------------------------*/
	h1{
		font-size: 2em;
		font-family: arial,helvetica;
		color: #fff;
		margin:0;
		margin-top: -50px;
		padding:30px 0 0 0;
	}

	.intro p{
		color: #fff;
		padding:40px 0 0 0;
	}

	body{
		font-family: arial,helvetica;
		color: #333;
        height:100%;
        width:100vw;
        position: relative;
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
		background-color: aqua;
        
	}
	#slide3{
		background-color: darkorange;
	}
	#slide4{
		background-color: darkmagenta;
	}
	#slide5{
		background-color: darksalmon;
	}

	/* Individual Dates
	* --------------------------------------- */
	table{
		margin: 0 auto;
	}
	table td{
        padding:10px;
        position: relative;
	}
        
	table tr td img{
        width:100px;
        height:100px;
       object-fit: cover;

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
    



.overlay {
    width:100px;
    height:100px;
    background-color: rgba(0,0,0,0.5);
    position: absolute;
    top: 10px;
    left: 10px;
    text-decoration: none;
    color: #fff;
    display: none;
}


.overlay .description {
    text-align: center;
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: rgba(0,0,0,0.80);
    width: 100%;
    margin: 0;
}



td:hover .overlay {
    display: block;
}
    


	</style>


	<!--Javascript/JQuery-->
	<!--Load the plugin-->
	<!--Fullpage.js-->
	<script type="text/javascript" src="jquery.slimscroll.min.js"></script>
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
                    
                <li><a href='editor/pass.php'>Upload</a></li>
                </ul>
                </div>

	<div id="fullpage">
        <div id="nicP" style="display:none; z-index: 100000;">
    <p>Biography <br><a href="#" rel="modal:close">Close</a> </p>
</div>


	<div class="section" id="section1">
        
        <!--Temp Modal Styling-->
        
        

        
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
						echo "<td class='tdhover'><img class='imghover' src='editor/images/".$lDayArray[$day].
						$foodArray[$col].($row+1).".".$cache[$lDayArray[$day].$foodArray[$col].($row+1)]."'><a href='#exampleP' class='overlay'>
                        
                        \n
                        <div class='description'>  x p y </div>
                        </td>
                        \n";
                        
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
<script src="jquery.modal.min.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
var main = function (){
$('img').error(function(){
        $(this).attr('src', 'images/monday/blankerino.png');
});

$('.section').css("width", "100px");

$('.section').css("width", "100vw");
};
$( document ).ready(main);

</script>
</html>
