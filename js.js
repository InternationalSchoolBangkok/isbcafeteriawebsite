var main = function() {
  $('.menuclicky').click(function() {
    $('.menuclicky').animate({
      display: "none"
    }, 200);
       $('.menubar').animate({
      left: "0vw"
    }, 200);

    $('body').animate({
      left: "10vw"
    }, 200);
  });
 $('.button-close').click(function () {
    $('.menubar').animate({
        left: "-10vw"
    }, 200);
     $('.menuclicky').animate({
      display: "block"
    }, 200);
    $('body').animate({
      left: "0vw"
    }, 200);
  });
};
$(document).ready(main);

$(document).ready(hide);
