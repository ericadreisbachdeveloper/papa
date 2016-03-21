
<section id="sitemap" style="display: none;">
  <div class="wrapper">

    <ul class="sitemap-ul">
      <li class="location title nolink">Index </li>
      <li class="location"><a class="link<?php if(isset($home)) : ?> current<?php endif; ?>" href="<?php if(isset($page)){ echo './'; } else { echo '#top'; } ?>">Home </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#about">About </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'How I Work'):?> current<?php endif;?>" href="how-i-work">How I Work </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Testimonials'):?> current<?php endif;?>" href="testimonials">Testimonials </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#skills">Skills </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>pdf/ericadreisbach-resume-web.pdf" target="_blank">Resume </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>testimonials">Testimonials </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#contact">Contact </a></li>
    </ul>

    <ul class="sitemap-ul">
      <li class="location title"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#work">Work </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Sentegrity'):?> current<?php endif;?>" href="sentegrity" class="current">Sentegrity </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Educare'):?> current<?php endif;?>" href="educare" class="">Educare </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'PortionPac'):?> current<?php endif;?>" href="portionpac" class="">PortionPac </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'WellTrail'):?> current<?php endif;?>" href="welltrail" class="">WellTrail </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Government Energy Management'):?> current<?php endif;?>" href="gem">Government Energy Management </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Savory Living'):?> current<?php endif;?>" href="savory">Savory Living </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Nearby Registry'):?> current<?php endif;?>" href="nearby">Nearby Registry </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Sugar Glen Farm'):?> current<?php endif;?>" href="sugarglen">Sugar Glen Farm </a></li>
    </ul>

  </div>
</section>

<section id="credits" class="section" style="display: none;">
 <div class="wrapper">

  <?php if(isset($page)) :?><p class="p">Screenshots courtesy clients. </p>

  <?php else : ?><p class="p">Photo credits: <a href="http://www.publicdomainpictures.net/view-image.php?image=61690&picture=building-web" target="_blank">spider web</a> courtesy <a href="http://www.zonerama.com/Profile/23267" target="_blank">Rostislav&nbsp;Kralik</a>; <a href="http://www.publicdomainpictures.net/view-image.php?image=28116&picture=chicago-skyview" target="_blank">Chicago&nbsp;skyline</a> courtesy <a href="http://www.goodfreephotos.com/" target="_blank">Yinan&nbsp;Chen</a>. Screenshots courtesy&nbsp;clients. </p><?php endif; ?>

  <p class="p">This site built with <a href="http://www.sass-lang.com" target="_blank">SASS</a> and&nbsp;<a href="http://www.gruntjs.com" target="_blank">Grunt</a>&nbsp;&mdash; the web&nbsp;development tools and also their homophonic&nbsp;cognates.  </p>

  <?php if(isset($project)) : ?><p class="p">Lightweight mobile/adaptive carousel from <a href="http://owlgraphic.com/owlcarousel/" target="_blank">Owl&nbsp;Carousel</a>. </p>
  <?php elseif (isset($home)) : ?><p class="p">This page uses <a href="http://pixelcog.github.io/parallax.js/" target="_blank" rel="nofollow">Parallax.js</a> for a buttery&#8209;smooth parallax effect on&nbsp;desktop.  </p>
  <?php endif; ?>

  <p class="p">&copy;2009-2016 <a href="http://www.ericadreisbach.com" title="erica dreisbach | freelance web designer + developer">erica&nbsp;dreisbach</a> and <a href="http://www.darkblackllc.com" target="_blank">Dark&nbsp;Black&nbsp;LLC</a>. </p>

 </div><!-- .wrapper -->
</section><!-- #credits -->


<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>


<?php if (isset($home)) : ?>
<script type="text/javascript" src="js/papa.min.js"> </script>
<?php endif; ?>

<?php if (isset($page)) : ?>
<script type="text/javascript" src="js/owl.carousel.min.js"> </script>

<script type="text/javascript">

 // READY
 $(document).ready(function(){

   $('#carousel').owlCarousel({
    loop:true,
    lazyLoad:true,
    responsive:{
    0:{ items:1 },
    720:{ items:3 }
   }
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

  var windowh = $(window).height();
  var windoww = $(window).width();

  if (windoww < 999) {
    $('.nav').addClass('hamburger');
  }
  else {
  }


  // handwritten mobile nav
  $('.navbutton').click(function(){
    $('.hamburger').slideToggle(function(){
      if ( $('.hamburger').is(':visible') ) {
        $('body').addClass('noscroll');
        $('body').bind('touchmove', function(e){e.preventDefault()});
      }
      else {
        $('body').removeClass('noscroll');
        $('body').unbind('touchmove', function(e){e.preventDefault()});
      }
    });
  });


  $('.hamburger').find('.link').click(function(){
    $('.hamburger').slideUp();
    $('body').removeClass('noscroll');
    $('body').unbind('touchmove', function(e){e.preventDefault()});
  });

 });



 // LOAD
 $(window).load(function(){
   $('.hometext').addClass('fadein');
   $('.section').each(function(){
     $(this).css('display','block');
   });

   var windoww = $(window).width();
   if (windoww > 999) {
     $('#sitemap').css('display','block');
   }




   if ( $('.navbutton').is(':visible') ) {
     $('.nav').addClass('hamburger');
   }
   else {
     $('.nav').removeClass('hamburger');
   }


 });


  // RESIZE
  $(window).resize(function(){
    var windoww = $(window).width();

    // Disable parallax on resize
    $('.parallax-mirror').each(function(){
      $(this).css('display','none');
    });

    $('.parallax-window').each(function(){
      var imgurl = $(this).attr('data-image-src');
      $(this).css('background-image', 'url(' + imgurl + ')');
      $(this).css('background-size','cover');
    });



    if ( $('.navbutton').is(':visible') ) {
      $('.nav').addClass('hamburger');
    }
    else {
      $('.nav').removeClass('hamburger');
    }


    if ( $('.hamburger').is(':visible') ) {
      $('body').addClass('noscroll');
      $('body').bind('touchmove', function(e){e.preventDefault()});
    }



    if (windoww < 999) {
      $('#sitemap').hide();
    }

    else {
      $('#sitemap').show();

      if ($('body').hasClass('noscroll')) {
        $('body').removeClass('noscroll');
      }
      $('body').unbind('touchmove');
    }

  });


  // SCROLL
  $(window).scroll(function(){



  });

</script>

</body>
</html>
