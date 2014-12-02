
$(document).ready(function(){
   $('.field.error input,.field.error .checkbox').hover(function(){
       $(this).next('div.prompt').addClass('visible');
   },function(){
       $(this).next('div.prompt').removeClass('visible');
   });
});