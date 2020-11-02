// preloader
$(window).on ('load',function () {
    $('.load').fadeOut("slow");
});

 // DUGME ZA POCETAK
                //Get the button
                var mybutton = document.getElementById("myBtn");

                window.onscroll = function() {scrollFunction()};
    
                function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                 mybutton.style.display = "block";
                } else {
                mybutton.style.display = "none";
                }
            }
    
                function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                }
    
                // KRAJ
                
                function myFunction() {
                  var x = document.getElementById("myTopnav");
                  if (x.className === "topnav") {
                    x.className += " responsive";
                  } else {
                    x.className = "topnav";
                  }
                }
    
    
          //navbar
    // Hamburger meni
$(document).ready(function(){

  //    Hamburger animacija
      $('.open-button').click(function(){
        $(this).toggleClass('open');
      });
  
      $(".open-button").click(function(e){
          e.preventDefault();
          $(".nav-menu").toggleClass('open');
      });
    
  });
  
  $(document).ready(function(){
      $(".nav-menu a").click(function(){
          $(".nav-menu").toggleClass('open');
          $(".open-button").removeClass('open');
      });
  });
 
/* Filterable Gallery */
$(document).ready(function() {
      $(".buttton").click(function(e) {
          e.preventDefault();
          var name = $(this).attr("data-filter");
          if(name == "all") {
              $(".filter").show("2000");
          } else {
              $(".filter").not("."+name).hide("2000");
              $(".filter").filter("."+name).show("2000");
          }
      });
      $(".buttton").click(function() {
          $(this).addClass("active").siblings().removeClass("active");
      });
  });
   
  /* Gallery image popUp */
  $(function() {
      $('.gallery-image').magnificPopup({ 
          type: 'image', 
          gallery: {
            enabled: true,
          }
      });
  });
  