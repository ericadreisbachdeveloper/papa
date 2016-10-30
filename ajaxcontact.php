<form id="contactform" name="contact" method="post" style="position: relative;">

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
