
<script type="text/javascript" src="js/jquery-2.1.4.js"> </script>

<script type="text/javascript" src="js/parallax.min.js"> </script>

<script type="text/javascript">


 // READY
 $(document).ready(function(){

   (function($) {
     $(document).ready(function(){
       $("#nav").accessibleDropDown();
     });

     $.fn.accessibleDropDown = function (){
       var el = $(this);

       /* Setup dropdown menus for IE 6 */
       $("li", el).mouseover(function() {
         $(this).addClass("hover");
       }).mouseout(function() {
         $(this).removeClass("hover");
       });

       /* Make dropdown menus keyboard accessible */
       $("a", el).focus(function() {
         $(this).parents("li").addClass("show");
       }).blur(function() {
         $(this).parents("li").removeClass("show");
       });
     }
   })(jQuery);



  var windowh = $(window).height();
  var windoww = $(window).width();

  if (windoww < 330) {
    $('.-top').each(function(){
      $(this).css('height','30em');
    });

    $('.-short').each(function(){
      $(this).css('height','15em');
    });
  }

  else if (windoww < 768) {
    $('.-top').each(function(){
      $(this).css('height','30em');
    });

    $('.-short').each(function(){
      $(this).css('height','15em');
    });
  }

  else {
    $('.-top').each(function(){
      $(this).css('height','44em');
    });

    $('.-short').each(function(){
      $(this).css('height','28em');
    });
  }

 });


 // LOAD
 $(window).load(function(){

   $('.hometext').addClass('fadein');
   $('#nav').css('display','block');

 });



  // RESIZE
  $(window).resize(function(){

    /*
   var windowh = $(window).height();
   var windoww = $(window).width();

   $('.-top').each(function(){
     $(this).height(windowh * .91);
     $(this).css('min-height', '24em');
     $(this).css('max-height', '44em');
   });

   $('.-short').each(function(){
     $(this).height(windowh * .68);
     $(this).css('min-height', '24em');
     $(this).css('max-height', '44em');
   });  */

  });


  // SCROLL
  $(window).scroll(function(){



  });

</script>

</body>
</html>
