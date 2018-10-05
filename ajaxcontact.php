<form id="contactform" name="contact" method="post" style="position: relative;">

  <h3 class="-contactsectionhead -sectionhead -txtcenter -large">Wanna Work Together? </h3>

<!--
  <p class="p -text-center" style="margin-top: 1.5em; margin-bottom: 2em; line-height: 1.6;">Projects start at $575. Need it cheaper? <a class="a" href="cheap">Click&nbsp;here</a>. -->
  <p class="p -text-center" style="margin-top: .5em;">You're catching me when I'm booked <span class="nowrap">full time</span> into <span class="nowrap">March 2019</span>. I am not booking new work <span class="nowrap">until then.</span> </p>

  <p class="p -text-center">If you're a small business or have a large spec, contact me and I can refer you to some <span class="nowrap">excellent colleagues.</span></p>

  <p class="p -text-center">If you're an individual or you &ldquo;just need a simple site&rdquo; contact me and I can refer you to a different set of <span class="nowrap">excellent colleagues.</span></p>

  <p class="p -text-center">
  Recruiters <a class="a" href="https://twitter.com/actualrecruiter" target="_blank">click&nbsp;here</a>.</p>

  <div id="validation" style="width: 100%; text-align: center; color: red; font-size: 2rem; font-style: italic; position: absolute; top: 3em;"> </div>

  <fieldset class="form-group row">
    <legend class="sr-only">Contact Details</legend>
    <div class="col-md-6">
      <label for="name" class="sr-only">Name </label>
      <input type="text" name="name" id="name" size="30" value="" class="form-control" placeholder="Name" required/>
    </div>

    <div class="col-md-6">
      <label for="email" class="sr-only">Email </label>
      <input type="text" name="email" id="email" size="30" value="" class="form-control" placeholder="Email" required />
    </div>
  </fieldset>

  <fieldset class="form-group">
    <legend class="sr-only">Project Website</legend>
    <label for="website" class="sr-only">Website</label>
    <input type="text" name="website" id="website" size="30" value="" class="form-control" placeholder="Website (if you have one)" />
  </fieldset>

  <fieldset class="form-group norow">
    <legend class="sr-only">Project Details</legend>
    <p class="pform">In a few sentences, tell me about your&nbsp;project. <br />
      <span class="small"><em>Limit: 300 characters</em> </span>
    </p>
    <p class="messageerror"> <?php echo $messageErr; ?></p>

    <label for="message" class="sr-only">Message </label>
    <textarea id="message" name="message" class="textarea form-control" rows="4" maxlength="300"></textarea>
  </fieldset>

  <fieldset class="form-group norow">
    <legend class="sr-only">Captcha</legend>
    <label for="captcha" class="sr-only">What pet says &ldquo;meow&rdquo;? (3 letters) </label>
    <input id="captcha" name="captcha" type="text" value="" size="5" class="form-control" placeholder="What pet says &ldquo;meow&rdquo;? (3 letters)" required />
  </fieldset>

  <input type="submit" id="submit" name="submit" value="Send" class="-ghost -naturalsize">

</form>
