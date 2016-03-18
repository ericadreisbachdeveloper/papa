<?php include('contactvalidation.php'); ?>
<form method="post" class="form" action="">

  <div class="question contactinfo">
    <div class="col col-half">
      <label class="label" for="name">Name </label>
      <input type="name" name="name" id="name" value="<?php echo $name;?>">
      <p class="error nameerror"><?php echo $nameErr;?></p>
    </div>

    <div class="col col-space"> </div>

    <div class="col col-half">
      <label class="label" for="email">Email </label>
      <input type="email" name="email" id="email" value="<?php echo $email;?>">
      <p class="error emailerror"> <?php echo $emailErr;?></p>
    </div>
  </div><!-- /.contactinfo -->

  <div class="question website">
    <div class="col">
      <label class="label" for="website">Website </label>
      <input type="url" name="website" value="<?php echo $website;?>">
      <p class="error"><?php echo $websiteErr;?></p>
    </div><!-- /.col -->
  </div><!-- /.website -->

  <div class="question experience">
    <p class="p">1. Rate your overall experiences with web developers in the&nbsp;past. </p>
    <p class="error"><?php echo $experienceErr;?></p>

    <input class="radio" type='radio' name='experience' value='great' id="great"><label class="label" for="great">Great.</label><br />

    <input class="radio" type='radio' name='experience' value='so-so' id="soso"><label class="label" for="soso">So-so.</label><br />

    <input class="radio" type='radio' name='experience' value='not-great' id="notgreat"><label class="label" for="notgreat">Not great.</label><br />

    <input class="radio" type='radio' name='experience' value='never' id="never"><label class="label" for="never">I&rsquo;ve never worked with a web developer before.</label>
 </div><!-- /.experience -->

 <div class="question allcaps">
   <p class="p">2. True or false: sometimes an all-caps email is the best way to get the point across.</p>
   <p class="error"><?php echo $allcapsErr;?></p>
   <input class="radio" type='radio' name='allcaps' value='true' id="allcapstrue"><label class="label" for="allcapstrue">True</label> &nbsp; &nbsp;
   <input class="radio" type='radio' name='allcaps' value='false' id="allcapsfalse"><label class="label" for="allcapsfalse">False</label>
 </div><!-- /.allcaps -->

 <div class="question clientproject">
   <p class="p">3. In a few sentences, describe your project. <br />
     <span class="small"><em>Limit: 300 characters</em> </span>
   </p>
   <textarea class="textarea" name="clientproject" rows="4" maxlength="300"><?php echo $clientproject;?> </textarea>
 </div><!-- /.project -->

 <input type="submit" name="submit" value="Submit" class="contactbutton button">
</form>
