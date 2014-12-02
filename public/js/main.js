
$(document).ready(function(){
   $('.field.error input').hover(function(){
       $(this).next('div.prompt').addClass('visible');
   },function(){
       $(this).next('div.prompt').removeClass('visible');
   });
});