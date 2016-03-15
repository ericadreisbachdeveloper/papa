<?php
// define variables and set to empty values
$emailErr = $experienceErr = $allcapsErr = $designErr = $ideasErr = $projectErr = $kcupsErr = $reflectErr = ""; ?>
<form method='post' action=''>
  <div class='form'>
   <p class="p -large -txtcenter">Thank you for visiting!</p>
   <p class="p -medium -txtcenter">Contact erica by answering this short quiz.
   </p><!-- /.form -->

   <p class="required question-required"><em>Please fill in required&nbsp;fields. </em></p>

   <div>
    <label for="contactname">Name: </label>
    <input id="contactname" type="text">
   </div>

   <div>
    <label for="contactemail">Email*: </label>
    <span class="error"><?php echo $emailErr;?></span>
    <input type="email" value="<?php echo isset($_POST['email'])?$_POST['email']:""; ?>" id="contactemail" name="contactemail">
    <!-- <input name='email' class='email' type='text'> -->
   </div>

   <div class="experience">
    <p class="p">1. Rate your overall experiences with web developers in the&nbsp;past.* </p>
    <p class="error"><?php echo $experienceErr;?></p>
    <input type='radio' name='experience' value='great' id="great"><label for="great">Great.</label><br />
    <input type='radio' name='experience' value='so-so' id="soso"><label for="soso">So-so.</label><br />
    <input type='radio' name='experience' value='not-great' id="notgreat"><label for="notgreat">Not great.</label><br />
    <input type='radio' name='experience' value='never' id="never"><label for="never">I&lsquo;ve never worked with a web developer before.</lable>
   </div>

   <div class='allcaps'>
    <p>2. True or false: sometimes an all-caps email is the best way to get the point across.*</p>
    <p class="error"><?php echo $allcapsErr;?></p>
    <input type='radio' name='allcaps' value='true' id="allcapstrue"><label for="allcapstrue">True</label> &nbsp; &nbsp;
    <input type='radio' name='allcaps' value='false' id="allcapsfalse"><label for="allcapsfalse">False</label>
   </div>

   <div class='project'>
    <p>3. Below is an ancient graphic used by web developers to manage and prioritize projects. Which two describe the work for your&nbsp;project? </p>
    <p class="error"><?php echo $projectErr;?></p>
    <div style="float: right; background: #fff;"><!-- <img src="img/141014-good-fast-cheap.png" alt="Good | Fast | Cheap | Pick two | erica dreisbach - web designer" title="Good | Fast | Cheap | Pick two | erica dreisbach - web designer" style="max-width: 20em;" /> --></div>
    <input type='radio' name='project' value='fast-and-cheap' id="fastandcheap"><label for="fastandcheap">Fast and Cheap</label> <br />
    <input type='radio' name='project' value='good-and-cheap' id="goodandcheap"><label for="goodandcheap">Good and Cheap</label> <br />
    <input type='radio' name='project' value='fast-and-good' id="fastandgood"><label for="fastandgood">Fast and Good</label>
   </div>

   <div>
    <p>In a few sentences, describe your project. Limit: 300 characters.</p>
    <textarea name='description' rows='3' cols='40' maxlength='300'></textarea>
   </div>

  </div><!-- /.form -->

  <input type='submit' name="submit" value='SUBMIT' id="submit" class='button'>

</form>
