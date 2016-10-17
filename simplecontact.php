<?php include('simplecontactvalidation.php'); ?>
<form method="post" class="form -successhide" action="#contactform">

  <h3 class="-sectionhead -txtcenter" style="text-transform: none;">Wanna Work Together? </h3>

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

  <!-- detect referrer -->
  <?php if (!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == 'https://www.google.com/') {
    $server = $_SERVER['HTTP_REFERER'];
    $googleq = '<fieldset class="form-group"><p class="pform">It looks like you came here via Google. What search terms did you use?</p><label class="control-label sr-only" for="searchterms">Search terms</label><input name="searchterms" id="searchterms" type="text" maxlength="80" class="form-control" placeholder="chicago web developer"></fieldset>';
    echo $googleq;
  } else {
  } ?>


  <fieldset class="form-group">
    <p class="pform">In a few sentences, describe your project. <br />
      <span class="small"><em>Limit: 300 characters</em> </span>
    </p>

    <textarea class="textarea" name="clientproject" rows="4" maxlength="300"><?php echo $clientproject;?></textarea>
  </fieldset>


  <input type="submit" name="submit" value="Submit" class="-ghost -naturalsize">


</form>
