<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-2"> </div>

      <div class="col-md-8 col-content">
        <p class="p -small -txtcenter"><?php if($bodyclass == 'home') : ?>Photo credits: <a href="http://www.publicdomainpictures.net/view-image.php?image=61690&picture=building-web" target="_blank" class="a">spider&nbsp;web</a> courtesy <a href="http://www.zonerama.com/Profile/23267" target="_blank" class="a">Rostislav Kralik</a>; <a href="http://www.publicdomainpictures.net/view-image.php?image=28116&picture=chicago-skyview" target="_blank" class="a">Chicago&nbsp;skyline</a> courtesy <a href="http://www.goodfreephotos.com/" target="_blank" class="a">Yinan&nbsp;Chen</a>. <?php endif ;?><?php if(!$bodyclass == 'page') :?>Screenshots courtesy clients. <?php endif;?><?php if($bodyclass == 'work') : ?><span class="-mobilehide"></span>Lightweight mobile/adaptive carousel from <a href="http://www.owlcarousel.owlgraphic.com/" target="_blank" class="a">Owl Carousel</a>. <span class="-mobilehide"></span> <?php endif;?>This site built with <a href="http://www.getbootstrap.com" target="_blank" class="a">Bootstrap</a>, <a href="http://sass-lang.com" target="_blank" class="a">SASS</a>, and <a href="http://www.gruntjs.com" target="_blank" class="a">Grunt</a>&nbsp;&mdash; <?php if($bodyclass !== 'home') : ?><span class="-mobilehide"></span><?php endif; ?>the web&nbsp;development tools and also their homophonic&nbsp;cognates. </p>

        <p class="p -small -txtcenter">&copy;2009&#8209;2016 <a href="http://www.ericadreisbach.com" title="erica dreisbach | freelance Chicago Bootstrap developer" class="a">erica&nbsp;dreisbach</a> and <a href="http://www.darkblackllc.com" target="_blank" title="Dark Black LLC | Chicago web developer" class="a">Dark&nbsp;Black&nbsp;LLC</a>. </p>
      </div>

      <div class="col-md-2"></div>
    </div>
  </div>
</footer>



<!-- Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47393701-1', 'auto');
  ga('send', 'pageview');
</script>



<!-- Modernizr -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"> </script> --?>



<!-- jQuery from CDN -->
<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"> </script>





<!-- local/Bower jQuery if needed offline -->
<!-- <script type="text/javascript" src="<?php // if(isset($page)) : ?>../<?php // endif; ?>bower_components/jquery/dist/jquery.min.js"> </script> -->


<!-- Bootstrap -->
<script type="text/javascript" src="<?php if(isset($page)) : ?>../<?php endif; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"> </script>



<!-- Back button on Work and Pages -->
<?php if(isset($page)) : ?>
<script type="text/javascript">

  $('#button').html('More Work');

  $('#button').click(function(){
    $('#button').attr('href','../#work');
  });

</script>
<?php endif; ?>



<!-- initialize carousel on Work pages -->
<?php if($bodyclass == work) : ?>
<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
<script type="text/javascript">
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
</script>
<?php endif; ?>



<!-- home-specific javascript
    1. home cooked stuff
-->
<?php if($bodyclass == home) : ?>
<script type="text/javascript" src="js/papa.min.js"></script>
<?php endif; ?>



</body>
</html>
