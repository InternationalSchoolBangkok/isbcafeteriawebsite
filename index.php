<html>
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
    <style>
    
    

.item {
    float: left;
    position: relative;
    line-height: 1em;
}


.image{
    max-width: 100%;
    margin: 0;
    display: block;
}

.image:after {
    clear:both;
}

.overlay {
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    position: absolute;
    top: 0;
    left: 0;
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



.item:hover .overlay {
    display: block;
}
    
    </style>
<link href='https://fonts.googleapis.com/css?family=Roboto:100,400|Indie+Flower' rel='stylesheet' type='text/css'>
    
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="jquery.min.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="js.js"></script>
    <script src="jquery.min2.js"></script> 
    <script src="jquery.modal.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="jquery.modal.css" type="text/css" media="screen" />
</head>
    <style>
        img{
            width:100px;
        }
    
    
    </style>
<body>
    <table>
        <h1>Monday</h1>
        <tr>
            <td>Asian</td>
            <td>Continental</td>
            <td>Noodle</td>
            <td>Japanese</td>
            <td>Vegetarian/Salads</td>
            <td>Live</td>
        
        </tr>
        <tr>
            <td>
                <div class="item">
						<img src="editor/images/mondayveggies1.jpg" class="image">
						<a class="overlay">
							<div class="description">
								<p>
									x p y 
								</p>
							</div>
						</a>
					</div>         
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            
        </tr>
        <tr>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            
        </tr><tr>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            
        </tr><tr>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            
        </tr><tr>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            <td>
                <img src="editor/images/tuesdaynoodle1.jpg">            
            </td>
            
        </tr>

    
    </table>
    
    
    

    
                    <a href="#food" rel="modal:open"><img src="images/members/ice.png">
                        <div id="memberContainerText" style="padding-left:20px;">
                            <h2>Testerone</h2>
                            <h3>Mac</h3>
                        </div>
                    </a>
    
</body>
</html>





<!--!Hidden-->
<!--Student Council Biographies!-->
<div >
    


    
<div id="food" style="display:none">
    <p>Biography <br><a href="#" rel="modal:close">Close</a> </p>
</div>






<script>

    
    
var konami_keys = [76,65,79,82,78,85,65,76];
var konami_index = 0;
$(document).keydown(function(e){
    if(e.keyCode === konami_keys[konami_index++]){
        if(konami_index === konami_keys.length){
            $(document).unbind('keydown', arguments.callee);
            $.getScript('http://hatterkiller.github.io/scwebsite/cornify-mod.js',function(){
                cornify_add();
                $(document).keydown(cornify_add);
            }); 
        }
    }else{
        konami_index = 0;
    }
});
</script>    
<br>
    <br>
    <br>
    <br>
    
    <br>
    <br>
    <br>
    
    <br>
    <br>
    <br>
<div id="#foods">Lol</div>







</div>
