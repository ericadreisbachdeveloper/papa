<section id="sitemap" style="display: none;">
  <h2 class="hidden">Sitemap </h2>
  <div class="wrapper">

    <ul class="sitemap-ul">
      <li class="location title nolink">Index </li>
      <li class="location"><a class="link<?php if(isset($home)) : ?> current<?php endif; ?>" href="<?php if(isset($page)){ echo './'; } else { echo '#top'; } ?>">Home </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#about">About </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'How I Work'):?> current<?php endif;?>" href="how-i-work.php">How I Work </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Testimonials'):?> current<?php endif;?>" href="testimonials.php">Testimonials </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#skills">Skills </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>pdf/ericadreisbach-resume-web.pdf" target="_blank">Resume </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>testimonials.php">Testimonials </a></li>
      <li class="location"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#contact">Contact </a></li>
    </ul>

    <ul class="sitemap-ul">
      <li class="location title"><a class="link" href="<?php if(isset($page)){ echo './'; } else {} ?>#work">Work </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Sentegrity'):?> current<?php endif;?>" href="sentegrity.php">Sentegrity </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Educare'):?> current<?php endif;?>" href="educare.php">Educare </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'PortionPac'):?> current<?php endif;?>" href="portionpac.php">PortionPac </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'WellTrail'):?> current<?php endif;?>" href="welltrail.php">WellTrail </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Government Energy Management'):?> current<?php endif;?>" href="gem.php">Government Energy Management </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Savory Living'):?> current<?php endif;?>" href="savory.php">Savory Living </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Nearby Registry'):?> current<?php endif;?>" href="nearby.php">Nearby Registry </a></li>
      <li class="location"><a class="link<?php if(isset($page) && $page == 'Sugar Glen Farm'):?> current<?php endif;?>" href="sugarglen.php">Sugar Glen Farm </a></li>
    </ul>

  </div>
</section>

<section id="credits" class="section">
  <h2 class="hidden">Credits </h2>
  <div class="wrapper -narrowcol">
    <p class="p">
     <?php if(isset($home)) : ?>
     Photo credits: <a href="http://www.publicdomainpictures.net/view-image.php?image=61690&picture=building-web" target="_blank">spider web</a> courtesy <a href="http://www.zonerama.com/Profile/23267" target="_blank">Rostislav&nbsp;Kralik</a>; <a href="http://www.publicdomainpictures.net/view-image.php?image=28116&picture=chicago-skyview" target="_blank">Chicago&nbsp;skyline</a> courtesy <a href="http://www.goodfreephotos.com/" target="_blank">Yinan&nbsp;Chen</a>. This page uses <a href="#">Parallax&nbsp;JS</a> for a buttery&#8209;smooth parallax effect where&nbsp;supported. <?php endif; ?>

     <?php if(!isset($page) || isset($project)) : ?>Screenshots courtesy client<?php if(isset($home)) { echo 's'; } elseif (isset($project)) { echo ''; } else {} ?>. <?php endif; ?>

     <?php if(isset($project)) : ?>Lightweight mobile/adaptive carousel from <a href="http://owlgraphic.com/owlcarousel/" target="_blank">Owl&nbsp;Carousel</a>. <?php endif; ?>

     This site built with <a href="http://www.sass-lang.com" target="_blank">SASS</a> and&nbsp;<a href="http://www.gruntjs.com" target="_blank">Grunt</a>&nbsp;&mdash; the web&nbsp;development tools and also their homophonic&nbsp;cognates.

   </p>

   <p class="p">&copy;2009-2016 <a href="http://www.ericadreisbach.com" title="erica dreisbach | freelance web designer + developer">erica&nbsp;dreisbach</a> and <a href="http://www.darkblackllc.com" target="_blank">Dark&nbsp;Black&nbsp;LLC</a>. </p>

 </div><!-- .wrapper -->
</section><!-- #credits -->


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47393701-1', 'auto');
  ga('send', 'pageview');

</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.min.js"   integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"> </script>

<?php if( isset($home)  && preg_match('/(Chrome|CriOS)\//i',$_SERVER['HTTP_USER_AGENT'])
 && !preg_match('/(Aviator|ChromePlus|coc_|Dragon|Edge|Flock|Iron|Kinza|Maxthon|MxNitro|Nichrome|OPR|Perk|Rockmelt|Seznam|Sleipnir|Spark|UBrowser|Vivaldi|WebExplorer|YaBrowser)/i',$_SERVER['HTTP_USER_AGENT'])){
   echo '<script type="text/javascript" src="js/papa.min.js"> </script>';
} else {

  echo "<script type='text/javascript'>    $('.parallax-window').each(function(){
        var imgurl = $(this).attr('data-image-src');
        $(this).css('background-image', 'url(' + imgurl + ')');
        $(this).css('background-size','cover');
      });</script>";
} ?>

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

  var windoww = $(window).width();

  // add mobile nav class .hamburger
  // on narrow windows
  if (windoww < 999) {
    $('.nav').addClass('hamburger');
  }
  else {}


  // mobile nav
  $('.navbutton').click(function(){

    if ( $('.hamburger').is(':visible') ) {
      $('.navbutton').removeClass('depressed');
      $('.hamburger').slideUp();
      $('body').removeClass('noscroll');
      $('body').unbind();
    }
    else {
      $('.navbutton').addClass('depressed');
      $('.hamburger').slideDown();
      $('body').addClass('noscroll');
      $('body').bind('touchmove', function(e){e.preventDefault()});
    }
  });

  // if user clicks mobile nav homepage links, which are anchors
  // mobile nav slides up
  $('.hamburger').find('.link').click(function(){
    $('.navbutton').removeClass('depressed');
    $('.hamburger').slideUp();
    $('body').removeClass('noscroll');
    $('body').unbind();
  });

 });



 // LOAD
 $(window).load(function(){

   // lazy load hometext
   $('.hometext').addClass('fadein');
   $('#home').addClass('transparent');

   // #sitemap is special due to conditional load for mobile
   // (again, my questions UX/UI choice)
   var windoww = $(window).width();
   if (windoww > 999) {
     $('#sitemap').css('display','block');
   }
   else {
     $('#sitemap').css('display','none');
   }
 });





  // RESIZE
  $(window).resize(function(){
    var windoww = $(window).width();

    // 1. disable parallax
    $('.parallax-mirror').each(function(){
      $(this).css('display','none');
    });

    $('.parallax-window').each(function(){
      var imgurl = $(this).attr('data-image-src');
      $(this).css('background-image', 'url(' + imgurl + ')');
      $(this).css('background-size','cover');
    });


    // 2. tuck mobile nav away
    $('.navbutton').removeClass('depressed');
    $('.hamburger').hide();
    $('body').removeClass('noscroll');
    $('body').unbind();


    // 3. if screen is resized narrow
    if (windoww < 999) {

      // a. remove sitemap on mobile
      $('#sitemap').hide();

      // b. make sure mobile has .hamburger
      $('.nav').addClass('hamburger');

    }

    else {

      // c. show sitemap
      $('#sitemap').show();

      // d. remove .hamburger
      $('.nav').removeClass('hamburger');

    }

  });


  // SCROLL
  $(window).scroll(function(){


  });

</script>

</body>
</html>
