$(document).ready(function() {
   $('.animate').mouseenter(function () {
       $(this).animate({
           height: '+=10px'
       });
   });
   $('.animate').mouseleave(function () {
       $(this).animate({
           height: '-=10px'
       }); 
   });