var d = new Date();
var date = d.getDay();
if (date == 0|| date == 6){
    date = 1;
}
var anchor = "slide"+date;


window.location = "#firstPage/"+anchor;