<section id="sitemap">
  <div class="wrapper">

    <ul class="nav">
      <li class="location title nolink">Index </li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else { echo '#top'; } ?>">Home </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#about">About </a></li>
      <li class="location"><a class="link" href="how-i-work">How I Work </a></li>
      <li class="location"><a class="link" href="testimonials">Testimonials </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#skills">Skills </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>pdf/ericadreisbach-resume-web.pdf">Resume </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>testimonials">Testimonials </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#contact">Contact </a></li>
    </ul>

    <ul class="nav">
      <li class="location title"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#work">Work </a></li>
      <li class="location"><a class="link" href="sentegrity">Sentegrity </a></li>
      <li class="location"><a class="link" href="educare">Educare </a></li>
      <li class="location"><a class="link" href="portionpac">PortionPac </a></li>
      <li class="location"><a class="link" href="welltrail">WellTrail </a></li>
      <li class="location"><a class="link" href="gem">Government Energy Management </a></li>
      <li class="location"><a class="link" href="savory">Savory Living </a></li>
      <li class="location"><a class="link" href="nearby">Nearby Registry </a></li>
      <li class="location"><a class="link" href="#">Sugar Glen Farm </a></li>
    </ul>

  </div>
</section>

<section id="credits" class="">
 <div class="wrapper">

  <?php if(isset($page)) :?><p class="p">Screenshots courtesy clients. </p>

  <?php else : ?><p class="p">Photo credits: <a href="http://www.publicdomainpictures.net/view-image.php?image=61690&picture=building-web" target="_blank">spider web</a> courtesy <a href="http://www.zonerama.com/Profile/23267" target="_blank">Rostislav&nbsp;Kralik</a>; <a href="http://www.publicdomainpictures.net/view-image.php?image=28116&picture=chicago-skyview" target="_blank">Chicago&nbsp;skyline</a> courtesy <a href="http://www.goodfreephotos.com/" target="_blank">Yinan&nbsp;Chen</a>. Screenshots courtesy&nbsp;clients. </p><?php endif; ?>

  <p class="p">This site built with <a href="http://www.sass-lang.com" target="_blank">SASS</a> and&nbsp;<a href="http://www.gruntjs.com" target="_blank">Grunt</a>&nbsp;&mdash; the web&nbsp;development tools and also their homophonic&nbsp;cognates.  </p>

  <?php if(isset($project)) : ?><p class="p">Lightweight mobile/adaptive carousel from <a href="http://owlgraphic.com/owlcarousel/" target="_blank">Owl&nbsp;Carousel</a>. </p>
  <?php else : ?><p class="p">This page uses <a href="http://pixelcog.github.io/parallax.js/" target="_blank" rel="nofollow">Parallax.js</a> for a buttery&#8209;smooth parallax effect on&nbsp;desktop.</p>
  <?php endif; ?>

  <p>&copy;2009-2016 <a href="http://www.ericadreisbach.com" title="erica dreisbach | freelance web designer + developer">erica&nbsp;dreisbach</a> and <a href="http://www.darkblackllc.com" target="_blank">Dark&nbsp;Black&nbsp;LLC</a>. </p>

 </div><!-- .wrapper -->
</section><!-- #credits -->

<script type="text/javascript" src="js/jquery-2.1.4.js"> </script>

<?php if (isset($home)) : ?>
<script type="text/javascript" src="js/parallax.min.js"> </script>
<?php endif; ?>

<?php if (isset($page)) : ?>
<script type="text/javascript" src="js/owl.carousel.min.js"> </script>

<script type="text/javascript">

 // READY
 $(document).ready(function(){
   $("#carousel").owlCarousel({
     lazyLoad : true,
     items: 3
   });
 });

function goBack() {
 window.history.back()
}

</script>
<?php endif; ?>




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


  // handwritten mobile nav
  $('.navbutton').click(function(){
    console.log('hi');
    $('.nav').slideToggle();
  }, function(){
    $('.nav').slideToggle();
  });



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
