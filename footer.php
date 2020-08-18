<?php global $home; global $bodyclass; ?>


<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-2"> </div>

      <div class="col-md-8 col-content">
        <p class="p -small -txtcenter"><?php if($bodyclass == 'home') : ?>Photo credits: <a href="https://pixabay.com/photos/web-cobweb-dewdrop-drop-of-water-586177/" target="_blank" rel="noopener" class="a">cobweb&nbsp;photo</a> courtesy <a href="https://pixabay.com/users/pezibear-526143/" target="_blank" rel="noopener" class="a">Petra</a>; headshots by <a href="https://www.instagram.com/courageousbabestribe/" target="_blank" rel="noopener" class="a">Ashley&#8209;Lauren&nbsp;Elrod</a>; <a href="https://unsplash.com/photos/Nyvq2juw4_o" target="_blank" rel="noopener" class="a">Chicago&nbsp;skyline</a> courtesy <a href="https://unsplash.com/@peterlaster" target="_blank" rel="noopener" class="a">Pedro&nbsp;Lastra</a>. <?php endif ;?><?php if(!$bodyclass == 'page') :?>Screenshots courtesy clients. <?php endif;?><?php if($bodyclass == 'work') : ?><span class="-mobilehide"></span>Lightweight mobile/adaptive carousel from <a href="http://www.owlcarousel.owlgraphic.com/" target="_blank" rel="noopener" class="a">Owl Carousel</a>. <span class="-mobilehide"></span> <?php endif;?>This site built with <a href="http://www.getbootstrap.com" target="_blank" rel="noopener" class="a">Bootstrap</a>, <a href="http://sass-lang.com" target="_blank" rel="noopener" class="a">SASS</a>, and <a href="http://www.gruntjs.com" target="_blank" rel="noopener" class="a">Grunt</a>&nbsp;&mdash; <?php if($bodyclass !== 'home') : ?><span class="-mobilehide"></span><?php endif; ?>the web&nbsp;development tools and also their homophonic&nbsp;cognates. </p>

        <p class="p -small -txtcenter"><a class="a" href="<?php if($bodyclass !== 'home') : ?>../<?php endif; ?>privacy">Privacy Policy</a></p>

        <p class="p -small -txtcenter">&copy;2009&#8209;<?php echo date('Y'); ?> <a href="http://www.ericadreisbach.com" title="erica dreisbach | freelance Chicago Bootstrap developer" class="a">erica&nbsp;dreisbach</a> and <a href="http://www.darkblackllc.com" target="_blank" rel="noopener" title="Dark Black LLC | Chicago web developer" class="a">Dark&nbsp;Black&nbsp;LLC</a>. </p>
      </div>

      <div class="col-md-2"></div>
    </div>
  </div>
</footer>



<!-- jQuery -->
<script src="https://s3.amazonaws.com/darkblack-papa/jquery-v2.2.3.min.js"> </script>



<!-- Bootstrap -->
<script async="async" src="https://s3.amazonaws.com/darkblack-papa/bootstrap-v3.3.6.min.js"> </script>



<!-- Contact validation -->
<?php if($bodyclass == 'home') : ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"> </script>
<script async="async" src="https://s3.amazonaws.com/darkblack-papa/jquery-form-v1.1.0.min.js"> </script>

<script>

$(document).ready(function(){
  // set contact form wrapper height inline
  // so that success message is vertically aligned: middle
  var contacth = $('#contactform').height();
  $('#contactformwrapper').height(contacth);
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
<?php if(isset($bodyclass) && $bodyclass == 'work') : ?>
<script>

  $('#button').html('More Work');

  $('#button').click(function(){
    $('#button').attr('href','../#work');
  });

</script>


<?php elseif(isset($page)) : ?>
<script>
jQuery(document).ready(function(){

  $('#button').html('Back');

  $('#button').on('click', function(){
      window.history.go(-1);
      return false;
  });

});
</script>

<?php endif; ?>



<!-- initialize carousel on Work pages -->
<?php if($bodyclass == "work") : ?>
<script src="../js/owl.carousel.min.js"></script>
<script>
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


<?php if($bodyclass == "home") : ?>
<!-- home cooked stuff -->
<script async="async" src="https://darkblack-papa.s3.amazonaws.com/papa.min.v102.js"></script>
<?php endif; ?>


</body>
</html>
