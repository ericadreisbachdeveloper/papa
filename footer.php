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



<!-- jQuery -->
<script type="text/javascript" src="https://s3.amazonaws.com/darkblack-papa/jquery.min.js"> </script>



<!-- Bootstrap -->
<script type="text/javascript" src="https://s3.amazonaws.com/darkblack-papa/bootstrap.min.js"> </script>



<!-- Contact validation -->
<?php if($bodyclass == 'home') : ?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"> </script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"> </script>

<script type="text/javascript">

$(document).ready(function(){
  // set contact form wrapper height inline so that success message is vertically aligned: middle
  var contacth = $('#contactform').height();
  $('#contactformwrapper').height(contacth);
  //console.log(contacth)

});

jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value);
    }, "HINT: it rhymes with &ldquo;hat&rdquo;");

// validate contact form
$(function() {
    $('#contactform').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            message: {
                required: true
            },
            captcha: {
                required: true,
                answercheck: true
            }
        },
        messages: {
            name: {
                //required: "come on, you have a name don't you?",
                //minlength: "your name must consist of at least 2 characters"
            },
            email: {
                //required: "no email, no message"
            },
            message: {
                //required: "um...yea, you have to write something to send this form.",
                //minlength: "thats all? really?"
            },
            answer: {
                //required: "sorry, wrong answer!"
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                url:"mailer.php",
                success: function() {
                    $('#contactform :input').attr('disabled', 'disabled');

                    $('#contactform').fadeOut(function() {
                        $('#success').html('Thank you! If your project sounds like a good&nbsp;fit, I&rsquo;ll get back to you&nbsp;soon.');
                    });
                },
                error: function() {
                    $('#contactform').fadeTo( "slow", 0.15, function() {
                        $('#validation').text('Something went wrong. Try refreshing and resubmitting.');
                    });
                }
            });
        }
    });
});

</script>
<?php endif; ?>



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



<!-- home cooked stuff -->
<?php if($bodyclass == home) : ?>
<script type="text/javascript" src="https://s3.amazonaws.com/darkblack-papa/papa.min.js"></script>
<?php endif; ?>



</body>
</html>
