$(document).ready(function(){
    $('.NavBar-Elements li:has(ul)').click(function(e){
      e.preventDefault();
  
      if ($(this).hasClass('activado')){
  
        $(this).removeClass('activado');
        $(this).children('ul').slideUp();
        
  
      }
  
      else {
        $('.NavBar-Elements li ul').slideUp();
        $('.NavBar-Elements li').removeClass('activado');
        $(this).addClass('activado');
        $(this).children('ul').slideDown();
      }
    });
  });