$(document).ready(function() {
   // $('.animate').mouseenter(function () {
   //     $(this).animate({
   //         height: '+=10px'
   //     });
   // });
   // $('.animate').mouseleave(function () {
   //     $(this).animate({
   //         height: '-=10px'
   //     }); 
   // });

   $('.underline').css({"border-bottom": "0px solid #fff"}).delay(1500).animate({
        'borderWidth': '4px',
        'borderColor': '#fff'
    },250);

 });