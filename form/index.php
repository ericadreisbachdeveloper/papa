<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="no-js">
<head>

<title>testing a form </title>

<link rel="stylesheet" href="../form/style.css" type="text/css" />

<style type="text/css">

.form-group {
  margin-bottom: 0;
  padding-bottom: 0;
}

fieldset.form-group.row > .col-md-6,
fieldset.form-group.norow { position: relative; padding-bottom: 2em; }

label.error {
  padding-top: .2em;
  font-weight: 400;
  font-style: italic;
  color: red;
  position: absolute;
   bottom: 0em;
}
.form-control.error {
  background: red;
}

.form-control.error::-webkit-input-placeholder { color: black; }
.form-control.error:-moz-placeholder{ color: black; }
.form-control.error::-moz-placeholder { color: black; }
.form-control.error:-ms-input-placeholder { color: black; }

</style>

</head>

<body>

<div style="display: block; height: 90vh;"> </div>


<section>
  <div class="container">
    <div class="row">
      <div class="col-md-2"> </div>

      <div class="col-md-8 col-content" id="contactformwrapper">


        <div id="success" class="-large -text-center -vertical-middle"> </div>


        <form id="contact" name="contact" method="post" style="position: relative;">

          <h3 class="-sectionhead -txtcenter -large" style="text-transform: none; margin-top: 0;">Wanna Work Together? </h3>

          <div id="validation" style="width: 100%; text-align: center; color: red; font-size: 2rem; font-style: italic; position: absolute; top: 3em;"> </div>

          <fieldset class="form-group row">
            <div class="col-md-6">
              <label for="name" class="sr-only">Name* </label>
              <input type="text" name="name" id="name" size="30" value="" class="form-control" placeholder="Name*" required/>
            </div>

            <div class="col-md-6">
              <label for="email" class="sr-only">Email* </label>
              <input type="text" name="email" id="email" size="30" value="" class="form-control" placeholder="Email*" required />
            </div>
          </fieldset>

          <fieldset class="form-group">
            <label for="website" class="sr-only">Website</label>
            <input type="text" name="website" id="website" size="30" value="" class="form-control" placeholder="Website (if you have one)" />
          </fieldset>

          <fieldset class="form-group norow">
            <p class="pform">In a few sentences, describe your project.* <br />
              <span class="small"><em>Limit: 300 characters</em> </span>
            </p>
            <p class="messageerror"> <?php echo $messageErr; ?></p>

            <textarea id="message" name="message" class="textarea form-control" rows="4" maxlength="300"></textarea>
          </fieldset>

          <fieldset class="form-group norow">
            <label for="Captcha" class="sr-only">What pet says &ldquo;meow&rdquo;? (3 letters) </label>
            <input type="text" name="captcha" value="" size="5" class="form-control" placeholder="What pet says &ldquo;meow&rdquo;? (3 letters)" required />
          </fieldset>

          <input type="submit" id="submit" name="submit" value="Send" class="-ghost -naturalsize">

        </form>


      </div><!-- /.col-content -->

      <div class="col-md-2"> </div>
    </div>
  </div>
</section>



<script type="text/javascript" src="https://s3.amazonaws.com/darkblack-papa/jquery.min.js"> </script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"> </script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"> </script>


<script type="text/javascript">

$(document).ready(function(){
  // set contact form wrapper height inline
  // so that success message is
  // vertically aligned: middle
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
                url:"../form/mailer.php",
                success: function() {
                    $('#contactform :input').attr('disabled', 'disabled');

                    $('#contactform').fadeOut(function() {
                        $('#success').html('Thank you! I&rsquo;ll read your message and get back to you soon.');
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



</body>
</html>
