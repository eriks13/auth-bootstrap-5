
$(document).ready(function(){
    var timer; 
  
    $('#uiDropdown').on('mouseenter', function(){
      clearTimeout(timer); 
  
      $(this).addClass('show');
      $(this).find('.dropdown-menu').addClass('show');
  
      $(this).find('.dropdown-menu').css({
        'top': '3.800rem',
        'left': '-5rem'
      });
    });
  
    $('#uiDropdown').on('mouseleave', function(){
      timer = setTimeout(function(){
        $('#uiDropdown').removeClass('show');
        $('#uiDropdown').find('.dropdown-menu').removeClass('show');
      }, 1000);
    });
  });