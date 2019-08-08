$(document).ready(function(){
  
  //Begin of NavBar code
  $('.NavBar-Elements li:has(ul)').click(function(){
 
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
  }); // navbar click function END

});