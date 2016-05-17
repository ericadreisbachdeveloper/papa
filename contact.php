<?php include('contactvalidation.php'); ?>
<form method="post" class="form -successhide" action="#contact">

  <fieldset class="form-group row">
    <div class="col-md-6">
      <label class="control-label sr-only" for="name">Name </label>
      <input name="name" id="name" type="text" maxlength="40" class="form-control <?php echo $nameErrCode;?>"  placeholder="Name*" value="<?php echo $name; ?>">
      <p class="error nameerror"><?php echo $nameErr;?></p>
      <br class="-desktophide" />
    </div>

    <div class="col-md-6">
      <label class="control-label sr-only" for="email">Email </label>
      <input name="email" id="email" type="email" maxlength="50" class="form-control <?php echo $emailErrCode;?>" placeholder="Email*" value="<?php echo $email; ?>">
      <p class="error emailerror"> <?php echo $emailErr; ?></p>
    </div>
  </fieldset>


  <fieldset class="form-group">
    <label class="control-label sr-only" for="website">Website <span class="-small">(if you have one)</span></label>
    <input name="website" id="website" type="text" maxlength="80" class="form-control <?php echo $websiteErrCode;?>"  placeholder="Website (if you have one)" value="<?php echo $website;?>">
    <p class="error websiteerror"> <?php echo $websiteErr;?></p>
  </fieldset>




  <fieldset class="form-group">
    <p class="pform">1. Rate your overall experiences with web developers in the&nbsp;past. </p>
    <p class="error"><?php echo $experienceErr;?></p>

    <div class="radio">
      <label for="great"><input type="radio" name="experience" value="great" id="great" <?php if (isset($experience) && $experience=="great") echo "checked";?>>Great. </label>
    </div>
    <div class="radio">
      <label for="soso"><input type="radio" name="experience" value="so-so" id="soso" <?php if (isset($experience) && $experience=="so-so") echo "checked";?>>So-so. </label>
    </div>
    <div class="radio">
      <label for="notgreat"><input type="radio" name="experience" value="notgreat" id="notgreat" <?php if (isset($experience) && $experience=="not-great") echo "checked";?>>Not great. </label>
    </div>
    <div class="radio">
      <label for="never"><input type="radio" name="experience" value="never" id="never" <?php if (isset($experience) && $experience=="never") echo "checked";?>>I&rsquo;ve never worked with a web developer before. </label>
    </div>
  </fieldset>


  <fieldset class="form-group">
    <p class="pform">2. True or false: sometimes an all-caps email is the best way to get the point&nbsp;across. </p>
    <p class="error"><?php echo $allcapsErr;?></p>

    <div class="radio">
      <label for="allcapstrue"><input type="radio" name="allcaps" value="true" id="allcapstrue" <?php if (isset($allcaps) && $allcaps=="true") echo "checked";?>>True. </label>
    </div>
    <div class="radio">
      <label for="allcapsfalse"><input type="radio" name="allcaps" value="false" id="allcapsfalse" <?php if (isset($allcaps) && $allcaps=="false") echo "checked";?>>False. </label>
    </div>

  </fieldset>


  <fieldset class="form-group">
    <p class="pform">3. In a few sentences, describe your project. <br />
      <span class="small"><em>Limit: 300 characters</em> </span>
    </p>

    <textarea class="textarea" name="clientproject" rows="4" maxlength="300"><?php echo $clientproject;?></textarea>
  </fieldset>


  <input type="submit" name="submit" value="Submit" class="-ghost -naturalsize">


</form>
